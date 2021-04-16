<?php

namespace Portfolios\Controllers;

class PortfolioController
{
	public function __construct()
	{
		add_shortcode('quan_render_portfolio_items', [$this, 'renderPortfolioItems']);
		add_shortcode('quan_render_portfolio_item', [$this, 'renderPortfolioItem']);
	}

	public function  renderPortfolioItem($aAtts)
	{
		$aAtts = shortcode_atts(
			[
				'wrapper_classes' => 'photobox photobox_type10',
				'inner_classes'   => 'photobox__previewbox',
				'image_size'      => 'small',
				'post_id'         => get_the_ID(),
				'post_title'      => get_the_title(),

			],
			$aAtts,
		);
		$imgUrl = get_the_post_thumbnail_url($aAtts['post_id']);
		if (strlen($imgUrl) == 0) {
			$imgUrl = "http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png";
		}
?>
		<div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
				<!-- Replace Patch to Image Under -->
				<img class="attachment-<?php echo esc_attr($aAtts['image_size']) ?>" src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo $aAtts['post_title']; ?>">
				<!-- Replace Image Title Under -->
				<span class="photobox__label"><?php echo $aAtts['post_title']; ?></span>
			</div>
		</div>

		<?php
		// echo $imgUrl;	
	}

	public function renderPortfolioItems($aAtts)
	{
		$aAtts = wp_parse_args(
			$aAtts,
			[
				'items_per_row'   => 3,
				'number_of_row'   => 4,
				'wrapper_classes' => 'photobox photobox_type10',
				'inner_classes'   => 'photobox__previewbox',
				'image_size'      => 'small',
			],
		);

		if (
			is_numeric($aAtts['items_per_row']) == true &&
			(12 % $aAtts['items_per_row']) == 0 &&
			$aAtts['items_per_row'] != 0
		) {
			$itemsPerRow = 12 / $aAtts['items_per_row'];
		} else {
			$itemsPerRow = 4;
		}
		$classes = "col-12 col-lg-" . $itemsPerRow . " work-box1";

		$oQuery = new \WP_Query([
			'post_type'      => 'portfolios',
			'posts_per_page' => $itemsPerRow * $aAtts['number_of_row'],
			'post_status'    => 'publish'
		]);

		ob_start();
		if ($oQuery->have_posts()) {
			while ($oQuery->have_posts()) {
				$oQuery->the_post(); ?>
				
				<div class="<?php echo esc_attr($classes); ?>">
					<?php $this->renderPortfolioItem($aAtts); ?>
				</div>
			<?php }
		}

		$html = ob_get_contents();
		ob_end_clean();
		echo $html;
		wp_reset_postdata();
	}
}
