<?php

namespace Src\Shared\Controllers;
interface IRenderItems
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost);
    public function renderHtml(object $oThis);
}

class RenderPortfolios implements IRenderItems
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    {
        $this->classes = "col-12 col-lg-" . $itemsPerRow . " work-box1";
        return $this;
    }
    public function renderHtml(object $oThis)
    {
        $imgUrl = get_the_post_thumbnail_url($oThis->aArgs['post_id']);
        if (strlen($imgUrl) == 0) {
            $imgUrl = $oThis->aArgs['default_img'];
        } ?>
        <div class="<?php echo esc_attr($oThis->aArgs['wrapper_classes']); ?>">
            <div class="<?php echo esc_attr($oThis->aArgs['inner_classes']); ?>">
                <img class="attachment-<?php echo esc_attr($oThis->aArgs['image_size']) ?>" src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo get_the_title(); ?>">
                <span class="photobox__label"><?php echo get_the_title(); ?></span>
            </div>
        </div>
    <?php
    }
}

class RenderPosts implements IRenderItems
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    {
        switch ($typeOfPost) {
            case 'important':
                $this->classes = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;

            default:
                $this->classes = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }
        return $this;
    }
    public function renderHtml(object $oThis)
    { ?>
        <h6><?php echo get_the_title() ?></h6>
        <p><?php echo apply_filters('renderPostDate', get_the_date(), $oThis->aArgs['date_format']) ?></p>
        <p><?php echo apply_filters('renderTrimmedContents', get_the_content(), $oThis->aArgs['wanted_strlen'], $oThis->aArgs['end'],) ?></p>
        <?php
    }
}
class SharedController
{
    /**
     * @var array
     */
    public ?array $aArgs = [];

    public function __construct()
    {
        add_shortcode('sharedShortcode', [$this, 'sharedShortcode']);
    }
    public function sharedShortcode(array $aArgs = [])
    {
        $aArgs =
            wp_parse_args(
                $aArgs,
                [
                    'post_type'       => 'post',
                    'container_class' => 'RenderPosts',
                    'output_class'    => 'RenderPosts',
                ],
            );
        (new SharedController())
            ->setArgs($aArgs)
            ->renderContainerClass($aArgs['container_class'])
            ->output($aArgs['output_class']);
    }
    
    public function setArgs(array $aArgs)
    {
        $this->aArgs =
            wp_parse_args(
                $aArgs,
                [
                    'post_type'       => '',
                    'type_of_post'    => '',
                    'wanted_strlen'   => '60',
                    'end'             => '...',
                    'date_format'     => 'M d, Y',
                    'items_per_row'   => 3,
                    'number_of_row'   => 4,
                    'default_img'     => 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png',
                    'wrapper_classes' => 'photobox photobox_type10',
                    'inner_classes'   => 'photobox__previewbox',
                    'image_size'      => 'medium',
                ],
            );
            // var_export($this->aArgs['type_of_post']);die;
        return $this;
    }

    public function renderContainerClass(string $wantedClass)
    {
        if (
            is_numeric($this->aArgs['items_per_row']) == true &&
            (12 % $this->aArgs['items_per_row']) == 0 &&
            $this->aArgs['items_per_row'] != 0
        ) {
            $this->itemsPerRow = 12 / $this->aArgs['items_per_row'];
        } else {
            $this->itemsPerRow = 4;
        }

        $wantedClass = __NAMESPACE__ . '\\' . $wantedClass;
        $oWantedClass = new $wantedClass;
        $this->containerClass = $oWantedClass->renderContainerClass($this->itemsPerRow, $this->aArgs['type_of_post']);
        return $this;
    }

    public function output(string $wantedClass)
    {
        $oQuery = new \WP_Query([
            'post_type'      => $this->aArgs['post_type'],
            'posts_per_page' => $this->itemsPerRow * $this->aArgs['number_of_row'],
            'post_status'    => $this->aArgs['post_status']
        ]);

        $wantedClass = __NAMESPACE__ . '\\' . $wantedClass;
        $oWantedClass = new $wantedClass;
        ob_start();
        if ($oQuery->have_posts()) :
            while ($oQuery->have_posts()) :
                $oQuery->the_post(); ?>
                <div class="<?php echo esc_attr($this->containerClass->classes); ?>">
                    <?php $oWantedClass->renderHtml($this) ?>
                </div>
<?php
            endwhile;
        endif;

        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
        wp_reset_postdata();
    }
}
