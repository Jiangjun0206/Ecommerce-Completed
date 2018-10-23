							<div class="information-title">
                            	<?php echo translate('package_payment_info');?></div>
                            <div class="wishlist">
                                <table class="table" style="background: #fff;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th ><?php echo translate('payment_type');?></th>
                                            <th><?php echo translate('amount');?></th>
                                            <th><?php echo translate('package');?></th>
                                             <th><?php echo translate('purchase_date');?></th>
                                            <th><?php echo translate('status');?></th>
                                            <th><?php echo translate('view_details');?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="result4">
                                    </tbody>
                                </table>
                           </div>
                                                                                                                                                                                      

                            <input type="hidden" id="page_num4" value="0" />

                            <div class="pagination_box">

                            </div>

                            <script>                                                                    
                                function package_payment_list(page){
                                    if(page == 'no'){
                                        page = $('#page_num4').val();   
                                    } else {
                                        $('#page_num4').val(page);
                                    }
                                    var alerta = $('#result4');
                                    alerta.load('<?php echo base_url();?>home/package_payment_list/'+page,
                                        function(){
                                            //set_switchery();
                                        }
                                    );   
                                }
                                $(document).ready(function() {
                                    package_payment_list('0');
                                });

                            </script>

                            