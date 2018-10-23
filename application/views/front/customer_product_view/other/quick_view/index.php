<!-- PAGE -->
<link rel="stylesheet" href="<?php echo base_url(); ?>template/front/js/share/jquery.share.css">
<script src="<?php echo base_url(); ?>template/front/js/share/jquery.share.js"></script>

<?php  
	foreach($product_details as $row){
	$thumbs = $this->crud_model->file_view('customer_product',$row['customer_product_id'],'','','thumb','src','multi','all');
	$mains = $this->crud_model->file_view('customer_product',$row['customer_product_id'],'','','no','src','multi','all'); 
?>
<section class="page-section">
    <div class="row product-single" style="margin-top: 0px;">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="row">
                <div class="col-md-2 others-img">
                    <?php
                        $i=1;
                        foreach ($thumbs as $id=>$row1) {
                    ?>
                    <div class="related-product" id="main<?php echo $i; ?>">
                        <img class="img-responsive img" data-src="<?php echo $thumbs[$id]; ?>" src="<?php echo $row1; ?>" alt=""/>
                    </div>
                    <?php
                        $i++;
                        }
                    ?>
                </div>
                <div class="col-md-10">
                    <img class="img-responsive main-img" id="set_image" src="" alt=""/>
                </div>
            </div>
        </div>
        <div class="col-md-7">
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
            <div class="added_by" style="padding: 10px 0px;">
                <i class="fa fa-user"></i>&nbsp;<?php echo translate('seller:').'<b class="text-info" style="margin-left:4px">'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->username.'</b>';?>
            </div>
            <div class="added_by" style="padding-bottom: 10px;">
                <i class="fa fa-map-marker"></i>&nbsp;<?php echo translate('location:').'<b class="text-info" style="margin-left:4px">'.$row['location'].'</b>';?>
            </div>
            <div class="added_by" style="padding-bottom: 10px;">
                <i class="fa fa-envelope"></i>&nbsp;<?php echo translate('seller_email:').'<a href="mailto:'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->email.'"><b class="text-info" style="margin-left:4px">'.$this->db->get_where('user', array('user_id' => $row['added_by']))->row()->email.'</b></a>';?>
            </div>
            <div class="added_by" style="padding-bottom: 10px;">
                <i class="fa fa-phone"></i>&nbsp;<?php if ($this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone){
                    $phone = $this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone;
                } else {
                    $phone = translate("not_given");
                }?>
                <?php echo translate('phone_no.:').'<a class="show_number" style="cursor: pointer;margin-left:4px;font-size: 16px;line-height: 15px;color:#860055;text-decoration: underline;"><b>Show Number</b></a><b class="text-info number_text" style="margin-left:4px;font-size: 18px;line-height: 15px;display: none;">'.$phone.'</b>';?>
            </div>
            <hr class="page-divider"/>
            <div class="product-price">
                <?php echo translate('price_:');?>
                    <ins>
                        <?php echo currency($row['sale_price']); ?>
                    </ins> 
                <?php }?>
            </div>
            <?php
                include 'order_option.php';
            ?>
            <h4>
                <a style="text-decoration:underline;" href="<?php echo $this->crud_model->customer_product_link($row['customer_product_id']); ?>">
                    <?php echo translate('view_details');?>
                </a>
            </h4>
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
		if($('#main1').length > 0){
			$('#main1').click();
		}
	});
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
	.product-single .fix-length{
		height:225px; 
		overflow:auto;
	}
</style>