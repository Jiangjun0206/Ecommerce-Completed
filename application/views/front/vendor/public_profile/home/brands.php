<!-- PAGE -->
<?php // print_r($this->crud_model->get_vendor_brands($vendor_id)); ?>
<section class="page-section brands">
    <div class="container">
        <h2 class="section-title">
            <span><?php echo translate('available_brands');?></span>
        </h2>
        <div class="partners-carousel">
            <div class="owl-carousel partners2">
                <?php
                    $vendor_brands = $this->crud_model->get_vendor_brands($vendor_id);
                    $brand_ids = array();
                    foreach ($vendor_brands as $vendor_brand) {
                        $brand_ids[] = $vendor_brand['brand'];
                    }
                    // print_r($brand_ids);
                    $brands = null;
                    if (!empty($brand_ids)) {
                        $brands = $this->db->select('*')->from('brand')->where_in('brand_id',$brand_ids)->get()->result_array();
                    }
                    foreach($brands as $row){
                    ?>
                    <div class="p-item p-item-type-zoom">
                        <a href="<?php echo base_url(); ?>home/category/0/0-<?php echo $row['brand_id']; ?>" class="p-item-hover">
                            <div class="p-item-info">
                                <div class="p-headline">
                                    <div class="p-btn">
                                        <i class="fa fa-link"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-mask"></div>
                        </a>
                        <div class="p-item-img">
                            <?php
                            if(file_exists('uploads/brand_image/'.$row['logo'])){
                            ?>
                            <img class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url();?>uploads/brand_image/<?php echo $row['logo']; ?>" alt=""/> 
                            <?php
                                } else {
                            ?>
                            <img  class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url(); ?>uploads/brand_image/default.jpg" />
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<style>
    .partners-carousel .owl-prev, .partners-carousel .owl-next {
        position: absolute;
        top: 50%;
        border: solid 3px #00000096 !important;
        color: #00000096 !important;
        height: 37px;
        width: 37px;
        line-height: 37px;
        text-align: center;
    }
    .partners-carousel .owl-prev .fa, .partners-carousel .owl-next .fa {
        color: #00000096;
        font-size: 24px !important;
        line-height: 30px;
    }
</style>
<!-- /PAGE -->