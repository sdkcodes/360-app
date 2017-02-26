<?php 

if ( ! function_exists('is_admin'))
{
	function is_admin()
	{
		$CI = get_instance();
		if($CI->session->userdata('user_name')!='' && intval($CI->session->userdata('user_type'))===1)
			return TRUE;
		else
			return FALSE;
	}
}

if ( ! function_exists('is_staff'))
{
	function is_staff()
	{
		$CI = get_instance();
		if($CI->session->userdata('user_name')!='' && intval($CI->session->userdata('user_type'))===2)
			return TRUE;
		else
			return FALSE;
	}
}

if ( ! function_exists('is_loggedin'))
{
	function is_loggedin()
	{
		$CI = get_instance();
		if($CI->session->userdata('user_name')=='')
			return FALSE;
		else
			return TRUE;
	}
}

if (! function_exists('get_user_by_id')){
	function get_user_by_id($userId){
		$CI = get_instance();
		$CI->db->where("uniqueId", $userId);
		$result = $CI->db->get("user");
		if ($result->num_rows() > 0){
			return $result->row();
		}
	}
}
?>