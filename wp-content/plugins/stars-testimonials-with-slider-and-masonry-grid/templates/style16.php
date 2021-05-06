<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure style16">
  <?php the_post_thumbnail( 'thumbnail', array('class' => 'profile') ); ?>
  <div class="figcaption">
    <h2 class="st-testimonial-title"><?php the_title(); ?></h2>
    <h4 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h4>
    <div class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>    
    <div class="blockquote st-testimonial-bg st-testimonial-content"><?php the_content(); ?></div>
  </div>
</div>