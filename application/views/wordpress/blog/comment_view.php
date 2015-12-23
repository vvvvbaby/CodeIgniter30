<!DOCTYPE html>
<html>
　　<head>
　　<meta charset="utf-8">
　　　　<title>
　　　　　　	<?= $title?>
　　　　</title>
　　</head>
　　<body>
　　	<h1><?= $heading?></h1>
　　	<?php if($query->num_rows()>0):?>
　　		<?php foreach ($query->result() as $row):?>
			<p><?= $row->body?></p>
			<p><?= $row->author?>  <span style="font-size:smaller;"><?= date('Y-m-d H:i:s',$row->update) ?></span></p>
			<?php if($row->filename):?>
				<p><?= anchor('blog/filedownload/'.$row->filename,"$row->filename")?></p>
			<?php endif;?>
			<?php if($row->pic):?>
			    <img alt="<?=$row->pic?>" src="<?= 'http://localhost/CodeIgniter30/uploads/'.$row->pic ?>" width="128" height="128"/ >
			<?php endif;?>
			<hr>
		<?php endforeach;?>
　　	<?php endif;?>
	<p><?=$pagecontrol;?></p>
	<p><?= anchor('blog','Back to Blog');?></p>
	<?= form_open_multipart('blog/comment_insert');?>
	<?= form_hidden('entry_id',$this->uri->segment(3));?>
	<p><textarea name="body" rows="10"></textarea></p>
	<p><input type="text" name="author"/></p>
	<p>file: <input type="file" name="userfile" /></p>
	<p><input type="submit" id="btnSubmit" value="Submit comment"/></p>
	</form>
　　</body>
</html>