<?php
/*
Template Name: Home page
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol left first clearfix" role="main">
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
							
							<header>
								
								<h1><?php the_title(); ?></h1>
								
								<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
							
							</header> <!-- end article header -->
						
							<section class="post_content">
								<?php the_content(); ?>
						
							</section> <!-- end article section -->
							
							<footer>
					
								<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
								
							</footer> <!-- end article footer -->
						
						</article> <!-- end article -->
                        
                        <div class="clearfix">
                        	<div class="sixcol left">
                            	<h3>Some sub title here</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ligula urna, posuere a hendrerit rhoncus, porttitor a augue. Nunc sed erat arcu.</p>
                            </div>
                            <div class="sixcol left last">
                            	<h3>Some sub title here</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ligula urna, posuere a hendrerit rhoncus, porttitor a augue. Nunc sed erat arcu.</p>
                            </div>
                        </div>
                        
                        <div class="clearfix">
                        	<div class="fourcol left">
                            	<h4>Some sub title here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ligula urna, posuere a hendrerit rhoncus, porttitor a augue. Nunc sed erat arcu.</p>
                            </div>
                            <div class="fourcol left">
                            	<h4>Some sub title here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ligula urna, posuere a hendrerit rhoncus, porttitor a augue. Nunc sed erat arcu.</p>
                            </div>
                            <div class="fourcol left last">
                            	<h4>Some sub title here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ligula urna, posuere a hendrerit rhoncus, porttitor a augue. Nunc sed erat arcu.</p>
                            </div>
                        </div>
						
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
    				
					<?php get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>