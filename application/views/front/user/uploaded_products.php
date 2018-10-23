							<div class="information-title">
                            	<?php echo translate('your_uploaded_products');?></div>
                            <div class="wishlist">
                                <table class="table" style="background: #fff;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo translate('image');?></th>
                                            <th><?php echo translate('name');?></th>
                                            <th><?php echo translate('price');?></th>
                                            <th width="110"><?php echo translate('availability');?></th>
                                            <th><?php echo translate('admin_status');?></th>
                                            <th><?php echo translate('publish/_unpublish');?></th>
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
                                function uploaded_products_list(page){
                                    if(page == 'no'){
                                        page = $('#page_num4').val();   
                                    } else {
                                        $('#page_num4').val(page);
                                    }
                                    var alerta = $('#result4');
                                    alerta.load('<?php echo base_url();?>home/uploaded_products_list/'+page,
                                        function(){
                                            //set_switchery();
                                        }
                                    );   
                                }
                                $(document).ready(function() {
                                    uploaded_products_list('0');
                                });

                            </script>

                            