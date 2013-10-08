<?php
  class Talk {
    public $t_file;
    public $t_name;
    public $t_event;
    public $t_date;

    function __construct($talk) {
      $temp = explode("\t", $talk);
      $this->t_file = $temp[0];
      $this->t_name = $temp[1];
      $this->t_event = $temp[2];
      $this->t_data = $temp[3];
    }

    function print_talk() {
      return sptrintf('<a href="/talk/%s">%s</a>', 
                      $this->t_file, 
		      $this->t_name);
    }
  }

  $talk_file = '/talks/talks';

  function get_talks() {
    $talks = array();
    $f = fopen($talk_file, 'r') or die('Could not open file: ' + $talk_file);
    while(!feof($talk_file)) {
      $line = fgets($file);
      $talks->append(new Talk($line));
    }
    return $talks;
  }
?>
