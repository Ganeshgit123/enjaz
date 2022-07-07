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

 <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="main-page-wrapper">

<?php $page='contact'; include'header.php'?>

<div id="loader-wrapper">
  <div id="loader"></div>
  </div>


<!-- <section class="en_banner_about">
<img src="<?php echo base_url().'assets/images/'.$bandet->image;?>">
<div class ="container-fluid">
<div class="row">
<div class="col-md-12">
<h1 class="text-center en_who"><?php echo $bandet->description ?></h1>
</div>
</div>
</div>
</section>  -->


<section class="en_contact_tit">
<div class="container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="en_get">
<h3 class="text-center">Get in Touch with our expert team and we will answer all your questions.<br>
</h3> 
</div></div>
<div class="col-md-1">
<p class="en_contact_content"></p>
</div>
</div>
</div>
</section>


<section class="en_contact">
<form action="<?php echo base_url(); ?>user/add_contact" id="form1" method="POST">
<input type="hidden" name="page" value="contact" />
<div class="container">
<div class="row">
<div class="col-md-5">
<div class="form-group">
<input type="text" class="form-control" id="email" placeholder="Name" name="name"required>
</div>

<div class="form-group">
<input type="text" class="form-control" id="pwd" placeholder="Email" name="email"required>
</div>

<div class="form-group">
<input type="text" class="form-control" id="pwd" placeholder="Phone" name="phone"required>
</div>

<div class="g-recaptcha" data-theme="light" data-sitekey="6Lc1XyEaAAAAACasRhlwYKwod18EP1FPvcmL96t3" required></div>
<br>
</div>
<div class="col-md-1"></div>
<div class="col-md-6">
<div class="form-group">
<textarea class="form-control en_border" placeholder="Message" name="message" id="number" rows="6"></textarea>
</div>
</div>
</div> 
</div>



<div class="container">
<div class="row">
<div class="col-md-6">
<input type="submit" class="btn btn-default en_btnspc"/>
</div>	
</div>	
</div>





</form>
</section>



<section class="map_section">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3574.5874844634855!2d50.12169301503352!3d26.3722012833633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49e57b2ba64ecf%3A0x6eb43f935684e514!2sAl%20Enjaz%20Al%20Mumtaz%20Company%20Ltd.!5e0!3m2!1sen!2sin!4v1611810019027!5m2!1sen!2sin" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="en_cont_map"></iframe>
</div>
</div>
</div>
</section>


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
</div>




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
            window.location.href="<?php echo base_url();?>user/contact";   
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
