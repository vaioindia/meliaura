<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<style>
    .star-test-hidden {
        overflow: hidden;
    }
    .star-test-popup-overlay .star-test-internal-message {
        margin: 3px 0 3px 22px;
        display: none;
    }
    .star-test-reason-input {
        margin: 3px 0 3px 22px;
        display: none;
    }
    .star-test-reason-input input[type="text"] {
        width: 100%;
        display: block;
    }
    .star-test-popup-overlay {
        background: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 1000;
        overflow: auto;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out :
    }
    .star-test-popup-overlay.star-test-active {
        opacity: 1;
        visibility: visible;
    }
    .star-test-serveypanel {
        width: 600px;
        background: #fff;
        margin: 65px auto 0;
    }
    .star-test-popup-header {
        background: #f1f1f1;
        padding: 20px;
        border-bottom: 1px solid #ccc;
    }
    .star-test-popup-header h2 {
        margin: 0;
    }
    .star-test-popup-body {
        padding: 10px 20px;
    }
    .star-test-popup-footer {
        background: #f9f3f3;
        padding: 10px 20px;
        border-top: 1px solid #ccc;
    }
    .star-test-popup-footer:after {
        content: "";
        display: table;
        clear: both;
    }
    .action-btns {
        float: right;
    }
    .star-test-anonymous {
        display: none;
    }
    .attention, .error-message {
        color: red;
        font-weight: 600;
        display: none;
    }
    .star-test-spinner {
        display: none;
    }
    .star-test-spinner img {
        margin-top: 3px;
    }
    .star-test-hidden-input {
        padding: 10px 0 0;
        display: none;
    }
    .star-test-hidden-input input[type='text'] {
        padding: 0 10px;
        width: 100%;
        height: 26px;
        line-height: 26px;
    }
    .star-test--popup-overlay textarea {
        padding: 10px;
        width: 100%;
        height: 100px;
        margin: 0 0 15px 0;
    }
    span.star-test-error-message {
        color: #dd0000;
        font-weight: 600;
    }
    .star-test-popup-body h3 {
        line-height: 24px;
    }
    .star-test-popup-body textarea {
        width: 100%;
        height: 80px;
    }
    .star-test--popup-overlay .form-control input {
        width: 100%;
        margin: 0 0 15px 0;
    }
    .star-test-serveypanel .form-control input {
        width: 100%;
        margin: 0 0 15px 0;
    }
</style>
<!-- modal for plugin deactivation popup -->
<div class="star-test-popup-overlay">
    <div class="star-test-serveypanel">
        <!-- form start -->
        <form action="#" method="post" id="star-test-deactivate-form">
            <div class="star-test-popup-header">
                <h2><?php esc_attr_e('Quick feedback about Stars Testimonials', 'stars-testimonials'); ?> 🙏</h2>
            </div>
            <div class="star-test-popup-body">
                <h3><?php esc_attr_e('Your feedback will help us improve the product, please tell us why did you decide to deactivate Stars Testimonials :)', 'stars-testimonials'); ?></h3>
                <div class="form-control">
                    <input type="email" value="<?php echo get_option( 'admin_email' ) ?>" placeholder="<?php echo _e("Email address", 'stars-testimonials') ?>" id="star-test-deactivation-email_id">
                </div>
                <div class="form-control">
                    <label></label>
                    <textarea placeholder="<?php esc_attr_e("Your comment", 'stars-testimonials') ?>" id="star-test-deactivation-comment"></textarea>
                </div>
            </div>
            <div class="star-test-popup-footer">
                <label class="star-test-anonymous">
                    <input type="checkbox"/><?php esc_attr_e('Anonymous feedback', 'stars-testimonials'); ?>
                </label>
                <input type="button" class="button button-secondary button-skip star-test-popup-skip-feedback" value="Skip &amp; Deactivate">
                <div class="action-btns">
                    <span class="star-test-spinner"><img src="<?php echo esc_url(admin_url('/images/spinner.gif')); ?>" alt=""></span>
                    <input type="submit" class="button button-secondary button-deactivate star-test-popup-allow-deactivate" value="Submit &amp; Deactivate" disabled="disabled">
                    <a href="#" class="button button-primary star-test-popup-button-close"><?php esc_attr_e('Cancel', 'stars-testimonials'); ?></a>
                </div>
            </div>
        </form>
        <!-- form end -->
    </div>
