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

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>           

        <?php 
		
		if( !is_page() )
		{
			echo '<header class="post-titles '. $columns .'">';
	
				include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles
			echo '</header><!-- / .post-titles -->';
		} ?>

        <section class="entry columns eight layout_four">
            <?php 
			global $more;
			$more = 0;
			
			the_content( __('<p class="serif">Read the rest of this page &raquo;</p>') ); ?>
                    
            <?php wp_link_pages(array('before' => '<ul class="paging"><li class="pages">'.__('Pages', 'themeva' ).':</li> ', 'after' => '</ul>','link_before'=> '<li class="pagebutton">',  'next_or_number' => 'number', 'link_after'=> '</li>',)); ?>
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