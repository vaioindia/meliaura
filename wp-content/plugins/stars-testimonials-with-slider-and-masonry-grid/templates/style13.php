<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style13">
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="figcaption">
    <div class="blockquote st-testimonial-content">
      <?php the_content(); ?>
    </div>
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h5 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h5>
  </div>
</div>