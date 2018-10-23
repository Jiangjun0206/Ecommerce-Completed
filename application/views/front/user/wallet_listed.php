
<?php 
    $i = 0;
    foreach ($query as $row1) {
        //$det = json_decode($row1['details'],true);
        $i++;
        //var_dump($det);
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td class="price"><?php echo currency($row1['amount']); ?></td>
        <td class="description"><?php echo date('d M Y h:i:s A',$row1['timestamp']); ?></td>
        <td class="description">
            <span class="label label-<?php if($row1['status'] == 'due'){ echo 'danger'; } else if($row1['status'] == 'pending') { echo 'info'; } else if($row1['status'] == 'paid') { echo 'success'; } ?>">
                <?php echo $row1['status']; ?>
            </span>
        </td>
        <td class="total">
            <?php if($row1['status'] == 'due'){ ?>
                <span class="btn btn-danger btn-sm" style="cursor:pointer;" onclick="wallet('<?php echo base_url(); ?>home/profile/wallet/info_view/<?php echo $row1['wallet_load_id']; ?>')" >
                    <?php echo translate('provide_payment_info');?>
                </span>
            <?php } else if($row1['status'] == 'paid' || $row1['status'] == 'pending') { ?>
                <span class="btn btn-info btn-sm" style="cursor:pointer;" onclick="wallet('<?php echo base_url(); ?>home/profile/wallet/info_view/<?php echo $row1['wallet_load_id']; ?>')" >
                    <?php echo translate('transaction_info');?>
                </span>
            <?php } ?>
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