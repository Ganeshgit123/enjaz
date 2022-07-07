<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<!-- TinyMCE -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <!-- Must include this script FIRST -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>



<?php $session = $this->session->userdata('username');?>



<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4>About</h4></div>
<div class='col-md-6'></div>

</div>

<div class="card-content">

  <form class="order_form" id="xin-form" method="POST" action="<?php echo base_url();?>admin/update_about">




<!-- <?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/update_about', $attributes, $hidden);?> -->
<div class="form-body">

<input type="hidden" name="id" value="<?php echo $id ?>">

<div class="row"> 

<!-- <div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Who we are</label>
<textarea  class="form-control" placeholder="Description"  name="description"><?php echo $banner_desc ?></textarea>

</div>
</div> -->

<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">About</label> 
<select class="form-control"  name="about" id="about" onchange="myFunction()">
     <option value="">--Select--</option>
     <option value="vision" >Vision</option>
    <option value="mission">Mission</option>
    <option value="corevalues">Core Values</option>

</select>
</div>
</div>

</div>
   <input type="hidden" class="form-control-file" id="habout1_img" name="habout1_img" value="<?php echo $about1_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout1_desc"><?php echo $about1_desc ?></textarea>


   <input type="hidden" class="form-control-file" id="habout2_img" name="habout2_img" value="<?php echo $about2_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout2_desc"><?php echo $about2_desc ?></textarea>



    <input type="hidden" class="form-control-file" id="habout1_img" name="habout3_img" value="<?php echo $about3_img  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="habout3_desc"><?php echo $about3_desc ?></textarea>

<br>
<div class="row" id ="nxtrow"> 

</div>
 
   
</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
</form> </div>

<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>


<script type="text/javascript">
/* Add data */ /*Form Submit*/
// get tinymce instance of wp default editor
  
   
 

/* Add data */ /*Form Submit*/
$("#xin-form").submit(function(e){

//alert("hello");
// tinyMCE.triggerSave();

//tinyMCE.triggerSave();

//$('#tinymce').tinymce().save();


var about = document.getElementById("about").value;

if(about != 'mission' && about != ''){
 //$('#tinymce').html(tinyMCE.activeEditor.getContent());
 tinyMCE.triggerSave();
}
//alert($("#tinymce").val());

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
location.reload();
//window.location.href="<?php echo base_url();?>admin/home_banner";
}
},
error: function() 
{
toastr.error(JSON.error);

$('.save').prop('disabled', false);
}           
});
});
 

 
</script>

 <script type="text/javascript">
function readURL1(input) {
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




 <script type="text/javascript">
function readURL2(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#u_file0').removeAttr('src')
jQuery('#u_file0').show();



reader.onload = function (e) {
$('#u_file0').attr('src', e.target.result);
$('#u_file0').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>

<script type="text/javascript">
function readURL3(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#u_file1').removeAttr('src')
jQuery('#u_file1').show();



reader.onload = function (e) {
$('#u_file1').attr('src', e.target.result);
$('#u_file1').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>


 



<script type="text/javascript">
function myFunction() {

var about = document.getElementById("about").value;

if(about=='mission'){
  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/abt_mission',
data:{about:about},
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


if(about=='corevalues'){
  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/abt_corevalue',
data:{about:about},
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

if(about=='vision'){
  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/abt_challenges',
data:{about:about},
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



}

</script>







<!-- ================================================== -->



<!-- TinyMCE -->
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/advlist/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/anchor/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autolink/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autoresize/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autosave/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/bbcode/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/charmap/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/code/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/codesample/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/colorpicker/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/contextmenu/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/directionality/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/emoticons/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example_dependency/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullpage/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullscreen/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/hr/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/image/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/imagetools/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/importcss/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/layer/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/link/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/lists/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/media/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/noneditable/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/pagebreak/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/paste/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/preview/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/print/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/save/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/searchreplace/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/spellchecker/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/tabfocus/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/table/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/template/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textcolor/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textpattern/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualblocks/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualchars/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/wordcount/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/themes/modern/theme.min.js"></script>
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

  <script src="<?php echo base_url() ?>assets/scripts/tinymce.init.min.js"></script>

  



<script type="text/javascript">
tinyMCE.init({
    selector: "#tinymce",
  language: 'en',
});

 

</script>

<script type="text/javascript">
 
  tinyMCE.init({
  selector: '#tinymce',
  setup: function(editor) {
    editor.on('init', function(e) {
      console.log('The Editor has initialized.');
    });
  }
});


</script>


</body>
</html>