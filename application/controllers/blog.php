<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("PRC");

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	function __construct()
	{
		parent::__construct();
		$this->load->model('Common_db');
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->helper('cookie');
		$this->load->library('session');
		$this->load->library('image_lib');
		$this->load->library('pagination');
	}


	public function index()
	{
		$data['title'] = 'blog title';
		$data['heading'] = 'blog heading';
		$data['query'] = $this->Common_db->get_blog();
		$this->load->view('wordpress/blog/blog_view',$data);
	}

	public function comments()
	{
		$data['title'] = 'comment title';
		$data['heading'] = 'comment heading';
		//获取偏移量，如果为空认为页面刚打开，用于获取查询总条目数
		$segnum = $this->uri->segment(4,0);

		//考虑存session，时间可以按一个小时
		$sessname = 'blog_'.$this->uri->segment(3);
		$sesscount = $this->session->tempdata($sessname);
		if(!isset($sesscount))
		{
			$rescount = $this->Common_db->get_comments_count($this->uri->segment(3));
			//记录temp session 时间设置一个小时
			$this->session->set_tempdata($sessname,$rescount,60*60);
		}
		else 
		{
			$rescount = $this->session->tempdata($sessname);
		}

		//配置分页参数
		$config['base_url'] = site_url('blog/comments').'/'.$this->uri->segment(3);
		$config['total_rows'] = $rescount;
		$config['per_page'] = 4;
		$config['uri_segment']=4;
		$data['query'] = $this->Common_db->get_comments($this->uri->segment(3),$config['per_page'],$segnum);
		$this->pagination->initialize($config);
		$data['pagecontrol'] = $this->pagination->create_links();
		$this->load->view('wordpress/blog/comment_view',$data);
	}
	
	public function comment_insert()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|txt|doc';
		$config['max_size']             = 1200000;
		$config['max_width']            = 50000;
		$config['max_height']           = 35000;
		
		
		if(isset($_FILES['userfile']) && $_FILES['userfile']['size'] > 0)
		{
			$this->load->library('upload', $config);
			//上传图片
			if (!$this->upload->do_upload('userfile'))
			{
				echo "<script>alert('文件上传失败');history.go(-1);</script>";
				exit();
			}
			else
			{
				$retmes = $this->upload->data();
					
				//添加水印
				$configwater['source_image'] = './uploads/'.$retmes['file_name'];
				$configwater['wm_text'] = 'Copyright 2015 - Terry Zhao';
				$configwater['wm_type'] = 'text';
				$configwater['wm_font_path'] = './system/fonts/texb.ttf';
				//可以根据分辨率大小来调整字体，最好做个分辨率判断
				$configwater['wm_font_size'] = '16';
				$configwater['wm_font_color'] = 'ffffff';
				$configwater['wm_vrt_alignment'] = 'bottom';
				$configwater['wm_hor_alignment'] = 'center';
				//$configwater['wm_padding'] = '50';
				$configwater['wm_vrt_offse'] = '100';
				$configwater['wm_hor_offset'] = '200';
					
				$this->image_lib->initialize($configwater);
				$this->image_lib->watermark();
					
			
				$poststr["entry_id"] = $_POST["entry_id"];
				$poststr['body'] = $_POST['body'];
				$poststr['author'] = $_POST['author'];
				$poststr['pic'] = $retmes['file_name'];
				$poststr['filename'] = $retmes['file_name'];
				//存储数据,load common_db
				$poststr['update'] = time();
				$this->Common_db->comments_insert($poststr);
				//发送邮件测试
				mail('67668852@qq.com', 'blog reply', $_POST['body'],'From: zsl');
				redirect('blog/comments/'.$_POST['entry_id']);
					
			}
			
		}
		else 
		{
			$poststr["entry_id"] = $_POST["entry_id"];
			$poststr['body'] = $_POST['body'];
			$poststr['author'] = $_POST['author'];
			$poststr['pic'] = null;
			$poststr['filename'] = null;
			//存储数据,load common_db
			$poststr['update'] = time();
			$this->Common_db->comments_insert($poststr);
			//发送邮件测试
			//mail('67668852@qq.com', 'blog reply', $_POST['body'],'From: zsl');
			redirect('blog/comments/'.$_POST['entry_id']);
			
		}
		

	}
	
	public function topicinsert()
	{
		if (!isset($_POST)) 
		{
			echo "<script>alert('网页提交异常');history.go(-1);</script>";
			exit();
		}
		$poststr['title'] = $_POST['title'];
		$poststr['body'] = $_POST['body'];
		$poststr['author'] = $_POST['author'];
		$poststr['update'] = time();
		$ret = $this->Common_db->topic_insert($poststr);
		if ($ret) 
		{
			redirect('blog/index/'.$_POST['entry_id']);
		}
		else 
		{
			echo "<script>alert('提交数据异常');history.go(-1);</script>";
			exit();
		}
	}
	
	public function filedownload()
	{
		$filename = $this->uri->segment(3);
		$file_dir = PROJECTDIR.'uploads/';
		$file_path = $file_dir.$filename;
		//判断要下载的文件是否存在
		if(!file_exists($file_path))
		{
			echo 'file not exists'.' filename is '.$file_path;
			return false;
		}
		$file_size = filesize($file_path);
		header('Content-Description: File Transfer'); 
		header('Content-Type: application/octet-stream'); 
		header('Content-Disposition: attachment; filename='.$filename); 
		header('Content-Transfer-Encoding: binary'); 
		header('Expires: 0'); 
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
		header('Pragma: public'); 
		header('Content-Length: '.$file_size); 
		ob_clean(); 
		flush(); 
		readfile($file_path); 
		return true; 
	}
	
	public function addtoshop()
	{
		echo 'test moudle redirct';
	}
}
