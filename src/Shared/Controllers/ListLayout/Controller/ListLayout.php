<?php

namespace SharedController\ListLayout\Controller;

use Src\Shared\Controllers\Layout as Layout;

class ListLayout implements Layout
{

    public function renderLayout(\WP_Post $post, array $aAtts)
    {
        switch ($aAtts['type_of_post']) {
            case 'important':
                $containerClasses = "col-12 col-lg-" . $aAtts['items_per_row'] . " blog-box blog-first";
                break;

            default:
                $containerClasses = "col-12 col-lg-" . $aAtts['items_per_row'] . " blog-box";
                break;
        }
        ?>
        <div class="<?php echo esc_attr($containerClasses); ?>">

            <h6><?php echo get_the_title() ?></h6>

            <p>
                <?php echo apply_filters('renderPostDate',
                    get_the_date(),
                    $aAtts['date_format']
                ) ?>
            </p>

            <p>
                <?php echo apply_filters('renderTrimmedContents',
                    get_the_content(),
                    $aAtts['wanted_strlen'],
                    $aAtts['end'],
                ) ?>
            </p>

        </div>
        <?php
    }
}
