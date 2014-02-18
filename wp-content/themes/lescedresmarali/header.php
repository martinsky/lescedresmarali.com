<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title><?php wp_title('|'); ?><?php echo " | "; bloginfo('name'); ?></title>
    <meta name="keywords" content="c&egrave;dres, cedres, c&egrave;dre, cedre, haie de cedre, haie de c&egrave;dre, cedre a haie, haie, haies">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="<?php bloginfo('template_url'); ?>/js/prototype.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/lightbox.js" type="text/javascript"></script>
    <?php wp_head(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31622168-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body>
<div id="container-outer">
	<div id="container">
   	  <div id="header">
        	<div id="menu-container">
                <ul>
                    <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
                </ul>
            </div>
      </div>