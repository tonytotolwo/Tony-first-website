<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'gurukul_education_above_slider' ); ?>

<section>
	<?php
	    // Get pages set in the customizer (if any)
	    $pages = array();
	    for ( $count = 1; $count <= 5; $count++ ) {
	    $mod = absint( get_theme_mod( 'gurukul_education_slide_page' . $count ));
	    if ( 'page-none-selected' != $mod ) {
	      $pages[] = $mod;
	    }
	    }
	    if( !empty($pages) ) :
	      $args = array(
	        'posts_per_page' => 5,
	        'post_type' => 'page',
	        'post__in' => $pages,
	        'orderby' => 'post__in'
	      );
	      $query = new WP_Query( $args );
	      if ( $query->have_posts() ) :
	        $count = 1;
	        ?>
	      <div class="slider-main">
	          <div id="slider" class="nivoSlider">
	            <?php
	              $gurukul_education_n = 0;
	          while ( $query->have_posts() ) : $query->the_post();
	            
	            $gurukul_education_n++;
	            $gurukul_education_slideno[] = $gurukul_education_n;
	            $gurukul_education_slidetitle[] = get_the_title();
	            $gurukul_education_content[] = get_the_content();
				$gurukul_education_slidelink[] = esc_url(get_permalink());
	            ?>
	              <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $gurukul_education_n ); ?>" />
	            <?php
	          $count++;
	          endwhile; ?>
	          </div>

	        <?php
	        $gurukul_education_k = 0;
	          foreach( $gurukul_education_slideno as $gurukul_education_sln ){ ?>
	          <div id="slidecaption<?php echo esc_attr( $gurukul_education_sln ); ?>" class="nivo-html-caption">
	            <div class="slide-cap  ">
	              <div class="container">
	                <h2><?php echo esc_html($gurukul_education_slidetitle[$gurukul_education_k] ); ?></h2>
	                <p><?php echo esc_html($gurukul_education_content[$gurukul_education_k] ); ?></p>
	                <div class="read-more">
	                	<a href="<?php echo esc_url($gurukul_education_slidelink[$gurukul_education_k] ); ?>"><?php esc_html_e( 'Start Learning Now !','gurukul-education' ); ?></a>
	                </div>
	              </div>
	            </div>
	          </div>
	            <?php $gurukul_education_k++;
	        } ?>
	      </div>
	        <?php else : ?>
	          <div class="header-no-slider"></div>
	        <?php
	      endif;
	    endif;
  	?>
</section>

<?php do_action( 'gurukul_education_above_services' ); ?>

<?php /*--OUR SERVICES--*/?>
<section id="our-services">    
    <div class="container">
    	<?php if( get_theme_mod( 'gurukul_education_section_title','' ) != '') { ?>
			<h3><?php echo esc_html( get_theme_mod('gurukul_education_section_title',__('OUR FEATURES','gurukul-education')) ); ?></h3>
	        <p><?php echo esc_html( get_theme_mod('gurukul_education_section_subtitle',__('CHOOSE YOUR DESIRED COURSES','gurukul-education')) ); ?></p>
	        <hr>
	    <?php } ?>
    	<div class="row">
	    	<?php $pages = array();
	    	for ( $count = 0; $count <= 2; $count++ ) {
		      	$mod = intval( get_theme_mod( 'gurukul_education_services' . $count ));
		     	if ( 'page-none-selected' != $mod ) {
		        	$pages[] = $mod;
		      	}
	    	}
	    	if( !empty($pages) ) :
	      	$args = array(
	        	'post_type' => 'page',
	        	'post__in' => $pages,
	        	'orderby' => 'post__in'
	      	);
	      	$query = new WP_Query( $args );
	     	if ( $query->have_posts() ) :
	        $count = 0;
	        while ( $query->have_posts() ) : $query->the_post(); ?>        	
	          	<div class="col-md-4 col-sm-4">
		            <div class="service-main-box">
		                <div class="education-image text-center">
		                	<img src="<?php the_post_thumbnail_url('full'); ?>"/>		                	
		                </div>
		                <div class="box-content text-center">
		                    <h4><?php the_title(); ?></h4>
		                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( gurukul_education_string_limit_words( $excerpt,20 ) ); ?></p>
		                    <div class="clearfix"></div>
		                    <div class="feature-btn">
		                    	<a href="<?php the_permalink(); ?>"><?php echo esc_html_e('Read More','gurukul-education'); ?></a>
		                    </div>
		                </div>
		            </div>
	          	</div>
	        <?php $count++; endwhile; 
	        wp_reset_postdata();?>
	      	<?php else : ?>
	          	<div class="no-postfound"></div>
	      	<?php endif;
	    	endif;?>
      		<div class="clearfix"></div>
      	</div>
 	</div> 
</section>

<?php do_action( 'gurukul_education_below_service' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>