<!-- BREADCRUMBS -->
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> <?php echo translate('classified_products');?></span>
                </span>
            </h2>
         </div>
    </div>
</section>

                              
<!-- /BREADCRUMBS -->
<!-- PAGE WITH SIDEBAR -->
<section class="page-section with-sidebar">
    <div class="container">
        <div class="row">
            <!-- SIDEBAR -->
            <?php 
                include 'sidebar.php';
            ?>
            <!-- /SIDEBAR -->
            <!-- CONTENT -->
            <div class="col-md-9 content" id="content">
                <!-- /shop-sorting -->
                <div id="page_content">
                    
                </div>
            </div>
            <!-- /CONTENT -->
        </div>
    </div>
</section>
<!-- /PAGE WITH SIDEBAR -->
<script>
   
	function load_customer_product(){
        var cat=<?=$category?>;
        var sub=<?=$sub_category?>;
        var condition="<?=$condition?>";
        var title="<?=$title?>";
        if(!title){
            title=0
        }
        if(!condition){
            condition=0
        }
        var brand="<?=$brand?>";
        if(!brand){
            brand=0
        }
		var top = Number(200);
		var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';
		$("#page_content").html(loading_set);
		$("#page_content").load("<?php echo base_url()?>home/product_by_customer/"+cat+'/'+sub+'/'+brand+'/'+title+'/'+condition);
	}
	$(document).ready(function(){
		load_customer_product();
    });
</script>