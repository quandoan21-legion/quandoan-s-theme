<?php
add_action('admin_init', 'register_settings');
function register_settings()
{
    //đăng ký các fields settings
    register_setting('my-settings-group', 'phone');
    register_setting('my-settings-group', 'company_address');
}
