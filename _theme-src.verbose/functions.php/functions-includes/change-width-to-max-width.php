<?php
/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
    // Combine new attributes
    $new_attr = shortcode_atts([
            'id'    => '',
            'align' => '',
            'width' => '',
            'caption' => ''
        ], 
        $attr
    );

    // Extract variables
    $id =       $new_attr['id'];
    $align =    $new_attr['align'];
    $width =    $new_attr['width'];
    $caption =  $new_attr['caption'];

    // Catch no set width or no caption
    if ( 1 > (int) $width || empty($caption) ) return $val;

    // Build caption id
    $capid = '';
    if ( $id ) {
        $id = esc_attr($id);
        $capid = "id='figcaption_$id' ";
        $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
    }

    // Build max-width style from width
    $width_style = '';
    if ($width ) {
        $width_style = "style='max-width:" . $width . "px' ";
    }

    $final_html = "<figure $id $width_style class='wp-caption $align' >" .
        do_shortcode( $content ) . 
        "<figcaption $capid class='wp-caption-text'>$caption</figcaption>" .
    "</figure>";

    return $final_html;
}
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);