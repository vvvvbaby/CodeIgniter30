<?php
class Common_db extends CI_Model {

	var $title   = '';
	var $content = '';
	var $date    = '';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_last_ten_entries()
	{
		$query = $this->db->get('entries', 10);
		return $query->result();
	}

	function insert_entry()
	{
		$this->title   = $_POST['title']; // 请阅读下方的备注
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->insert('entries', $this);
	}

	function update_entry()
	{
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
	
	function insert_pic($data)
	{
		$title = $data['file_name'];
		$desc = '';		
		/*
		foreach ($data as $item=>$value)
		{
			$desc.=$item.'>'.$value;
		}
		*/
		$desc = json_encode($data);
		$path = $data['file_path'];
		$sql = "insert into 57sy_pics(title,descp,pic_path) values('$title','$desc','$path')";
		return $this->db->query($sql);
	}
	
	//插入注册的用户
	function register_user($email,$password,$first_name,$last_name,$tel_no,$lang,$pay_code)
	{
		/*
		$sql = "insert into 57sy_common_user(username,
			 passwd,
             status,
             regdate,
             expire,
             first_name,
             last_name,
             tel_no,
             lang_country,
             pay_code) 
			 values
			 ('$email',
			 '$password',
			 1,
			 1,
			 0,
			 '$first_name',
			 '$last_name',
			 '$tel_no',
			 '$lang',
			 '$pay_code' 
			 )";
		return $this->db->query($sql);
		*/
		$data = ['username' => $email,'passwd' => $password,'status' => 1, 'regdate' => time(), 'expire' => 0, 'first_name' => $first_name,
		'last_name' => $last_name, 'tel_no' => $tel_no, 'lang_country' => $lang, 'pay_code' => $pay_code];
		$res = $this->db->insert('57sy_common_user',$data);
		if($res)
		{
			return mysql_insert_id();
		}
		else 
		{
			return false;
		}
	}
	
	function get_user($name,$ps)
	{
		$query=$this->db->get_where('57sy_common_user',array('username'=>$name,'passwd'=>md5($ps)));
		//$query = $this->db->get('57sy_common_user');
		//$query = $this->db->query('SELECT username, passwd FROM 57sy_common_user');
		
		return count($query->result());
	}
	
	function isexist_user($name)
	{
		$query = $this->db->get_where('57sy_common_user',array('username'=>$name));
		return $query;
	}
	
	function reset_password($email,$pw)
	{
		$data = ['passwd' => md5($pw)];
		$this->db->update("57sy_common_user",$data,['username' => $email]);
		return $this->db->affected_rows();
	}
	
	function get_pages($offset,$num,$order='id desc')
	{
		$table   = "57sy_common_admin_nav";
		
		$str_sql  = "select * from {$table} where 1=1  order by {$order} limit {$offset},{$num}";
		
		//if($condition)
		//{
		//$str_sql = "select * from {$table} where 1=1 and username like '%" . $condition . "%' order by {$order} limit {$offset},{$num}";
		//}
		return array(
				'total' => $this->db->count_all($table),
				'res' => $this->db->query($str_sql)//->result_array()
		);
	}
	
	function modifyAllpsbymd5()
	{
		$sql = "update 57sy_common_user set passwd = md5('123456')";
		$query = $this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	function get_blog()
	{
		/*
		$sql = "select * from entries";
		return $this->db->query($sql);
		*/
		$this->db->order_by('update','desc');
		return $this->db->get('entries');
	}
	
	function get_comments($titleid,$limit,$offset)
	{
		$this->db->select('body ,author ,update, filename, pic');
		$this->db->where('entry_id',$titleid);
		$this->db->order_by('update','desc');
		return $this->db->get('comments',$limit,$offset);
	}
	
	//获取总数量
	function get_comments_count($titleid)
	{
		$this->db->where('entry_id',$titleid);
		$this->db->from('comments');
		return $this->db->count_all_results();
	}
	
	function comments_insert($poststr)
	{
		$this->db->insert('comments',$poststr);
	}
	
	function topic_insert($poststr)
	{
		return $this->db->insert('entries',$poststr);
	}

}