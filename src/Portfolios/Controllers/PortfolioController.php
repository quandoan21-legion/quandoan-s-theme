<?php

class PortfolioController
{
	public function __construct()
	{
		add_shortcode('quan_render_portfolio_items', [$this, 'renderPortfolioItems']);
		add_shortcode('quan_render_portfolio_item', [$this, 'renderPortfolioItem']);
	}

	public function renderPortfolioItem(\WP_Post $post, $aAtts = [])
	{
		$postID = $post->ID;
		$aAtts = wp_parse_args(
			$aAtts,
			[
				'post'            => $post,
				'post_id'         => $postID,
				'wrapper_classes' => 'photobox photobox_type10',
				'inner_classes'   => 'photobox__previewbox',
			]
		);
?>
		<div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
				<!-- Replace Patch to Image Under -->
				<img src="<?php do_action('get_img_url', $aAtts) ?>" alt="<?php echo esc_attr($post->post_title); ?>">
				<!-- Replace Image Title Under -->
				<span class="photobox__label"><?php echo esc_html($post->post_title); ?></span>
			</div>
		</div>
		<?php
	}

	public function renderPortfolioItems($aAtts = [])
	{

		$portfolio = new PortfolioController;
		$aAtts = wp_parse_args(
			$aAtts,
			[
				'items_per_row' => 3,
				'number_of_row' => 4,
				'inner_classes' => 'photobox__previewbox',
				'image_size'    => 'medium'
			],
		);
		if ($aAtts['items_per_row'] == 3) {
			$classes = 'col-12 col-lg-4 work-box';
		} else if ($aAtts['items_per_row'] == 4) {
			$classes = 'col-12 col-lg-3 work-box';
		} else {
			$classes = 'col-12 col-lg-6 work-box';
		}

		$query = new \WP_Query([
			'post_type'      => 'portfolios',
			'posts_per_page' => $aAtts['items_per_row'] * $aAtts['number_of_row'],
			'post_status'    => 'publish'
		]);
		$html = '';
		ob_start();

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post(); ?>
				<div class="<?php echo esc_attr($classes); ?>">
					<?php $portfolio->renderPortfolioItem($query->post, $aAtts); ?>
				</div> <?php
					}
				}

				$html = ob_get_contents();
				ob_end_clean();
				wp_reset_postdata();
				echo $html;
			}
		}
