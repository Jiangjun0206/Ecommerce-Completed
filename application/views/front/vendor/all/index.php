<!-- BREADCRUMBS -->
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>
                    <?php echo translate('all_vendors');?>
                </span>
            </h2>
        </div>
    </div>
</section>
<!-- /BREADCRUMBS -->

<!-- PAGE -->
<section class="page-section all-vendors">
    <div class="container">
        <div class="row">
            <div class="product">
                <div  id="result">
            </div>
            </div>
            
        	
        </div>
    </div>
</section>
<!-- /PAGE -->

<?php
    echo form_open(base_url() . 'home/ajax_vendor_list/', array(
        'class' => 'form-horizontal',
        'method' => 'post',
        'id' => 'filter_form'
    ));
?>
    
</form>

<script>

$(document).ready(function() {
        filter_vendor('0');
    }); 
    function filter_vendor(page){

        var form = $('#filter_form');
        var alert = $('#result');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        
        $.ajax({
            url: form.attr('action')+page+'/', // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                var top = '200';
                alert.fadeOut();
                alert.html('<div style="text-align:center;width:100%;position:relative;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>').fadeIn(); // change submit button text
            },
            success: function(data) {
                setTimeout(function(){
                    alert.html(data); // fade in response data
                }, 20);
                setTimeout(function(){
                    alert.fadeIn(); // fade in response data
                }, 30);
            },
            error: function(e) {
                console.log(e)
            }
        });
        
    }
    
    
</script>

