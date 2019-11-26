<?php

/**
 * Advertisement Widget
 * Hasin Hayder
 */
class x_instafeed_Widget extends WP_Widget{

    /**
     * Register widget with WordPress.
     */
        public function __construct() {
        $widget_ops = array(
            'classname' => 'x_instafeed',
            'description' => __( 'For Your theme show instgram photo.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'x_instafeed', __( 'X Instafeed','xpro' ), $widget_ops );
        $this->alt_option_name = 'x_instafeed';
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
       
        $userid = isset($instance['userid'])?$instance['userid']:'';
        $accesstoken = isset($instance['accesstoken'])?$instance['accesstoken']:'';
        $limit = isset($instance['limit'])?$instance['limit']:'6';
        $order = isset($instance['order'])?$instance['order']:'most-recent';
        $imgsize = isset($instance['imgsize'])?$instance['imgsize']:'thumbnail';
        $column = isset($instance['column'])?$instance['column']:'two-column';
        $linking = isset( $instance['linking'] ) ? (bool) $instance['linking'] : false;

        echo $args['before_widget'];
        ?>
        <div class="xinsta-widget">
            <?php
            if(isset($instance['title']) && $instance['title']!='') {
                echo wp_kses_post($args['before_title']);
                echo apply_filters('widget_title', $instance['title']);
                echo wp_kses_post($args['after_title']);
            }
            $xinsta_rand_number = rand(235415, 5694658);
            ?>
            <div class="xinsta-info">
                <div class="xinsta-items <?php echo esc_attr($column); ?>">
                 <script type="text/javascript">
                     var userFeed<?php echo $xinsta_rand_number; ?> = new Instafeed({
                          get: 'user',
                          userId: '<?php echo esc_attr($userid); ?>' ,
                          accessToken: '<?php echo esc_attr($accesstoken); ?>',
                          <?php if(!empty($linking)): ?>
                          template: '<div class="item"><a class="insta-link" href="{{link}}"><img src="{{image}}" alt="<?php esc_attr_e('Instagram photo','x-instafeed'); ?>" /></a></div>',
                          <?php else: ?>
                          template: '<div class="item"><img src="{{image}}" alt="<?php esc_attr_e('Instagram photo','x-instafeed'); ?>" /></div>',
                          <?php endif; ?>
                          target: 'xinsta-show<?php echo $xinsta_rand_number; ?>',
                          limit: <?php echo esc_attr($limit); ?>,
                          sortBy: '<?php echo esc_attr($order); ?>',
                          <?php if(empty($linking)): ?>
                          links: false,
                        <?php endif; ?>
                          resolution: '<?php echo esc_attr($imgsize); ?>',
                        });
                        userFeed<?php echo $xinsta_rand_number; ?>.run();
                 </script>
                 <div class="xinsta-show <?php if(!empty($linking)): ?>insta-link<?php else: ?>insta-img<?php endif; ?>" id="xinsta-show<?php echo $xinsta_rand_number; ?>"></div>
                </div>
                
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['userid'] = sanitize_text_field($new_instance['userid']);
        $instance['accesstoken'] = sanitize_text_field($new_instance['accesstoken']);
        
        $instance['limit'] = isset($new_instance['limit'])?$new_instance['limit']: 6;
        $instance['order'] = isset($new_instance['order'])?$new_instance['order']: 'most-recent';
        $instance['imgsize'] = isset($new_instance['imgsize'])?$new_instance['imgsize']: 'thumbnail';
        $instance['column'] = isset($new_instance['column'])?$new_instance['column']: 'two-column';
       $instance['linking'] = !empty($new_instance['linking']) ? true : false;

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

        $title = isset($instance['title'])?$instance['title']:'';
        $userid = isset($instance['userid'])?$instance['userid']:'';
        $accesstoken = isset($instance['accesstoken'])?$instance['accesstoken']:'';
        $limit = isset($instance['limit'])?$instance['limit']:'6';
        $order = isset($instance['order'])?$instance['order']:'most-recent';
        $imgsize = isset($instance['imgsize'])?$instance['imgsize']:'thumbnail';
        $column = isset($instance['column'])?$instance['column']:'two-column';
        $linking = isset( $instance['linking'] ) ? (bool) $instance['linking'] : false;

   

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:','xpro'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>

        </p>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('userid')); ?>"><?php esc_html_e('Instagram User Id:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('userid')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('userid')); ?>" type="text"
                   value="<?php echo esc_attr($userid); ?>"/>
        <?php $idlink = '<a target="_blank" href="'.esc_url('https://codeofaninja.com/tools/find-instagram-user-id').'">'.esc_html('here','x-instafeed').'</a>'; ?>
            <span class="description"><?php printf(esc_html('Enter your instgram user id. Get your id','x-instafeed').' %s',$idlink); ?></span>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('accesstoken')); ?>"><?php esc_html_e('Instagram Access Token:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('accesstoken')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('accesstoken')); ?>" type="text"
                   value="<?php echo esc_attr($accesstoken); ?>"/>
            <?php $idlink = '<a target="_blank" href="'.esc_url('http://instagram.pixelunion.net/').'">'.esc_html('access token','x-instafeed').'</a>'; ?>
            <span class="description"><?php printf(esc_html('Get your ','x-instafeed').' %s',$idlink); ?></span>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_html_e('Image number:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="number"
                   value="<?php echo esc_attr($limit); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php esc_html_e('Image shortby:','x-instafeed'); ?></label>
            <select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
                <option value="most-recent" <?php selected( $order, 'most-recent'); ?>>
                    <?php echo esc_html_e('&mdash; Most recent &mdash;','x-instafeed'); ?>
                </option>
                <option value="most-liked" <?php selected( $order, 'most-liked' ); ?>>
                    <?php echo esc_html_e('&mdash; Most liked &mdash;','x-instafeed'); ?>
                </option>
                <option value="most-commented" <?php selected( $order, 'most-commented' ); ?>>
                    <?php echo esc_html_e('&mdash; Most commented &mdash;','x-instafeed'); ?>
                </option>
                <option value="random" <?php selected( $order, 'random'); ?>>
                    <?php echo esc_html_e('&mdash; Random &mdash;','x-instafeed'); ?>
                </option>
                
             </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'imgsize' ); ?>"><?php esc_html_e('Image size:','x-instafeed'); ?></label>
            <select id="<?php echo $this->get_field_id( 'imgsize' ); ?>" name="<?php echo $this->get_field_name( 'imgsize' ); ?>">
                <option value="thumbnail" <?php selected( $imgsize, 'thumbnail'); ?>>
                    <?php echo esc_html_e('Small size (150px * 150px)','x-instafeed'); ?>
                </option>
                <option value="low_resolution" <?php selected( $imgsize, 'low_resolution' ); ?>>
                    <?php echo esc_html_e(' Medium size (306px * 306px)','x-instafeed'); ?>
                </option>
                <option value="standard_resolution" <?php selected( $imgsize, 'standard_resolution' ); ?>>
                    <?php echo esc_html_e('Large size (612px * 612px)','x-instafeed'); ?>
                </option>
                
             </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'column' ); ?>"><?php esc_html_e('Image column:','x-instafeed'); ?></label>
            <select id="<?php echo $this->get_field_id( 'column' ); ?>" name="<?php echo $this->get_field_name( 'column' ); ?>">
                <option value="one-column" <?php selected( $column, 'one-column'); ?>>
                    <?php echo esc_html_e('One column','x-instafeed'); ?>
                </option>
                <option value="two-column" <?php selected( $column, 'two-column' ); ?>>
                    <?php echo esc_html_e('Two column','x-instafeed'); ?>
                </option>
                <option value="three-column" <?php selected( $column, 'three-column' ); ?>>
                    <?php echo esc_html_e('Three column','x-instafeed'); ?>
                </option>
                
