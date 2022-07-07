    
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

<title>Login</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style-rtl.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/waves/waves.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/toastr/toastr.min.css">

</head>

<body >

<div id="single-wrapper">
<form action="admin/login" id="login-form" class="frm-single">
<div class="inside">

<div class="title">
	<img src="<?php echo base_url();?>assets/user_assets/img/enjaz_logo.png" alt="">
</div>
<!-- /.title -->
<div class="frm-title">Login</div>
<!-- /.frm-title -->
<div class="frm-input"><input type="text" name="username" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
<!-- /.frm-input -->
<div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>

<!-- /.clearfix -->
<button type="submit"  class="frm-submit save">Login<i class="fa fa-arrow-circle-right"></i></button>


<!-- /.row -->
<a href="#" class="a-link"><i class="fa fa-key"></i>Enjaz</a>
<div class="frm-footer">Enjaz © 2020</div>
<!-- /.footer -->
</div>
<!-- .inside -->
</form>
<!-- /.frm-single -->
</div><!--/#single-wrapper -->

 
<!-- 
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/scripts/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/modernizr.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?php echo base_url();?>assets/plugin/waves/waves.min.js"></script>

<script src="<?php echo base_url();?>assets/scripts/main.min.js"></script>
 

<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>assets/vendor/libs/popper/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script> 



<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = true;
	toastr.options.progressBar = true;
	toastr.options.timeOut = 3000;
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "toast-top-center";
	var site_url = '<?php echo site_url(); ?>';
});
</script>


<script type="text/javascript">

	$(document).ready(function()
	{
		$("#login-form").submit(function(e)
		{
			$('.save').prop('disabled', true);

		 	e.preventDefault();
			
			var obj = $(this), action = obj.attr('name');
	
			$.ajax(
			{
				type: "POST",
				url: e.target.action,
				data: obj.serialize(),
				cache: false,
			
				success: function (JSON) 
				{

					if (JSON.error != '')
					 {
						//toastr.error(JSON.error);
					 	$('.save').prop('disabled', false);
					 } 
					else
					 {
						//toastr.success(JSON.result);
						$('.save').prop('disabled', false);
						window.location.href="<?php echo base_url();?>admin/users";	 
					 }
				}
			});
		});
	});

</script>

</body>
</html>