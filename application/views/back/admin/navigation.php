<?php
$physical_check = $this->crud_model->get_type_name_by_id('general_settings','68','value');
$digital_check = $this->crud_model->get_type_name_by_id('general_settings','69','value');
$bundle_check = $this->crud_model->get_type_name_by_id('general_settings','82','value');
$customer_product_check = $this->crud_model->get_type_name_by_id('general_settings','83','value');
?>
<nav id="mainnav-container">
    <div id="mainnav">
        <!--Menu-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content" style="overflow-x:auto;">
                    <ul id="mainnav-menu" class="list-group">
                        <!--Category name-->
                        <li class="list-header"></li>
                        <!--Menu list item-->
                        <li <?php if($page_name=="dashboard"){?> class="active-link" <?php } ?> 
                        	style="border-top:1px solid rgba(69, 74, 84, 0.7);">
                            <a href="<?php echo base_url(); ?>admin/">
                                <i class="fa fa-tachometer"></i>
                                <span class="menu-title">
									<?php echo translate('dashboard');?>
                                </span>
                            </a>
                        </li>
                        <?php
						if($physical_check == 'ok' && $digital_check == 'ok'){
							if($this->crud_model->admin_permission('category') ||
                                    $this->crud_model->admin_permission('sub_category') ||
										$this->crud_model->admin_permission('brand') || 
                                        	$this->crud_model->admin_permission('product') || 
                                            	$this->crud_model->admin_permission('stock') ||
                                                    $this->crud_model->admin_permission('product_bundle') ||
													   $this->crud_model->admin_permission('category_digital') ||
                                    					   $this->crud_model->admin_permission('sub_category_digital') ||
                                        					       $this->crud_model->admin_permission('digital') ){
						?>
                        <li <?php if($page_name=="category" || 
                                        $page_name=="sub_category" || 
                                            $page_name=="product" || 
                                                $page_name=="stock" ||
                                                    $page_name=="product_bundle" ||
													    $page_name=="category_digital" || 
                                        				    $page_name=="sub_category_digital"||
                                           					        $page_name=="digital" ){?>
                                                     			class="active-sub" 
                                                       				<?php } ?> >
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                    <span class="menu-title">
                                        <?php echo translate('products');?>
                                    </span>
                                	<i class="fa arrow"></i>
                            </a>
            
                            <!--PRODUCT------------------>
                            <ul class="collapse <?php if($page_name=="category" || 
                                                            $page_name=="sub_category" ||  
                                                                $page_name=="product" || 
                                                                    $page_name=="brand" ||
                                                                        $page_name=="stock" ||
                                                                            $page_name=="product_bundle" ||
                                                                                $page_name=="category_digital" || 
                                                                                    $page_name=="sub_category_digital" ||
                                                                                        
                                                                                            $page_name=="digital" ){?>
                                                                             		in
                                                                                		<?php } ?> >" >
							<?php
                                if($this->crud_model->admin_permission('category') ||
                                    $this->crud_model->admin_permission('sub_category') ||
										$this->crud_model->admin_permission('brand') || 
                                            $this->crud_model->admin_permission('product') || 
                                                $this->crud_model->admin_permission('stock') ||
                                                    $this->crud_model->admin_permission('product_bundle')){
                            ?>
                            <!--Menu list item-->
                                <li <?php if($page_name=="category" || 
                                                $page_name=="sub_category" || 
													$page_name=="brand" ||
                                                    $page_name=="product" || 
                                                        $page_name=="stock" ||
                                                            $page_name=="product_bundle"){?>
                                                             class="active-sub" 
                                                                <?php } ?> >
                                    <a href="#">
                                        <i class="fa fa-list"></i>
                                            <span class="menu-title">
                                                <?php echo translate('physical_products');?>
                                            </span>
                                            <i class="fa arrow"></i>
                                    </a>
                    
                                    <!--PRODUCT------------------>
                                    <ul class="collapse <?php if($page_name=="category" || 
                                                                    $page_name=="sub_category" ||  
                                                                        $page_name=="product" || 
                                                                            $page_name=="brand" ||
                                                                                $page_name=="stock" ||
                                                                                    $page_name=="product_bundle"){?>
                                                                                     in
                                                                                        <?php } ?> " >
                                        
                                        <?php
                                            if($this->crud_model->admin_permission('category')){
                                        ?>                                            
                                            <li <?php if($page_name=="category"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/category">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('category');?>
                                                </a>
                                            </li>
										<?php
                                        	} if($this->crud_model->admin_permission('brand')){
                                        ?>
                                            <li <?php if($page_name=="brand"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/brand">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('brands');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('sub_category')){
                                        ?>
                                            <li <?php if($page_name=="sub_category"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/sub_category">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('sub-category');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('product')){
                                        ?>
                                            <li <?php if($page_name=="product"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/product">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('all_products');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('stock')){
                                        ?>
                                            <li <?php if($page_name=="stock"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/stock">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('product_stock');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('product_bundle') && $bundle_check == 'ok'){
                                        ?>
                                            <li <?php if($page_name=="product_bundle"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/product_bundle">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('product_bundle');?>
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                          
                            <?php
                                }
                            ?>
                            
                            <?php
                                if($this->crud_model->admin_permission('category_digital') ||
                                    $this->crud_model->admin_permission('sub_category_digital') || 
                                            $this->crud_model->admin_permission('digital') ){
                            ?>
                            <!--Menu list item-->
                                <li <?php if($page_name=="category_digital" || 
                                                $page_name=="sub_category_digital" ||
                                                     
                                                        $page_name=="digital" ){?>
                                                             class="active-sub" 
                                                                <?php } ?> >
                                    <a href="#">
                                        <i class="fa fa-list-ul"></i>
                                            <span class="menu-title">
                                                <?php echo translate('digital_products');?>
                                            </span>
                                            <i class="fa arrow"></i>
                                    </a>
                                    <!--digital------------------>
                                    <ul class="collapse <?php if($page_name=="category_digital" || 
                                                                    $page_name=="sub_category_digital" ||
                                                                          
                                                                            $page_name=="digital" ){?>
                                                                                     in
                                                                                        <?php } ?> >" >
                                        
                                        <?php
                                            if($this->crud_model->admin_permission('category')){
                                        ?>                                            
                                            <li <?php if($page_name=="category_digital"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/category_digital">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('category');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('sub_category')){
                                        ?>
                                            <li <?php if($page_name=="sub_category_digital"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/sub_category_digital">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('sub-category');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('digital')){
                                        ?>
                                            <li <?php if($page_name=="digital"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/digital">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('all_digitals');?>
                                                </a>
                                            </li>
                                        <?php
                                            } ?>
                                    </ul>
                                </li>
                          
                            <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <?php
							}
						}
						?>
                        <?php
						if($physical_check == 'ok' && $digital_check !== 'ok'){
							if($this->crud_model->admin_permission('category') ||
								$this->crud_model->admin_permission('sub_category') ||
									$this->crud_model->admin_permission('brand') || 
									$this->crud_model->admin_permission('product') || 
										$this->crud_model->admin_permission('product_bundle') ||
                                        $this->crud_model->admin_permission('stock') ){
						?>
						<!--Menu list item-->
							<li <?php if($page_name=="category" || 
											$page_name=="sub_category" || 
												$page_name=="brand" ||
                                                $page_name=="product" || 
												    $page_name=="product_bundle" || 
													$page_name=="stock" ){?>
														 class="active-sub" 
															<?php } ?> >
								<a href="#">
									<i class="fa fa-list"></i>
										<span class="menu-title">
											<?php echo translate('products');?>
										</span>
										<i class="fa arrow"></i>
								</a>
				
								<!--PRODUCT------------------>
								<ul class="collapse <?php if($page_name=="category" || 
																$page_name=="sub_category" ||  
																	$page_name=="product" || 
																		$page_name=="brand" ||
                                                                            $page_name=="product_bundle" ||
																			$page_name=="stock" ){?>
																				 in
																					<?php } ?> " >
									
									<?php
										if($this->crud_model->admin_permission('category')){
									?>                                            
										<li <?php if($page_name=="category"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/category">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('category');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('brand')){
									?>
										<li <?php if($page_name=="brand"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/brand">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('brands');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('sub_category')){
									?>
										<li <?php if($page_name=="sub_category"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/sub_category">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('sub-category');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('product')){
									?>
										<li <?php if($page_name=="product"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/product">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('all_products');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('product_bundle') && $bundle_check == 'ok'){
                                        ?>
                                            <li <?php if($page_name=="product_bundle"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/product_bundle">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('product_bundle');?>
                                                </a>
                                            </li>
                                        <?php
                                            } if($this->crud_model->admin_permission('stock')){
									?>
										<li <?php if($page_name=="stock"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/stock">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('product_stock');?>
											</a>
										</li>
									<?php
										}
									?>
								</ul>
							</li>
					  
						<?php
							}
						}
						?>
                        <?php
						if($physical_check !== 'ok' && $digital_check == 'ok'){
							if($this->crud_model->admin_permission('category_digital') ||
								$this->crud_model->admin_permission('sub_category_digital') || 
									$this->crud_model->admin_permission('digital') ){
						?>
						<!--Menu list item-->
							<li <?php if($page_name=="category_digital" || 
											$page_name=="sub_category_digital" || 
												$page_name=="digital" ){?>
														 class="active-sub" 
															<?php } ?> >
								<a href="#">
									<i class="fa fa-list-ul"></i>
										<span class="menu-title">
											<?php echo translate('products');?>
										</span>
										<i class="fa arrow"></i>
								</a>
								<!--digital------------------>
								<ul class="collapse <?php if($page_name=="category_digital" || 
																$page_name=="sub_category_digital" ||  
																	$page_name=="digital" ){?>
																				 in
																					<?php } ?> >" >
									
									<?php
										if($this->crud_model->admin_permission('category')){
									?>                                            
										<li <?php if($page_name=="category_digital"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/category_digital">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('category');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('sub_category')){
									?>
										<li <?php if($page_name=="sub_category_digital"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/sub_category_digital">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('sub-category');?>
											</a>
										</li>
									<?php
										} if($this->crud_model->admin_permission('digital')){
									?>
										<li <?php if($page_name=="digital"){?> class="active-link" <?php } ?> >
											<a href="<?php echo base_url(); ?>admin/digital">
												<i class="fa fa-circle fs_i"></i>
													<?php echo translate('all_products');?>
											</a>
										</li>
									<?php
										}
									?>
								</ul>
							</li>
					  
						<?php
							}
						}
						?>
                        <!--SALE-------------------->
                        <?php
                            if($this->crud_model->admin_permission('customer_products') && $customer_product_check == 'ok'){
                        ?>
                        <li <?php if($page_name=="customer_products"){?> class="active-link" <?php } ?>>
                            <a href="<?php echo base_url(); ?>admin/customer_products/">
                                <i class="fa fa-shopping-cart"></i>
                                    <span class="menu-title">
                                        <?php echo translate('classified_products');?>
                                    </span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('delete_all_categories') ||
                                $this->crud_model->admin_permission('delete_all_products') || 
                                        $this->crud_model->admin_permission('delete_all_brands') ||
                                            $this->crud_model->admin_permission('delete_all_classified') ){
                        ?>
                        <!--Menu list item-->
                            <li <?php if($page_name=="delete_all_categories" || 
                                            $page_name=="delete_all_products" ||
                                                $page_name=="delete_all_brands" ||
                                                    $page_name=="delete_all_classified"){?>
                                                         class="active-sub" 
                                                            <?php } ?> >
                                <a href="#">
                                    <i class="fa fa-trash"></i>
                                        <span class="menu-title">
                                            <?php echo translate('delete_contents');?>
                                        </span>
                                        <i class="fa arrow"></i>
                                </a>
                                <!--digital------------------>
                                <ul class="collapse <?php if($page_name=="delete_all_categories" || 
                                                                $page_name=="delete_all_products" ||
                                                                    $page_name=="delete_all_brands" ||
                                                                        $page_name=="delete_all_classified"){?>
                                                                                 in
                                                                                    <?php } ?> >" >
                                    
                                    <?php
                                        if($this->crud_model->admin_permission('category')){
                                    ?>                                            
                                        <li <?php if($page_name=="delete_all_categories"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/delete_all_categories">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('delete_all_categories');?>
                                            </a>
                                        </li>
                                    <?php
                                        } if($this->crud_model->admin_permission('sub_category')){
                                    ?>
                                        <li <?php if($page_name=="delete_all_products"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/delete_all_products">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('delete_all_products');?>
                                            </a>
                                        </li>
                                    <?php
                                        } if($this->crud_model->admin_permission('delete_all_brands')){
                                    ?>
                                        <li <?php if($page_name=="delete_all_brands"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/delete_all_brands">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('delete_all_brands');?>
                                            </a>
                                        </li>
                                    <?php
                                        } if($this->crud_model->admin_permission('delete_all_classified')){
                                    ?>
                                        <li <?php if($page_name=="delete_all_classified"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/delete_all_classified">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('delete_all_classified');?>
                                            </a>
                                        </li>
                                    <?php
                                        } ?>
                                </ul>
                            </li>
                      
                        <?php
                            }
                        ?> 
                        <?php
                            if($this->crud_model->admin_permission('package_payment') && $customer_product_check == 'ok'){
                        ?>
                        <li <?php if($page_name=="package_payment"){?> class="active-link" <?php } ?>>
                            <a href="<?php echo base_url(); ?>admin/package_payment/">
                                <i class="fa fa-gift"></i>
                                    <span class="menu-title">
                                        <?php echo translate('customer_package_payments');?>
                                    </span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
						<?php
							if($this->crud_model->admin_permission('sale')){
						?>
                        <li <?php if($page_name=="sales"){?> class="active-link" <?php } ?>>
                            <a href="<?php echo base_url(); ?>admin/sales/">
                                <i class="fa fa-usd"></i>
                                    <span class="menu-title">
                                		<?php echo translate('sale');?>
                                    </span>
                            </a>
                        </li>
                        <?php
							}
						?>
                        <?php
                            if($this->crud_model->admin_permission('coupon')){
                        ?>
                        <li <?php if($page_name=="coupon"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>admin/coupon/">
                                <i class="fa fa-tag"></i>
                                    <span class="menu-title">
                                        <?php echo translate('discount_coupon');?>
                                    </span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
							if($this->crud_model->admin_permission('ticket')){
						?>
                        <li <?php if($page_name=="ticket"){?> class="active-link" <?php } ?>>
                            <a href="<?php echo base_url(); ?>admin/ticket/">
                                <i class="fa fa-life-ring"></i>
                                    <span class="menu-title">
                                		<?php echo translate('ticket');?>
                                    </span>
                            </a>
                        </li>
                        <?php
							}
						?>
                        <?php
							if($this->crud_model->admin_permission('report')){
						?>
                        <li <?php if($page_name=="report" || 
                                        $page_name=="report_stock" ||
                                            $page_name=="report_wish" ){?>
                                                     class="active-sub" 
                                                        <?php } ?>>
                            <a href="#">
                                <i class="fa fa-file-text"></i>
                                    <span class="menu-title">
                                		<?php echo translate('reports');?>
                                    </span>
                                		<i class="fa arrow"></i>
                            </a>
                            
                            <!--REPORT-------------------->
                            <ul class="collapse <?php if($page_name=="report" || 
                                                            $page_name=="report_stock" ||
                                                                $page_name=="report_wish" ){?>
                                                                             in
                                                                                <?php } ?> ">
                                <li <?php if($page_name=="report"){?> class="active-link" <?php } ?> >
                                	<a href="<?php echo base_url(); ?>admin/report/">
                                    	<i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('product_compare');?>
                                    </a>
                                </li>
                                <?php
                                if($physical_check=='ok'){
								?>
                                <li <?php if($page_name=="report_stock"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/report_stock/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('product_stock');?>
                                    </a>
                                </li>
                                <?php
								}
								?>
                                <li <?php if($page_name=="report_wish"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/report_wish/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('product_wishes');?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
							}
						?>
                        <?php
						if($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok'){
                            if($this->crud_model->admin_permission('vendor') ||
                                $this->crud_model->admin_permission('membership_payment') ||
                                    $this->crud_model->admin_permission('membership')){
                        ?>
                        <li <?php if($page_name=="vendor" || 
                                        $page_name=="membership_payment" ||
											$page_name=="slides_vendor" ||
                                            	$page_name=="membership" ){?>
                                                     class="active-sub" 
                                                        <?php } ?>>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                    <span class="menu-title">
                                        <?php echo translate('vendors');?>
                                    </span>
                                        <i class="fa arrow"></i>
                            </a>
                            
                            <!--REPORT-------------------->
                            <ul class="collapse <?php if($page_name=="vendor" || 
                                                            $page_name=="membership_payment" ||
																$page_name=="pay_to_vendor" ||
																	$page_name=="slides_vendor" ||
                                                                		$page_name=="membership" ){?>
                                                                             in
                                                                                <?php } ?> ">
                                <li <?php if($page_name=="vendor"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/vendor/">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('vendor_list');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="pay_to_vendor"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/pay_to_vendor/">
                                        <i class="fa fa-circle fs_i"></i>
                                        <?php echo translate('pay_to_vendor');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="membership_payment"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/membership_payment/">
                                        <i class="fa fa-circle fs_i"></i>
                                        <?php echo translate('package_payments');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="membership"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/membership/">
                                        <i class="fa fa-circle fs_i"></i>
                                        <?php echo translate('vendor_packages');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="slides_vendor"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/slides/vendor">
                                        <i class="fa fa-circle fs_i"></i>
                                        <?php echo translate('vendor\'s_slides');?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
						}
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('user') ){
                        ?>
                        <li <?php if($page_name=="user" || 
                                        $page_name=="wallet_load" ||
                                            $page_name=="package"){?>
                                             class="active-sub" 
                                                <?php } ?> >
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span class="menu-title">
                                    <?php echo translate('customers');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
            
                            <ul class="collapse <?php if($page_name=="user" || 
                                                            $page_name=="wallet_load" || $page_name=="package"){?>
                                                                 in
                                                                    <?php } ?>" >
                                
                                <?php
                                    if($this->crud_model->admin_permission('user')){
                                ?>
                                <li <?php if($page_name=="user"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/user">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('customers');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($this->crud_model->admin_permission('user') && $this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok'){
                                ?>
                                <li <?php if($page_name=="wallet_load"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/wallet_load">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('wallet_loads');?>
                                    </a>
                                </li>
                                <?php
                                }
                                if ($this->crud_model->admin_permission('package') && $customer_product_check == 'ok') {
                                ?>
                                 <li <?php if($page_name=="package"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/package">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('premium_package');?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                        	if($this->crud_model->admin_permission('newsletter') ||
								$this->crud_model->admin_permission('contact_message') ){
						?>
                        <li <?php if($page_name=="newsletter" || 
                                        $page_name=="contact_message" ){?>
                                             class="active-sub" 
                                                <?php } ?> >
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-title">
                                	<?php echo translate('messaging');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
            
                            <ul class="collapse <?php if($page_name=="newsletter" || 
															$page_name=="contact_message"){?>
                                                                 in
                                                                    <?php } ?>" >
                                
								<?php
                                    if($this->crud_model->admin_permission('newsletter')){
                                ?>
                                <li <?php if($page_name=="newsletter"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/newsletter">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('newsletters');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                
                                <?php
                                    if($this->crud_model->admin_permission('contact_message')){
                                ?>
                                <li <?php if($page_name=="contact_message"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/contact_message">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('contact_messages');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
						<?php
                            }
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('blog') ){
                        ?>
                        <li <?php if($page_name=="blog" || $page_name=="blog_category" ){?>
                                     class="active-sub" 
                                        <?php } ?> >
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
                                    <?php echo translate('blog');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse <?php if($page_name=="blog" || $page_name=="blog_category"){ echo 'in'; } ?>" >
                                <?php
                                    if($this->crud_model->admin_permission('blog')){
                                ?>
                                <!--Menu list item-->
                                <li <?php if($page_name=="blog_category"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/blog_category/">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('blog_categories');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                 <?php
                                    if($this->crud_model->admin_permission('blog')){
                                ?>
                                <li <?php if($page_name=="blog"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/blog/">
                                        <i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('all_blogs');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
            			<?php
                        	if($this->crud_model->admin_permission('slider') ||
                                  	$this->crud_model->admin_permission('slides') || 
										$this->crud_model->admin_permission('display_settings') ||
											$this->crud_model->admin_permission('site_settings') ||
												$this->crud_model->admin_permission('email_template') ||
                                        			$this->crud_model->admin_permission('captha_n_social_settings') ||
														$this->crud_model->admin_permission('page')){
						?>
                        <li <?php if($page_name=="slider" || 
										$page_name=="slides" || 
											$page_name=="display_settings"||
												$page_name=="site_settings" || 
													$page_name=="email_template" ||
														$page_name=="captha_n_social_settings" ||
															$page_name=="default_images" ||
																$page_name=="page" ){?>
																	class="active-sub" 
																		<?php } ?> >
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                    <span class="menu-title">
                                		<?php echo translate('frontend_settings');?>
                                    </span>
                                		<i class="fa arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse <?php if($page_name=="slider" || 
                                                			$page_name=="slides" || 
																$page_name=="display_settings"||
																	$page_name=="site_settings" || 
																		$page_name=="email_template" ||
																			$page_name=="captha_n_social_settings" ||
																				$page_name=="default_images" ||
																					$page_name=="page"){?>
																						in
																						<?php } ?>" >
                                
								<?php
                                    if($this->crud_model->admin_permission('slider') ||
                                        $this->crud_model->admin_permission('slides')){
                                ?>
                                <li <?php if($page_name=="slider" || 
                                                $page_name=="slides"){?>
                                                     class="active-sub" 
                                                        <?php } ?>>
                                    <a href="#">
                                        <i class="fa fa-sliders"></i>
                                            <span class="menu-title">
                                                <?php echo translate('slider_settings');?>
                                            </span>
                                                <i class="fa arrow"></i>
                                    </a>
                                    
                                    <!--REPORT-------------------->
                                    <ul class="collapse <?php if($page_name=="slider" || 
                                                                    $page_name=="slides" ){?>
                                                                         in
                                                                            <?php } ?> ">
                                        <li <?php if($page_name=="slider"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/slider/">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('layer_slider');?>
                                            </a>
                                        </li>
                                        <li <?php if($page_name=="slides"){?> class="active-link" <?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/slides/">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('top_slides');?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    }
                                ?>
								<?php
                                    if($this->crud_model->admin_permission('display_settings')){
										$tab = $this->uri->segment(3);
                                ?>                      
                                <li <?php if($page_name=="display_settings"){?>
                                                             class="active-sub" 
                                                                <?php } ?> >
                                    <a href="#">
                                        <i class="fa fa-television"></i>
                                            <span class="menu-title">
                                                <?php echo translate('display_settings');?>
                                            </span>
                                            <i class="fa arrow"></i>
                                    </a>
                    
                                    <!--PRODUCT------------------>
                                    <ul class="collapse <?php if($page_name=="display_settings"){?>
                                                                                     in
                                                                                        <?php } ?> " >
                                                                                  
                                        <li <?php if($tab == 'home'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/home">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('home_page');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'contact'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/contact">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('contact_page');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'footer'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/footer">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('footer');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'theme'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/theme">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('theme_color');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'logo'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/logo">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('logo');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'favicon'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/favicon">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('favicon');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'font'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/font">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('fonts');?>
                                            </a>
                                        </li>
                                        <li <?php if($tab == 'preloader'){ ?>class="active-link"<?php } ?> >
                                            <a href="<?php echo base_url(); ?>admin/display_settings/preloader">
                                                <i class="fa fa-circle fs_i"></i>
                                                    <?php echo translate('preloader');?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    }
                                ?>
                                
								<?php
                                    if($this->crud_model->admin_permission('site_settings') ||
										$this->crud_model->admin_permission('email_template') ||
                                         $this->crud_model->admin_permission('captha_n_social_settings')){
                                ?>
                                <li <?php if($page_name=="site_settings" || 
												$page_name=="email_template" ||
                                                	$page_name=="captha_n_social_settings" ){?>
                                                 		class="active-sub" 
                                                    		<?php } ?> >
                                    <a href="#">
                                        <i class="fa fa-wrench"></i>
                                            <span class="menu-title">
                                                <?php echo translate('site_settings');?>
                                            </span>
                                                <i class="fa arrow"></i>
                                    </a>
                                    <!--Submenu-->
                                    <ul class="collapse <?php if($page_name=="site_settings" ||
																	$page_name=="email_template" || 
                                                                    	$page_name=="captha_n_social_settings" ){?>
                                                                     		in
                                                                        		<?php } ?>" >
                                        
                                        <?php
                                            if($this->crud_model->admin_permission('site_settings')){
                                        ?>                      
                                            <li <?php if($page_name=="site_settings"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url();?>admin/site_settings/general_settings/">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('general_settings');?>
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($this->crud_model->admin_permission('email_template')){
                                        ?>                      
                                            <li <?php if($page_name=="email_template"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url();?>admin/email_template/">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('email_templates');?>
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($this->crud_model->admin_permission('captha_n_social_settings')){
                                        ?>
                                            <!--Menu list item-->
                                            <li <?php if($page_name=="captha_n_social_settings"){?> class="active-link" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>admin/captha_n_social_settings/">
                                                    <i class="fa fa-circle fs_i"></i>
                                                        <?php echo translate('third_party_settings');?>
                                                </a>
                                            </li>
                                            <!--Menu list item-->
                                        <?php
                                            }
                                        ?>
                                        
                                    </ul>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
									if($this->crud_model->admin_permission('page')){
								?>                      
								<li <?php if($page_name=="page"){?> class="active-link" <?php } ?> >
									<a href="<?php echo base_url(); ?>admin/page/">
										<i class="fa fa-code"></i>
										<span class="menu-title">
											<?php echo translate('build_responsive_pages');?>
										</span>
									</a>
								</li>
								<?php
									}
								?>
                                <?php
									if($this->crud_model->admin_permission('default_images')){
								?>                      
								<li <?php if($page_name=="default_images"){?> class="active-link" <?php } ?> >
									<a href="<?php echo base_url(); ?>admin/default_images/">
										<i class="fa fa-camera"></i>
										<span class="menu-title">
											<?php echo translate('set_default_images');?>
										</span>
									</a>
								</li>
								<?php
									}
								?>
                           	</ul>
                        </li>
						<?php
                            }
                        ?>
                        <?php
							if($this->crud_model->admin_permission('business_settings')){
						?>
                        <li <?php if($page_name=="activation" || 
										$page_name=="payment_method" ||
											$page_name=="curency_method" ||
												$page_name=="faq_settings" ){?>
                                                     class="active-sub" 
                                                        <?php } ?>>
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                    <span class="menu-title">
                                		<?php echo translate('business_settings');?>
                                    </span>
                                		<i class="fa arrow"></i>
                            </a>
                            
                            <!--REPORT-------------------->
                            <ul class="collapse <?php if($page_name=="activation" || 
                                                            $page_name=="payment_method" ||
																$page_name=="curency_method" ||
                                                                	$page_name=="faq_settings" ){?>
                                                                             in
                                                                                <?php } ?> ">
                                <li <?php if($page_name=="activation"){?> class="active-link" <?php } ?> >
                                	<a href="<?php echo base_url(); ?>admin/activation/">
                                    	<i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('activation');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="payment_method"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/payment_method/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('payment_method');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="curency_method"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/curency_method/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('currency_')?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="faq_settings"){?> class="active-link" <?php } ?> >
                                	<a href="<?php echo base_url(); ?>admin/faqs/">
                                    	<i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('faqs');?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
							}
						?>
            			<?php
                        	if($this->crud_model->admin_permission('role') ||
								$this->crud_model->admin_permission('admin') ){
						?>
                        <li <?php if($page_name=="role" || 
                                        $page_name=="admin" ){?>
                                             class="active-sub" 
                                                <?php } ?> >
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
                                	<?php echo translate('staffs');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
            
                            <ul class="collapse <?php if($page_name=="admin" || 
															$page_name=="role"){?>
                                                                 in
                                                                    <?php } ?>" >
                                
								<?php
                                    if($this->crud_model->admin_permission('admin')){
                                ?>
                                <li <?php if($page_name=="admin"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/admins/">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('all_staffs');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($this->crud_model->admin_permission('role')){
                                ?>
                                <!--Menu list item-->
                                <li <?php if($page_name=="role"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/role/">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('staff_permissions');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
						<?php
                            }
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('seo')){
                        ?>
                        <li <?php if($page_name=="seo_settings"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>admin/seo_settings">
                                <i class="fa fa-search-plus"></i>
                                <span class="menu-title">
                                    SEO
                                </span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('language')){
                        ?> 
                        <li <?php if($page_name=="language"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>admin/language_settings">
                                <i class="fa fa-language"></i>
                                <span class="menu-title">
                                    <?php echo translate('language');?>
                                </span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <li <?php if($page_name=="manage_admin"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>admin/manage_admin/">
                                <i class="fa fa-lock"></i>
                                <span class="menu-title">
                                	<?php echo translate('manage_admin_profile');?>
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="http://activeitzone.com/check/" class="activate_bar" target="_blank">
                                <i class="fa fa-check-circle"></i>
                                <span class="menu-title">
                                	<?php echo translate('activate');?>
                                </span>
                            </a>
                        </li>
                </div>
            </div>
        </div>
    </div>
</nav>
<style>
.activate_bar{
border-left: 3px solid #1ACFFC;	
transition: all .6s ease-in-out;
}
.activate_bar:hover{
border-bottom: 3px solid #1ACFFC;
transition: all .6s ease-in-out;
background:#1ACFFC !important;
color:#000 !important;	
}
ul ul ul li a{
	padding-left:80px !important;
}
ul ul ul li a:hover{
	background:#2f343b !important;
}
</style>