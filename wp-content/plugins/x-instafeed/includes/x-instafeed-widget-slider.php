<?php

/**
 * Advertisement Widget
 * Hasin Hayder
 */
class x_instafeed_Widget_Slider extends WP_Widget{

    /**
     * Register widget with WordPress.
     */
        public function __construct() {
        $widget_ops = array(
            'classname' => 'x_instafeed_slider',
            'description' => __( 'For Your site show instgram photo slider.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'x_instafeed_slider', __( 'X Instafeed Slider','xpro' ), $widget_ops );
        $this->alt_option_name = 'x_instafeed_slider';
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
        $ftext = isset($instance['ftext'])?$instance['ftext']:__('FOLLOW ON @INSTAGRAM','x-instafeed');
        $furl = isset($instance['furl'])?$instance['furl']:'';
        $limit = isset($instance['limit'])?$instance['limit']:'6';
        $imgshow = isset($instance['imgshow'])?$instance['imgshow']:'1';
        $order = isset($instance['order'])?$instance['order']:'most-recent';
        $imgsize = isset($instance['imgsize'])?$instance['imgsize']:'low_resolution';
        $linking = isset( $instance['linking'] ) ? (bool) $instance['linking'] : false;
        $autoplay = isset( $instance['autoplay'] ) ? (bool) $instance['autoplay'] : true;
        $dots = isset( $instance['dots'] ) ? (bool) $instance['dots'] : false;
        $nav = isset( $instance['nav'] ) ? (bool) $instance['nav'] : false;
        $fbtn = isset( $instance['fbtn'] ) ? (bool) $instance['fbtn'] : true;

        echo $args['before_widget'];
        ?>
        <div class="xinsta-widget">
            <?php
            if(isset($instance['title']) && $instance['title']!='') {
                echo wp_kses_post($args['before_title']);
                echo apply_filters('widget_title', $instance['title']);
                echo wp_kses_post($args['after_title']);
            }
            $xinsta_rand_number = rand(2354158, 56946582);
            ?>
            <div class="xinsta-slider">
                <div class="xinsta-items">
                 <script type="text/javascript">
                    (function ($) {
                         "use strict";
                    $(document).ready(function(){
        
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
                          after: function () {
                                var xinsta_slider = $('#xinsta-show<?php echo $xinsta_rand_number; ?>');
                                xinsta_slider.owlCarousel({
            <?php if( $imgshow== 1 ): ?>animateOut: 'fadeOut',
                                    animateIn: 'fadeIn',<?php endif; ?>
                                    autoplay:<?php if($autoplay == 1): ?>true<?php else: ?>false<?php endif; ?>,
                                    autoplayTimeout:5000,
                                    autoplayHoverPause:true,
                                    dots:true,
                                    dotsEach:true,
                                    nav:true,
                                    items:<?php echo esc_attr($imgshow); ?>,
                                    loop:true,
                                    smartSpeed:450,
                                });
                            }
                        });
                        userFeed<?php echo $xinsta_rand_number; ?>.run();
                    });
                 }(jQuery)); 
                 </script>
                 <div class="xinsta-show owl-carousel <?php if($nav==1): ?>shownav <?php endif; ?><?php if($dots==1): ?>showdots<?php endif; ?>" id="xinsta-show<?php echo $xinsta_rand_number; ?>"></div>
                </div>
                <?php if( $fbtn== true ): ?>
                <div class="insta-follow">
                    <a target="_balnk" href="<?php echo esc_url($furl); ?>" class="insta-link"><?php echo esc_html($ftext); ?></a>   
                </div>
                <?php endif; ?>
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
        $instance['ftext'] = sanitize_text_field($new_instance['ftext']);
        $instance['furl'] = esc_url($new_instance['furl']);
        
        $instance['limit'] = isset($new_instance['limit'])?$new_instance['limit']: '6';
        $instance['imgshow'] = isset($new_instance['imgshow'])?$new_instance['imgshow']: '1';
        $instance['order'] = isset($new_instance['order'])?$new_instance['order']: 'most-recent';
        $instance['imgsize'] = isset($new_instance['imgsize'])?$new_instance['imgsize']: 'low_resolution';
       $instance['linking'] = !empty($new_instance['linking']) ? true : false;
       $instance['autoplay'] = !empty($new_instance['autoplay']) ? true : false;
       $instance['dots'] = !empty($new_instance['dots']) ? true : false;
       $instance['nav'] = !empty($new_instance['nav']) ? true : false;
       $instance['fbtn'] = !empty($new_instance['fbtn']) ? true : false;

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
        $ftext = isset($instance['ftext'])?$instance['ftext']:__('FOLLOW ON @INSTAGRAM','x-instafeed');
        $furl = isset($instance['furl'])?$instance['furl']:'';
        $userid = isset($instance['userid'])?$instance['userid']:'';
        $accesstoken = isset($instance['accesstoken'])?$instance['accesstoken']:'';
        $limit = isset($instance['limit'])?$instance['limit']:'6';
        $imgshow = isset($instance['imgshow'])?$instance['imgshow']:'1';
        $order = isset($instance['order'])?$instance['order']:'most-recent';
        $imgsize = isset($instance['imgsize'])?$instance['imgsize']:'low_resolution';
        $linking = isset( $instance['linking'] ) ? (bool) $instance['linking'] : false;
        $autoplay = isset( $instance['autoplay'] ) ? (bool) $instance['autoplay'] : true;
        $dots = isset( $instance['dots'] ) ? (bool) $instance['dots'] : false;
        $nav = isset( $instance['nav'] ) ? (bool) $instance['nav'] : false;
        $fbtn = isset( $instance['fbtn'] ) ? (bool) $instance['fbtn'] : true;

   

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
            <label for="<?php echo esc_attr($this->get_field_id('imgshow')); ?>"><?php esc_html_e('Image show at a time:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('imgshow')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('imgshow')); ?>" type="number"
                   value="<?php echo esc_attr($imgshow); ?>"/>
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
            <label for="<?php echo esc_attr($this->get_field_id('ftext')); ?>"><?php esc_html_e('Instagram follow button text:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ftext')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('ftext')); ?>" type="text"
                   value="<?php echo esc_attr($ftext); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('furl')); ?>"><?php esc_html_e('Instagram follow button url:','x-instafeed'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('furl')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('furl')); ?>" type="text"
                   value="<?php echo esc_attr($furl); ?>"/>
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('linking'); ?>" name="<?php echo $this->get_field_name('linking'); ?>"<?php checked( $linking ); ?> />
        <label for="<?php echo $this->get_field_id('linking'); ?>"><?php esc_html_e( 'Add image link?','x-instafeed' ); ?></label><br />
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>"<?php checked( $autoplay ); ?> />
        <label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php esc_html_e( 'Active slider autoplay?','x-instafeed' ); ?></label><br />
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dots'); ?>" name="<?php echo $this->get_field_name('dots'); ?>"<?php checked( $dots ); ?> />
        <label for="<?php echo $this->get_field_id('dots'); ?>"><?php esc_html_e( 'Show slider dots?','x-instafeed' ); ?></label><br />
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('nav'); ?>" name="<?php echo $this->get_field_name('nav'); ?>"<?php checked( $nav ); ?> />
        <label for="<?php echo $this->get_field_id('nav'); ?>"><?php esc_html_e( 'Show slider nav?','x-instafeed' ); ?></label><br />
        </p>
        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('fbtn'); ?>" name="<?php echo $this->get_field_name('fbtn'); ?>"<?php checked( $fbtn ); ?> />
        <label for="<?php echo $this->get_field_id('fbtn'); ?>"><?php esc_html_e( 'Show slider follow button?','x-instafeed' ); ?></label><br />
        </p>
    <?php
    }
}




function x_instafeed_widget_slider(){
    register_widget( 'x_instafeed_Widget_Slider' );
}
add_action('widgets_init','x_instafeed_widget_slider');