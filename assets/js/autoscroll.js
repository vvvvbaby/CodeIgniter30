//$(document).ready(function(){
	$(function(){
	  var g_isAjax = false;
	  $(window).scroll(function(){  
             var vtop=$(document).scrollTop();
             if (vtop + $(window).height() >= $(document).height() - 200)
             {
				 loadmsg();
             }
             
	  });
	
	function loadmsg(){
		if(g_isAjax)
			return false;
		g_isAjax = true;
		$.ajax({
			datatype: 'html',
			type: 'POST',
			url: 'http://localhost/CodeIgniter30/index.php/welcome/ajaxtest',
			success: function(data){
				$('#bottomline').before(data);
				g_isAjax = false;
			}
		});
	}

	});
//});


