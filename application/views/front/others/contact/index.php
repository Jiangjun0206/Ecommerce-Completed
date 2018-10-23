<!-- PAGE -->
<?php 
    $contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
    $contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
    $contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
    $contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
    $contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
?>
<section class="page-section color">
    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <div class="contact-info contact_bg">
                    <h2 class="block-title">
                        <span>
                            <?php echo translate('contact_us');?>
                        </span>
                    </h2>
                    <div class="media-list">
                        <div class="media">
                            <i class="pull-left fa fa-home"></i>
                            <div class="media-body">
                                <strong><?php echo translate('address');?>:</strong>
                                <br>
                                <?php echo $contact_address;?>
                            </div>
                        </div>
                        <div class="media">
                            <i class="pull-left fa fa-phone"></i>
                            <div class="media-body">
                                <strong><?php echo translate('phone');?>:</strong><br>
                                <?php echo $contact_phone;?>
                            </div>
                        </div>
                        <div class="media">
                            <i class="pull-left fa fa-globe"></i>
                            <div class="media-body">
                                <strong><?php echo translate('website');?>:</strong><br>
                                <a href="https://<?php echo $contact_website;?>"><?php echo $contact_website;?></a>
                            </div>
                        </div>
                        <div class="media">
                            <i class="pull-left fa fa-envelope-o"></i>
                            <div class="media-body">
                                <strong><?php echo translate('email');?>:</strong><br>
                                <a href="mailto:<?php echo $contact_email;?>">
                                    <?php echo $contact_email;?>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="contact-info mt15-md contact_bg">
                    <h2 class="block-title">
                        <span>
                            <?php echo translate('about_us');?>
                        </span>
                    </h2>
                    <p style="text-align:justify"><?php echo $contact_about;?></p>
                </div>
            </div>

            <div class="col-md-7 text-left">

                <h2 class="block-title">
                    <span>
                        <?php echo translate('contact_form');?>
                    </span>
                </h2>
                <?php
                    echo form_open(base_url() . 'home/contact/send', array(
                        'class' => 'contact-form',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'id' => 'contact-form'
                    ));
                ?>    
                <!-- Contact form -->
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="name">
                                <?php echo translate('name');?>
                            </label>
                            <input type="text" data-toggle="tooltip" title="<?php echo translate('name');?>"
                            placeholder="<?php echo translate('name');?>" name="name" id="name" 
                            class="form-control placeholder test"/>
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="email">
                                <?php echo translate('email');?>
                            </label>
                            <input type="email" data-toggle="tooltip" title="<?php echo translate('email');?>" 
                            placeholder="<?php echo translate('email');?>" name="email" id="email" 
                            class="form-control placeholder email test"/>
                        </div>
                    </div>
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="subject">
                                <?php echo translate('subject');?>
                            </label>
                            <input type="text"class="form-control placeholder test"  data-toggle="tooltip" 
                                title="<?php echo translate('subject');?>" name="subject" id="subject" size="30"
                                placeholder="<?php echo translate('subject');?>" 
                             />
                        </div>
                    </div>

                    <div class="form-group af-inner">
                        <label class="sr-only" for="input-message">
                            <?php echo translate('message');?>
                        </label>
                        <textarea name="message" id="input-message" placeholder="<?php echo translate('message');?>" rows="4" cols="50" class="form-control placeholder test" data-toggle="tooltip" title="<?php echo translate('message');?>"></textarea>
                    </div>
                    <?php
                    	if($this->crud_model->get_settings_value('general_settings','captcha_status','value') == 'ok'){
					?>
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <?php echo $recaptcha_html; ?>
                        </div>
                    </div>
                    <?php
						}
					?>
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <span class="form-button-submit btn btn-theme submitter12 enterer" data-ing='<?php echo translate('sending..'); ?>' >
                                <?php echo translate('send_message');?>
                            </span>
                        </div>
                    </div>
                </form>
                <!-- /Contact form -->
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->
<script>
    $("body").on('change','.email',function(){
        var value=$(this).val();
        var here=$(this);
        var txt='<?php echo translate('enter_valid_email_address')?>';
        if(isValidEmailAddress(value) !== true){
            here.css({borderColor: 'red'});
            here.closest('div').find('.require_alert').remove();
            here.closest('.form-group').append(''
                +'  <span id="" class="require_alert" >'
                +'      '+txt
                +'  </span>'
            );
        } else{
        }
    });
     $('#contact-form').on('click','.submitter12', function(){
        var herea = $(this); // alert div for show alert message
        var form = herea.closest('form');
        var ing = herea.data('ing');
        var msg = herea.data('msg');
        var prv = herea.html();
        var sent = '<?php echo translate('message_sent_successfully')?>';
        var can = '';
        var captcha_incorrect = '<?php echo translate('please_fill_the_captcha'); ?>'
        var incorrect = '<?php echo translate('incorrect_information').'. '.translate('check_again').'!';?>'
        var l = '';
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        var email=$('.email').val();
        if(isValidEmailAddress(email)==true){
            can ='yes';
        }else{
            can ='no';
        }
        $('#contact-form .test').each(function() {
            var it=$(this);
            if(it.val()==''){
                it.css({borderColor: 'red'});
                it.closest('div').find('.require_alert').remove();
                it.closest('.form-group').append(''
                    +'  <span id="" class="require_alert" >'
                    +'      <?php echo translate('this_field_is_required!')?>'
                    +'  </span>'
                );
                can ='no';
            }
        });
        
        if(can !== 'no'){
            $.ajax({
                url: form.attr('action'), // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                data: formdata ? formdata : form.serialize(), // serialize form data 
                cache       : false,
                contentType : false,
                processData : false,
                beforeSend: function() {
                    herea.html(ing); // change submit button text
                },
                success: function(data) {
                    herea.fadeIn();
                    herea.html(prv);
                    if(data == 'sent'){
                        //sound('message_sent');
                        notify(sent,'success','bottom','right');
                        setTimeout(
                            function() {
                                location.replace("<?php echo base_url(); ?>home/contact");
                            }, 2000
                        );
                    } else if (data == 'captcha_incorrect'){
                        //sound('captcha_incorrect');
                        $('#recaptcha_reload_btn').click();
                        notify(captcha_incorrect,'warning','bottom','right');
                        
                    }else {
                        notify(data,'warning','bottom','right');
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }else{
            notify(incorrect,'warning','bottom','right');
        }
    });
    
    $("#contact-form").on('change','.test',function(){
        var here = $(this);
        here.css({borderColor: '#dcdcdc'});
        
        if (here.attr('type') == 'email'){
            if(isValidEmailAddress(here.val())){
                here.closest('div').find('.require_alert').remove();
            }
        } else {
            here.closest('div').find('.require_alert').remove();
        }
        if(here.is('select')){
            here.closest('div').find('.chosen-single').css({borderColor: '#dcdcdc'});
        }
    });
    
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    };
</script>