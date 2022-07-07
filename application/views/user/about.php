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
<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" sizes="16x16">
<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/aos.css">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
</head>

<body>
<div class="main-page-wrapper">

<!-- ===================================================
Loading Transition
==================================================== -->

<?php $page='about'; include'header.php'?>

<div id="loader-wrapper">
  <div id="loader"></div>
</div>

<section class="en_banner_about">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="en_who">
 <h2><?php echo $bandet->description ?></h2>
<p><?php echo $bandet->description1 ?></p>
</div> 
</div>
</div>
</div>
<img src="<?php echo base_url().'assets/images/'.$bandet->image;?>">

<!-- <h1 class="text-center en_who"><?php echo $bandet->description ?></h1> -->

</section>

<!-- <section class="en_banner_about">
<div class ="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="en_banhead">
	<h1 class="text-center en_who ">WHO WE ARE</h1>
</div>
</div>
</div>
</div>
</section> -->

<?php foreach ($aboutdet as $value) {
	# code...
 ?>
<section class="en_about_head">
<div class="container"> 
<div class="row">
<div class="col-md-12">
<h1 class="text-center en_about" style="font-size:30px;">Vision, Mission & Core Values</h1>
<p class="text-center"><img src="<?php echo base_url()?>assets/images/line.svg" width="30%"></p>
<!-- <p class="en_abt text-center"><?php echo $value['banner_desc'] ?></p> -->
</div> </div>
</div>
</section>

<section id="vision"></section>

<section class="en_padd">
<div class="container">
<div class="row">
<div class="col-md-6 en_qhse">
<!--<img src="<?php echo base_url();?>assets/images/challenges.png" class="en_mission_img" data-aos="zoom-in-left"> -->
<img src="<?php echo base_url().'assets/images/'.$value['about3_img'];?>" class="en_mission_img" data-aos="zoom-in-left">
</div>
<div class="col-md-6 en_top_cha">
<h1 class="smallh">VISION</h1>

<div class="en_mission">
<ul class="en_core">
<div class=en_corespc>
<?php echo $value['about3_desc'] ?>
</div>
</ul> 
	
</div></div>

</div> </div>
</section>

<section id="mission"></section>

<section class="en_pad">
<div class="container">
<div class="row">
<div class="col-md-6" data-aos="zoom-in-left">
<!--<img src="<?php echo base_url();?>assets/images/mission.png" class="en_mission_img">-->

<img src="<?php echo base_url().'assets/images/'.$value['about1_img'];?>" class="en_mission_img">
</div>
<div class="col-md-6 en_top">
<h1 class="smallh">MISSION</h1>

<p class="commonpara"><?php echo $value['about1_desc'] ?> 
</p>
</div>

</div> </div>
</section>

<section id="core_value"></section>

<section class="en_pad">
<div class="container">
<div class="row">
<div class="col-md-6">
<!--<img src="<?php echo base_url();?>assets/images/core.png" class="en_core_img" data-aos="zoom-in-right" style="position:relative;top:70px;">-->
<img src="<?php echo base_url().'assets/images/'.$value['about2_img'];?>" class="en_mission_img" data-aos="zoom-in-right" style="position:relative;top:20px;">
</div>
<div class="col-md-6 en_qhsespa en_top">
<h1 class="smallh">CORE VALUES </h1>

<div class="en_mission">
<!-- <ul class="commonpara"> -->

<?php echo $value['about2_desc'] ?>

<!-- </ul> -->
<div class="row">
<div class="col-md-6">
<ul class="core_ul">
<li><strong>I</strong>ntegrity</li>
<li><strong>H</strong>onesty</li>
<li><strong>T</strong>rust</li>
<li><strong>A</strong>ccountability</li>
</div>
<div class="col-md-6">
<ul class="core_ul">
<li><strong>S</strong>olidarity</li>
<li><strong>I</strong>nnovation</li>
<li><strong>C</strong>ommitment</li>
<li><strong>C</strong>onstant <strong>I</strong>mprovement</li>
</div>
</div>

</div>	
</div>

</div> </div>
</section>

<?php } ?>

<?php $this->load->view('user/footer');?>

<!-- Scroll Top Button -->
<button class="scroll-top tran3s">
<i class="fa fa-angle-up" aria-hidden="true"></i>
</button>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- jQuery -->
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

</div> <!-- /.main-page-wrapper -->
</body>
</html>