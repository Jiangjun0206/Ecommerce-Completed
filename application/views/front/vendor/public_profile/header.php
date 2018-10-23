<!-- BREADCRUMBS -->
<section class="page-section" style="padding:0px">
    <div class="vendor_header">
        <!-- HEADER -->
        <div class="header header-logo-left" style="border-bottom:none;">
            <div class="header-wrapper"  style="padding: 15px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?php echo $this->crud_model->vendor_link($vendor_id); ?>">
                                    <?php if(file_exists('uploads/vendor_logo_image/logo_'.$vendor_id.'.png')){?>
                                    <img class="img-responsive" src="<?php echo base_url();?>uploads/vendor_logo_image/logo_<?php echo $vendor_id;?>.png"  style="height:90px; width:90px" alt="Shop"/>
                                    <?php }else{?>
                                        <img class="img-responsive" src="<?php echo base_url();?>uploads/vendor_logo_image/default.jpg" style="height:90px; width:90px" alt="Shop"/>
                                    <?php }?>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <div class="info">
                                <h3> 
                                    <?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'display_name');?>
                                </h3>
                                <h6>
                                    <?php echo translate('member_since');?>: 
                                    <?php echo date("d M, Y", $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'create_timestamp'));?>
                                    <br>
                                    <?php echo translate('email');?>:
                                	<?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'email');?>
                                </h6>
                                <h6 class="hidden-sm hidden-xs">
                                    <?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'address1');?>
                                    <br>
                                    <?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'address2');?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <!-- new code -->
                            <?php if(file_exists('uploads/vendor_banner_image/banner_'.$vendor_id.'.jpg')){?>
                                <div class="vendor_cover_img" style="background-image: url(<?php echo base_url();?>uploads/vendor_banner_image/banner_<?php echo $vendor_id;?>.jpg"></div>
                            <?php }else{?>
                                <img class="slide-img"  src="<?php echo base_url();?>uploads/vendor_banner_image/default.jpg"/> 
                            <?php }?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<div class="row">
                                <div class="col-md-6 author_rating" style="margin-bottom:0px;margin-top:0px;">
                                    <h6><?php echo translate('vendor_rating'); ?></h6>
                                    <div class="rating ratings_show" data-original-title="<?php echo $rating = $this->crud_model->vendor_rating($vendor_id); ?>"	
                                        data-toggle="tooltip" data-placement="left">
                                        <?php
                                            $r = $rating;
                                            $i = 6;
                                            while($i>1){
                                                $i--;
                                        ?>
                                            <span class="star <?php if($i<=$rating){ echo 'active'; } $r++; ?>"></span>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                	$facebook 		=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->facebook;
									$googleplus 	=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->google_plus;
									$twitter 		=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->twitter;
									$skype 			=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->skype;
									$youtube 		=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->youtube;
									$pinterest 		=  $this->db->get_where('vendor',array('vendor_id' => $vendor_id))->row()->pinterest;
								?>
									
								<ul class="col-md-6 social-icons social-icons-ven hidden-sm hidden-xs" style="margin-bottom:0px;margin-top:0px;">
									<li><a href="<?php echo $facebook;?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo $twitter;?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo $googleplus;?>" class="google"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="<?php echo $pinterest;?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="<?php echo $youtube;?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
									<li><a href="<?php echo $skype;?>" class="skype"><i class="fa fa-skype"></i></a></li>
								</ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-6 profile_top">
                            <div class="row">
                                <div class="col-md-12" style="margin-top:0px;">
                                    <div class="top_nav">
                                        <ul>
                                            <li <?php if($content=='home'){ ?>class="active"<?php } ?> >
                                                <a href="<?php echo base_url(); ?>index.php/home/vendor_profile/<?php echo $vendor_id;?>">
                                                    <?php echo translate('about_vendor');?>
                                                </a>
                                            </li>
                                            <li <?php if($content=='product_list'){ ?>class="active"<?php } ?>>
                                                <a href="<?php echo base_url(); ?>index.php/home/vendor_category/<?php echo $vendor_id;?>/0">
                                                    <?php echo translate('all_products');?>
                                                </a>
                                            </li>
                                            <li <?php if($content=='featured'){ ?>class="active"<?php } ?>>
                                                <a href="<?php echo base_url(); ?>index.php/home/vendor_featured/<?php echo $vendor_id;?>">
                                                    <?php echo translate('featured_products');?>
                                                </a>
                                            </li>
                                            <li <?php if($content=='contact'){ ?>class="active"<?php } ?>>
                                                <a href="<?php echo base_url();?>index.php/home/store_locator/<?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'display_name');?>" target="_blank">
                                                    <?php echo translate('find_location');?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /HEADER -->             
    </div>
</section>
<!-- /BREADCRUMBS -->
<style>
.social-icons-ven li {
    padding: 5px 0px 0 0 !important;
    float: right !important;
}
.social-icons a.facebook {
    color: #3b5998;
}
.social-icons a.twitter {
    color: #1da1f2;
}
.social-icons a.google {
    color: #dd4c40;
}
.social-icons a.pinterest {
    color: #bd081c;
}
.social-icons a.youtube {
    color: #ff0000;
}
.social-icons a.skype {
    color: #1686D9;
}
</style>