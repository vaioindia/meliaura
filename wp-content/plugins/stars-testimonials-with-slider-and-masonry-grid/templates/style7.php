<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure style7 st-testimonial-bg">
  <i class="pst-quote-left"></i>
  <div class="blockquote st-testimonial-content st-testimonial-bg"><?php the_content(); ?></div>
    <div class="starrating st-rating">
      <?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="star-author">
    <h5 class="st-testimonial-title"><?php the_title(); ?><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</div>