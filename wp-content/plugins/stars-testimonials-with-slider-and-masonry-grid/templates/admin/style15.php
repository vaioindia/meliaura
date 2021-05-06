<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style15">
  <img width="440" height="320" class="profile wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-thumb-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
  </div>
  <h3 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?> <span class="st-testimonial-company"><?php echo $companyArray[$j-1]; ?></span></h3>
</div>
