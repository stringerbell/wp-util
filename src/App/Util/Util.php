<?php

namespace App\Util;

// fake function to make copy pasta work
function get_template_directory() {
  return '';
}

class Util {
  public function getSvg($filename) {
    $clean_filename = preg_replace('/(^\/*views\/partials\/svg\/)|(^\/*partials\/svg\/)|(^\/*svg\/)|(^\/)/', '', $filename);
    $clean_filename = preg_replace('/\.svg$/', '', $clean_filename);
    $full_path_with_filename = get_template_directory() . '/views/partials/svg/' . $clean_filename . '.svg';
//    echo file_get_contents($full_path_with_filename);
    return $full_path_with_filename;
  }

  public function getSvg2($filename) {
    $svgPath = '/views/partials/svg';
    $extension = 'svg';
    $pathInfo = basename(pathinfo($filename, PATHINFO_BASENAME), ".$extension");
    return "$svgPath/$pathInfo.$extension";
  }
}
