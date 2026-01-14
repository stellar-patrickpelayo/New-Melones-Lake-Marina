<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Calendar-Data.php');
	global $wpdb;
	$tsc_event_calendar_table  = $wpdb->prefix . "totalsoft_cal_1";
	$tsc_ids_table  = $wpdb->prefix . "totalsoft_cal_ids";
	$tsc_events_table  = $wpdb->prefix . "totalsoft_cal_events";
	$tsc_types_table  = $wpdb->prefix . "totalsoft_cal_types";
	$tsc_simple_calendar_table  = $wpdb->prefix . "totalsoft_cal_2";
	$tsc_flexible_calendar_table  = $wpdb->prefix . "totalsoft_cal_3";
	$tsc_settings_table  = $wpdb->prefix . "totalsoft_cal_part";
	$tsc_timeline_calendar_table  = $wpdb->prefix . "totalsoft_cal_4";
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		if(check_admin_referer( 'ts_calendar_nonce_field', 'ts_calendar_nonce' )) {
			$TotalSoftCal_Name = sanitize_text_field($_POST['TotalSoftCal_Name']);
			$TotalSoftCal_Type = sanitize_text_field($_POST['TotalSoftCal_Type']);
			//Event Calendar
			$TotalSoftCal_BackIconType = sanitize_text_field($_POST['TotalSoftCal_BackIconType']);
			$TotalSoftCal_BgCol = sanitize_text_field($_POST['TotalSoftCal_BgCol']); $TotalSoftCal_GrCol = sanitize_text_field($_POST['TotalSoftCal_GrCol']); $TotalSoftCal_GW = sanitize_text_field($_POST['TotalSoftCal_GW']); $TotalSoftCal_BW = sanitize_text_field($_POST['TotalSoftCal_BW']); $TotalSoftCal_BStyle = sanitize_text_field($_POST['TotalSoftCal_BStyle']); $TotalSoftCal_BCol = sanitize_text_field($_POST['TotalSoftCal_BCol']); $TotalSoftCal_BSCol = sanitize_text_field($_POST['TotalSoftCal_BSCol']); $TotalSoftCal_MW = sanitize_text_field($_POST['TotalSoftCal_MW']); $TotalSoftCal_HBgCol = sanitize_text_field($_POST['TotalSoftCal_HBgCol']); $TotalSoftCal_HCol = sanitize_text_field($_POST['TotalSoftCal_HCol']); $TotalSoftCal_HFS = sanitize_text_field($_POST['TotalSoftCal_HFS']); $TotalSoftCal_HFF = sanitize_text_field($_POST['TotalSoftCal_HFF']); $TotalSoftCal_WBgCol = sanitize_text_field($_POST['TotalSoftCal_WBgCol']); $TotalSoftCal_WCol = sanitize_text_field($_POST['TotalSoftCal_WCol']); $TotalSoftCal_WFS = sanitize_text_field($_POST['TotalSoftCal_WFS']); $TotalSoftCal_WFF = sanitize_text_field($_POST['TotalSoftCal_WFF']); $TotalSoftCal_LAW = sanitize_text_field($_POST['TotalSoftCal_LAW']); $TotalSoftCal_LAWS = sanitize_text_field($_POST['TotalSoftCal_LAWS']); $TotalSoftCal_LAWC = sanitize_text_field($_POST['TotalSoftCal_LAWC']); $TotalSoftCal_DBgCol = sanitize_text_field($_POST['TotalSoftCal_DBgCol']); $TotalSoftCal_DCol = sanitize_text_field($_POST['TotalSoftCal_DCol']); $TotalSoftCal_DFS = sanitize_text_field($_POST['TotalSoftCal_DFS']); $TotalSoftCal_TBgCol = sanitize_text_field($_POST['TotalSoftCal_TBgCol']); $TotalSoftCal_TCol = sanitize_text_field($_POST['TotalSoftCal_TCol']); $TotalSoftCal_TFS = sanitize_text_field($_POST['TotalSoftCal_TFS']); $TotalSoftCal_TNBgCol = sanitize_text_field($_POST['TotalSoftCal_TNBgCol']); $TotalSoftCal_HovBgCol = sanitize_text_field($_POST['TotalSoftCal_HovBgCol']); $TotalSoftCal_HovCol = sanitize_text_field($_POST['TotalSoftCal_HovCol']); $TotalSoftCal_NumPos = sanitize_text_field($_POST['TotalSoftCal_NumPos']); $TotalSoftCal_WDStart = sanitize_text_field($_POST['TotalSoftCal_WDStart']); $TotalSoftCal_RefIcCol = sanitize_text_field($_POST['TotalSoftCal_RefIcCol']); $TotalSoftCal_RefIcSize = sanitize_text_field($_POST['TotalSoftCal_RefIcSize']); $TotalSoftCal_ArrowType = sanitize_text_field($_POST['TotalSoftCal_ArrowType']); $TotalSoftCal_BSType = sanitize_text_field($_POST['TotalSoftCal_BSType']); $TotalSoftCal_DFF = sanitize_text_field($_POST['TotalSoftCal_DFF']);
			if($TotalSoftCal_ArrowType=='1'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-angle-double-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-angle-double-right'; }
			else if($TotalSoftCal_ArrowType=='2'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-angle-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-angle-right'; }
			else if($TotalSoftCal_ArrowType=='3'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-arrow-circle-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-arrow-circle-right'; }
			else if($TotalSoftCal_ArrowType=='4'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-arrow-circle-o-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-arrow-circle-o-right'; }
			else if($TotalSoftCal_ArrowType=='5'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-arrow-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-arrow-right'; }
			else if($TotalSoftCal_ArrowType=='6'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-caret-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-caret-right'; }
			else if($TotalSoftCal_ArrowType=='7'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-caret-square-o-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-caret-square-o-right'; }
			else if($TotalSoftCal_ArrowType=='8'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-chevron-circle-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-chevron-circle-right'; }
			else if($TotalSoftCal_ArrowType=='9'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-chevron-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-chevron-right'; }
			else if($TotalSoftCal_ArrowType=='10'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-hand-o-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-hand-o-right'; }
			else if($TotalSoftCal_ArrowType=='11'){ $TotalSoftCal_ArrowLeft='totalsoft totalsoft-long-arrow-left'; $TotalSoftCal_ArrowRight='totalsoft totalsoft-long-arrow-right'; }
			$TotalSoftCal_ArrowCol = sanitize_text_field($_POST['TotalSoftCal_ArrowCol']); $TotalSoftCal_ArrowSize = sanitize_text_field($_POST['TotalSoftCal_ArrowSize']); $TotalSoftCal1_Ev_T_FS = sanitize_text_field($_POST['TotalSoftCal1_Ev_T_FS']); $TotalSoftCal1_Ev_T_FF = sanitize_text_field($_POST['TotalSoftCal1_Ev_T_FF']); $TotalSoftCal1_Ev_T_C = sanitize_text_field($_POST['TotalSoftCal1_Ev_T_C']); $TotalSoftCal1_Ev_T_TA = sanitize_text_field($_POST['TotalSoftCal1_Ev_T_TA']); $TotalSoftCal1_Ev_TiF = sanitize_text_field($_POST['TotalSoftCal1_Ev_TiF']); $TotalSoftCal1_Ev_I_W = sanitize_text_field($_POST['TotalSoftCal1_Ev_I_W']); $TotalSoftCal1_Ev_I_Pos = sanitize_text_field($_POST['TotalSoftCal1_Ev_I_Pos']);
			//Simple Calendar
			$TotalSoftCal2_WDStart = sanitize_text_field($_POST['TotalSoftCal2_WDStart']); $TotalSoftCal2_BW = sanitize_text_field($_POST['TotalSoftCal2_BW']); $TotalSoftCal2_BS = sanitize_text_field($_POST['TotalSoftCal2_BS']); $TotalSoftCal2_BC = sanitize_text_field($_POST['TotalSoftCal2_BC']); $TotalSoftCal2_W = sanitize_text_field($_POST['TotalSoftCal2_W']); $TotalSoftCal2_H = sanitize_text_field($_POST['TotalSoftCal2_H']); $TotalSoftCal2_BxShShow = sanitize_text_field($_POST['TotalSoftCal2_BxShShow']); $TotalSoftCal2_BxShType = sanitize_text_field($_POST['TotalSoftCal2_BxShType']); $TotalSoftCal2_BxSh = ''; $TotalSoftCal2_BxShC = sanitize_text_field($_POST['TotalSoftCal2_BxShC']); $TotalSoftCal2_MBgC = sanitize_text_field($_POST['TotalSoftCal2_MBgC']); $TotalSoftCal2_MC = sanitize_text_field($_POST['TotalSoftCal2_MC']); $TotalSoftCal2_MFS = sanitize_text_field($_POST['TotalSoftCal2_MFS']); $TotalSoftCal2_MFF = sanitize_text_field($_POST['TotalSoftCal2_MFF']); $TotalSoftCal2_WBgC = sanitize_text_field($_POST['TotalSoftCal2_WBgC']); $TotalSoftCal2_WC = sanitize_text_field($_POST['TotalSoftCal2_WC']); $TotalSoftCal2_WFS = sanitize_text_field($_POST['TotalSoftCal2_WFS']); $TotalSoftCal2_WFF = sanitize_text_field($_POST['TotalSoftCal2_WFF']); $TotalSoftCal2_LAW_W = sanitize_text_field($_POST['TotalSoftCal2_LAW_W']); $TotalSoftCal2_LAW_S = sanitize_text_field($_POST['TotalSoftCal2_LAW_S']); $TotalSoftCal2_LAW_C = sanitize_text_field($_POST['TotalSoftCal2_LAW_C']); $TotalSoftCal2_DBgC = sanitize_text_field($_POST['TotalSoftCal2_DBgC']); $TotalSoftCal2_DC = sanitize_text_field($_POST['TotalSoftCal2_DC']); $TotalSoftCal2_DFS = sanitize_text_field($_POST['TotalSoftCal2_DFS']); $TotalSoftCal2_TdBgC = sanitize_text_field($_POST['TotalSoftCal2_TdBgC']); $TotalSoftCal2_TdC = sanitize_text_field($_POST['TotalSoftCal2_TdC']); $TotalSoftCal2_TdFS = sanitize_text_field($_POST['TotalSoftCal2_TdFS']); $TotalSoftCal2_EdBgC = sanitize_text_field($_POST['TotalSoftCal2_EdBgC']); $TotalSoftCal2_EdC = sanitize_text_field($_POST['TotalSoftCal2_EdC']); $TotalSoftCal2_EdFS = sanitize_text_field($_POST['TotalSoftCal2_EdFS']); $TotalSoftCal2_HBgC = sanitize_text_field($_POST['TotalSoftCal2_HBgC']); $TotalSoftCal2_HC = sanitize_text_field($_POST['TotalSoftCal2_HC']); $TotalSoftCal2_ArrType = sanitize_text_field($_POST['TotalSoftCal2_ArrType']); $TotalSoftCal2_ArrFS = sanitize_text_field($_POST['TotalSoftCal2_ArrFS']); $TotalSoftCal2_ArrC = sanitize_text_field($_POST['TotalSoftCal2_ArrC']); $TotalSoftCal2_OmBgC = sanitize_text_field($_POST['TotalSoftCal2_OmBgC']); $TotalSoftCal2_OmC = sanitize_text_field($_POST['TotalSoftCal2_OmC']); $TotalSoftCal2_OmFS = sanitize_text_field($_POST['TotalSoftCal2_OmFS']); $TotalSoftCal2_Ev_HBgC = sanitize_text_field($_POST['TotalSoftCal2_Ev_HBgC']); $TotalSoftCal2_Ev_HC = sanitize_text_field($_POST['TotalSoftCal2_Ev_HC']); $TotalSoftCal2_Ev_HFS = sanitize_text_field($_POST['TotalSoftCal2_Ev_HFS']); $TotalSoftCal2_Ev_HFF = sanitize_text_field($_POST['TotalSoftCal2_Ev_HFF']); $TotalSoftCal2_Ev_HText = sanitize_text_field($_POST['TotalSoftCal2_Ev_HText']); $TotalSoftCal2_Ev_BBgC = sanitize_text_field($_POST['TotalSoftCal2_Ev_BBgC']); $TotalSoftCal2_Ev_TC = sanitize_text_field($_POST['TotalSoftCal2_Ev_TC']); $TotalSoftCal2_Ev_TFF = sanitize_text_field($_POST['TotalSoftCal2_Ev_TFF']); $TotalSoftCal2_Ev_TFS = sanitize_text_field($_POST['TotalSoftCal2_Ev_TFS']); $TotalSoftCal2_Ev_T_TA = sanitize_text_field($_POST['TotalSoftCal2_Ev_T_TA']); $TotalSoftCal2_Ev_I_W = sanitize_text_field($_POST['TotalSoftCal2_Ev_I_W']); $TotalSoftCal2_Ev_I_Pos = sanitize_text_field($_POST['TotalSoftCal2_Ev_I_Pos']); $TotalSoftCal2_Ev_TiF = sanitize_text_field($_POST['TotalSoftCal2_Ev_TiF']); $TotalSoftCal2_Ev_DaF = sanitize_text_field($_POST['TotalSoftCal2_Ev_DaF']); $TotalSoftCal2_Ev_ShDate = sanitize_text_field($_POST['TotalSoftCal2_Ev_ShDate']);
			//Flexible Calendar
			$TotalSoftCal3_MW = sanitize_text_field($_POST['TotalSoftCal3_MW']); $TotalSoftCal3_WDStart = sanitize_text_field($_POST['TotalSoftCal3_WDStart']); $TotalSoftCal3_BoxShShow = sanitize_text_field($_POST['TotalSoftCal3_BoxShShow']); $TotalSoftCal3_H_FF = sanitize_text_field($_POST['TotalSoftCal3_H_FF']); $TotalSoftCal3_H_MFS = sanitize_text_field($_POST['TotalSoftCal3_H_MFS']); $TotalSoftCal3_H_YFS = sanitize_text_field($_POST['TotalSoftCal3_H_YFS']); $TotalSoftCal3_Arr_S = sanitize_text_field($_POST['TotalSoftCal3_Arr_S']); $TotalSoftCal3_WD_FS = sanitize_text_field($_POST['TotalSoftCal3_WD_FS']); $TotalSoftCal3_WD_FF = sanitize_text_field($_POST['TotalSoftCal3_WD_FF']); $TotalSoftCal3_Ev_FS = sanitize_text_field($_POST['TotalSoftCal3_Ev_FS']); $TotalSoftCal3_Ev_FF = sanitize_text_field($_POST['TotalSoftCal3_Ev_FF']); $TotalSoftCal3_Ev_C_FS = sanitize_text_field($_POST['TotalSoftCal3_Ev_C_FS']); $TotalSoftCal3_Ev_T_FS = sanitize_text_field($_POST['TotalSoftCal3_Ev_T_FS']); $TotalSoftCal3_Ev_T_FF = sanitize_text_field($_POST['TotalSoftCal3_Ev_T_FF']); $TotalSoftCal3_Ev_T_TA = sanitize_text_field($_POST['TotalSoftCal3_Ev_T_TA']); $TotalSoftCal3_Ev_I_W = sanitize_text_field($_POST['TotalSoftCal3_Ev_I_W']); $TotalSoftCal3_Ev_L_Text = sanitize_text_field($_POST['TotalSoftCal3_Ev_L_Text']); $TotalSoftCal3_Ev_LAE_W = sanitize_text_field($_POST['TotalSoftCal3_Ev_LAE_W']); $TotalSoftCal3_Ev_L_FS = sanitize_text_field($_POST['TotalSoftCal3_Ev_L_FS']); $TotalSoftCal3_Ev_L_FF = sanitize_text_field($_POST['TotalSoftCal3_Ev_L_FF']); $TotalSoftCal3_Ev_L_BW = sanitize_text_field($_POST['TotalSoftCal3_Ev_L_BW']); $TotalSoftCal3_Ev_L_BR = sanitize_text_field($_POST['TotalSoftCal3_Ev_L_BR']);
			//TimeLine Calendar
			$TotalSoftCal4_01 = sanitize_text_field($_POST['TotalSoftCal4_01']); $TotalSoftCal4_04 = sanitize_text_field($_POST['TotalSoftCal4_04']); $TotalSoftCal4_05 = sanitize_text_field($_POST['TotalSoftCal4_05']); $TotalSoftCal4_10 = sanitize_text_field($_POST['TotalSoftCal4_10']); $TotalSoftCal4_11 = sanitize_text_field($_POST['TotalSoftCal4_11']); $TotalSoftCal4_15 = sanitize_text_field($_POST['TotalSoftCal4_15']); $TotalSoftCal4_20 = sanitize_text_field($_POST['TotalSoftCal4_20']); $TotalSoftCal4_21 = sanitize_text_field($_POST['TotalSoftCal4_21']); $TotalSoftCal4_26 = sanitize_text_field($_POST['TotalSoftCal4_26']); $TotalSoftCal4_28 = sanitize_text_field($_POST['TotalSoftCal4_28']); $TotalSoftCal4_33 = sanitize_text_field($_POST['TotalSoftCal4_33']); $TotalSoftCal4_37 = sanitize_text_field($_POST['TotalSoftCal4_37']); $TotalSoftCal4_38 = sanitize_text_field($_POST['TotalSoftCal4_38']);
			$TotalSoftCal_4_05 = sanitize_text_field($_POST['TotalSoftCal_4_05']); $TotalSoftCal_4_06 = sanitize_text_field($_POST['TotalSoftCal_4_06']); $TotalSoftCal_4_09 = sanitize_text_field($_POST['TotalSoftCal_4_09']); $TotalSoftCal_4_10 = sanitize_text_field($_POST['TotalSoftCal_4_10']); $TotalSoftCal_4_15 = sanitize_text_field($_POST['TotalSoftCal_4_15']); $TotalSoftCal_4_16 = sanitize_text_field($_POST['TotalSoftCal_4_16']); $TotalSoftCal_4_17 = sanitize_text_field($_POST['TotalSoftCal_4_17']); $TotalSoftCal_4_19 = sanitize_text_field($_POST['TotalSoftCal_4_19']); $TotalSoftCal_4_20 = sanitize_text_field($_POST['TotalSoftCal_4_20']); $TotalSoftCal_4_22 = sanitize_text_field($_POST['TotalSoftCal_4_22']); $TotalSoftCal_4_23 = sanitize_text_field($_POST['TotalSoftCal_4_23']); $TotalSoftCal_4_25 = sanitize_text_field($_POST['TotalSoftCal_4_25']); $TotalSoftCal_4_26 = sanitize_text_field($_POST['TotalSoftCal_4_26']); $TotalSoftCal_4_28 = sanitize_text_field($_POST['TotalSoftCal_4_28']);
			if(isset($_POST['tsc_update_btn'])) {
				$tsc_update_id = sanitize_text_field($_POST['tsc_update_id']);
				$wpdb->query($wpdb->prepare("UPDATE $tsc_types_table set TotalSoftCal_Name=%s, TotalSoftCal_Type=%s WHERE id=%d", $TotalSoftCal_Name, $TotalSoftCal_Type, $tsc_update_id));
				if($TotalSoftCal_Type=='Event Calendar') {
					$wpdb->query($wpdb->prepare("UPDATE $tsc_event_calendar_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_BgCol = %s, TotalSoftCal_GrCol = %s, TotalSoftCal_GW = %s, TotalSoftCal_BW = %s, TotalSoftCal_BStyle = %s, TotalSoftCal_BCol = %s, TotalSoftCal_BSCol = %s, TotalSoftCal_MW = %s, TotalSoftCal_HBgCol = %s, TotalSoftCal_HCol = %s, TotalSoftCal_HFS = %s, TotalSoftCal_HFF = %s, TotalSoftCal_WBgCol = %s, TotalSoftCal_WCol = %s, TotalSoftCal_WFS = %s, TotalSoftCal_WFF = %s, TotalSoftCal_LAW = %s, TotalSoftCal_LAWS = %s, TotalSoftCal_LAWC = %s, TotalSoftCal_DBgCol = %s, TotalSoftCal_DCol = %s, TotalSoftCal_DFS = %s, TotalSoftCal_TBgCol = %s, TotalSoftCal_TCol = %s, TotalSoftCal_TFS = %s, TotalSoftCal_TNBgCol = %s, TotalSoftCal_HovBgCol = %s, TotalSoftCal_HovCol = %s, TotalSoftCal_NumPos = %s, TotalSoftCal_WDStart = %s, TotalSoftCal_RefIcCol = %s, TotalSoftCal_RefIcSize = %s, TotalSoftCal_ArrowType = %s, TotalSoftCal_ArrowLeft = %s, TotalSoftCal_ArrowRight = %s, TotalSoftCal_ArrowCol = %s, TotalSoftCal_ArrowSize = %s, TotalSoftCal_BackIconType = %s, TotalSoftCal_DFF = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal_BgCol, $TotalSoftCal_GrCol, $TotalSoftCal_GW, $TotalSoftCal_BW, $TotalSoftCal_BStyle, $TotalSoftCal_BCol, $TotalSoftCal_BSCol, $TotalSoftCal_MW, $TotalSoftCal_HBgCol, $TotalSoftCal_HCol, $TotalSoftCal_HFS, $TotalSoftCal_HFF, $TotalSoftCal_WBgCol, $TotalSoftCal_WCol, $TotalSoftCal_WFS, $TotalSoftCal_WFF, $TotalSoftCal_LAW, $TotalSoftCal_LAWS, $TotalSoftCal_LAWC, $TotalSoftCal_DBgCol, $TotalSoftCal_DCol, $TotalSoftCal_DFS, $TotalSoftCal_TBgCol, $TotalSoftCal_TCol, $TotalSoftCal_TFS, $TotalSoftCal_TNBgCol, $TotalSoftCal_HovBgCol, $TotalSoftCal_HovCol, $TotalSoftCal_NumPos, $TotalSoftCal_WDStart, $TotalSoftCal_RefIcCol, $TotalSoftCal_RefIcSize, $TotalSoftCal_ArrowType, $TotalSoftCal_ArrowLeft, $TotalSoftCal_ArrowRight, $TotalSoftCal_ArrowCol, $TotalSoftCal_ArrowSize, $TotalSoftCal_BackIconType, $TotalSoftCal_DFF, $tsc_update_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_settings_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_01 = %s, TotalSoftCal_02 = %s, TotalSoftCal_03 = %s, TotalSoftCal_04 = %s, TotalSoftCal_05 = %s, TotalSoftCal_06 = %s, TotalSoftCal_07 = %s, TotalSoftCal_08 = %s, TotalSoftCal_09 = %s, TotalSoftCal_10 = %s, TotalSoftCal_11 = %s, TotalSoftCal_12 = %s, TotalSoftCal_13 = %s, TotalSoftCal_14 = %s, TotalSoftCal_15 = %s, TotalSoftCal_16 = %s, TotalSoftCal_17 = %s, TotalSoftCal_18 = %s, TotalSoftCal_19 = %s, TotalSoftCal_20 = %s, TotalSoftCal_21 = %s, TotalSoftCal_22 = %s, TotalSoftCal_23 = %s, TotalSoftCal_24 = %s, TotalSoftCal_25 = %s, TotalSoftCal_26 = %s, TotalSoftCal_27 = %s, TotalSoftCal_28 = %s, TotalSoftCal_29 = %s, TotalSoftCal_30 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal1_Ev_T_FS, $TotalSoftCal1_Ev_T_FF, $TotalSoftCal1_Ev_T_C, $TotalSoftCal1_Ev_T_TA, $TotalSoftCal1_Ev_TiF, $TotalSoftCal_BSType, '', '', $TotalSoftCal1_Ev_I_W, $TotalSoftCal1_Ev_I_Pos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $tsc_update_id));
				} else if($TotalSoftCal_Type=='Simple Calendar') {
					$wpdb->query($wpdb->prepare("UPDATE $tsc_simple_calendar_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal2_WDStart = %s, TotalSoftCal2_BW = %s, TotalSoftCal2_BS = %s, TotalSoftCal2_BC = %s, TotalSoftCal2_W = %s, TotalSoftCal2_H = %s, TotalSoftCal2_BxShShow = %s, TotalSoftCal2_BxShType = %s, TotalSoftCal2_BxSh = %s, TotalSoftCal2_BxShC = %s, TotalSoftCal2_MBgC = %s, TotalSoftCal2_MC = %s, TotalSoftCal2_MFS = %s, TotalSoftCal2_MFF = %s, TotalSoftCal2_WBgC = %s, TotalSoftCal2_WC = %s, TotalSoftCal2_WFS = %s, TotalSoftCal2_WFF = %s, TotalSoftCal2_LAW_W = %s, TotalSoftCal2_LAW_S = %s, TotalSoftCal2_LAW_C = %s, TotalSoftCal2_DBgC = %s, TotalSoftCal2_DC = %s, TotalSoftCal2_DFS = %s, TotalSoftCal2_TdBgC = %s, TotalSoftCal2_TdC = %s, TotalSoftCal2_TdFS = %s, TotalSoftCal2_EdBgC = %s, TotalSoftCal2_EdC = %s, TotalSoftCal2_EdFS = %s, TotalSoftCal2_HBgC = %s, TotalSoftCal2_HC = %s, TotalSoftCal2_ArrType = %s, TotalSoftCal2_ArrFS = %s, TotalSoftCal2_ArrC = %s, TotalSoftCal2_OmBgC = %s, TotalSoftCal2_OmC = %s, TotalSoftCal2_OmFS = %s, TotalSoftCal2_Ev_HBgC = %s, TotalSoftCal2_Ev_HC = %s, TotalSoftCal2_Ev_HFS = %s, TotalSoftCal2_Ev_HFF = %s, TotalSoftCal2_Ev_HText = %s, TotalSoftCal2_Ev_BBgC = %s, TotalSoftCal2_Ev_TC = %s, TotalSoftCal2_Ev_TFF = %s, TotalSoftCal2_Ev_TFS = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal2_WDStart, $TotalSoftCal2_BW, $TotalSoftCal2_BS, $TotalSoftCal2_BC, $TotalSoftCal2_W, $TotalSoftCal2_H, $TotalSoftCal2_BxShShow, $TotalSoftCal2_BxShType, $TotalSoftCal2_BxSh, $TotalSoftCal2_BxShC, $TotalSoftCal2_MBgC, $TotalSoftCal2_MC, $TotalSoftCal2_MFS, $TotalSoftCal2_MFF, $TotalSoftCal2_WBgC, $TotalSoftCal2_WC, $TotalSoftCal2_WFS, $TotalSoftCal2_WFF, $TotalSoftCal2_LAW_W, $TotalSoftCal2_LAW_S, $TotalSoftCal2_LAW_C, $TotalSoftCal2_DBgC, $TotalSoftCal2_DC, $TotalSoftCal2_DFS, $TotalSoftCal2_TdBgC, $TotalSoftCal2_TdC, $TotalSoftCal2_TdFS, $TotalSoftCal2_EdBgC, $TotalSoftCal2_EdC, $TotalSoftCal2_EdFS, $TotalSoftCal2_HBgC, $TotalSoftCal2_HC, $TotalSoftCal2_ArrType, $TotalSoftCal2_ArrFS, $TotalSoftCal2_ArrC, $TotalSoftCal2_OmBgC, $TotalSoftCal2_OmC, $TotalSoftCal2_OmFS, $TotalSoftCal2_Ev_HBgC, $TotalSoftCal2_Ev_HC, $TotalSoftCal2_Ev_HFS, $TotalSoftCal2_Ev_HFF, $TotalSoftCal2_Ev_HText, $TotalSoftCal2_Ev_BBgC, $TotalSoftCal2_Ev_TC, $TotalSoftCal2_Ev_TFF, $TotalSoftCal2_Ev_TFS, $tsc_update_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_settings_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_01 = %s, TotalSoftCal_02 = %s, TotalSoftCal_03 = %s, TotalSoftCal_04 = %s, TotalSoftCal_05 = %s, TotalSoftCal_06 = %s, TotalSoftCal_07 = %s, TotalSoftCal_08 = %s, TotalSoftCal_09 = %s, TotalSoftCal_10 = %s, TotalSoftCal_11 = %s, TotalSoftCal_12 = %s, TotalSoftCal_13 = %s, TotalSoftCal_14 = %s, TotalSoftCal_15 = %s, TotalSoftCal_16 = %s, TotalSoftCal_17 = %s, TotalSoftCal_18 = %s, TotalSoftCal_19 = %s, TotalSoftCal_20 = %s, TotalSoftCal_21 = %s, TotalSoftCal_22 = %s, TotalSoftCal_23 = %s, TotalSoftCal_24 = %s, TotalSoftCal_25 = %s, TotalSoftCal_26 = %s, TotalSoftCal_27 = %s, TotalSoftCal_28 = %s, TotalSoftCal_29 = %s, TotalSoftCal_30 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal2_Ev_T_TA, $TotalSoftCal2_Ev_I_W, $TotalSoftCal2_Ev_I_Pos, $TotalSoftCal2_Ev_TiF, $TotalSoftCal2_Ev_DaF, $TotalSoftCal2_Ev_ShDate, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $tsc_update_id));
				} else if($TotalSoftCal_Type=='Flexible Calendar') {
					$wpdb->query($wpdb->prepare("UPDATE $tsc_flexible_calendar_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal3_MW = %s, TotalSoftCal3_WDStart = %s, TotalSoftCal3_BoxShShow = %s, TotalSoftCal3_H_FF = %s, TotalSoftCal3_H_MFS = %s, TotalSoftCal3_H_YFS = %s, TotalSoftCal3_Arr_S = %s, TotalSoftCal3_WD_FS = %s, TotalSoftCal3_WD_FF = %s, TotalSoftCal3_Ev_FS = %s, TotalSoftCal3_Ev_FF = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal3_MW, $TotalSoftCal3_WDStart, $TotalSoftCal3_BoxShShow, $TotalSoftCal3_H_FF, $TotalSoftCal3_H_MFS, $TotalSoftCal3_H_YFS, $TotalSoftCal3_Arr_S, $TotalSoftCal3_WD_FS, $TotalSoftCal3_WD_FF, $TotalSoftCal3_Ev_FS, $TotalSoftCal3_Ev_FF, $tsc_update_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_settings_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_05 = %s, TotalSoftCal_10 = %s, TotalSoftCal_11 = %s, TotalSoftCal_14 = %s, TotalSoftCal_15 = %s, TotalSoftCal_20 = %s, TotalSoftCal_21 = %s, TotalSoftCal_23 = %s, TotalSoftCal_24 = %s, TotalSoftCal_25 = %s, TotalSoftCal_27 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal3_Ev_C_FS, $TotalSoftCal3_Ev_T_FS, $TotalSoftCal3_Ev_T_FF, $TotalSoftCal3_Ev_T_TA, $TotalSoftCal3_Ev_I_W, $TotalSoftCal3_Ev_L_Text, $TotalSoftCal3_Ev_LAE_W, $TotalSoftCal3_Ev_L_FS, $TotalSoftCal3_Ev_L_FF, $TotalSoftCal3_Ev_L_BW, $TotalSoftCal3_Ev_L_BR, $tsc_update_id));
				} else if($TotalSoftCal_Type=='TimeLine Calendar') {
					$wpdb->query($wpdb->prepare("UPDATE $tsc_timeline_calendar_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal4_01 = %s, TotalSoftCal4_04 = %s, TotalSoftCal4_05 = %s, TotalSoftCal4_10 = %s, TotalSoftCal4_11 = %s, TotalSoftCal4_15 = %s, TotalSoftCal4_20 = %s, TotalSoftCal4_21 = %s, TotalSoftCal4_26 = %s, TotalSoftCal4_28 = %s, TotalSoftCal4_33 = %s, TotalSoftCal4_37 = %s, TotalSoftCal4_38 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal4_01, $TotalSoftCal4_04, $TotalSoftCal4_05, $TotalSoftCal4_10, $TotalSoftCal4_11, $TotalSoftCal4_15, $TotalSoftCal4_20, $TotalSoftCal4_21, $TotalSoftCal4_26, $TotalSoftCal4_28, $TotalSoftCal4_33, $TotalSoftCal4_37, $TotalSoftCal4_38, $tsc_update_id));
					$wpdb->query($wpdb->prepare("UPDATE $tsc_settings_table set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_05 = %s, TotalSoftCal_06 = %s, TotalSoftCal_09 = %s, TotalSoftCal_10 = %s, TotalSoftCal_15 = %s, TotalSoftCal_16 = %s, TotalSoftCal_17 = %s, TotalSoftCal_19 = %s, TotalSoftCal_20 = %s, TotalSoftCal_22 = %s, TotalSoftCal_23 = %s, TotalSoftCal_25 = %s, TotalSoftCal_26 = %s, TotalSoftCal_28 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal_4_05, $TotalSoftCal_4_06, $TotalSoftCal_4_09, $TotalSoftCal_4_10, $TotalSoftCal_4_15, $TotalSoftCal_4_16, $TotalSoftCal_4_17, $TotalSoftCal_4_19, $TotalSoftCal_4_20, $TotalSoftCal_4_22, $TotalSoftCal_4_23, $TotalSoftCal_4_25, $TotalSoftCal_4_26, $TotalSoftCal_4_28, $tsc_update_id));
				}
			}
		} else {
			wp_die('Security check fail'); 
		}
	}
	$tsc_fonts = array('Amaranth','Anton','Battambang','Baumans','Bungee Shade','Butcherman','Cabin','Cabin Sketch','Cairo','Damion' ,'Eagle Lake','East Sea Dokdo','Fira Sans Condensed' ,'Fira Sans Extra Condensed','Gafata' ,'Jacques Francois','Headland One','Katibeh','Monsieur La Doulaise','Mr De Haviland','Nova Script','Nova Square','Odor Mean Chey','Offside','Old Standard TT' ,'Oldenburg','Oxygen' ,'Oxygen Mono','Princess Sofia','Prociono','Prompt' ,'Prosto One','Proza Libre','Quicksand','Quintessential','Qwigley','Racing Sans One' ,'Radley' ,'Rajdhani','Rakkas' ,'Raleway','Raleway Dots','Ramabhadra','Ramaraja','Rosarivo','Revalia','Siemreap','Sigmar One','Signika','Signika Negative','Simonetta','Tajawal','Tangerine','Taprom' ,'Tauri','Taviraj','Teko','Telex','Tenali Ramakrishna'  ,'Tenor Sans','Text Me One','The Girl Next Door'  ,'Tienne' ,'Tillana','Timmana','Tinos','Titan One');
	$tsc_all_records = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_types_table WHERE id>%d", 0));
	wp_register_style( 'total_soft_calendar_css', plugins_url('../CSS/totalsoft.css',__FILE__) );
	wp_enqueue_style( 'total_soft_calendar_css' );
	wp_register_style( 'tsc_fonts', plugins_url('../CSS/total_soft_calendar_fonts.css',__FILE__) );
	wp_enqueue_style( 'tsc_fonts' );
	$ts_calendar_fonts_array=array(
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
?>
<form method="POST" oninput="tsc_range_output()">
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
			<i class="tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Creating New Calendar', 'Total-Soft-Calendar' );?>"></i>
			<span class="tsc_button" onclick="tsc_pro_alert()">
				<?php esc_html_e( 'New Calendar (Pro)', 'Total-Soft-Calendar' );?>
			</span>
		</div>
		<div class="tsc_cancel_btn">
			<i class="tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Canceling', 'Total-Soft-Calendar' );?>"></i>
			<span class="tsc_button" onclick="tsc_reload()">
				<?php esc_html_e( 'Cancel', 'Total-Soft-Calendar' );?>
			</span>
			<i class="tsc_update_btn tsc_help_v1 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Click for Updating Settings', 'Total-Soft-Calendar' );?>"></i>
			<button type="submit" class="tsc_update_btn tsc_button" name="tsc_update_btn">
				<?php esc_html_e( 'Update', 'Total-Soft-Calendar' );?>
			</button>
			<input type="text" style="display:none" name="tsc_update_id" id="tsc_update_id">
		</div>
	</div>
	<table class="tsc_records_table_header">
		<tr class="tsc_records_table_tr">
			<td><?php esc_html_e( 'No', 'Total-Soft-Calendar' );?></td>
			<td><?php esc_html_e( 'Calendar Name', 'Total-Soft-Calendar' );?></td>
			<td><?php esc_html_e( 'Events Quantity', 'Total-Soft-Calendar' );?></td>
			<td><?php esc_html_e( 'Copy', 'Total-Soft-Calendar' );?></td>
			<td><?php esc_html_e( 'Edit', 'Total-Soft-Calendar' );?></td>
			<td><?php esc_html_e( 'Delete', 'Total-Soft-Calendar' );?></td>
		</tr>
	</table>
	<table class="tsc_records_table_body">
		<?php 
		$tsc_last_id = 0;
		for($i=0;$i<count($tsc_all_records);$i++){
			$TotalSoft_Cal_Ev=$wpdb->get_results($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE TotalSoftCal_EvCal=%d", $tsc_all_records[$i]->id));
			echo sprintf(
				'
				<tr id="tsc_record%1$s">
					<td>%2$s</td>
					<td>%3$s</td>
					<td>%4$s</td>
					<td><i class="tsc_icon totalsoft totalsoft-file-text" onclick="tsc_clone(%5$s)"></i></td>
					<td><i class="tsc_icon totalsoft totalsoft-pencil" onclick="tsc_edit(%5$s)"></i></td>
					<td>
						<i class="tsc_icon totalsoft totalsoft-trash" onclick="tsc_delete(%5$s)"></i>
						<span class="tsc_record_delete">
							<i class="tsc_delete_confirm_icon totalsoft totalsoft-check" onclick="tsc_pro_alert()"></i>
							<i class="tsc_delete_cancel_icon totalsoft totalsoft-times" onclick="tsc_delete_cancel(%5$s)"></i>
						</span>
					</td>
				</tr>
				',
				esc_html($tsc_all_records[$i]->id),
				esc_html($i+1),
				esc_html($tsc_all_records[$i]->TotalSoftCal_Name),
				esc_html(count($TotalSoft_Cal_Ev)),
				esc_js($tsc_all_records[$i]->id)
			);
			$tsc_last_id = $tsc_all_records[$i]->id;
		} 
		echo sprintf(
			'
			<tr id="tsc_record%1$s">
				<td>%3$s</td>
				<td style="position: relative; height: 27px;">Crazy Calendar 1<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%4$s</td>
				<td style="position: relative; height: 27px;">Crazy Calendar 2<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%5$s</td>
				<td style="position: relative; height: 27px;">Crazy Calendar 3<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%6$s</td>
				<td style="position: relative; height: 27px;">Schedule 1<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%7$s</td>
				<td style="position: relative; height: 27px;">Schedule 2<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%8$s</td>
				<td style="position: relative; height: 27px;">Schedule 3<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%9$s</td>
				<td style="position: relative; height: 27px;">Full Year Calendar 1<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%10$s</td>
				<td style="position: relative; height: 27px;">Full Year Calendar 2<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			<tr id="tsc_record%1$s">
				<td>%11$s</td>
				<td style="position: relative; height: 27px;">Full Year Calendar 3<img src="%2$s" style="position: absolute; top: 4px; right: 10px; width: 37px; height: 20px;"></td>
				<td>0</td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-file-text"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-pencil"></i></td>
				<td onclick="tsc_pro_alert()"><i class="tsc_icon totalsoft totalsoft-trash"></i></td>
			</tr>
			',
			esc_html($tsc_last_id),
			esc_url(plugins_url("../Images/SUG-Pro.png",__FILE__)),
			esc_html($i+1),
			esc_html($i+2),
			esc_html($i+3),
			esc_html($i+4),
			esc_html($i+5),
			esc_html($i+6),
			esc_html($i+7),
			esc_html($i+8),
			esc_html($i+9)
		);
		?>
	</table>
	<div style="width: 99%;">
		<table class="tsc_shortcodes_table">
			<tr style="text-align:center">
				<td><?php esc_html_e( 'Shortcode', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Template Include', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Copy &amp; paste the shortcode directly into any WordPress post or page.', 'Total-Soft-Calendar' );?></td>
				<td><?php esc_html_e( 'Copy &amp; paste this code into a template file to include the calendar within your theme.', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr style="text-align:center">
				<td>
					<span id="tsc_shortcode"></span>
					<i class="tsc_help_v4 totalsoft totalsoft-files-o" title="Click to Copy." onclick="tsc_copy_shortcode('tsc_shortcode')"></i>
				</td>
				<td>
					<span id="tsc_shortcode_theme"></span>
					<i class="tsc_help_v4 totalsoft totalsoft-files-o" title="Click to Copy." onclick="tsc_copy_shortcode('tsc_shortcode_theme')"></i>
				</td>
			</tr>
		</table>
	</div>
	<div class="tsc_settings_options_div tsc_options_div" id="tsc_options_table">
		<div class="tsc_options_wrapper_l">
			<div class="tsc_option_div">
				<div class="tsc_option_title"><?php esc_html_e( 'Calendar Name', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar name, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></div>
				<div class="tsc_option_field">
					<input type="text" name="TotalSoftCal_Name" id="TotalSoftCal_Name" class="tsc_select" required placeholder=" * <?php esc_html_e( 'Required', 'Total-Soft-Calendar' );?>">
				</div>
			</div>
		</div>
		<div class="tsc_options_wrapper_r">
			<div class="tsc_option_div">
				<div class="tsc_option_title"><?php esc_html_e( 'Calendar Type', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar type, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></div>
				<div class="tsc_option_field">
					<select class="tsc_select" name="TotalSoftCal_Type" id="TotalSoftCal_Type">
						<option value="Event Calendar">     <?php esc_html_e( 'Event Calendar', 'Total-Soft-Calendar' );?>     </option>
						<option value="Simple Calendar">    <?php esc_html_e( 'Simple Calendar', 'Total-Soft-Calendar' );?>    </option>
						<option value="Flexible Calendar">  <?php esc_html_e( 'Flexible Calendar', 'Total-Soft-Calendar' );?>  </option>
						<option value="TimeLine Calendar">  <?php esc_html_e( 'TimeLine Calendar', 'Total-Soft-Calendar' );?>  </option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="tsc_type_options" id="tsc_event_calendar_options">
		<div class="tsc_section_tabs">
			<div class="tsc_section_tab" id="tsc_section_tab_1_GO" onclick="tsc_change_section('1', 'GO')">General Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_1_HO" onclick="tsc_change_section('1', 'HO')">Header Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_1_DO" onclick="tsc_change_section('1', 'DO')">Days Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_1_IO" onclick="tsc_change_section('1', 'IO')">Icon Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_1_IO" onclick="tsc_change_section('1', 'ET')">Event Title</div>
			<div class="tsc_section_tab" id="tsc_section_tab_1_IO" onclick="tsc_change_section('1', 'IV')">Image/Video</div>
		</div>
		<div class="tsc_sections">
			<div class="tsc_section" id="tsc_section_content_1_GO">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'General Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal_WDStart" id="TotalSoftCal_WDStart">
							<option value="Sun"><?php esc_html_e( 'Sunday', 'Total-Soft-Calendar' );?></option>
							<option value="Mon"><?php esc_html_e( 'Monday', 'Total-Soft-Calendar' );?></option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose main background color in calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal_BgCol" id="TotalSoftCal_BgCol" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Grid Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select grid color which divides the days in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal_GrCol" id="TotalSoftCal_GrCol" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Grid Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the grid width, you can choose it corresponding  to your calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_GW" id="TotalSoftCal_GW" min="0" max="5" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_GW_output" for="TotalSoftCal_GW"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_BW" id="TotalSoftCal_BW" min="0" max="10" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_BW_output" for="TotalSoftCal_BW"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Style', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal_BStyle" id="TotalSoftCal_BStyle">
							<option value="none">   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>   </option>
							<option value="solid">  <?php esc_html_e( 'Solid', 'Total-Soft-Calendar' );?>  </option>
							<option value="dashed"> <?php esc_html_e( 'Dashed', 'Total-Soft-Calendar' );?> </option>
							<option value="dotted"> <?php esc_html_e( 'Dotted', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal_BCol" id="TotalSoftCal_BCol" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Max Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_MW" id="TotalSoftCal_MW" min="150" max="1000" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_MW_output" for="TotalSoftCal_MW"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Numbers Position', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Mention, the days in calendar must be from right or from left.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal_NumPos" id="TotalSoftCal_NumPos">
							<option value="left">  <?php esc_html_e( 'Left', 'Total-Soft-Calendar' );?>  </option>
							<option value="right"> <?php esc_html_e( 'Right', 'Total-Soft-Calendar' );?> </option>
							<option value="center"> <?php esc_html_e( 'Center', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Type', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal_BSType" id="TotalSoftCal_BSType">
							<option value='none'>   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>    </option>
							<option value=''>       <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
							<option value='type2'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
							<option value='type3'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
							<option value='type4'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
							<option value='type5'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
							<option value='type6'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
							<option value='type7'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
							<option value='type8'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
							<option value='type9'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
							<option value='type10'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
							<option value='type11'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
							<option value='type12'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 12 </option>
							<option value='type13'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 13 </option>
							<option value='type14'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 14 </option>
							<option value='type15'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 15 </option>
							<option value='type16'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 16 </option>
							<option value='type17'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 17 </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal_BSCol" id="TotalSoftCal_BSCol" class="tsc_color_input" value="">
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_1_HO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_HBgCol" id="TotalSoftCal_HBgCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_HCol" id="TotalSoftCal_HCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_HFS" id="TotalSoftCal_HFS" min="8" max="36" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_HFS_output" for="TotalSoftCal_HFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_HFF" id="TotalSoftCal_HFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Weekday Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_WBgCol" id="TotalSoftCal_WBgCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_WCol" id="TotalSoftCal_WCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?> "></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_WFS" id="TotalSoftCal_WFS" min="8" max="36" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_WFS_output" for="TotalSoftCal_WFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_WFF" id="TotalSoftCal_WFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Line After Weekday', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_LAW" id="TotalSoftCal_LAW" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_LAW_output" for="TotalSoftCal_LAW"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Style', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_LAWS" id="TotalSoftCal_LAWS">
								<option value="none">   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>   </option>
								<option value="solid">  <?php esc_html_e( 'Solid', 'Total-Soft-Calendar' );?>  </option>
								<option value="dashed"> <?php esc_html_e( 'Dashed', 'Total-Soft-Calendar' );?> </option>
								<option value="dotted"> <?php esc_html_e( 'Dotted', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_LAWC" id="TotalSoftCal_LAWC" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_1_DO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_DBgCol" id="TotalSoftCal_DBgCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_DCol" id="TotalSoftCal_DCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_DFS" id="TotalSoftCal_DFS" min="8" max="25" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_DFS_output" for="TotalSoftCal_DFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_DFF" id="TotalSoftCal_DFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Hover Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_HovBgCol" id="TotalSoftCal_HovBgCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_HovCol" id="TotalSoftCal_HovCol" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Todays Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the background color of the day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_TBgCol" id="TotalSoftCal_TBgCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_TCol" id="TotalSoftCal_TCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_TFS" id="TotalSoftCal_TFS" min="8" max="25" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_TFS_output" for="TotalSoftCal_TFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( "Number's Background Color", 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background color of the day, it is designed for the frame.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_TNBgCol" id="TotalSoftCal_TNBgCol" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_1_IO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Arrows Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Choose Icon', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_ArrowType" id="TotalSoftCal_ArrowType" style="font-family: 'FontAwesome', Arial;">
								<option value='1'>  <?php echo '&#xf100' . '&nbsp; &nbsp; &nbsp;' . __( 'Angle Double', 'Total-Soft-Calendar' );?>  </option>
								<option value='2'>  <?php echo '&#xf104' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Angle', 'Total-Soft-Calendar' );?>   </option>
								<option value='3'>  <?php echo '&#xf0a8' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?>   </option>
								<option value='4'>  <?php echo '&#xf190' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle O', 'Total-Soft-Calendar' );?> </option>
								<option value='5'>  <?php echo '&#xf060' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow', 'Total-Soft-Calendar' );?>          </option>
								<option value='6'>  <?php echo '&#xf0d9' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Caret', 'Total-Soft-Calendar' );?>   </option>
								<option value='7'>  <?php echo '&#xf191' . '&nbsp; &nbsp;&nbsp;' . __( 'Caret Square O', 'Total-Soft-Calendar' );?> </option>
								<option value='8'>  <?php echo '&#xf137' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
								<option value='9'>  <?php echo '&#xf053' . '&nbsp; &nbsp; ' . __( 'Chevron', 'Total-Soft-Calendar' );?>             </option>
								<option value='10'> <?php echo '&#xf0a5' . '&nbsp; &nbsp;' . __( 'Hand O', 'Total-Soft-Calendar' );?>               </option>
								<option value='11'> <?php echo '&#xf177' . '&nbsp; &nbsp;' . __( 'Long Arrow', 'Total-Soft-Calendar' );?>           </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_ArrowCol" id="TotalSoftCal_ArrowCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_ArrowSize" id="TotalSoftCal_ArrowSize" min="8" max="25" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_ArrowSize_output" for="TotalSoftCal_ArrowSize"></output>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Refresh Icon Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a color for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_RefIcCol" id="TotalSoftCal_RefIcCol" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a size for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_RefIcSize" id="TotalSoftCal_RefIcSize" min="8" max="25" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_RefIcSize_output" for="TotalSoftCal_RefIcSize"></output>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Back To Main Calendar', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Choose Icon', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_BackIconType" id="TotalSoftCal_BackIconType" style="font-family: 'FontAwesome', Arial;">
								<option value='1'>  <?php echo '' . '&nbsp; &nbsp; &nbsp;' . __( 'Calendar', 'Total-Soft-Calendar' );?>  </option>
								<option value='2'>  <?php echo '' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Calendar O', 'Total-Soft-Calendar' );?>   </option>
								<option value='3'>  <?php echo '' . '&nbsp; &nbsp;&nbsp;' . __( 'Calendar X', 'Total-Soft-Calendar' );?>   </option>
								<option value='4'>  <?php echo '' . '&nbsp; &nbsp;&nbsp;' . __( 'Times', 'Total-Soft-Calendar' );?> </option>
								<option value='5'>  <?php echo '' . '&nbsp; &nbsp;&nbsp;' . __( 'Times Circle', 'Total-Soft-Calendar' );?>          </option>
								<option value='6'>  <?php echo '' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Home', 'Total-Soft-Calendar' );?>   </option>
								<option value='7'>  <?php echo '' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
								<option value='8'>  <?php echo '' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?> </option>								
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_1_ET">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Title Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal1_Ev_T_FS" id="TotalSoftCal1_Ev_T_FS" min="8" max="48" value="">
						<output class="tsc_output" name="" id="TotalSoftCal1_Ev_T_FS_output" for="TotalSoftCal1_Ev_T_FS"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal1_Ev_T_FF" id="TotalSoftCal1_Ev_T_FF">
							<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
								<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal1_Ev_T_C" id="TotalSoftCal1_Ev_T_C" class="tsc_color_input_setting" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Text Align', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal1_Ev_T_TA" id="TotalSoftCal1_Ev_T_TA">
							<option value='left'>   <?php esc_html_e( 'Left', 'Total-Soft-Calendar' );?>   </option>
							<option value='right'>  <?php esc_html_e( 'Right', 'Total-Soft-Calendar' );?>  </option>
							<option value='center'> <?php esc_html_e( 'Center', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Time Format', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal1_Ev_TiF" id="TotalSoftCal1_Ev_TiF">
							<option value='24'> <?php esc_html_e( '24 hours', 'Total-Soft-Calendar' );?> </option>
							<option value='12'> <?php esc_html_e( '12 hours', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_1_IV">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Image/Video Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal1_Ev_I_W" id="TotalSoftCal1_Ev_I_W" min="30" max="98" value="">
						<output class="tsc_output" name="" id="TotalSoftCal1_Ev_I_W_output" for="TotalSoftCal1_Ev_I_W"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal1_Ev_I_Pos" id="TotalSoftCal1_Ev_I_Pos">
							<option value='before'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>       </option>
							<option value='after'>  <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tsc_type_options" id="tsc_simple_calendar_options">
		<div class="tsc_section_tabs">
			<div class="tsc_section_tab" id="tsc_section_tab_2_GO" onclick="tsc_change_section('2', 'GO')">General Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_2_HO" onclick="tsc_change_section('2', 'HO')">Calendar Part Header</div>
			<div class="tsc_section_tab" id="tsc_section_tab_2_DO" onclick="tsc_change_section('2', 'DO')">Days Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_2_IO" onclick="tsc_change_section('2', 'IO')">Icon Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_2_EP" onclick="tsc_change_section('2', 'EP')">Event Part</div>
			<div class="tsc_section_tab" id="tsc_section_tab_2_IV" onclick="tsc_change_section('2', 'IV')">Image/Video</div>
		</div>
		<div class="tsc_sections">
			<div class="tsc_section" id="tsc_section_content_2_GO">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'General Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_WDStart" id="TotalSoftCal2_WDStart">
							<option value="0"><?php esc_html_e( 'Sunday', 'Total-Soft-Calendar' );?></option>
							<option value="1"><?php esc_html_e( 'Monday', 'Total-Soft-Calendar' );?></option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_BW" id="TotalSoftCal2_BW" min="0" max="5" value="">
						<output class="tsc_output" name="" id="TotalSoftCal2_BW_output" for="TotalSoftCal2_BW"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Style', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_BS" id="TotalSoftCal2_BS">
							<option value="none">   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>   </option>
							<option value="solid">  <?php esc_html_e( 'Solid', 'Total-Soft-Calendar' );?>  </option>
							<option value="dashed"> <?php esc_html_e( 'Dashed', 'Total-Soft-Calendar' );?> </option>
							<option value="dotted"> <?php esc_html_e( 'Dotted', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal2_BC" id="TotalSoftCal2_BC" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_W" id="TotalSoftCal2_W" min="150" max="1200" value="">
						<output class="tsc_output" name="" id="TotalSoftCal2_W_output" for="TotalSoftCal2_W"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Height', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar height.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_H" id="TotalSoftCal2_H" min="300" max="1200" value="">
						<output class="tsc_output" name="" id="TotalSoftCal2_H_output" for="TotalSoftCal2_H"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose to show the shadow or no.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_BxShShow" id="TotalSoftCal2_BxShShow">
							<option value="Yes"> <?php esc_html_e( 'Yes', 'Total-Soft-Calendar' );?> </option>
							<option value="No">  <?php esc_html_e( 'No', 'Total-Soft-Calendar' );?>  </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Type', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_BxShType" id="TotalSoftCal2_BxShType">
							<option value="1">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
							<option value="2">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
							<option value="3">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
							<option value="4">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
							<option value="5">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
							<option value="6">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
							<option value="7">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
							<option value="8">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
							<option value="9">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
							<option value="10"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
							<option value="11"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
							<option value="12"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 12 </option>
							<option value="13"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 13 </option>
							<option value="14"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 14 </option>
							<option value="15"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 15 </option>
							<option value="16"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 16 </option>
							<option value="17"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 17 </option>
							<option value="18"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 18 </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal2_BxShC" id="TotalSoftCal2_BxShC" class="tsc_color_input" value="">
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_2_HO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_MBgC" id="TotalSoftCal2_MBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_MC" id="TotalSoftCal2_MC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_MFS" id="TotalSoftCal2_MFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_MFS_output" for="TotalSoftCal2_MFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_MFF" id="TotalSoftCal2_MFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'WeekDay Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_WBgC" id="TotalSoftCal2_WBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_WC" id="TotalSoftCal2_WC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_WFS" id="TotalSoftCal2_WFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_WFS_output" for="TotalSoftCal2_WFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_WFF" id="TotalSoftCal2_WFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Line After WeekDay', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_LAW_W" id="TotalSoftCal2_LAW_W" min="0" max="3" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_LAW_W_output" for="TotalSoftCal2_LAW_W"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Style', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_LAW_S" id="TotalSoftCal2_LAW_S">
								<option value="none">   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>   </option>
								<option value="solid">  <?php esc_html_e( 'Solid', 'Total-Soft-Calendar' );?>  </option>
								<option value="dashed"> <?php esc_html_e( 'Dashed', 'Total-Soft-Calendar' );?> </option>
								<option value="dotted"> <?php esc_html_e( 'Dotted', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_LAW_C" id="TotalSoftCal2_LAW_C" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_2_DO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_DBgC" id="TotalSoftCal2_DBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_DC" id="TotalSoftCal2_DC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_DFS" id="TotalSoftCal2_DFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_DFS_output" for="TotalSoftCal2_DFS"></output>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Todays Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the background color of the current day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_TdBgC" id="TotalSoftCal2_TdBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the current date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_TdC" id="TotalSoftCal2_TdC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_TdFS" id="TotalSoftCal2_TdFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_TdFS_output" for="TotalSoftCal2_TdFS"></output>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Event Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background for event days.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_EdBgC" id="TotalSoftCal2_EdBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_EdC" id="TotalSoftCal2_EdC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_EdFS" id="TotalSoftCal2_EdFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_EdFS_output" for="TotalSoftCal2_EdFS"></output>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Hover Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_HBgC" id="TotalSoftCal2_HBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_HC" id="TotalSoftCal2_HC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Other Months Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background color for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_OmBgC" id="TotalSoftCal2_OmBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the text color of the other months days.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_OmC" id="TotalSoftCal2_OmC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the size for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_OmFS" id="TotalSoftCal2_OmFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_OmFS_output" for="TotalSoftCal2_OmFS"></output>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_2_IO">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Arrows Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons for calendar, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_ArrType" id="TotalSoftCal2_ArrType" style="font-family: 'FontAwesome', Arial;">
							<option value='angle-double'>   <?php echo '&#xf100' . '&nbsp; &nbsp; &nbsp;' . __( 'Angle Double', 'Total-Soft-Calendar' );?>  </option>
							<option value='angle'>          <?php echo '&#xf104' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Angle', 'Total-Soft-Calendar' );?>   </option>
							<option value='arrow-circle'>   <?php echo '&#xf0a8' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?>   </option>
							<option value='arrow-circle-o'> <?php echo '&#xf190' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle O', 'Total-Soft-Calendar' );?> </option>
							<option value='arrow'>          <?php echo '&#xf060' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow', 'Total-Soft-Calendar' );?>          </option>
							<option value='caret'>          <?php echo '&#xf0d9' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Caret', 'Total-Soft-Calendar' );?>   </option>
							<option value='caret-square-o'> <?php echo '&#xf191' . '&nbsp; &nbsp;&nbsp;' . __( 'Caret Square O', 'Total-Soft-Calendar' );?> </option>
							<option value='chevron-circle'> <?php echo '&#xf137' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
							<option value='chevron'>        <?php echo '&#xf053' . '&nbsp; &nbsp; ' . __( 'Chevron', 'Total-Soft-Calendar' );?>             </option>
							<option value='hand-o'>         <?php echo '&#xf0a5' . '&nbsp; &nbsp;' . __( 'Hand O', 'Total-Soft-Calendar' );?>               </option>
							<option value='long-arrow'>     <?php echo '&#xf177' . '&nbsp; &nbsp;' . __( 'Long Arrow', 'Total-Soft-Calendar' );?>           </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_ArrFS" id="TotalSoftCal2_ArrFS" min="8" max="48" value="">
						<output class="tsc_output" name="" id="TotalSoftCal2_ArrFS_output" for="TotalSoftCal2_ArrFS"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="TotalSoftCal2_ArrC" id="TotalSoftCal2_ArrC" class="tsc_color_input" value="">
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_2_EP">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the background color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_Ev_HBgC" id="TotalSoftCal2_Ev_HBgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the text color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_Ev_HC" id="TotalSoftCal2_Ev_HC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_Ev_HFS" id="TotalSoftCal2_Ev_HFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_Ev_HFS_output" for="TotalSoftCal2_Ev_HFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_HFF" id="TotalSoftCal2_Ev_HFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Text', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can write events main title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" class="tsc_select" name="TotalSoftCal2_Ev_HText" id="TotalSoftCal2_Ev_HText" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Body Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_Ev_BBgC" id="TotalSoftCal2_Ev_BBgC" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Title Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal2_Ev_TC" id="TotalSoftCal2_Ev_TC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_TFF" id="TotalSoftCal2_Ev_TFF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal2_Ev_TFS" id="TotalSoftCal2_Ev_TFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal2_Ev_TFS_output" for="TotalSoftCal2_Ev_TFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Text Align', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_T_TA" id="TotalSoftCal2_Ev_T_TA">
								<option value='left'>   <?php esc_html_e( 'Left', 'Total-Soft-Calendar' );?>   </option>
								<option value='right'>  <?php esc_html_e( 'Right', 'Total-Soft-Calendar' );?>  </option>
								<option value='center'> <?php esc_html_e( 'Center', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Time Format', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_TiF" id="TotalSoftCal2_Ev_TiF">
								<option value='24'> <?php esc_html_e( '24 hours', 'Total-Soft-Calendar' );?> </option>
								<option value='12'> <?php esc_html_e( '12 hours', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Date Format', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose Date format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_DaF" id="TotalSoftCal2_Ev_DaF">
								<option value="">          dd.mm.yy  </option>
								<option value="yy-mm-dd">  yy-mm-dd  </option>
								<option value="yy MM dd">  yy MM dd  </option>
								<option value="dd-mm-yy">  dd-mm-yy  </option>
								<option value="dd MM yy">  dd MM yy  </option>
								<option value="mm-dd-yy">  mm-dd-yy  </option>
								<option value="MM dd, yy"> MM dd, yy </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Show Date', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose to Show Date in event part or not.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal2_Ev_ShDate" id="TotalSoftCal2_Ev_ShDate">
								<option value="">   Yes </option>
								<option value="no"> No  </option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_2_IV">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Image/Video Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal2_Ev_I_W" id="TotalSoftCal2_Ev_I_W" min="30" max="98" value="">
						<output class="tsc_output" name="" id="TotalSoftCal2_Ev_I_W_output" for="TotalSoftCal2_Ev_I_W"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal2_Ev_I_Pos" id="TotalSoftCal2_Ev_I_Pos">
							<option value='before'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>       </option>
							<option value='after'>  <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tsc_type_options" id="tsc_flexible_calendar_options">
		<div class="tsc_section_tabs">
			<div class="tsc_section_tab" id="tsc_section_tab_3_GO" onclick="tsc_change_section('3', 'GO')">General Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_HO" onclick="tsc_change_section('3', 'HO')">Header Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_DO" onclick="tsc_change_section('3', 'DO')">Days Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_EH" onclick="tsc_change_section('3', 'EH')">Event Part Header</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_ET" onclick="tsc_change_section('3', 'ET')">Event Title</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_IV" onclick="tsc_change_section('3', 'IV')">Image/Video</div>
			<div class="tsc_section_tab" id="tsc_section_tab_3_LL" onclick="tsc_change_section('3', 'LL')">Link & Line</div>
		</div>
		<div class="tsc_sections">
			<div class="tsc_section" id="tsc_section_content_3_GO">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'General Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Possibility define the calendar width', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_MW" id="TotalSoftCal3_MW" min="150" max="1200" value="">
						<output class="tsc_output" name="" id="TotalSoftCal3_MW_output" for="TotalSoftCal3_MW"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal3_WDStart" id="TotalSoftCal3_WDStart">
							<option value="0"><?php esc_html_e( 'Sunday', 'Total-Soft-Calendar' );?></option>
							<option value="1"><?php esc_html_e( 'Monday', 'Total-Soft-Calendar' );?></option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Can choose main background color.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_BgC" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Grid Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select grid color which divide the days in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_GrC" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Body Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the body border color.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_BBC" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose to show the shadow or no.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal3_BoxShShow" id="TotalSoftCal3_BoxShShow">
							<option value="Yes"> <?php esc_html_e( 'Yes', 'Total-Soft-Calendar' );?> </option>
							<option value="No">  <?php esc_html_e( 'No', 'Total-Soft-Calendar' );?>  </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal3_BoxShType">
							<option value="1">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
							<option value="2">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
							<option value="3">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
							<option value="4">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
							<option value="5">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
							<option value="6">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
							<option value="7">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
							<option value="8">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
							<option value="9">  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
							<option value="10"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
							<option value="11"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
							<option value="12"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 12 </option>
							<option value="13"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 13 </option>
							<option value="14"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 14 </option>
							<option value="15"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 15 </option>
							<option value="16"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 16 </option>
							<option value="17"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 17 </option>
							<option value="18"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 18 </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_BoxShC" class="tsc_color_input" value="">
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_3_HO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_H_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border-Top Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main top border width.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="" id="TotalSoftCal3_H_BTW" min="0" max="10" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_H_BTW_output" for="TotalSoftCal3_H_BTW"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border-Top Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main top border color.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_H_BTC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal3_H_FF" id="TotalSoftCal3_H_FF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Month Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the calendar font size of the month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_H_MFS" id="TotalSoftCal3_H_MFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_H_MFS_output" for="TotalSoftCal3_H_MFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the calendar text color for the month.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_H_MC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Year Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the calendar font size of the year.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_H_YFS" id="TotalSoftCal3_H_YFS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_H_YFS_output" for="TotalSoftCal3_H_YFS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Year Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the calendar text color for the year.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_H_YC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the month and year.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal3_H_Format">
								<option value="1"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
								<option value="2"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
								<option value="3"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3 </option>
								<option value="4"> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 4 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Line After Header', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the header line width.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="" id="TotalSoftCal3_LAH_W" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_LAH_W_output" for="TotalSoftCal3_LAH_W"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_LAH_C" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Arrows Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons for calendar, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal3_Arr_Type" style="font-family: 'FontAwesome', Arial;">
								<option value='angle-double'>   <?php echo '&#xf100' . '&nbsp; &nbsp; &nbsp;' . __( 'Angle Double', 'Total-Soft-Calendar' );?>  </option>
								<option value='angle'>          <?php echo '&#xf104' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Angle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle'>   <?php echo '&#xf0a8' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle-o'> <?php echo '&#xf190' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle O', 'Total-Soft-Calendar' );?> </option>
								<option value='arrow'>          <?php echo '&#xf060' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow', 'Total-Soft-Calendar' );?>          </option>
								<option value='caret'>          <?php echo '&#xf0d9' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Caret', 'Total-Soft-Calendar' );?>   </option>
								<option value='caret-square-o'> <?php echo '&#xf191' . '&nbsp; &nbsp;&nbsp;' . __( 'Caret Square O', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron-circle'> <?php echo '&#xf137' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron'>        <?php echo '&#xf053' . '&nbsp; &nbsp; ' . __( 'Chevron', 'Total-Soft-Calendar' );?>             </option>
								<option value='hand-o'>         <?php echo '&#xf0a5' . '&nbsp; &nbsp;' . __( 'Hand O', 'Total-Soft-Calendar' );?>               </option>
								<option value='long-arrow'>     <?php echo '&#xf177' . '&nbsp; &nbsp;' . __( 'Long Arrow', 'Total-Soft-Calendar' );?>           </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Arr_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Arr_S" id="TotalSoftCal3_Arr_S" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Arr_S_output" for="TotalSoftCal3_Arr_S"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a hover color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Arr_HC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'WeekDay Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_WD_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_WD_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_WD_FS" id="TotalSoftCal3_WD_FS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_WD_FS_output" for="TotalSoftCal3_WD_FS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal3_WD_FF" id="TotalSoftCal3_WD_FF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_3_DO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the background color for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_D_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_D_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Todays Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Note the background color of the current day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_TD_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the current date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_TD_C" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Hover Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_HD_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_HD_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Event Days Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the event color for days.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_ED_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the event hover color for days.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_ED_HC" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_3_EH">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose date format.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal3_Ev_Format">
								<option value='1'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
								<option value='2'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
								<option value='3'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border-Top Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main top border width for the event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="" id="TotalSoftCal3_Ev_BTW" min="0" max="10" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_BTW_output" for="TotalSoftCal3_Ev_BTW"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border-Top Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main top border color for the event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_BTC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the background color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_BgC" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the text color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_C" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font size for event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_FS" id="TotalSoftCal3_Ev_FS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_FS_output" for="TotalSoftCal3_Ev_FS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal3_Ev_FF" id="TotalSoftCal3_Ev_FF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Line After Header', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the line width for the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="" id="TotalSoftCal3_Ev_LAH_W" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_LAH_W_output" for="TotalSoftCal3_Ev_LAH_W"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_LAH_C" class="tsc_color_input_setting" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Close Icon Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the close icons for calendar, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal3_Ev_C_Type" style="font-family: 'FontAwesome', Arial;">
								<option value='times-circle-o'> <?php echo '&#xf05c' . '&nbsp; &nbsp;' . __( 'Times Circle O', 'Total-Soft-Calendar' );?> </option>
								<option value='times-circle'>   <?php echo '&#xf057' . '&nbsp; &nbsp;' . __( 'Times Circle', 'Total-Soft-Calendar' );?>   </option>
								<option value='times'>          <?php echo '&#xf00d' . '&nbsp; &nbsp;' . __( 'Times', 'Total-Soft-Calendar' );?>          </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a color for close icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_C_C" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a hover color for close icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_C_HC" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_C_FS" id="TotalSoftCal3_Ev_C_FS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_C_FS_output" for="TotalSoftCal3_Ev_C_FS"></output>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Body Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Can choose main background color.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_B_BgC" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the body border color in the event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_B_BC" class="tsc_color_input_setting" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_3_ET">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Title Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_T_FS" id="TotalSoftCal3_Ev_T_FS" min="8" max="48" value="">
						<output class="tsc_output" name="" id="TotalSoftCal3_Ev_T_FS_output" for="TotalSoftCal3_Ev_T_FS"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal3_Ev_T_FF" id="TotalSoftCal3_Ev_T_FF">
							<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
								<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for events title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_Ev_T_BgC" class="tsc_color_input_setting" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal3_Ev_T_C" class="tsc_color_input_setting" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Text Align', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal3_Ev_T_TA" id="TotalSoftCal3_Ev_T_TA">
							<option value='left'>   <?php esc_html_e( 'Left', 'Total-Soft-Calendar' );?>   </option>
							<option value='right'>  <?php esc_html_e( 'Right', 'Total-Soft-Calendar' );?>  </option>
							<option value='center'> <?php esc_html_e( 'Center', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal3_Ev_TiF">
							<option value='24'> <?php esc_html_e( '24 hours', 'Total-Soft-Calendar' );?> </option>
							<option value='12'> <?php esc_html_e( '12 hours', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Date Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose Date format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal3_Ev_DaF">
							<option value="">          yy-mm-dd  </option>
							<option value="dd.mm.yy">  dd.mm.yy  </option>
							<option value="yy MM dd">  yy MM dd  </option>
							<option value="dd-mm-yy">  dd-mm-yy  </option>
							<option value="dd MM yy">  dd MM yy  </option>
							<option value="mm-dd-yy">  mm-dd-yy  </option>
							<option value="MM dd, yy"> MM dd, yy </option>
						</select>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_3_IV">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Image/Video Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal3_Ev_I_W" id="TotalSoftCal3_Ev_I_W" min="30" max="98" value="">
						<output class="tsc_output" name="" id="TotalSoftCal3_Ev_I_W_output" for="TotalSoftCal3_Ev_I_W"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal3_Ev_I_Pos">
							<option value='1'> <?php esc_html_e( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
							<option value='2'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>       </option>
							<option value='3'> <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_3_LL">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Link Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_L_C" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the hover color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_L_HC" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the link in event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal3_Ev_L_Pos">
								<option value='1'> <?php esc_html_e( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
								<option value='2'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>       </option>
								<option value='3'> <?php esc_html_e( 'After Title Text', 'Total-Soft-Calendar' );?>  </option>
								<option value='4'> <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?> </option>
								<option value='5'> <?php esc_html_e( 'After Description Text', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Text', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can write link text.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal3_Ev_L_Text" id="TotalSoftCal3_Ev_L_Text" class="tsc_select" placeholder="<?php esc_html_e( 'Link Text', 'Total-Soft-Calendar' );?>">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the text font size for the link button of the event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_L_FS" id="TotalSoftCal3_Ev_L_FS" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_L_FS_output" for="TotalSoftCal3_Ev_L_FS"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the link button.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal3_Ev_L_FF" id="TotalSoftCal3_Ev_L_FF">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the border color, which is designed for Link button.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_L_BC" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the border width for the link buttons.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_L_BW" id="TotalSoftCal3_Ev_L_BW" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_L_BW_output" for="TotalSoftCal3_Ev_L_BW"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Radius', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Install the border radius for event link.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_L_BR" id="TotalSoftCal3_Ev_L_BR" min="0" max="50" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_L_BR_output" for="TotalSoftCal3_Ev_L_BR"></output>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Line After Each Event', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the line width.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal3_Ev_LAE_W" id="TotalSoftCal3_Ev_LAE_W" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal3_Ev_LAE_W_output" for="TotalSoftCal3_Ev_LAE_W"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal3_Ev_LAE_C" class="tsc_color_input_setting" value="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tsc_type_options" id="tsc_timeline_calendar_options">
		<div class="tsc_section_tabs">
			<div class="tsc_section_tab" id="tsc_section_tab_4_GO" onclick="tsc_change_section('4', 'GO')">General Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_HO" onclick="tsc_change_section('4', 'HO')">Header Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_BO" onclick="tsc_change_section('4', 'BO')">Bar Option</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_EP" onclick="tsc_change_section('4', 'EP')">Event Part</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_IV" onclick="tsc_change_section('4', 'IV')">Image/Video</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_LL" onclick="tsc_change_section('4', 'LL')">Link & Line</div>
			<div class="tsc_section_tab" id="tsc_section_tab_4_DT" onclick="tsc_change_section('4', 'DT')">Date & Time</div>
		</div>
		<div class="tsc_sections">
			<div class="tsc_section" id="tsc_section_content_4_GO">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'General Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_01" id="TotalSoftCal4_01" min="0" max="2000" value="">
						<output class="tsc_output" name="" id="TotalSoftCal4_01_output" for="TotalSoftCal4_01"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal4_02">
							<option value='none'>   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>    </option>
							<option value='type1'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
							<option value='type2'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
							<option value='type3'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
							<option value='type4'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
							<option value='type5'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
							<option value='type6'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
							<option value='type7'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
							<option value='type8'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
							<option value='type9'>  <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
							<option value='type10'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
							<option value='type11'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
							<option value='type12'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 12 </option>
							<option value='type13'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 13 </option>
							<option value='type14'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 14 </option>
							<option value='type15'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 15 </option>
							<option value='type16'> <?php esc_html_e( 'Type', 'Total-Soft-Calendar' );?> 16 </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Shadow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal4_03" class="tsc_color_input" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Type', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal4_04" id="TotalSoftCal4_04">
							<option value='none'>   <?php esc_html_e( 'None', 'Total-Soft-Calendar' );?>   </option>
							<option value='solid'>  <?php esc_html_e( 'Solid', 'Total-Soft-Calendar' );?>  </option>
							<option value='dotted'> <?php esc_html_e( 'Dotted', 'Total-Soft-Calendar' );?> </option>
							<option value='dashed'> <?php esc_html_e( 'Dashed', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_05" id="TotalSoftCal4_05" min="0" max="10" value="">
						<output class="tsc_output" name="" id="TotalSoftCal4_05_output" for="TotalSoftCal4_05"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal4_06" class="tsc_color_input" value="">
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_4_HO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Header Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the background type: transparent, color or gradient types.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_07">
								<option value='transparent'> <?php esc_html_e( 'Transparent', 'Total-Soft-Calendar' );?> </option>
								<option value='color'>       <?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?>       </option>
								<option value='gradient1'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
								<option value='gradient2'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
								<option value='gradient3'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
								<option value='gradient4'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
								<option value='gradient5'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
								<option value='gradient6'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
								<option value='gradient7'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
								<option value='gradient8'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
								<option value='gradient9'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
								<option value='gradient10'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
								<option value='gradient11'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
								<option value='gradient12'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
								<option value='gradient13'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the background color of header, where can be seen the year and month name.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_08" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose second background color for gradient effects.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_09" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for the year and month name in header.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_10" id="TotalSoftCal4_10" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_10_output" for="TotalSoftCal4_10"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the year and month name in header.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal4_11" id="TotalSoftCal4_11">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select format to show years and months in header.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_12">
								<option value='format1'> <?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> 1 </option>
								<option value='format2'> <?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> 2 </option>
								<option value='format3'> <?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> 3 </option>
								<option value='format4'> <?php esc_html_e( 'Format', 'Total-Soft-Calendar' );?> 4 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Month Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for month name according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_18" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Year Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for year according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_13" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons for calendar, which are for changing the years by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_14" style="font-family: 'FontAwesome', Arial;">
								<option value='angle-double'>   <?php echo '&#xf100' . '&nbsp; &nbsp; &nbsp;' . __( 'Angle Double', 'Total-Soft-Calendar' );?>  </option>
								<option value='angle'>          <?php echo '&#xf104' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Angle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle'>   <?php echo '&#xf0a8' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle-o'> <?php echo '&#xf190' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle O', 'Total-Soft-Calendar' );?> </option>
								<option value='arrow'>          <?php echo '&#xf060' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow', 'Total-Soft-Calendar' );?>          </option>
								<option value='caret'>          <?php echo '&#xf0d9' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Caret', 'Total-Soft-Calendar' );?>   </option>
								<option value='caret-square-o'> <?php echo '&#xf191' . '&nbsp; &nbsp;&nbsp;' . __( 'Caret Square O', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron-circle'> <?php echo '&#xf137' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron'>        <?php echo '&#xf053' . '&nbsp; &nbsp; ' . __( 'Chevron', 'Total-Soft-Calendar' );?>             </option>
								<option value='hand-o'>         <?php echo '&#xf0a5' . '&nbsp; &nbsp;' . __( 'Hand O', 'Total-Soft-Calendar' );?>               </option>
								<option value='long-arrow'>     <?php echo '&#xf177' . '&nbsp; &nbsp;' . __( 'Long Arrow', 'Total-Soft-Calendar' );?>           </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_15" id="TotalSoftCal4_15" min="8" max="72" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_15_output" for="TotalSoftCal4_15"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_16" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a hover color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_17" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div tsc_tab_title Total_Soft_Titles1"><?php esc_html_e( 'Line After Header', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_19" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the header line width by percentage.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal4_20" id="TotalSoftCal4_20" min="0" max="100" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_20_output" for="TotalSoftCal4_20"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Height', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the header line height by pixels.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_21" id="TotalSoftCal4_21" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_21_output" for="TotalSoftCal4_21"></output>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_4_BO">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Bar Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the background type: transparent, color or gradient types.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_22">
								<option value='transparent'> <?php esc_html_e( 'Transparent', 'Total-Soft-Calendar' );?> </option>
								<option value='color'>       <?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?>       </option>
								<option value='gradient1'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
								<option value='gradient2'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
								<option value='gradient3'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
								<option value='gradient4'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
								<option value='gradient5'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
								<option value='gradient6'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
								<option value='gradient7'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
								<option value='gradient8'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
								<option value='gradient9'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
								<option value='gradient10'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
								<option value='gradient11'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
								<option value='gradient12'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
								<option value='gradient13'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the background color of events bar, where can be seen the events dates.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_23" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose second background color for gradient effects.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_24" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Grid Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select grid color which divide the dates in the events bar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_25" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Number Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for dates in events bar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_26" id="TotalSoftCal4_26" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_26_output" for="TotalSoftCal4_26"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Number Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference for dates in events bar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_27" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Month Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for month names in events bar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_28" id="TotalSoftCal4_28" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_28_output" for="TotalSoftCal4_28"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference for month names in events bar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_29" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Selected Number Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference for dates for selected dates.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_30" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Selected Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference for month names for selected dates.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_31" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the right and the left icons for calendar, which are for changing the events by sequence.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_32" style="font-family: 'FontAwesome', Arial;">
								<option value='angle-double'>   <?php echo '&#xf100' . '&nbsp; &nbsp; &nbsp;' . __( 'Angle Double', 'Total-Soft-Calendar' );?>  </option>
								<option value='angle'>          <?php echo '&#xf104' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Angle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle'>   <?php echo '&#xf0a8' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle', 'Total-Soft-Calendar' );?>   </option>
								<option value='arrow-circle-o'> <?php echo '&#xf190' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow Circle O', 'Total-Soft-Calendar' );?> </option>
								<option value='arrow'>          <?php echo '&#xf060' . '&nbsp; &nbsp;&nbsp;' . __( 'Arrow', 'Total-Soft-Calendar' );?>          </option>
								<option value='caret'>          <?php echo '&#xf0d9' . '&nbsp; &nbsp; &nbsp;&nbsp;' . __( 'Caret', 'Total-Soft-Calendar' );?>   </option>
								<option value='caret-square-o'> <?php echo '&#xf191' . '&nbsp; &nbsp;&nbsp;' . __( 'Caret Square O', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron-circle'> <?php echo '&#xf137' . '&nbsp; &nbsp;&nbsp;' . __( 'Chevron Circle', 'Total-Soft-Calendar' );?> </option>
								<option value='chevron'>        <?php echo '&#xf053' . '&nbsp; &nbsp; ' . __( 'Chevron', 'Total-Soft-Calendar' );?>             </option>
								<option value='hand-o'>         <?php echo '&#xf0a5' . '&nbsp; &nbsp;' . __( 'Hand O', 'Total-Soft-Calendar' );?>               </option>
								<option value='long-arrow'>     <?php echo '&#xf177' . '&nbsp; &nbsp;' . __( 'Long Arrow', 'Total-Soft-Calendar' );?>           </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_33" id="TotalSoftCal4_33" min="8" max="72" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_33_output" for="TotalSoftCal4_33"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_34" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Arrow Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a hover color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_35" class="tsc_color_input" value="">
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Line After Bar', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal4_36" class="tsc_color_input" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the bar line width by percentage.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal4_37" id="TotalSoftCal4_37" min="0" max="100" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_37_output" for="TotalSoftCal4_37"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Height', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the bar line height by pixels.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal4_38" id="TotalSoftCal4_38" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal4_38_output" for="TotalSoftCal4_38"></output>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_4_EP">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'General Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Specify the background type: transparent, color or gradient types.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal4_39">
								<option value='transparent'> <?php esc_html_e( 'Transparent', 'Total-Soft-Calendar' );?> </option>
								<option value='color'>       <?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?>       </option>
								<option value='gradient1'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
								<option value='gradient2'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
								<option value='gradient3'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
								<option value='gradient4'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
								<option value='gradient5'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
								<option value='gradient6'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
								<option value='gradient7'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
								<option value='gradient8'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
								<option value='gradient9'>   <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
								<option value='gradient10'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
								<option value='gradient11'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
								<option value='gradient12'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
								<option value='gradient13'>  <?php esc_html_e( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the background color of event part, where can be seen the events with description and media.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_01" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose second background color for gradient effects.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_02" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Data Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose data format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal_4_03">
								<option value="yy-mm-dd">  yy-mm-dd  </option>
								<option value="yy MM dd">  yy MM dd  </option>
								<option value="dd-mm-yy">  dd-mm-yy  </option>
								<option value="dd MM yy">  dd MM yy  </option>
								<option value="mm-dd-yy">  mm-dd-yy  </option>
								<option value="MM dd, yy"> MM dd, yy </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal_4_04">
								<option value='24'> 24 <?php esc_html_e( 'Hours', 'Total-Soft-Calendar' );?> </option>
								<option value='12'> 12 <?php esc_html_e( 'Hours', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Event Title', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_05" id="TotalSoftCal_4_05" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_05_output" for="TotalSoftCal_4_05"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_4_06" id="TotalSoftCal_4_06">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose a background color for events title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_07" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_08" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Text Align', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_4_09" id="TotalSoftCal_4_09">
								<option value='left'>   <?php esc_html_e( 'Left', 'Total-Soft-Calendar' );?>   </option>
								<option value='right'>  <?php esc_html_e( 'Right', 'Total-Soft-Calendar' );?>  </option>
								<option value='center'> <?php esc_html_e( 'Center', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_4_IV">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Image/Video Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal_4_10" id="TotalSoftCal_4_10" min="0" max="100" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_4_10_output" for="TotalSoftCal_4_10"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal_4_11">
							<option value='1'> <?php esc_html_e( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
							<option value='2'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>       </option>
							<option value='3'> <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
			</div>
			<div class="tsc_section tsc_options_div" id="tsc_section_content_4_LL">
				<div class="tsc_options_wrapper_l">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Link Options', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_12" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the hover color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_13" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose position for the link in event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="" id="TotalSoftCal_4_14">
								<option value='1'> <?php esc_html_e( 'Before Title', 'Total-Soft-Calendar' );?>           </option>
								<option value='2'> <?php esc_html_e( 'After Title', 'Total-Soft-Calendar' );?>            </option>
								<option value='3'> <?php esc_html_e( 'After Title Text', 'Total-Soft-Calendar' );?>       </option>
								<option value='4'> <?php esc_html_e( 'After Description', 'Total-Soft-Calendar' );?>      </option>
								<option value='5'> <?php esc_html_e( 'After Description Text', 'Total-Soft-Calendar' );?> </option>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Text', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'You can write link text.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="TotalSoftCal_4_15" id="TotalSoftCal_4_15" class="tsc_select" placeholder="<?php esc_html_e( 'Link Text', 'Total-Soft-Calendar' );?>">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the text font size for the link button of the event.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_16" id="TotalSoftCal_4_16" min="8" max="48" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_16_output" for="TotalSoftCal_4_16"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family for the link button.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<select class="tsc_select" name="TotalSoftCal_4_17" id="TotalSoftCal_4_17">
								<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the border color, which is designed for Link button.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_18" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the border width for the link buttons.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_19" id="TotalSoftCal_4_19" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_19_output" for="TotalSoftCal_4_19"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Border Radius', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Install the border radius for event link.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_20" id="TotalSoftCal_4_20" min="0" max="30" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_20_output" for="TotalSoftCal_4_20"></output>
						</div>
					</div>
				</div>
				<div class="tsc_options_wrapper_r">
					<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Line After Each Event', 'Total-Soft-Calendar' );?></div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="text" name="" id="TotalSoftCal_4_21" class="tsc_color_input_setting" value="">
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Width', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the line width by percentage.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_percent" name="TotalSoftCal_4_22" id="TotalSoftCal_4_22" min="0" max="100" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_22_output" for="TotalSoftCal_4_22"></output>
						</div>
					</div>
					<div class="tsc_option_div">
						<div class="tsc_option_title"><?php esc_html_e( 'Height', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Determine the line height by pixels.', 'Total-Soft-Calendar' );?>"></i></div>
						<div class="tsc_option_field">
							<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_23" id="TotalSoftCal_4_23" min="0" max="5" value="">
							<output class="tsc_output" name="" id="TotalSoftCal_4_23_output" for="TotalSoftCal_4_23"></output>
						</div>
					</div>
				</div>
			</div>
			<div class="tsc_section" id="tsc_section_content_4_DT">
				<div class="tsc_option_div tsc_tab_title"><?php esc_html_e( 'Date & Time Options', 'Total-Soft-Calendar' );?></div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the color for the date and time in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal_4_24" class="tsc_color_input_setting" value="">
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the calendar text size for the date & time in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_25" id="TotalSoftCal_4_25" min="8" max="48" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_4_25_output" for="TotalSoftCal_4_25"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Font Family', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Choose the font family of the date & time in event.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="TotalSoftCal_4_26" id="TotalSoftCal_4_26">
							<?php for($i = 0; $i < count($tsc_fonts); $i++) { ?>
									<option value='<?php echo esc_html($tsc_fonts[$i]);?>' style="font-family: <?php echo esc_html($tsc_fonts[$i]);?>;"><?php echo esc_html($tsc_fonts[$i]);?></option>
								<?php } ?>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Icon Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select the icon for calendar for event part.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<select class="tsc_select" name="" id="TotalSoftCal_4_27" style="font-family: 'FontAwesome', Arial;">
							<option value="calendar">         <?php echo '&#xf073' . '&nbsp; &nbsp;' . __( 'Calendar', 'Total-Soft-Calendar' );?>         </option>
							<option value="calendar-o">       <?php echo '&#xf133' . '&nbsp; &nbsp;' . __( 'Calendar O', 'Total-Soft-Calendar' );?>       </option>
							<option value="calendar-plus-o">  <?php echo '&#xf271' . '&nbsp; &nbsp;' . __( 'Calendar Plus O', 'Total-Soft-Calendar' );?>  </option>
							<option value="calendar-check-o"> <?php echo '&#xf274' . '&nbsp; &nbsp;' . __( 'Calendar Check O', 'Total-Soft-Calendar' );?> </option>
							<option value="calendar-minus-o"> <?php echo '&#xf272' . '&nbsp; &nbsp;' . __( 'Calendar Minus O', 'Total-Soft-Calendar' );?> </option>
							<option value="calendar-times-o"> <?php echo '&#xf273' . '&nbsp; &nbsp;' . __( 'Calendar Times O', 'Total-Soft-Calendar' );?> </option>
						</select>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Icon Size', 'Total-Soft-Calendar' );?> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="range" class="tsc_range tsc_range_px" name="TotalSoftCal_4_28" id="TotalSoftCal_4_28" min="8" max="72" value="">
						<output class="tsc_output" name="" id="TotalSoftCal_4_28_output" for="TotalSoftCal_4_28"></output>
					</div>
				</div>
				<div class="tsc_option_div">
					<div class="tsc_option_title"><?php esc_html_e( 'Icon Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="tsc_help_v2 totalsoft totalsoft-question-circle-o" title="<?php esc_html_e( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></div>
					<div class="tsc_option_field">
						<input type="text" name="" id="TotalSoftCal_4_29" class="tsc_color_input_setting" value="">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>