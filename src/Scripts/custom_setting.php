<?php
class customSetting
{
    function hook_into_wordpress()
    {
        add_action('admin_init', [$this, 'register_settings']);
    }

    function register_settings()
    {
        //đăng ký các fields settings
        register_setting('my-settings-group', 'phone');
        register_setting('my-settings-group', 'company_address');
    }
}
$customSetting = new customSetting;
$customSetting->hook_into_wordpress();
