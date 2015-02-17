<?php 
/**
 * Tersus Child Theme Functions
 * Load languages directory for translation
*/ 

/* ------------------------------------
:: The best way to add jquery to your website
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
     
}add_action('gform_after_submission_1', 'remove_form_entry', 10, 2);  ?>