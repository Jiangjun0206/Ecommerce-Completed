
<div class="row profile">
    <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="col-md-12">
            <div class="row">
                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3" style="height:auto;">
                    <div class="media">
                        <div class="media-link">
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h1 style="text-align: center; color: white;">
                                            <?php echo currency($this->wallet_model->user_balance()); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12" style="margin-top:2px;" >
                <div class="btn btn-theme btn-theme-sm btn-block" onclick="wallet('<?php echo base_url(); ?>home/profile/wallet/add_view')">
                    <?php echo translate('deposit_to_wallet'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" id="state" value="normal" />
    </div>
    <div class="col-lg-9 col-md-9 col-sm-8">
        <div class="information-title">
            <?php echo translate('your_wallet_history');?></div>
        <div class="wallet">
            <table class="table" style="background: #fff;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo translate('amount');?></th>
                        <th><?php echo translate('time');?></th>
                        <th><?php echo translate('details');?></th>
                        <th><?php echo translate('payment_info');?></th>
                    </tr>
                </thead>
                <tbody id="result6">
                </tbody>
            </table>
        </div>

        <input type="hidden" id="page_num6" value="0" />

        <div class="pagination_box">
        </div>

        <script>                                                                    
            function wallet_listed(page){
                if(page == 'no'){
                    page = $('#page_num6').val();   
                } else {
                    $('#page_num6').val(page);
                }
                var alerta = $('#result6');
                alerta.html('<td colspan="5" align="center"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></td>');
                alerta.load('<?php echo base_url();?>home/wallet_listed/'+page,
                    function(){
                        //set_switchery();
                    }
                );   
            }
            $(document).ready(function() {
                wallet_listed('0');
            });

        </script>
    </div>
</div>