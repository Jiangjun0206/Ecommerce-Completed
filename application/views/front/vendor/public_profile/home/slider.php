<!-- BREADCRUMBS -->
<div class="main-slider">
    <div class="owl-carousel" id="main-slider"  style="max-height:350px; overflow:hidden">
    <?php
    $i=1;
    foreach($sliders as $row){
    ?>
    <div class="item slide<?php echo $i; ?> alt">
        <img class="slide-img" src="<?php echo $this->crud_model->file_view('slides',$row['slides_id'],'100','','no','src','','','.jpg') ?>" alt="" />
        <div class="caption">
            <div class="div-table">
                <div class="div-cell">
					<?php if($row['button_text']!=NULL){ ?>
                    <a class="btn pull-right" style="background:<?php echo $row['button_color']; ?>; color:<?php echo $row['text_color']; ?>" href="<?php echo $row['button_link']; ?>">
                        <?php echo $row['button_text']; ?>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        $i++;
    }
    ?>
    </div>
</div>