<?php 
/**
 * The template for displaying Page format
 *
 * @package WordPress
 */
 
 /*
Template Name: Custom Landing Page
*/ 
?>

<?php get_header(); ?>


    <article id="post-<?php the_ID(); ?> videolanding" <?php post_class(); ?>>           

        <?php 
		
		if( !is_page() )
		{
			echo '<header class="post-titles '. $columns .'">';
	
				include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles
			echo '</header><!-- / .post-titles -->';
		} ?>
		
		<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
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

        <footer class="row">
        	<section class="twelve columns">
				<?php edit_post_link(__('Edit this entry.', 'themeva' ), '<p>', '</p>'); ?>
                <?php if( of_get_option('pagecomments')=='enable' ) comments_template(); // Enable this line for comments on pages ?> 
			</section>
        </footer>
    </article>
        
<?php get_footer(); ?>