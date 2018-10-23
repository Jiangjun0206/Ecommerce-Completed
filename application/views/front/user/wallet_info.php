<div class="modal_wrap">
    <div class="row get_into" id="login">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                echo form_open(base_url() . 'home/profile/wallet/set_info/'.$id, array(
                    'class' => 'form-login',
                    'method' => 'post',
                    'id' => 'wallet_add'
                ));
            ?>
                <div class="row box_shape" style="box-shadow:none;overflow-wrap: break-word; word-wrap: break-word;">

                    <?php if($det['status'] == 'due'){ ?>
                        <div class="title">
                            <?php echo translate('provide_payment_info');?>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" name="payment_info" style="height:200px;" placeholder="<?php echo translate('payment_info');?>"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right info_add_btn snbtn">
                                <?php echo translate('save');?>
                            </span>
                        </div>
                    <?php } else if($det['status'] == 'paid' || $det['status'] == 'pending') { ?>
                        <div class="title">
                            <?php echo translate('transaction_info');?>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group" style="overflow-wrap: break-word; word-wrap: break-word;">
                                <?php echo $payment_info; ?>
                            </div>
                        </div>                        
                    <?php } ?>

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