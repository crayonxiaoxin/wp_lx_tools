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
// 禁用登录页语言切换器
if (lx_tools_option(LxToolsFileds::$disabled_login_lang_switcher)) {
    add_filter('login_display_language_dropdown', '__return_false');
}
// 隐藏后台帮助选项
if (lx_tools_option(LxToolsFileds::$hide_help_tabs)) {
    add_action('in_admin_header', function () {
        global $current_screen;
        $current_screen->remove_help_tabs();
    });
}
// 隐藏后台显示选项
if (lx_tools_option(LxToolsFileds::$hide_screen_tabs)) {
    add_action('in_admin_header', function () {
        add_filter('screen_options_show_screen', '__return_false');
        add_filter('hidden_columns', '__return_empty_array');
    });
}
// 禁用自动更新
if (lx_tools_option(LxToolsFileds::$disabled_auto_update)) {
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
    remove_action('admin_init', '_maybe_update_core');
    // 移除 后台插件 更新检查 
    remove_action('load-plugins.php', 'wp_update_plugins');
    remove_action('load-update.php', 'wp_update_plugins');
    remove_action('load-update-core.php', 'wp_update_plugins');
    remove_action('admin_init', '_maybe_update_plugins');
    // 移除 后台主题 更新检查 
    remove_action('load-themes.php', 'wp_update_themes');
    remove_action('load-update.php', 'wp_update_themes');
    remove_action('load-update-core.php', 'wp_update_themes');
    remove_action('admin_init', '_maybe_update_themes');
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
// 禁用文章 Feed
if (lx_tools_option(LxToolsFileds::$disabled_feed)) {
    function lx_disable_feed()
    {
        wp_die(__('本站不再提供 Feed，请访问 <a href="' . esc_url(home_url('/')) . '">首页</a>!'));
    }

    add_action('do_feed', 'lx_disable_feed', 1);
    add_action('do_feed_rdf', 'lx_disable_feed', 1);
    add_action('do_feed_rss', 'lx_disable_feed', 1);
    add_action('do_feed_rss2', 'lx_disable_feed', 1);
    add_action('do_feed_atom', 'lx_disable_feed', 1);
    add_action('do_feed_rss2_comments', 'lx_disable_feed', 1);
    add_action('do_feed_atom_comments', 'lx_disable_feed', 1);
}

// 禁用自动生成缩略图
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_thumb)) {
    function lx_tools_disabled_gen_img_thumb($sizes)
    {
        unset($sizes['thumbnail']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_thumb');
}
// 禁用自动生成中图
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_medium)) {
    function lx_tools_disabled_gen_img_medium($sizes)
    {
        unset($sizes['medium']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_medium');
}
// 禁用自动生成大图
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_large)) {
    function lx_tools_disabled_gen_img_large($sizes)
    {
        unset($sizes['large']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_large');
    add_filter('big_image_size_threshold', '__return_false');
}
// 禁用自动生成大图 2x
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_large_2x)) {
    function lx_tools_disabled_gen_img_large_2x($sizes)
    {
        unset($sizes['2048x2048']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_large_2x');
}
// 禁用自动生成中大图
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_medium_large)) {
    function lx_tools_disabled_gen_img_medium_large($sizes)
    {
        unset($sizes['medium_large']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_medium_large');
}
// 禁用自动生成中大图 2x
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_medium_large_2x)) {
    function lx_tools_disabled_gen_img_medium_large_2x($sizes)
    {
        unset($sizes['1536x1536']);
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'lx_tools_disabled_gen_img_medium_large_2x');
}
// 禁用自动生成其他尺寸图
if (lx_tools_option(LxToolsFileds::$disabled_gen_img_other_sizes)) {
    function lx_tools_disabled_gen_img_other_sizes()
    {
        remove_image_size('post-thumbnail'); // disable set_post_thumbnail_size() 
        remove_image_size('another-size');   // disable other add image sizes
    }
    add_action('init', 'lx_tools_disabled_gen_img_other_sizes');
}
// 禁用 sitemap
if (lx_tools_option(LxToolsFileds::$disabled_sitemap)) {
    add_filter('wp_sitemaps_enabled', '__return_false');
}
// 禁用 sitemap 分类
if (lx_tools_option(LxToolsFileds::$disabled_sitemap_categories)) {
    add_filter(
        'wp_sitemaps_taxonomies',
        function ($taxonomies) {
            unset($taxonomies['category']);
            return $taxonomies;
        }
    );
}
// 禁用 sitemap 标签
if (lx_tools_option(LxToolsFileds::$disabled_sitemap_tags)) {
    add_filter(
        'wp_sitemaps_taxonomies',
        function ($taxonomies) {
            unset($taxonomies['post_tag']);
            return $taxonomies;
        }
    );
}
// 禁用 sitemap 文章
if (lx_tools_option(LxToolsFileds::$disabled_sitemap_posts)) {
    add_filter(
        'wp_sitemaps_post_types',
        function ($post_types) {
            unset($post_types['post']);
            return $post_types;
        }
    );
}
// 禁用 sitemap 页面
if (lx_tools_option(LxToolsFileds::$disabled_sitemap_pages)) {
    add_filter(
        'wp_sitemaps_post_types',
        function ($post_types) {
            unset($post_types['page']);
            return $post_types;
        }
    );
}
// 禁用 sitemap 用户
if (lx_tools_option(LxToolsFileds::$disabled_sitemap_users)) {
    add_filter('wp_sitemaps_add_provider', function ($provider, $strName) {
        if ('users' === $strName) {
            return false;
        }
        return $provider;
    }, 10, 2);
}
