<?php 
/**
 * The template for displaying Page format
 *
 * @package WordPress
 */
 
 /*
Template Name: Testimonial Landing Page
*/ 
?>

<?php get_header(); ?>
<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<?php //ask if you we have a youtube vidoe in place and load it if we do

include('key_site_parts/call_to_action_testimonial.php');
include('key_site_parts/testimonial_block.php');
?>


<br class="styledbox">

    <article id="post-<?php the_ID(); ?> youtubelanding" <?php post_class(); ?>>           

        <?php 
		
		if( !is_page() )
		{
			echo '<header class="post-titles '. $columns .'">';
	
				include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles
			echo '</header><!-- / .post-titles -->';
		} ?>
		
         
        <section class="entry">
           
           
        <?php
    	// TO SHOW THE PAGE CONTENTS
    	while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
        	<?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

		<?php
  		endwhile; //resetting the page loop
   		wp_reset_query(); //resetting the page query
   		?>
           
           
            <div class="clear"></div>
        </section><!-- /entry -->  


    </article>
        
<?php get_footer(); ?>