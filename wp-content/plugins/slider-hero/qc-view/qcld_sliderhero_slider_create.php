<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


function qcld_sliderhero_sliders_type() { 
$effects = array(
'No Effect','Intro Builder','Aeronautics Effect','Antigravity Flow','Balls &amp; Gravity Effect','Bird Flying Effect','Blob Effect','Blade Effect','Blur Effect','Bubble','Campfire','Circle Circle Intersection','Cloudy Sky Effect','Confetti Effect','Cosmic Web','Colorful Particle','Cursor And Paint','Day Night Effect','Division Effect','Directional Force','Distance','Electric Clock','Firework','Fizzy Sparks','Float and Rain','Floating Leafs','Flowing Circle Effect','Flying Rocket Effect','Grid Effect','Helix Corruption','Helix Chaos','Helix Multiple','Glitch','Iconsahedron Effect','Intersecting Line Effect','Just Cloud','Link Particle','Liquid Landscape','Matrix Effect','Metaballs','Microcosm Effect','Moving Color Wave','NASA','Neno Hexagon','Noise Effect','Nyan Cat','Orbital Effect','Particle Effect','Particle Helix','Particle System','Hacker','Physics Bug','Racing Particles','Rain Effect','Rainy Season','Rays and Particles','Play or Work?','Rain Of Line','Rising and falling cubes','Shape Animation','Space Elevator','Snow Effect','Squidematics','Stars Effect','Stellar Cloud','Subvisual','Tag Canvas','The Great Attractor','Thibaut','Tiny Galaxy Effect','Torus of Cubes','Water Effect','Wave Effect','Wave Animation Effect','Waaave Canvas','Walking Background','Warp Speed','Water Swimming','Waving Cloth','Water Droplet','Wormhole Effect','Word Cloud','Valentine Effect','Ygekpg Effect',
);
?>

	<div class="qchero_sliders_list_wrapper">
		<div class="sliderhero_menu_title">
			<h2 style="font-size: 26px;">Slider-Hero</h2>
		</div>
		<p class="hero_create_slider_header">Choose an Effect to Start Creating a New Slider. Choose "No Effect" if You Want a Simple Image Slider or only Video Background.</p>
		<div class="form_wrapper_sliderhero">
			
			<div class="hero-intro-effect">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=intro'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/intro_effect.jpg' ?>" alt="Intro Builder" />
					
				</a>
			</div>
			
			<div class="effect_selection_area">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=no_effect'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/no-effect.jpg' ?>" alt="" />
					<p>No Effect</p>
				</a>
				
				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/default.jpg' ?>" alt="" />
					<p>Particle Effect</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_snow'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/snow.jpg' ?>" alt="" />
					<p>Snow Effect</p>
				</a>

				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_nasa'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/nasa.jpg' ?>" alt="" />
					<p>NASA</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_bubble'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/bubble.jpg' ?>" alt="" />
					<p>Bubble</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=nyan_cat'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/nyan_cat.jpg' ?>" alt="" />
					<p>Nyan Cat</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=cubes_animation'); ?>">
					<img src="<?php echo qcld_sliderhero_images.'/cubes_animation.jpg' ?>" alt="" />
					<p>Cubes Animation</p>
				</a>
				
				
				<div style="clear:both"></div>
				<p style="font-size: 17px;color: red;text-align:center">Note: You can add Youtube Video as Slider background for all of the above slider effects except for Intro builder & Cubes Animation.</p>
				
				<div class="hero_pro_effects" style="clear:both;float:none;display:table;height: 195px;
    margin: 0 auto; margin-top: 54px;">
			
				<div class="unlink-pro">
					<img src="<?php echo qcld_sliderhero_images.'/custom_video.png' ?>" alt="Video" />
					<p>Custom Video Slider <span>[PRO]</span></p>
				</div>
				<div class="unlink-pro">
					<img src="<?php echo qcld_sliderhero_images.'/youtube_video.png' ?>" alt="Youtube Video" />
					<p>Youtube Video Slider <span>[PRO]</span></p>
				</div>
				<div class="unlink-pro">
					<img src="<?php echo qcld_sliderhero_images.'/vimeo_video.png' ?>" alt="Vimeo Video" />
					<p>Vimeo Video Slider <span>[PRO]</span></p>
				</div>
			
			</div>
				
				<div class="hero_pro_effects">
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/aeronautics.jpg' ?>" alt="Aeronautics Effect" />
						<p>Aeronautics Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/antigravity.jpg' ?>" alt="Antigravity Flow" />
						<p>Antigravity Flow<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/animated_cloud.jpg' ?>" alt="Animated Cloud" />
						<p>Animated Cloud<span>[PRO]</span></p>
					</div>
					
					
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/ballsgravity.jpg' ?>" alt="Balls & Gravity Effect" />
						<p>Balls & Gravity Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/bird.png' ?>" alt="Bird Flying Effect" />
						<p>Bird Flying Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/blob.jpg' ?>" alt="Blob Effect" />
						<p>Blob Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/glitch.jpg' ?>" alt="Blade Effect" />
						<p>Blade Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/blur.jpg' ?>" alt="Blur Effect" />
						<p>Blur Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/campfire.jpg' ?>" alt="Campfire" />
						<p>Campfire<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/circle.jpg' ?>" alt="Circle Circle Intersection" />
						<p>Circle Circle Intersection<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/cloudysky.jpg' ?>" alt="Cloudy Sky Effect" />
						<p>Cloudy Sky Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/confetti.jpg' ?>" alt="Confetti Effect" />
						<p>Confetti Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/cosmic_web.jpg' ?>" alt="Cosmic Web" />
						<p>Cosmic Web<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/colorful_particle.jpg' ?>" alt="Colorful Particle" />
						<p>Colorful Particle<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/cursorandpaint.jpg' ?>" alt="Cursor And Paint" />
						<p>Cursor And Paint<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/daynight.jpg' ?>" alt="Day Night Effect" />
						<p>Day Night Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/division.jpg' ?>" alt="Division Effect" />
						<p>Division Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/directional.jpg' ?>" alt="Directional Force" />
						<p>Directional Force<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/distance.jpg' ?>" alt="Distance" />
						<p>Distance<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/electric_clock.jpg' ?>" alt="Electric Clock" />
						<p>Electric Clock<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/firework.jpg' ?>" alt="Firework" />
						<p>Firework<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/fizzy_sparks.jpg' ?>" alt="Fizzy Sparks" />
						<p>Fizzy Sparks<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/floatrain.jpg' ?>" alt="Float and Rain" />
						<p>Float and Rain<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/floatingleafs.png' ?>" alt="Floating Leafs" />
						<p>Floating Leafs<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/flowingcircle.jpg' ?>" alt="Flowing Circle Effect" />
						<p>Flowing Circle Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/flyingrocket.jpg' ?>" alt="Flying Rocket Effect" />
						<p>Flying Rocket Effect<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/grid.jpg' ?>" alt="Grid Effect" />
						<p>Grid Effect<span>[PRO]</span></p>
					</div>

					
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/corruption.jpg' ?>" alt="Helix Corruption" />
						<p>Helix Corruption<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/chaos.jpg' ?>" alt="Helix Chaos" />
						<p>Helix Chaos<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/helix_multiple.jpg' ?>" alt="Helix Multiple" />
						<p>Helix Multiple<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/hero_404.jpg' ?>" alt="Glitch" />
						<p>Glitch<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/iconsahedron.jpg' ?>" alt="Iconsahedron Effect" />
						<p>Iconsahedron Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/line.jpg' ?>" alt="Intersecting Line Effect" />
						<p>Intersecting Line Effect<span>[PRO]</span></p>
					</div>
					
					

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/just_cloud.jpg' ?>" alt="Just Cloud" />
						<p>Just Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/link_particle.jpg' ?>" alt="Link Particle" />
						<p>Link Particle<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/liquid_landscape.jpg' ?>" alt="Liquid Landscape" />
						<p>Liquid Landscape<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/matrix.jpg' ?>" alt="Matrix Effect" />
						<p>Matrix Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/metaballs.jpg' ?>" alt="Metaballs" />
						<p>Metaballs<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/microcosm.jpg' ?>" alt="Microcosm Effect" />
						<p>Microcosm Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/svg_animation.jpg' ?>" alt="Moving Color Wave" />
						<p>Moving Color Wave<span>[PRO]</span></p>
					</div>

								
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/neno_hexagon.jpg' ?>" alt="Neno Hexagon" />
						<p>Neno Hexagon<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/noise_particle.jpg' ?>" alt="Noise Effect" />
						<p>Noise Effect<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/orbital.jpg' ?>" alt="Orbital Effect" />
						<p>Orbital Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/helix.jpg' ?>" alt="Particle Helix" />
						<p>Particle Helix<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/particle_system.jpg' ?>" alt="Particle System" />
						<p>Particle System<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/pretent_hacker.jpg' ?>" alt="Hacker" />
						<p>Hacker<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/physics_bug.jpg' ?>" alt="Physics Bug" />
						<p>Physics Bug<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/racing_particles.jpg' ?>" alt="Racing Particles" />
						<p>Racing Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/rain.jpg' ?>" alt="Rain Effect" />
						<p>Rain Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/rainy_season.jpg' ?>" alt="rainy_season" />
						<p>Rainy Season<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/rays_particles.jpg' ?>" alt="Rays and Particles" />
						<p>Rays and Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/ripples.jpg' ?>" alt="Ripples" />
						<p>Ripples Effect<span>[PRO]</span></p>
					</div>
					
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/hero_game.jpg' ?>" alt="Play or Work?" />
						<p>Play or Work?<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/rainofline.jpg' ?>" alt="Rain Of Line" />
						<p>Rain Of Line<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/rising_cubes.jpg' ?>" alt="Rising and falling cubes" />
						<p>Rising and falling cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/shapanimation.jpg' ?>" alt="Shape Animation" />
						<p>Shape Animation<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/space_elevator.jpg' ?>" alt="Space Elevator" />
						<p>Space Elevator<span>[PRO]</span></p>
					</div>
					
									
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/squidematics.jpg' ?>" alt="Squidematics" />
						<p>Squidematics<span>[PRO]</span></p>
					</div>	
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/stars.jpg' ?>" alt="Stars Effect" />
						<p>Stars Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/stellar.jpg' ?>" alt="Stellar Cloud" />
						<p>Stellar Cloud<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/stripe-cube.jpg' ?>" alt="Stripe Cude Effect" />
						<p>Stripe Cube Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/subvisual.png' ?>" alt="Subvisual" />
						<p>Subvisual<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/tagcanvas.jpg' ?>" alt="Tag Canvas" />
						<p>Tag Canvas<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/header_banner.jpg' ?>" alt="The Great Attractor" />
						<p>The Great Attractor<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/thibaut.jpg' ?>" alt="Thibaut" />
						<p>Thibaut<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/tiny_galaxy.jpg' ?>" alt="Tiny Galaxy Effect" />
						<p>Tiny Galaxy Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/torus.jpg' ?>" alt="Torus of Cubes" />
						<p>Torus of Cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/water.jpg' ?>" alt="Water Effect" />
						<p>Water Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/wave.jpg' ?>" alt="Wave Effect" />
						<p>Wave Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/wave_animation.jpg' ?>" alt="Wave Animation Effect" />
						<p>Wave Animation Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/waaave.jpg' ?>" alt="Waaave Canvas" />
						<p>Waaave Canvas<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/walkingbg.jpg' ?>" alt="Walking Background" />
						<p>Walking Background<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/wrap_speed.jpg' ?>" alt="Wrap Speed" />
						<p>Warp Speed<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/water_swimming.jpg' ?>" alt="Water Swimming" />
						<p>Water Swimming<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/waving_cloth.jpg' ?>" alt="Waving Cloth" />
						<p>Waving Cloth<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/waterdroplet.jpg' ?>" alt="Water Droplet" />
						<p>Water Droplet<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/wormhole.jpg' ?>" alt="Wormhole Effect" />
						<p>Wormhole Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/wordcloud.jpg' ?>" alt="Word Cloud" />
						<p>Word Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/valentine.jpg' ?>" alt="Valentine Effect" />
						<p>Valentine Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo qcld_sliderhero_images.'/ygekpg.jpg' ?>" alt="Ygekpg Effect" />
						<p>Ygekpg Effect<span>[PRO]</span></p>
					</div>
				</div>
				
			</div>			
		</div>

	</div>
	<?php
}

