<?php
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Calendar-Data.php');
	global $wpdb;
	wp_enqueue_script( 'custom-header' );
	$tsc_events_table  = $wpdb->prefix . "totalsoft_cal_events";
	$tsc_types_table  = $wpdb->prefix . "totalsoft_cal_types";
	$tsc_event_settings_table  = $wpdb->prefix . "totalsoft_cal_events_p2";
	$tsc_event_rec_table = $wpdb->prefix . "totalsoft_cal_events_p3";
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		if(check_admin_referer( 'ts_calendar_nonce_field', 'ts_calendar_nonce' )) {
			if(isset($_POST['tsc_order_events'])) {
				$tsc_get_events = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE id>%d order by id",0));
				$tsc_get_events_settings = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_event_settings_table WHERE id>%d order by id",0));
				$tsc_get_events_rec = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_event_rec_table WHERE id>%d order by id",0));
				$tsc_events_check_arr = array();
				for($i = 1; $i <= count($tsc_get_events); $i++) {
					array_push($tsc_events_check_arr, sanitize_text_field($_POST['tsc_move_id_' . $i]));
				}
				for($i = 0; $i < count($tsc_get_events); $i++) {
					for($j = 0; $j < count($tsc_get_events); $j++) {
						if($tsc_get_events[$i]->id == $tsc_events_check_arr[$j]) {
							$wpdb->query($wpdb->prepare("UPDATE $tsc_events_table set TotalSoftCal_EvName = %s, TotalSoftCal_EvCal = %s, TotalSoftCal_EvStartDate = %s, TotalSoftCal_EvEndDate = %s, TotalSoftCal_EvURL = %s, TotalSoftCal_EvURLNewTab = %s, TotalSoftCal_EvStartTime = %s, TotalSoftCal_EvEndTime = %s, TotalSoftCal_EvColor = %s WHERE id = %d", $tsc_get_events[$i]->TotalSoftCal_EvName, $tsc_get_events[$i]->TotalSoftCal_EvCal, $tsc_get_events[$i]->TotalSoftCal_EvStartDate, $tsc_get_events[$i]->TotalSoftCal_EvEndDate, $tsc_get_events[$i]->TotalSoftCal_EvURL, $tsc_get_events[$i]->TotalSoftCal_EvURLNewTab, $tsc_get_events[$i]->TotalSoftCal_EvStartTime, $tsc_get_events[$i]->TotalSoftCal_EvEndTime, $tsc_get_events[$i]->TotalSoftCal_EvColor, $tsc_get_events[$j]->id));
							$wpdb->query($wpdb->prepare("UPDATE $tsc_event_settings_table set TotalSoftCal_EvDesc = %s, TotalSoftCal_EvImg = %s, TotalSoftCal_EvVid_Src = %s, TotalSoftCal_EvVid_Iframe = %s WHERE TotalSoftCal_EvCal = %s", $tsc_get_events_settings[$i]->TotalSoftCal_EvDesc, $tsc_get_events_settings[$i]->TotalSoftCal_EvImg, $tsc_get_events_settings[$i]->TotalSoftCal_EvVid_Src, $tsc_get_events_settings[$i]->TotalSoftCal_EvVid_Iframe, $tsc_get_events[$j]->id));
							$wpdb->query($wpdb->prepare("UPDATE $tsc_event_rec_table set TotalSoftCal_EvRec = %s WHERE TotalSoftCal_EvCal = %s", $tsc_get_events_rec[$i]->TotalSoftCal_EvRec, $tsc_get_events[$j]->id));
						}
					}
				}
			} else {
				$TotalSoftCal_EvName = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoftCal_EvName'])));
				$TotalSoftCal_EvCal = sanitize_text_field($_POST['TotalSoftCal_EvCal']);
				$TotalSoftCal_EvStartDate = sanitize_text_field($_POST['TotalSoftCal_EvStartDate']);
				$TotalSoftCal_EvEndDate = sanitize_text_field($_POST['TotalSoftCal_EvEndDate']);
				$TotalSoftCal_EvURL = sanitize_text_field($_POST['TotalSoftCal_EvURL']);
				$TotalSoftCal_EvURLNewTab = sanitize_text_field($_POST['TotalSoftCal_EvURLNewTab']);
				$TotalSoftCal_EvStartTime = sanitize_text_field($_POST['TotalSoftCal_EvStartTime']);
				$TotalSoftCal_EvEndTime = sanitize_text_field($_POST['TotalSoftCal_EvEndTime']);
				$TotalSoftCal_EvColor = sanitize_text_field($_POST['TotalSoftCal_EvColor']);
				$TotalSoftCal_EvDesc = str_replace("\&","&", sanitize_text_field(esc_html($_POST['tsc_event_description'])));
				$TotalSoftCal_EvImg = sanitize_text_field($_POST['tsc_event_image']);
				$TotalSoftCal_EvVid_Src = sanitize_text_field($_POST['tsc_event_video']);
				$TotalSoftCal_EvVid_Iframe = sanitize_text_field($_POST['tsc_event_iframe']);
				$TotalSoftCal_EvRec = 'none';
				if(isset($_POST['tsc_save_event'])) {
					$wpdb->query($wpdb->prepare("INSERT INTO $tsc_events_table (id, TotalSoftCal_EvName, TotalSoftCal_EvCal, TotalSoftCal_EvStartDate, TotalSoftCal_EvEndDate, TotalSoftCal_EvURL, TotalSoftCal_EvURLNewTab, TotalSoftCal_EvStartTime, TotalSoftCal_EvEndTime, TotalSoftCal_EvColor) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_EvName, $TotalSoftCal_EvCal, $TotalSoftCal_EvStartDate, $TotalSoftCal_EvEndDate, $TotalSoftCal_EvURL, $TotalSoftCal_EvURLNewTab, $TotalSoftCal_EvStartTime, $TotalSoftCal_EvEndTime, $TotalSoftCal_EvColor));
					$tsc_insert_event_id = $wpdb->insert_id;
					$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_settings_table (id, TotalSoftCal_EvDesc, TotalSoftCal_EvImg, TotalSoftCal_EvVid_Src, TotalSoftCal_EvVid_Iframe, TotalSoftCal_EvCal) VALUES (%d, %s, %s, %s, %s, %s)", '', $TotalSoftCal_EvDesc, $TotalSoftCal_EvImg, $TotalSoftCal_EvVid_Src, $TotalSoftCal_EvVid_Iframe, $tsc_insert_event_id));
					$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_rec_table (id, TotalSoftCal_EvCal, TotalSoftCal_EvRec) VALUES (%d, %s, %s)", '', $tsc_insert_event_id, $TotalSoftCal_EvRec));
				} else if(isset($_POST['tsc_update_event'])) {
					$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
					$wpdb->query($wpdb->prepare("UPDATE $tsc_events_table set TotalSoftCal_EvName = %s, TotalSoftCal_EvCal = %s, TotalSoftCal_EvStartDate = %s, TotalSoftCal_EvEndDate = %s, TotalSoftCal_EvURL = %s, TotalSoftCal_EvURLNewTab = %s, TotalSoftCal_EvStartTime = %s, TotalSoftCal_EvEndTime = %s, TotalSoftCal_EvColor = %s WHERE id = %d", $TotalSoftCal_EvName, $TotalSoftCal_EvCal, $TotalSoftCal_EvStartDate, $TotalSoftCal_EvEndDate, $TotalSoftCal_EvURL, $TotalSoftCal_EvURLNewTab, $TotalSoftCal_EvStartTime, $TotalSoftCal_EvEndTime, $TotalSoftCal_EvColor, $tsc_event_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_event_settings_table set TotalSoftCal_EvDesc = %s, TotalSoftCal_EvImg = %s, TotalSoftCal_EvVid_Src = %s, TotalSoftCal_EvVid_Iframe = %s WHERE TotalSoftCal_EvCal = %s", $TotalSoftCal_EvDesc, $TotalSoftCal_EvImg, $TotalSoftCal_EvVid_Src, $TotalSoftCal_EvVid_Iframe, $tsc_event_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_event_rec_table set TotalSoftCal_EvRec = %s WHERE TotalSoftCal_EvCal = %s", $TotalSoftCal_EvRec, $tsc_event_id));
				}
			}
		} else {
			wp_die('Security check fail');
		}
	}
	$tsc_all_types = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_types_table WHERE id>%d",0));
	$tsc_all_events = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE id>%d order by id",0));
	wp_register_style( 'total_soft_calendar_css', plugins_url('../CSS/totalsoft.css',__FILE__) );
	wp_enqueue_style( 'total_soft_calendar_css' );
	wp_register_style( 'tsc_fonts', plugins_url('../CSS/total_soft_calendar_fonts.css',__FILE__) );
	wp_enqueue_style( 'tsc_fonts' );
	$ts_calendar_fonts_array = array(
		'Amaranth'                  => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=KtkuALODe433f0j1zMnFHdc&skey=a086a5f010412431&v=v16#Amaranth',
			'woff'  => 'https://fonts.gstatic.com/s/amaranth/v16/KtkuALODe433f0j1zMnFHdY.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/amaranth/v16/KtkuALODe433f0j1zMnFHdU.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/amaranth/v16/KtkuALODe433f0j1zMnFHdQ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/amaranth/v16/KtkuALODe433f0j1zMnFHdA.woff2',
		),
		'Anton'                     => array(
			'woff'  => 'https://fonts.gstatic.com/s/anton/v22/1Ptgg87LROyAm3Kz-Ck.woff',
			'eot'   => 'https://fonts.gstatic.com/s/anton/v22/1Ptgg87LROyAm3Kz-Cs.eot',
			'woff2' => 'https://fonts.gstatic.com/s/anton/v22/1Ptgg87LROyAm3Kz-C8.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/anton/v22/1Ptgg87LROyAm3Kz-Co.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=1Ptgg87LROyAm3Kz-Cg&skey=3e16a04254d4c9b3&v=v22#Anton',
		),
		'Battambang'                => array(
			'woff2' => 'https://fonts.gstatic.com/s/battambang/v22/uk-mEGe7raEw-HjkzZabPnKp4g.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/battambang/v22/uk-mEGe7raEw-HjkzZabPnKp5A.woff',
			'eot'   => 'https://fonts.gstatic.com/s/battambang/v22/uk-mEGe7raEw-HjkzZabPnKp5g.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=uk-mEGe7raEw-HjkzZabPnKp5Q&skey=d567eed92f92816&v=v22#Battambang',
			'ttf'   => 'https://fonts.gstatic.com/s/battambang/v22/uk-mEGe7raEw-HjkzZabPnKp5w.ttf',
		),
		'Baumans'                   => array(
			'woff2' => 'https://fonts.gstatic.com/s/baumans/v15/-W_-XJj9QyTd3Qfpd_04aw.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/baumans/v15/-W_-XJj9QyTd3Qfpd_04bQ.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/baumans/v15/-W_-XJj9QyTd3Qfpd_04bg.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=-W_-XJj9QyTd3Qfpd_04bA&skey=34ab2ddaf19de28&v=v15#Baumans',
			'eot'   => 'https://fonts.gstatic.com/s/baumans/v15/-W_-XJj9QyTd3Qfpd_04bw.eot',
		),
		'Bungee Shade'              => array(
			'ttf'   => 'https://fonts.gstatic.com/s/bungeeshade/v9/DtVkJxarWL0t2KdzK3oI_jkc6SjW.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/bungeeshade/v9/DtVkJxarWL0t2KdzK3oI_jkc6SjV.woff',
			'eot'   => 'https://fonts.gstatic.com/s/bungeeshade/v9/DtVkJxarWL0t2KdzK3oI_jkc6SjX.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=DtVkJxarWL0t2KdzK3oI_jkc6SjU&skey=fbfaf26ed37f085b&v=v9#BungeeShade',
			'woff2' => 'https://fonts.gstatic.com/s/bungeeshade/v9/DtVkJxarWL0t2KdzK3oI_jkc6SjT.woff2',
		),
		'Butcherman'                => array(
			'eot'   => 'https://fonts.gstatic.com/s/butcherman/v22/2EbiL-thF0loflXUBOdb5zK5rg.eot',
			'woff'  => 'https://fonts.gstatic.com/s/butcherman/v22/2EbiL-thF0loflXUBOdb5zK5rA.woff',
			'woff2' => 'https://fonts.gstatic.com/s/butcherman/v22/2EbiL-thF0loflXUBOdb5zK5qg.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/butcherman/v22/2EbiL-thF0loflXUBOdb5zK5rw.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=2EbiL-thF0loflXUBOdb5zK5rQ&skey=a81c66da830bfcb3&v=v22#Butcherman',
		),
		'Cabin'                     => array(
			'woff'  => 'https://fonts.gstatic.com/s/cabin/v18/u-4X0qWljRw-PfU81xCKCpdpbgZJl6XFpfEd7eA9BIxxkV2EH7alwQ.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/cabin/v18/u-4X0qWljRw-PfU81xCKCpdpbgZJl6XFpfEd7eA9BIxxkV2EH7alwg.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=u-4X0qWljRw-PfU81xCKCpdpbgZJl6XFpfEd7eA9BIxxkV2EH7alwA&skey=d53a2c61c6b52b74&v=v18#Cabin',
			'woff2' => 'https://fonts.gstatic.com/s/cabin/v18/u-4X0qWljRw-PfU81xCKCpdpbgZJl6XFpfEd7eA9BIxxkV2EH7alxw.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/cabin/v18/u-4X0qWljRw-PfU81xCKCpdpbgZJl6XFpfEd7eA9BIxxkV2EH7alww.eot',
		),
		'Cabin Sketch'              => array(
			'eot'   => 'https://fonts.gstatic.com/s/cabinsketch/v17/QGYpz_kZZAGCONcK2A4bGOj8mNhJ.eot',
			'woff'  => 'https://fonts.gstatic.com/s/cabinsketch/v17/QGYpz_kZZAGCONcK2A4bGOj8mNhL.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=QGYpz_kZZAGCONcK2A4bGOj8mNhK&skey=64590cfdee656fb9&v=v17#CabinSketch',
			'woff2' => 'https://fonts.gstatic.com/s/cabinsketch/v17/QGYpz_kZZAGCONcK2A4bGOj8mNhN.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/cabinsketch/v17/QGYpz_kZZAGCONcK2A4bGOj8mNhI.ttf',
		),
		'Cairo'                     => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=SLXVc1nY6HkvangtZmpcWmhzfH5lWWgcRiyV&skey=ee6e3b9105e1a754&v=v17#Cairo',
			'woff2' => 'https://fonts.gstatic.com/s/cairo/v17/SLXVc1nY6HkvangtZmpcWmhzfH5lWWgcRiyS.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/cairo/v17/SLXVc1nY6HkvangtZmpcWmhzfH5lWWgcRiyW.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/cairo/v17/SLXVc1nY6HkvangtZmpcWmhzfH5lWWgcRiyX.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/cairo/v17/SLXVc1nY6HkvangtZmpcWmhzfH5lWWgcRiyU.woff',
		),
		'Damion'                    => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=hv-XlzJ3KEUe_YZkamwx&skey=cab2b817d665dc28&v=v10#Damion',
			'eot'   => 'https://fonts.gstatic.com/s/damion/v10/hv-XlzJ3KEUe_YZkamwy.eot',
			'woff'  => 'https://fonts.gstatic.com/s/damion/v10/hv-XlzJ3KEUe_YZkamww.woff',
			'woff2' => 'https://fonts.gstatic.com/s/damion/v10/hv-XlzJ3KEUe_YZkamw2.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/damion/v10/hv-XlzJ3KEUe_YZkamwz.ttf',
		),
		'Eagle Lake'                => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=ptRMTiqbbuNJDOiKj9wG1On4Lw&skey=63718d6a75d9c744&v=v18#EagleLake',
			'woff'  => 'https://fonts.gstatic.com/s/eaglelake/v18/ptRMTiqbbuNJDOiKj9wG1On4Lg.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/eaglelake/v18/ptRMTiqbbuNJDOiKj9wG1On4LQ.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/eaglelake/v18/ptRMTiqbbuNJDOiKj9wG1On4LA.eot',
			'woff2' => 'https://fonts.gstatic.com/s/eaglelake/v18/ptRMTiqbbuNJDOiKj9wG1On4KA.woff2',
		),
		'East Sea Dokdo'            => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=xfuo0Wn2V2_KanASqXSZp22m06_dE60&skey=44c2728630a38fc5&v=v18#EastSeaDokdo',
			'woff2' => 'https://fonts.gstatic.com/s/eastseadokdo/v18/xfuo0Wn2V2_KanASqXSZp22m06_dE6o.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/eastseadokdo/v18/xfuo0Wn2V2_KanASqXSZp22m06_dE68.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/eastseadokdo/v18/xfuo0Wn2V2_KanASqXSZp22m06_dE64.eot',
			'woff'  => 'https://fonts.gstatic.com/s/eastseadokdo/v18/xfuo0Wn2V2_KanASqXSZp22m06_dE6w.woff',
		),
		'Fira Sans Condensed'       => array(
			'eot'   => 'https://fonts.gstatic.com/s/firasanscondensed/v9/wEOhEADFm8hSaQTFG18FErVhsC9x-tarUfbtqQ.eot',
			'woff'  => 'https://fonts.gstatic.com/s/firasanscondensed/v9/wEOhEADFm8hSaQTFG18FErVhsC9x-tarUfbtqw.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=wEOhEADFm8hSaQTFG18FErVhsC9x-tarUfbtqg&skey=96eb1234fcb38aea&v=v9#FiraSansCondensed',
			'woff2' => 'https://fonts.gstatic.com/s/firasanscondensed/v9/wEOhEADFm8hSaQTFG18FErVhsC9x-tarUfbtrQ.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/firasanscondensed/v9/wEOhEADFm8hSaQTFG18FErVhsC9x-tarUfbtqA.ttf',
		),
		'Fira Sans Extra Condensed' => array(
			'eot'   => 'https://fonts.gstatic.com/s/firasansextracondensed/v8/NaPKcYDaAO5dirw6IaFn7lPJFqXmS-M9Atn3wgda1f-uvg.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=NaPKcYDaAO5dirw6IaFn7lPJFqXmS-M9Atn3wgda1f-uvQ&skey=6da40aeae3bd26bf&v=v8#FiraSansExtraCondensed',
			'woff'  => 'https://fonts.gstatic.com/s/firasansextracondensed/v8/NaPKcYDaAO5dirw6IaFn7lPJFqXmS-M9Atn3wgda1f-uvA.woff',
			'woff2' => 'https://fonts.gstatic.com/s/firasansextracondensed/v8/NaPKcYDaAO5dirw6IaFn7lPJFqXmS-M9Atn3wgda1f-uug.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/firasansextracondensed/v8/NaPKcYDaAO5dirw6IaFn7lPJFqXmS-M9Atn3wgda1f-uvw.ttf',
		),
		'Gafata'                    => array(
			'ttf'   => 'https://fonts.gstatic.com/s/gafata/v14/XRXV3I6Cn0VJKonINeaE.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/gafata/v14/XRXV3I6Cn0VJKonINeaH.woff',
			'woff2' => 'https://fonts.gstatic.com/s/gafata/v14/XRXV3I6Cn0VJKonINeaB.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=XRXV3I6Cn0VJKonINeaG&skey=ac32f67a7703448a&v=v14#Gafata',
			'eot'   => 'https://fonts.gstatic.com/s/gafata/v14/XRXV3I6Cn0VJKonINeaF.eot',
		),
		'Jacques Francois'          => array(
			'eot'   => 'https://fonts.gstatic.com/s/jacquesfrancois/v18/ZXu9e04ZvKeOOHIe1TMahbcIU2cgqcTgpA.eot',
			'woff'  => 'https://fonts.gstatic.com/s/jacquesfrancois/v18/ZXu9e04ZvKeOOHIe1TMahbcIU2cgqcTgpg.woff',
			'woff2' => 'https://fonts.gstatic.com/s/jacquesfrancois/v18/ZXu9e04ZvKeOOHIe1TMahbcIU2cgqcTgoA.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/jacquesfrancois/v18/ZXu9e04ZvKeOOHIe1TMahbcIU2cgqcTgpQ.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=ZXu9e04ZvKeOOHIe1TMahbcIU2cgqcTgpw&skey=f331cd55df0362a4&v=v18#JacquesFrancois',
		),
		'Headland One'              => array(
			'woff'  => 'https://fonts.gstatic.com/s/headlandone/v13/yYLu0hHR2vKnp89Tk1TCq3TB1_NU.woff',
			'woff2' => 'https://fonts.gstatic.com/s/headlandone/v13/yYLu0hHR2vKnp89Tk1TCq3TB1_NS.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/headlandone/v13/yYLu0hHR2vKnp89Tk1TCq3TB1_NX.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/headlandone/v13/yYLu0hHR2vKnp89Tk1TCq3TB1_NW.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=yYLu0hHR2vKnp89Tk1TCq3TB1_NV&skey=8cb712da05e7381c&v=v13#HeadlandOne',
		),
		'Katibeh'                   => array(
			'woff2' => 'https://fonts.gstatic.com/s/katibeh/v15/ZGjXol5MQJog4bxDWCpbVQ.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/katibeh/v15/ZGjXol5MQJog4bxDWCpbUQ.eot',
			'woff'  => 'https://fonts.gstatic.com/s/katibeh/v15/ZGjXol5MQJog4bxDWCpbUw.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/katibeh/v15/ZGjXol5MQJog4bxDWCpbUA.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=ZGjXol5MQJog4bxDWCpbUg&skey=5f417d48499acf32&v=v15#Katibeh',
		),
		'Monsieur La Doulaise'      => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=_Xmz-GY4rjmCbQfc-aPRaa4pqV340p7EZm5ZyEc&skey=f0bf0703ab573473&v=v12#MonsieurLaDoulaise',
			'eot'   => 'https://fonts.gstatic.com/s/monsieurladoulaise/v12/_Xmz-GY4rjmCbQfc-aPRaa4pqV340p7EZm5ZyEQ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/monsieurladoulaise/v12/_Xmz-GY4rjmCbQfc-aPRaa4pqV340p7EZm5ZyEA.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/monsieurladoulaise/v12/_Xmz-GY4rjmCbQfc-aPRaa4pqV340p7EZm5ZyEU.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/monsieurladoulaise/v12/_Xmz-GY4rjmCbQfc-aPRaa4pqV340p7EZm5ZyEY.woff',
		),
		'Mr De Haviland'            => array(
			'woff2' => 'https://fonts.gstatic.com/s/mrdehaviland/v12/OpNVnooIhJj96FdB73296ksbOg3F60M.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/mrdehaviland/v12/OpNVnooIhJj96FdB73296ksbOg3F60c.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=OpNVnooIhJj96FdB73296ksbOg3F60Q&skey=4c1b286187a2a4c2&v=v12#MrDeHaviland',
			'ttf'   => 'https://fonts.gstatic.com/s/mrdehaviland/v12/OpNVnooIhJj96FdB73296ksbOg3F60Y.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/mrdehaviland/v12/OpNVnooIhJj96FdB73296ksbOg3F60U.woff',
		),
		'Nova Script'               => array(
			'woff'  => 'https://fonts.gstatic.com/s/novascript/v23/7Au7p_IpkSWSTWaFWkumvlQKGFo.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/novascript/v23/7Au7p_IpkSWSTWaFWkumvlQKGFk.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/novascript/v23/7Au7p_IpkSWSTWaFWkumvlQKGFg.eot',
			'woff2' => 'https://fonts.gstatic.com/s/novascript/v23/7Au7p_IpkSWSTWaFWkumvlQKGFw.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=7Au7p_IpkSWSTWaFWkumvlQKGFs&skey=5c166543e0bd14ed&v=v23#NovaScript',
		),
		'Nova Square'               => array(
			'woff'  => 'https://fonts.gstatic.com/s/novasquare/v18/RrQUbo9-9DV7b06QHgSWsahHT4Q.woff',
			'eot'   => 'https://fonts.gstatic.com/s/novasquare/v18/RrQUbo9-9DV7b06QHgSWsahHT4Y.eot',
			'woff2' => 'https://fonts.gstatic.com/s/novasquare/v18/RrQUbo9-9DV7b06QHgSWsahHT4I.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/novasquare/v18/RrQUbo9-9DV7b06QHgSWsahHT4c.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=RrQUbo9-9DV7b06QHgSWsahHT4U&skey=eda40973f7ff17ba&v=v18#NovaSquare',
		),
		'Odor Mean Chey'            => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=raxkHiKDttkTe1aOGcJMR1A_4lrf0Tw&skey=71cf597ba81383f1&v=v25#OdorMeanChey',
			'woff'  => 'https://fonts.gstatic.com/s/odormeanchey/v25/raxkHiKDttkTe1aOGcJMR1A_4lrf0T0.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/odormeanchey/v25/raxkHiKDttkTe1aOGcJMR1A_4lrf0T4.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/odormeanchey/v25/raxkHiKDttkTe1aOGcJMR1A_4lrf0Ts.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/odormeanchey/v25/raxkHiKDttkTe1aOGcJMR1A_4lrf0T8.eot',
		),
		'Offside'                   => array(
			'woff'  => 'https://fonts.gstatic.com/s/offside/v18/HI_KiYMWKa9QrAykc5boQQ.woff',
			'woff2' => 'https://fonts.gstatic.com/s/offside/v18/HI_KiYMWKa9QrAykc5boRw.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/offside/v18/HI_KiYMWKa9QrAykc5boQw.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/offside/v18/HI_KiYMWKa9QrAykc5boQg.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=HI_KiYMWKa9QrAykc5boQA&skey=5442f4302844a3cf&v=v18#Offside',
		),
		'Old Standard TT'           => array(
			'woff'  => 'https://fonts.gstatic.com/s/oldstandardtt/v17/MwQubh3o1vLImiwAVvYawgcf2eVeqlq-.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=MwQubh3o1vLImiwAVvYawgcf2eVeqlq_&skey=f1cef4e9ada09fef&v=v17#OldStandardTT',
			'eot'   => 'https://fonts.gstatic.com/s/oldstandardtt/v17/MwQubh3o1vLImiwAVvYawgcf2eVeqlq8.eot',
			'woff2' => 'https://fonts.gstatic.com/s/oldstandardtt/v17/MwQubh3o1vLImiwAVvYawgcf2eVeqlq4.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/oldstandardtt/v17/MwQubh3o1vLImiwAVvYawgcf2eVeqlq9.ttf',
		),
		'Oldenburg'                 => array(
			'ttf'   => 'https://fonts.gstatic.com/s/oldenburg/v18/fC1jPY5JYWzbywv7c4VKVkSs.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/oldenburg/v18/fC1jPY5JYWzbywv7c4VKVkSt.eot',
			'woff'  => 'https://fonts.gstatic.com/s/oldenburg/v18/fC1jPY5JYWzbywv7c4VKVkSv.woff',
			'woff2' => 'https://fonts.gstatic.com/s/oldenburg/v18/fC1jPY5JYWzbywv7c4VKVkSp.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=fC1jPY5JYWzbywv7c4VKVkSu&skey=9bde624bd7bf0d51&v=v18#Oldenburg',
		),
		'Oxygen'                    => array(
			'woff'  => 'https://fonts.gstatic.com/s/oxygen/v14/2sDfZG1Wl4LcnbuKjk0g.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=2sDfZG1Wl4LcnbuKjk0h&skey=65a128e59aae3226&v=v14#Oxygen',
			'woff2' => 'https://fonts.gstatic.com/s/oxygen/v14/2sDfZG1Wl4LcnbuKjk0m.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/oxygen/v14/2sDfZG1Wl4LcnbuKjk0i.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/oxygen/v14/2sDfZG1Wl4LcnbuKjk0j.ttf',
		),
		'Oxygen Mono'               => array(
			'woff'  => 'https://fonts.gstatic.com/s/oxygenmono/v11/h0GsssGg9FxgDgCjLeAd7hjYx-g.woff',
			'eot'   => 'https://fonts.gstatic.com/s/oxygenmono/v11/h0GsssGg9FxgDgCjLeAd7hjYx-o.eot',
			'woff2' => 'https://fonts.gstatic.com/s/oxygenmono/v11/h0GsssGg9FxgDgCjLeAd7hjYx-4.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=h0GsssGg9FxgDgCjLeAd7hjYx-k&skey=464e9f9167c9e76a&v=v11#OxygenMono',
			'ttf'   => 'https://fonts.gstatic.com/s/oxygenmono/v11/h0GsssGg9FxgDgCjLeAd7hjYx-s.ttf',
		),
		'Princess Sofia'            => array(
			'eot'   => 'https://fonts.gstatic.com/s/princesssofia/v19/qWczB6yguIb8DZ_GXZst16n7GSz8kjA.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/princesssofia/v19/qWczB6yguIb8DZ_GXZst16n7GSz8kjE.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/princesssofia/v19/qWczB6yguIb8DZ_GXZst16n7GSz8kjQ.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=qWczB6yguIb8DZ_GXZst16n7GSz8kjM&skey=c12de19c7965de10&v=v19#PrincessSofia',
			'woff'  => 'https://fonts.gstatic.com/s/princesssofia/v19/qWczB6yguIb8DZ_GXZst16n7GSz8kjI.woff',
		),
		'Prociono'                  => array(
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=r05YGLlR-KxAf9GGO_uuwjA&skey=f1ab602d48b8a5f7&v=v20#Prociono',
			'woff'  => 'https://fonts.gstatic.com/s/prociono/v20/r05YGLlR-KxAf9GGO_uuwjE.woff',
			'woff2' => 'https://fonts.gstatic.com/s/prociono/v20/r05YGLlR-KxAf9GGO_uuwjc.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/prociono/v20/r05YGLlR-KxAf9GGO_uuwjM.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/prociono/v20/r05YGLlR-KxAf9GGO_uuwjI.ttf',
		),
		'Prompt'                    => array(
			'eot'   => 'https://fonts.gstatic.com/s/prompt/v9/-W__XJnvUD7dzB2KYNoZ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/prompt/v9/-W__XJnvUD7dzB2KYNod.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=-W__XJnvUD7dzB2KYNoa&skey=154c4e4e997e9cb&v=v9#Prompt',
			'woff'  => 'https://fonts.gstatic.com/s/prompt/v9/-W__XJnvUD7dzB2KYNob.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/prompt/v9/-W__XJnvUD7dzB2KYNoY.ttf',
		),
		'Prosto One'                => array(
			'woff'  => 'https://fonts.gstatic.com/s/prostoone/v15/OpNJno4VhNfK-RgpwWWxli1VXQ.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/prostoone/v15/OpNJno4VhNfK-RgpwWWxli1VXg.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=OpNJno4VhNfK-RgpwWWxli1VXA&skey=dd4f849bff091329&v=v15#ProstoOne',
			'eot'   => 'https://fonts.gstatic.com/s/prostoone/v15/OpNJno4VhNfK-RgpwWWxli1VXw.eot',
			'woff2' => 'https://fonts.gstatic.com/s/prostoone/v15/OpNJno4VhNfK-RgpwWWxli1VWw.woff2',
		),
		'Proza Libre'               => array(
			'woff'  => 'https://fonts.gstatic.com/s/prozalibre/v5/LYjGdGHgj0k1DIQRyUEyyEoodNw.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/prozalibre/v5/LYjGdGHgj0k1DIQRyUEyyEoodN8.ttf',
			'eot'   => 'https://fonts.gstatic.com/s/prozalibre/v5/LYjGdGHgj0k1DIQRyUEyyEoodN4.eot',
			'woff2' => 'https://fonts.gstatic.com/s/prozalibre/v5/LYjGdGHgj0k1DIQRyUEyyEoodNo.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=LYjGdGHgj0k1DIQRyUEyyEoodN0&skey=c693a39898a09712&v=v5#ProzaLibre',
		),
		'Quicksand'                 => array(
			'eot'   => 'https://fonts.gstatic.com/s/quicksand/v28/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-xg.eot',
			'woff2' => 'https://fonts.gstatic.com/s/quicksand/v28/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-wg.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/quicksand/v28/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-xw.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/quicksand/v28/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-xA.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-xQ&skey=c01f11fa5439d932&v=v28#Quicksand',
		),
		'Quintessential'            => array(
			'ttf'   => 'https://fonts.gstatic.com/s/quintessential/v18/fdNn9sOGq31Yjnh3qWU14Ddtjb53Qb0.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/quintessential/v18/fdNn9sOGq31Yjnh3qWU14Ddtjb53Qb4.woff',
			'eot'   => 'https://fonts.gstatic.com/s/quintessential/v18/fdNn9sOGq31Yjnh3qWU14Ddtjb53Qbw.eot',
			'woff2' => 'https://fonts.gstatic.com/s/quintessential/v18/fdNn9sOGq31Yjnh3qWU14Ddtjb53Qbg.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=fdNn9sOGq31Yjnh3qWU14Ddtjb53Qb8&skey=69a7a147bd395e2d&v=v18#Quintessential',
		),
		'Qwigley'                   => array(
			'woff2' => 'https://fonts.gstatic.com/s/qwigley/v14/1cXzaU3UGJb5tGoCiVtmig.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/qwigley/v14/1cXzaU3UGJb5tGoCiVtmjg.eot',
			'woff'  => 'https://fonts.gstatic.com/s/qwigley/v14/1cXzaU3UGJb5tGoCiVtmjA.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=1cXzaU3UGJb5tGoCiVtmjQ&skey=556bf49db578a148&v=v14#Qwigley',
			'ttf'   => 'https://fonts.gstatic.com/s/qwigley/v14/1cXzaU3UGJb5tGoCiVtmjw.ttf',
		),
		'Racing Sans One'           => array(
			'ttf'   => 'https://fonts.gstatic.com/s/racingsansone/v11/sykr-yRtm7EvTrXNxkv5jfKKyDCAKHDi.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=sykr-yRtm7EvTrXNxkv5jfKKyDCAKHDg&skey=c54fc5912484ccc5&v=v11#RacingSansOne',
			'woff2' => 'https://fonts.gstatic.com/s/racingsansone/v11/sykr-yRtm7EvTrXNxkv5jfKKyDCAKHDn.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/racingsansone/v11/sykr-yRtm7EvTrXNxkv5jfKKyDCAKHDj.eot',
			'woff'  => 'https://fonts.gstatic.com/s/racingsansone/v11/sykr-yRtm7EvTrXNxkv5jfKKyDCAKHDh.woff',
		),
		'Radley'                    => array(
			'woff'  => 'https://fonts.gstatic.com/s/radley/v18/LYjDdGzinEIjCN1NpwND.woff',
			'eot'   => 'https://fonts.gstatic.com/s/radley/v18/LYjDdGzinEIjCN1NpwNB.eot',
			'woff2' => 'https://fonts.gstatic.com/s/radley/v18/LYjDdGzinEIjCN1NpwNF.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=LYjDdGzinEIjCN1NpwNC&skey=e57d4c4ee339b3e9&v=v18#Radley',
			'ttf'   => 'https://fonts.gstatic.com/s/radley/v18/LYjDdGzinEIjCN1NpwNA.ttf',
		),
		'Rajdhani'                  => array(
			'ttf'   => 'https://fonts.gstatic.com/s/rajdhani/v14/LDIxapCSOBg7S-QT7p4HM-M.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/rajdhani/v14/LDIxapCSOBg7S-QT7p4HM-A.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=LDIxapCSOBg7S-QT7p4HM-E&skey=2a58cb2a05429b83&v=v14#Rajdhani',
			'eot'   => 'https://fonts.gstatic.com/s/rajdhani/v14/LDIxapCSOBg7S-QT7p4HM-I.eot',
			'woff2' => 'https://fonts.gstatic.com/s/rajdhani/v14/LDIxapCSOBg7S-QT7p4HM-Y.woff2',
		),
		'Rakkas'                    => array(
			'eot'   => 'https://fonts.gstatic.com/s/rakkas/v15/Qw3cZQlNHiblL3jPkdFK.eot',
			'woff'  => 'https://fonts.gstatic.com/s/rakkas/v15/Qw3cZQlNHiblL3jPkdFI.woff',
			'woff2' => 'https://fonts.gstatic.com/s/rakkas/v15/Qw3cZQlNHiblL3jPkdFO.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=Qw3cZQlNHiblL3jPkdFJ&skey=838fd7946900648&v=v15#Rakkas',
			'ttf'   => 'https://fonts.gstatic.com/s/rakkas/v15/Qw3cZQlNHiblL3jPkdFL.ttf',
		),
		'Raleway'                   => array(
			'eot'   => 'https://fonts.gstatic.com/s/raleway/v26/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvaorCIPrU.eot',
			'woff'  => 'https://fonts.gstatic.com/s/raleway/v26/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvaorCIPrc.woff',
			'woff2' => 'https://fonts.gstatic.com/s/raleway/v26/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvaorCIPrE.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvaorCIPrY&skey=30a27f2564731c64&v=v26#Raleway',
			'ttf'   => 'https://fonts.gstatic.com/s/raleway/v26/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvaorCIPrQ.ttf',
		),
		'Raleway Dots'              => array(
			'eot'   => 'https://fonts.gstatic.com/s/ralewaydots/v12/6NUR8FifJg6AfQvzpshgwJ8UzvVA.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=6NUR8FifJg6AfQvzpshgwJ8UzvVD&skey=cc3e6aa20688efe&v=v12#RalewayDots',
			'woff'  => 'https://fonts.gstatic.com/s/ralewaydots/v12/6NUR8FifJg6AfQvzpshgwJ8UzvVC.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/ralewaydots/v12/6NUR8FifJg6AfQvzpshgwJ8UzvVB.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/ralewaydots/v12/6NUR8FifJg6AfQvzpshgwJ8UzvVE.woff2',
		),
		'Ramabhadra'                => array(
			'woff2' => 'https://fonts.gstatic.com/s/ramabhadra/v13/EYq2maBOwqRW9P1SQ83LShRMXg.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/ramabhadra/v13/EYq2maBOwqRW9P1SQ83LShRMWg.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=EYq2maBOwqRW9P1SQ83LShRMWQ&skey=e9d5795f78cdacfa&v=v13#Ramabhadra',
			'ttf'   => 'https://fonts.gstatic.com/s/ramabhadra/v13/EYq2maBOwqRW9P1SQ83LShRMWw.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/ramabhadra/v13/EYq2maBOwqRW9P1SQ83LShRMWA.woff',
		),
		'Ramaraja'                  => array(
			'woff2' => 'https://fonts.gstatic.com/s/ramaraja/v13/SlGTmQearpYAYG1CACIjoHE.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/ramaraja/v13/SlGTmQearpYAYG1CACIjoHc.woff',
			'eot'   => 'https://fonts.gstatic.com/s/ramaraja/v13/SlGTmQearpYAYG1CACIjoHU.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=SlGTmQearpYAYG1CACIjoHY&skey=f83b7da96b6fa9d5&v=v13#Ramaraja',
			'ttf'   => 'https://fonts.gstatic.com/s/ramaraja/v13/SlGTmQearpYAYG1CACIjoHQ.ttf',
		),
		'Rosarivo'                  => array(
			'eot'   => 'https://fonts.gstatic.com/s/rosarivo/v18/PlI-Fl2lO6N9f8HaNDeF0H0.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/rosarivo/v18/PlI-Fl2lO6N9f8HaNDeF0Hw.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/rosarivo/v18/PlI-Fl2lO6N9f8HaNDeF0H8.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=PlI-Fl2lO6N9f8HaNDeF0H4&skey=ac6102bdca509a99&v=v18#Rosarivo',
			'woff2' => 'https://fonts.gstatic.com/s/rosarivo/v18/PlI-Fl2lO6N9f8HaNDeF0Hk.woff2',
		),
		'Revalia'                   => array(
			'eot'   => 'https://fonts.gstatic.com/s/revalia/v18/WwkexPimBE2-4ZPESV3kMQ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/revalia/v18/WwkexPimBE2-4ZPESV3kNQ.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/revalia/v18/WwkexPimBE2-4ZPESV3kMA.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/revalia/v18/WwkexPimBE2-4ZPESV3kMw.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=WwkexPimBE2-4ZPESV3kMg&skey=bbf65c76529e0aac&v=v18#Revalia',
		),
		'Siemreap'                  => array(
			'eot'   => 'https://fonts.gstatic.com/s/siemreap/v15/Gg82N5oFbgLvHAfNl1YXlgo.eot',
			'woff2' => 'https://fonts.gstatic.com/s/siemreap/v15/Gg82N5oFbgLvHAfNl1YXlg4.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/siemreap/v15/Gg82N5oFbgLvHAfNl1YXlgs.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/siemreap/v15/Gg82N5oFbgLvHAfNl1YXlgg.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=Gg82N5oFbgLvHAfNl1YXlgk&skey=b6efc4718dc363e9&v=v15#Siemreap',
		),
		'Sigmar One'                => array(
			'eot'   => 'https://fonts.gstatic.com/s/sigmarone/v15/co3DmWZ8kjZuErj9Ta3do6Tpog.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/sigmarone/v15/co3DmWZ8kjZuErj9Ta3do6Tpow.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=co3DmWZ8kjZuErj9Ta3do6TpoQ&skey=1faaf69a761e7c1&v=v15#SigmarOne',
			'woff2' => 'https://fonts.gstatic.com/s/sigmarone/v15/co3DmWZ8kjZuErj9Ta3do6Tppg.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/sigmarone/v15/co3DmWZ8kjZuErj9Ta3do6TpoA.woff',
		),
		'Signika'                   => array(
			'woff'  => 'https://fonts.gstatic.com/s/signika/v18/vEFO2_JTCgwQ5ejvMV0O96D01E8J0tJXHKbBjMg.woff',
			'woff2' => 'https://fonts.gstatic.com/s/signika/v18/vEFO2_JTCgwQ5ejvMV0O96D01E8J0tJXHKbBjM4.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/signika/v18/vEFO2_JTCgwQ5ejvMV0O96D01E8J0tJXHKbBjMo.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=vEFO2_JTCgwQ5ejvMV0O96D01E8J0tJXHKbBjMk&skey=2df7b3f7f6d8a32a&v=v18#Signika',
			'ttf'   => 'https://fonts.gstatic.com/s/signika/v18/vEFO2_JTCgwQ5ejvMV0O96D01E8J0tJXHKbBjMs.ttf',
		),
		'Signika Negative'          => array(
			'ttf'   => 'https://fonts.gstatic.com/s/signikanegative/v18/E21x_cfngu7HiRpPX3ZpNE4kY5zKSPmJXkF0VDD2RAqnS43rvdw.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=E21x_cfngu7HiRpPX3ZpNE4kY5zKSPmJXkF0VDD2RAqnS43rvd4&skey=72460f8866ebf5b&v=v18#SignikaNegative',
			'eot'   => 'https://fonts.gstatic.com/s/signikanegative/v18/E21x_cfngu7HiRpPX3ZpNE4kY5zKSPmJXkF0VDD2RAqnS43rvd0.eot',
			'woff2' => 'https://fonts.gstatic.com/s/signikanegative/v18/E21x_cfngu7HiRpPX3ZpNE4kY5zKSPmJXkF0VDD2RAqnS43rvdk.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/signikanegative/v18/E21x_cfngu7HiRpPX3ZpNE4kY5zKSPmJXkF0VDD2RAqnS43rvd8.woff',
		),
		'Simonetta'                 => array(
			'eot'   => 'https://fonts.gstatic.com/s/simonetta/v21/x3dickHVYrCU5BU15c4xe_oH.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=x3dickHVYrCU5BU15c4xe_oE&skey=d750687bc3bb71a&v=v21#Simonetta',
			'ttf'   => 'https://fonts.gstatic.com/s/simonetta/v21/x3dickHVYrCU5BU15c4xe_oG.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/simonetta/v21/x3dickHVYrCU5BU15c4xe_oD.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/simonetta/v21/x3dickHVYrCU5BU15c4xe_oF.woff',
		),
		'Tajawal'                   => array(
			'eot'   => 'https://fonts.gstatic.com/s/tajawal/v8/Iura6YBj_oCad4k1nzGBDw.eot',
			'woff'  => 'https://fonts.gstatic.com/s/tajawal/v8/Iura6YBj_oCad4k1nzGBDQ.woff',
			'woff2' => 'https://fonts.gstatic.com/s/tajawal/v8/Iura6YBj_oCad4k1nzGBCw.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=Iura6YBj_oCad4k1nzGBDA&skey=549d92590736b326&v=v8#Tajawal',
			'ttf'   => 'https://fonts.gstatic.com/s/tajawal/v8/Iura6YBj_oCad4k1nzGBDg.ttf',
		),
		'Tangerine'                 => array(
			'woff2' => 'https://fonts.gstatic.com/s/tangerine/v15/IurY6Y5j_oScZZow4VOxCZZM.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/tangerine/v15/IurY6Y5j_oScZZow4VOxCZZK.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/tangerine/v15/IurY6Y5j_oScZZow4VOxCZZJ.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=IurY6Y5j_oScZZow4VOxCZZL&skey=7b78e1b6f929768b&v=v15#Tangerine',
			'eot'   => 'https://fonts.gstatic.com/s/tangerine/v15/IurY6Y5j_oScZZow4VOxCZZI.eot',
		),
		'Taprom'                    => array(
			'eot'   => 'https://fonts.gstatic.com/s/taprom/v25/UcCn3F82JHycULb1RCMy.eot',
			'woff'  => 'https://fonts.gstatic.com/s/taprom/v25/UcCn3F82JHycULb1RCMw.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/taprom/v25/UcCn3F82JHycULb1RCMz.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/taprom/v25/UcCn3F82JHycULb1RCM2.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=UcCn3F82JHycULb1RCMx&skey=859dd742e3c12a2a&v=v25#Taprom',
		),
		'Tauri'                     => array(
			'eot'   => 'https://fonts.gstatic.com/s/tauri/v14/TwMA-IISS0AM3LpSUnA.eot',
			'woff'  => 'https://fonts.gstatic.com/s/tauri/v14/TwMA-IISS0AM3LpSUnI.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=TwMA-IISS0AM3LpSUnM&skey=a80ecb7544e95b0b&v=v14#Tauri',
			'ttf'   => 'https://fonts.gstatic.com/s/tauri/v14/TwMA-IISS0AM3LpSUnE.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/tauri/v14/TwMA-IISS0AM3LpSUnQ.woff2',
		),
		'Taviraj'                   => array(
			'eot'   => 'https://fonts.gstatic.com/s/taviraj/v9/ahcZv8Cj3ylylTXzTOkrVg.eot',
			'woff'  => 'https://fonts.gstatic.com/s/taviraj/v9/ahcZv8Cj3ylylTXzTOkrVA.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=ahcZv8Cj3ylylTXzTOkrVQ&skey=e380adc86ebdb4d0&v=v9#Taviraj',
			'ttf'   => 'https://fonts.gstatic.com/s/taviraj/v9/ahcZv8Cj3ylylTXzTOkrVw.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/taviraj/v9/ahcZv8Cj3ylylTXzTOkrUg.woff2',
		),
		'Teko'                      => array(
			'eot'   => 'https://fonts.gstatic.com/s/teko/v14/LYjNdG7kmE0gfaN9oQ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/teko/v14/LYjNdG7kmE0gfaN9pQ.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/teko/v14/LYjNdG7kmE0gfaN9oA.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/teko/v14/LYjNdG7kmE0gfaN9ow.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=LYjNdG7kmE0gfaN9og&skey=f42f6a86f3e5e4b1&v=v14#Teko',
		),
		'Telex'                     => array(
			'woff2' => 'https://fonts.gstatic.com/s/telex/v12/ieVw2Y1fKWmIO-fUDVs.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=ieVw2Y1fKWmIO-fUDVw&skey=f563425e95f7a3e2&v=v12#Telex',
			'eot'   => 'https://fonts.gstatic.com/s/telex/v12/ieVw2Y1fKWmIO-fUDV8.eot',
			'woff'  => 'https://fonts.gstatic.com/s/telex/v12/ieVw2Y1fKWmIO-fUDV0.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/telex/v12/ieVw2Y1fKWmIO-fUDV4.ttf',
		),
		'Tenali Ramakrishna'        => array(
			'woff'  => 'https://fonts.gstatic.com/s/tenaliramakrishna/v10/raxgHj6Yt9gAN3LLKs0BZVMo8jmwn1-ML5_t.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=raxgHj6Yt9gAN3LLKs0BZVMo8jmwn1-ML5_s&skey=4930e67a756ab02f&v=v10#TenaliRamakrishna',
			'eot'   => 'https://fonts.gstatic.com/s/tenaliramakrishna/v10/raxgHj6Yt9gAN3LLKs0BZVMo8jmwn1-ML5_v.eot',
			'ttf'   => 'https://fonts.gstatic.com/s/tenaliramakrishna/v10/raxgHj6Yt9gAN3LLKs0BZVMo8jmwn1-ML5_u.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/tenaliramakrishna/v10/raxgHj6Yt9gAN3LLKs0BZVMo8jmwn1-ML5_r.woff2',
		),
		'Tenor Sans'                => array(
			'ttf'   => 'https://fonts.gstatic.com/s/tenorsans/v15/bx6ANxqUneKx06UkIXISn3V4Dw.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/tenorsans/v15/bx6ANxqUneKx06UkIXISn3V4Cg.woff2',
			'eot'   => 'https://fonts.gstatic.com/s/tenorsans/v15/bx6ANxqUneKx06UkIXISn3V4Dg.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=bx6ANxqUneKx06UkIXISn3V4DQ&skey=9e159c41209dbf49&v=v15#TenorSans',
			'woff'  => 'https://fonts.gstatic.com/s/tenorsans/v15/bx6ANxqUneKx06UkIXISn3V4DA.woff',
		),
		'Text Me One'               => array(
			'eot'   => 'https://fonts.gstatic.com/s/textmeone/v18/i7dOIFdlayuLUvgoFvHQFVZbYFM.eot',
			'woff'  => 'https://fonts.gstatic.com/s/textmeone/v18/i7dOIFdlayuLUvgoFvHQFVZbYFE.woff',
			'woff2' => 'https://fonts.gstatic.com/s/textmeone/v18/i7dOIFdlayuLUvgoFvHQFVZbYFc.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/textmeone/v18/i7dOIFdlayuLUvgoFvHQFVZbYFI.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=i7dOIFdlayuLUvgoFvHQFVZbYFA&skey=e4462b563ebfbe6&v=v18#TextMeOne',
		),
		'The Girl Next Door'        => array(
			'woff'  => 'https://fonts.gstatic.com/s/thegirlnextdoor/v16/pe0zMJCIMIsBjFxqYBIcZ6_OI5oFHCY4ULF8.woff',
			'eot'   => 'https://fonts.gstatic.com/s/thegirlnextdoor/v16/pe0zMJCIMIsBjFxqYBIcZ6_OI5oFHCY4ULF-.eot',
			'woff2' => 'https://fonts.gstatic.com/s/thegirlnextdoor/v16/pe0zMJCIMIsBjFxqYBIcZ6_OI5oFHCY4ULF6.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/thegirlnextdoor/v16/pe0zMJCIMIsBjFxqYBIcZ6_OI5oFHCY4ULF_.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=pe0zMJCIMIsBjFxqYBIcZ6_OI5oFHCY4ULF9&skey=bb61dfb09aee2010&v=v16#TheGirlNextDoor',
		),
		'Tienne'                    => array(
			'woff2' => 'https://fonts.gstatic.com/s/tienne/v18/AYCKpX7pe9YCRP07l0nG.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/tienne/v18/AYCKpX7pe9YCRP07l0nD.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=AYCKpX7pe9YCRP07l0nB&skey=80ed6e66d365b35a&v=v18#Tienne',
			'woff'  => 'https://fonts.gstatic.com/s/tienne/v18/AYCKpX7pe9YCRP07l0nA.woff',
			'eot'   => 'https://fonts.gstatic.com/s/tienne/v18/AYCKpX7pe9YCRP07l0nC.eot',
		),
		'Tillana'                   => array(
			'woff2' => 'https://fonts.gstatic.com/s/tillana/v9/VuJxdNvf35P4qJ1OSKHdOQ.woff2',
			'ttf'   => 'https://fonts.gstatic.com/s/tillana/v9/VuJxdNvf35P4qJ1OSKHdPA.ttf',
			'woff'  => 'https://fonts.gstatic.com/s/tillana/v9/VuJxdNvf35P4qJ1OSKHdPw.woff',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=VuJxdNvf35P4qJ1OSKHdPg&skey=ca2cb923082f4f9a&v=v9#Tillana',
			'eot'   => 'https://fonts.gstatic.com/s/tillana/v9/VuJxdNvf35P4qJ1OSKHdPQ.eot',
		),
		'Timmana'                   => array(
			'eot'   => 'https://fonts.gstatic.com/s/timmana/v10/6xKvdShfL9yK-rvpOmzRLQ.eot',
			'woff2' => 'https://fonts.gstatic.com/s/timmana/v10/6xKvdShfL9yK-rvpOmzRKQ.woff2',
			'woff'  => 'https://fonts.gstatic.com/s/timmana/v10/6xKvdShfL9yK-rvpOmzRLw.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/timmana/v10/6xKvdShfL9yK-rvpOmzRLA.ttf',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=6xKvdShfL9yK-rvpOmzRLg&skey=909c473ed6ecde4d&v=v10#Timmana',
		),
		'Tinos'                     => array(
			'eot'   => 'https://fonts.gstatic.com/s/tinos/v23/buE4poGnedXvwjX7fmA.eot',
			'woff'  => 'https://fonts.gstatic.com/s/tinos/v23/buE4poGnedXvwjX7fmI.woff',
			'woff2' => 'https://fonts.gstatic.com/s/tinos/v23/buE4poGnedXvwjX7fmQ.woff2',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=buE4poGnedXvwjX7fmM&skey=c8b6aa82b57934a&v=v23#Tinos',
			'ttf'   => 'https://fonts.gstatic.com/s/tinos/v23/buE4poGnedXvwjX7fmE.ttf',
		),
		'Titan One'                 => array(
			'eot'   => 'https://fonts.gstatic.com/s/titanone/v11/mFTzWbsGxbbS_J5cQcjClDgi.eot',
			'svg'   => 'https://fonts.gstatic.com/l/font?kit=mFTzWbsGxbbS_J5cQcjClDgh&skey=fec1aaa79fef5720&v=v11#TitanOne',
			'woff'  => 'https://fonts.gstatic.com/s/titanone/v11/mFTzWbsGxbbS_J5cQcjClDgg.woff',
			'ttf'   => 'https://fonts.gstatic.com/s/titanone/v11/mFTzWbsGxbbS_J5cQcjClDgj.ttf',
			'woff2' => 'https://fonts.gstatic.com/s/titanone/v11/mFTzWbsGxbbS_J5cQcjClDgm.woff2',
		),
	);
	$ts_calendar_fonts_style = "";
	foreach ($ts_calendar_fonts_array as $key => $value) {
		$ts_calendar_fonts_style .= sprintf(
			'
			  @font-face {
				font-family: "%1$s";
				font-style: normal;
				font-weight: 400;
				src: url("%2$s"); 
				src: url("%3$s") format("embedded-opentype"), 
					 url("%4$s") format("woff2"), 
					 url("%5$s") format("woff"), 
					 url("%6$s") format("truetype"), 
					 url("%7$s") format("svg");
			  }
			',
			esc_attr( $key ),
			array_key_exists( 'eot', $value ) ? esc_url( $value['eot'] ) : '',
			array_key_exists( 'eot', $value ) ? esc_url( $value['eot'] ) : '',
			array_key_exists( 'woff2', $value ) ? esc_url( $value['woff2'] ) : '',
			array_key_exists( 'woff', $value ) ? esc_url( $value['woff'] ) : '',
			array_key_exists( 'ttf', $value ) ? esc_url( $value['ttf'] ) : '',
			array_key_exists( 'svg', $value ) ? esc_url( $value['svg'] ) : ''
		);
	}
	wp_add_inline_style("tsc_fonts", $ts_calendar_fonts_style);
	wp_register_script(
		'ts_calendar_tinymce',
		plugins_url('../JS/tinymce.min.js',__FILE__),
		array(  )
	);
	wp_enqueue_script('ts_calendar_tinymce');
	wp_register_script(
		'ts_calendar_tinymce_min',
		plugins_url('../JS/jquery.tinymce.min.js',__FILE__),
		array(  )
	);
	wp_enqueue_script('ts_calendar_tinymce_min');
	?>
	<form method="POST" enctype="multipart/form-data">
		<div class="ts_calendar_loader">
			<img src="<?php echo esc_url(plugins_url('../Images/loading.gif',__FILE__));?>">
		</div>
		<?php wp_nonce_field( 'ts_calendar_nonce_field', 'ts_calendar_nonce' );?>
		<div class="tsc_header">
			<a href="https://total-soft.com/wp-event-calendar/" target="_blank" title="Click to Buy">
				<div class="tsc_full_version_div"><i class="totalsoft totalsoft-cart-arrow-down"></i><span style="margin-left:5px;">Get The Full Version</span></div>
			</a>
			<div class="tsc_full_version_span">
				This is the free version of the plugin.
			</div>
			<div class="tsc_support_div">
				<a href="https://wordpress.org/support/plugin/calendar-event/" target="_blank" title="Click Here to Ask">
					<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
				</a>
			</div>
			<div class="tsc_logo_div"></div>
			<div class="tsc_create_div">
				<i class="tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Creating New Event', 'Total-Soft-Calendar' );?>"></i>
				<span class="tsc_button" onclick="tsc_event_create()">
					<?php esc_html_e( 'Create Event', 'Total-Soft-Calendar' );?>
				</span>
				<i class="tsc_order_btn tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Reordering Events', 'Total-Soft-Calendar' );?>"></i>
				<button type="submit" class="tsc_button tsc_order_btn" name="tsc_order_events">
					<?php esc_html_e( 'Save Order', 'Total-Soft-Calendar' );?>
				</button>
				<i class="tsc_order_btn tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Reordering Events', 'Total-Soft-Calendar' );?>"></i>
				<span class="tsc_button tsc_order_btn" onclick="tsc_event_hide_save_btn()">
					<?php esc_html_e( 'Cancel', 'Total-Soft-Calendar' );?>
				</span>
			</div>
			<div class="tsc_cancel_btn" onmouseover="tsc_event_editor_set()">
				<i class="tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Canceling', 'Total-Soft-Calendar' );?>"></i>
				<span class="tsc_button" onclick="tsc_reload()">
					<?php esc_html_e( 'Cancel', 'Total-Soft-Calendar' );?>
				</span>
				<i class="tsc_event_save_btn tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Saving Settings', 'Total-Soft-Calendar' );?>"></i>
				<button type="submit" class="tsc_event_save_btn tsc_button" name="tsc_save_event">
					<?php esc_html_e( 'Save', 'Total-Soft-Calendar' );?>
				</button>
				<i class="tsc_event_update_btn tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Updating Settings', 'Total-Soft-Calendar' );?>"></i>
				<button type="submit" class="tsc_event_update_btn tsc_button" name="tsc_update_event">
					<?php esc_html_e( 'Update', 'Total-Soft-Calendar' );?>
				</button>
				<input type="text" style="display:none;" name="tsc_event_id" id="tsc_event_id">
			</div>
		</div>
		<table class="tsc_events_records_table_header">
			<tr class="tsc_records_table_tr">
				<td><?php esc_html_e( 'No', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Event Title', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Calendar Name', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Start Date', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Reorder', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Copy', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Edit', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Delete', 'Total-Soft-Calendar' );?></td>
			</tr>
		</table>
		<table class="tsc_events_records_table_body">
			<?php for($i=0;$i<count($tsc_all_events);$i++){
				$tsc_name=$wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_types_table WHERE id=%d", $tsc_all_events[$i]->TotalSoftCal_EvCal));
				?> 
				<tr id="tsc_event_record_<?php echo esc_html($tsc_all_events[$i]->id);?>">
					<td><?php echo esc_html($i+1);?></td>
					<td><?php echo esc_html($tsc_all_events[$i]->TotalSoftCal_EvName);?></td>
					<td><?php echo esc_html($tsc_name->TotalSoftCal_Name);?></td>
					<td><?php echo esc_html($tsc_all_events[$i]->TotalSoftCal_EvStartDate);?></td>
					<td>
						<i title="Move" class="tsc_icon totalsoft totalsoft-arrows" onmouseover="tsc_events_sort()"></i>
						<input type="text" style="display: none;" name="tsc_move_id_<?php echo esc_html($i+1);?>" value="<?php echo esc_html($tsc_all_events[$i]->id);?>">
					</td>
					<td><i title="Clone" class="tsc_icon totalsoft totalsoft-file-text" onclick="tsc_event_clone(<?php echo esc_js($tsc_all_events[$i]->id);?>)"></i></td>
					<td><i title="Edit" class="tsc_icon totalsoft totalsoft-pencil" onclick="tsc_event_edit(<?php echo esc_js($tsc_all_events[$i]->id);?>)"></i></td>
					<td>
						<i title="Delete" class="tsc_move_icon tsc_icon totalsoft totalsoft-trash" onclick="tsc_event_delete(<?php echo esc_js($tsc_all_events[$i]->id);?>)"></i>
						<span class="tsc_record_delete">
							<i class="tsc_delete_confirm_icon totalsoft totalsoft-check" onclick="tsc_event_delete_confirm(<?php echo esc_js($tsc_all_events[$i]->id);?>)"></i>
							<i class="tsc_delete_cancel_icon totalsoft totalsoft-times" onclick="tsc_event_delete_cancel(<?php echo esc_js($tsc_all_events[$i]->id);?>)"></i>
						</span>
					</td>
				</tr>
			<?php } ?>
		</table>
		<table class="tsc_event_options_table" onmouseover="tsc_event_editor_set()">
			<tr class="tsc_tab_title">
				<td colspan="4"><?php esc_html_e( 'Event', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Event Title', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can give a name for event.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="text" name="TotalSoftCal_EvName" id="TotalSoftCal_EvName" class="tsc_select" placeholder=" * <?php esc_html_e( 'Required', 'Total-Soft-Calendar' );?>"></td>
				<td><?php esc_html_e( 'Calendar Name', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose that version of calendar themes, in which you want to see the Events.', 'Total-Soft-Calendar' );?>"></i></td>
				<td>
					<select class="tsc_select" name="TotalSoftCal_EvCal" id="TotalSoftCal_EvCal">
						<?php for($i=0;$i<count($tsc_all_types);$i++){?>
							<option value="<?php echo esc_html($tsc_all_types[$i]->id);?>"><?php echo esc_html($tsc_all_types[$i]->TotalSoftCal_Name);?></option>
						<?php }?>
						<option value="" disabled>Crazy Calendar 1 (Pro)</option>
						<option value="" disabled>Crazy Calendar 2 (pro)</option>
						<option value="" disabled>Crazy Calendar 3 (pro)</option>
						<option value="" disabled>Schedule 1 (Pro)</option>
						<option value="" disabled>Schedule 2 (pro)</option>
						<option value="" disabled>Schedule 3 (pro)</option>
						<option value="" disabled>Full Year Calendar 1 (Pro)</option>
						<option value="" disabled>Full Year Calendar 2 (pro)</option>
						<option value="" disabled>Full Year Calendar 3 (pro)</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Start Date', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the start of the event.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="date" class="tsc_select" name="TotalSoftCal_EvStartDate" id="TotalSoftCal_EvStartDate" placeholder="<?php esc_html_e( 'yyyy-mm-dd', 'Total-Soft-Calendar' );?>"></td>
				<td><?php esc_html_e( 'End Date', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the finish time of the event.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="date" class="tsc_select" name="TotalSoftCal_EvEndDate" id="TotalSoftCal_EvEndDate" placeholder="<?php esc_html_e( 'yyyy-mm-dd', 'Total-Soft-Calendar' );?>"></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'URL', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set external URL in the calendar, which should be included in the event.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="text" name="TotalSoftCal_EvURL" id="TotalSoftCal_EvURL" class="tsc_select" placeholder=" * <?php esc_html_e( 'Optional', 'Total-Soft-Calendar' );?>"></td>
				<td><?php esc_html_e( 'Open In New Tab', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose, by clicking on the link should open in new tab or not.', 'Total-Soft-Calendar' );?>"></i></td>
				<td>
					<select class="tsc_select" name="TotalSoftCal_EvURLNewTab" id="TotalSoftCal_EvURLNewTab">
						<option value="_blank"><?php esc_html_e( 'Open In New Tab', 'Total-Soft-Calendar' );?></option>
						<option value="none"><?php esc_html_e( 'Open In Same Tab', 'Total-Soft-Calendar' );?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Start Time', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the event start time.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="time" name="TotalSoftCal_EvStartTime" id="TotalSoftCal_EvStartTime" placeholder="<?php esc_html_e( 'hh:mm', 'Total-Soft-Calendar' );?>"></td>
				<td><?php esc_html_e( 'End Time', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the event end time.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="time" name="TotalSoftCal_EvEndTime" id="TotalSoftCal_EvEndTime" placeholder="<?php esc_html_e( 'hh:mm', 'Total-Soft-Calendar' );?>"></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Event Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select that color, which you want to see for your event, which shows in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
				<td><input type="text" name="TotalSoftCal_EvColor" id="TotalSoftCal_EvColor" class="tsc_color_input" value="#ffffff"></td>
				<td colspan="2"><?php esc_html_e( 'Event Color option is only for Event, TimeLine, Crazy, Schedule and Full Year Types.', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr>
				<td>
					<div id="wp-content-media-buttons" class="wp-media-buttons" >
						<a href="#" class="button insert-media add_media" style="border:1px solid #009491; color:#009491; background-color:#f4f4f4" data-editor="tsc_wp_media_url" title="Add Media" id="TotalSoftCalendar_URL" onclick="tsc_event_media()">
							<span class="wp-media-buttons-icon"></span>Add Media
						</a>
					</div>
					<input type="text" style="display:none;" id="tsc_wp_media_url">
				</td>
				<td style="position: relative;">
					<input type="text" id="tsc_event_iframe" name="tsc_event_iframe" readonly class="tsc_select">
					<i class="tsc_media_empty totalsoft totalsoft-times" aria-hidden="true" onclick="tsc_event_media_empty()"></i>
					<input type="text" id="tsc_event_video" name="tsc_event_video" class="tsc_select" style="display:none;">
					<input type="text" id="tsc_event_image" name="tsc_event_image" class="tsc_select" style="display:none;">
				</td>
				<td><?php esc_html_e( 'Recurring Time', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can set a period for event recur.', 'Total-Soft-Calendar' );?>"></i></td>
				<td>
					<select class="tsc_select" name="" id="TotalSoftCal_EvRec">
						<option value="none">    <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>    </option>
						<option value="daily">   <?php esc_html_e( 'Daily', 'Total-Soft-Calendar' );?>   </option>
						<option value="weekly">  <?php esc_html_e( 'Weekly', 'Total-Soft-Calendar' );?>  </option>
						<option value="monthly"> <?php esc_html_e( 'Monthly', 'Total-Soft-Calendar' );?> </option>
						<option value="yearly">  <?php esc_html_e( 'Yearly', 'Total-Soft-Calendar' );?>  </option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><?php esc_html_e( 'Event Description', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can give a description for event.', 'Total-Soft-Calendar' );?>"></i></td>
			</tr>
			<tr>
				<td colspan="4">
					<textarea id="TotalSoftCal_EvDesc" name="TotalSoftCal_EvDesc"></textarea>
					<input type="text" style="display: none;" id="tsc_event_description" name="tsc_event_description">
				</td>
			</tr>
		</table>
	</form>