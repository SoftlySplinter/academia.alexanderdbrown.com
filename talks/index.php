<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] . '/lib/talks.php');
?>


<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Alexander D Brown - Talks</title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/default.css" rel="stylesheet" type="text/css">
    <link href="/desktop.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header id="header">
      <h1>Alexander D Brown</h1>
    </header>
    <nav id="navigation">
      <ul id="navbar">
        <li><a href="/">Home</a></li>
        <li><a href="/research/">Research</a></li>
        <li class="selected"><a href="/talks/">Talks</a></li>
        <li><a href="http://blog.alexanderdbrown.com">Blog</a></li>
      </ul>
    </nav>
    <section id="about">
      <h2>About</h2>
      <p>
        These are links to some of my previous or upcoming talks, ordered by 
        date.
      </p>
    </section>
    <section id="content">
      <article id="talks">
        <h2>Talks and Presentations</h2>
        <ul class="no-list">
          <?php 
$talks = alexanderdbrown\academia\Talk::get('/data/talks');
if(empty($talks)) {
  echo '<li class="empty">No Talks</li>';
} else {
  foreach($talks as $talk) {
    $html = '<li class="title"><a href="%s">%s</a>
             <li class="conference">%s</li>
             <li class="date">%s</li>';
    $date = date('l j<\s\up>S</\s\up> F, Y', $talk->t_date);
    echo sprintf($html, $talk->t_file, $talk->t_name, $talk->t_event, $date);
  }
}
           ?>
        </ul>
      </article>
    </section>
    <footer id="footer">
    </footer>
  </body>
</html>
