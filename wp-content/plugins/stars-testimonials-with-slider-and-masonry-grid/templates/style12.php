<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style12">
	<?php the_post_thumbnail( 'full' ); ?>
  <div class="figcaption st-testimonial-bg">
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h5 class="st-testimonial-company"><?php echo $company; ?></h5>
    <div class="blockquote st-testimonial-content">
      <?php the_content(); ?>
    </div>
  </div><?php echo ($url != '') ? '<a href="'.$company.'"></a>' : '' ; ?>
</div>