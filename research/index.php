<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/lib/publications.php');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/lib/essay.php');
?>
<html>
  <head>
    <meta charset="utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Alexander D Brown</title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/default.css" rel="stylesheet" type="text/css" />
    <link href="/desktop.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header id="header">
      <h1>Alexander D Brown</h1>
    </header>
    <nav id="navigation">
      <ul id="navbar">
        <li><a href="/">Home</a></li>
        <li class="selected"><a href="/research/">Research</a></li>
        <li><a href="/talks/">Talks</a></li>
        <li><a href="http://blog.alexanderdbrown.com">Blog</a></li>
      </ul>
    </nav>
    <section id="about">
      <h2>About</h2>
      <p>
        My current and previous research, including
        <a href="#publications">publications</a> and 
        <a href="#essays">essays</a>.
      </p>
    </section>
    <section id="content">
      <article id="publications" name="publications">
        <header>
          <h2>Publications</h2>
        </header>
        <ul class="no-list">
        <?php
$publications = alexanderdbrown\academia\Publication::get('/data/publications');
if(empty($publications)) {
  echo '<li class="empty">No Publications</li>';
}
foreach($publications as $pub) {
  $html = '<li class="title"><a href="%s">%s</a></li>
           <li class="author">%s</li>
           <li class="conference">%s</li>
           <li class="date">%s</li>';
  $date = date('F, Y', $pub->p_date);
  echo sprintf($html, $pub->p_url, $pub->p_name, $pub->p_authors, $pub->p_journal, $date);
}
         ?>
        </ul>
      </article>
      <article id="essays" name="essays"></a>
        <h2>Essays</h2>
        <ul class="no-list">
        <?php 
$essays = alexanderdbrown\academia\Essay::get('/data/essays'); 
if(empty($essays)) {
  echo '<li class="empty">No Essays</li>';
}
foreach($essays as $essay) {
  $html = '<li class="title"><a href="%s">%s</a></li>
           <li class="author">%s</li>
           <li class="conference">%s</li>
           <li class="date">%s</li>';
  $date = date('F, Y', $essay->date);
  echo sprintf($html, $essay->url, $essay->name, $essay->author, $essay->audience, $date);
}
         ?>
        </ul>
      </article>
    </section>
    <footer id="footer">
    </footer>
  </body>
</html>
