<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>
<!--  TinyMCE   -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
<?php $session = $this->session->userdata('username');?>
 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>Edit Career</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <!-- <a href="<?php echo base_url(); ?>admin/service"><button class="btn btn-warning">Service List</button></a> -->
    </div>
</div>

  <div class="card-content">
         <?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_career', $attributes, $hidden);?>
        <div class="form-body">
          
        <div class="box-content">
          <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
          <tr>
          <th>No</th>
          <th>Title</th>
          <th>Arabic Title</th>
          <th>Content</th>
          <th>Arabic Content</th>
          <th>Image</th>
          <th>Action</th> 
          </tr>

          </thead>
          <tbody>
          <?php 
          $i =0;
          foreach ($userdet as $value) {

          $i++;
          $image= $value['image'];
          ?>
          <tr>
          <td><?php echo $i ?></td>

          <td><?php echo $value['title'] ?></td>
          <td><?php echo $value['ar_title'] ?></td>
          <td><?php echo $value['content'] ?></td>
          <td><?php echo $value['ar_content'] ?></td>


          <td><?php if($image!='' && $image!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/home_services/'.$image;?>" style="height:30px !important;width:50px !important;" id="image"> <a href="<?php echo base_url().'uploads/home_services/'.$image;?>" download>Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?> </td>

          <th> <a href="<?php echo base_url()?>admin/edit_homelist/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
          </th>
          </tr>

          <?php
          } ?>


          </tbody>

          </table>
          </div>
          </div> 
           
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
        <?php echo form_close(); ?> </div>



<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>
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
initMCEexact("content9");
initMCEexact("content10");
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;


});

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
        //alert("1");
				$('.save').prop('disabled', false);
				} else {
				toastr.success(JSON.result);
         //alert("2");
				$('.save').prop('disabled', false);
				window.location.href="<?php echo base_url();?>admin/home";
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
   $(document).ready(function(){
 // $("input[type=checkbox]").click(function () {
  $('#example1').on("change", ".chkswitch", function () {
    var id=$(this).attr('id');
    var bid = id.split("-");
    //alert(bid);
    //alert(bid[1]);
      $.ajax({
          type: "POST",
          url: "<?php echo base_url() ?>admin/home_status_enable",
          data: {
              value: $(this).prop("checked") ? 1 : 0,id:bid[1]
          },
         success: function(JSON)
      {
        if (JSON.error != '') {
        toastr.error(JSON.error);
        //$('.save').prop('disabled', false);
        } else {
        toastr.success(JSON.result);
        //$('.save').prop('disabled', false);
        window.location.href="<?php echo base_url();?>admin/home";
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
function readURL1(input) {
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
function readURL2(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
jQuery('#u_file2').removeAttr('src')
jQuery('#u_file2').show();
reader.onload = function (e) {
$('#u_file2').attr('src', e.target.result);
$('#u_file2').attr('style', "height:200px !important;width:200px !important;");
}
reader.readAsDataURL(input.files[0]);
}
}
</script>

<script type="text/javascript">
function readURL3(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
jQuery('#u_file3').removeAttr('src')
jQuery('#u_file3').show();
reader.onload = function (e) {
$('#u_file3').attr('src', e.target.result);
$('#u_file3').attr('style', "height:200px !important;width:200px !important;");
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
</body>
</html>