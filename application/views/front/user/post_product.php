<style>
.bootstrap-select > .selectpicker {
    -webkit-appearance: none;
    -webkit-box-shadow: none;
    box-shadow: none !important;
    height: 50px;
    border-radius: 4px;
    border: 1px solid #c5c5c5;
    background-color: #ffffff !important;
    color: #737475 !important;
}
.dropdown-menu {
    border-width: 1px !important;
}
.input-group-addon {
    padding: 6px 16px;
}
</style>
<div class="information-title">
    <?php echo translate('post_product');?>
</div>
<div class="details-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="tabs-wrapper content-tabs">
                <div class="tab-content">
                    <div class="tab-pane fade in active">
                    	<div class="details-wrap">
                            <div class="block-title alt"> 
                                <i class="fa fa-angle-down"></i> 
                                <?php echo translate('fill_the_form_to_post_the_product');?>
                            </div>
                            <?php 
                                $upload_amount = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row()->product_upload; 
                            ?>
                            <?php if ($upload_amount <= 0){ ?>
                                <p class="text-center text-danger"><?=translate('your_remaining_product_upload_amount:_').'<b>0</b><br>'.translate('please_purchase_a_package_to_upload_more_products.')?></p>
                                <div class="text-center">
                                    <a href="<?=base_url()?>home/premium_package" class="btn btn-theme"><?=translate('purchase_package')?></a>
                                </div>
                            <?php } else { ?>
                                <p class="text-success"><?=translate('remaining_product_upload_amount:_').$upload_amount;?></p>
                                <div class="details-box">
                                    <?php
                                        echo form_open(base_url() . 'home/profile/do_post_product/', array(
                                            'class' => 'form-login',
                                            'method' => 'post',
                                            'enctype' => 'multipart/form-data'
                                        ));
                                    ?>    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="title" value="" type="text" placeholder="<?php echo translate('title');?>" data-toggle="tooltip" title="<?php echo translate('title');?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo $this->crud_model->select_html2('category', 'category', 'category_name', 'add', 'form-control selectpicker', '', '', '', 'get_sub_cat', '', translate('category'));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="post_sub_category">
                                                    <select class="form-control selectpicker" name="sub_category" data-toggle="tooltip" title="<?php echo translate('sub_category');?>">
                                                        <option value=""><?php echo translate('sub_category');?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" name="brand" value="" type="text" placeholder="<?php echo translate('brand');?>" data-toggle="tooltip" title="<?php echo translate('brand');?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control selectpicker" name="prod_condition" data-toggle="tooltip" title="<?php echo translate('condition');?>">
                                                        <option value=""><?php echo translate('condition');?></option>
                                                        <option value="new"><?php echo translate('new');?></option>
                                                        <option value="used"><?php echo translate('used');?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <?php 
                                                            $currency = $this->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
                                                            $currency_symbol = $this->db->get_where('currency_settings', array('currency_settings_id' => $currency))->row()->symbol;
                                                        ?>
                                                        <div class="input-group-addon"><?=$currency_symbol?></div>
                                                        <input class="form-control" name="sale_price" value="" type="number" placeholder="<?php echo translate('price');?>" data-toggle="tooltip" title="<?php echo translate('price');?>" style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="location" rows="20" placeholder="<?php echo translate('location');?>" data-toggle="tooltip" title="<?php echo translate('location');?>" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div>
                                                        <label><?=translate('images')?></label><br>
                                                        <label class="btn btn-theme btn-theme-sm" for="prod_img" style="width: 200px;font-size: 12px;margin-top: 10px;padding: 8px;"><?php echo translate('choose_files');?></label>
                                                    </div>
                                                    <div>
                                                        <span class="pull-left btn btn-default btn-file hidden"> <?php echo translate('choose_file');?>
                                                            <input type="file" multiple name="images[]" onchange="preview(this);" id="prod_img" class="form-control required">
                                                        </span>
                                                        <span id="previewImg"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="">
                                                    <textarea class="form-control txt_editor" name="description" placeholder="<?php echo translate('description');?>" data-toggle="tooltip" title="<?php echo translate('description');?>" style="height: 300px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?=translate('additional_information')?></label><br>
                                                    <h5><i><?=translate('if_you_need_more_field_for_your_product_,_please_click_here_for_more...');?></i></h5>
                                                    <button type="button" class="btn btn-theme btn-theme-sm" id="more_btn" style="width: 200px;font-size: 12px;margin-top: 10px;padding: 8px;"><?=translate('add_more_fields')?></button>
                                                </div>
                                                <div class="row" id="more_additional_fields" style="margin-top: 0px">
                                                    <!-- Loads more fields -->
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                                <button type="button" type="button" class="btn btn-theme pull-right open_modal" data-toggle="modal" data-target="#prodPostModal"><?php echo translate('upload');?></button>
                                                <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-reload='ok' data-unsuccessful='<?php echo translate('product_upload_failed!'); ?>' data-success='<?php echo translate('product_uploaded_successfully!'); ?>' data-ing='<?php echo translate('processing..') ?>'><?php echo translate('upload');?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $("#previewImg").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<div style='float:left;border:2px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "' style='width:auto'></div>");
                }
            });
        }
    }

	$(document).ready(function(){
		tooltip_set();
        $('.selectpicker').selectpicker();
        $('.selectpicker').tooltip();

        $("#more_btn").click(function(){
            $("#more_additional_fields").append(''
                +'<div class="parent_div">'
                +'  <div class="col-md-5">'
                +'      <div class="form-group">'
                +'          <input class="form-control" name="ad_field_names[]" value="" type="text" placeholder="<?php echo translate("field_name");?>" data-toggle="tooltip" title="<?php echo translate("field_name");?>">'
                +'      </div>'
                +'  </div>'
                +'  <div class="col-md-5">'
                +'        <div class="form-group">'
                +'          <input class="form-control" name="ad_field_values[]" value="" type="text" placeholder="<?php echo translate("details");?>" data-toggle="tooltip" title="<?php echo translate("details");?>">'
                +'      </div>'
                +'  </div>'
                +'  <div class="col-md-2">'
                +'      <div class="form-group">'
                +'          <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
                +'      </div>'
                +'  </div>'
                +'</div>'
            );
        });

        $(".open_modal").click(function(){
            $(".post_amount").html("<?=$upload_amount?>");
        });

        $(".post_confirm").click(function(){
            $(".post_confirm_close").click();
            $(".signup_btn").click();
        });
	});

    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.txt_editor').wysihtml5({
            toolbar: {
                "image": false // Button to insert an image.
            }
        });
    })

    function get_sub_cat(category_id) {
        ajax_load(base_url+'home/get_dropdown_by_id/sub_category/category/'+category_id+'/sub_category_name/0','post_sub_category', 'set_elements');
    }

    function delete_row(e)
    {
        $(e).parent().parent().parent().remove();
    }
</script>