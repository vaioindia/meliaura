<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure style10">
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content"><?php the_content(); ?></div>
    <div class="star-arrow"></div>
  </div>
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="star-author">
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company">- <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
    <span class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </span>    
  </div>
</div>