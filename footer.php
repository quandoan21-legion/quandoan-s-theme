<footer>
    <?php
    global $aRedux_vars;
    echo do_action('my-settings-group');
    if ($aRedux_vars['footer-switch'] == 1) { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5><?php echo $aRedux_vars['footer-h5'] ?></h5>
                    <h3><?php echo $aRedux_vars['footer-h3'] ?></h3>
                    <nav class="navbar navbar-expand-lg footer-nav">
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'footer-nav',
                            'container'       => 'ul',
                            'menu_class'      => 'contact-nav'
                        )); ?>
                    </nav>
                    <h6><?php echo $aRedux_vars['footer-h6'] ?></h6>
                    <ul class="social">
                        <?php foreach ($aRedux_vars['opt-slides'] as $value) {?>
                            
                            <li><a href="<?php echo $value['url'] ?>"><i class="<?php echo $value['title'] ?>"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php  } ?>
</footer>
<!-- Scripts -->

<?php wp_footer() ?>
<!-- Scripts Ends -->
</body>

</html>