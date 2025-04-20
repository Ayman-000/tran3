<?php

namespace Jaybizzle\CrawlerDetect;

use Jaybizzle\CrawlerDetect\Fixtures\Crawlers;
use Jaybizzle\CrawlerDetect\Fixtures\Exclusions;
use Jaybizzle\CrawlerDetect\Fixtures\Headers;

class CrawlerDetect
{
    protected $userAgent;
    protected $httpHeaders = array();
    protected $matches = array();
    protected $crawlers;
    protected $exclusions;
    protected $uaHttpHeaders;
    protected $compiledRegex;
    protected $compiledExclusions;

    public function __construct(array $headers = null, $userAgent = null)
    {
        $this->crawlers = new Crawlers();
        $this->exclusions = new Exclusions();
        $this->uaHttpHeaders = new Headers();

        $this->compiledRegex = $this->compileRegex($this->crawlers->getAll());
        $this->compiledExclusions = $this->compileRegex($this->exclusions->getAll());

        $this->setHttpHeaders($headers);
        $this->setUserAgent($userAgent);
    }

    public function compileRegex($patterns)
    {
        return '('.implode('|', $patterns).')';
    }

    public function setHttpHeaders($httpHeaders)
    {
        if (!is_array($httpHeaders) || !count($httpHeaders)) {
            $httpHeaders = $_SERVER;
        }

        $this->httpHeaders = array();

        foreach ($httpHeaders as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $this->httpHeaders[$key] = $value;
            }
        }
    }

    public function getUaHttpHeaders()
    {
        return $this->uaHttpHeaders->getAll();
    }

    public function setUserAgent($userAgent)
    {
        if (is_null($userAgent)) {
            foreach ($this->getUaHttpHeaders() as $altHeader) {
                if (isset($this->httpHeaders[$altHeader])) {
                    $userAgent .= $this->httpHeaders[$altHeader].' ';
                }
            }
        }

        return $this->userAgent = $userAgent;
    }

    public function isCrawler($userAgent = null)
    {
        $agent = trim(preg_replace(
            "/{$this->compiledExclusions}/i",
            '',
            $userAgent ?: $this->userAgent ?: ''
        ));

        if ($agent === '') {
            return false;
        }

        return (bool) preg_match("/{$this->compiledRegex}/i", $agent, $this->matches);
    }

    public function getMatches()
    {
        return isset($this->matches[0]) ? $this->matches[0] : null;
    }
} 