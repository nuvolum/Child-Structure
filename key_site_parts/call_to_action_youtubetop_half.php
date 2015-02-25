<!-- Temp Fix -->
<div style="margin-left:15px;">
<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
</div>

<div class="vc_row wpb_row  twelve ">
    <div class="columns eight layout_four">
        <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element">
                <div class="wpb_wrapper">
                    <div class="nv-skin mediawrap video">
                        <div class="container videotype shadow">
                            <div class="gridimg-wrap">
                                <div class="videowrap ">
                                    <object class="internal" type="application/x-shockwave-flash" style="height:100%;background-position: center center;width:100%;" data="http://www.youtube.com/v/<?php the_field('youtube_link'); ?>?hd=1&rel=0&autohide=1&showinfo=0">
        <param name="movie" value="http://www.youtube.com/v/<?php the_field('youtube_link'); ?>?color2=FBE9EC&amp;rel=0&amp;hd=1&amp;version=3&amp;modestbranding=1" />
        <param name="allowFullScreen" value="true" />
        <param name="allowscriptaccess" value="always" />
        <param name="wmode" value="transparent">
        <embed src="http://www.youtube.com/v/<?php the_field('youtube_link'); ?>?hd=1&rel=0&autohide=1&showinfo=0" type="application/x-shockwave-flash" wmode="transparent" width="425" height="250" >
        </object>
                                </div>

                            </div><!-- / gridimg-wrap -->
                        </div><!-- / container -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar columns side_one four layout_four  border right last">
        <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element">
                <div class="wpb_wrapper">
                    <!-- Pop out Image/video -->
                    <?php if(get_field('youtube_link'))
                    {
                        include('call_to_action_procedures.php');
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>