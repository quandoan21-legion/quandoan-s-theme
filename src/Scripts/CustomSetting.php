<?php
namespace Src\Scripts;
class CustomSetting
{
    function __construct()
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
