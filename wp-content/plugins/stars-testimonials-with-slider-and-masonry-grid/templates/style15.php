<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style15">
  <?php the_post_thumbnail( 'thumbnail', array('class' => 'profile') ); ?>
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content"><?php the_content(); ?></div>
  </div>
  <h3 class="st-testimonial-title"><?php the_title(); ?><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h3>
</div>