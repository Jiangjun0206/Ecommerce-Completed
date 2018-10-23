<?php 
    $currency = $this->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
    $currency_symbol = $this->db->get_where('currency_settings', array('currency_settings_id' => $currency))->row()->symbol;
?>
<?php 
    $i = 0;
    foreach ($query as $row1) {
        $i++;
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td class="payment_type">
            <?="<span class='label label-primary' >".$row1['payment_type']."</span>";?>
        </td>
        <td class="amount"><?php echo $currency_symbol." ".$row1['amount']; ?></td>
        <td class="package"><?=$this->db->get_where('package',array('package_id'=>$row1['package_id']))->row()->name?></td>
        <td class="payment_date">
            <?php echo date('d/m/Y H:i A', $row1['purchase_datetime']);?>
        </td>
        
        <td class="status">
            <?php 
            if ($row1['payment_status'] == 'paid') {
               echo "<span class='label label-success' style='width:60px'>".translate($row1['payment_status'])."</span>";
            } elseif ($row1['payment_status'] == 'due') {
                    echo "<span class='label label-danger'>".translate($row1['payment_status'])."</span>";
            }elseif ($row1['payment_status'] == 'pending') {
                    echo "<span class='label label-info'>".translate($row1['payment_status'])."</span>";
            }
            ?>
            
        </td> 
        <td class="view_details">
            <?php 
                if ($row1['payment_type'] != 'Wallet') {
                ?>
                    <span class="btn btn-info btn-sm" style="cursor:pointer;" onclick="view_package_details('<?php echo base_url(); ?>home/profile/view_package_details/<?php echo $row1['package_payment_id']; ?>')" >
                        <?php echo translate('transaction_info');?>
                    </span>

                <?php        
                }
            ?>
        </td>                        
    </tr>                                      
<?php 
    }
?>


<tr class="text-center" style="display:none;" >
    <td id="pagenation_set_links" ><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>
<!--/end pagination-->


<script>
    $(document).ready(function(){ 
        product_listing_defaults();
        $('.pagination_box').html($('#pagenation_set_links').html());
    });
</script>

<script>
    function product_status(status, id, now){
        $.ajax({
            url: "<?=base_url()?>home/customer_product_status/"+status+"/"+id,
            success: function(result) {
                if (result == 'Published') {
                    $(now).parent().html("<button data-target='#product_status_modal' class='btn btn-success btn-xs publish_btn' onclick='product_status(\"ok\","+id+",this)'><i class='fa fa-check'></i> <?php echo translate('Published');?></button>");
                    notify(result,'success','bottom','right');
                } else if (result == 'Unpublished') {
                    $(now).parent().html("<button data-target='#product_status_modal' class='btn btn-danger btn-xs publish_btn' onclick='product_status(\"no\","+id+",this)'><i class='fa fa-ban'></i> <?php echo translate('Unpublished');?></button>");
                    notify(result,'danger','bottom','right');
                }
            },
            fail: function (error) {
                alert(error);
            }
        });
    }
</script>

