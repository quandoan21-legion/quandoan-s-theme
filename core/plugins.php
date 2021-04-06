<?php
function my_plugin_activation()
{
    
    $plugins = array(
        
        // Gọi một plugin nào đó ở bên ngoài
        array(
            'name'               => 'TGM New Media Plugin', // Tên của plugin
            'slug'               => 'tgm-new-media-plugin', // Tên thư mục plugin
            'source'             => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // Link tải plugin - direct link
            'required'           => true, // Nếu đặt là true thì plugin này sẽ không bắt buộc phải cài mà chỉ ở dạng Recommend.
            'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // Nếu bạn cài plugin ở bên ngoài, không phải từ WordPress.Org thì thêm URL của trang plugin vào.
        ),
        array(
            'name'    => 'Redux Framework',
            'slug'    => 'redux-framework',
            'require' => true,
        ),
        // Gọi một plugin trong thư viện WordPress.org/plugins
        array(
            'name'      => 'BuddyPress',
            'slug'      => 'buddypress', //Tên slug của plugin trên URL
            'required'  => false,
        ),

    );
    
    $config = array(
        'menu'         => 'tp_plugin_install', // Menu slug.
        'has_notices'  => true,                    // Có hiển thị thông báo hay không
        'dismissable'  => false,                       // Nếu 'dismissable' là false, thì tin nhắn ở đây sẽ hiển thị trên cùng trang Admin.
        'is_automatic' => true,
    );
    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'my_plugin_activation');
