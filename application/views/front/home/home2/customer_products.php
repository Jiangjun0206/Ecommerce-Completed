<!-- PAGE -->
<section class="page-section featured-products">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title section-title-lg">
                            <span>
                                <span class="thin"> <?php echo translate('classified_products');?></span>
                            </span>
                        </h2>
                        <div class="featured-products-carousel">
                            <div class="owl-carousel-3" id="most-viewed-carousel">
                                <?php
                                    $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 44))->row()->value;
                                    $box_style = 1;
                                    // $customer_products=$this->crud_model->product_list_set('bundle',$limit);
                                    $this->db->order_by('customer_product_id', 'desc');
                                    $this->db->limit($limit);
                                    $customer_products= $this->db->get_where('customer_product', array('status' => 'ok', 'admin_status' => 'ok', 'is_sold' => 'no'))->result_array();
                                    foreach($customer_products as $row){
                                        echo $this->html_model->product_box($row, 'customer_grid', $box_style);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- /PAGE -->
<script>
$(document).ready(function(){
    set_featured_product_box_height();
    $(".owl-carousel-3").owlCarousel({
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
            991: {items: 5},
            1024: {items: 5}
        }
    });
});

function set_featured_product_box_height(){
    var max_title=0;
    $('.featured-products .caption-title').each(function(){
        var current_height= parseInt($(this).css('height'));
        if(current_height >= max_title){
            max_title = current_height;
        }
    });
    $('.featured-products .caption-title').css('height',max_title);
}
</script>