<?php

namespace AboutUs\Controllers;
class AboutUsController
{
    public function __construct()
    {
        add_shortcode('about_us', [$this, 'renderHtml']);
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
        ob_start(); ?>

        <div class="col-12 col-sm-12 col-lg-6">
            <img src="<?php echo $aAtts['img'] ?>" alt="">
        </div>

        <?php
        $imgHtml = ob_get_clean();
        ob_end_clean();
        ?>

        <section class="about">
            <div class="container">
                <div class="row">
                    <?php
                    if ($aAtts['type'] == 'leftImg') {
                        echo $imgHtml;
                    }
                    ?>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <h5><?php echo $aAtts['sub_title'] ?></h5>
                        <h2><?php echo $aAtts['title'] ?></h2>
                        <p><?php echo $aAtts['content'] ?></p>
                    </div>
                    <?php
                    if ($aAtts['type'] == 'rightImg') {
                        echo $imgHtml;
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }
}