<?php 
$name = $this->session->userdata('username');
if(!isset($name))
{
	echo "<SCRIPT language=JavaScript>alert('您尚未登录')</SCRIPT>";
	//echo "<SCRIPT language=JavaScript>alert(document.cookie)</SCRIPT>";
	echo ("<SCRIPT language=JavaScript>window.location.href='index'</SCRIPT>");
	//redirect('welcome/index');
	//设置session 用于登录返回用
	$this->session->set_userdata('back_url','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit();
}
?>