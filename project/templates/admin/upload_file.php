
 <div class="container">
      <div class="row">
      <?php
        $value = get_post_meta($post->ID, "_{$this->_fieldType}_meta_key", true);
        if($value):
          if($value['error'] !== false):
            echo $value['error'];
          else:
            $filename = basename($value['file']);
       ?>

       <div class="col-md-12">
         <a href="<?php echo $value['url']  ?>" ><?php echo $filename ?></a>
       </div>

     <?php endif; ?>
  <?php endif; ?>

       <div class="form-group col-md-12 mt-5">
          <label for="file_upload_xml" class="form-label">Select image to upload:</label>
          <input type="file" name="file_upload_xml" id="file_upload_xml" class="form-control">
      </div>
  </div>
</div>
