<div class="row">
    <div class="col-md-9">
        <div class="information-title">
            <?php echo translate('your_order_history');?>
        </div>
        <div class="details-wrap">                                    
            <div class="details-box orders">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo translate('date');?></th>
                            <th><?php echo translate('amount');?></th>
                            <th><?php echo translate('payment_status');?></th>
                            <th><?php echo translate('delivery_status');?></th>
                            <th><?php echo translate('invoice');?></th>
                        </tr>
                    </thead>
                    <tbody id="result2">
                    </tbody>
                </table>
            </div>
        </div>

        <input type="hidden" id="page_num2" value="0" />

        <div class="pagination_box">

        </div>
    </div>
    <div class="col-md-3">
        <div class="information-title">
            <?php echo translate('order_tracing');?>
        </div>
        <div class="details-wrap">                                    
            <div class="details-box orders">                
                <?php
                    echo form_open(base_url() . 'home/profile/order_tracing/', array(
                        'class' => 'form-login',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data'
                    ));
                ?>    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span style="width: 10%;float:left;padding-top: 3px;font-size: 25px;">#</span>
                                <input style="width: 90%;float:left;" class="form-control" name="sale_code" type="text" placeholder="<?php echo translate('sale_code');?>">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:0px;">
                            <span class="btn btn-theme btn-block signup_btn" data-callback="order_tracing" data-unsuccessful='<?php echo translate('order_tracing_unsuccessful!'); ?>' data-success='<?php echo translate('order_traced_successfully!'); ?>' data-ing='<?php echo translate('checking..') ?>' >
                                <?php echo translate('trace_my_order');?>
                            </span>
                            <div id="trace_details">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function order_listed(page){
        if(page == 'no'){
            page = $('#page_num2').val();   
        } else {
            $('#page_num2').val(page);
        }
        var alert = $('#result2');
        alert.load('<?php echo base_url();?>home/order_listed/'+page,
            function(){
                //set_switchery();
            }
        );   
    }
    $(document).ready(function() {
        order_listed('0');
    });

</script>