             </select>
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('linking'); ?>" name="<?php echo $this->get_field_name('linking'); ?>"<?php checked( $linking ); ?> />
        <label for="<?php echo $this->get_field_id('linking'); ?>"><?php esc_html_e( 'Add image link?','x-instafeed' ); ?></label><br />
        </p>
    <?php
    }
}




function x_instafeed_widget(){
    register_widget( 'x_instafeed_Widget' );
}
add_action('widgets_init','x_instafeed_widget');

//Admin notice 
if( !function_exists('x_instafeed_admin_notice')):
function x_instafeed_admin_notice() {
    global $pagenow;
    if( $pagenow != 'themes.php' ){
        return;
    }

    $class = 'notice notice-success is-dismissible';
    $url1 = esc_url('https://wpthemespace.com/themes');

    $message = __( '<strong><span style="color:red;">Recommended WordPress Theme:</span>  <span style="color:green"> If you find a Secure, SEO friendly, full functional premium WordPress theme for your site then </span>  </strong>', 'niso' );

    printf( '<div class="%1$s" style="padding:10px 15px 20px;"><p>%2$s <a href="%3$s" target="_blank">'.__('see here','niso' ).'</a>.</p><a target="_blank" class="button button-danger" href="%3$s" style="margin-right:10px">'.__('View WordPress Theme','niso').'</a></div>', esc_attr( $class ), wp_kses_post( $message ),$url1 ); 
}
add_action( 'admin_notices', 'x_instafeed_admin_notice' );
endif;