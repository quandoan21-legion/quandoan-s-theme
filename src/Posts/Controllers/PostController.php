<?php

namespace Posts\Controllers;

use Src\Shared\Controllers\IRenderItems;

class PostController implements IRenderItems
{
    public function renderHtml( $oThis, array $aNeededVal)
    { ?>
        <h6><?php echo get_the_title() ?></h6>
        <p><?php echo apply_filters('renderPostDate', get_the_date(), $oThis->aArgs['date_format']) ?></p>
        <p><?php echo apply_filters('renderTrimmedContents', get_the_content(), $oThis->aArgs['wanted_strlen'], $oThis->aArgs['end'],) ?></p>
<?php
    }
}
