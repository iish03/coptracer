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

class events extends account
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('file');
		$this->load->library('form_validation');
	}


	public function create($page, $header, $sidebar, $c_header)
	{
		$session_data = $this->session->userdata('logged_in');
		$data['header']  = $header;
		$data['sidebar'] = $sidebar;
		$data['content_header'] = $c_header;
		$data['events_category'] = $this->events_model->get_categories();

		$this->load->view('templates/accounts/header', $data);
		$this->load->view('templates/forms/create_event_form', $data);
		$this->load->view('templates/accounts/footer', $data);
	}

	/**
	 * DISPLAY EVENTS PAGE
	 * @param String, $page
	 * @param String, $header
	 * @param String, $sidebar
	 * @param String, $c_header
	 * @return page
	 * --------------------------------------------
	 */
	public function view($page, $header, $sidebar, $c_header)
	{
		$session_data = $this->session->userdata('logged_in');
		$data['header']  = $header;
		$data['sidebar'] = $sidebar;
		$data['content_header'] = $c_header;

		$parameter = $this->uri->slash_segment(3, 'leading');

		
		if( $parameter  == '/create'){
			$this->create($page, $header, $sidebar, $c_header);
		}else{
			$this->load->view('templates/accounts/header', $data);
			$this->load->view('account/'.$page, $data);
			$this->load->view('templates/accounts/footer');
		}
		
	}
}
?>