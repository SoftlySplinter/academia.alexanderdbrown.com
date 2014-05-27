<?php namespace alexanderdbrown\academia;

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/loadable.php');

class Publication extends Loadable {
  public $p_url;
  public $p_name;
  public $p_authors;
  public $p_journal;
  public $t_date;

  private function __construct($url, $name, $authors, $journal, $date) {
    $this->p_url = $url;
    $this->p_name = $name;
    $this->p_authors = $authors;
    $this->p_journal = $journal;
    $this->p_date = strtotime($date);
  }

  public static function cmp($a, $b) {
    return $b->t_date - $a->t_date;
  }

  protected static function create($line) {
    $temp = explode("\t", rtrim($line));
    return new Publication($temp[0], $temp[1], $temp[2], $temp[3], $temp[4]);
  }

  protected static function get_class() {
    return __CLASS__;
  }
}
