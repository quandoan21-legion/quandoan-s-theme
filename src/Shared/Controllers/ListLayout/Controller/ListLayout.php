<?php

namespace SharedController\ListLayout\Controller;

use Src\Shared\Controllers\ILayout as ILayout;

class ListLayout implements ILayout
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

            <h6><a href="<?php esc_url(the_permalink($post->ID)) ?>"><?php echo get_the_title() ?></a></h6>

            <p>
                <?php echo apply_filters(
                    'renderPostDate',
                    get_the_date(),
                    $aAtts['date_format']
                ) ?>
            </p>

            <p>
                <?php echo apply_filters(
                    'renderTrimmedContents',
                    get_the_content(),
                    $aAtts['wanted_strlen'],
                    $aAtts['end'],
                ) ?>
            </p>

        </div>
<?php
    }
}
