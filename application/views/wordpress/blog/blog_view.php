<!DOCTYPE html>
<html>
　　<head>
　　<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.1.min.js"></script>
　　<script type="text/javascript">
		$(document).ready(function(){
			$("h1").click(function(){
				showdlg();
			});

		    function showdlg()
		    {
		    	alert($("h1").text());
		    }
			
		});

		function submitcheck(){
			var bdtxt = $("#bodytxt").val();
			var autxt = $('#authortxt').val();
			if(bdtxt == ''|| autxt == '')
			{
				alert('content is null,please input content');
				return false;
			}
			return true;
		}
			

	</script>
　　<meta charset="utf-8">
　　　　<title>
　　　　　　	<?= $title; ?>
　　　　</title>
　　</head>
　　<body>
　　	<h1><?= $heading ?></h1>
	<?php foreach ($query->result() as $row):?>
		<p><?= $row->title?></p>
		<p><?= $row->body?></p>
		<p><?= $row->author?>   <span style="font-size:50%;"><?= date('Y-m-d H:i:s',$row->update) ?></span></p>
		<p><?= anchor('blog/comments/'.$row->id,'Comment');?></p>
		<hr>
	<?php endforeach;?>
	
	<form action="<?php echo site_url("blog/topicinsert") ; ?>"  onsubmit="return submitcheck()" method="post">
		<p><input type="text" id="titletxt" name="title"/></p>
		<p><textarea id="bodytxt" name="body" rows="10"></textarea></p>
		<p><input type="text" id="authortxt" name="author"/></p>
		<p><input type="submit" id="btnSubmit" value="Submit topic"/></p>
	</form>
　　</body>
</html>