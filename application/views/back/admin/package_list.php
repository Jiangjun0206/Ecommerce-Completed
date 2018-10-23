<div class="panel-body">
    <?php foreach ($all_packages as $value): ?>
        <?php if ($value->package_id == 1): ?>
            <div class="col-sm-4 col-lg-3">
                <!--Dark Panel-->
                <!--===================================================-->
                <div class="panel panel-colorful panel-dark">
                    <div class="panel-body">
                        <div class="text-center">
                            <?php
                                $image = $value->image;
                                $images = json_decode($image, true);
                                //print_r($images);
                                if (file_exists('uploads/plan_image/'.$images[0]['thumb'])) {
                                ?>
                                    <img src="<?=base_url()?>uploads/plan_image/<?=$images[0]['thumb']?>" height="100">
                                <?php
                                }
                                else {
                                ?>
                                    <img src="<?=base_url()?>uploads/plan_image/default_image.png" height="100">
                                <?php
                                }
                            ?>
                            <h3 class="panel-title"><?=$value->name?></h3>
                            <p style="font-size: 25px"><b><?=currency('','def').' '.$this->cart->format_number($value->amount)?></b></p>
                            <p><?=translate('product_upload')?>: <?=$value->upload_amount?> times</p>
                            
                        </div>
                        <div class="col-sm-12">
                            <a id="demo-dt-view-btn" class="btn btn-mint add-tooltip" onclick="ajax_set_full('edit', '<?php echo translate('edit_package'); ?>', '<?php echo translate('successfully_edited!'); ?>', 'package_uploader_edit', '<?=$value->package_id?>', proceed('to_edit'))" style="width: 100%" ><i class="fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Dark Panel-->
            </div>
        <?php endif ?>
        <?php if ($value->package_id != 1): ?>
            <div class="col-sm-4 col-lg-3">
                <!--Primary Panel-->
                <!--===================================================-->
                <div class="panel panel-bordered-primary">
                    <div class="panel-body">
                        <div class="text-center">
                            <?php
                                $image = $value->image;
                                $images = json_decode($image, true);
                                //print_r($images);
                                if (file_exists('uploads/plan_image/'.$images[0]['thumb'])) {
                                ?>
                                    <img src="<?=base_url()?>uploads/plan_image/<?=$images[0]['thumb']?>" height="100">
                                <?php
                                }
                                else {
                                ?>
                                    <img src="<?=base_url()?>uploads/plan>?>">
                                <?php
                                }
                            ?>
                            <h3 class="panel-title"><?=$value->name?></h3>
                            <p style="font-size: 25px"><b><?=currency('','def').' '.$this->cart->format_number($value->amount)?></b></p>
                            <p><?=translate('product_upload')?>: <?=$value->upload_amount?> <?=translate('times')?></p>
                            
                        </div>
                        <div class="col-sm-12">
                            <a id="demo-dt-view-btn" class="btn btn-primary add-tooltip" onclick="ajax_set_full('edit', '<?php echo translate('edit_package'); ?>', '<?php echo translate('successfully_edited!'); ?>', 'package_uploader_edit', '<?=$value->package_id?>', proceed('to_edit'))" style="width: 100%" ><i class="fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Primary Panel-->
            </div>

        <?php endif ?>
    <?php endforeach ?>
</div>