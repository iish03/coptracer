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

class dashboard extends account
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	/**
	 * GET ATTRIBUTE OF STATUS BOX
	 * @param String, $box
	 * @param Integer, $data
	 * @return Array
	 * --------------------------------------------
	 */
	public function get_stat_attribute($box,$data)
	{
		switch ($box) {
			case 'ongoing_events' :
						$color       = 'aqua';
						$description = 'Ongoing Events';
						$icon        = 'android_calendar';
						$link        = 'account/events/view/ongoing';
						break;
			case 'participant_req':
						$color       = 'green';
						$description = 'New Participants';
						$icon        = 'person_add';
						$link        = '';
						break;
			case 'unpaid_participant':
						$color       = 'yellow';
						$description = 'Unpaid Participants';
						$icon        = 'pricetag_outline';
						$link        = '';
						break;
			case 'members':
						$color       = 'red';
						$description = 'Members';
						$icon        = 'people';
						$link        = 'account/manage_users';
						break;
			default:
						$color       = 'aqua';
						$description = '';
						$icon        = '';
						$link        = '';
						break;
		}

		return array(
							'color'=>$color,
							'data'=>$data,
							'description'=>$description,
							'icon'=>$icon,
							'link'=>$link
							);
	}

	/**
	 * DISPLAY STATUS BOX
	 * @return String, $stat_box
	 * --------------------------------------------
	 */
	public function display_admin_stat_box()
	{
		$details    = array();
		$users      = new users;
		$status_box = new status_box;

		//GET DESCRIPTION FOR STATUS BOX ATTRIBUTE
		$no_of_ongoing = $this->events_model->get_no_of_events('ongoing');
		$no_of_new     = $this->events_model->get_no_of_member('new');
		$no_of_unpaid  = $this->events_model->get_no_of_member('unpaid');
		$no_of_partial = $this->events_model->get_no_of_member('partial');
		$total_unpaid  = $no_of_unpaid + $no_of_partial;
		$no_of_members = $users->get_no_of_user();

		//STATUS BOX ATTRIBUTES
		$ongoing_detail = $this->get_stat_attribute('ongoing_events', $no_of_ongoing);
		$new_mem_detail = $this->get_stat_attribute('participant_req', $no_of_new);
		$unpaid_detail  = $this->get_stat_attribute('unpaid_participant', $total_unpaid);
		$members_detail = $this->get_stat_attribute('members', $no_of_members);

		//GET ALL DETAILS IN AN ARRAY
		array_push($details, $ongoing_detail);
		array_push($details, $new_mem_detail);
		array_push($details, $unpaid_detail);
		array_push($details, $members_detail);

		//CREATE A STATUS BOX
		$stat_box = $status_box->view($details);

		return $stat_box;
	}

	public function display_user_stat_box()
	{
		$stat_box = '';
		return $stat_box;
	}

	/**
	 * DISPLAY DASHBOARD PAGE
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

		if( $session_data['is_admin'] == 'on' ){
			$status_box = $this->display_admin_stat_box();
		}else{
			$status_box = $this->display_user_stat_box();
		}

		$data['header']  = $header;
		$data['sidebar'] = $sidebar;
		$data['content_header'] = $c_header;
		$data['stat_box'] = $status_box;
		
		$this->load->view('templates/accounts/header', $data);
		$this->load->view('account/'.$page, $data);
		$this->load->view('templates/accounts/footer');
	}
}
?>