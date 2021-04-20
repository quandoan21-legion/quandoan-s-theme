<?php

namespace Src\Shared\Controllers;

class ListLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    : string
    {
        switch ($typeOfPost) {
            case 'important':
                $containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;

            default:
                $containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }
        return $containerClasses;
    }

    public function renderLayout(\WP_Post $post, array $aAtts)
    {
        ?>
        <h6><?php echo get_the_title() ?></h6>
        <p><?php echo apply_filters('renderPostDate', get_the_date(), $aAtts['date_format']) ?></p>
        <p><?php echo apply_filters('renderTrimmedContents', get_the_content(), $aAtts['wanted_strlen'], $aAtts['end'],) ?></p>
        <?php
    }
}
