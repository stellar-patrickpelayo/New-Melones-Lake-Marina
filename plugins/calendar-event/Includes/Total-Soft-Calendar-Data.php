<?php
	global $wpdb;
	$tsc_events_table  = $wpdb->prefix . "totalsoft_cal_events";
	$tsc_event_rec_table = $wpdb->prefix . "totalsoft_cal_events_p3";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$tsc_event_rec_table_create = 'CREATE TABLE IF NOT EXISTS ' .$tsc_event_rec_table . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT, TotalSoftCal_EvCal VARCHAR(255) NOT NULL, TotalSoftCal_EvRec VARCHAR(255) NOT NULL, TotalSoftCal_Ev_01 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_02 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_03 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_04 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_05 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_06 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_07 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_08 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_09 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_10 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_11 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_12 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_13 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_14 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_15 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_16 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_17 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_18 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_19 VARCHAR(255) NOT NULL, TotalSoftCal_Ev_20 VARCHAR(255) NOT NULL, PRIMARY KEY (id))';
	dbDelta($tsc_event_rec_table_create);
	$tsc_event_rec_table_convert = 'ALTER TABLE ' . $tsc_event_rec_table . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$wpdb->query($tsc_event_rec_table_convert);
	$tsc_event_rec = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_event_rec_table WHERE id>%d",0));
	$tsc_events_count = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE id>%d",0));
	if(count($tsc_event_rec) == 0 && count($tsc_events_count) != 0) {
		for($i = 0; $i < count($tsc_events_count); $i++) {
			$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_rec_table (id, TotalSoftCal_EvCal, TotalSoftCal_EvRec) VALUES (%d, %s, %s)", '', $tsc_events_count[$i]->id, 'none'));
		}
	}
?>