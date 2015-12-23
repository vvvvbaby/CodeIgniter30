<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Common_db');
	}

	public function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		
		//$this->load->view('wordpress/upload_form', array('error' => ' ' ));
		
		if (!$this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
		
			$this->load->view('wordpress/upload_form', $error);
		}
		else
		{
			$retmes = $this->upload->data();
			
			//存储数据,load common_db
			$res = true;
			$res = $this->Common_db->insert_pic($retmes);
			if ($res) 
			{
				//测试文本是否能post过来
				$retmes['myposttxt'] = $_POST['filedesc'];
				$data = array('upload_data' => $retmes);
				$this->load->view('wordpress/upload_sucess', $data);
			}
			else 
			{
				$retmes['error'] = 'update db fail';
				$data = array('upload_data' => $retmes);		
				$this->load->view('wordpress/upload_sucess', $data);
			}
			
		}
	}
}