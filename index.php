<?php
    include "view/head.php";


    echo '<h2>Willkommen</h2>';

    if ( !isset( $_SESSION['user_id'] ) ) {
        echo '<p>Bitte loggen Sie sich ein, um das System zu verwenden;</p>
        ';
    }
    else {
            echo'<p class="italic">Ein Buch ist ein Spiegel, wenn ein Affe hineinsieht, so kann kein Genie herausgucken.</p>';
    }
    include 'view/footer.php';
