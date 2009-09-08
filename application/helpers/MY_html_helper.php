<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('path_js'))
{
	function path_js($path='',$default = FALSE)
	{
		$ci =& get_instance();
		return $default ? $ci->config->item('javascript_folder').$path : $ci->config->item('base_url').$ci->config->item('javascript_folder').$path;
	}	
}

if ( ! function_exists('path_css'))
{
	function path_css($path='',$default = FALSE)
	{
		$ci =& get_instance();
		return $default ? $ci->config->item('css_folder').$path : $ci->config->item('base_url').$ci->config->item('css_folder').$path;
	}	
}

if ( ! function_exists('include_js'))
{
	function include_js($path='',$default = FALSE,$extension = '.js')
	{
		$path = path_js($path.$extension,$default);
		$include_string = "<script type='text/javascript' src='$path'></script>";
		return $include_string;
	}	
}

if ( ! function_exists('include_css'))
{
	function include_css($path='',$media = "all",$default = FALSE , $extension = '.css')
	{
		$path = path_css($path.$extension,$default);
		$include_string = "<link href='$path' rel='stylesheet' type='text/css' media='$media' />";
		return $include_string;
	}	
}