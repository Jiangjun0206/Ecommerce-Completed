<div class="row" style="margin-top: 0px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
            echo form_open(base_url() . 'home/profile/update_prod_status/'.$customer_product_id, array(
                'class' => 'form-login',
                'method' => 'post',
                'id' => 'product_status_form'
            ));
        ?>
            <div class="row" style="box-shadow:none;overflow-wrap: break-word; word-wrap: break-word;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<?php 
                		$is_sold = $this->db->get_where('customer_product', array('customer_product_id' => $customer_product_id))->row()->is_sold;
                	?>
                    <div class="form-group">
                    	<label style="float: left"><?php echo translate('availability_status');?></label>
                        <select class="form-control selectpicker" name="is_sold" data-toggle="tooltip" title="<?php echo translate('availability_status');?>">
                            <option value="no" <?php if($is_sold=='no'){echo"selected";}?>><?php echo translate('available');?></option>
                            <option value="yes" <?php if($is_sold=='yes'){echo"selected";}?>><?php echo translate('sold');?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right submit_status_form">
                        <?php echo translate('save');?>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function set_html(hide,show){
        $('#'+show).show('fast');
        $('#'+hide).hide('fast');
    }
    window.addEventListener("keydown", checkKeyPressed, false);
    function checkKeyPressed(e) {
        if (e.keyCode == "13") {
            $('.snbtn').click();
        }
    }
    function set_method(now){
        $('.meth').hide('fast');
        $('.meth').find('select').attr('name','method_1');
        var val = $(now).val();
        if(val !== ''){
            $('.'+val).show('fast');
            $('.'+val).find('select').attr('name','method');
        }
    }
    $(document).ready(function(){        
        $('.selectpicker').selectpicker();

        $(".submit_status_form").click(function(){
        	$("#product_status_form").submit();
        });
    });
</script>