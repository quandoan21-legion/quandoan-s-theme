<?php

namespace Banner\Controllers;

class BannerController
{
    public function __construct()
    {
        add_shortcode('banner', [$this, 'renderHtml']);
    }

    public function renderHtml(array $aAtts = [])
    {
        $aAtts =
            shortcode_atts(
                [
                    'type'                  => 'rightImg',
                    'title'                 => 'this is Banner title',
                    'content'               => 'this is Banner content',
                    'banner_left_btn_text'  => 'left btn',
                    'banner_left_btn_url'   => '#',
                    'banner_right_btn_text' => 'right btn',
                    'banner_right_btn_url'  => '#',
                    'img'                   => 'http://wordpresstest.io/wp-content/uploads/2021/04/160610176_1895962803895113_2591466397585361544_n.jpg',
                ],
                $aAtts,
            );
        ob_start(); ?>

        <div class="container-fluid hero">
            <img class="hero_img" src="<?php echo $aAtts['img'] ?>" alt="">
            <div class="container">
                <!-- Hero Title -->
                <h1><?php echo $aAtts['title'] ?></h1>
                <!-- Hero Title Info -->
                <p><?php echo $aAtts['content'] ?></p>
                <div class="hero-btns">
                    <!-- Hero Btn First -->
                    <a data-scroll href="<?php echo $aAtts['banner_left_btn_url'] ?>"><?php echo $aAtts['banner_left_btn_text'] ?></a>
                    <!-- Hero Btn Second -->
                    <a data-scroll href="<?php echo $aAtts['banner_right_btn_url'] ?>"><?php echo $aAtts['banner_right_btn_text'] ?></a>
                </div>
            </div>
        </div>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }
}