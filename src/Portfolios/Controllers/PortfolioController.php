<?php
namespace Portfolios\Controllers;
class PortfolioController
{
	public function __construct()
	{
		add_shortcode('quan_render_portfolio_items', [$this, 'renderPortfolioItems']);
		add_shortcode('quan_render_portfolio_item', [$this, 'renderPortfolioItem']);
	}

	public function renderPortfolioItem(\WP_Post $oPost, array $aAtts = [])
	{
		$oPortfolioController =  new PortfolioController;
		$postID = $oPost->ID;
		$aAtts = wp_parse_args(
			$aAtts,
			[
				'post'            => $oPost,
				'post_id'         => $postID,

			]
		);
?>
		<div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
				<!-- Replace Patch to Image Under -->
				<img src="<?php echo $oPortfolioController->renderImgUrl($oPost) ?>" alt="<?php echo $oPost->post_title; ?>">
				<!-- Replace Image Title Under -->
				<span class="photobox__label"><?php echo $oPost->post_title; ?></span>
			</div>
		</div>
		<?php
	}
	function renderImgUrl($oPost)
	{
		$postImgUrl  =  esc_url(get_the_post_thumbnail_url($oPost->ID));
		return $postImgUrl;
	}

	public function renderPortfolioItems(array $aAtts = [])
	{

		$oPortfolio = new PortfolioController;
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

		$itemsPerRow = apply_filters('checkItemsPerRow', $aAtts['items_per_row']);


		$classes = "col-12 col-lg-" . $itemsPerRow . " work-box1";

		$oQuery = new \WP_Query([
			'post_type'      => 'portfolios',
			'posts_per_page' => $itemsPerRow * $aAtts['number_of_row'],
			'post_status'    => 'publish'
		]);
		$html = '';
		ob_start();

		if ($oQuery->have_posts()) {
			while ($oQuery->have_posts()) {
				$oQuery->the_post(); ?>
				<div class="<?php echo esc_attr($classes); ?>">
					<?php $oPortfolio->renderPortfolioItem($oQuery->post, $aAtts); ?>
				</div> <?php
					}
				}

				$html = ob_get_contents();
				ob_end_clean();
				wp_reset_postdata();
				echo $html;
			}
		}
