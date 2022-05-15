<?php  

    // connect to database
    $conn = mysqli_connect('localhost', 'ZCosmic', 'zcolibrary123', 'online_library');

    // check connection
    if(!$conn){
        echo 'Connection Error: ' . mysqli_connect_error();
    }

?>