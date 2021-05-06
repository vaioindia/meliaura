<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<style>
    body {
        background: #f1f1f1 !important;
    }
    .popup-form-content {
        background: #fff;
        min-height: 100px;
        width: 450px;
        text-align: center;
        margin-top: 50px;
        border: solid 1px #c1c1c1;
    }
    .add-update-folder-title {
        font-size: 20px;
        line-height: 30px;
        padding: 20px 20px 0;
    }
    .folder-form-input {
        padding: 10px 20px;
    }
    .folder-form-input input {
        width: 100%;
        transition: border-color .3s,box-shadow .3s;
        border: 1px solid #d9d9d9;
        border-radius: .1875em;
        font-size: 1.125em;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.06);
        box-sizing: border-box;
        height: 2.625em;
        margin: 1em auto;
    }
    .updates-content-buttons {
        background: #c1c1c1;
        padding: 0 20px;
    }
    .updates-content-buttons button.form-cancel-btn {
        float: right!important;
    }
    .updates-content-buttons button {
        margin: 10px 3px!important;
        float: left;
    }
    #adminmenu .wp-submenu li.current a {
        color: #b4b9be !important;
        font-weight: normal;
    }
</style>
<div class="updates-form-form" >
    <div class="popup-form-content">
        <div id="add-update-folder-title" class="add-update-folder-title">
            Would you like to get feature updates for Start testimonials in real-time?
        </div>
        <div class="folder-form-input">
            <input id="stars_testimonials_update_email" autocomplete="off" value="<?php echo get_option( 'admin_email' ) ?>" placeholder="Email address">
        </div>
        <div class="updates-content-buttons">
            <button href="javascript:;" class="button button-primary form-submit-btn yes">Yes, I want</button>
            <button href="javascript:;" class="button button-secondary form-cancel-btn no">Skip</button>
            <div style="clear: both"></div>
        </div>
        <input type="hidden" id="stars_testimonials_update_status" value="<?php echo wp_create_nonce("stars_testimonials_update_status") ?>">
    </div>
</div>
<script>
    jQuery(document).on('ready', function($) {
        jQuery(document).on("click", ".updates-content-buttons button", function () {
            var updateStatus = 0;
            if (jQuery(this).hasClass("yes")) {
                updateStatus = 1;
            }
            jQuery(".updates-content-buttons button").attr("disabled", true);
            jQuery.ajax({
                url: ajaxurl,
                data: "action=stars_testimonials_update_status&status=" + updateStatus + "&nonce=" + jQuery("#stars_testimonials_update_status").val() + "&email=" + jQuery("#stars_testimonials_update_email").val(),
                type: 'post',
                cache: false,
                success: function () {
                    window.location = "<?php echo admin_url("edit.php?post_type=stars_testimonial") ?>";
                }
            })
        });
    });
</script>