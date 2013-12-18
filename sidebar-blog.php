				<div id="sidebar1" class="sidebar fourcol right last clearfix" role="complementary">
				
					<?php get_search_form(); ?>

					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>
					
					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<br />
                        
                        <div class="help">
						
							<p>Please activate some Widgets.</p>
						
						</div>

					<?php endif; ?>

				</div>