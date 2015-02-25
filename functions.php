<?php 
/**
 * Tersus Child Theme Functions
 * Load languages directory for translation
*/ 

/* ------------------------------------
:: luxsci Fix
------------------------------------ */
add_action("gform_after_submission", "post_to_third_party", 10, 2);
function post_to_third_party($entry, $form) { 
     
    $post_url = "https://secureform.luxsci.com/perl/post/11324-3209-vqav"; 
    $body = array(); 
    $labels = array(); 

foreach($form["fields"] as &$field) 
{ 
//see if this is a multi-field, like name or address 
if (is_array($field["inputs"])) 
{ 
//loop through inputs 
foreach($field["inputs"] as &$input) 
{ 
$label = $input["label"]; 
$value = $entry[strval($input["id"])]; 

    	 $labels[$label] = $labels[$label] + 1; 
                                        $label = ($labels[$label] == 1) ? $label : $label . "[" . $labels[$label] . "]"; 
                                         $body[ $label ] = $value; 

} 
} 
else 
{ 
$label = $field["label"]; 
$value = $entry[$field["id"]]; 

$labels[$label] = $labels[$label] + 1; 
                              $label = ($labels[$label] == 1) ? $label : $label . "[" . $labels[$label] . "]"; 
                              $body[ $label ] = $value; 
} 
} 

    $request = new WP_Http(); 
    $response = $request->post($post_url, array('body' => $body)); 
     
}add_action('gform_after_submission_1', 'remove_form_entry', 10, 2); 


/* ------------------------------------
:: Custom Widget
------------------------------------ */
// Creating the widget 
class testimonial_wigdet_main extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'testimonial_wigdet_main', 

// Widget name will appear in UI
__('Nuvo Widget', 'testimonial_wigdet_main_domain'), 

// Widget description
array( 'description' => __( 'Testimonial widget for Nuvo sites', 'testimonial_wigdet_main_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];

// This is where you run the code and display the output
if ( $field = get_field('youtube_link') ) {
//Do nothing - This keeps testimonal CTA From Loading
} else
	{
get_template_part('key_site_parts/call_to_action_procedures');
}


echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'testimonial_wigdet_main_domain' );
}
// Widget admin form
?>
<!-- Ask something -->
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class testimonial_wigdet_main ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'testimonial_wigdet_main' );
}
add_action( 'widgets_init', 'wpb_load_widget' );