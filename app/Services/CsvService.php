<?php

namespace App\Services;

class CsvService
{
    private $config;
    private $dataDir;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
        $this->dataDir = $this->config['paths']['data'];
        
        // Ensure data directory exists
        if (!file_exists($this->dataDir)) {
            mkdir($this->dataDir, 0777, true);
        }
    }

    public function readCsv($filename)
    {
        $filepath = $this->dataDir . '/' . $filename;
        if (!file_exists($filepath)) {
            return [];
        }

        $rows = [];
        if (($handle = fopen($filepath, "r")) !== FALSE) {
            $headers = fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== FALSE) {
                $rows[] = array_combine($headers, $data);
            }
            fclose($handle);
        }
        return $rows;
    }

    public function writeCsv($filename, $data, $headers = null)
    {
        $filepath = $this->dataDir . '/' . $filename;
        
        if (!file_exists($filepath)) {
            if ($headers === null && !empty($data)) {
                $headers = array_keys($data[0]);
            }
            
            $handle = fopen($filepath, "w");
            if ($headers) {
                fputcsv($handle, $headers);
            }
        } else {
            $handle = fopen($filepath, "a");
        }

        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        
        fclose($handle);
    }

    public function updateCsv($filename, $id, $newData)
    {
        $rows = $this->readCsv($filename);
        $updated = false;
        
        foreach ($rows as &$row) {
            if ($row['id'] == $id) {
                $row = array_merge($row, $newData);
                $updated = true;
                break;
            }
        }
        
        if ($updated) {
            $headers = array_keys($rows[0]);
            $this->writeCsv($filename, $rows, $headers);
        }
        
        return $updated;
    }

    public function deleteFromCsv($filename, $id)
    {
        $rows = $this->readCsv($filename);
        $filtered = array_filter($rows, function($row) use ($id) {
            return $row['id'] != $id;
        });
        
        if (count($filtered) < count($rows)) {
            $headers = array_keys($rows[0]);
            $this->writeCsv($filename, array_values($filtered), $headers);
            return true;
        }
        
        return false;
    }

    public function getNextId($filename)
    {
        $rows = $this->readCsv($filename);
        if (empty($rows)) {
            return 1;
        }
        
        $ids = array_column($rows, 'id');
        return max($ids) + 1;
    }
} 