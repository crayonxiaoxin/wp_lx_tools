<?php
// 隐藏顶栏
if (lx_tools_option(LxToolsFileds::$hide_admin_bar)) {
    add_filter('show_admin_bar', '__return_false');
}
// 禁用自动更新
if (lx_tools_option(LxToolsFileds::$diabled_auto_update)) {
    add_filter('automatic_updater_disabled', '__return_true');
}
// 禁用WP更新提示
if (lx_tools_option(LxToolsFileds::$hide_update_tips)) {
    add_filter('pre_site_transient_update_core', function () {
        return null;
    });
}
// 禁用插件更新提示
if (lx_tools_option(LxToolsFileds::$hide_plugin_update_tips)) {
    add_filter('pre_site_transient_update_plugins', function () {
        return null;
    });
}
// 隐藏 Admin Footer
if (lx_tools_option(LxToolsFileds::$hide_admin_footer)) {
    add_action('admin_head', function () {
        echo '<style type="text/css">
        #wpfooter{display: none !important;}
        </style>';
    });
}
// 支持文章缩略图
if (lx_tools_option(LxToolsFileds::$support_thumbnail)) {
    add_theme_support('post-thumbnails');
}