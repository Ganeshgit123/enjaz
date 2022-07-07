<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('username');?>

 <!-- TinyMCE -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <!-- Must include this script FIRST -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4>Integrated Management Services</h4></div>
<div class='col-md-6'></div>

</div>

<div class="card-content">
<?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/update_ifm', $attributes, $hidden);?>
<div class="form-body">

<?php foreach ($res as $value) { ?>
    <div class="row"> 
      <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
<div class="form-group">
<div class="col-md-6">
<label for="xin_employee_password">Title</label> 
 <input type="text" class="form-control" name="title" value="<?php echo $value['title']?>" ></div>
 <div class="col-md-6">
  <label for="xin_employee_password">Description</label> 
<textarea  class="form-control" name="description"><?php echo $value['description'] ?></textarea>
</div>
</div>

</div>
<?php } ?>
<br><br>

<div class="row"> 

<div class="col-md-6">
  
    <button type="submit" class="btn btn-primary "><i class="fa fa fa-check-square-o"></i>Save </button>
  </div>

<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Categories</label> 
<select class=" form-control"  name="about" id="category" onchange="myFunction()">
     <option value="">--Select--</option>
    <option value="1">SOFT SERVICES</option>
    <option value="2">HARD SERVICES</option>
     <!--<option value="3" >MINOR WORKS AND PROJECTS</option>-->

</select>
</div>
</div>

</div>
 <!--   <input type="hidden" class="form-control-file" id="habout1_img" name="habout1_img" value="<?php echo $about1_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout1_desc"><?php echo $about1_desc ?></textarea>


   <input type="hidden" class="form-control-file" id="habout2_img" name="habout2_img" value="<?php echo $about2_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout2_desc"><?php echo $about2_desc ?></textarea>

    <input type="hidden" class="form-control-file" id="habout1_img" name="habout3_img" value="<?php echo $about3_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout3_desc"><?php echo $about3_desc ?></textarea> -->

<br>
<div class="row" id ="nxtrow"> 

</div>
 
   
</div>

<?php echo form_close(); ?> </div>

<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>
 
<script type="text/javascript">
/* Add data */ /*Form Submit*/

$(document).ready(function(){


/* Add data */ /*Form Submit*/
$("#xin-form").submit(function(e){
var fd = new FormData(this);
var obj = $(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
$('.save').prop('disabled', true);

$.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
$('.save').prop('disabled', false);
} else {
toastr.success(JSON.result);
$('.save').prop('disabled', false);
//window.location.href="<?php echo base_url();?>admin/about";
}
},
error: function() 
{
toastr.error(JSON.error);

$('.save').prop('disabled', false);
}           
});
});

});
 

 
</script>


<script type="text/javascript">
function myFunction() {

var category = document.getElementById("category").value;


  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/list_softservc',
data:{category:category},
beforeSend: function () {
jQuery('.loading').show();
},
success: function (html) {
 // alert(html);
jQuery('#nxtrow').html(html);
jQuery('.loading').fadeOut("slow");
}
});


}

</script>


</body>
</html>