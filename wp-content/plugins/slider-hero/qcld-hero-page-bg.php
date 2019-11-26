<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//add_action( 'add_meta_boxes', 'sh_meta_box_video' );
function sh_meta_box_video()
{					                  // --- Parameters: ---
    add_meta_box( 'qc-hero-meta-box-id', // ID attribute of metabox
                  'Use Slider Hero Effect as Full Page Background (Experimental)',       // Title of metabox visible to user
                  'sh_meta_box_callback', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'side',            // Where on the page to show the box
                  'low' );            // Priority of box in display order
}

function sh_meta_box_callback( $post )
{
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['sh_meta_box_bg_effect'] ) ? $values['sh_meta_box_bg_effect'][0] : '';

    wp_nonce_field( 'sh_my_meta_box_nonce', 'sh_meta_box_nonce' );
    ?>
    <p>
		
        <label for="sh_meta_box_bg_effect"><p>Choose Background Effect</p></label>
		<select name="sh_meta_box_bg_effect" id="sh_meta_box_bg_effect">
			<option value="">None</option>
			<option value="stars_effect"<?php echo ($selected=='stars_effect'?'selected="selected"':''); ?>>Stars Effect (for Dark background)</option>
			<option value="distance"<?php echo ($selected=='distance'?'selected="selected"':''); ?>>Distance Effect</option>
			<option value="valentine"<?php echo ($selected=='valentine'?'selected="selected"':''); ?>>Valentine Effect</option>
			<option value="firework"<?php echo ($selected=='firework'?'selected="selected"':''); ?>>Firework Effect (for Dark background)</option>
			<option value="cosmic_web"<?php echo ($selected=='cosmic_web'?'selected="selected"':''); ?>>Cosmic Web Effect</option>
			<option value="just_cloud"<?php echo ($selected=='just_cloud'?'selected="selected"':''); ?>>Just Cloud Effect</option>
			<option value="link_particle"<?php echo ($selected=='link_particle'?'selected="selected"':''); ?>>Link Particle Effect</option>
			<option value="particle_nasa"<?php echo ($selected=='particle_nasa'?'selected="selected"':''); ?>>Particle Nasa Effect</option>
			<option value="particle"<?php echo ($selected=='particle'?'selected="selected"':''); ?>>Particle Effect</option>
			<option value="water_swimming"<?php echo ($selected=='water_swimming'?'selected="selected"':''); ?>>Water Swimming Effect</option>
			<option value="particle_snow"<?php echo ($selected=='particle_snow'?'selected="selected"':''); ?>>Particle Snow Effect</option>
			<option value="the_great_attractor"<?php echo ($selected=='the_great_attractor'?'selected="selected"':''); ?>>The Great Attractor</option>
		</select>
    </p>
    <p><b>It Does not work?</b> <br> Some themes add background color in main content section in that case it would not show up. You can enable our css override feature from <a href="<?php echo admin_url().'admin.php?page=sh-options-page' ?>" target="_blank">Slider Hero>Settings>General>Enable CSS Override for page Background</a> it may work.</p>
	<p><b>Still does not work?</b><br>Please send us an email at <a href="mailto:quantumcloud@gmail.com">quantumcloud@gmail.com</a></p>
    <?php
}

add_action( 'save_post', 'sh_meta_box_video_save' );
function sh_meta_box_video_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['sh_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['sh_meta_box_nonce'], 'sh_my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    //if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['sh_meta_box_bg_effect'] ) )
        update_post_meta( $post_id, 'sh_meta_box_bg_effect', $_POST['sh_meta_box_bg_effect'] );

}

