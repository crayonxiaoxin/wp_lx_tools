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
    $section_upload_imgs = "lx_tools_section_upload_imgs";
    $section_sitemaps = "lx_tools_section_sitemaps";
    lx_tools_setting_section($section_general, __('常规设置', 'lx_tools'));
    lx_tools_setting_section($section_update, __('更新设置', 'lx_tools'));
    lx_tools_setting_section($section_posts, __('文章设置', 'lx_tools'));
    lx_tools_setting_section($section_upload_imgs, __('图片设置', 'lx_tools'));
    lx_tools_setting_section($section_sitemaps, __('Sitemap 设置', 'lx_tools'));

    // 添加字段
    lx_tools_setting_field(
        LxToolsFileds::$disabled_login_lang_switcher,
        __('登录语言切换', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_general,
        '禁用登录页语言切换器'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_admin_bar,
        __('主页控制栏', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_general,
        '隐藏登录后主页控制栏'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_admin_footer,
        __('底部广告', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_general,
        '隐藏后台底部wp或主题信息'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_help_tabs,
        __('帮助选项', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_general,
        '隐藏后台帮助选项'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_screen_tabs,
        __('显示选项', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_general,
        '隐藏后台显示选项'
    );


    lx_tools_setting_field(
        LxToolsFileds::$disabled_auto_update,
        __('自动更新', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_update,
        '禁用所有自动更新，包括主题和插件'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_update_tips,
        __('更新提示', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_update,
        '隐藏WP更新提示'
    );
    lx_tools_setting_field(
        LxToolsFileds::$hide_plugin_update_tips,
        __('插件更新提示', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_update,
        '隐藏插件更新提示'
    );


    lx_tools_setting_field(
        LxToolsFileds::$support_thumbnail,
        __('缩略图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_posts,
        '开启文章缩略图支持'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_feed,
        __('关闭 Feed', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_posts,
        '关闭 Feed，防止被采集'
    );


    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_thumb,
        __('缩略图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成缩略图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_medium,
        __('中等图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成中等图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_large,
        __('大图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成大图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_large_2x,
        __('大图 2x', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成 2x 大图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_medium_large,
        __('中大图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成中大图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_medium_large_2x,
        __('中大图 2x', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成 2x 中大图'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_gen_img_other_sizes,
        __('其他尺寸图', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_upload_imgs,
        '禁用自动生成其他尺寸图，例如由 `set_post_thumbnail_size()` 或 `add_image_size()` 生成的'
    );


    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap,
        __('彻底关闭', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '关闭 sitemap'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap_users,
        __('隐藏用户', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '在 sitemap 中隐藏用户列表，防止用户名称泄露'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap_posts,
        __('隐藏文章', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '在 sitemap 中隐藏文章列表'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap_pages,
        __('隐藏页面', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '在 sitemap 中隐藏页面列表'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap_categories,
        __('隐藏分类', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '在 sitemap 中隐藏分类列表'
    );
    lx_tools_setting_field(
        LxToolsFileds::$disabled_sitemap_tags,
        __('隐藏分类', 'lx_tools'),
        'lx_tools_field_cb_checkbox',
        $section_sitemaps,
        '在 sitemap 中隐藏标签列表'
    );
    


}

// function lx_tools_field_admin_head_cb($args)
// {
//     lx_tools_field_cb_checkbox($args);
// }
// function lx_tools_field_diabled_auto_update_cb($args)
// {
//     lx_tools_field_cb_checkbox($args);
// }
// function lx_tools_field_hide_update_tips_cb($args)
// {
//     lx_tools_field_cb_checkbox($args);
// }

// 注册菜单
add_action('admin_menu', 'lx_tools_options_page');

function lx_tools_options_page()
{
    add_menu_page('小鑫工具（lx_tools）', '小鑫工具', 'manage_options', LxToolsFileds::$page, 'lx_tools_options_page_html');
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
    global $wp_settings_sections;
    $sections = $wp_settings_sections[LxToolsFileds::$page];
?>
    <style type="text/css">
        .lx_tools-settings h1 {
            margin-bottom: 15px;
        }

        .lx_tools-settings h2 {
            display: none;
        }

        .lx_tools-settings h2.lx_tools-settings-title {
            display: block;
            padding: 10px 0;
        }

        .lx_tools-settings .form-table {
            margin-bottom: 60px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #ccc;
        }

        table.form-table th,
        table.form-table td {
            padding-left: 15px;
        }

        table.form-table td label {
            color: green;
        }

        .lx_tools-settings .subsubsub {
            float: none;
        }

        .lx_tools-settings .subsubsub a {
            padding: .2em .5em .2em 0;
        }
    </style>
    <div class="wrap lx_tools-settings">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <?php
        if (!empty($sections) && count($sections) > 0) {

            echo '<div><ul class="subsubsub">';
            foreach ($sections as $k => $s) {
                echo '<li><a href="#' . $k . '">' . $s['title'] . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
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
