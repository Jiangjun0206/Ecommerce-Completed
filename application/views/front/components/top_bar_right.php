
            <ul class="list-inline">
                <?php
                    if($this->session->userdata('user_login')!='yes'){ 
                ?>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/login_set/login"> 
                        <span><?php echo translate('login');?></span>
                    </a>
                </li>
                <?php
                	if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {
				?>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/login_set/registration">
                        <span><?php echo translate('registration');?></span>
                    </a>
                </li>
                <?php
					}else{
				?>
                <li class="dropdown currency">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo translate('registration');?><i class="fa fa-angle-down"></i>
                    </a>
                	<ul role="menu" class="dropdown-menu">
                    	<li>
                            <a href="<?php echo base_url(); ?>home/login_set/registration">
                                <span><?php echo translate('customer_registration');?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/vendor_logup/registration">
                                <span><?php echo translate('vendor_registration');?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
					}
				?>
                <?php } else {  
                            if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') { ?>

                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/profile/part/wallet">
                        <i class="fa fa-money"></i> <span><?php echo translate('wallet');?><?php echo ' - '.currency($this->wallet_model->user_balance()); ?></span>
                    </a>
                </li>
                <?php } ?>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/profile/">
                        <span><?php echo translate('my_profile');?></span>
                    </a>
                </li>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/profile/part/wishlist">
                        <span><?php echo translate('wishlist');?></span>
                    </a>
                </li>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/faq">
                        <?php echo translate('faq');?>
                    </a>
                </li>
                <li class="icon-user">
                    <a href="<?php echo base_url(); ?>home/logout/">
                        <span><?php echo translate('logout');?></span>
                    </a>
                </li>
                <?php }?>
            </ul>