<?php
	add_action( 'wp_ajax_ts_calendar_edit', 'ts_calendar_edit' );
	function ts_calendar_edit() {
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$ts_calendar_id = sanitize_text_field($_POST['tsc_id']);
		global $wpdb;
		$tsc_event_calendar_table  = $wpdb->prefix . "totalsoft_cal_1";
		$tsc_types_table = $wpdb->prefix . "totalsoft_cal_types";
		$tsc_simple_calendar_table = $wpdb->prefix . "totalsoft_cal_2";
		$tsc_flexible_calendar_table = $wpdb->prefix . "totalsoft_cal_3";
		$tsc_timeline_calendar_table = $wpdb->prefix . "totalsoft_cal_4";
		$tsc_get_type = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_types_table WHERE id = %d", $ts_calendar_id),ARRAY_A);
		if($tsc_get_type["TotalSoftCal_Type"] == 'Event Calendar')
		{
			$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id),ARRAY_A);
		}
		else if($tsc_get_type["TotalSoftCal_Type"] == 'Simple Calendar')
		{
			$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_simple_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id),ARRAY_A);
		}
		else if($tsc_get_type["TotalSoftCal_Type"] == 'Flexible Calendar')
		{
			$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_flexible_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id),ARRAY_A);
		}
		else if($tsc_get_type["TotalSoftCal_Type"] == 'TimeLine Calendar')
		{
			$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_timeline_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id),ARRAY_A);
		}
		wp_send_json_success($tsc_response);
	}
	add_action( 'wp_ajax_ts_calendar_edit_settings', 'ts_calendar_edit_settings' );
	function ts_calendar_edit_settings(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$ts_calendar_id = sanitize_text_field($_POST['tsc_id']);
		global $wpdb;
		$tsc_settings_table = $wpdb->prefix . "totalsoft_cal_part";
		$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_settings_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		wp_send_json_success($tsc_response);
	}
	add_action( 'wp_ajax_ts_calendar_clone', 'ts_calendar_clone' );
	function ts_calendar_clone(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$ts_calendar_id = sanitize_text_field($_POST['tsc_id']);
		global $wpdb;
		$tsc_event_calendar_table = $wpdb->prefix . "totalsoft_cal_1";
		$tsc_ids_table = $wpdb->prefix . "totalsoft_cal_ids";
		$tsc_types_table = $wpdb->prefix . "totalsoft_cal_types";
		$tsc_simple_calendar_table = $wpdb->prefix . "totalsoft_cal_2";
		$tsc_flexible_calendar_table = $wpdb->prefix . "totalsoft_cal_3";
		$tsc_settings_table = $wpdb->prefix . "totalsoft_cal_part";
		$tsc_timeline_calendar_table = $wpdb->prefix . "totalsoft_cal_4";
		$tsc_get_type = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_types_table WHERE id = %d", $ts_calendar_id));
		if($tsc_get_type->TotalSoftCal_Type == 'Event Calendar'){
			$tsc_clone_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		}else if($tsc_get_type->TotalSoftCal_Type == 'Simple Calendar'){
			$tsc_clone_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_simple_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		}else if($tsc_get_type->TotalSoftCal_Type == 'Flexible Calendar'){
			$tsc_clone_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_flexible_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		}else if($tsc_get_type->TotalSoftCal_Type == 'TimeLine Calendar'){
			$tsc_clone_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_timeline_calendar_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		}
		$tsc_settings = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_settings_table WHERE TotalSoftCal_ID = %s", $ts_calendar_id));
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_types_table (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', $tsc_get_type->TotalSoftCal_Name, $tsc_get_type->TotalSoftCal_Type));
		$tsc_insert_id = $wpdb->insert_id;
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_ids_table (id, Cal_ID) VALUES (%d, %s)", '', $tsc_insert_id));
		if($tsc_get_type->TotalSoftCal_Type == 'Event Calendar'){
			$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_calendar_table (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_BgCol, TotalSoftCal_GrCol, TotalSoftCal_GW, TotalSoftCal_BW, TotalSoftCal_BStyle, TotalSoftCal_BCol, TotalSoftCal_BSCol, TotalSoftCal_MW, TotalSoftCal_HBgCol, TotalSoftCal_HCol, TotalSoftCal_HFS, TotalSoftCal_HFF, TotalSoftCal_WBgCol, TotalSoftCal_WCol, TotalSoftCal_WFS, TotalSoftCal_WFF, TotalSoftCal_LAW, TotalSoftCal_LAWS, TotalSoftCal_LAWC, TotalSoftCal_DBgCol, TotalSoftCal_DCol, TotalSoftCal_DFS, TotalSoftCal_TBgCol, TotalSoftCal_TCol, TotalSoftCal_TFS, TotalSoftCal_TNBgCol, TotalSoftCal_HovBgCol, TotalSoftCal_HovCol, TotalSoftCal_NumPos, TotalSoftCal_WDStart, TotalSoftCal_RefIcCol, TotalSoftCal_RefIcSize, TotalSoftCal_ArrowType, TotalSoftCal_ArrowLeft, TotalSoftCal_ArrowRight, TotalSoftCal_ArrowCol, TotalSoftCal_ArrowSize, TotalSoftCal_BackIconType, TotalSoftCal_DFF) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '' , $tsc_insert_id, $tsc_clone_data->TotalSoftCal_Name, $tsc_clone_data->TotalSoftCal_Type, $tsc_clone_data->TotalSoftCal_BgCol, $tsc_clone_data->TotalSoftCal_GrCol, $tsc_clone_data->TotalSoftCal_GW, $tsc_clone_data->TotalSoftCal_BW, $tsc_clone_data->TotalSoftCal_BStyle, $tsc_clone_data->TotalSoftCal_BCol, $tsc_clone_data->TotalSoftCal_BSCol, $tsc_clone_data->TotalSoftCal_MW, $tsc_clone_data->TotalSoftCal_HBgCol, $tsc_clone_data->TotalSoftCal_HCol, $tsc_clone_data->TotalSoftCal_HFS, $tsc_clone_data->TotalSoftCal_HFF, $tsc_clone_data->TotalSoftCal_WBgCol, $tsc_clone_data->TotalSoftCal_WCol, $tsc_clone_data->TotalSoftCal_WFS, $tsc_clone_data->TotalSoftCal_WFF, $tsc_clone_data->TotalSoftCal_LAW, $tsc_clone_data->TotalSoftCal_LAWS, $tsc_clone_data->TotalSoftCal_LAWC, $tsc_clone_data->TotalSoftCal_DBgCol, $tsc_clone_data->TotalSoftCal_DCol, $tsc_clone_data->TotalSoftCal_DFS, $tsc_clone_data->TotalSoftCal_TBgCol, $tsc_clone_data->TotalSoftCal_TCol, $tsc_clone_data->TotalSoftCal_TFS, $tsc_clone_data->TotalSoftCal_TNBgCol, $tsc_clone_data->TotalSoftCal_HovBgCol, $tsc_clone_data->TotalSoftCal_HovCol, $tsc_clone_data->TotalSoftCal_NumPos, $tsc_clone_data->TotalSoftCal_WDStart, $tsc_clone_data->TotalSoftCal_RefIcCol, $tsc_clone_data->TotalSoftCal_RefIcSize, $tsc_clone_data->TotalSoftCal_ArrowType, $tsc_clone_data->TotalSoftCal_ArrowLeft, $tsc_clone_data->TotalSoftCal_ArrowRight, $tsc_clone_data->TotalSoftCal_ArrowCol, $tsc_clone_data->TotalSoftCal_ArrowSize, $tsc_clone_data->TotalSoftCal_BackIconType, $tsc_clone_data->TotalSoftCal_DFF));
		}else if($tsc_get_type->TotalSoftCal_Type == 'Simple Calendar'){
			$wpdb->query($wpdb->prepare("INSERT INTO $tsc_simple_calendar_table (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal2_WDStart, TotalSoftCal2_BW, TotalSoftCal2_BS, TotalSoftCal2_BC, TotalSoftCal2_W, TotalSoftCal2_H, TotalSoftCal2_BxShShow, TotalSoftCal2_BxShType, TotalSoftCal2_BxSh, TotalSoftCal2_BxShC, TotalSoftCal2_MBgC, TotalSoftCal2_MC, TotalSoftCal2_MFS, TotalSoftCal2_MFF, TotalSoftCal2_WBgC, TotalSoftCal2_WC, TotalSoftCal2_WFS, TotalSoftCal2_WFF, TotalSoftCal2_LAW_W, TotalSoftCal2_LAW_S, TotalSoftCal2_LAW_C, TotalSoftCal2_DBgC, TotalSoftCal2_DC, TotalSoftCal2_DFS, TotalSoftCal2_TdBgC, TotalSoftCal2_TdC, TotalSoftCal2_TdFS, TotalSoftCal2_EdBgC, TotalSoftCal2_EdC, TotalSoftCal2_EdFS, TotalSoftCal2_HBgC, TotalSoftCal2_HC, TotalSoftCal2_ArrType, TotalSoftCal2_ArrFS, TotalSoftCal2_ArrC, TotalSoftCal2_OmBgC, TotalSoftCal2_OmC, TotalSoftCal2_OmFS, TotalSoftCal2_Ev_HBgC, TotalSoftCal2_Ev_HC, TotalSoftCal2_Ev_HFS, TotalSoftCal2_Ev_HFF, TotalSoftCal2_Ev_HText, TotalSoftCal2_Ev_BBgC, TotalSoftCal2_Ev_TC, TotalSoftCal2_Ev_TFF, TotalSoftCal2_Ev_TFS) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tsc_insert_id, $tsc_clone_data->TotalSoftCal_Name, $tsc_clone_data->TotalSoftCal_Type, $tsc_clone_data->TotalSoftCal2_WDStart, $tsc_clone_data->TotalSoftCal2_BW, $tsc_clone_data->TotalSoftCal2_BS, $tsc_clone_data->TotalSoftCal2_BC, $tsc_clone_data->TotalSoftCal2_W, $tsc_clone_data->TotalSoftCal2_H, $tsc_clone_data->TotalSoftCal2_BxShShow, $tsc_clone_data->TotalSoftCal2_BxShType, $tsc_clone_data->TotalSoftCal2_BxSh, $tsc_clone_data->TotalSoftCal2_BxShC, $tsc_clone_data->TotalSoftCal2_MBgC, $tsc_clone_data->TotalSoftCal2_MC, $tsc_clone_data->TotalSoftCal2_MFS, $tsc_clone_data->TotalSoftCal2_MFF, $tsc_clone_data->TotalSoftCal2_WBgC, $tsc_clone_data->TotalSoftCal2_WC, $tsc_clone_data->TotalSoftCal2_WFS, $tsc_clone_data->TotalSoftCal2_WFF, $tsc_clone_data->TotalSoftCal2_LAW_W, $tsc_clone_data->TotalSoftCal2_LAW_S, $tsc_clone_data->TotalSoftCal2_LAW_C, $tsc_clone_data->TotalSoftCal2_DBgC, $tsc_clone_data->TotalSoftCal2_DC, $tsc_clone_data->TotalSoftCal2_DFS, $tsc_clone_data->TotalSoftCal2_TdBgC, $tsc_clone_data->TotalSoftCal2_TdC, $tsc_clone_data->TotalSoftCal2_TdFS, $tsc_clone_data->TotalSoftCal2_EdBgC, $tsc_clone_data->TotalSoftCal2_EdC, $tsc_clone_data->TotalSoftCal2_EdFS, $tsc_clone_data->TotalSoftCal2_HBgC, $tsc_clone_data->TotalSoftCal2_HC, $tsc_clone_data->TotalSoftCal2_ArrType, $tsc_clone_data->TotalSoftCal2_ArrFS, $tsc_clone_data->TotalSoftCal2_ArrC, $tsc_clone_data->TotalSoftCal2_OmBgC, $tsc_clone_data->TotalSoftCal2_OmC, $tsc_clone_data->TotalSoftCal2_OmFS, $tsc_clone_data->TotalSoftCal2_Ev_HBgC, $tsc_clone_data->TotalSoftCal2_Ev_HC, $tsc_clone_data->TotalSoftCal2_Ev_HFS, $tsc_clone_data->TotalSoftCal2_Ev_HFF, $tsc_clone_data->TotalSoftCal2_Ev_HText, $tsc_clone_data->TotalSoftCal2_Ev_BBgC, $tsc_clone_data->TotalSoftCal2_Ev_TC, $tsc_clone_data->TotalSoftCal2_Ev_TFF, $tsc_clone_data->TotalSoftCal2_Ev_TFS));
		}else if($tsc_get_type->TotalSoftCal_Type == 'Flexible Calendar'){
			$wpdb->query($wpdb->prepare("INSERT INTO $tsc_flexible_calendar_table (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal3_MW, TotalSoftCal3_WDStart, TotalSoftCal3_BgC, TotalSoftCal3_GrC, TotalSoftCal3_BBC, TotalSoftCal3_BoxShShow, TotalSoftCal3_BoxShType, TotalSoftCal3_BoxSh, TotalSoftCal3_BoxShC, TotalSoftCal3_H_BgC, TotalSoftCal3_H_BTW, TotalSoftCal3_H_BTC, TotalSoftCal3_H_FF, TotalSoftCal3_H_MFS, TotalSoftCal3_H_MC, TotalSoftCal3_H_YFS, TotalSoftCal3_H_YC, TotalSoftCal3_H_Format, TotalSoftCal3_Arr_Type, TotalSoftCal3_Arr_C, TotalSoftCal3_Arr_S, TotalSoftCal3_Arr_HC, TotalSoftCal3_LAH_W, TotalSoftCal3_LAH_C, TotalSoftCal3_WD_BgC, TotalSoftCal3_WD_C, TotalSoftCal3_WD_FS, TotalSoftCal3_WD_FF, TotalSoftCal3_D_BgC, TotalSoftCal3_D_C, TotalSoftCal3_TD_BgC, TotalSoftCal3_TD_C, TotalSoftCal3_HD_BgC, TotalSoftCal3_HD_C, TotalSoftCal3_ED_C, TotalSoftCal3_ED_HC, TotalSoftCal3_Ev_Format, TotalSoftCal3_Ev_BTW, TotalSoftCal3_Ev_BTC, TotalSoftCal3_Ev_BgC, TotalSoftCal3_Ev_C, TotalSoftCal3_Ev_FS, TotalSoftCal3_Ev_FF) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tsc_insert_id, $tsc_clone_data->TotalSoftCal_Name, $tsc_clone_data->TotalSoftCal_Type, $tsc_clone_data->TotalSoftCal3_MW, $tsc_clone_data->TotalSoftCal3_WDStart, $tsc_clone_data->TotalSoftCal3_BgC, $tsc_clone_data->TotalSoftCal3_GrC, $tsc_clone_data->TotalSoftCal3_BBC, $tsc_clone_data->TotalSoftCal3_BoxShShow, $tsc_clone_data->TotalSoftCal3_BoxShType, $tsc_clone_data->TotalSoftCal3_BoxSh, $tsc_clone_data->TotalSoftCal3_BoxShC, $tsc_clone_data->TotalSoftCal3_H_BgC, $tsc_clone_data->TotalSoftCal3_H_BTW, $tsc_clone_data->TotalSoftCal3_H_BTC, $tsc_clone_data->TotalSoftCal3_H_FF, $tsc_clone_data->TotalSoftCal3_H_MFS, $tsc_clone_data->TotalSoftCal3_H_MC, $tsc_clone_data->TotalSoftCal3_H_YFS, $tsc_clone_data->TotalSoftCal3_H_YC, $tsc_clone_data->TotalSoftCal3_H_Format, $tsc_clone_data->TotalSoftCal3_Arr_Type, $tsc_clone_data->TotalSoftCal3_Arr_C, $tsc_clone_data->TotalSoftCal3_Arr_S, $tsc_clone_data->TotalSoftCal3_Arr_HC, $tsc_clone_data->TotalSoftCal3_LAH_W, $tsc_clone_data->TotalSoftCal3_LAH_C, $tsc_clone_data->TotalSoftCal3_WD_BgC, $tsc_clone_data->TotalSoftCal3_WD_C, $tsc_clone_data->TotalSoftCal3_WD_FS, $tsc_clone_data->TotalSoftCal3_WD_FF, $tsc_clone_data->TotalSoftCal3_D_BgC, $tsc_clone_data->TotalSoftCal3_D_C, $tsc_clone_data->TotalSoftCal3_TD_BgC, $tsc_clone_data->TotalSoftCal3_TD_C, $tsc_clone_data->TotalSoftCal3_HD_BgC, $tsc_clone_data->TotalSoftCal3_HD_C, $tsc_clone_data->TotalSoftCal3_ED_C, $tsc_clone_data->TotalSoftCal3_ED_HC, $tsc_clone_data->TotalSoftCal3_Ev_Format, $tsc_clone_data->TotalSoftCal3_Ev_BTW, $tsc_clone_data->TotalSoftCal3_Ev_BTC, $tsc_clone_data->TotalSoftCal3_Ev_BgC, $tsc_clone_data->TotalSoftCal3_Ev_C, $tsc_clone_data->TotalSoftCal3_Ev_FS, $tsc_clone_data->TotalSoftCal3_Ev_FF));
		}else if($tsc_get_type->TotalSoftCal_Type == 'TimeLine Calendar'){
			$wpdb->query($wpdb->prepare("INSERT INTO $tsc_timeline_calendar_table (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal4_01, TotalSoftCal4_02, TotalSoftCal4_03, TotalSoftCal4_04, TotalSoftCal4_05, TotalSoftCal4_06, TotalSoftCal4_07, TotalSoftCal4_08, TotalSoftCal4_09, TotalSoftCal4_10, TotalSoftCal4_11, TotalSoftCal4_12, TotalSoftCal4_13, TotalSoftCal4_14, TotalSoftCal4_15, TotalSoftCal4_16, TotalSoftCal4_17, TotalSoftCal4_18, TotalSoftCal4_19, TotalSoftCal4_20, TotalSoftCal4_21, TotalSoftCal4_22, TotalSoftCal4_23, TotalSoftCal4_24, TotalSoftCal4_25, TotalSoftCal4_26, TotalSoftCal4_27, TotalSoftCal4_28, TotalSoftCal4_29, TotalSoftCal4_30, TotalSoftCal4_31, TotalSoftCal4_32, TotalSoftCal4_33, TotalSoftCal4_34, TotalSoftCal4_35, TotalSoftCal4_36, TotalSoftCal4_37, TotalSoftCal4_38, TotalSoftCal4_39) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tsc_insert_id, $tsc_clone_data->TotalSoftCal_Name, $tsc_clone_data->TotalSoftCal_Type, $tsc_clone_data->TotalSoftCal4_01, $tsc_clone_data->TotalSoftCal4_02, $tsc_clone_data->TotalSoftCal4_03, $tsc_clone_data->TotalSoftCal4_04, $tsc_clone_data->TotalSoftCal4_05, $tsc_clone_data->TotalSoftCal4_06, $tsc_clone_data->TotalSoftCal4_07, $tsc_clone_data->TotalSoftCal4_08, $tsc_clone_data->TotalSoftCal4_09, $tsc_clone_data->TotalSoftCal4_10, $tsc_clone_data->TotalSoftCal4_11, $tsc_clone_data->TotalSoftCal4_12, $tsc_clone_data->TotalSoftCal4_13, $tsc_clone_data->TotalSoftCal4_14, $tsc_clone_data->TotalSoftCal4_15, $tsc_clone_data->TotalSoftCal4_16, $tsc_clone_data->TotalSoftCal4_17, $tsc_clone_data->TotalSoftCal4_18, $tsc_clone_data->TotalSoftCal4_19, $tsc_clone_data->TotalSoftCal4_20, $tsc_clone_data->TotalSoftCal4_21, $tsc_clone_data->TotalSoftCal4_22, $tsc_clone_data->TotalSoftCal4_23, $tsc_clone_data->TotalSoftCal4_24, $tsc_clone_data->TotalSoftCal4_25, $tsc_clone_data->TotalSoftCal4_26, $tsc_clone_data->TotalSoftCal4_27, $tsc_clone_data->TotalSoftCal4_28, $tsc_clone_data->TotalSoftCal4_29, $tsc_clone_data->TotalSoftCal4_30, $tsc_clone_data->TotalSoftCal4_31, $tsc_clone_data->TotalSoftCal4_32, $tsc_clone_data->TotalSoftCal4_33, $tsc_clone_data->TotalSoftCal4_34, $tsc_clone_data->TotalSoftCal4_35, $tsc_clone_data->TotalSoftCal4_36, $tsc_clone_data->TotalSoftCal4_37, $tsc_clone_data->TotalSoftCal4_38, $tsc_clone_data->TotalSoftCal4_39));
		}
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_settings_table (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_01, TotalSoftCal_02, TotalSoftCal_03, TotalSoftCal_04, TotalSoftCal_05, TotalSoftCal_06, TotalSoftCal_07, TotalSoftCal_08, TotalSoftCal_09, TotalSoftCal_10, TotalSoftCal_11, TotalSoftCal_12, TotalSoftCal_13, TotalSoftCal_14, TotalSoftCal_15, TotalSoftCal_16, TotalSoftCal_17, TotalSoftCal_18, TotalSoftCal_19, TotalSoftCal_20, TotalSoftCal_21, TotalSoftCal_22, TotalSoftCal_23, TotalSoftCal_24, TotalSoftCal_25, TotalSoftCal_26, TotalSoftCal_27, TotalSoftCal_28, TotalSoftCal_29, TotalSoftCal_30) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tsc_insert_id, $tsc_settings->TotalSoftCal_Name, $tsc_settings->TotalSoftCal_Type, $tsc_settings->TotalSoftCal_01, $tsc_settings->TotalSoftCal_02, $tsc_settings->TotalSoftCal_03, $tsc_settings->TotalSoftCal_04, $tsc_settings->TotalSoftCal_05, $tsc_settings->TotalSoftCal_06, $tsc_settings->TotalSoftCal_07, $tsc_settings->TotalSoftCal_08, $tsc_settings->TotalSoftCal_09, $tsc_settings->TotalSoftCal_10, $tsc_settings->TotalSoftCal_11, $tsc_settings->TotalSoftCal_12, $tsc_settings->TotalSoftCal_13, $tsc_settings->TotalSoftCal_14, $tsc_settings->TotalSoftCal_15, $tsc_settings->TotalSoftCal_16, $tsc_settings->TotalSoftCal_17, $tsc_settings->TotalSoftCal_18, $tsc_settings->TotalSoftCal_19, $tsc_settings->TotalSoftCal_20, $tsc_settings->TotalSoftCal_21, $tsc_settings->TotalSoftCal_22, $tsc_settings->TotalSoftCal_23, $tsc_settings->TotalSoftCal_24, $tsc_settings->TotalSoftCal_25, $tsc_settings->TotalSoftCal_26, $tsc_settings->TotalSoftCal_27, $tsc_settings->TotalSoftCal_28, $tsc_settings->TotalSoftCal_29, $tsc_settings->TotalSoftCal_30));
		wp_send_json_success();
	}
	add_action( 'wp_ajax_ts_event_delete', 'ts_event_delete' );
	function ts_event_delete(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
		global $wpdb;
		$tsc_events_table  = $wpdb->prefix . "totalsoft_cal_events";
		$tsc_event_settings_table  = $wpdb->prefix . "totalsoft_cal_events_p2";
		$tsc_event_rec_table = $wpdb->prefix . "totalsoft_cal_events_p3";
		$wpdb->query($wpdb->prepare("DELETE FROM $tsc_events_table WHERE id = %d", (int) $tsc_event_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $tsc_event_settings_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $tsc_event_rec_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id));
		wp_send_json_success();
	}
	add_action( 'wp_ajax_ts_event_edit', 'ts_event_edit' );
	function ts_event_edit(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
		global $wpdb;
		$tsc_events_table = $wpdb->prefix . "totalsoft_cal_events";
		$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE id = %d", $tsc_event_id));
		wp_send_json_success($tsc_response);
	}
	add_action( 'wp_ajax_ts_event_edit_settings', 'ts_event_edit_settings' );
	function ts_event_edit_settings(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
		global $wpdb;
		$tsc_event_settings_table = $wpdb->prefix . "totalsoft_cal_events_p2";
		$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_settings_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id),ARRAY_A);
		$tsc_response["TotalSoftCal_EvDesc"] = html_entity_decode($tsc_response["TotalSoftCal_EvDesc"]);
		wp_send_json_success($tsc_response);
	}
	add_action( 'wp_ajax_ts_event_edit_rec', 'ts_event_edit_rec' );
	function ts_event_edit_rec(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
		global $wpdb;
		$tsc_event_rec_table = $wpdb->prefix . "totalsoft_cal_events_p3";
		$tsc_response = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_rec_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id),ARRAY_A);
		wp_send_json_success($tsc_response);
	}
	add_action( 'wp_ajax_ts_event_clone', 'ts_event_clone' );
	function ts_event_clone(){
		if ( !isset($_POST['tsc_nonce']) || $_POST['tsc_nonce'] == "" ||  ! wp_verify_nonce( $_POST['tsc_nonce'], 'tsc_admin_nonce_field' ) ) {
			wp_send_json_error("Not valid nonce.");
		}
		$tsc_event_id = sanitize_text_field($_POST['tsc_event_id']);
		global $wpdb;
		$tsc_events_table = $wpdb->prefix . "totalsoft_cal_events";
		$tsc_event_settings_table = $wpdb->prefix . "totalsoft_cal_events_p2";
		$tsc_event_rec_table = $wpdb->prefix . "totalsoft_cal_events_p3";
		$tsc_event = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_events_table WHERE id = %d", $tsc_event_id));
		$tsc_event_settings = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_settings_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id));
		$tsc_event_rec = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tsc_event_rec_table WHERE TotalSoftCal_EvCal = %s", $tsc_event_id));
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_events_table (id, TotalSoftCal_EvName, TotalSoftCal_EvCal, TotalSoftCal_EvStartDate, TotalSoftCal_EvEndDate, TotalSoftCal_EvURL, TotalSoftCal_EvURLNewTab, TotalSoftCal_EvStartTime, TotalSoftCal_EvEndTime, TotalSoftCal_EvColor) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tsc_event->TotalSoftCal_EvName, $tsc_event->TotalSoftCal_EvCal, $tsc_event->TotalSoftCal_EvStartDate, $tsc_event->TotalSoftCal_EvEndDate, $tsc_event->TotalSoftCal_EvURL, $tsc_event->TotalSoftCal_EvURLNewTab, $tsc_event->TotalSoftCal_EvStartTime, $tsc_event->TotalSoftCal_EvEndTime, $tsc_event->TotalSoftCal_EvColor));
		$tsc_insert_id = $wpdb->insert_id;
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_settings_table (id, TotalSoftCal_EvDesc, TotalSoftCal_EvImg, TotalSoftCal_EvVid_Src, TotalSoftCal_EvVid_Iframe, TotalSoftCal_EvCal) VALUES (%d, %s, %s, %s, %s, %s)", '', $tsc_event_settings->TotalSoftCal_EvDesc, $tsc_event_settings->TotalSoftCal_EvImg, $tsc_event_settings->TotalSoftCal_EvVid_Src, $tsc_event_settings->TotalSoftCal_EvVid_Iframe, $tsc_insert_id));
		$wpdb->query($wpdb->prepare("INSERT INTO $tsc_event_rec_table (id, TotalSoftCal_EvCal, TotalSoftCal_EvRec) VALUES (%d, %s, %s)", '', $tsc_insert_id, $tsc_event_rec->TotalSoftCal_EvRec));
		wp_send_json_success();
	}
?>