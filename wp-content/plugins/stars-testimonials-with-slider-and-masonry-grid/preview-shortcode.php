<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;
$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
$id = (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'])?$_GET['id']:'';
if(empty($id)) {
    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes")."';</script>";
}
$query = "SELECT id
        FROM {$tableName}
        WHERE id = '%d'";
$query = $wpdb->prepare($query, $id);
$result = $wpdb->get_row($query);
if(empty($result)) {
    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes")."';</script>";}
?>

<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php echo __('Shortcode Preview', 'stars-testimonials'); ?>  <?php echo "[testimonial_stars id={$id}]" ?></h1>
        <div class="preview-box">
            <?php
                echo do_shortcode('[testimonial_stars id='.$id.']');
            ?>
        </div>
    </div>
</div>