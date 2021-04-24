<?php

namespace SharedController\SingleLayout\Controller;

class SingleLayout
{
    public function __construct()
    {
        add_shortcode('single_layout', [$this, 'renderHtml']);
    }

    public function renderHtml(array $aAtts = [])
    {
        $oPost = get_post($aAtts['postid']);
        // var_dump($oPost);die;
        $postImg = get_the_post_thumbnail_url($aAtts['postid']);

        $aAtts =
            shortcode_atts(
                [
                    'type'      => 'leftImg',
                    'title'     => $oPost->post_title,
                    'content'   => $oPost->post_content,
                    'img'       => $postImg,
                ],
                $aAtts,
            );
        if ($aAtts['img'] == false) {
            $aAtts['img'] = 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png';
        }

        ob_start();
        if ($aAtts['type'] == 'leftImg') : ?>
            <div class="col-12 col-sm-12 col-lg-6">
                <img class="single_post_img" src="<?php echo $aAtts['img'] ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="col-12 col-sm-12 col-lg-6">
            <h2><?php echo $aAtts['title'] ?></h2>
            <p class="single_post_date">
                Post on: <?php echo apply_filters(
                                'renderPostDate',
                                esc_attr($oPost->post_date),
                                'M d, Y'
                            ) ?>

                At: <?php echo apply_filters(
                        'renderPostDate',
                        esc_attr($oPost->post_date),
                        'H:i'
                    ) ?>
            </p>
            <p><?php echo $aAtts['content'] ?></p>
        </div>
        <?php if ($aAtts['type'] == 'rightImg') : ?>
            <div class="col-12 col-sm-12 col-lg-6">
                <img src="<?php echo $aAtts['img'] ?>" alt="">
            </div>
        <?php endif; ?>

<?php
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }
}
