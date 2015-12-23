<!DOCTYPE html>
<html>
　　<head>
	<meta charset="utf-8">
　　<title>
　　	Option Form
　　</title>
　　<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap3.3.6/css/bootstrap.min.css">
　　<script src="<?php echo base_url() ?>assets/bootstrap3.3.6/js/bootstrap.min.js"></script>
　　</head>
　　<body>
	　　<form action="<?php echo site_url("welcome/indexpage")?>" method="POST">
	　	<label class="checkbox-inline"><input name="option[]" type="checkbox" value="typography" />typography</label> 
		<label class="checkbox-inline"><input name="option[]" type="checkbox" value="gallery" />gallery</label> 
		<label class="checkbox-inline"><input name="option[]" type="checkbox" value="calendar" />calendar</label> 
		<br/>
		<label class="checkbox-inline"><input type="radio" name="optionsRadiosinline" id="optionsRadios3"  value="option1" checked>选项 1</label>
        <label class="checkbox-inline"><input type="radio" name="optionsRadiosinline" id="optionsRadios4"  value="option2">选项 2</label>
	    <div class="form-group" style="margin-left: 10px">
	      <label for="name">选择列表</label>
	      <select class="form-control" style="width: 80px">
	         <option value='a'>1</option>
	         <option value='b'>2</option>
	         <option value='c'>3</option>
	         <option>4</option>
	         <option>5</option>
	      </select>
	
	      <label for="name">可多选的选择列表</label>
	      <select name="selecttest[]" multiple class="form-control" style="width: 80px">
	         <option value='d'>1</option>
	         <option value='e'>2</option>
	         <option>3</option>
	         <option>4</option>
	         <option>5</option>
	      </select>
	    </div>
        <button class="btn btn-default" type="submit">enter index</button>
	　　</form>
　　</body>
</html>