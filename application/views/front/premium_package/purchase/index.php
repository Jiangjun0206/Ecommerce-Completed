<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="row setup-content" id="step-1" style="display: block;">
                        <div class="col-md-12 packages">
                            <?php foreach ($selected_plan as $value): ?>
                                <div class="col-sm-8 col-md-4 ml-auto mr-auto">
                                    <div class="package-list ">
                                        <div class="package-head text-center">
                                            <h4 class="text-center"><?=$value->name;?></h4>
                                        </div>
                                        <div class="package-body">
                                            <div class="package-price">
                                                <span>
                                                    <?php
                                                        $image = $value->image;
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
                                                    <li><b><?=translate('amount_of')."<br>".translate('product_upload')?>: </b><?=$value->upload_amount.' '.translate('times');?></li>
                                                    
                                                    <li><b>Price:</b> <?=currency($value->amount);?></li>
                                                    <input type="hidden" id="package_amnt" value="<?=$value->amount;?>">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="package-footer" >
                                            <div class="py-2 text-center mb-2">
                                                <div style="height: 49px;">   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 package_bg_light mt-4">
                                     <div class="package-list ">
                                        <div class="package-head text-center">
                                            <h4 class="text-center"><?=translate('select_a_payment_method')?></h4>
                                        </div>
                                        <div class="package-body" style="padding: 10px;">
                                            <?php
                                                include 'payment_option.php';
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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