<!-- PAGE -->
<section class="page-section specification">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="tabs-wrapper content-tabs">
                    <ul class="nav nav-tabs">
                        <li  class="active"><a href="#tab2" data-toggle="tab"><?php echo translate('additional_specification'); ?></a></li>
                        <li><a href="#tab1" data-toggle="tab"><?php echo translate('full_description'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab1">
                            <?php echo $row['description'];?>
                        </div>
                        <div class="tab-pane fade in active" id="tab2">
                            <div class="panel panel-sea margin-bottom-40">
                            <?php 
                                $a = $this->crud_model->get_customer_additional_fields($row['customer_product_id']);
                                if(count($a)>0){
                            ?>
                                <table class="table table-bordered">
                                    <tbody>
                                    <?php
                                        foreach ($a as $val) {
                                    ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $val['name']; ?></td>
                                            <td style="text-align:center;"><?php echo $val['value']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            <?php 
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
<style>
@media(max-width: 768px) {
	.specification .nav-tabs>li{
		float: none;
		display: block;
		text-align: center;
	}
}
</style>