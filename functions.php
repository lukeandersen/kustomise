<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/custom-post-type.php'); // custom post type example

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => 'Page Sidebar',
		'description' => 'Secondary sidebar for pages.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'sidebar3',
		'name' => 'Footer Columns',
		'description' => 'Footer four columns.',
		'before_widget' => '<div id="%1$s" class="widget %2$s fourcol">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author()) ?>
				<time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()) ?></a></time>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="help">
          			<p><?php _e('Your comment is awaiting moderation.') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
    <input type="submit" class="btn" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!


/************* GALLERY LAYOUT *********************/

//Remove inline styles printed when the gallery shortcode is used.
add_filter( 'use_default_gallery_style', '__return_false' );


// Adapted and Modified from http://wordpress.org/extend/plugins/add-lightbox/

// Adds a rel="prettyPhoto" tag to all linked image files



add_filter('the_content', 'addlightboxrel_replace', 12);

add_filter('get_comment_text', 'addlightboxrel_replace');

function addlightboxrel_replace ($content)

{   global $post;

	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";

	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox"$6>$7</a>';

	$content = preg_replace($pattern, $replacement, $content);

	return $content;

}


/*-----------------------------------------------------------------------------------*/
/*	Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/

// Add the Latest Tweets Custom Widget
include("lbrary/widget-tweets.php");

// Add the Latest Blog Posts Custom Widget
include("lbrary/widget-blog.php");

// Add the Flickr Photos Custom Widget
include("lbrary/widget-flickr.php");

// Add the Custom Video Widget
include("lbrary/widget-video.php");

// Add the Theme Post types
include("lbrary/theme-posttypes.php");

// Add the Portfolio Custom Meta
include("lbrary/portfolio-meta.php");

// Add the Theme Shortcodes
include("lbrary/theme-shortcodes.php");

// Add the Theme Custom Fields
include("lbrary/custom-fields.php");


/************* Filters that allow shortcodes in Text Widgets *********************/

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');


/************* Load Theme Options *********************/

define('TZ_FILEPATH', TEMPLATEPATH);
define('TZ_DIRECTORY', get_template_directory_uri());

require_once (TZ_FILEPATH . '/admin/admin-functions.php');
require_once (TZ_FILEPATH . '/admin/admin-interface.php');
require_once (TZ_FILEPATH . '/admin/theme-options.php');
require_once (TZ_FILEPATH . '/admin/theme-functions.php');
require_once (TZ_FILEPATH . '/library/dropdown-menus.php');

?>