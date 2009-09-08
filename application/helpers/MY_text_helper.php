<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('url_limiter'))
{
	function url_limiter($str, $n = 500, $end_char = '&#8230;')
	{
		if (strlen($str) < $n)
		{
			return $str;
		}
		
		$str = preg_replace("/\s+/", ' ',$str);

		if (strlen($str) <= $n)
		{
			return $str;
		}
									
		$out = "";
		foreach (explode('/', trim($str)) as $val)
		{
			$out .= $val.'/';			
			if (strlen($out) >= $n)
			{
				return trim($out).$end_char;
			}		
		}
	}
}