add_action('template_redirect', 'qc_sh_bg_animation');
function qc_sh_bg_animation(){
	if(is_page()){
		
		global $post;
		$pageid = $post->ID;
		$meta = get_post_meta($pageid, 'sh_meta_box_bg_effect');
		
		if(!empty($meta)){
			if($meta[0]=='stars_effect'){
				wp_enqueue_script( 'qcld_hero_bird_custom_js', QCLD_sliderhero_js . "/pagebg/stars_effect.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='distance'){
				wp_enqueue_script( 'qcld_hero_bird_custom_js', QCLD_sliderhero_js . "/pagebg/distance.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='valentine'){
				wp_enqueue_script( 'qcld_hero_bird_custom_js', QCLD_sliderhero_js . "/pagebg/valentine.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='cosmic_web'){
				wp_enqueue_script( 'qcld_hero_cosmic_web_js', QCLD_sliderhero_js . "/pagebg/cosmic_web.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='just_cloud'){
				wp_enqueue_script( 'qcld_hero_just_cloud_twinmax_js', QCLD_sliderhero_js . "/qcmax.js", array('jquery'));
				wp_enqueue_script( 'qcld_hero_just_cloud_js', QCLD_sliderhero_js . "/pagebg/just_cloud.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after_just_cloud');
			}
			elseif($meta[0]=='link_particle'){
				wp_enqueue_script( 'qcld_hero_underscore_js', QCLD_sliderhero_js . "/underscore-min.js", array('jquery'));
				wp_enqueue_script( 'qcld_hero_link_particle_js', QCLD_sliderhero_js . "/pagebg/link_particle.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='particle_nasa'){
				
				wp_enqueue_script( 'qcld_hero_particles_js', QCLD_sliderhero_js . '/particles.js', array(), false, false );
				wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_sliderhero_js . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
				
				add_filter('the_content', 'sh_wpdev_before_after_nasa');
			}elseif($meta[0]=='particle'){
				
				wp_enqueue_script( 'qcld_hero_particles_js', QCLD_sliderhero_js . '/particles.js', array(), false, false );
				wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_sliderhero_js . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
				
				add_filter('the_content', 'sh_wpdev_before_after_particle');
			}
			elseif($meta[0]=='firework'){
				wp_enqueue_script( 'qcld_hero_firework_stage_js', QCLD_sliderhero_js . "/stage.js", array('jquery'));
				wp_enqueue_script( 'qcld_hero_firework_math_js', QCLD_sliderhero_js . "/math.js", array('jquery'));
				wp_enqueue_script( 'qcld_firework_js', QCLD_sliderhero_js . "/pagebg/firework.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after_firework');
			}elseif($meta[0]=='water_swimming'){
				wp_enqueue_script( 'qcld_firework_js', QCLD_sliderhero_js . "/pagebg/water_swimming.js", array('jquery'));
				add_filter('the_content', 'sh_wpdev_before_after');
			}elseif($meta[0]=='particle_snow'){
				wp_enqueue_script( 'qcld_hero_particles_js', QCLD_sliderhero_js . '/particles.js', array(), false, false );
				wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_sliderhero_js . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
				add_filter('the_content', 'sh_wpdev_before_after_snow');
			}
			elseif($meta[0]=='the_great_attractor'){
				wp_enqueue_script( 'qcld_hero_particles_js', QCLD_sliderhero_js . '/particles.js', array(), false, false );
				wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_sliderhero_js . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
				add_filter('the_content', 'sh_wpdev_before_after_snow_the_great');
			}
			add_filter('the_content', 'sh_wpdev_before_after_css_override');
		}
		
	}
}
function sh_wpdev_before_after_css_override($content) {
	$data='';
	$options = get_option('sh_plugin_options');
	if(isset($options['hero_enable_css_override']) && $options['hero_enable_css_override']=='on'){
		$data .='<style type="text/css">';
		if(wp_get_theme()=='Divi'){
			$data .='#main-content{background-color: transparent !important;}';
		}
		if(wp_get_theme()=='Mobius'){
			$data .='#inner-container{background: transparent !important;}';
		}
		if(wp_get_theme()=='Avada'){
			$data .='#fusion-gmap-container, #main, #sliders-container, #wrapper, .fusion-separator .icon-wrapper, body, html{background-color: transparent !important;}';
		}
		if(wp_get_theme()=='Agile | Shared By VestaThemes.com'){
			$data .='#container{background: transparent !important;}';
		}
		if(wp_get_theme()=='Betheme'){
			$data .='#Wrapper, #Content{background-color: transparent !important;}';
		}
		if(wp_get_theme()=='The7'){
			$data .='#page{background: transparent !important;}';
		}
		
		$customCss = get_option( 'sh_plugin_options' );
		$data .= @$customCss['sh_custom_style'];
		
		$data .='</style>';
	}

	return $data.$content;
}
function sh_wpdev_before_after($content) {
	$data = '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"></div>';
	return $data.$content;
}
function sh_wpdev_before_after_nasa($content) {
	$data = '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"></div>';
	return $data.$content.'<script type="text/javascript" src="'.QCLD_sliderhero_js.'/pagebg/nasa.js"></script>';
}function sh_wpdev_before_after_snow($content) {
	$data = '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"></div>';
	return $data.$content.'<script type="text/javascript" src="'.QCLD_sliderhero_js.'/pagebg/snow.js"></script>';
}



function sh_wpdev_before_after_snow_the_great($content) {
	$data = '';
	$data .='<style type="text/css"> @-webkit-keyframes rotate{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-moz-keyframes rotate{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-o-keyframes rotate{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes rotate{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.slider-hero-m-intro{text-align:center;display:flex;align-items:center;justify-content:center;height:100%;margin:0 auto;min-width:785px;overflow:hidden;position:relative}.slider-hero-m-intro:after,.slider-hero-m-intro:before{display:block;content:" ";width:2560px;height:2560px;position:absolute;margin-top:-1280px;margin-left:-1280px;transform-origin:center;background-position:center;background-repeat:no-repeat;z-index:50;top:50%;left:50%}.slider-hero-m-intro:before{background-image:url('.QCLD_sliderhero_IMAGES.'/circle_inner.png);background-size:100% auto;-webkit-animation:rotate 30s infinite linear;-moz-animation:rotate 30s infinite linear;-o-animation:rotate 30s infinite linear;animation:rotate 30s infinite linear}.slider-hero-m-intro:after{background-image:url('.QCLD_sliderhero_IMAGES.'/circle_outer.png);background-size:100% auto;-webkit-animation:rotate 80s infinite linear;-moz-animation:rotate 80s infinite linear;-o-animation:rotate 80s infinite linear;animation:rotate 80s infinite linear}.slider-hero-e-particles-orange{position:absolute;border-radius:50%;top:50%;left:50%;z-index:5;width:1000px;height:600px;opacity:.4;transform:translate(-50%,-50%)}.slider-hero-e-particles-blue{position:absolute;top:0;left:0;z-index:5;width:100%;height:100%;opacity:.1}
</style>';
	
	$data .= '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"><div class="slider-hero-m-intro"><div id="slider-hero-particleCanvas-Orange" class="slider-hero-e-particles-orange"></div><div id="slider-hero-particleCanvas-Blue" class="slider-hero-e-particles-blue"></div></div></div>';
	return $data.$content.'<script type="text/javascript" src="'.QCLD_sliderhero_js.'/pagebg/the_great_attractor.js"></script>';
}

function sh_wpdev_before_after_particle($content) {
	$data = '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"></div>';
	return $data.$content.'<script type="text/javascript" src="'.QCLD_sliderhero_js.'/pagebg/particle.js"></script>';
}
function sh_wpdev_before_after_just_cloud($content) {
	$data = '';
	$data .='<style type="text/css">#hero_just_clouds{background:url("'.QCLD_sliderhero_IMAGES.'/just-clouds.png")repeat 0 0 transparent;width:100%;height:190px;}#qc_hero_page_bg{background:#ACE6FF !important;}</style>';
	
	$data .= '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;"><div id="hero_just_clouds"></div></div>';
	return $data.$content;
}
function sh_wpdev_before_after_firework($content) {
	$data = '';
	$data .= '<div id="qc_hero_page_bg" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;bottom: 0;z-index: -1;">';
	$data  .= '<div id="hero-canvas-container"><canvas id="trails-canvas"></canvas><canvas id="main-canvas"></canvas></div>';
	$data .='</div>';
	return $data.$content;
}