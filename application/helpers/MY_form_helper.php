<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Country Dropdown Menu
 *
 * Create a dropdown menu that is populated with country loaded from $config['country_list']
 *
 * @access	public
 * 
 * @param 	string	Name of the select form. DEFAULT is country.
 *
 * @return 	string 	Complete build of Country Dropdown Menu
 */

function country_dropdown($name = 'country', $selected_country = '') {
	//Get an instance of CodeIgniter before loading country_list
	$CI =& get_instance();
	$CI->config->load('country_list');
	$countries = config_item('country_list');
	
	$html = "<select name = '{$name}'>";
	$html .= "<option value = ''>Please select a country</option>";
	
	foreach ($countries as $key => $value) {
		$selected = (strtolower($value) === strtolower($selected_country)) ? "SELECTED": "" ;
		$html .= "<option value = '{$selected_country}' {$selected}>{$value}</option> ";
	}
	
	$html .= "</select>";
	return $html;
}		

/* End of file MY_form_helper.php */
/* Location: ./helpers/MY_form_helper.php */