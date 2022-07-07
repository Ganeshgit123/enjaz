<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
<?php $session = $this->session->userdata('username');?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4>Edit List</h4></div>
<div class='col-md-6'></div>

</div>

<div class="card-content">
<?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/update_careerlist', $attributes, $hidden);?>
<div class="form-body">

<input type="hidden" name="id" value="<?php echo $id ?>">

<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Title</label>
<input class="form-control"  name="title" type="text" value="<?php echo $acc_title?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Arabic Title</label>
<input class="form-control"  name="ar_title" type="text" value="<?php echo $acc_title_ar ?>">
</div>
</div>
</div>

<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">location</label>
<input class="form-control" name="loc" type="text" value="<?php echo $acc_location?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Arabic Location</label>
<input class="form-control"  name="ar_loc" type="text" value="<?php echo $acc_location_ar ?>">
</div>
</div>
</div>
<div class="row"> 
          <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name">Description</label>
                    <textarea rows="10" id="content1" class="form-control"  name="content"><?php echo $acc_desc ?></textarea>

                  </div>
                </div>
             <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name">Arabic Description</label>
                                        <textarea  id="content2" rows="10" class="form-control"  name="ar_content"><?php echo $acc_desc_ar ?></textarea>

                  </div>
                </div>
          </div>

          <div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Button Name</label>
<input class="form-control" name="btn-name" type="text" value="<?php echo $apply?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Button Name Ar</label>
<input class="form-control"  name="btn-ar" type="text" value="<?php echo $apply ?>">
</div>
</div>
</div>

</div>



<!-- <div class="row"> 




<div class="col-md-6">
 <div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Image</label>
 <input type="file" class="form-control-file" id="image" name="image" onchange="readURL(this);" >

  <input type="hidden" class="form-control-file" id="oldimage" name="oldimage" value ="<?php echo $image?>"  >
</div>
</div>
 <div class="col-md-6">
        <div class='form-group'>
         
        </div>
      </div>
</div>

</div> -->


</div>
</div>
</div>





<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
<?php echo form_close(); ?>



 </div>
</div></div>



<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>

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
// window.location.href="<?php echo base_url();?>admin/career";
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
 
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet"
                href="<?php echo base_url() ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/advlist/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/anchor/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autolink/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autoresize/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autosave/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/bbcode/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/charmap/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/code/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/codesample/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/colorpicker/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/contextmenu/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/directionality/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/emoticons/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example/plugin.min.js "></script>
            <script
                src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example_dependency/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullpage/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullscreen/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/hr/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/image/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/imagetools/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/importcss/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/layer/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/link/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/lists/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/media/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/noneditable/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/pagebreak/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/paste/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/preview/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/print/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/save/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/searchreplace/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/spellchecker/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/tabfocus/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/table/plugin.min.js "></script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/template/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textcolor/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textpattern/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualblocks/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualchars/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/wordcount/plugin.min.js ">
            </script>
            <script src="<?php echo base_url() ?>assets/plugin/tinymce/themes/modern/theme.min.js"></script>
            <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

            <script src="<?php echo base_url() ?>assets/scripts/tinymce.init.min.js"></script>

  



            <script type="text/javascript">
  /* Add data */ /*Form Submit*/
  function initMCEexact(e) {
                tinyMCE.init({
                    skin: false,
                    mode: "exact",
                    elements: e,
                })
            }
  $(document).ready(function(){
 initMCEexact("content1");
 initMCEexact("content2");
initMCEexact("content3");
initMCEexact("content4");
initMCEexact("content5");
initMCEexact("content6");
initMCEexact("content7");
initMCEexact("content8");

document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
});
</script>



</body>
</html>