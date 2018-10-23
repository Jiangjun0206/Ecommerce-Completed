<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
    @media (min-width: 1200px){
        .cus_cont {
            width: 1290px;
        }
    }
</style>
<section class="page-section">
    <div class="wrap container">
        <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <input type="hidden" id="state" value="normal" />
                    <div class="widget account-details hidden-xs">
                    <div class="information-title" style="margin-bottom: 0px;"><?php echo translate('my_profile');?></div>
                        <ul class="pleft_nav">

                            <a class="pnav_info" href="#"><li class="active"><?php echo translate('profile');?></li></a>
                            <?php if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') {
                                ?>
                            <a class="pnav_wallet" href="#"><li><?php echo translate('wallet');?></li></a>
                            <?php } ?>  
                            <a class="pnav_wishlist" href="#"><li><?php echo translate('wishlist');?></li></a>
                            <a class="pnav_order_history" href="#"><li><?php echo translate('order_history');?></li></a>
                            <a class="pnav_downloads" href="#"><li><?php echo translate('downloads');?></li></a>
                            <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                                <a class="pnav_uploaded_products" href="#"><li><?php echo translate('uploaded_products');?></li></a>
                                <a class="pnav_package_payment_info" href="#"><li><?php echo translate('package_payment_info');?></li></a>
                            <?php } ?>
                            <a class="pnav_update_profile" href="#"><li><?php echo translate('edit_profile');?></li>
                            <a class="pnav_ticket" href="#"><li><?php echo translate('support_ticket');?></li></a>
                            <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                                <a class="pnav_post_product" href="#"><li><?php echo translate('post_product');?></li></a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-6">
                    <div id="profile_content">
                        
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="prodPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=translate('confirm_your_upload')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div><?=translate('your_remaining_product_upload_amount:_').'<b><span class="post_amount">0</span></b><br>'.translate('uploading_a_product_will_cost_you_1_upload_amount</br><b class="text-danger">After_uploading_a_product_you_can_not_edit_it_again</b>')?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal"><?=translate('close')?></button>
                <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;font-weight: 400;"><?=translate('confirm')?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Status change -->
<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=translate('change_availability_status')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center content_body" id="content_body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Status change -->

<script>
	var top = Number(200);
	var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

    $('.pnav_info').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/info");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_info").find("li").addClass("active");
    });
    $('.pnav_wallet').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/wallet");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_wallet").find("li").addClass("active");
    });
    $('.pnav_wishlist').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/wishlist");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_wishlist").find("li").addClass("active");
    });
    $('.pnav_uploaded_products').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/uploaded_products");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_uploaded_products").find("li").addClass("active");

    });
    $('.pnav_package_payment_info').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/package_payment_info");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_package_payment_info").find("li").addClass("active");
    });
    $('.pnav_order_history').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/order_history");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_order_history").find("li").addClass("active");
    });
    $('.pnav_downloads').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/downloads");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_downloads").find("li").addClass("active");
    });
    $('.pnav_update_profile').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/update_profile");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_update_profile").find("li").addClass("active");
    });
    $('.pnav_ticket').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/ticket");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_ticket").find("li").addClass("active");
    });
    $('.pnav_post_product').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/post_product");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_post_product").find("li").addClass("active");
    });



	$(document).ready(function(){
        // $("#<?php echo $part; ?>").click();
		$(".pnav_<?php echo $part; ?>").click();
    });
</script>
<style type="text/css">
    .pagination_box a{
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb!important;
    }
</style>
