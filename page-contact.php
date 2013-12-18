<?php
/*
Template Name: Contact
*/
?>
<?php 
if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	
} ?>

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
								
								<!--BEGIN .contact-form -->
                                
                                <div class="contact-form clearfix">
                            
                                    <?php if(isset($emailSent) && $emailSent == true) { ?>
        
                                        <div class="thanks">
                                            <p><?php _e('Thanks, your email was sent successfully.', 'framework') ?></p>
                                        </div>
                    
                                    <?php } else { ?>
                    
                                        <?php the_content(); ?>
                            
                                        <?php if(isset($hasError) || isset($captchaError)) { ?>
                                            <p class="error"><?php _e('Sorry, an error occured.', 'framework') ?><p>
                                        <?php } ?>
                        
                                        <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                                            
                                            <div class="clearfix">
                                                <label for="contactName"><?php _e('Name:', 'framework') ?></label>
                                                <input type="text" name="contactName" placeholder="Name" id="contactName" class="xlarge" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
                                                <?php if($nameError != '') { ?>
                                                    <span class="error"><?php echo $nameError; ?></span> 
                                                <?php } ?>
                                            </div>
                                
                                            <div class="clearfix">
                                                <label for="email"><?php _e('Email:', 'framework') ?></label>
                                                <input type="email" name="email" placeholder="Email" id="email" class="xlarge" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
                                                <?php if($emailError != '') { ?>
                                                    <span class="error"><?php echo $emailError; ?></span>
                                                <?php } ?>
                                            </div>
                                
                                            <div class="clearfix">
                                                <label for="commentsText"><?php _e('Message:', 'framework') ?></label>
                                                <textarea name="comments" id="commentsText" placeholder="Message" class="required requiredField xxlarge"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                                                <?php if($commentError != '') { ?>
                                                    <span class="error"><?php echo $commentError; ?></span> 
                                                <?php } ?>
                                            </div>
                                
                                            <div class="actions clearfix">
                                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                                <button class="btn large primary" type="submit"><?php _e('Send Email', 'framework') ?></button>
                                            </div>
    
                                        </form>
                                    <?php } ?>
                                    
                                </div>
                                
                                <!--END .contact-form -->
						
							</section> <!-- end article section -->
							
							<footer>
					
								<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
								
							</footer> <!-- end article footer -->
						
						</article> <!-- end article -->
						
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