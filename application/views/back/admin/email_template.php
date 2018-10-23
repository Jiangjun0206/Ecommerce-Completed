<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('manage_email_templates'); ?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="tab-base tab-stacked-left">
                <ul class="nav nav-tabs">
                <?php
					$i=0;
                	foreach($table_info as $row1){
						$i++;
				?>
                    <li class="template_tab <?php if($i==1){ ?>active<?php } ?>">
                        <a data-toggle="tab" href="#demo-stk-lft-tab-<?php echo $row1['email_template_id']; ?>"><?php echo translate($row1['title']);?></a>
                    </li>
                <?php
					}
				?>
                </ul>

                <div class="tab-content bg_grey">
                <?php
					$j=0;
                	foreach($table_info as $row2){
						$j++;
				?>	
                    <div id="demo-stk-lft-tab-<?php echo $row2['email_template_id']; ?>" class="tab-pane fade <?php if($j==1){ ?>active in<?php } ?>">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate($row2['title']);?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'admin/email_template/update/'.$row2['email_template_id'], array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                	<div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('subject');?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="subject" value="<?php echo $row2['subject']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('email_body');?></label>
                                        <div class="col-sm-6">
                                            <textarea class="summernotes" data-height='300' data-name='body' ><?php echo $row2['body']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6" style="color:#C00;">
                                        	**<?php echo translate('N.B');?> : <?php echo translate('do_not_change_the_variables_like');?> [[ ____ ]].
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('update');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
					}
				?>    
                </div>
            </div>
        </div>
    </div>
<?php 
    $email_theme =  $this->db->get_where('ui_settings',array('type' => 'email_theme_style'))->row()->value;
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo translate('choose_background_theme'); ?></h3>
    </div>
    <?php
        echo form_open(base_url() . 'admin/ui_settings/email_theme', array(
            'class' => 'form-horizontal',
            'method' => 'post'
        ));
    ?>
        <div class="panel-body">
            <div class="form-group">
                <?php
                    $style = array( 'style_1' => 'Blank',
                                    'style_2' => 'Style 1',
                                    'style_3' => 'Style 2',
									'style_4' => 'Style 3'
                                    );
                    foreach($style as $value => $row){
                ?>
                    <div class="col-sm-3 box_area">
                        <div class="cc-selector">
                            <input type="radio" id="<?php echo $value; ?>" value="<?php echo $value; ?>" name="email_theme" <?php if($email_theme == $value){ echo 'checked'; } ?> >
                            <label class="drinkcard-cc" style="margin-bottom:0px; width:100%;" for="<?php echo $value; ?>">
                                <div class="col-sm-12">
                                    <div class="img_show">
                                        <img src="<?php echo base_url() ?>uploads/email_themes/<?php echo $value.'.jpg' ?>" width="100%" style=" text-align-last:center;" alt="<?php echo $row; ?>" />
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="home_title">
                            <h3>
                                <span>
                                    <i class="fa fa-check"></i>
                                </span>
                                <?php echo $row; ?> 
                            </h3>
                        </div>
                     </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="panel-footer text-right">
            <span class="btn btn-info submitter enterer" data-ing='<?php echo translate('updating..'); ?>' data-msg='<?php echo translate('updated!'); ?>' onClick="check_style()">
                <?php echo translate('update');?>
            </span>
        </div>       
    </form>
</div>

</div>
<div style="display:none;" id="site"></div>
<!-- for logo settings -->
<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'logo_settings';
    var list_cont_func = 'show_all';
    var dlt_cont_func = 'delete_logo';
	
	$(document).ready(function() {
        $('.summernotes').each(function() {
            var now = $(this);
            var h = now.data('height');
            var n = now.data('name');
            now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
            now.summernote({
                height: h,
                onChange: function() {
                    now.closest('div').find('.val').val(now.code());
                }
            });
			now.closest('div').find('.val').val(now.code());
			now.focus();
        });
	});

	$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
        check_style();
	
	});

    function check_style(){
        var style=$('input[name="email_theme"]:checked').val();
        $('.home_title').removeClass('active');
        $('input[name="email_theme"]:checked').closest(".box_area").find('.home_title').addClass('active');
    }
</script>
<style type="text/css">
.img-fixed{
    width: 100px;   
}
.img_show{
    border: 3px solid #c5c5c5;   
}
.tr-bg{
background-image: url(http://www.mikechambers.com/files/html5/canvas/exportWithBackgroundColor/images/transparent_graphic.png)  
}

.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
 
.cc-selector input:active +.drinkcard-cc
{
    opacity: 1;
    border:4px solid #169D4B;
}
.cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
    -moz-filter: none;
    filter: none;
    border:4px solid black;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    -webkit-transition: all .6s ease-in-out;
    -moz-transition: all .6s ease-in-out;
    transition: all .6s ease-in-out;
    -webkit-filter:opacity(.7);
    -moz-filter:opacity(.7);
    filter:opacity(.7);
    border:4px solid transparent;
    border-radius:5px !important;
}
.drinkcard-cc:hover{
    -webkit-filter:opacity(1);
    -moz-filter: opacity(1);
    filter:opacity(1);
    border:4px solid #8400C5;
            
}
.home_title{
    display: block;
    text-align: center;
}
.home_title span i{
    opacity: 0;
}
.home_title.active span i{
    opacity: 1;
    color:#096;
}
</style>