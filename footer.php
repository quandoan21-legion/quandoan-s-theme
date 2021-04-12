<footer>
    <?php
    global $aRedux_vars;
    global $args;
    echo do_action('my-settings-group'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5><?php echo $aRedux_vars['footer-h5'] ?></h5>
                <h3><?php echo $aRedux_vars['footer-h3'] ?></h3>
                <nav class="navbar navbar-expand-lg">
                    <?php wp_nav_menu(array(
                        'theme_location'  => 'main-nav', // tên location cần hiển thị
                        'container'       => 'div', // thẻ container của menu
                        'container_class' => 'collapse navbar-collapse', //class của container
                        'menu_class'      => 'navbar-nav mr-auto' // class của menu bên trong
                    )); ?>
                </nav>
                <h6><?php echo $aRedux_vars['footer-copyrights'] ?></h6>
                <ul class="social">
                    <?php foreach ($args['footer_icons'] as $value) {
                        ?>
                        <li><a href="<?php echo $value['url'] ?>"><i class="<?php echo $value['icon'] ?>"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->

<?php wp_footer() ?>
<!-- Scripts Ends -->
</body>

</html>