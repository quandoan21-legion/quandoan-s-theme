<?php

global $aRedux_vars;
use Src\MainController as MainController; ?>

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
        <div class="col-12 col-sm-12 col-lg-4 service-txt">
          <h2>Anything you need,we’ve got you covered</h2>
          <div class="hero-btns service-btn">
            <a data-scroll href="#contact-us">Get in Touch</a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="service-box">
            <img src="images/service-icon1.svg" alt="">
            <!-- Service Title -->
            <h3>Web & Graphic<br>Design</h3>
            <!-- Replace Patch to Image Under -->
            <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="service-box">
            <img src="images/service-icon2.svg" alt="">
            <!-- Service Title -->
            <h3>Web & App<br>Development</h3>
            <!-- Service Info -->
            <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ABOUT SECTION -->
<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-6">
        <img src="images/aboutimg.svg" alt="">
      </div>
      <div class="col-12 col-sm-12 col-lg-6">
        <h5>OUR COMPANY</h5>
        <h2>Some Fine<br>Words About Us</h2>
        <!-- Replace About Us Text Under -->
        <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.Vestibulum ac diam sit amet.Quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
      </div>
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
          ]);
          ?>
        </div>
      </div>
      <div class="row">
        <?php
        do_shortcode('[quan_render_portfolio_items items_per_row="2" post_title="123"]')
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
            'title' => 'Checkout our Post',
          ]);
          ?>
        </div>
      </div>
      <div id="blog-drag" class="row blog-slider">
        <?php
        do_shortcode('[quan_render_post_items number_of_row="3"]')
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