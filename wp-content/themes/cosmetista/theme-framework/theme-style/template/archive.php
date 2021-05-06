<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Archive Template
 * Created by CMSMasters
 * 
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_archive_type'); ?>>
	<?php 
	if (!post_password_required() && has_post_thumbnail()) {
		echo '<div class="cmsmasters_archive_item_img_wrap">';
		
			cosmetista_thumb(get_the_ID(), 'cmsmasters-square-thumb');
			
		echo '</div>';
	}
	?>
	<div class="cmsmasters_archive_item_cont_wrap">
		<div class="cmsmasters_archive_item_info">
			<div class="cmsmasters_archive_item_type">
				<?php
				$post_type_obj = get_post_type_object(get_post_type());
				
				echo '<span>' . $post_type_obj->labels->singular_name . ' </span>';
				?>
			</div>
			<?php
			if (get_post_type() == 'post') {
				echo '<span class="cmsmasters_archive_item_date_wrap"> ' . 
					'<abbr class="published cmsmasters_archive_item_date" title="' . esc_attr(get_the_date()) . '">';
						
						
						if (cmsmasters_title(get_the_ID(), false) == get_the_ID()) {
							echo '<a href="' . esc_url(get_permalink()) . '">' . 
								get_the_date() . 
							'</a>';
						} else {
							echo get_the_date();
						}
						
						
					echo '</abbr>' . 
					'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
						get_the_modified_date() . 
					'</abbr>' . 
				'</span>' . 
				'<span class="cmsmasters_archive_item_user_name"> ' . 
					esc_html__('by', 'cosmetista') . ' ' . 
					'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author" title="' . esc_attr__('Posts by', 'cosmetista') . ' ' . get_the_author_meta('display_name') . '">' . get_the_author_meta('display_name') . '</a>' . 
				'</span>';
			}
			?>
		</div>
		
		<?php
		if (cmsmasters_title(get_the_ID(), false) != get_the_ID()) {
			?>
			<header class="cmsmasters_archive_item_header entry-header">
				<h2 class="cmsmasters_archive_item_title entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php cmsmasters_title(get_the_ID(), true); ?>
					</a>
				</h2>
			</header>
			<?php 
		}
		
		
		if (cosmetista_excerpt(55, false) != '') {
			echo cmsmasters_divpdel('<div class="cmsmasters_archive_item_content entry-content">' . "\n" . 
				wpautop(cosmetista_excerpt(55, false)) . 
			'</div>' . "\n");
		}
		
		echo '<a class="cmsmasters_archive_read_more" href="' . esc_url(get_permalink(get_the_ID())) . '">' . esc_html__('Read More', 'cosmetista') . '</a>';
		?>
	</div>
</article>