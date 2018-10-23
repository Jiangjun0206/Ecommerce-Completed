<div>
    <?php
        echo form_open(base_url() . 'admin', array(
            'class' => 'form-horizontal',
            'method' => 'post',
            'id' => 'package_payment_view',
            'enctype' => 'multipart/form-data'
        ));
    ?>
        <div class="panel-body">
            <?php if($package_data->payment_details == '' || $package_data->payment_details == '[]'){ ?>
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
                        <?php echo str_replace("\n\r",'<br>',$package_data->payment_details); ?>
                    </div>
                </div>
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