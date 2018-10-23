<?php
    foreach ($details as $row) {
?>
<div>
    <?php
        echo form_open(base_url() . 'vendor/admin_payments/'.$row['vendor_invoice_id'], array(
            'class' => 'form-horizontal',
            'method' => 'post',
            'id' => 'admin_payments_view',
            'enctype' => 'multipart/form-data'
        ));
    ?>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td><?php echo translate('method');?></td>
                        <td>
                            <?php
                                if($row['method'] == 'c2'){
                                    echo 'Twocheckout';
                                }else{
                                    echo $row['method'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo translate('amount');?></td>
                        <td><?php echo currency('','def').$row['amount']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo translate('datetime');?> </td>
                        <td><?php echo date('d M,Y',$row['timestamp']); ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo translate('details');?></td>
                        <td><?php echo $row['payment_details']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo translate('status');?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
<div id="reserve"></div>
<?php
    }
?>

