
<input type="hidden" name="id" value="<?php echo $id ?>">

<div class="col-md-12">
<div class="form-group">
<!-- <label for="About Banner" class="control-label"> Banner</label> -->


</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="About Banner" class="control-label">Banner Description Line 1</label>
<textarea  class="form-control" name="description"><?php echo $description ?></textarea>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="About Banner" class="control-label"> Banner Description Line 2</label>
<textarea  class="form-control" name="description1"><?php echo $description1 ?></textarea>

</div>
</div>
<br>
<br>
<br>
<div class="row">
  <div class="col-md-6">
 <div class="col-md-6">

<div class="form-group">
<label for="confirm_password" class="control-label">Image</label>
 <input type="file" class="form-control-file" id="image" name="image1" onchange="readURL(this);" >
</div> 
</div>

 	<div class="col-md-6">
        <div class='form-group'>
          <?php if($image!='' && $image!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'assets/images/'.$image;?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=assets/images&filename=<?php echo $image;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
          
</div>
</div>



  <input type="hidden" class="form-control-file" id="himg" name="himg" value="<?php echo $image  ?>" >
   <textarea hidden="true" style="display:none " class="form-control" name="desc"><?php echo $description ?></textarea>
  <textarea hidden="true" style="display:none " class="form-control" name="desc1"><?php echo $description1 ?></textarea>

<!-- ================================================== -->

