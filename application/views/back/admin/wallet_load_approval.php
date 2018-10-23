<div>
    <?php
        echo form_open(base_url() . 'admin/wallet_load/approval_set/'.$wallet_load_id, array(
            'class' => 'form-horizontal',
            'method' => 'post',
            'id' => 'wallet_load_approval',
            'enctype' => 'multipart/form-data'
        ));
    ?>
        <div class="panel-body">
            <?php if($payment_info == '' || $payment_info == '[]'){ ?>
                <div class="form-group">
                    <!-- <label class="col-sm-2 control-label" for="demo-hor-1"> </label> -->
                    <div class="col-sm-12 text-center">
                        <h1 style="color:red;"><?php echo translate("no_payment_info_provided"); ?></h1>
                    </div>
                </div>
            <?php } else { ?>
                <div class="form-group">
                    <!-- <label class="col-sm-2 control-label" for="demo-hor-1"> </label> -->
                    <div class="col-sm-12" style="word-wrap: break-word;">
                        <?php echo str_replace("\n\r",'<br>',$payment_info); ?>
                    </div>
                </div>
                <?php /* if($status !== 'paid'){ ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="demo-hor-1"> </label>
                        <div class="col-sm-2">
                            <h4><?php echo translate('pending'); ?></h4>
                        </div>
                        <div class="col-sm-4 text-center">
                            <input id="pub_<?php echo $wallet_load_id; ?>"  data-size="switchery-lg" class='sw1 form-control' name="approval" type="checkbox" value="ok" data-id='<?php echo $wallet_load_id; ?>' <?php if($status == 'paid'){ ?>checked<?php } ?> />
                        </div>
                        <div class="col-sm-2">
                            <h4><?php echo translate('approve'); ?></h4>
                        </div>
                    </div>
                <?php } */ ?>
            <?php } ?>
        </div>
    </form>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        set_switchery();
    });


    $(document).ready(function() {
        $("form").submit(function(e){
            //return false;
        });
    });
</script>
<div id="reserve"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.enterer').hide();
    });
</script>

