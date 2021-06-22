<?php
function load_script($file_label, $file_name) {
    global $js_path;
    wp_enqueue_script($file_label, "$js_path/$file_name", false, [], true);
}
function load_style($file_label, $file_name) {
    global $css_path;
    wp_enqueue_style($file_label, "$css_path/$file_name");
}
function super_simple_load($file_label_prefix, $file_name) {
    load_style(($file_label_prefix.'_style'), "$file_name.style.css");
    load_script(($file_label_prefix.'_script'), "$file_name.script.js");
}
