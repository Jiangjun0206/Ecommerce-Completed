
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $description; if($page_name == 'vendor_home'){ echo ', '.$this->db->get_where('vendor',array('vendor_id'=>$vendor))->row()->description; } ?>">
        <meta name="keywords" content="<?php echo $keywords; if($page_name == 'vendor_home'){ echo ', '.$this->db->get_where('vendor',array('vendor_id'=>$vendor))->row()->keywords; }  if($page_name == 'others/custom_page'){ echo ', '.$tags; } ?>">
        <meta name="author" content="<?php echo $author; ?>">
        <meta name="revisit-after" content="<?php echo $revisit_after; ?> days">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php
        	include 'meta/'.$asset_page.'.php';
		?>      
        <!-- Favicon -->
        <?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value;?>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>template/front/ico/apple-touch-icon-144-precomposed.png">
        
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">
        
        <title><?php echo $page_title; ?></title>
        <?php if($this->crud_model->get_type_name_by_id('general_settings','80','value') == 'ok'){?>
        <!-- Google Analytics -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', "<?php echo $this->db->get_where('general_settings',array('type'=>'google_analytics_key'))->row()->value; ?>", 'auto');
        ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
        <?php } ?>
        <!-- CSS Global -->
        <link href="<?php echo base_url(); ?>template/front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/plugins/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/modal/css/sm.css" rel="stylesheet">
        
        <!-- Theme CSS -->
        <?php $theme =  $this->db->get_where('ui_settings',array('type' => 'header_color'))->row()->value;?>
        <link href="<?php echo base_url(); ?>template/front/css/theme.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/front/css/theme-<?php echo $theme; ?>.css" rel="stylesheet" id="theme-config-link">

        <link href="<?php echo base_url(); ?>template/front/plugins/smedia/custom-1.css" rel="stylesheet">
        
        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>template/front/plugins/jquery/jquery-1.11.1.min.js"></script>
		<?php 
            $font =  $this->db->get_where('ui_settings',array('type' => 'font'))->row()->value;
        ?>	
        <link href='https://fonts.googleapis.com/css?family=<?php echo $font; ?>:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <style>
			*{
				font-family: '<?php echo str_replace('+',' ',$font); ?>', sans-serif;
			}
			.remove_one{
				cursor:pointer;
				padding-left:5px;	
			}
		</style>
        <?php
        	include $asset_page.'.php';
		?>
		