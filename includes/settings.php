<?php

/**
 * 后台 - 设置页面
 */

// admin_init 时执行设置的初始化
add_action('admin_init', 'lx_tools_settings_init');

function lx_tools_settings_init()
{
    // 为 lx_tools 页面注册新设置
    register_setting(LxToolsFileds::$page, LxToolsFileds::$options);
    // 添加部分
    $section_general = "lx_tools_section_general";
    $section_update = "lx_tools_section_update";
    $section_posts = "lx_tools_section_posts";
    lx_setting_section($section_general, __('常规设置','lx_tools'));
    lx_setting_section($section_update, __('更新设置','lx_tools'));
    lx_setting_section($section_posts, __('文章设置','lx_tools'));
    // 添加字段
    lx_setting_field(
        LxToolsFileds::$hide_admin_bar,
        __('隐藏顶栏','lx_tools'),
        'lx_field_cb_checkbox',
        $section_general
    );
    lx_setting_field(
        LxToolsFileds::$hide_admin_footer,
        __('隐藏 Admin Footer','lx_tools'),
        'lx_field_cb_checkbox',
        $section_general
    );
    lx_setting_field(
        LxToolsFileds::$diabled_auto_update,
        __('禁用自动更新','lx_tools'),
        'lx_field_cb_checkbox',
        $section_update
    );
    lx_setting_field(
        LxToolsFileds::$hide_update_tips,
        __('隐藏WP更新提示','lx_tools'),
        'lx_field_cb_checkbox',
        $section_update
    );
    lx_setting_field(
        LxToolsFileds::$hide_plugin_update_tips,
        __('隐藏插件更新提示','lx_tools'),
        'lx_field_cb_checkbox',
        $section_update
    );
    lx_setting_field(
        LxToolsFileds::$support_thumbnail,
        __('支持缩略图','lx_tools'),
        'lx_field_cb_checkbox',
        $section_posts
    );
}

// function lx_tools_field_admin_head_cb($args)
// {
//     lx_field_cb_checkbox($args);
// }
// function lx_tools_field_diabled_auto_update_cb($args)
// {
//     lx_field_cb_checkbox($args);
// }
// function lx_tools_field_hide_update_tips_cb($args)
// {
//     lx_field_cb_checkbox($args);
// }

// 注册菜单
add_action('admin_menu', 'lx_tools_options_page');

function lx_tools_options_page()
{
    add_menu_page('Lx Tools', 'Lx Tools', 'manage_options', LxToolsFileds::$page, 'lx_tools_options_page_html');
}

// 设置页面 - UI
function lx_tools_options_page_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('wporg_messages', 'wporg_message', __('Settings Saved', 'wporg'), 'updated');
    }

    // show error/update messages
    settings_errors('wporg_messages');
?>
    <style type="text/css">
        .lx_tools-settings .form-table {
            margin-bottom: 30px;
            border-bottom: 2px dotted #ddd;
        }
    </style>
    <div class="wrap lx_tools-settings">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields(LxToolsFileds::$page);
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections(LxToolsFileds::$page);
            // output save settings button
            submit_button(__("保存设置", "lx_tools"));
            ?>
        </form>
    </div>
<?php
}
