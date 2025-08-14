<?php

/* ==================== */
/* 	ACF GOOGLE MAPS	    */
/* ==================== */
function wpc_acf_google_map_api($api) {
	$api['key'] = 'AIzaSyDPEpAc_uLzQeY3ZWKK6Y2WxvxvFMOJnFc';
	return $api;
}
add_filter('acf/fields/google_map/api', 'wpc_acf_google_map_api');
