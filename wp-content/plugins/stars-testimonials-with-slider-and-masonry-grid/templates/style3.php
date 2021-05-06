<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
$has_thumb = has_post_thumbnail();
$has_thumb = ($has_thumb)?"has-image":"no-image";
?>
<div class="figure style3 <?php echo esc_attr($has_thumb) ?>">
  <div class="blockquote st-testimonial-content st-testimonial-bg">
	<?php the_content(); ?>
  	<div class="star-arrow"></div>
  </div>
  <?php the_post_thumbnail( 'thumbnail' ); ?>
  <div class="star-author">
	  <div class="starrating st-rating">
	  	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
	  </div>  
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company"> <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</div>