</div>
<script>
    (function ($) {
        $(function () {
            var starTestPluginSlug = 'stars-testimonials-with-slider-and-masonry-grid';
            // Code to fire when the DOM is ready.
            $(document).on('click', 'tr[data-slug="' + starTestPluginSlug + '"] .deactivate', function (e) {
                e.preventDefault();
                $('.star-test-popup-overlay').addClass('star-test-active');
                $('body').addClass('star-test-hidden');
            });
            $(document).on('click', '.star-test-popup-button-close', function () {
                close_popup();
            });
            $(document).on('click', ".star-test-serveypanel,tr[data-slug='" + starTestPluginSlug + "'] .deactivate", function (e) {
                e.stopPropagation();
            });
            $(document).on('click', function () {
                close_popup();
            });
            $('.star-test-reason label').on('click', function () {
                $(".star-test-hidden-input").hide();
                jQuery(".star-test-error-message").remove();
                if ($(this).find('input[type="radio"]').is(':checked')) {
                    $(this).closest("li").find('.star-test-hidden-input').show();
                }
            });
            $(document).on("keyup", "#star-test-deactivation-comment", function(){
                if($.trim($(this).val()) == "") {
                    $(".star-test-popup-allow-deactivate").attr("disabled", true);
                } else {
                    $(".star-test-popup-allow-deactivate").attr("disabled", false);
                }
            });
            $('input[type="radio"][name="star-test-selected-reason"]').on('click', function (event) {
                $(".star-test-popup-allow-deactivate").removeAttr('disabled');
            });
            $(document).on('submit', '#star-test-deactivate-form', function (event) {
                event.preventDefault();
                _reason = "";
                if(jQuery.trim(jQuery("#star-test-deactivation-comment").val()) == "") {
                    jQuery("#alt_plugin").after("<span class='star-test-error-message'>Please provide your feedback</span>");
                    return false;
                } else {
                    _reason = jQuery.trim(jQuery("#star-test-deactivation-comment").val());
                }
                jQuery('[name="star-test-selected-reason"]:checked').val();
                var email_id = jQuery.trim(jQuery("#star-test-deactivation-email_id").val());
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'star_testimonials_plugin_deactivate',
                        reason: _reason,
                        email_id: email_id,
                        nonce: '<?php esc_attr_e(wp_create_nonce("star_testimonials_deactivate_nonce")) ?>'
                    },
                    beforeSend: function () {
                        $(".star-test-spinner").show();
                        $(".star-test-popup-allow-deactivate").attr("disabled", "disabled");
                    }
                }).done(function () {
                    $(".star-test-spinner").hide();
                    $(".star-test-popup-allow-deactivate").removeAttr("disabled");
                    window.location.href = $("tr[data-slug='" + starTestPluginSlug + "'] .deactivate a").attr('href');
                });
            });
            $('.star-test-popup-skip-feedback').on('click', function (e) {
                window.location.href = $("tr[data-slug='" + starTestPluginSlug + "'] .deactivate a").attr('href');
            });
            function close_popup() {
                $('.star-test-popup-overlay').removeClass('star-test-active');
                $('#star-test-deactivate-form').trigger("reset");
                $(".star-test-popup-allow-deactivate").attr('disabled', 'disabled');
                $(".star-test-reason-input").hide();
                $('body').removeClass('star-test-hidden');
                $('.message.error-message').hide();
            }
        });
    })(jQuery); // This invokes the function above and allows us to use '$' in place of 'jQuery' in our code.
</script>
