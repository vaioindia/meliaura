<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style14">
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content">
      <p><?php the_content(); ?>
    </div>
    <div class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>      
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h4 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h4>
  </div>
</div>