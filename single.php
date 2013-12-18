<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol left first clearfix" role="main">
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							
							<div style="font-size:11px; color:#999; margin-bottom:15px;"><?php _e("Posted", "minx"); ?> <data itemprop="datePublished" value="<?php echo the_time('Y-m-j'); ?>"><?php the_time('F jS, Y'); ?></data> <?php _e("by", "minx"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "minx"); ?> <?php the_category(', '); ?>.</div>
						
						</header> <!-- end article header -->
					
						
                        <?php /* if the post has a WP 2.9+ Thumbnail */
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) && get_option('tz_post_img') == 'true' ) : ?>
							<div class="post-thumb post-lead">
								<?php the_post_thumbnail('archive-thumb'); /* post thumbnail settings configured in functions.php */ ?>
							</div>
						<?php endif; ?>
                        
                        <section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->
                        
                        <?php if(get_option('tz_author_bio') == 'true') : ?>
                        
						<!--BEGIN .author-bio-->
						<div class="author-bio">
							
							<!-- BEGIN .author-inner -->
							<div class="author-inner clearfix">

								<!-- BEGIN .author-wrap -->
								<div class="author-wrap clearfix">
								
									<?php echo get_avatar( get_the_author_meta('email'), '70' ); ?>
									
									<div class="author-info">
										<div class="author-title"><?php the_author_link(); ?></div>
										<div class="author-description"><?php the_author_meta('description'); ?></div>
									</div>
								
								<!-- END .author-wrap -->
								</div>
							
							<!-- END .author-inner -->
							</div>
							
						<!--END .author-bio-->
						</div>
						
                        <?php endif; ?>
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
						
						<?php comments_template(); ?>
						
						<?php endwhile; ?>			
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1>Not Found</h1>
						    </header>
						    <section class="post_content">
						    	<p>Sorry, but the requested resource was not found on this site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php get_sidebar('blog'); // sidebar 1 ?>
    			
    			</div> <!-- #inner-content -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>