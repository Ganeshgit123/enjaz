<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- For Resposive Device -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Enjaz</title>
<!-- Favicon -->
<link rel="icon" href="images/favicon.ico" sizes="16x16">
<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/aos.css">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
</head>

<body>
<div class="main-page-wrapper">
<?php $page='services'; include'header.php'?>
<div id="loader-wrapper">
  <div id="loader"></div>
  </div>


<section class="en_banner_service">
  <img src="<?php echo base_url().'assets/images/'.$bandet->image;?>">
<div class ="container-fluid">
<div class="row">
<div class="col-md-12">

<h1 class="text-center en_who"><?php echo $bandet->description ?></h1>

</div>
</div>
</div>
</section>

<?php 
foreach ($servicedet as  $value) { ?>
<section id="en_serpad">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="en_wrk">	
<h1>WORKPLACE SOLUTIONS</h1>
<hr class="en_line">
<p class="en_workplace en_qhse"><?php echo $value['ser_desc'] ?> </p>
</div>
</div>
<div class="col-md-6 en_qhsespa">
<img src="<?php echo base_url().'assets/images/'.$value['ser_img'];?>" class="en_service_img">
</div> 
</div>
</div>
</section>
<?php } ?>
<!-- Footer Section -->
<?php $this->load->view('user/footer');?>
<!-- Footer Section -->

<button class="scroll-top tran3s">
<i class="fa fa-angle-up" aria-hidden="true"></i>
</button>

<script src="<?php echo base_url();?>assets/vendor/jquery.2.2.3.min.js"></script>
<!-- Popper js -->
<script src="<?php echo base_url();?>assets/vendor/popper.js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Camera Slider -->
<script src='<?php echo base_url();?>assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
<script src='<?php echo base_url();?>assets/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
<script src='<?php echo base_url();?>assets/vendor/Camera-master/scripts/camera.min.js'></script>
<!-- menu  -->
<script src="<?php echo base_url();?>assets/vendor/menu/src/js/jquery.slimmenu.js"></script>
<!-- WOW js -->
<script src="<?php echo base_url();?>assets/vendor/WOW-master/dist/wow.min.js"></script>
<!-- owl.carousel -->
<script src="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
<!-- js count to -->
<script src="<?php echo base_url();?>assets/vendor/jquery.appear.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery.countTo.js"></script>
<!-- Fancybox -->
<script src="<?php echo base_url();?>assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

<!-- Theme js -->
<script src="<?php echo base_url();?>assets/js/theme.js"></script>
<script src="<?php echo base_url();?>assets/js/slide.js"></script>
<script src="<?php echo base_url();?>assets/js/aos.js"></script>

<script type="text/javascript">
AOS.init();
</script>

</body></div>
</html>
