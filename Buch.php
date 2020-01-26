<?php

class Buch
{
    private $buch_id;
    private  $buch_isbn;
    private  $buch_titel;
    private  $buch_author;
    private  $buch_genre;
    private  $buch_preis;
    private  $buch_verlag;
    private  $buch_zweigstelle;

    /**
     * Buch constructor.
     * @param $buch_id
     * @param $buch_isbn
     * @param $buch_titel
     * @param $buch_author
     * @param $buch_genre
     * @param $buch_preis
     * @param $buch_verlag
     * @param $buch_zweigstelle
     */
    public function __construct($buch_id, $buch_isbn, $buch_titel, $buch_author, $buch_genre, $buch_preis, $buch_verlag, $buch_zweigstelle)
    {
        $this->buch_id = $buch_id;
        $this->buch_isbn = $buch_isbn;
        $this->buch_titel = $buch_titel;
        $this->buch_author = $buch_author;
        $this->buch_genre = $buch_genre;
        $this->buch_preis = $buch_preis;
        $this->buch_verlag = $buch_verlag;
        $this->buch_zweigstelle = $buch_zweigstelle;
    }

    public function print_book_table() {
        ECHO '<table class="book_table"><thead><tr><th>ID</th><th>IISBN</th><th>Titel</th><th>Author</th><th>Genre</th><th>Preis</th><th>Verlag</th><th>Zweigst</th></tr></thead><tbody><tr>';
        Echo '<td>' . $this->buch_id . '</td>';
        Echo '<td>' . $this->buch_isbn . '</td>';
        Echo '<td>' .$this->buch_titel. '</td>';
        Echo '<td>' . $this->buch_author . '</td>';
        Echo '<td>' . $this->buch_genre . '</td>';
        Echo '<td>' . $this->buch_preis . '</td>';
        Echo '<td>' . $this->buch_verlag. '</td>';
        Echo '<td>' . $this->buch_zweigstelle . '</td>';
        ECHO '</tr></tbody></table>';
    }
}