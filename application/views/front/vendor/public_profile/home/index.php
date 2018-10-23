<input type="hidden" id="vendor_id" value="<?php echo $vendor_id ?>"/>

<section class="page-section">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <div id="slider">
                
                </div>
            </div>
       	</div>             
    </div>
</section>
<section class="page-section brands">
 <div class="container">
        <h2 class="section-title">
            <span><?php echo translate('about').' '.$this->crud_model->get_type_name_by_id('vendor',$vendor_id,'display_name');?></span>
        </h2>
        <div class="partners-carousel">
             <p>
                 <?php echo $this->crud_model->get_type_name_by_id('vendor',$vendor_id,'details');?>
             </p>
             
        </div>
    </div>
</section>
<!-- PAGE WITH SIDEBAR -->
<section class="page-section">
	<div class="container">
		<div class="row">
			<!-- CONTENT -->
			<div class="content" id="content">
				<?php 
					include 'featured_product.php';
				?>
				<!-- /shop-sorting -->
				<?php include 'category.php'; ?>
				<?php include 'brands.php'; ?>
			</div>
			<!-- /CONTENT -->
		</div>
	</div>
</section>
<!-- /PAGE WITH SIDEBAR -->
<script>
$(document).ready(function(){
	get_slider();
});
function get_slider(){
	var id = $('#vendor_id').val();
	$('#slider').load(
		"<?php echo base_url()?>home/vendor_profile/get_slider/"+id,
		function(){
			var mainSliderSizeNew = $('#main-slider').find('.item').size();
            $('#main-slider').owlCarousel({
					//items: 1,
					autoplay: true,
					autoplayHoverPause: false,
					loop: mainSliderSizeNew > 1 ? true : false,
					margin: 0,
					dots: true,
					nav: true,
					navText: [
						"<i class='fa fa-angle-left'></i>",
						"<i class='fa fa-angle-right'></i>"
					],
					responsiveRefreshRate: 100,
					responsive: {
						0: {items: 1},
						479: {items: 1},
						768: {items: 1},
						991: {items: 1},
						1024: {items: 1}
					}
            });
		}
	);
}
</script>
<style>
	.social-icons a.facebook:hover {
	    background-color: #3b5998 !important;
	    color: #ffffff;
	}
	.social-icons a.twitter:hover {
	    background-color: #1da1f2 !important;
	    color: #ffffff;
	}
	.social-icons a.google:hover {
	    background-color: #dd4c40 !important;
	    color: #ffffff;
	}
	.social-icons a.pinterest:hover {
	    background-color: #bd081c !important;
	    color: #ffffff;
	}
	.social-icons a.youtube:hover {
	    background-color: #ff0000 !important;
	    color: #ffffff;
	}
	.social-icons a.skype:hover {
	    background-color: #1686D9 !important;
	    color: #ffffff;
	}
</style>