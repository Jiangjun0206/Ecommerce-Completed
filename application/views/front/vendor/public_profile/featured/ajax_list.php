<div class="row products grid">
<?php
	foreach($products as $row){
?>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <?php echo $this->html_model->product_box($row, 'grid', '1'); ?>
    </div>
<?php
	}
?>
</div>
<div class="pagination-wrapper">  
	<?php echo $this->ajax_pagination->create_links();  ?>
</div>
<style type="text/css">
	h4.caption-title {
		height: 61px;
	}
	.products.list .thumbnail .price {
	    float: none;
	    margin-bottom: 0;
	}
</style>
<script>
	$(document).ready(function() {
		load_iamges();
	});	
</script>