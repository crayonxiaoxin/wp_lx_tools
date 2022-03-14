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
    public static $diabled_auto_update="lx_tools_field_diabled_auto_update";
    // 禁用WP更新提示
    public static $hide_update_tips="lx_tools_field_hide_update_tips";
    // 禁用插件更新提示
    public static $hide_plugin_update_tips="lx_tools_field_hide_plugin_update_tips";
    // 隐藏 Admin Footer
    public static $hide_admin_footer="lx_tools_field_hide_admin_footer";
    // 支持文章缩略图
    public static $support_thumbnail="lx_tools_field_support_thumbnail";
    // 支持文章评论
    public static $support_comments="lx_tools_field_support_comments";
}


if (!function_exists('lx_tools_options')) {
    function lx_tools_options()
    {
        return get_option(LxToolsFileds::$options);
    }
}

if (!function_exists('lx_tools_option')) {
    function lx_tools_option($key, $default = true)
    {
        $options = lx_tools_options();
        if (isset($options[$key])) {
            return $options[$key];
        }
        return $default;
    }
}
