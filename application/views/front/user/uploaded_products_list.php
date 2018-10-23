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
        <td class="image">
            <a class="media-link" href="<?php echo $this->crud_model->customer_product_link($row1['customer_product_id']); ?>">
                <i class="fa fa-plus"></i>
                <img width="100" src="<?php echo $this->crud_model->file_view('customer_product',$row1['customer_product_id'],'','','thumb','src','multi','one'); ?>" alt=""/>
            </a>
        </td>
        <td class="description"><?php echo $row1['title']; ?></td>
        <td class="price"><?php echo $currency_symbol.$row1['sale_price']; ?></td>
        <td class="add">
            <?php if($row1['is_sold'] !='no'){ ?>
                <span class="label label-danger" style="margin:2px;">
                    <?php echo translate('sold'); ?>
                </span>
                <button type="button" type="button" class="btn btn-primary btn-xs pull-right open_status_modal" data-toggle="modal" data-target="#statusChange" onclick="set_status(<?=$row1['customer_product_id']?>)"><?php echo translate('edit');?></button>
            <?php } else { ?>
                <span class="label label-success">
                    <?php echo translate('available'); ?>
                </span>
                <button type="button" type="button" class="btn btn-primary btn-xs pull-right open_status_modal" data-toggle="modal" data-target="#statusChange" onclick="set_status(<?=$row1['customer_product_id']?>)"><?php echo translate('edit');?></button>
            <?php } ?>
        </td>
        <td class="add">
            <?php if($row1['admin_status'] !='ok'){ ?>
                <span class="label label-danger" style="margin:2px;">
                    <?php echo translate('unpublished'); ?>
                </span>
            <?php } else { ?>
                <span class="label label-success">
                    <?php echo translate('published'); ?>
                </span>
            <?php } ?>
        </td>
        <td class="total">
            <center class ="btn_apnd">
               <!--  <input onchange="" id="sw" class='aiz_switchery' type="checkbox" 
                       data-set='status' 
                       data-id='<?php echo $row1['customer_product_id']; ?>' 
                       data-tm='<?php echo translate('product_published'); ?>' 
                       data-fm='<?php echo translate('product_unpublished'); ?>' 
                       <?php if ($row1['status'] == 'ok') { ?>checked<?php } ?> /> -->
                        <?php if($row1['is_sold']=='no'){ if ($row1['status'] == "ok")
                        { ?>
                            <button data-target='#product_status_modal' class='btn btn-success btn-xs publish_btn' onclick='product_status("<?=$row1['status']?>",<?=$row1['customer_product_id'];?>,this)'><i class='fa fa-check'></i> <?php echo translate('Published');?></button>
                            
                    <?php   }
                        elseif($row1['status'] == "no") { ?>
                            <button data-target='#product_status_modal' class='btn btn-danger btn-xs publish_btn' onclick='product_status("<?=$row1['status']?>",<?=$row1['customer_product_id'];?>,this)' ><i class='fa fa-ban'></i> <?php echo translate('Unpublished');?></button>
                            
                        <?php } }?>
            </center>
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

    /*$(".open_status_modal").click(function(){
        // alert('here');
    });*/
    function set_status(id){
        ajax_load('<?=base_url()?>home/profile/uploaded_product_status/'+id,'content_body');
    }
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

