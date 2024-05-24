<?php

$loc = "Search";

// Check if the 'location' parameter is set in the URL
if (isset($_POST['Search'])) {

    // Check if the location from the index page matches $loc
    if ($loc == 'Ahmedabad') {
        header("Location: Ahmedabad.html");
    }
    elseif ($loc == 'Surat') 
    {
        header("Location: Surat.html");
    }
    elseif($loc == 'Vadodara')
    {
        header("Location: Vadodara.html");
    }
}

?>