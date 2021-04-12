<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

if (!class_exists('Redux')) {
	return null;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'aRedux_vars';

/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get('Name'),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get('Version'),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__('Custom Options', 'quandoan-theme-options'),
	'page_title'                => esc_html__('Custom Options', 'quandoan-theme-options'),

	// Use a asynchronous font on the front end or font string.
	'async_typography'          => true,

	// Disable this in case you want to create your own google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose an priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//docs.redux.io/',
	'title' => esc_html__('Documentation', 'quandoan-theme-options'),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__('Support', 'quandoan-theme-options'),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => esc_html__('Extensions', 'quandoan-theme-options'),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => esc_html__('Like us on Facebook', 'quandoan-theme-options'),
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => esc_html__('Follow us on Twitter', 'quandoan-theme-options'),
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => esc_html__('FInd us on LinkedIn', 'quandoan-theme-options'),
	'icon'  => 'el el-linkedin',
);

$args['footer_icons'][] = array(
	'url'   => 'https://www.facebook.com/pages/',
	'title' => esc_html__('Like us on Facebook', 'quandoan-theme-options'),
	'icon'  => 'icofont-twitter',
);
$args['footer_icons'][] = array(
	'url'   => 'https://www.twitter.com/',
	'title' => esc_html__('Follow us on Twitter', 'quandoan-theme-options'),
	'icon'  => 'icofont-twitter',
);
$args['footer_icons'][] = array(
	'url'   => 'https://www.youtube.com/',
	'title' => esc_html__('Subcribe us on Youtube', 'quandoan-theme-options'),
	'icon'  => 'icofont-youtube',
);

// Panel Intro text -> before the form.
if (!isset($args['global_variable']) || false !== $args['global_variable']) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace('-', '_', $args['opt_name']);
	}
	$args['intro_text'] = '<p>' . sprintf(__('Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $s', 'quandoan-theme-options') . '</p>', '<strong>' . $v . '</strong>');
} else {
	$args['intro_text'] = '<p>' . esc_html__('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'quandoan-theme-options') . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__('This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'quandoan-theme-options') . '</p>';

Redux::set_args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__('Theme Information 1', 'quandoan-theme-options'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'quandoan-theme-options') . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__('Theme Information 2', 'quandoan-theme-options'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'quandoan-theme-options') . '</p>',
	),
);

Redux::set_help_tab($opt_name, $help_tabs);

// Set the help sidebar.
$content = '<p>' . esc_html__('This is the sidebar content, HTML is allowed.', 'quandoan-theme-options') . '</p>';
Redux::set_help_sidebar($opt_name, $content);

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);

$section = array(
	'title'  => esc_html__('Basic Field', 'quandoan-theme-options'),
	'id'     => 'basic',
	'desc'   => esc_html__('Basic field with no subsections.', 'quandoan-theme-options'),
	'icon'   => 'el el-home',
	'fields' => array(
		array(
			'id'       => 'opt-text',
			'type'     => 'text',
			'title'    => esc_html__('Example Text', 'quandoan-theme-options'),
			'desc'     => esc_html__('Example description.', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Example subtitle.', 'quandoan-theme-options'),
			'hint'     => array(
				'content' => wp_kses(__('This is a <strong>hint</strong> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.', 'quandoan-theme-options'), $kses_exceptions),
			),
		),
	),
);

Redux::set_section($opt_name, $section);

$section = array(
	'title' => __('Basic Fields', 'quandoan-theme-options'),
	'id'    => 'basic',
	'desc'  => __('Basic fields as subsections.', 'quandoan-theme-options'),
	'icon'  => 'el el-home',
);

Redux::set_section($opt_name, $section);

$section = array(
	'title'      => esc_html__('Logo', 'quandoan-theme-options'),
	'desc'       => 'Enable IMG menu ',
	'id'         => 'opt-logo-subsection',
	'compiler'   => 'bool',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'logo-switch',
			'type'     => 'switch',
			'title'    => esc_html__('You want to enable your theme menu', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Enable/Disable', 'quandoan-theme-options'),
			'desc'     => esc_html__('Enable/Disable Your Logo', 'quandoan-theme-options'),
			'default'  => 'Default Text',
			'on'       => __('Enalbed', 'quandoan-theme-options'),
			'off'      => __('Disabled', 'quandoan-theme-options'),
		),
		array(
			'id'       => 'logo-img',
			'type'     => 'media',
			'title'    => esc_html__('Your theme logo', 'quandoan-theme-options'),
			'desc'     => esc_html__('Change your theme logo', 'quandoan-theme-options'),
			'default'  => 'Default Text',
			'on'       => __('Enalbed', 'quandoan-theme-options'),
			'off'      => __('Disabled', 'quandoan-theme-options'),
		),
	),
);

Redux::set_section($opt_name, $section);
$section = array(
	'title'      => esc_html__('Footer', 'quandoan-theme-options'),
	'desc'       => esc_html__('For full documentation on this field, visit: ', 'quandoan-theme-options') . '<a href="//docs.redux.io/core/fields/textarea/" target="_blank">//docs.redux.io/core/fields/textarea/</a>',
	'id'         => 'opt-textarea-subsection',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-switch',
			'type'     => 'switch',
			'title'    => esc_html__('You want to enable your footer', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Enable/Disable', 'quandoan-theme-options'),
			'desc'     => esc_html__('Enable/Disable Your Logo', 'quandoan-theme-options'),
			'default'  => 'Default Text',
			'on'       => __('Enalbed', 'quandoan-theme-options'),
			'off'      => __('Disabled', 'quandoan-theme-options'),
		),
		array(
			'id'       => 'footer-h5',
			'type'     => 'text',
			'title'    => esc_html__('Footer H5', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Subtitle', 'quandoan-theme-options'),
			'desc'     => esc_html__('Field Description', 'quandoan-theme-options'),
			'default'  => 'Default Text',
		),
		array(
			'id'       => 'footer-h3',
			'type'     => 'text',
			'title'    => esc_html__('Footer H3', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Subtitle', 'quandoan-theme-options'),
			'desc'     => esc_html__('Field Description', 'quandoan-theme-options'),
			'default'  => 'Default Text',
		),
		array(
			'id'       => 'footer-copyrights',
			'type'     => 'text',
			'title'    => esc_html__('Footer Copyrights', 'quandoan-theme-options'),
			'subtitle' => esc_html__('Subtitle', 'quandoan-theme-options'),
			'desc'     => esc_html__('Field Description', 'quandoan-theme-options'),
			'default'  => 'Default Text',
		),
	),
);

Redux::set_section($opt_name, $section);

/*
 * <--- END SECTIONS
 */
