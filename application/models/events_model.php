<?php
/*********************************************************************************
** The contents of this file are subject to the ______________________
 * Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: ______________________
 * The Initial Developer of the Original Code is Krishia Valencia.
 * Portions created by KBVCodes are Copyright (C) KBVCodes.
 * All Rights Reserved.
 *
 ********************************************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * GET NO. OF EVENTS PER STATUS
	 * - ongoing
	 * - closed
	 * @return Integer
	 * --------------------------------------------
	 */
	public function get_no_of_events($status)
	{
		$this->db->where('status', $status);
		$this->db->from('cop_events');
		return $this->db->count_all_results();
	}

	/**
	 * GET NO. OF MEMBER PER STATUS
	 * - new
	 * - approved
	 * - denied
	 * - Paid
	 * - Not full paid
	 * - Unpaid
	 * @return Integer
	 * --------------------------------------------
	 */
	public function get_no_of_member($status)
	{
		switch ($status) {
			case 'new'     : $fieldname = 'status';					break;
			case 'approved': $fieldname = 'status';					break;
			case 'denied'  : $fieldname = 'status';					break;
			case 'paid'    : $fieldname = 'payment_status';	break;
			case 'partial' : $fieldname = 'payment_status';	break;
			case 'unpaid'  : $fieldname = 'payment_status';	break;
			default: return; break;
		}
		$this->db->where($fieldname, $status);
		$this->db->from('cop_events_member');
		return $this->db->count_all_results();
	}

}
?>