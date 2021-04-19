<?php

namespace Portfolios\Controllers;

use Src\Shared\Controllers\GridLayout as GridLayout;
use Src\Shared\Controllers\ListLayout as ListLayout;
use Src\Shared\Controllers\IRenderItems;
use Src\Shared\Controllers\SharedController;

class PortfolioController implements IRenderItems
{
	public function __construct()
	{
		add_shortcode('sharedShortcode', [$this, 'renderContainerTagClasses']);
	}

	public function renderContainerTagClasses(array $aAtts = [])
	{
		$aAtts =
			shortcode_atts(
				[
					'layout'         => 'list',
				],
				$aAtts,
			);
		echo $aAtts['layout'];
		die;
		if ($aAtts['layout'] == 'grid') {
			$oOutput = new GridLayout();
		} else {
			$oOutput = new ListLayout();
		}

		(new SharedController())->output([
			'post_type' => 'portfolios',
			'container_layout' => $oOutput,
			'posts_per_page' => 1
		], $oOutput, $aAtts);
	}

	public function renderHtml(\WP_Post $post, $aAtts)
	{
		$imgUrl = get_the_post_thumbnail_url($oThis->aArgs['post_id']);
		if (strlen($imgUrl) == 0) {
			$imgUrl = $aNeededVal['default_img'];
		} ?>
		<div class="<?php echo esc_attr($aNeededVal['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aNeededVal['inner_classes']); ?>">
				<img class="attachment-<?php echo esc_attr($aNeededVal['image_size']) ?>" src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo get_the_title(); ?>">
				<span class="photobox__label"><?php echo get_the_title(); ?></span>
			</div>
		</div>
<?php
	}
}
