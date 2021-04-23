<?php
session_start();
global $aRedux_vars;

use Src\MainController as MainController;

?>

<?php get_header() ?>
    <!-- SERVICES SECTION -->
    <section id="about-us" class="services">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <?php
                    do_shortcode('[our_services layout="our_services" items_per_row="3"]');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION -->
    <section class="about">
        <div class="container">
            <div class="row">
                <?php
                do_shortcode('[about_us type="rightImg"]');
                ?>
            </div>
        </div>
    </section>
    <!-- PORTFOLIO SECTION -->
    <section id="portfolio" class="portfolio">
        <div class="container-fluid">
            <div class="portfolio-aside">
                <img src="images/aside3.svg" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        MainController::quanRenderTitle([
                                'title' => 'Checkout our portfolios',
                            ]
                        );
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    do_shortcode('[portfolio layout="grid"]');
                    ?>
                </div>

                <div class="row">
                    <div class="col-12 more-btn">
                        <!-- Show Me More/Less Button -->
                        <a class="more-btn-inside">Show More.</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG SECTION -->
    <section id="blog" class="blog">
        <div class="container-fluid">
            <div class="blog-aside">
                <img src="images/aside4.svg" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        MainController::quanRenderTitle([
                                'subtitle' => 'post',
                                'title'    => 'Checkout our Post',
                            ]
                        );
                        ?>
                    </div>
                </div>
                <div id="blog-drag" class="row blog-slider">
                    <?php
                    do_shortcode('[post layout="list" items_per_row="3"]');
                    ?>
                    <!-- Blog Button to Show More or Less on Mobile&Tablet View  -->
                    <button class="hide-me" id="blog-btn">Show More Stories</button>
                </div>
            </div>
    </section>
    <!-- CONTACT SECTION -->
<?php
do_shortcode('[contact_us sm_left_input_size="7" sm_right_input_size="5" message_size="12"]')
?>
    <!-- FOOTER SECTION -->
<?php get_footer() ?>