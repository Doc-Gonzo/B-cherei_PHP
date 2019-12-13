<?php
if ( isset( $_SESSION['user_id'] ) ) {
    echo '
     <div class="stock_list">
     <h3>Vorhandene Titel:</h3>
     <div class="stock_list_box">
     ';
    stock_list();

    echo '
    </div>
    </div>
    ';
}
