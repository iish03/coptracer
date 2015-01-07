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

class sidebar extends account
{

	private $links;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_links()
	{
		$this->links = array(
			0 => array(
				'title'=>'Dashboard',
				'link' =>'account/dashboard',
				'class'=> array('class'=>'active'),
				'icon' => array('class'=>'fa fa-dashboard'),
				'badge'=> 'none',
				'drop' => 'none'
				),
			1 => array(
				'title'=>'Events',
				'link' =>'account/events',
				'class'=> array('class'=>''),
				'icon' => array('class'=>'fa fa-th'),
				'badge'=> array(
										'text' => 'new',
										'class'=> array(
												'class'=>'badge pull-right bg-green'
											)
									),
				'drop' => 'none'
				)
			);
	}

	public function create_badge($badge)
	{
		if( ! is_array($badge) ){ return; }

		return create_tag('small', $badge['text'], $badge['class']);
	}

	public function view_sidebar()
	{
		$this->get_links();
		$li = '';
		foreach ($this->links as $content) {
			$li.= $this->create_badge($content['badge']);
		}
		return $li;
	}
}
?>