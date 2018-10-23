<?php
    $vendor_categories = $this->crud_model->vendor_categories($vendor_id);
    if(count($vendor_categories) !== 0) {
    ?>
    <div class="row">
        <div class="col-sm-9">
            <?php
                // print_r($vendor_categories);
                foreach($vendor_categories as $category_id){
                    $digital_ckeck=$this->db->get_where('category',array('category_id'=>$category_id))->row()->digital;
                    if($this->crud_model->if_publishable_category($category_id)) {
                        $vendor_products_by_cat = $this->crud_model->vendor_products_by_cat($vendor_id, $category_id);
                        $i=1;
                        ?>  
                        <div class="row category-products">
                            <div class="col-sm-12">
                                <h2 class="section-title section-title-lg">
                                    <span>
                                        <span class="thin"> <?php echo $this->crud_model->get_type_name_by_id('category', $category_id, 'category_name');?></span>
                                    </span>
                                </h2>
                                <div class="featured-products-carousel">
                                    <div class="owl-carousel-<?=$i?>" id="recently-viewed-carousel">
                                    <?php
                                        foreach ($vendor_products_by_cat as $products_by_cat) {
                                            echo $this->html_model->product_box($products_by_cat, 'grid', '2');
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $(".owl-carousel-<?=$i?>").owlCarousel({
                                    autoplay: true,
                                    loop: true,
                                    margin: 30,
                                    dots: false,
                                    nav: true,
                                    navText: [
                                        "<i class='fa fa-angle-left'></i>",
                                        "<i class='fa fa-angle-right'></i>"
                                    ],
                                    responsive: {
                                        0: {items: 2},
                                        479: {items: 2},
                                        768: {items: 2},
                                        991: {items: 4},
                                        1024: {items: 4}
                                    }
                                });
                            });
                        </script>
                    <?php
                    }
                    $i++;
                }
            ?>
        </div>
        <div class="col-sm-3">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> <?php echo translate('categories');?></span>
                </span>
            </h2>
            <?php
                foreach($vendor_categories as $row) {
                    // print_r($vendor_categories);
                    if($this->crud_model->if_publishable_category($row)) {
                    ?>
                        <?php 
                            if(file_exists('uploads/category_image/'.$this->crud_model->get_type_name_by_id('category',$row,'banner'))){
                                $img_url = base_url()."uploads/category_image/".$this->crud_model->get_type_name_by_id('category',$row,'banner'); 
                            } else {
                                $img_url = base_url()."uploads/category_image/default.jpg"; 

                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div style="height: 310px; width: 100%; background-image: url(<?=$img_url?>); background-position-x: center; background-position-y: top; background-repeat: no-repeat; background-size: cover;">
                                    <div class="p-item p-item-type-zoom" style="height: 310px">
                                        <span class="p-item-hover">
                                            <div class="p-item-info">
                                                <div class="p-headline" style="margin: 43% 0">
                                                    <span><?php echo $this->crud_model->get_type_name_by_id('category',$row,'category_name'); ?></span>
                                                    <div class="p-line"></div>
                                                    <div class="p-btn">
                                                        <a href="<?php echo base_url(); ?>home/vendor_category/<?=$vendor_id?>/<?php echo $row; ?>" class="btn  btn-theme-transparent btn-theme-xs"><?php echo translate('browse'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-mask" style="height: 310px"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
        </div>
    </div>
    <?php
    }
?>
<script>
$(document).ready(function(){
    setTimeout( function(){ 
        set_cat_product_box_height();
    },1000 );
});

function set_cat_product_box_height(){
    var max_img = 0;
    $('.category-products img').each(function(){
        var current_height= parseInt($(this).css('height'));
        if(current_height >= max_img){
            max_img = current_height;
        }
    });
    $('.category-products img').css('height',max_img);
    
    var max_title=0;
    $('.category-products .caption-title').each(function(){
        var current_height= parseInt($(this).css('height'));
        if(current_height >= max_title){
            max_title = current_height;
        }
    });
    $('.category-products .caption-title').css('height',max_title);
}
</script>