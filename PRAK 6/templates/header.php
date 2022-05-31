<?php

    if(!isset($_SESSION)) { 
        session_start(); 
    }

    if($_SERVER['QUERY_STRING'] == 'noname') {
        unset($_SESSION['nomor_member']);
    }

    $nomorMember = $_SESSION['nomor_member'] ?? 'Guest';

?>

<head>
    <title>Online Library</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style  type="text/css">
        .library{
            background: rgba(181,137,105,1) !important;
        }
        .library-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 540px;
            margin: 20px auto;
            padding: 20px;
        }
        .book{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
        .member{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
</head>
    <body class="grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <a href="index.php" class="library-logo library-text">Online Library</a>
                <ul id="nav-mobile" class="right hide-on-small-down">
                    <li class="grey-text">Hello <?php echo htmlspecialchars($nomorMember); ?> </li>
                    <li><a  href="FormMember.php" class="btn library z-depth-0">Register</a></li>
                    <li><a  href="FormPeminjaman.php" class="btn library z-depth-0">Borrow</a></li>
                    <li><a  href="FormBuku.php" class="btn library z-depth-0">Add Book</a></li>
                </ul>
            </div>
        </nav>