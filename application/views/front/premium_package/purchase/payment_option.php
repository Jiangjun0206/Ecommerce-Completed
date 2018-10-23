<script src="https://checkout.stripe.com/checkout.js"></script>
    <?php 
        $system_title = $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value;
        $total = $this->cart->total(); 
        if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') { 
            $shipping = $this->crud_model->cart_total_it('shipping'); 
        } elseif ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'fixed') { 
            $shipping = $this->crud_model->get_type_name_by_id('business_settings', '2', 'value'); 
        } 
        $tax = $this->crud_model->cart_total_it('tax'); 
        $grand = $total + $shipping + $tax; 
        //echo $grand; 
    ?>
    <?php
        $p_set = $this->db->get_where('business_settings',array('type'=>'paypal_set'))->row()->value; 
        $c_set = $this->db->get_where('business_settings',array('type'=>'cash_set'))->row()->value; 
        $s_set = $this->db->get_where('business_settings',array('type'=>'stripe_set'))->row()->value;
        $c2_set = $this->db->get_where('business_settings',array('type'=>'c2_set'))->row()->value; 
        $vp_set = $this->db->get_where('business_settings',array('type'=>'vp_set'))->row()->value; 
        $pum_set = $this->db->get_where('business_settings',array('type'=>'pum_set'))->row()->value;
        $balance = $this->wallet_model->user_balance();
        
    ?> 

<div class="row">

    <?php
        echo form_open(base_url() . 'home/premium_package/do_purchase', array(
            'class' => 'form-login',
            'id' => 'package_form',
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        if($p_set == 'ok'){ 
    ?>
    <input type="hidden" name="package_id" value="<?=$package_id?>">
    <div class="cc-selector col-sm-4">
        <input id="visa" type="radio" style="display:block;" checked name="payment_type" value="paypal"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="visa" onclick="radio_check('visa')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/paypal.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('paypal');?>" />
               
        </label>
    </div>
    <?php
        } if($s_set == 'ok'){
    ?>
    <div class="cc-selector col-sm-4">
        <input id="mastercardd" style="display:block;" type="radio" name="payment_type" value="stripe"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardd" id="customButtong" onclick="radio_check('mastercardd')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/stripe.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('stripe');?>" />
               
        </label>
    </div>
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
					$('#package_form').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />");
					if($( "#visa" ).length){
						$( "#visa" ).prop( "checked", false );
					}
					if($( "#mastercard" ).length){
						$( "#mastercard" ).prop( "checked", false );
					}
					$( "#mastercardd" ).prop( "checked", true );
					notify('<?php echo translate('your_card_details_verified!'); ?>','success','bottom','right');
					setTimeout(function(){
						$('#package_form').submit();
					}, 500);
				}
			});
	
			$('#customButtong').on('click', function(e) {
				// Open Checkout with further options
				/*var total = $('#grand').html(); 
				total = total.replace("<?php echo currency(); ?>", '');
				//total = parseFloat(total.replace(",", ''));
				total = total/parseFloat(<?php echo exchange(); ?>);
				total = total*100;*/
                var total = $("#package_amnt").val();
                total = parseFloat(total);
                total = total/parseFloat(<?php echo exchange(); ?>);
                total = total*100;
				handler.open({
					name: '<?php echo $system_title; ?>',
					description: '<?php echo translate('pay_with_stripe'); ?>',
					amount: total
				});
				e.preventDefault();
			});
	
			// Close Checkout on page navigation
			$(window).on('popstate', function() {
				handler.close();
			});
        });
    </script>
    <?php
        } if($c2_set == 'ok'){
    ?>
    <!-- <div class="cc-selector col-sm-4">
        <input id="mastercardc2" style="display:block;" type="radio" name="payment_type" value="c2"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc2" onclick="radio_check('mastercardc2')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/c2.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('cash_on_delivery');?>" />
               
        </label>
    </div> -->
    <?php
        }if($vp_set == 'ok'){
    ?>
    <!-- <div class="cc-selector col-sm-4">
        <input id="mastercardc3" style="display:block;" type="radio" name="payment_type" value="vp"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc3" onclick="radio_check('mastercardc3')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/vp.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('voguepay');?>" />
               
        </label>
    </div> -->
    <?php } ?>
    <?php 
        if($pum_set == 'ok'){
    ?>
    <div class="cc-selector col-sm-4">
        <input id="mastercard_pum" style="display:block;" type="radio" name="payment_type" value="pum"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercard_pum" onclick="radio_check('mastercard_pum')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/pum.png" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('payumoney');?>" />
               
        </label>
    </div>
    <?php
        }
    ?>
</div>
<div class="row">
    <?php 
    if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') {
        if ($this->session->userdata('user_login') == 'yes') {
    ?>
    <div class="cc-selector col-sm-4">
        <input id="mastercarddd" style="display:block;" type="radio" name="payment_type" value="wallet"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; text-align:center;" for="mastercarddd" onclick="radio_check('mastercarddd')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/wallet.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('wallet');  ?> : <?php echo currency($this->wallet_model->user_balance()); ?>" />
                <span style="position: absolute;margin-top: -8%;margin-left: -26px;color: #000000;"><?php echo currency($this->wallet_model->user_balance()); ?></span>
        </label>
    </div>
    <?php
        }
    }    
    ?>
    <div class="cc-selector col-sm-4">
    </div>
    <div class="cc-selector col-sm-4">

        <!-- <span style="width: 100%; margin-top: 52px; padding: 18px;" class="btn btn-theme logup_btn" data-unsuccessful='<?php echo translate('packege_purchase_failed!'); ?>' data-success='<?php echo translate('packege_purchase_successfully!'); ?>' data-ing='<?php echo translate('purchasing..') ?>' >
             <?php echo translate('confirm_purchase');?>
        </span> -->
        <span style="margin-top: 52px; padding: 18px;" class="btn btn-theme" onclick="package_submission();">
                <?php echo translate('confirm_purchase');?>
        </span>
        
            
    </div>
    
</div>
    
</div>
<style>
.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
 
.cc-selector input:active +.drinkcard-cc
{
	opacity: 1;
	border:4px solid #169D4B;
}
.cc-selector input:checked +.drinkcard-cc{
	-webkit-filter: none;
	-moz-filter: none;
	filter: none;
	border:4px solid black;
}
.drinkcard-cc{
	cursor:pointer;
	background-size:contain;
	background-repeat:no-repeat;
	display:inline-block;
	-webkit-transition: all 100ms ease-in;
	-moz-transition: all 100ms ease-in;
	transition: all 100ms ease-in;
	-webkit-filter:opacity(.5);
	-moz-filter:opacity(.5);
	filter:opacity(.5);
	transition: all .6s ease-in-out;
	border:4px solid transparent;
	border-radius:5px !important;
}
.drinkcard-cc:hover{
	-webkit-filter:opacity(1);
	-moz-filter: opacity(1);
	filter:opacity(1);
	transition: all .6s ease-in-out;
	border:4px solid #8400C5;
			
}

</style>

<script type="text/javascript">
    function package_submission(){
        var form = $('#package_form');
        form.submit();
    }
    function radio_check(id){
        $( "#visa" ).prop( "checked", false );
        $( "#mastercardd" ).prop( "checked", false );
        $( "#mastercard" ).prop( "checked", false );
        $( "#"+id ).prop( "checked", true );
    }
</script>