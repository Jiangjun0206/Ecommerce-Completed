<?php
    foreach($product_bundle_data as $row){
?>
<div class="row">
    <div class="col-md-12">
        <?php
            echo form_open(base_url() . 'admin/product_bundle/update/'. $row['product_id'], array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => 'product_bundle_edit',
                'enctype' => 'multipart/form-data'
            ));
        ?>
            <!--Panel heading-->
            <div class="panel-heading">
                <div class="panel-control" style="float: left;">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#bundle_details"><?php echo translate('bundle_details'); ?></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#business_details"><?php echo translate('business_details'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-base">
                    <!--Tabs Content-->                    
                    <div class="tab-content">
                        <div id="bundle_details" class="tab-pane fade active in">
        
                            <div class="form-group btm_border">
                                <h4 class="text-thin text-center"><?php echo translate('bundle_details'); ?></h4>                            
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('bundle_title');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" id="demo-hor-1" value="<?=$row['title']?>" placeholder="<?php echo translate('bundle_title');?>" class="form-control required">
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"></label>
                                <div class="col-sm-6">
                                    <h4 class="pull-left">
                                        <i><?php echo translate('add_products_from_here');?></i>
                                    </h4>
                                    <div id="more_btn" class="btn btn-mint btn-labeled fa fa-plus pull-right">
                                    <?php echo translate('add_more_products');?></div>
                                </div>
                            </div>
                            <?php
                                $all_products = json_decode($row['products'],true);
                                $r = 0;
                                if(!empty($all_products)){
                                    foreach($all_products as $i=>$product){
                                        $r = 1;
                                        $category_id = $this->crud_model->get_type_name_by_id('product',$product['product_id'],'category');
                                        $sub_category_id = $this->crud_model->get_type_name_by_id('product',$product['product_id'],'sub_category');
                                        $brand_id = $this->crud_model->get_type_name_by_id('product',$product['product_id'],'brand');

                            ?>
                            <div class="form-group btm_border" data-no="<?php echo $product['product_no']; ?>">
                                <span class="col-md-12" style="text-align: right; margin-bottom: 5px">
                                    <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>
                                </span>
                                <div class="col-sm-3" id="quant<?php echo $product['product_no']; ?>">
                                    <input type="hidden" class="product_no" name="product_no[]" value="<?php echo $product['product_no']; ?>">
                                    <label class="col-sm-5 control-label" for=""><?php echo translate('quantity');?></label>
                                    <div class="col-sm-7">
                                        <input class="form-control required" type="number" name="quantity[]" placeholder="quantity" value="<?php echo $product['quantity']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-5 control-label" for="demo-hor-2"><?php echo translate('category');?></label>
                                    <div class="col-sm-7" id="cat<?php echo $product['product_no']; ?>">
                                        <?php echo $this->crud_model->select_html('category','category[]','category_name','edit','demo-chosen-select required', $category_id,'digital',NULL,'get_cat'); ?>
                                        <input type="hidden" class="this_row" value="<?php echo $product['product_no']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3" id="sub<?php echo $product['product_no']; ?>">
                                    <label class="col-sm-5 control-label" for=""><?php echo translate('sub-category');?></label>
                                    <div class="col-sm-7" id="sub_cat<?php echo $product['product_no']; ?>">
                                        <?php echo $this->crud_model->select_html('sub_category','sub_category[]','sub_category_name','edit','demo-chosen-select required',$sub_category_id,'category',$category_id,'get_brnd'); ?>
                                    </div>
                                    <input type="hidden" class="this_sub_row" value="<?php echo $product['product_no']; ?>">
                                </div>
                                <div class="col-sm-3" id="brn<?php echo $product['product_no']; ?>">
                                    <label class="col-sm-5 control-label" for=""><?php echo translate('brand');?></label>
                                    <div class="col-sm-7" id="brand<?php echo $product['product_no']; ?>">
                                        <?php 
                                        $brands=json_decode($this->crud_model->get_type_name_by_id('sub_category',$sub_category_id,'brand'),true);
                                        if(count($brands)>0){
                                          echo $this->crud_model->select_html('brand','brand[]','name','edit','demo-chosen-select required',$brand_id,'brand_id',$brands,'get_prod','multi','none'); 
                                        }else{
                                            echo translate("No brands are available for this sub category");
                                        }
                                    ?>
                                    </div>
                                    <input type="hidden" class="this_brnd_row" value="<?php echo $product['product_no']; ?>">
                                </div>
                                <div class="col-sm-3" id="prod<?php echo $product['product_no']; ?>">
                                    <label class="col-sm-5 control-label" for=""><?php echo translate('product');?></label>
                                    <div class="col-sm-7" id="product<?php echo $product['product_no']; ?>">
                                        <?php
                                            $products = $this->db->get_where('product', array('brand' => $brand_id))->row()->product_id;
                                            if(empty($products)){
                                                echo translate("<p class='control-label'>No Products are available for this brand</p>");
                                            } else {
                                                echo $this->crud_model->select_html('product', 'product[]', 'title', 'edit', 'demo-chosen-select required', $product['product_id'], 'brand', $brand_id, '');
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                            <div id="more_additional_fields"></div>                          
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('unit');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="unit" id="demo-hor-5" value="<?=$row['unit']?>" placeholder="<?php echo translate('unit_(e.g._kg,_pc_etc.)'); ?>" class="form-control unit required">
                                </div>
                            </div>              
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-11"><?php echo translate('tags');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="tag" data-role="tagsinput" value="<?=$row['tag']?>" placeholder="<?php echo translate('tags');?>" class="form-control">
                                </div>
                            </div>
                                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo translate('images');?></label>
                                <div class="col-sm-6">
                                    <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                        <input type="file" multiple name="images[]" onchange="preview(this);" id="demo-hor-inputpass" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImg" ></span>
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13"></label>
                                <div class="col-sm-6">
                                    <?php 
                                        $images = $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','all');
                                        if($images){
                                            foreach ($images as $row1){
                                                $a = explode('.', $row1);
                                                $a = $a[(count($a)-2)];
                                                $a = explode('_', $a);
                                                $p = $a[(count($a)-2)];
                                                $i = $a[(count($a)-3)];
                                    ?>
                                        <div class="delete-div-wrap">
                                            <span class="close">&times;</span>
                                            <div class="inner-div">
                                                <img class="img-responsive" width="100" src="<?php echo $row1; ?>" data-id="<?php echo $i.'_'.$p; ?>" alt="User_Image" >
                                            </div>
                                        </div>
                                    <?php 
                                            }
                                        } 
                                    ?>
                                </div>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13"><?php echo translate('description'); ?></label>
                                <div class="col-sm-6">
                                    <textarea rows="9"  class="summernotes" data-height="200" data-name="description"><?=$row['description']; ?></textarea>
                                </div>
                            </div>                            
                        </div>
                        <div id="business_details" class="tab-pane fade">
                            <div class="form-group btm_border">
                                <h4 class="text-thin text-center"><?php echo translate('business_details'); ?></h4>                            
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-6"><?php echo translate('sale_price');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="sale_price" id="demo-hor-6" min='0' step='.01' value="<?=$row['sale_price']; ?>" placeholder="<?php echo translate('sale_price');?>" class="form-control required">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set">/<?php echo $row['unit']; ?></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-7"><?php echo translate('purchase_price');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="purchase_price" id="demo-hor-7" min='0' step='.01' value="<?=$row['purchase_price']; ?>" placeholder="<?php echo translate('purchase_price');?>" class="form-control required">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set">/<?php echo $row['unit']; ?></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-8"><?php echo translate('shipping_cost');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="shipping_cost" id="demo-hor-8" min='0' step='.01' value="<?=$row['shipping_cost']; ?>" placeholder="<?php echo translate('shipping_cost');?>" class="form-control">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set">/<?php echo $row['unit']; ?></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-9"><?php echo translate('bundle_tax');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="tax" id="demo-hor-9" min='0' step='.01' value="<?=$row['tax']; ?>" placeholder="<?php echo translate('bundle_tax');?>" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <select class="demo-chosen-select" name="tax_type">
                                        <option value="percent" <?php if($row['tax_type'] == 'percent'){ echo 'selected'; } ?> >%</option>
                                        <option value="amount" <?php if($row['tax_type'] == 'amount'){ echo 'selected'; } ?> >$</option>
                                    </select>
                                </div>
                                <span class="btn unit_set">/<?php echo $row['unit']; ?></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-10"><?php echo translate('bundle_discount');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="discount" id="demo-hor-10" min='0' step='.01' value="<?=$row['discount']; ?>" placeholder="<?php echo translate('bundle_discount');?>" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <select class="demo-chosen-select" name="discount_type">
                                        <option value="percent" <?php if($row['discount_type'] == 'percent'){ echo 'selected'; } ?> >%</option>
                                        <option value="amount" <?php if($row['discount_type'] == 'amount'){ echo 'selected'; } ?> >$</option>
                                    </select>
                                </div>
                                <span class="btn unit_set">/<?php echo $row['unit']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="btn btn-purple btn-labeled fa fa-hand-o-right pull-right" onclick="next_tab()"><?php echo translate('next'); ?></span>
                <span class="btn btn-purple btn-labeled fa fa-hand-o-left pull-right" onclick="previous_tab()"><?php echo translate('previous'); ?></span>
        
            </div>
    
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-11">
                        <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" 
                            onclick="ajax_set_full('edit','<?php echo translate('edit_product_bundle'); ?>','<?php echo translate('successfully_edited!'); ?>','product_bundle_edit','<?php echo $row['product_id']; ?>') "><?php echo translate('reset');?>
                        </span>
                     </div>
                     <div class="col-md-1">
                        <span class="btn btn-success btn-md btn-labeled fa fa-wrench pull-right enterer" onclick="form_submit('product_bundle_edit','<?php echo translate('successfully_edited!'); ?>');proceed('to_add');" ><?php echo translate('edit');?></span> 
                     </div>
                </div>
            </div>
    
        </form>
    </div>
</div>
<?php
    }
?>

<script src="<?php $this->benchmark->mark_time(); echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>

<input type="hidden" id="option_count" value="<?php if($r == 1){ echo $product['product_no']; } else { echo '0'; } ?>">

<script>
    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $("#previewImg").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });
        }
    }

    $('.delete-div-wrap .close').on('click', function() { 
        var pid = $(this).closest('.delete-div-wrap').find('img').data('id'); 
        var here = $(this); 
        msg = 'Really want to delete this Image?'; 
        bootbox.confirm(msg, function(result) {
            if (result) { 
                 $.ajax({ 
                    url: base_url+''+user_type+'/'+module+'/dlt_img/'+pid, 
                    cache: false, 
                    success: function(data) { 
                        $.activeitNoty({ 
                            type: 'success', 
                            icon : 'fa fa-check', 
                            message : 'Deleted Successfully', 
                            container : 'floating', 
                            timer : 3000 
                        }); 
                        here.closest('.delete-div-wrap').remove(); 
                    } 
                }); 
            }else{ 
                $.activeitNoty({ 
                    type: 'danger', 
                    icon : 'fa fa-minus', 
                    message : 'Cancelled', 
                    container : 'floating', 
                    timer : 3000 
                }); 
            }; 
          }); 
        });

    function other_forms(){}
    
    function set_summer(){
        $('.summernotes').each(function() {
            var now = $(this);
            var h = now.data('height');
            var n = now.data('name');
            if(now.closest('div').find('.val').length == 0){
                now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
            }
            now.summernote({
                height: h,
                onChange: function() {
                    now.closest('div').find('.val').val(now.code());
                }
            });
            now.closest('div').find('.val').val(now.code());
        });
    }

    function option_count(type){
        var count = $('#option_count').val();
        if(type == 'add'){
            count++;
        }
        if(type == 'reduce'){
            count--;
        }
        $('#option_count').val(count);
    }

    function set_select(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    }
    
    $(document).ready(function() {
        set_select();
        set_summer();
    });

    function other(){
        set_select();
        $('#sub').show('slow');
    }
    function get_cat(id,now){
        var co = $(now).closest('div').find('.this_row').val();
        $('#sub'+co).hide('slow');
        $('#brn'+co).hide('slow');
        $('#prod'+co).hide('slow');
        ajax_load(base_url+'admin/product_bundle/sub_by_cat/'+id,'sub_cat'+co,'other');
        $('#sub'+co).show('slow');
    }
    function get_brnd(id,now){
        var co = $(now).parent().next('.this_sub_row').val();
        $('#brn'+co).hide('slow');
        $('#prod'+co).hide('slow');
        ajax_load(base_url+'admin/product_bundle/brand_by_sub/'+id,'brand'+co,'other');
        $('#brn'+co).show('slow');
    }
    function get_prod(id,now){
        var co = $(now).parent().next('.this_brnd_row').val();
        var cat = $('#cat'+co).find('select').val();
        var sub_cat = $('#sub_cat'+co).find('select').val();
        $('#prod'+co).hide('slow');
        ajax_load(base_url+'admin/product_bundle/prod_by_brand/'+id+'/'+sub_cat+'/'+cat,'product'+co,'other');
        $('#prod'+co).show('slow');
    }
    function get_sub_res(id){}

    $(".unit").on('keyup',function(){
        $(".unit_set").html($(".unit").val());
    });

    $("#more_btn").click(function(){
        option_count('add');
        var co = $('#option_count').val();
        $("#more_additional_fields").append(''
            +'<div class="form-group btm_border">'
            +'    <span class="col-md-12" style="text-align: right; margin-bottom: 5px">'
            +'        <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>'
            +'    </span>'
            +'    <div class="col-sm-3" id="quant'+co+'">'
            +'        <input type="hidden" class="product_no" name="product_no[]" value="'+co+'">'
            +'        <label class="col-sm-5 control-label" for=""><?php echo translate('quantity');?></label>'
            +'        <div class="col-sm-7">'
            +'            <input class="form-control required" type="number" name="quantity[]" placeholder="quantity" value="1">'
            +'        </div>'
            +'    </div>'
            +'    <div class="col-sm-3">'
            +'        <label class="col-sm-5 control-label" for=""><?php echo translate('category');?></label>'
            +'        <div class="col-sm-7" id="cat'+co+'">'
            +'            <?php echo $this->crud_model->select_html('category','category[]','category_name','add','demo-chosen-select required','','digital',NULL,'get_cat'); ?>'
            +'            <input type="hidden" class="this_row" value="'+co+'">'
            +'        </div>'
            +'    </div>'
            +'    <div class="col-sm-3" id="sub'+co+'" style="display:none;">'
            +'        <label class="col-sm-5 control-label" for=""><?php echo translate('sub-category');?></label>'
            +'        <div class="col-sm-7" id="sub_cat'+co+'">'
            +'        </div>'
            +'        <input type="hidden" class="this_sub_row" value="'+co+'">'
            +'    </div>'
            +'    <div class="col-sm-3" id="brn'+co+'" style="display:none;">'
            +'        <label class="col-sm-5 control-label" for=""><?php echo translate('brand');?></label>'
            +'        <div class="col-sm-7" id="brand'+co+'">'
            +'        </div>'
            +'        <input type="hidden" class="this_brnd_row" value="'+co+'">'
            +'    </div>'
            +'    <div class="col-sm-3" id="prod'+co+'" style="display:none;">'
            +'        <label class="col-sm-5 control-label" for=""><?php echo translate('product');?></label>'
            +'        <div class="col-sm-7" id="product'+co+'">'
            +'        </div>'
            +'    </div>'
            +'</div> '
        );
        set_select();
    });
    
    function next_tab(){
        $('.nav-tabs li.active').next().find('a').click();                    
    }
    function previous_tab(){
        $('.nav-tabs li.active').prev().find('a').click();                     
    }

    $('body').on('click', '.rmo', function(){
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.rmon', function(){
        var co = $(this).closest('.form-group').data('no');
        $(this).parent().parent().remove();
        if($(this).parent().parent().parent().html() == ''){
            $(this).parent().parent().parent().html(''
                +'   <input type="hidden" name="op_set'+co+'[]" value="none" >'
            );
        }
    });

    $('body').on('click', '.rms', function(){
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.rmc', function(){
        $(this).parent().parent().remove();
    });


    $(document).ready(function() {
        $("form").submit(function(e){
            event.preventDefault();
        });
    });
</script>

<style>
    .btm_border{
        border-bottom: 1px solid #ebebeb;
        padding-bottom: 15px;   
    }
</style>


<!--Bootstrap Tags Input [ OPTIONAL ]-->