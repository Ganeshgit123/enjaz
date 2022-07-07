<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- For Resposive
Device --> <meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">

<title>Enjaz</title>
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" sizes="16x16">
<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<div class="main-page-wrapper">

<!-- ===================================================
Loading Transition
==================================================== -->

  
<?php $page='home'; include'header.php'?>

<div id="loader-wrapper">
  <div id="loader"></div>
  </div>
<div id="theme-main-banner" class="banner-one">
<?php 
foreach ($banner as  $value) { ?>
	<div data-src="<?php echo base_url().'upload/images/'.$value['banner_img'];?>">
<div class="camera_caption">
<div class="container">
<!-- <h4 class="wow fadeInUp animated" data-wow-delay="0.2s"><?php echo $value['banner_desc'] ?></h4> -->
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
 <h2 style="color:#000 ! important;"><?php echo $value['banner_desc'] ?></h2>
<p><?php echo $value['banner_desc1'] ?></p> 
</div>
<div class="col-md-4"></div>
</div>
</div>
</div>
</div>

<?php  }

?>


</div>

<?php foreach($homepg as $value) { ?>
<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<br><br>
<h1 class="text-center text-heading" style="font-size:30px;color:#033059!important;font-weight:900">Enjaz Catering & Facility Management Services</h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="40%"></p>
</div>
</div>
<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-9">
<p class="commonpara"><?php echo $value['description']?></p>
</div>
</div>
</div>
</section>

<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<br><br>
<h1 class="text-center text-heading" style="font-size:30px;color:#033059!important;font-weight:900">Our Services</h1>
<p class="text-center"><img src="<?php echo base_url();?>assets/images/line.svg" width="20%"></p>
</div>
</div>
<br>
<div class="container">
<div class="row">
<div class="col-md-6">
<a href="<?php echo base_url(); ?>catering">
<div class="cat_img_sec">
<img src="<?php echo base_url().'assets/images/'.$value['servc_img1'];?>">
<h4 class="smallh text-center"><?php echo $value['servc_desc1']?></h4>
</div>
</a>
</div>
<div class="col-md-6">
<a href="<?php echo base_url(); ?>services">
<div class="cat_img_sec">
<img src="<?php echo base_url().'assets/images/'.$value['servc_img2'];?>">
<h4 class="smallh text-center"><?php echo $value['servc_desc2']?></h4>
</div>
</a>
</div>
</div>
</div>
</div>
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
</div> <!-- /.main-page-wrapper -->


 <script type="text/javascript">
    $("#form1").submit(function(e)
    {   
      e.preventDefault();
      var obj = $(this);
      var fd = new FormData(this);
      // alert(fd);
      $.ajax(
      {
        type: "POST",
        url: obj.attr('action'),
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function (JSON) 
        {
          if (JSON.error != '')
           {
            toastr.error(JSON.error);
            $('.save').prop('disabled', false);
           } 
          else
           {
            toastr.success(JSON.result);
            $('.save').prop('disabled', false);
            window.location.href="<?php echo base_url();?>user";   
           }
        }
      });
    });
  

</script>

<script  src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script>

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
<script>
document.getElementById("form1").addEventListener("submit",function(evt)
  {
  
  var response = grecaptcha.getResponse();
  if(response.length == 0) 
  { 
    //reCaptcha not verified
    alert("please verify you are human!"); 
    evt.preventDefault();
    return false;
  }
  //captcha verified
  //do the rest of your validations here
  
});
</script>
</body>
</html>