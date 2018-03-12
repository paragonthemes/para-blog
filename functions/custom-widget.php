<?php

class Para_Blog_Author_Widget extends WP_Widget{
     public function __construct(){
          parent::__construct(
               'para-blog-author-widget',
               esc_html__( 'Para Blog Author', 'para-blog' ),
               array( 'description' => esc_html__( 'Place anywhere in the widget area.', 'para-blog' ) )
          );
     }
    
     public function widget( $args, $instance ){
          extract( $args );
        if(!empty($instance)){ 
         $image=$instance['image_uri'];
         $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
         $description=$instance['description'];
          if(!empty($title) || !empty($image) || !empty($description) ){
          ?>

              <section  class="widget author-widget">
                  <h2 class="widget-title"><span><?php if(isset($title)) { echo esc_html( $instance['title'] ); } ?></span></h2>
                  <?php
                  if(isset($image) && !empty( $image )) {
                      ?>
                      <figure class="author">
                          <img src="<?php echo esc_url( $instance['image_uri'] ); ?>">
                      </figure>
                      <?php
                  }
                  ?>

                  <p><?php if(isset($description)) {  echo wp_kses_post( $instance['description'] ); } ?></p>
              </section>
          <?php
        }
     }
   } 

     public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['description'] = wp_kses_post( $new_instance['description'] );
        $instance['image_uri'] = esc_url_raw( $new_instance['image_uri'] );
        return $instance;
     }

     public function form($instance ){
          ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e( 'Author Title', 'para-blog' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" value="<?php
                 if (isset($instance['title']) && $instance['title'] != '' ) :
                   echo esc_attr($instance['title']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('description')); ?>"><?php _e( 'Author Description', 'para-blog' ); ?></label><br />
                 <textarea  rows="8" name="<?php echo esc_attr( esc_attr( $this->get_field_name('description'))); ?>" id="<?php echo esc_attr( $this->get_field_id('description') ); ?>"  class="widefat" ><?php
                 
                   if (isset($instance['description']) && $instance['description'] != '' ) :
                      echo esc_textarea( $instance['description'] ); 
                    endif;
                  ?></textarea>
             </p>
              <p>
                 <label for="<?php echo esc_attr( $this->get_field_id('image_uri') ); ?>">
                     <?php _e( 'Select Image', 'para-blog' ); ?>
                 </label>
                  <br />
                 <?php
                     if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                         echo '<img class="custom_media_image" src="' . esc_url( $instance['image_uri'] ) . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                     endif;
                 ?>

                 <input type="text" class="widefat custom_media_url" name="<?php echo esc_attr( $this->get_field_name('image_uri') ); ?>" id="<?php echo esc_attr( $this->get_field_id('image_uri')); ?>" value="<?php 
                   if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                     echo esc_url( $instance['image_uri'] );
                    endif;
                  ?>">
                 <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo esc_attr( $this->get_field_name('image_uri')); ?>" value="<?php esc_attr_e('Upload Image','para-blog')?>" style="margin-top:5px;" />
             </p>
          <?php
     }
}
add_action( 'widgets_init', 'para_blog_author_widget' ); 
function para_blog_author_widget(){     
    register_widget( 'para_blog_Author_Widget' );

}

add_action( 'admin_enqueue_scripts', 'para_blog_press_widgets_backend_enqueue' ); 
function para_blog_press_widgets_backend_enqueue(){     
    wp_register_script( 'para-blog-custom-widgets', get_template_directory_uri().'/js/widget.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'para-blog-custom-widgets' );
}














