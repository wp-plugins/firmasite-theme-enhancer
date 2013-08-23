<?php

add_shortcode("showcase", "firmasite_showcase_shortcode");
function firmasite_showcase_shortcode($atts) {

   // EXAMPLE USAGE:
   // [showcase the_query="showposts=100&post_type=page&post_parent=453"]
   
   // Defaults
   extract(shortcode_atts(array(
      "the_query" => ''
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);
   $the_query = preg_replace("/&amp;/", "&", $the_query);
   
   
   $firmasite_showcase_defaults = array (
		'post_type' => apply_filters( 'firmasite_pre_get_posts_ekle', array( 'post', 'page' )), 
		'showposts' => apply_filters( 'firmasite_showcase_count', 9),
		'ignore_sticky_posts' => 1,
	);
	
	// if there is no $the_query, making shortcode to display showcase as default 
	if(empty($the_query)){
		$firmasite_showcase_defaults['meta_query'] = array( array('key' => '_jsFeaturedPost' ));
	}
	
	$firmasite_showcase_args = wp_parse_args( $the_query, $firmasite_showcase_defaults );
	
	// query is made       
	$firmasite_showcase = new WP_Query( $firmasite_showcase_args );
	
	// here we start
	ob_start(); 
	       
	if ( $firmasite_showcase->have_posts() ) {
		global $firmasite_settings;
		$firmasite_settings["shortcode_showcase"]++;
		?>
			<div class="firmasite-showcase carousel <?php if ($firmasite_showcase->post_count > 1) echo " slide"; ?>" id="firmasite-showcase-<?php echo $firmasite_settings["shortcode_showcase"];?>" <?php if ($firmasite_showcase->post_count > 1) echo 'data-rel="carousel"'; ?> data-interval="6000">
				<?php if ($firmasite_showcase->post_count > 1){ ?>
					  <ol class="carousel-indicators">                
						   <?php 
						   $i = 0;
						   $firmasite_showcase_slide_active = "active";
						   foreach ($firmasite_showcase->posts as $firmasite_showcase_post) {  ?>
								<li data-target="#firmasite-showcase-<?php echo $firmasite_settings["shortcode_showcase"];?>" data-slide-to="<?php echo $i; ?>" class="<?php echo $firmasite_showcase_slide_active; ?>"></li>
						   <?php
						   $i++;
						   $firmasite_showcase_slide_active = "";
						   }?>
					  </ol>
				<?php } ?>
				<div class="<?php if ($firmasite_showcase->post_count > 1) echo 'carousel-inner'; ?>">
					<?php
					$firmasite_showcase_slide_start = true;
					$firmasite_showcase_slide_active = " active";
					while ( $firmasite_showcase->have_posts() ) {
						$firmasite_showcase->the_post();
						global $post;
						?>
						<div class="item post-<?php echo $post->ID;  echo $firmasite_showcase_slide_active; $firmasite_showcase_slide_active = ""; ?>"> 
							<?php get_template_part( 'templates/showcase', $post->post_type );?>
						</div>
					<?php } ?>
				</div>
				<?php if ($firmasite_showcase->post_count > 1) { ?>
				<a data-slide="prev" href="#firmasite-showcase-<?php echo $firmasite_settings["shortcode_showcase"];?>" class="left carousel-control"><span class="icon-prev"></span></a>
				<a data-slide="next" href="#firmasite-showcase-<?php echo $firmasite_settings["shortcode_showcase"];?>" class="right carousel-control"><span class="icon-next"></span></a>
				<?php } ?>
			</div>
		<?php
	} 
   $output = ob_get_contents();
   ob_end_clean();
   
   wp_reset_query();
   return $output;   
}
