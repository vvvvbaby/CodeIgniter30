<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("PRC");

class Welcome extends CI_Controller {

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
	
	private $options = [];
	
	function __construct() 
	{
        parent::__construct();
        $this->load->model('Common_db');
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->library('encryption');
    }
	
   
    
    public function testres($res)
    {
    	var_dump($res);
    	echo "<br>";
    	foreach ($res->result() as $row)
    	{
    		echo $row->username."   ";
    		echo $row->passwd;
    		echo "<br>";
    	}
    	foreach ($res->result_array() as $row)
    	{
    		echo $row['username']."    ";
    		echo $row['passwd'];
    		echo "<br>";
    	}
    	$row = $res->row();
    	echo $row->username;
    	 
    }
    
	public function index()
	{
		
		$this->load->view('uber.php');
	}
	
	public function register()
	{
		$this->load->view('uberregister.php');
	}
	
	public function forgotpassword()
	{
		$this->load->view('uberforgotpw.php');
	}
	
	//忘记密码提交页面
	public function sendpwmail()
	{
		if (!isset($_POST)) 
		{
			echo "<script>alert('页面提交异常') ; history.go(-1);</script>";
			exit();
		}
		$email = $_POST['email'];
		//$querystr = 'email='.$email.'&time='.(String)time();
		$querystr = ['email'=>$email,'time'=>(String)time()];
		$querystr = json_encode($querystr);
		echo "src: <br/>".$querystr;
		$querystr = urlencode($this->encryption->encrypt($querystr));
		echo "<br/>encode: <br/>".$querystr;
		$linkurl = site_url('welcome/resetpassword').'?param1='.$querystr;
		//发送修改密码连接，安全验证，回车用/r/n不起作用，这届要用物理回车，如下
		mail($email, 'Reset your password from zsl website', 'Reset your password,clink the link below
				'.$linkurl.'
				 exprie in 7 days','From: zsl');
		echo "<br/>send mail successfully";
	}
	
	//重置密码连接，验证时间有效性和邮箱名
	public function resetpassword()
	{
		if (!isset($_GET)) 
		{
			echo "网页异常";
			exit();
		}
		$querystr = $_GET['param1'];
		if (!isset($querystr)) 
		{
			echo "参数异常";
			exit();;
		}
		//echo "encode: <br/>".$querystr;
		
		//用GET函数取得的querystring，是解码过的， 不再需要urldecode
		//$querystr = urldecode($querystr);
		//echo "\r\ndecode: \r\n".$querystr;
		$querystr = $this->encryption->decrypt($querystr);
		//echo "<br/>decrypt: <br/>".$querystr;
		$obj = json_decode($querystr,true);
		//echo "<br/>decode<br/>";
		//print_r($obj);
		//$stime = (int)$obj['time'];
		$stime = $obj['time'];
		$startdate = $stime;
		//验证时间是否过期
		if (time()-$startdate > 60*60*24*20) 
		{
			echo "<br/>this link is expire";
		}
		else 
		{
			$this->loadrestpw();
		}
		
	}
	
	private function loadrestpw()
	{
		$this->load->view('uberresetpw.php');
	}
	
	//密码重置提交处理
	public function doresetpassword()
	{
		if (!isset($_POST)) 
		{
			echo "illegal request";
			exit();
		}
		else 
		{
			$email = $this->input->post("email");
			$pw1 = $this->input->post("newps");
			$pw2 = $this->input->post("repeatps");
			if($pw1 != $pw2)
			{
				echo "<script>alert('两次输入的密码不一致'); history.go(-1);</script>";
				exit();
			}
			//判断字符转码是否开启，不开启则进行转码，防止sql注入
			if(!get_magic_quotes_gpc())
			{
				$pw1 = addslashes($pw1);
				$pw2 = addslashes($pw2);
			}
			$ret = $this->Common_db->reset_password($email,$pw1);
			if ($ret > 0) 
			{
				redirect('welcome/loadresetpwsuccess');
				exit();
			}
			else 
			{
				echo "<script>alert('密码重置失败，提交错误'); history.go(-1);</script>";
				exit();
			}
		}
	}
	
	public function  loadresetpwsuccess()
	{
		//防止盗链
		if (isset($_SERVER['HTTP_REFERER'])) 
		{
			$lasturl = $_SERVER['HTTP_REFERER'];
			$pos = strpos($lasturl, site_url('welcome/resetpassword'));
			
			//pos可能返回0
			if ($pos !== FALSE) 
			{
				$this->load->view('uberresetpwsuccess.php');
			}
			else 
			{
				redirect('welcome/index');
			}
		}
		else 
		{
			redirect('welcome/index');
		}
	}
	
	public function err()
	{
		$data['content'] = "   echo test";
		$this->load->view('error.html',$data);
	}
	
	public function mainform()
	{
		//$data['content'] = "   login success";
		//$this->load->view(' .php',$data);
		//redirect("admin/index");
		/*
		$name = $this->session->userdata('username');
		if(!isset($name))
		{
			echo "<SCRIPT language=JavaScript>alert('您尚未登录')</SCRIPT>";
			echo "<SCRIPT language=JavaScript>alert(document.cookie)</SCRIPT>";
			echo ("<SCRIPT language=JavaScript>window.location.href='index'</SCRIPT>");
			//redirect('welcome/index');
			//设置session 用于登录返回用
			$this->session->set_userdata('back_url','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			exit();
		}
		*/
		//防盗链检查
		require_once 'logincheck.php';
		$this->load->view('wordpress/option_set');
		
	}
	
	public function indexpage()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->options['UI'] = TRUE;
			$this->options['widgets'] = FALSE;
			//$this->load->view('wordpress/index.php',$data);
			$optionarr = $this->input->post('option');
			if(!empty($optionarr))
			{
				foreach ($optionarr as $v)
				{
					$this->options[$v] = TRUE;
					//print_r($optionarr);
				}
			}
			
			//$this->load->view('wordpress/index.php',$this->options);
			//redirect('welcome/loadpage');
			//用session传递数据 选择flash	session
			
			//测试获取radio值
			$radiotest = $this->input->post('optionsRadiosinline');
			if(!empty($radiotest))
			{
				//echo "<script>alert('".$radiotest."');</script>";
				//print_r($radiotest);
			}
			
			//测试获取select值，html的select需定义为数组
			$selecttest = $this->input->post('selecttest');
			if(!empty($selecttest))
			{
				//echo "<script>alert('".$selecttest."');</script>";
				//print_r($selecttest);
			}		
			$this->session->set_flashdata($this->options);
			redirect(site_url('welcome/loadpage'));
		}		
	}
	
	public function loadpage()
	{
		$data = [];
		$data = $this->session->flashdata();
		$this->load->view('wordpress/index.php',$data);
	}
	
	public function loadtablehtml()
	{
		$this->load->view('wordpress/table.php');
	}
	
	public function uploadfile()
	{
		$data['error'] = '';
		$this->load->view('wordpress/upload_form.php',$data);
	}
	
	//博客入口
	public function blog()
	{
		//放盗链，自动跳转
		require_once 'logincheck.php';
		$data['title'] = 'blog title';
		$data['heading'] = 'blog heading';
		$data['query'] = $this->Common_db->get_blog();
		$this->load->view('wordpress/blog/blog_view.php',$data);
	}
	
	public function shop()
	{
		require_once 'logincheck.php';
		//商品id测试
		$data['productid'] = 1234;
		$this->load->view('wordpress/shop/index.php',$data);
	}
	
	public function addtoshop()
	{
		echo "add cart successfully <br/>";
		echo "product id is ".$this->uri->segment(3);
		echo "<br/>last link is <a href='".$_SERVER['HTTP_REFERER']."'>继续购物"."</a>";
		echo "<br/>";
		//保存session，如果是注册用户，且有redis进行持久化存储
		$cartlist = $this->session->userdata('shopcart');
		if(!empty($cartlist))
		{
			array_unshift($cartlist, array('type'=>'cloth','id'=>$this->uri->segment(3)));			
		}
		else 
		{
			$cartlist = array(array('producttype'=>'cloth','id'=>$this->uri->segment(3)));
		}
		print_r($cartlist[0]);
		$this->session->set_userdata('shopcart',$cartlist);
		echo "<hr>";
		echo "购物车列表如下";
		echo "<div>";
		print_r($cartlist);
		echo "</div>";
		//test array add
	}
	
	public function typography()
	{
		$data = [];
		if($this->input->post('searchtxt'))
		{
			$data['content'] = $this->input->post('searchtxt').'|'.$this->input->ip_address().'|'.$this->input->post('datetxt');
			$this->load->view('wordpress/typography.php',$data);
		}
		else 
		{
			$data['content'] = '';
			$this->load->view('wordpress/typography.php',$data);
		}
	}
	
	//link
	public function ajax()
	{
		$this->load->view('wordpress/scrollpage.php');
	}
	
	//验证码生成功能
	public function imagetest()
	{
		header("Content-type: image/jpeg");
		
		// 全数字
		$str = "1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";      //要显示的字符，可自己进行增删
		$list = explode(",", $str);
		$cmax = count($list) - 1;
		$verifyCode = '';
		for ( $i=0; $i < 5; $i++ ){
			$randnum = mt_rand(0, $cmax);
			$verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
		}
		
		$this->session->set_userdata('verifycode',$verifyCode);
		
		
		$im = imagecreate(58,28);    //生成图片
		$black = imagecolorallocate($im, 0,0,0);     //此条及以下三条为设置的颜色
		$white = imagecolorallocate($im, 255,255,255);
		$gray = imagecolorallocate($im, 200,200,200);
		$red = imagecolorallocate($im, 255, 0, 0);
		imagefill($im,0,0,$white);     //给图片填充颜色
		
		//将验证码绘入图片
		imagestring($im, 4, 10, 8, $verifyCode, $black);    //将验证码写入到图片中
		
		
		for($i=0;$i<50;$i++)  //加入干扰象素
		{
			//imagesetpixel($im, rand(0,58), rand(0,28), $black);    //加入点状干扰素
			imagesetpixel($im, rand(0,58), rand(0,28), $red);
			imagesetpixel($im, rand(0,58), rand(0,28), $gray);
			//imagearc($im, rand()p, rand()p, 20, 20, 75, 170, $black);    //加入弧线状干扰素
			//imageline($im, rand()p, rand()p, rand()p, rand()p, $red);    //加入线条状干扰素
		}
		
		imagejpeg($im);
		imagedestroy($im);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('shopcart');
		$this->session->sess_destroy();
		delete_cookie(md5('username'));
		redirect('welcome/index');
	}
	
	function checkuser()
	{
		$username = html_escape(strip_tags(trim($this->input->get("username"))));//name
		if(''==$username)
		{
			echo "<font color=red>请输入用户名</font>";
		}
		else 
		{
			$res = $this->Common_db->isexist_user($username);
			if(!empty($res))
			{
				if($res->num_rows()>0)
				{
					$row =  $res->row();
					$regdate = date("Y-m-d h:m:i",$row->regdate);					
					echo "<font color=white>用户名存在:".$username."注册时间".$regdate."</font>";
				}
				else 
				{
					echo "<font color=red>用户名不存在！</font>";
				}
			}
			else 
			{
				echo "<font color=red>查询异常！</font>";
			}
			
		}
	}
	
	public function ajaxtest()
	{
		$num = $this->session->userdata('ajaxs');
		//用于计数
		if(!isset($num))
		{
			$num = 1;
		}
		$this->session->set_userdata('ajaxs',$num+1);
		echo '<div style="height:120px;">this is a ajax test '.$num.' times </div>';
	}
	
	public function registersuccess()
	{
		$this->load->view('uberregsuccess.php');	
	}
	
	//注册submit方法
	public function doregister()
	{
		if (isset($_POST)) 
		{
			$email = html_escape(strip_tags(trim($this->input->get_post("email"))));
			$password = html_escape(strip_tags(trim($this->input->get_post("password"))));
			$firstname = html_escape(strip_tags(trim($this->input->get_post("first_name"))));
			$lastname = html_escape(strip_tags(trim($this->input->get_post("last_name"))));
			$mobilecountry = html_escape(strip_tags(trim($this->input->get_post("mobile_country"))));
			$mobile = html_escape(strip_tags(trim($this->input->get_post("mobile"))));
			$language = html_escape(strip_tags(trim($this->input->get_post("language"))));
			$alipay_account = html_escape(strip_tags(trim($this->input->get_post("alipay_account"))));
			$alipay_phone_number = html_escape(strip_tags(trim($this->input->get_post("alipay_phone_number"))));
			$promotion_code = html_escape(strip_tags(trim($this->input->get_post("promotion_code"))));
			if(empty($email) || empty($password)){
				echo "<script>alert('请输入邮箱和密码！'); history.go(-1);</script>";
				exit();
			}
			//数据存储到后台数据库
			$dbret = $this->Common_db->register_user($email,md5($password),$firstname,$lastname,$mobile,$language,$promotion_code);
			if($dbret)
			{
				redirect(site_url('welcome/registersuccess'));
			}
			else 
			{
				echo "<script>alert('提交失败，请确认输入没有非法字符！'); history.go(-1);</script>";
			}
		}
		else
		{
			echo 'no post';
		}
	}
	
	//curltest
	public function curltest()
	{
		$url = site_url("welcome/dologin");
		$cookie = dirname(__FILE__) . '/cookie_login.txt';
		$post = array (
				'username' => 'webuser',
				'passwd' => '123456'
		);
		$curl = curl_init();//初始化curl模块
		curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址
		curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
		curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
		curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);//要提交的信息
		//curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息
		
		//为什么登陆之后没有返回值呢，有肯能是因为跳转了
		$rescontent = curl_exec($curl);//执行cURL
		curl_close($curl);//关闭cURL资源，并且释放系统资源
		echo $rescontent;
		
		//用户登录认证后，登录其它页面
		$page = site_url('welcome/mainform');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $page);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
		$rs = curl_exec($ch); //执行cURL抓取页面内容
		curl_close($ch);
		echo $rs;
		
	}
	
	public function dologin(){
		$username = html_escape(strip_tags(trim($this->input->get_post("username"))));//name
		$password = html_escape(strip_tags(trim($this->input->get_post("passwd"))));//passwd
			
		/*//取消验证码
		$verifycode = html_escape(strip_tags(trim($this->input->get_post("verifycode"))));//验证码
		$sessioncode = $this->session->userdata('verifycode');
		if($verifycode != $sessioncode)
		{
			echo "<script>alert('请输入正确的验证码 ') ; history.go(-1);</script>";
			//redirect(site_url("welcome/err"));
			exit();
		}
		*/
		if(empty($username) || empty($password)){
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
			//redirect(site_url("welcome/err"));
			exit();
		}
		$res = $this->Common_db->get_user($username,$password);
		if($res)
		{
			//$this->testres($res);
			//@session_start();
			//@session_write_close();
			$newdata = array('session_id'=>'ok');
			$this->session->set_userdata($newdata);
			$this->session->set_userdata('somedata','somevalue');
			
			set_cookie(md5('username'),md5($username),7200);
			set_cookie(md5('password'),md5($password),7200);
			$this->session->set_userdata('username',$username);
			
		
			$back_url = $this->session->userdata('back_url');
			if(isset($back_url))
			{
				redirect($back_url);
				exit();
			}
			else 
			{
				//echo "<script>alert('kkkk')</script>";
				//exit();
			}
			redirect(site_url("welcome/mainform"));
			//$data['content'] = "   echo test";
			//$this->load->view('welcome_message.php',$data);
			
			exit();
		}
	
		//$this->M_user->setUserCookie($info['id']);
		/*$gid = intval($info['gid']);
			$group_name = '' ;
		$sql_role = "SELECT rolename FROM {$this->table_}common_role where id = '{$gid}' limit 1 ";
		$role_info = $this->M_common->query_one($sql_role);
	
		$group_name = ($info['super_admin'] == 1 )?'超级管理员':(isset($role_info['rolename'])?$role_info['rolename']:'');
		if($group_name == "" ){
		showmessage("此用户可能没加入到系统组里面,请联系管理员!!","login",3,0);
		die();
		}*/
	
		//登录成功
		redirect(site_url("welcome/err"));
	}
}
