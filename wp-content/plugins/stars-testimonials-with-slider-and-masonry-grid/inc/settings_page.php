<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
	global $post;
	$company = get_post_meta( $post->ID, 'testimonial_company_name', true );
	$url = get_post_meta( $post->ID, 'testimonial_company_url', true );
	$stars = get_post_meta( $post->ID, 'testimonial_stars', true );
    if($stars === false || !is_numeric($stars) || $stars < 0) {
        $stars = 0;
    }
    $start = intval($stars);
    $has_half = ($start != $stars)?"yes":"";
    if($has_half == "yes") {
        $end = ceil($stars)+1;
    } else {
        $end = $start+1;
    }
?>
<table class="widefat testimonial-setting" border="0">
	<tr>
		<th width="180px">Company name and role</th>
		<td><input type="text" placeholder="Company Inc." class="widefat" name="testimonial_company_name" value="<?php echo $company; ?>"></td>
	</tr>
	<tr>
		<th>Website link (optional)</th>
		<td><input type="text" class="widefat" placeholder="https://www.example.com" name="testimonial_company_url" value="<?php echo $url; ?>"></td>
	</tr>
	<tr>
		<th>Stars rating</th>
		<td>
            <div class="container pt-5 mt-5">
                <div class="row py-2 bg-light border">
                    <div class="col-2 ml-auto">
                        <div id="starrate" class="starrate mt-3" data-val="<?php echo esc_attr($stars) ?>" data-max="5">
                            <span class="ctrl"></span>
                            <span class="cont m-1 star-ratings">
                                <?php for($i=1;$i<=$start;$i++) { ?>
                                    <i class="pst-star"></i>
                                <?php } ?>
                                <?php if($has_half == "yes") { ?>
                                    <i class="pst-star-half-o"></i>
                                <?php } ?>
                                <?php for($i=$end;$i<=5;$i++) { ?>
                                    <i class="pst-star-o"></i>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                    <input type="hidden" name="testimonial_stars" id="testimonial_stars" value="<?php echo esc_attr($stars) ?>" />
                </div>
            </div>
		</td>
	</tr>
</table>
