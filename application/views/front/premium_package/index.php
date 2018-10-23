<!--BREADCRUMBS -->
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>
                    <?=translate('premium_packages_for_customer')?>
                </span>
            </h2>
        </div>
    </div>
</section>
<!-- /BREADCRUMBS -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="panel-body">
                    <div class="row setup-content" id="step-1" style="display: block;">
                        <div class="col-md-12 packages">

                            <?php $packages=$this->db->get('package')->result();
                                foreach ($packages as $key) {
                                   

                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-6 col-sx-12" style="padding-top: 15px">
                                <div class="package-list ">
                                    <div class="package-head text-center">
                                        <h4 class="text-center"><?=$key->name;?></h4>
                                    </div>
                                    <div class="package-body">
                                        <div class="package-price">
                                            <span>
                                                <?php
                                                    $image = $key->image;
                                                    $images = json_decode($image, true);
                                                    if (file_exists('uploads/plan_image/'.$images[0]['thumb'])) {
                                                    ?>
                                                        <img class="img-responsive img-thumbnail img-circle" style="width: 80px; height: 80px;" src="<?=base_url()?>uploads/plan_image/<?=$images[0]['thumb']?>" >
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                        <img src="<?=base_url()?>uploads/plan_image/default_image.png" class="img-responsive img-thumbnail img-circle" style="width: 80px; height: 80px;">
                                                    <?php
                                                    }
                                                ?>
                                                
                                             </span>
                                        </div>
                                        <div class="package-details">
                                            <ul class="text-center">
                                                <li><b><?=translate('amount_of')."<br>".translate('product_upload')?>: </b><?=$key->upload_amount.' '.translate('times');?></li>
                                                
                                                <li><b>Price:</b> <?=currency($key->amount);?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="package-footer" >
                                        <div class="py-2 text-center mb-2">
                                            <?php if($key->package_id== 1){
                                                ?>
                                                <div style="height: 33px;">
                                                    
                                                </div>
                                            <?php
                                            }else{ ?>
                                            <a href="<?=base_url()?>home/premium_package/purchase/<?=$key->package_id;?>" class="btn btn-theme btn-theme-sm btn-block">
                                                <span class="active">Get This Package</span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <script>
                                function package_check(id,now){
                                    for(var i=1; i<7; i++){
                                        $("#package-"+i).prop("checked", false );
                                        $("#package-"+i).parent().parent().removeClass("package-selected");
                                        $("#select-"+i).html("Select");
                                    }
                                    now.html('Selected');
                                    $("#"+id).prop("checked", true);
                                    $("#"+id).parent().parent().addClass("package-selected");
                                    $('#next1').show();
                                    $('#btn_submit').show();
                                }

                            </script>
                            <style>
                                .package-list{
                                    background-color: #fff;
                                    border:1px solid #e8e8e8;
                                    transition: 0.8s ease;
                                    border-top-left-radius:5px;
                                    border-top-right-radius:5px;
                                }
                                .package-list .package-head{
                                    width:100%;
                                    display: inline-block;
                                    border-bottom: 1px solid #dadada;
                                    padding: 0px 10px;
                                }
                                .package-head h4{
                                    display: inline-block;
                                }
                                .package-selected{
                                    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
                                    transition: 0.8s ease;
                                    -webkit-transition: 0.8s ease;
                                }
                                .package-list:hover{
                                    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
                                    transition: 0.8s ease;
                                    -webkit-transition: 0.8s ease;
                                }
                                .package-price{
                                    margin: 10px auto;
                                    font-size: 20px;
                                    font-weight: bold;
                                    color: white;
                                    padding: 0px 10px;
                                }
                                .package-price span{
                                    margin-left:auto;
                                    margin-right:auto;
                                    display: block;
                                    text-align: center;
                                }.package-details{
                                    margin:10px auto;
                                    padding: 0px 20px;
                                }
                                .package-details ul li{
                                    border-bottom:1px solid #dadada;
                                    padding:10px 0px;
                                }
                            </style>
                        </div>
                        <div class="col-md-12">
                            <span id="next1" onclick="load_payments()" class="button-custom-btn-1 pull-right custom-btn-1-round-l disabled custom-btn-1 custom-btn-1-text-thick nextBtn custom-btn-1-text-upper custom-btn-1-size-s" data-text="Next" style="display: none">
                                <span><i class="fa fa-arrow-circle-right"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE