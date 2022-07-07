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

<?php $page='services'; include'header.php'?>


<div id="loader-wrapper">
  <div id="loader"></div>
  </div>

<section class="en_banner_about">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="en_fac">
 <h2><?php echo $bandet->description ?></h2>
<p><?php echo $bandet->description1 ?></p>
</div> 
</div>
<div class="col-md-8"></div>
</div>
</div>
<img src="<?php echo base_url().'assets/images/'.$bandet->image;?>">
</section>

<section id="integrate"></section>

<section>
<div class="container">
<div class="row">
<div class="col-md-12">

<?php  $service = $this->db->get('facility_management')->row(); ?>


<h1 class="text-center text-heading" style="font-size:30px;color:#033059!important;font-weight:900">Facility Management Services</h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="32%"></p>
</div>
</div>
<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-9">
<p class="commonpara"><?php echo "$service->description;"?></p>

</div>
</div>
</section>


<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<br><br>
<h1 class="text-center text-heading" style="font-size:30px;color:#033059!important;font-weight:900">Soft Services</h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="20%"></p>
</div>
</div>
<br>
<div class="container">
<div class="row">
<br>
<?php foreach($softdet as $value) { 

		?>
<div class="col-md-4">
<div class="cat_img_sec">
<img src="<?php echo base_url().'assets/images/icons/'.$value['ser_img'];?>">
<h4 class="smallh text-center"><?php echo $value['ser_desc'] ?></h4>
</div>
</div>
<?php } ?>
</div>
</div>
<br>

</div>
</section>
<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="text-center text-heading" style="font-size:30px;color:#033059!important;font-weight:900">Hard Services</h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="20%"></p>
</div>
</div>
<br>
<div class="container">
<div class="row">
<br>
<?php foreach($harddet as $value) { 

		?>
<div class="col-md-4">
<div class="cat_img_sec">
<img src="<?php echo base_url().'assets/images/icons/'.$value['ser_img'];?>">
<h4 class="smallh text-center"><?php echo $value['ser_desc'] ?></h4>
</div>
</div>
<?php } ?>
</div>
</div>
<br>
</section>



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

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("en_ser_space");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>


</body></div>
</html>
