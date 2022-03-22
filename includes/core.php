<?php
// function lx_tools_load_my_own_textdomain($mofile, $domain)
// {
//     // var_dump($mofile,$domain);
//     // var_dump(admin_url('admin.php?page=lx_tools'));
//     // var_dump($_SERVER);
//     $is_lx_setting = strpos($_SERVER['REQUEST_URI'],'admin.php?page=lx_tools')!=false;
//     $is_plugin_page = 'lx_tools' === $domain && false !== strpos($mofile, WP_LANG_DIR . '/plugins/');
//     if ($is_plugin_page || $is_lx_setting) {
//         var_dump(66666666666);
//         $locale = apply_filters('plugin_locale', determine_locale(), $domain);
//         // $mofile = WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/languages/' . $domain . '-' . $locale . '.mo';
//         $mofile = WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__),2) . '/languages/' . $locale . '.pot';
//         // var_dump(WP_PLUGIN_DIR);
//         // var_dump(plugin_dir_path(__FILE__));
//         // var_dump( dirname(plugin_basename(__FILE__)));
//         var_dump($mofile);
//     }
//     // var_dump($mofile,$domain);
//     return $mofile;
// }
// add_filter('load_textdomain_mofile', 'lx_tools_load_my_own_textdomain', 10, 2);

// 隐藏顶栏
if (lx_tools_option(LxToolsFileds::$hide_admin_bar)) {
    add_filter('show_admin_bar', '__return_false');
}
// 禁用自动更新
if (lx_tools_option(LxToolsFileds::$diabled_auto_update)) {
    // 关闭 自动更新
    add_filter('automatic_updater_disabled', '__return_true');
    // 关闭 更新检查 定时任务
    remove_action('init', 'wp_schedule_update_checks');
    // 移除 已有的版本检查 定时任务
    wp_clear_scheduled_hook('wp_version_check');
    // 移除 插件更新 定时任务
    wp_clear_scheduled_hook('wp_update_plugins');
    // 移除 主题更新 定时任务
    wp_clear_scheduled_hook('wp_update_themes');
    // 移除 已有的自动更新 定时任务
    wp_clear_scheduled_hook('wp_maybe_auto_update');
    // 移除 后台内核 更新检查
    remove_action( 'admin_init', '_maybe_update_core' );
    // 移除 后台插件 更新检查 
    remove_action( 'load-plugins.php', 'wp_update_plugins' );
    remove_action( 'load-update.php', 'wp_update_plugins' );
    remove_action( 'load-update-core.php', 'wp_update_plugins' );
    remove_action( 'admin_init', '_maybe_update_plugins' );
    // 移除 后台主题 更新检查 
    remove_action( 'load-themes.php', 'wp_update_themes' );
    remove_action( 'load-update.php', 'wp_update_themes' );
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    remove_action( 'admin_init', '_maybe_update_themes' );
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
