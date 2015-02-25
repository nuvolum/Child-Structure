<?php 
/**
 * The template for displaying Page format
 *
 * @package WordPress
 */
 
 /*
Template Name: Youtube Landing Page
*/ 
?>

<?php get_header(); 
//ask if you we have a youtube vidoe in place and load it if we do
if(get_field('youtube_link'))
{
	include('key_site_parts/call_to_action_youtubetop_half.php');
}

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
		
         
        <section class="entry columns eight layout_four">  
           
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
        <?php get_sidebar(); ?>

        <footer class="row">
        	<section class="twelve columns">
				<?php edit_post_link(__('Edit this entry.', 'themeva' ), '<p>', '</p>'); ?>
                <?php if( of_get_option('pagecomments')=='enable' ) comments_template(); // Enable this line for comments on pages ?> 
			</section>
        </footer>
    </article>
        
<?php get_footer(); ?>