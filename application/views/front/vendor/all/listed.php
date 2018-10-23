<?php
    foreach($all_vendors as $row){
?>
<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="vendor-details">
        <div class="vendor-banner">
            <?php if(file_exists('uploads/vendor_banner_image/banner_'.$row['vendor_id'].'.jpg')){?>
                <img src="<?php echo base_url();?>uploads/vendor_banner_image/banner_<?php echo $row['vendor_id'];?>.jpg"/>
            <?php }else{?>
                <img src="<?php echo base_url();?>uploads/vendor_banner_image/default.jpg"/>    
            <?php }?>
        </div>
        <div class="vendor-profile">
            <h3>
                <a href="<?php echo $this->crud_model->vendor_link($row['vendor_id']); ?>">
                <?php echo $row['display_name'];?>
                </a>
            </h3>
            <h5><?php echo $row['address1'];?></h5>
            <h5>
                <strong><?php echo translate('email'); ?>: </strong><?php echo $row['email'];?>
                <?php
                    if($row['phone'] !== NULL){
                ?>
                <strong><?php echo translate('phone'); ?>: </strong><?php echo $row['phone'];?>
                <?php
                    }
                ?>
            </h5>
        </div>
        <div class="vendor-products">
            <div class="vendor-btn">
                <a href="<?php echo $this->crud_model->vendor_link($row['vendor_id']); ?>" class="btn btn-custom btn-block btn-theme">
                    <?php echo translate('visit');?>
                </a>
            </div>
        </div>
    </div>
    <div class="vendor-photo">
        <?php if(file_exists('uploads/vendor_logo_image/logo_'.$row['vendor_id'].'.png')){?>
        <img src="<?php echo base_url();?>uploads/vendor_logo_image/logo_<?php echo $row['vendor_id'];?>.png" />
        <?php }else{?>
            <img src="<?php echo base_url();?>uploads/vendor_logo_image/default.jpg"/>
        <?php }?>
    </div>
</div>
<?php
    }
?>

<div class="col-md-12 col-sm-12 col-xs-12 text-center pagination-wrapper" style="padding-top: 10px">  
    <?php echo $this->ajax_pagination->create_links(); ?>
</div>

