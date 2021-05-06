<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure style7 st-testimonial-bg">
    <i class="pst-quote-left"></i>
    <div class="blockquote st-testimonial-content st-testimonial-bg">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <span class="cp-load-after-post"></span>
    </div>
    <div class="starrating st-rating">
      <i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-half-o"></i>
    </div>
    <img width="440" height="320" class="attachment-full size-full wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
    <div class="star-author">
      <h5 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?><span class="st-testimonial-company"> <?php echo $companyArray[$j-1]; ?></span></h5>
    </div>
  </div>
