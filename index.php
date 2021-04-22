<?php
session_start();
global $aRedux_vars;

use Src\MainController as MainController;

?>

<?php get_header() ?>
    <!-- SERVICES SECTION -->
    <section id="about-us" class="services">
        <div class="container-fluid">
            <div class="side-img">
                <img src="images/aside.svg" alt="">
            </div>
            <div class="side2-img">
                <img src="images/aside2.svg" alt="">
            </div>
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
    <section id="contact-us" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>CONTACT US</h5>
                    <h2>Get in Touch</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Your email" type="email" id="email" pattern=".+@globex.com" size="30" required>
                </div>
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Subject" type="subject" id="subject" size="30" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 message">
                    <textarea id="message" name="message" rows="5" cols="1">Message here...</textarea>
                </div>
                <div class="col-12">
                    <div class="hero-btns contact-btn">
                        <!-- Send Message Btn -->
                        <a href="#">Send Message</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER SECTION -->
<?php get_footer() ?>