<?php namespace alexanderdbrown\academia;

abstract class Loadable {
  protected abstract static function create($line);
  protected abstract static function get_class();
  public static function get($file) {
    $loadable = array();
    $f = fopen($_SERVER['DOCUMENT_ROOT'] . $file, 'r') or die('Could not open file: ' + $file);
    while(!feof($f)) {
      $line = fgets($f);
      if(!empty($line)) {
        array_push($loadable, static::create($line));
      }
    }
    usort($loadable, array(static::get_class(), 'cmp'));
    return $loadable;
  }
}
