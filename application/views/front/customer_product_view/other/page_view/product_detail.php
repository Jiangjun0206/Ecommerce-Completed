<!-- PAGE -->
<?php
    $thumbs = $this->crud_model->file_view('customer_product',$row['customer_product_id'],'','','thumb','src','multi','all');
    $mains = $this->crud_model->file_view('customer_product',$row['customer_product_id'],'','','no','src','multi','all'); 
?>
<section class="page-section light">
    <div class="container">
        <div class="row " style="margin-top: 0px">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row product-single">
                    <div class="col-md-12">
                        <h3 class="product-title"><?php echo $row['title'];?></h3>
                        <div class="product-info" style="padding: 10px 0px;">
                            <p>
                                <a href="#">
                                    <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name');?>
                                </a>
                            </p>
                            ||
                            <p>
                                <a href="#">
                                    <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name');?>
                                </a>
                            </p>
                            <?php if ($row['brand'] != ""): ?>
                                ||
                                <p>
                                    <a href="#">
                                        <?php echo translate('brand:_').$row['brand'];?>
                                    </a>
                                </p>
                            <?php endif ?>
                        </div>
                        <?php 
                        if ($row['prod_condition'] == 'new') { ?>
                            <p><?=translate('condition:')." <span class='label label-primary'>".translate($row['prod_condition'])."</span>";?></p>
                        <?php } else { ?>
                            <p><?=translate('condition:')." <span class='label label-danger'>".translate($row['prod_condition'])."</span";?></p>
                        <?php } ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 zoom">
                        <img class="img-responsive main-img zoom" id="set_image" src="" alt="" style="width: auto !important;max-height: 500px;margin-left: auto;margin-right: auto;" />
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 others-img">
                        <?php
                            $i=1;
                            foreach ($thumbs as $id=>$row1) {
                        ?>
                        <div class="related-product " id="main<?php echo $i; ?>">
                            <img class="img-responsive img" data-src="<?php echo $mains[$id]; ?>" src="<?php echo $row1; ?>" alt=""/>
                        </div>
                        <?php
                            $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="row product-single">
                    <div class="col-md-12" style="padding-bottom: 20px">
                        <h3 class="product-title"><?php echo translate('seller_informations');?></h3>
                        <div class="added_by" style="padding: 10px 0px;">
                            <i class="fa fa-user" style="line-height: 18px"></i>&nbsp;<?php echo translate('seller:').'<b class="text-info" style="margin-left:4px">'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->username.'</b>';?>
                        </div>
                        <div class="added_by" style="padding-bottom: 10px;">
                            <i class="fa fa-map-marker" style="line-height: 18px"></i>&nbsp;<?php echo translate('location:').'<b class="text-info" style="margin-left:4px">'.$row['location'].'</b>';?>
                        </div>
                        <div class="added_by" style="padding-bottom: 10px;">
                            <i class="fa fa-envelope" style="line-height: 18px"></i>&nbsp;<?php echo translate('seller_email:').'<a href="mailto:'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->email.'"><b class="text-info" style="margin-left:4px">'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->email.'</b></a>';?>
                        </div>
                        <div class="added_by" style="padding-bottom: 10px;">
                            <i class="fa fa-phone" style="line-height: 18px"></i>&nbsp;<?php if ($this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone){
                                $phone = $this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone;
                            } else {
                                $phone = translate("not_given");
                            }?>
                            <?php echo translate('phone_no.:').'<a href="#" class="show_number" style="margin-left:4px;font-size: 16px;line-height: 18px;color:#860055;text-decoration: underline;"><b>Show Number</b></a><b class="text-info number_text" style="margin-left:4px;font-size: 18px;line-height: 18px;display: none;">'.$phone.'</b>';?>
                        </div>
                        <hr class="page-divider"/>
                        <div class="product-price">
                            <?php echo translate('price:');?>
                            <ins>
                                <?php echo currency($row['sale_price']); ?>
                            </ins>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="row product-single" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <h3 class="product-title"><?php echo translate('share_links');?></h3>
                        <?php
                            include 'order_option.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /PAGE -->
                
<script>
    $(".img").click(function(){
        var src = $(this).data('src');
        $("#set_image").attr("src", src);
        $(".related-product").removeClass("selected");
        $(this).closest(".related-product").addClass("selected");
    });
    $(document).ready(function() {
        $("#main1").addClass("selected");
        var src=$("#main1").find(".img").data('src');
        $("#set_image").attr("src", src);
    });
    
    $(function(){
        //setTimeout(function(){ 
            $('.zoom').zoome({hoverEf:'transparent',showZoomState:true,magnifierSize:[200,200]});
        //}, 3000);
        
    });
    
    function destroyZoome(obj){
        if(obj.parent().hasClass('zm-wrap'))
        {
            obj.unwrap().next().remove();
        }
    }
</script>
<script>
    $('body').on('click', '.rev_show', function(){
        $('.ratings_show').hide('fast');
        $('.inp_rev').show('slow');
    });
    $('body').on('click', '.show_number', function(){
        $('.show_number').hide();
        $('.number_text').show('fast');
    });
</script>
<style>
    .rate_it{
        display:none;   
    }

    .product-single .badges div{
        padding: 0 5px !important;
    }

    .product-price del {
        font-weight: 400;
        font-size: 24px;
    }
</style>