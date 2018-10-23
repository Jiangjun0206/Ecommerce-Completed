<?php
	echo $status; 
	if($status == 'done'){
?>
	<table class="table">
<?php
		foreach ($delivery_status as $row) {
			if($row['delivery_time'] == ''){
				$delivery_time = $sale_datetime;
			} else {
				$delivery_time = $row['delivery_time'];
			}
            if(isset($row['admin'])){
            	$status_updated_on = date('d m, Y h:i:s A',$delivery_time);
            	$from = $this->crud_model->provider_detail('admin','','with_link');
            	$delivery_status_p = $row['status'];
            	$delivery_status_c = '('.$row['comment'].')';
			} else {
            	$status_updated_on = date('d m, Y h:i:s A',$delivery_time);
            	$from = $this->crud_model->provider_detail('vendor',$row['vendor'],'with_link');
            	$delivery_status_p = $row['status'];
            	$delivery_status_c = '('.$row['comment'].')';
			}
?>
		<tr>
			<td>
				<b><?php echo translate('order_from'); ?> : </b> <?php echo $from; ?><br><br>
				<b><?php echo translate('delivery_status'); ?> : </b> <?php echo translate($delivery_status_p); ?> <?php echo $delivery_status_c; ?><br><br>
				<b><?php echo translate('status_updated_on'); ?> : </b> <?php echo $status_updated_on; ?>
			</td>
		</tr>

<?php
		}
?>
	</table>	
<?php
	} else {
		echo translate('wrong_order_id!');
	}
?>