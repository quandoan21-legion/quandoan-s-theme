<?php

namespace Portfolios\Controllers;

use Src\Shared\Controllers\IRenderItems;

class PortfolioController implements IRenderItems
{
	public function renderHtml( $oThis, array $aNeededVal)
	{
		$imgUrl = get_the_post_thumbnail_url($oThis->aArgs['post_id']);
		if (strlen($imgUrl) == 0) {
			$imgUrl = $aNeededVal['default_img'];
		}?>
		<div class="<?php echo esc_attr($aNeededVal['wrapper_classes']); ?>">
			<div class="<?php echo esc_attr($aNeededVal['inner_classes']); ?>">
				<img class="attachment-<?php echo esc_attr($aNeededVal['image_size']) ?>" src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo get_the_title(); ?>">
				<span class="photobox__label"><?php echo get_the_title(); ?></span>
			</div>
		</div>
<?php
	}
}
