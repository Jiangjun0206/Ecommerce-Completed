<div class="modal_wrap">
    <div class="row get_into" id="login">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                echo form_open(base_url() . 'home/profile/wallet/add', array(
                    'class' => 'form-login',
                    'method' => 'post',
                    'id' => 'wallet_add'
                ));
                $system_title = $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value;
                $payment_methods = array();
                $p_set = $this->db->get_where('business_settings',array('type'=>'paypal_set'))->row()->value; 
                $pum_set = $this->db->get_where('business_settings',array('type'=>'pum_set'))->row()->value; 
                $s_set = $this->db->get_where('business_settings',array('type'=>'stripe_set'))->row()->value;
                $c2_set = $this->db->get_where('business_settings',array('type'=>'c2_set'))->row()->value; 
                $vp_set = $this->db->get_where('business_settings',array('type'=>'vp_set'))->row()->value; 
                if($p_set == 'ok'){
                    $payment_methods['paypal'] = 'Paypal';
                }
                if($pum_set == 'ok'){
                    $payment_methods['pum'] = 'Pay U Money';
                }
                if($s_set == 'ok'){
                    $payment_methods['stripe']='Stripe';
            ?>                
            <script>
                $(document).ready(function(e) {
                    //<script src="https://js.stripe.com/v2/"><script>
                    //https://checkout.stripe.com/checkout.js
                    var handler = StripeCheckout.configure({
                        key: '<?php echo $this->db->get_where('business_settings' , array('type' => 'stripe_publishable'))->row()->value; ?>',
                        image: '<?php echo base_url(); ?>template/front/img/stripe.png',
                        token: function(token) {
                            // Use the token to create the charge with a server-side script.
                            // You can access the token ID with `token.id`
                            $('#wallet_add').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />");
                            notify('<?php echo translate('your_card_details_verified!'); ?>','success','bottom','right');
                            setTimeout(function(){
                                $('#wallet_add').submit();
                            }, 500);
                        }
                    });
                    
                    $('#set_method').on('change',function(){
                        //alert($(this).val());
                        if($(this).val() == 'stripe'){
                            // Open Checkout with further options
                            var total = $('#wallet_amount').val();
                            total = total.replace("<?php echo currency(); ?>", '');
                            //total = parseFloat(total.replace(",", ''));
                            total = total/parseFloat(<?php echo exchange(); ?>);
                            total = total*100;
                            handler.open({
                                name: '<?php echo $system_title; ?>',
                                description: '<?php echo translate('pay_with_stripe'); ?>',
                                amount: total
                            });
                            e.preventDefault();
                        }
                    });
                    // Close Checkout on page navigation
                    $(window).on('popstate', function() {
                        handler.close();
                    });
                });
            </script>
            <?php
                }
                if($c2_set == 'ok'){
                    //$payment_methods['c2']='Twocheckout';
                }
                if($vp_set == 'ok'){
                    //$payment_methods['vp']='VoguePay';
                }
            ?>
                <div class="row box_shape" style="box-shadow:none;">
                    <div class="title">
                        <?php echo translate('deposit_to_wallet');?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input required="" class="form-control" id="wallet_amount" type="number" name="amount" placeholder="<?php echo translate('amount');?> (<?php echo currency('','def'); ?>)">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">                        
                            <select class="selectpicker" data-live-search="true" name="method_0" data-toggle="tooltip" title="<?php echo translate('select');?>" id="set_method">
                                <option value="" >
                                    <?php echo translate('select_payment_method');?>
                                </option>
                                <?php foreach ($payment_methods as $n=>$p) { ?>
                                <option value="<?php echo str_replace(' ', '_', $n); ?>" >
                                    <?php echo $p;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type='submit' class="btn btn-theme-sm btn-block btn-theme-dark pull-right">
                            <?php echo translate('deposit');?>
                        </button>
                    </div>

                </div>
            </form>
        </div>
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
    function set_det(now){
        $('.deta').show('fast');
        var val = $(now).val();
        var text = $(now).find(':selected').data('det');
        $('#payemnt_type').html(val);
        $('.deta_text').html(text);
    }
    $(document).ready(function(){        
        $('.selectpicker').selectpicker();
    });
</script>
<style>
.g-icon-bg {
background: #ce3e26;
}
.g-bg {
background: #de4c34;
height: 37px;
margin-left: 41px;
width: 166px;
}
.modal_wrap{
    padding: 20px 0px;
}
.get_into hr {
    border: 1px solid #e8e8e8  !important;
    height: 0px !important;
    background-image: none !important;
}
.box_shape2 {
    padding: 15px;
    border: solid 1px #e9e9e9;
    background-color: #ffffff;
    margin: -25px 20px;
}
</style>