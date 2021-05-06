<?php if (!defined('ABSPATH')) { exit; } ?>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />
<div class="star-testimonials-new-widget-wrap">
    <h2 class="text-center">Collect testimonials from your website’s visitors 🚀</h2>
    <div class="star-testimonials-new-widget-row">
        <div class="star-testimonials-features">
            <ul>
                <li>
                    <div class="star-testimonials-feature">
                        <div class="star-testimonials-feature-top">
                            <img src="<?php echo TESTIMONIAL_PLUGIN_URL ?>/images/hand-holding-heart-solid.png" />
                        </div>                        
                        <div class="feature-description"><strong>Collect testimonials with ease by showing a button under your testimonials,</strong> your visitors will be able to submit testimonials</div>
                    </div>
                </li>
                <li>
                    <div class="star-testimonials-feature">
                        <div class="star-testimonials-feature-top">
                            <img src="<?php echo TESTIMONIAL_PLUGIN_URL ?>/images/thumbs-up-solid.png" />
                        </div>
                        <div class="feature-title"></div>
                        <div class="feature-description"><strong>Control which testimonials are shown and which aren’t.</strong> The testimonials will be added your website only after you approve the testimonials
</div>
                    </div>
                </li>
                <li>
                    <div class="star-testimonials-feature">
                        <div class="star-testimonials-feature-top">
                            <img src="<?php echo TESTIMONIAL_PLUGIN_URL ?>/images/external-link-alt-solid.png" />
                        </div>
                        <div class="feature-description"><strong>Create a direct link for testimonials submission.</strong> Use our direct link and send it to your clients so they can submit their testimonial</div>
                    </div>
                </li>                
            </ul>
            <div class="clear clearfix"></div>
        </div>
        <a href="<?php echo admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=upgrade-to-pro"); ?>" class="new-upgrade-button">Upgrade to Pro</a>
    </div>
</div>
<style>
/*New Widget Page css*/
.star-testimonials-new-widget-wrap {
    border-radius: 10px;
    padding: 10px;
    margin: 40px auto 0 auto;
    background-size: auto 100%;
    width: 100%;
    max-width: 776px;
    background: #fff url("<?php echo TESTIMONIAL_PLUGIN_URL.'/images/bg.png';?>") right bottom no-repeat;
    font-family: 'Poppins';
    line-height: 20px;
}
.star-testimonials-new-widget-wrap h2 {
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 30px;
    color: #1E1E1E;
    margin: 15px 0;
}
.star-testimonials-features ul {
    margin: 0;
    padding: 0;
}
.star-testimonials-feature-top {
    width: 30px;
    height: 30px;
    border: solid 1px #605dec;
    border-radius: 50%;
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    top: -25px;
    background: #fff;
    z-index: 11;
    padding: 10px;
}
.star-testimonials-feature-top img {
    width: 100%;
    height: auto;
}
.star-testimonials-features ul li {
    margin: 0;
    width: 33.33%;
    float: left;
    padding: 10px;	
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.star-testimonials-feature {
    margin: 30px 0 0 0;
    background: #FFFFFF;
    border: 1px solid #605DEC;
    box-sizing: border-box;
    border-radius: 4px;
    padding: 30px 15px 10px 15px;
    min-height: 186px;
    position: relative;
}
.star-testimonials-feature.second {
    min-height: 155px;
}
.feature-title {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 13px;
    line-height: 18px;
    color: #1E1E1E;
}
.feature-description {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 13px;
    line-height: 18px;
    color: #1E1E1E;
}
a.new-upgrade-button {
    height: 40px;
    background: #605DEC;
    border-radius: 100px;
    border: solid 1px #605DEC;
    display: inline-block;
    text-align: center;
    color: #fff;
    line-height: 40px;
    margin: 10px 0 10px 10px;
    padding: 0 25px;
    text-decoration: none;
    text-transform: uppercase;
}
</style>