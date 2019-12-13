<?php
if ( isset( $_SESSION['user_id'] ) ) {
    echo '
     <div class="rent_list">
     <h3>Verliehene Titel:</h3>
     <div class="rent_list_box">
     ';
    rent_list();


    echo '
    </div>
    </div>
    ';
}
