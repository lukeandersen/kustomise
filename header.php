<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		
		wp_title( '-', true, 'right' );
		
		// Add the blog name.
		bloginfo( 'name' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " - $site_description";
		
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		
		?></title>
		
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- mobile optimized -->
		<meta name="viewport" content="width=device-width,initial-scale=1">
        <!--  iPhone Web App Home Screen Icon -->
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png" />
		<!-- IE6 toolbar removal -->
		<meta http-equiv="imagetoolbar" content="false" />
		<!-- allow pinned sites -->
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />

		<!-- default stylesheet -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        
        <!--[if (lt IE 9) & (!IEMobile)]>
    		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/ie.css">	
            <script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/css3-mediaqueries.js"></script>
		<![endif]-->	
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
        
        <!-- modernizr (without media query polyfill) -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/modernizr.custom.min.js"></script>
		
  		<!-- RSS & Pingbacks -->
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('tz_feedburner')) { echo get_option('tz_feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
        
	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="container">
			
			<header role="banner">
			
				<div id="inner-header" class="wrap clearfix">
                
                	<p class="welcome-message"><?php echo stripslashes(get_option('tz_welcome_message')); ?></p>
				
					<!-- BEGIN #logo -->
                    <div id="logo">
                        <?php /*
                        If "plain text logo" is set in theme options then use text
                        if a logo url has been set in theme options then use that
                        if none of the above then use the default logo.png */
                        if (get_option('tz_plain_logo') == 'true') { ?>
                        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                        <p id="tagline"><?php bloginfo( 'description' ); ?></p>
                        <?php } elseif (get_option('tz_logo')) { ?>
                        <a class="logo-link" href="<?php echo home_url(); ?>"><img src="<?php echo get_option('tz_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                        <?php } else { ?>
                        <a class="logo-link" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php } ?>
                    <!-- END #logo -->
                    </div>
					
					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>
					
					<nav role="navigation">
						<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?> 
                        <?php dropdown_menu( array('dropdown_title' => '-- Main Menu --', 'indent_string' => '- ', 'indent_after' => '') );?>  
					</nav>
				
				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->
