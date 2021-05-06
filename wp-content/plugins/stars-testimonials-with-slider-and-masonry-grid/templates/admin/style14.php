<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style14">
  <div class="figcaption st-testimonial-bg">
    <div class="blockquote st-testimonial-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="starrating st-rating" title="Rated <?php echo isset($stars)?$stars:0; ?> out of 5.0">
      <i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-half-o"></i>
    </div>
    <h3 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?></h3>
    <h4 class="st-testimonial-company"><?php echo $companyArray[$j-1]; ?></h4>
  </div>
</div>
