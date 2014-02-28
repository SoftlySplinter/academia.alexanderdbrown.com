<?php namespace alexanderdbrown\academia;

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/loadable.php');

class Talk extends Loadable {
  public $t_file;
  public $t_name;
  public $t_event;
  public $t_date;

  private function __construct($file, $name, $event, $date) {
    $this->t_file = $file;
    $this->t_name = $name;
    $this->t_event = $event;
    $this->t_date = strtotime($date);
  }

  public static function cmp($a, $b) {
    return $b->t_date - $a->t_date;
  }

  protected static function create($line) {
    $temp = explode("\t", rtrim($line));
    return new Talk($temp[0], $temp[1], $temp[2], $temp[3]);
  }

  protected static function get_class() {
    return __CLASS__;
  }
}
?>
