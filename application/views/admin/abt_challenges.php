<!-- TinyMCE -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <!-- Must include this script FIRST -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>



<div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Challenges Description</label>

<textarea  class="form-control"  id="tinymce" name="about3_desc"><?php echo $about3_desc ?></textarea>

</div>
</div>

<div class="col-md-6">
 <div class="col-md-6">

<div class="form-group">
<label for="confirm_password" class="control-label">Image</label>

 <input type="file" class="form-control-file" id="about3_img" name="about3_img" onchange="readURL3(this);" >
</div> 
</div>

 <div class="col-md-6">
        <div class='form-group'>
          <?php if($about3_img!='' && $about3_img!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'assets/images/'.$about3_img;?>" style="height:200px !important;width:200px !important;" id="u_file1"> <a href="<?php echo site_url()?>download?type=assets/images&filename=<?php echo $about3_img;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
          
</div>



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