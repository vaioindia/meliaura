<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure style10">
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content st-testimonial-bg">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
      <span class="cp-load-after-post"></span>  	<div class="star-arrow"></div>
    </div>
    <div class="star-arrow"></div>
  </div>
    <img width="440" height="320" class="attachment-full size-full wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
  <div class="star-author">
    <h5 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?> <span class="st-testimonial-company">- <?php echo $companyArray[$j-1]; ?></span></h5>
  </div>
</div>
