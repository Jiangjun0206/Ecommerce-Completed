<?php
	foreach($user_info as $row)
	{
    ?>
        <div class="information-title" style="margin-bottom: 0px;"><?php echo translate('profile_information');?></div>
        <div class="row">
            <div class="col-md-12">
                <div class="recent-post" style="background: #fff;border: 2px solid #e0e0e0;">
                    <div class="media">
                        <a class="pull-left media-link" href="#" style="height: 124px;">
                            <div class="media-object img-bg" id="blah" style="background-image: url('<?php 
                                if(file_exists('uploads/user_image/user_'.$row['user_id'].'.jpg')){ 
                                    echo $this->crud_model->file_view('user',$row['user_id'],'100','100','no','src','','','.jpg').'?t='.time();
                                } else if(empty($row['fb_id']) !== true){ 
                                    echo 'https://graph.facebook.com/'. $row['fb_id'] .'/picture?type=large';
                                } else if(empty($row['g_id']) !== true ){
                                    echo $row['g_photo'];
                                } else {
                                    echo base_url().'uploads/user_image/default.jpg';
                                } 
                            ?>'); background-size: cover;background-position-x: center; background-position-y: top; width: 100px; height: 124px;"></div>
                            <?php
                                echo form_open(base_url() . 'home/registration/change_picture/'.$row['user_id'], array(
                                    'class' => '',
                                    'method' => 'post',
                                    'id' => 'fff',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <span id="inppic" class="set_image">
                                    <label class="" for="imgInp">
                                        <span><i class="fa fa-pencil" style="cursor: pointer;"></i></span>
                                    </label>
                                    <input type="file" style="display:none;" id="imgInp" name="img" />
                                </span>
                                <span id="savepic" style="display:none;">
                                    <span class="signup_btn" onclick="abnv('inppic'); change_state('normal');"  data-ing="<?php echo translate('saving');?>..." data-success="<?php echo translate('profile_picture_saved_successfully!'); ?>" data-unsuccessful="<?php echo translate('edit_failed!'); ?> <?php echo translate('try_again!'); ?>" data-reload="no" >
                                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>
                                    </span>
                                </span>
                            </form>
                        </a>
                        <div class="media-body" style="padding-right: 20px">
                            <table class="table table-condensed" style="font-size: 14px; margin-bottom: 0px">
                                <tr>
                                    <td><b><?php echo translate('first_name');?></b></td>
                                    <td align="left"><?php echo $row['username'];?></td>
                                    <td><b><?php echo translate('last_name');?></b></td>
                                    <td><?php echo $row['surname'];?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo translate('email');?></b></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><b><?php echo translate('contact_no');?></b></td>
                                    <td><?php echo $row['phone'];?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo translate('address');?></b></td>
                                    <td><?php echo $row['address1'];?> <?php echo $row['address2'];?></td>
                                    <td><b><?php echo translate('country');?></b></td>
                                    <td><?php echo $row['country'];?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo translate('state');?></b></td>
                                    <td><?php echo $row['state'];?></td>
                                    <td><b><?php echo translate('city');?></b></td>
                                    <td><?php echo $row['city'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="block-title"><span><?php echo translate('purchase_summary');?></span></h3>
                        <div class="widget widget-categories" style="padding-bottom:25px">
                            <ul class="profile_ul">
                                <li><a href="#"><?php echo translate('total_purchase');?>: <b><?php echo currency($this->crud_model->user_total(0)); ?></b></a></li>
                                <li><a href="#"><?php echo translate('last_7_days');?>: <b><?php echo currency($this->crud_model->user_total(7)); ?></b></a></li>
                                <li><a href="#"><?php echo translate('last_30_days');?>: <b><?php echo currency($this->crud_model->user_total(30)); ?></b></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="block-title"><span><?php echo translate('others_info');?></span></h3>
                        <div class="widget widget-categories" style="padding-bottom:25px">
                            <ul class="profile_ul">
                                <li><a href="#"><?php echo translate('wished_products');?>: <b><?php echo $this->crud_model->user_wished(); ?></b></a></li>
                                <li><a href="#"><?php echo translate('user_since');?>: <b><?php echo date('d M, Y',$row['creation_date']); ?></b></a></li>
                                <li><a href="#"><?php echo translate('last_login');?>: <b><?php echo date('d M, Y',$row['last_login']); ?></b></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                        <div class="col-md-4">
                            <h3 class="block-title"><span><?php echo translate('package_info');?></span></h3>
                            <div class="widget widget-categories" style="padding-bottom:25px">
                                <ul class="profile_ul">
                                    <li><a href="#"><?php echo translate('remaining_upload_amount');?>: <b><?php echo $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row()->product_upload; ?></b></a></li>
                                    <?php 
                                        $package_info = json_decode($row['package_info'], true);
                                    ?>
                                    <li>
                                        <a href="#">
                                            <?php echo translate('current_package');?>: <b><?php if ($row['package_info'] == "[]" || $row['package_info'] == "") { echo translate('default'); } else { echo $package_info[0]['current_package'];}?></b>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <?php echo translate('payment_type');?>: <b><?php if ($row['package_info'] == "[]" || $row['package_info'] == "") { echo translate('none'); } else { echo $package_info[0]['payment_type'];}?></b>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php
	}
?> 
<script type="text/javascript">
	function abnv(thiss){
		$('#savepic').hide();
		$('#inppic').hide();
		$('#'+thiss).show();
	}
	function change_state(va){
		$('#state').val(va);
	}

	$('.user-profile-img').on('mouseenter',function(){
		//$('.pic_changer').show('fast');
	});

	//$('.set_image').on('click',function(){
	//    $('#imgInp').click();
	//});

	$('.user-profile-img').on('mouseleave',function(){
		if($('#state').val() == 'normal'){
			//$('.pic_changer').hide('fast');
		}
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').css('backgroundImage', "url('"+e.target.result+"')");
				$('#blah').css('backgroundSize', "cover");
			}
			reader.readAsDataURL(input.files[0]);
			abnv('savepic');
			change_state('saving');
		}
	}

	$("#imgInp").change(function() {
		readURL(this);
	});
	
	
	window.addEventListener("keydown", checkKeyPressed, false);
	 
	function checkKeyPressed(e) {
		if (e.keyCode == "13") {
			$(":focus").closest('form').find('.submit_button').click();
		}
	}
</script>