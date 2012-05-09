			<footer role="contentinfo">
			
				<div id="sub-links" class="wrap clearfix">
					<?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar3' ); ?>
					
					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="help">
						
							<p>Please activate some Widgets.</p>
						
						</div>

					<?php endif; ?>
                </div>
                
                <div id="inner-footer" class="wrap clearfix">
			
					<p class="attribution left">&copy; <?php bloginfo('name'); ?> <?php _e("&#8211; website by", "bonestheme"); ?> <a href="http://lawebdesign.com.au" title="Luke Andersen">LAwebdesign</a>.</p>
                    
                    <nav>
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!-- scripts are now optimized via Modernizr.load -->	
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.fancybox.pack.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
        
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>