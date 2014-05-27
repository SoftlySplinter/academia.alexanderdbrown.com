<?php namespace alexanderdbrown\academia;

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/loadable.php');

class Essay extends Loadable {

  public $name;
  public $url;
  public $author;
  public $audience;
  public $date;

  private function __construct($url, $name, $author, $audience, $date) {
    $this->name = $name;
    $this->url = $url;
    $this->author = $author;
    $this->audience = $audience;
    $this->date = strtotime($date);
  }

  public static function cmp($a, $b) {
    return $b->date - $a->date;
  }

  protected static function create($line) {
    $temp = explode("\t", rtrim($line));
    return new Essay($temp[0], $temp[1], $temp[2], $temp[3], $temp[4]);
  }

  protected static function get_class() {
    return __CLASS__;
  }

}
