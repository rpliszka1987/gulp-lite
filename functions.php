<?php


function mychildtheme_enqueue_styles() {
   $parent_style = 'twentyseventeen';

   wp_enqueue_style( 'bootstrap',  'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' );

   wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',
       get_stylesheet_directory_uri() . '/style.css',
       array( $parent_style )
   );
}
add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );

function adding_scripts() {

    wp_register_script('main',get_stylesheet_directory_uri() . '/main.js', array('jquery'),'1.1', true);
    wp_enqueue_script('main');

    

    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', ''.'4.1.1', true);
    wp_enqueue_script('bootstrap');

    
    }


    function my_videos( $meta_boxes ) {
        $prefix = '';
    
        $meta_boxes[] = array(
            'id' => 'my_videos',
            'title' => esc_html__( 'My Video', 'my-videos' ),
            'post_types' => array( 'video' ),
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => false,
            'fields' => array(
                array(
                    'id' => $prefix . 'vidoe_url',
                    'type' => 'text',
                    'name' => esc_html__( 'url', 'my-videos' ),
                ),
                array(
                    'id' => $prefix . 'embed',
                    'type' => 'text',
                    'name' => esc_html__( 'Embed', 'my-videos' ),
                ),
                array(
                    'id' => $prefix . 'aspect_ratio',
                    'name' => esc_html__( 'Aspect Ratio', 'my-videos' ),
                    'type' => 'select_advanced',
                    'placeholder' => esc_html__( 'Select Aspect Ratio', 'my-videos' ),
                    'options' => array(
                        '16:9' => 'Wide Screen',
                        '4:3' => 'Standard',
                    ),
                ),
            ),
        );
    
        return $meta_boxes;
    }

    function my_social( $meta_boxes ) {
        $prefix = '';
    
        $meta_boxes[] = array(
            'id' => 'github',
            'title' => esc_html__( 'My Social', 'my-social' ),
            'post_types' => array( 'social' ),
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => false,
            'fields' => array(
                array(
                    'id' => $prefix . 'github',
                    'type' => 'text',
                    'name' => esc_html__( 'Name', 'my-social' ),
                ),
                array(
                    'id' => $prefix . 'githuy_url',
                    'type' => 'url',
                    'name' => esc_html__( 'Social Url', 'my-social' ),
                ),
            ),
        );
    
        return $meta_boxes;
    }
    add_filter( 'rwmb_meta_boxes', 'my_social' );



    add_filter( 'rwmb_meta_boxes', 'my_videos' );
    
    add_action( 'wp_enqueue_scripts', 'adding_scripts' );

    function my_custom_sidebar() {
        register_sidebar(
            array (
                'name' => __( 'Robert\'s Sidebar', 'your-theme-domain' ),
                'id' => 'rob-sidebar',
                'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
                'before_widget' => '<div class="rob-custom-side">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="rob-custom-title">',
                'after_title' => '</h3>',
            )
        );
    }
    add_action( 'widgets_init', 'my_custom_sidebar' );



    // Added Code


    // Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('Robert\'s Widgit', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'New widget custom made by Rob', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );


// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
echo "<br>" . $description;
 
// This is where you run the code and display the output
echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />

</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
return $instance;
}
} // Class wpb_widget ends here



?>