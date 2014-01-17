<?php
  class Talk {
    public $t_file;
    public $t_name;
    public $t_event;
    public $t_date;

    function __construct($talk) {
      $temp = explode("\t", rtrim($talk));
      $this->t_file = $temp[0];
      $this->t_name = $temp[1];
      $this->t_event = $temp[2];
      $this->t_date = $temp[3];
    }

    function cmp($a, $b) {
      return strtotime($b->t_date ) - strtotime($a->t_date);
    }
  }

  $talk_file = '/talks/talks';

  function get_talks() {
    $talks = array();
    $f = fopen('talks', 'r') or die('Could not open file: ' + $talk_file);
    while(!feof($f)) {
      $line = fgets($f);
      if(!empty($line)) {
        array_push($talks, new Talk($line));
      }
    }
    usort($talks, array('Talk', 'cmp'));
    return $talks;
  }
?>
