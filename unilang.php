<?php

function ll_get_structure_from_markdown($file) {
    $heading_count = [];
    for ($i = 1; $i <= 6; $i++) {
        $heading_count[$i] = 0;
    }
    $p_count = 0;
    $structure = [];
    $handle = fopen($file, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if (str_starts_with($line, "#")) {
                $level = strpos($line, " ");
                $key = "h".$level."-".(++$heading_count[$level]);
                $structure[$key] = trim(substr($line, $level));
            }
            else {
                $key = "p-".(++$p_count);
                $structure[$key] = trim($line);
            }
        }
        fclose($handle);
    }
    return $structure;
}
function assoc_from_structure_and_text($structure_path, $text_path) {
    $real_structure = ll_get_structure_from_markdown($text_path);
    $template = ll_get_structure_from_markdown($structure_path);
    $out = [];

    foreach ($real_structure as $key => $value) {
        $out[$template[$key]] = $real_structure[$key];
    }
    return $out;
}
