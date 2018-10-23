<!--CONTENT CONTAINER-->
<?php 
		foreach($product_data as $row)
        { 
?>

<h4 class="modal-title text-center padd-all"><?php echo translate('details_of');?> <?php echo $row['title'];?></h4>
	<hr style="margin: 10px 0 !important;">
    <div class="row">
    <div class="col-md-12">
        <div class="text-center pad-all">
            <div class="col-md-4">
                <div class="col-md-12">
                    <img class="img-responsive thumbnail" alt="Profile Picture" 
                        src="<?php echo $this->crud_model->file_view('customer_product',$row['customer_product_id'],'','','thumb','src','multi','one'); ?>">
                </div>
                <div class="col-md-12">
                      <h4><?php echo translate('additional_specification');?></h4>
                    <?php 
                    $a = $this->crud_model->get_customer_additional_fields($row['customer_product_id']);
                    if(count($a)>0){
                ?>
                    <table class="table table-bordered">
                        <tbody>
                        <?php
                            foreach ($a as $val) {
                        ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $val['name']; ?></td>
                                <td style="text-align:center;"><?php echo $val['value']; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                <?php 
                    }else{
                        ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td align="center"><?php echo translate('no_specification_found!');?></td>
                                </tr>
                            </tbody>
                        </table>
                <?php
                    }
                ?>
                </div>
            </div>
            <div class="col-md-8">   
                 <div class="col-md-12" >
                    <table class="table table-striped" style="border-radius:3px;">
                        <tr>
                            <th class="custom_td"><?php echo translate('name');?></th>
                            <td class="custom_td"><?php echo $row['title']?></td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('category');?></th>
                            <td class="custom_td">
                                <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name');?>
                            </td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('sub-category');?></th>
                            <td class="custom_td">
                                <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name');?>
                            </td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('brand');?></th>
                            <td class="custom_td">
                                <?php echo $row['brand']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('seller');?></th>
                            <td class="custom_td">

                                <?php echo $this->db->get_where('user', array('user_id' => $row['added_by']))->row()->username; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('seller_email');?></th>
                            <td class="custom_td">
                                
                                <?php echo $this->db->get_where('user', array('user_id' => $row['added_by']))->row()->email; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="custom_td"><?php echo translate('phone_no');?></th>
                            <td class="custom_td">
                                
                                <?php if ($this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone){
                                    echo $this->db->get_where('user', array('user_id' => $row['added_by']))->row()->phone;
                                } else {
                                    echo translate("not_given");
                                }?>
                            </td>
                        </tr>
                       
                        <tr>
                            <th class="custom_td"><?php echo translate('sale_price');?></th>
                            <td class="custom_td"><?php echo currency('','def').' '.$this->cart->format_number($row['sale_price']); ?></td>
                        </tr>
                        
                    </table>
                 </div>
                
                <div class="col-md-12" style="text-align:justify;">
                    <h4><?php echo translate('details');?></h4>
                    <p><?php echo $row['description'];?></p>
                </div>
            </div>
            </div>
            <hr>
        </div>
    </div>
</div>				

<?php 
	}
?>
            
<style>
.custom_td{
border-left: 1px solid #ddd;
border-right: 1px solid #ddd;
border-bottom: 1px solid #ddd;
}
</style>

<script>
	$(document).ready(function(e) {
		proceed('to_list');
	});
</script>