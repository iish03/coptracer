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
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function get_stat_attribute($box,$data)
	{
		switch ($box) {
			case 'ongoing_events' :
						$color       = 'aqua';
						$description = 'Ongoing Events';
						$icon        = 'alarm_outline';
						break;
			case 'participant_req':
						$color       = 'green';
						$description = 'New Participants';
						$icon        = 'person_add';
						break;
			case 'unpaid_participant':
						$color       = 'yellow';
						$description = 'Unpaid Participants';
						$icon        = 'pricetag_outline';
						break;
			case 'members':
						$color       = 'red';
						$description = 'Members';
						$icon        = 'person_add';
						break;
			default:
						$color       = 'aqua';
						$description = '';
						$icon        = '';
						break;
		}

		return array(
							'color'=>$color,
							'data'=>$data,
							'description'=>$description,
							'icon'=>$icon
							);
	}

	public function display_stat_box()
	{
		$details    = array();
		$users      = new users;
		$status_box = new status_box;

		//GET DESCRIPTION FOR STATUS BOX ATTRIBUTE
		$no_of_members = $users->get_no_of_user();

		//STATUS BOX ATTRIBUTES
		$members_detail = $this->get_stat_attribute('members', $no_of_members);

		//GET ALL DETAILS IN AN ARRAY
		array_push($details, $members_detail);

		//CREATE A STATUS BOX
		$stat_box = $status_box->view($details);

		return $stat_box;
	}

	public function view($page, $header, $sidebar, $c_header)
	{
		$data['header']  = $header;
		$data['sidebar'] = $sidebar;
		$data['content_header'] = $c_header;
		$data['stat_box'] = $this->display_stat_box();
		return $this->load->view('account/'.$page, $data);
	}
}
?>