<?php

class PortfolioController
{
	public function __construct()
	{
		add_shortcode('quan_render_portfolio_items', [$this, 'renderPortfolioItems']);
		add_shortcode('quan_render_portfolio_item', [$this, 'renderPortfolioItem']);
	}

	public function renderPortfolioItem(\WP_Post $post, array $aAtts = [])
	{
		$portfolioController =  new PortfolioController;
		$postID = $post->ID;
		$aAtts = wp_parse_args(
			$aAtts,
			[
				'post'            => $post,
				'post_id'         => $postID,

			]
		);
		$neededVal = '';
?>
		<div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
				<!-- Replace Patch to Image Under -->
				<img src="<?php echo $portfolioController->renderImgUrl($post) ?>" alt="<?php echo $post->post_title; ?>">
				<!-- Replace Image Title Under -->
				<span class="photobox__label"><?php echo $post->post_title; ?></span>
			</div>
		</div>
		<?php
	}
	function renderImgUrl($post)
	{
		$postImgUrl  =  esc_url(get_the_post_thumbnail_url($post->ID));
		return $postImgUrl;
	}

	public function renderPortfolioItems(array $aAtts = [])
	{

		$portfolio = new PortfolioController;
		$aAtts = shortcode_atts(
			[
				'items_per_row' => 3,
				'number_of_row' => 4,
				'wrapper_classes' => 'photobox photobox_type10',
				'inner_classes'   => 'photobox__previewbox',
				'image_size'    => 'medium'
			],
			$aAtts
		);

		if ((is_numeric($aAtts['items_per_row']) == true &&
				12 % $aAtts['items_per_row']) == 0 &&
			$aAtts['items_per_row'] != 0
		) {
			$itemsPerRow = 12 / $aAtts['items_per_row'];
		} else {
			$itemsPerRow = 4;
		}


		$classes = "col-12 col-lg-" . $itemsPerRow . " work-box1";

		$query = new \WP_Query([
			'post_type'      => 'portfolios',
			'posts_per_page' => $itemsPerRow * $aAtts['number_of_row'],
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
