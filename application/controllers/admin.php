<?php 
/*
 *后台首页文件
 *author 王建 
 */
if (! defined('BASEPATH')) {
    exit('Access Denied');
}
class Admin extends CI_Controller {
	private $navList = array() ;
	public $isJudgeUrl = false ; //是否判断权限url
	public $table_ = 'ylfy_' ; //表的前缀
	public $visitor = array() ; //用户的基本信息
	public $site_config = array()  ; //站点基本信息
	public $_cookie_data = array() ;
	public $_url_data = array() ;
	public $cur_url = '' ; //当前访问的url 格式 news/index
	
	private $per_page  = '5';
	private $prev_link  = '上一页';
	private $next_link  = '下一页';
	private $tabledata1 = '123';
	
	function __construct(){
		parent::__construct();	
		$this->init();
				
	}
	
	private function init(){
		$this->config->load('myconfig',TRUE);
		$this->load->helper("cookie");
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->model('Common_db');
		//$this->_cookie_data = $this->input->get_post("cookie", true ); //获取cookie数据
	}
	//后台框架首页
	function index(){
		$data['username'] = get_cookie('username');
		$data['config'] = config_item('csrf_cookie_name');
		$data['sessiontest'] = $this->session->userdata('somedata');
		$data['session_id'] = $this->session->userdata('session_id');
		$data['ip_address'] = @session_id();
		$data['myconfig'] = $this->config->item('test', 'myconfig');
		$this->showtable();
		$data['page'] = $this->pagination->create_links();
		
		$data['tableform'] = $this->table->generate($this->tabledata1);
		
		$this->load->view('welcome_message.php',$data);
	}
	
	//分页显示
	function showtable()
	{
		$config       = array();
		$config['per_page']    = $this->per_page;         //每页显示的数据数
		$current_page          = intval($this->input->get_post('per_page',true));  //获取当前分页页码数
		
		if(0 == $current_page)
		{
			$current_page = 1;
		}
		
		$offset   = ($current_page - 1 ) * $config['per_page'];          //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
		$table_datas  = $this->Common_db->get_pages($offset,$config['per_page'],$order='id asc');
		//$config['base_url']           = 'http://'.$this->config->item('base_url').'buy/show?';
		$config['base_url'] = site_url("admin/index").'?';
		$config['prev_link']          = $this->prev_link;
		$config['next_link']          = $this->next_link;
		$config['total_rows']         = $table_datas['total'];         //获取查询数据的总记录数
		$config['use_page_numbers']   = TRUE;            //默认分页URL中是显示每页记录数,启用use_page_numbers后显示的是当前页码
		$config['page_query_string']  = TRUE;            //把 $config['enable_query_strings'] 设置为 TRUE，链接将自动地被用查询字符串（url中的参数）重写。
		$this->pagination->initialize($config);
		
		//table返回信息
		$this->tabledata1 = $table_datas['res'];
		
		$data['total'] = $table_datas['total'];
		$data['current_page'] = $current_page;
		$data['per_page'] = $config['per_page'];
		//$data['page'] = $this->pagination->create_links();
		 
		/*
		 $data = array(
		 		'buy_info'  => $table_datas['res'],
		 		'total'   => $table_datas['total'],
		 		'current_page' => $current_page,
		 		'per_page'  => $config['per_page'],
		 		'page'   => $this->pagination->create_links(),
		 );
		$this->load->view("show_buy_view", $data);
		*/
	}
	
	function top(){
		/*
		$data  = array(
			'nav'=>$this->M_nav->queryTopNav($this->isJudgeUrl) ,		
		) ;
		$this->load->view(__TEMPLET_FOLDER__."/views_top" , $data );
		*/
	}
	function left(){
		/*  echo "<pre>";
		print_r($this->_url_data); 
		$data  = array(
				'nav'=>$this->navList ,
		) ;
		$this->load->view(__TEMPLET_FOLDER__."/views_left"  , $data);
		 */
	}
	function main(){
		/*
		$info = $this->M_main->query_admin_log();
		$data = array(
				'group_name'=>group_name(),
				'info'=>$info
		);
		$this->load->view(__TEMPLET_FOLDER__."/views_main" , $data);
		*/
	}
	
	//重新修改密码
	function modifyAllpsbymd5()
	{
		$num = $this->Common_db->modifyAllpsbymd5();
		$pagestr = $this->input->post(NULL,TRUE);
		if($num >0)
		{
			echo "$num".'rows changed';
		}
		else 
		{
			echo 'update fail';
		}
		echo json_encode($pagestr);
	}
	
}
