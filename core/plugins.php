<?php
    function quandoan_plugin_activation(){
        //decleare required plugins
        $plugins = array(
            array (
                'name'     => 'Redux Framework',
                'slug'     => 'redux-framework',
                'required' => true,
            )
        );
         $configs = array(
             'menu'         => 'tp_plugin_install',
             'has_notice'   => true,
             'dismissable'  => false,
             'is_automatic' => true
         );
         tgmpa( $plugins, $configs);


    }
    add_action('tgmpa_register', 'quandoan_plugin_activation');
 ?>