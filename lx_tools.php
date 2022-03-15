<?php

/**
 * Plugin Name:       Lx Tools
 * Plugin URI:        https://github.com/crayonxiaoxin
 * Description:       Handle the basics with this plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            crayonxiaoxin
 * Author URI:        https://hixin.cc/about
 * Text Domain:       lx_tools
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/crayonxiaoxin
 */

// 加载 - 核心文件 
include_once(__DIR__ . "/includes/utils.php");
include_once(__DIR__ . "/includes/options.php");
include_once(__DIR__ . "/includes/settings.php");
include_once(__DIR__ . "/includes/core.php");

// 加载 - 插件翻译
function myplugin_init()
{
    load_plugin_textdomain('lx_tools', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'myplugin_init');
