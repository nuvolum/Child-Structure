<?php
/**
 * The template for displaying Page format
 *
 * @package WordPress
 */ ?>
 
 	<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>           

        <?php 
		
		if( !is_page() )
		{
			echo '<header class="post-titles '. $columns .'">';
	
				include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles
			echo '</header><!-- / .post-titles -->';
		} ?>
        
        <section class="entry">
            <?php 
			global $more;
			$more = 0;
			
			the_content( __('<p class="serif">Read the rest of this page &raquo;</p>') ); ?>
                    
            <?php wp_link_pages(array('before' => '<ul class="paging"><li class="pages">'.__('Pages', 'themeva' ).':</li> ', 'after' => '</ul>','link_before'=> '<li class="pagebutton">',  'next_or_number' => 'number', 'link_after'=> '</li>',)); ?>
            <div class="clear"></div>
        </section><!-- /entry -->  

        <footer class="row">
        	<section class="twelve columns">
				<?php edit_post_link(__('Edit this entry.', 'themeva' ), '<p>', '</p>'); ?>
                <?php if( of_get_option('pagecomments')=='enable' ) comments_template(); // Enable this line for comments on pages ?> 
			</section>
        </footer>
    </article>