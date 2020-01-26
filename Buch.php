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

    /**
     * @return mixed
     */
    public function getBuchId()
    {
        return $this->buch_id;
    }

    /**
     * @param mixed $buch_id
     */
    public function setBuchId($buch_id)
    {
        $this->buch_id = $buch_id;
    }

    /**
     * @return mixed
     */
    public function getBuchIsbn()
    {
        return $this->buch_isbn;
    }

    /**
     * @param mixed $buch_isbn
     */
    public function setBuchIsbn($buch_isbn)
    {
        $this->buch_isbn = $buch_isbn;
    }

    /**
     * @return mixed
     */
    public function getBuchTitel()
    {
        return $this->buch_titel;
    }

    /**
     * @param mixed $buch_titel
     */
    public function setBuchTitel($buch_titel)
    {
        $this->buch_titel = $buch_titel;
    }

    /**
     * @return mixed
     */
    public function getBuchAuthor()
    {
        return $this->buch_author;
    }

    /**
     * @param mixed $buch_author
     */
    public function setBuchAuthor($buch_author)
    {
        $this->buch_author = $buch_author;
    }

    /**
     * @return mixed
     */
    public function getBuchGenre()
    {
        return $this->buch_genre;
    }

    /**
     * @param mixed $buch_genre
     */
    public function setBuchGenre($buch_genre)
    {
        $this->buch_genre = $buch_genre;
    }

    /**
     * @return mixed
     */
    public function getBuchPreis()
    {
        return $this->buch_preis;
    }

    /**
     * @param mixed $buch_preis
     */
    public function setBuchPreis($buch_preis)
    {
        $this->buch_preis = $buch_preis;
    }

    /**
     * @return mixed
     */
    public function getBuchVerlag()
    {
        return $this->buch_verlag;
    }

    /**
     * @param mixed $buch_verlag
     */
    public function setBuchVerlag($buch_verlag)
    {
        $this->buch_verlag = $buch_verlag;
    }

    /**
     * @return mixed
     */
    public function getBuchZweigstelle()
    {
        return $this->buch_zweigstelle;
    }

    /**
     * @param mixed $buch_zweigstelle
     */
    public function setBuchZweigstelle($buch_zweigstelle)
    {
        $this->buch_zweigstelle = $buch_zweigstelle;
    }
}