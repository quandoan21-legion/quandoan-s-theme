<?php

namespace TextWithPictureLayout\Controllers;
class TextWithPictureLayoutController
{
    public function __construct()
    {
        add_shortcode('TextWithPictureLayout', [$this, 'renderHtml']);
    }

    public function renderHtml(array $aAtts = [])
    {

        $aAtts =
            shortcode_atts(
                [
                    'type'      => 'leftImg',
                    'sub_title' => 'This is about us subtitle',
                    'title'     => 'this is about us title',
                    'content'   => 'this is about us content',
                    'img'       => 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png',
                ],
                $aAtts,
            );

        ob_start();
        if ($aAtts['type'] == 'leftImg'):?>
            <div class="col-12 col-sm-12 col-lg-6">
                <img src="<?php echo $aAtts['img'] ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="col-12 col-sm-12 col-lg-6">
            <h5><?php echo $aAtts['sub_title'] ?></h5>
            <h2><?php echo $aAtts['title'] ?></h2>
            <p><?php echo $aAtts['content'] ?></p>
        </div>
        <?php if ($aAtts['type'] == 'rightImg'): ?>
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