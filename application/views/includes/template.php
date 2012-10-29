<?php
/**
 * Dynamic Page Generator
 *
 * @author Jason Tan
 */
?>
<?php
/**
 * 	//Initialize vars if does not exist
 *
 * @var string
 * @var string
 * @var string
 **/
if ( !isset($css) ) { $css = ""; } 
if ( !isset($js) ) { $js = ""; } 
if ( !isset($role) ) { $role = ""; } 

$data['js'] = $js;
$data['css'] = $css;

$allowed = false;

/**
 * User permission logic
 *
 * If $role is defined in controller, 
 * must ensure value is same as session('role').
 * Or else page will be considered as public.
 * Admin overwrites everything
 *
 * $allowed set to true if allowed else false
 * 
 **/
$session_role = $this->session->userdata('role');

if ($session_role === 1) { $allowed = true; } 
else {
	if ( empty($role) ) { $allowed = true; } 
	else {
		if ($session_role == $role) { $allowed = true; }
		else { $allowed = false; }
	}	
}

?>

<!-- header and footer is loaded, the part that will be dynamic will be the middle part -->
<?php $this->load->view('includes/header', $data); ?>

<?php
	$view = ($allowed) ? $main_content : 'includes/no_permission';
	$this->load->view($view, $data);		
?>

<?php $this->load->view('includes/footer'); ?>





