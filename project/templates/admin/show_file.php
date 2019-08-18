<div class="container">
     <div class="row">
     <?php
           $home = home_url();
           $p = get_post();
           $cat = get_the_category($p->ID);
           $post = $p->post_type;
           $catagory = $cat[0]->slug;
           $api_link = "$home/api/?post=$post&&catg=$catagory";
      ?>
      <div class="col-md-12">
        <label class="form-label">API Link:</label>
        <input type="text" name="api_link" class="form-control" value="<?php echo $api_link; ?>" disabled />
      </div>
 </div>
</div>
