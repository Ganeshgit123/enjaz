
<div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Mission Description</label>

<textarea  class="form-control" name="about1_desc"><?php echo $about1_desc ?></textarea>

</div>
</div>

<div class="col-md-6">
 <div class="col-md-6">

<div class="form-group">
<label for="confirm_password" class="control-label">Image</label>

 <input type="file" class="form-control-file" id="about1_img" name="about1_img" onchange="readURL1(this);" >
</div> 
</div>

 	<div class="col-md-6">
        <div class='form-group'>
          <?php if($about1_img!='' && $about1_img!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'assets/images/'.$about1_img;?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=assets/images&filename=<?php echo $about1_img;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
          
</div>