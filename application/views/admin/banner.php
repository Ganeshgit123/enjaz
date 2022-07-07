<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('username');?>





<?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/update_banimg', $attributes, $hidden);?>

<div class="form-body">

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4>Banners</h4></div>
<div class='col-md-6'></div>

</div>

<div class="card-content">


<div class="row"> 



<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Banner For</label> 
<select class="form-control"  name="about" id="about" onchange="myFunction()">
     <option value="">--Select--</option>
    <option value="1">About</option>
    <option value="2">Service</option>
    <!--<option value="5">Service-Workplace</option>-->
    <option value="6">Service-Catering</option>
    <option value="7" >Commitment</option>
      <!--<option value="3" >Contact us</option>-->
     <option value="4" >Career</option>

</select>
</div>
</div>

</div>
   

<br>
<div class="row" id ="nxtrow"> 

</div>
 </div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
<?php echo form_close(); ?>

   
 </div>

<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>




<script type="text/javascript">
function myFunction() {

var id = document.getElementById("about").value;

//alert(id);

  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/edit_ban',
data:{id:id},
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
window.location.href="<?php echo base_url();?>admin/banner";
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
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#u_file').removeAttr('src')
jQuery('#u_file').show();



reader.onload = function (e) {
$('#u_file').attr('src', e.target.result);
$('#u_file').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>


</body>
</html>