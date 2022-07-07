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

<?php $page='qhse'; include'header.php'?>

<div id="loader-wrapper">
  <div id="loader"></div>
  </div>

<section class="en_banner_about">
<div class="container">
<div class="row">
<div class="col-md-5">
<div class="en_fac">
 <h2><?php echo $bandet->description ?></h2>
<p><?php echo $bandet->description1 ?></p>
</div> 
</div>
<div class="col-md-7"></div>
</div>
</div>
<img src="<?php echo base_url().'assets/images/'.$bandet->image;?>">
</section>


<?php foreach($qhsedet as $value) { 

		?>
<section class="en_qhsepad">
<div class="container">
<div class="row">
<div class= "col-md-12">
<h1 class="text-center" style="font-size:30px;color:#033059!important;font-weight:900"> Quality, Safety, Health, and Environment Commitment </h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="30%"></p>
<br>
<p class="commonpara"><?php echo $value['description1'] ?></p>
</div>

</div>
</div>
</section>


<section class="en_qhsepad1">
<div class="container">
<h1 class="smallh" style="font-size:20px">We are committed to:</h1>
<div class="en_mission">

	<?php echo $value['description2'] ?>

</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<p class="text-center"><img src="<?php echo base_url().'assets/images/'.$value['image'];?>" alt="" class="en_qhse_img" width="980px" height="250px"></p>
</div>
</div>
</section>
<?php } ?>
</div>

<!-- Footer Section -->
<?php $this->load->view('user/footer');?>
<!-- Footer Section -->
 <button class="scroll-top tran3s">
<i class="fa fa-angle-up" aria-hidden="true"></i>
</button>

 <!-- Jquery Library -->
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

</body>
</html>
