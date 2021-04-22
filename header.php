<?php global $aRedux_vars; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <?php wp_head() ?>
    <!-- Document Title -->
    <title>Doob | Simple Agency HTML Template</title>
</head>

<body>
    <!-- HEADER SECTION -->
    <header id="home">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <!-- Change Logo Img Here -->
                <?php if ($aRedux_vars['logo-switch'] == 1) { ?>
                    <a class="logo-header">
                        <img class="logo-header" src="<?php echo $aRedux_vars['logo-img']['url']; ?>" alt="">
                    </a>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="interactive-menu-button">
                        <a href="#">
                            <span>Menu</span>
                        </a>
                    </div>
                </button>
                <?php wp_nav_menu(array(
                    'theme_location'  => 'main-nav', // tên location cần hiển thị
                    'container'       => 'ul',
                    'menu_class'      => 'navbar-nav mr-auto',
                )); ?>
                <form data-scroll="" href="#contact-us" class="contact-btn form-inline my-2 my-lg-0">
                    <!-- Contacgt Us Button -->
                    <button>Contact Us</button>
                </form>
            </nav>
        </div>

        <!-- HERO SECTION -->
        <div class="container-fluid hero">
            <img class="hero_img" src="<?php echo $aRedux_vars['banner_img']['url'] ?>" alt="">
            <div class="container">
                <!-- Hero Title -->
                <h1><?php echo $aRedux_vars['banner_title'] ?></h1>
                <!-- Hero Title Info -->
                <p><?php echo $aRedux_vars['banner_content'] ?></p>
                <div class="hero-btns">
                    <!-- Hero Btn First -->
                    <a data-scroll href="<?php echo $aRedux_vars['banner_left_btn_button_url'] ?>"><?php echo
                        $aRedux_vars['banner_left_button_content'] ?></a>
                    <!-- Hero Btn Second -->
                    <a data-scroll href="<?php echo $aRedux_vars['banner_left_btn_button_url'] ?>"><?php echo
                        $aRedux_vars['banner_right_btn_content'] ?></a>
                </div>
            </div>
        </div>
    </header>