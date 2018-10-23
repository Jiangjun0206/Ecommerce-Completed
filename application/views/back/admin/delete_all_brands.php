<div id="content-container">	
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('delete_all_brands');?></h1>
    </div>
    <div id="page-content">
    	<div class="text-center">
	    	<h4 class="text-danger"><?=translate('Are You Sure You Want to Delete All The Brands?')?>
	    	</h4>
	    	<a onclick="delete_all('Are You Sure You Want To Delete All The Brands?')" class="btn btn-danger btn-lg btn-labeled fa fa-trash" style="margin-top: 50px" data-toggle="tooltip" data-original-title="Delete" data-container="body">
	        	<?=translate('delete_all_brands')?>
	        </a>
	    </div>
    </div>
</div>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var user_type = 'admin';
	var module = 'delete_all_brands';
	var dlt_cont_func = 'delete';
</script>