<?php

// 添加 settings 分段
function lx_setting_section($section_key, $section_name, $callback = 'empty_cb')
{
    add_settings_section(
        $section_key,
        $section_name,
        $callback,
        LxToolsFileds::$page
    );
}

// 添加 settings 字段
function lx_setting_field($filed, $name, $callback, $section_name)
{
    add_settings_field(
        $filed,
        $name,
        $callback,
        LxToolsFileds::$page,
        $section_name,
        array(
            'label_for' => $filed,
            'class' => 'lx_tools_row'
        )
    );
}

// 空白 callback
function empty_cb($args)
{
}

// checkbox
function lx_field_cb_checkbox($args, $key="", $matchValue = 1, $defaultValue = 0)
{
    $key = empty($key)?$args['label_for']:$key;
?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>" name="<?php echo LxToolsFileds::$options . '[' . esc_attr($args['label_for']) . ']'; ?>" <?php checked(lx_tools_option($key, $defaultValue)); ?> value="<?php echo $matchValue; ?>">
<?php
}
?>