<?php
include "view/head.php";


if( !isset($_GET['buch_id'])){
    ECHO 'Es wurde keine Buch-ID Übergeben';
    ECHO '
    <form class="buch_detail_form" action="" method="get">
        <input type="text" name="buch_id" placeholder="Buch-ID">                      
        <input type="submit" value="Bestätigen">        
    </form>
    ';
}
ELSE {
    ECHO'<h2>ORM-Version der Detailansicht</h2>';
    ECHO '<div class="buch_detail_wrapper" <div class="detail_result">';
    buch_makeObject($_GET['buch_id']);

    ECHO '
        </div>
        <div class="buch_Detail_form_container">
            <h3>Erneut suchen: </h3>
            <form class="buch_detail_form" action="" method="get">
                <input type="text" name="buch_id" placeholder="Buch-ID">                      
                <input type="submit" value="Bestätigen">        
            </form>
            <h3>Buch verleihen </h3>
            ';
    rent_buch_form_maker($_GET['buch_id']);
    ECHO '
        </div> 
        <div class="clear"></div>   
        </div>    
    ';
};
include 'view/footer.php';