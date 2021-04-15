<?php
namespace Src;
class MainController
{
    public static function quanRenderTitle(array $aAtts){
        $aAtts = shortcode_atts([
            'title'    => '',
            'subtitle' => '',
        ],$aAtts);
        ?>
            <h5>
                <?php
                echo strtoupper(esc_attr($aAtts['subtitle'])); 
                ?>
            </h5>
            <h2>
                <?php
                echo esc_attr($aAtts['title']); 
                ?>
            </h2>
        <?php
    }
}
