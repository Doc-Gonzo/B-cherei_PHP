<?php
include("template.class.php");

// Das Template laden
$tpl = new Template();
$tpl->load("index.tpl");

// Die Sprachdatei laden
$langs[] = "lang_de.php";
$lang = $tpl->loadLanguage($langs);

// Platzhalter ersetzen
$tpl->assign( "website_title", "Mein Projekt" );
$tpl->assign( "time",          date("H:i") );

// Zugriff auf eine Sprachvariable
$tpl->assign( "test",          $lang['test'] );
ECHO 'test';
include "view/head.php";
// Und die Seite anzeigen
$tpl->display();
include "model/rent_list.php";
include "model/stock_list.php";
include "view/footer.php"
?>