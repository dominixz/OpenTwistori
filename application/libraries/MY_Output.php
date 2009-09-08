<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Clear Cache
*
* Responsible for sending final output to browser
*
* @package        CodeIgniter
* @subpackage    Libraries
* @added-by    Chitpong Wuttanan
*/
class My_Output extends CI_Output {

	function clear_cache($set_uri = NULL){
	
	
		$CFG =& load_class('Config');
		
		$uri =	$CFG->item('base_url').
					$CFG->item('index_page').'/'.$set_uri;
		
		$filepath = ($CFG->item('cache_path') == '') ? BASEPATH.'cache/' : $CFG->item('cache_path').md5($uri);

		if(file_exists($filepath))
		{
			@unlink($filepath);
			log_message('debug', "Cache deleted for: ".$set_uri);
			return $filepath;
		} 
		else 
		{
			return false;
		}
	}
}