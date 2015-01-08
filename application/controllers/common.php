<?php
/*********************************************************************************
** The contents of this file are subject to the ______________________
 * Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: ______________________
 * The Initial Developer of the Original Code is CodeIgniter.
 * Portions created by KBVCodes are Copyright (C) KBVCodes.
 * All Rights Reserved.
 *
 ********************************************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function loadLanguage()
	{
		$this->lang->load('labels', 'english');
		$this->lang->load('error', 'english');
	}

	/**
	 * GET CONSTANTS
	 * @param String, $type
	 * @param String, $request
	 * @return Array
	 * --------------------------------------------
	 */
	static function get_constants($type, $request)
	{
		$constants = array(
			'meta' => array(
				'DESCRIPTION' => 'COP Tracer',
				'KEYWORDS'    => 'cop, training, seminar, outreach, program',
				'AUTHOR'      => 'KBVCodes, 2014', ),
			'imgPath' => array(
				'BANNER' => '/upload/banner/', ),
		);

		return $constants[$type][$request];
	}

	/**
	 * GET STYLESHEETS
	 * @param String, $page
	 * @return Array, $style
	 * --------------------------------------------
	 */
	static function get_style_sheet($page)
	{
		$style = array();

		//DARK BOOTSTRAP THEME
		$bs_acct = array('dashboard');
		$bs_dark = array('login', 'forgot_password', 'register');

		if( in_array( strtolower($page), $bs_dark ) ){
			array_push($style, 'assets/css/bootstrap.min.css');
			array_push($style, 'assets/css/font-awesome.min.css');
			array_push($style, 'assets/css/AdminLTE.css');
		}elseif( in_array( strtolower($page), $bs_acct ) ){
			array_push($style, 'assets/css/bootstrap.min.css');
			array_push($style, 'assets/css/font-awesome.min.css');
			array_push($style, 'assets/css/ionicons.min.css');
			array_push($style, 'assets/css/morris/morris.css');
			array_push($style, 'assets/css/jvectormap/jquery-jvectormap-1.2.2.css');
			array_push($style, 'assets/css/daterangepicker/daterangepicker-bs3.css');
			array_push($style, 'assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
			array_push($style, 'assets/css/AdminLTE.css');
		}

		return $style;
	}

	/**
	 * GET JAVASCRIPT | JQUERY
	 * @param String, $page
	 * @return Array, $script
	 * --------------------------------------------
	 */
	static function get_scripts($page)
	{
		$script = array();

		//DARK BOOTSTRAP THEME
		$bs_acct = array('dashboard');
		$bs_dark = array('login', 'forgot_password', 'register');

		if( in_array( strtolower($page), $bs_dark ) ){
			array_push($script, 'assets/js/jquery.min.js');
			array_push($script, 'assets/js/bootstrap.min.js');
		}elseif( in_array( strtolower($page), $bs_acct ) ){
			array_push($script, 'assets/js/jquery.min.js');
			array_push($script, 'assets/js/bootstrap.min.js');
			array_push($script, 'assets/js/jquery-ui.min.js');
			array_push($script, 'assets/js/raphael-min.js');
			array_push($script, 'assets/js/plugins/morris/morris.min.js');
			array_push($script, 'assets/js/plugins/sparkline/jquery.sparkline.min.js');
			array_push($script, 'assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
			array_push($script, 'assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
			array_push($script, 'assets/js/plugins/jqueryKnob/jquery.knob.js');
			array_push($script, 'assets/js/plugins/daterangepicker/daterangepicker.js');
			array_push($script, 'assets/js/plugins/datepicker/bootstrap-datepicker.js');
			array_push($script, 'assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
			array_push($script, 'assets/js/plugins/iCheck/icheck.min.js');
			array_push($script, 'assets/js/AdminLTE/app.js');
			array_push($script, 'assets/js/AdminLTE/dashboard.js');
			array_push($script, 'assets/js/AdminLTE/demo.js');
		}

		return $script;
	}

	/**
	 * GET CLASS FOR HTML BODY
	 * @param String, $page
	 * @return <body> tag
	 * --------------------------------------------
	 */
	static function get_body_class($page)
	{
		$bs_acct = array('dashboard');
		$bs_dark = array('login', 'forgot_password', 'register');

		//DARK BOOTSTRAP THEME
		if( in_array( strtolower($page), $bs_dark ) ){
			return element_tag('body', array('class'=>'bg-black'));
		}elseif( in_array( strtolower($page), $bs_acct ) ){
			return element_tag('body', array('class'=>'skin-blue'));
		}
	}

	/**
	 * META TAGS
	 * @return data
	 * --------------------------------------------
	 */
	public function display_header($page)
	{
		$data['title']       = ucfirst($page);
		$data['description'] = self::get_constants('meta', 'DESCRIPTION');
		$data['keywords']    = self::get_constants('meta', 'KEYWORDS');
		$data['author']      = self::get_constants('meta', 'AUTHOR');
		$data['style']       = self::get_style_sheet($page);
		$data['script']      = self::get_scripts($page);
		$data['body']        = self::get_body_class($page);

		return $this->load->view('templates/header', $data);
	}

	/**
	 * DISPLAY ALL DATA IN FOOTER
	 * @return data
	 * --------------------------------------------
	 */
	public function display_footer()
	{
		return $this->load->view('templates/footer');
	}

	/**
	 * GET CURRENT DATETIME
	 * @return date (Y-m-d H:i:s)
	 * --------------------------------------------
	 */
	static function get_today()
	{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();

		return mdate($datestring, $time);
	}

	static function format_date($datetime, $format='Y-m-d')
	{
		$date = new DateTime($datetime);
		$formatted =  $date->format($format);
		return $formatted;
	}

	/**
	 * DISPLAYS AN ERROR MESSAGE
	 * @return String
	 * --------------------------------------------
	 */
	static function error_msg($msg)
	{
		return p($msg, array('class'=>'error'));
	}


	/**
	 * CHECKS IF THERE IS A LOGGED IN USER
	 * @return redirect
	 * --------------------------------------------
	 */
	public function check_login()
	{
		if( $this->session->userdata('logged_in') ){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	 * CREATES ICON
	 * @param Array, $icon
	 * @return String, <i>
	 * --------------------------------------------------------
	 */
	static function create_icon($icon)
	{
		if( ! is_array($icon) ){ return ''; }

		return i('&nbsp', $icon);
	}
}
?>