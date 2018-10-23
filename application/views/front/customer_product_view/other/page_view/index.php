<link rel="stylesheet" href="<?php echo base_url(); ?>template/front/js/share/jquery.share.css">
<script src="<?php echo base_url(); ?>template/front/js/share/jquery.share.js"></script>
<?php
	foreach($product_details as $row){
		include 'product_detail.php';
		include 'product_specification.php';
		// include 'related_products.php';
	?>
	<section class="page-section">
	    <div class="container">
	        <div class="row">
	        	<div class="recommendation col-md-12">
	            	<div class="row">
	                    <h3 class="title">
	                        <?php echo translate('related_products');?>
	                    </h3>
	                	<?php
							$related = $this->db->limit(6)->get_where('customer_product', array('category' => $row['category'], 'customer_product_id !=' => $row['customer_product_id'], 'status' => 'ok', 'admin_status' => 'ok', 'is_sold' => 'no'))->result_array();
							foreach($related as $rec){
						?>
	                	<div class="col-md-2 col-sm-6 col-xs-6">
	                        <div class="recommend_box_1">
	                        	<a class="link" href="<?php echo $this->crud_model->customer_product_link($rec['customer_product_id']); ?>">
	                                <div class="image-box" style="background-image:url('<?php echo $this->crud_model->file_view('customer_product',$rec['customer_product_id'],'','','thumb','src','multi','one'); ?>');background-size:cover; background-position:center;">
	                                </div>
	                                <h4 class="caption-title " style="height: 41px;">
	                                    <b><?=$rec['title']?></b>
	                                </h4>
	                                <div class="price">
	                                    <ins>
	                                        <?php echo currency($rec['sale_price']); ?>
	                                    </ins>
	                                </div>
	                            </a>
	                        </div>
	                    </div>
	                    <?php
							}
						?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<?php 
	}
?>