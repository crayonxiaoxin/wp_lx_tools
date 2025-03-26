<?php

/**
 * LxToolsFileds
 */
class LxToolsFileds
{
    public static $page = "lx_tools";
    public static $options = "lx_tools_options";


    // 隐藏顶栏
    public static $hide_admin_bar = "lx_tools_field_admin_head";
    // 禁用自动更新
    public static $disabled_auto_update = "lx_tools_field_disabled_auto_update";
    // 禁用WP更新提示
    public static $hide_update_tips = "lx_tools_field_hide_update_tips";
    // 禁用插件更新提示
    public static $hide_plugin_update_tips = "lx_tools_field_hide_plugin_update_tips";
    // 隐藏 Admin Footer
    public static $hide_admin_footer = "lx_tools_field_hide_admin_footer";
    // 禁用 xmlrpc
    public static $disabled_xmlrpc = "lx_tools_field_disabled_xmlrpc";
    // 支持 文章 缩略图
    public static $support_thumbnail = "lx_tools_field_support_thumbnail";
    // 禁用 文章 Feed
    public static $disabled_feed = "lx_tools_field_disabled_feed";
    // 支持文章评论
    public static $support_comments = "lx_tools_field_support_comments";
    // 禁用登录页面语言切换器
    public static $disabled_login_lang_switcher = "lx_tools_field_disabled_login_lang_switcher";
    // 移除后台帮助选项
    public static $hide_help_tabs = "lx_tools_field_hide_help_tabs";
    // 移除后台显示选项
    public static $hide_screen_tabs = "lx_tools_field_hide_screen_tabs";
    // 关闭 自动生成 缩略图
    public static $disabled_gen_img_thumb = "lx_tools_field_disabled_gen_img_thumb";
    // 关闭 自动生成 中等图
    public static $disabled_gen_img_medium = "lx_tools_field_disabled_gen_img_medium";
    // 关闭 自动生成 大图
    public static $disabled_gen_img_large = "lx_tools_field_disabled_gen_img_large";
    // 关闭 自动生成 大图 2x
    public static $disabled_gen_img_large_2x = "lx_tools_field_disabled_gen_img_large_2x";
    // 关闭 自动生成 中大图
    public static $disabled_gen_img_medium_large = "lx_tools_field_disabled_gen_img_medium_large";
    // 关闭 自动生成 中大图 2x
    public static $disabled_gen_img_medium_large_2x = "lx_tools_field_disabled_gen_img_medium_large_2x";
    // 关闭 自动生成 其他大小的图片
    public static $disabled_gen_img_other_sizes = "lx_tools_field_disabled_gen_img_other_sizes";
    // 关闭 自动生成 缩放图片
    public static $disabled_gen_img_scaled_size = "lx_tools_field_disabled_gen_img_scaled_size";
    // 关闭 站点地图
    public static $disabled_sitemap = "lx_tools_field_disabled_sitemap";
    // 关闭 站点地图 文章
    public static $disabled_sitemap_posts = "lx_tools_field_disabled_sitemap_posts";
    // 关闭 站点地图 用户
    public static $disabled_sitemap_users = "lx_tools_field_disabled_sitemap_users";
    // 关闭 站点地图 页面
    public static $disabled_sitemap_pages = "lx_tools_field_disabled_sitemap_pages";
    // 关闭 站点地图 分类
    public static $disabled_sitemap_categories = "lx_tools_field_disabled_sitemap_categories";
    // 关闭 站点地图 标签
    public static $disabled_sitemap_tags = "lx_tools_field_disabled_sitemap_tags";
}


if (!function_exists('lx_tools_options')) {
    function lx_tools_options()
    {
        return get_option(LxToolsFileds::$options);
    }
}

if (!function_exists('lx_tools_option')) {
    function lx_tools_option($key, $default = false)
    {
        $options = lx_tools_options();
        if (isset($options[$key])) {
            return $options[$key];
        }
        return $default;
    }
}
