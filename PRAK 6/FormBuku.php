<?php

    require('Koneksi.php');

    session_start();
    if(!isset($_SESSION['nomor_member'])) {
        header('Location: ErrorPage.php');
        exit;
    } else {
        // Show users the page
    }

    $judulBuku = $penulis = $penerbit = $tahunTerbit = '';
    $errors = array('judul_buku'=>'', 'penulis'=>'', 'penerbit'=>'', 'tahun_terbit'=>'');

    if(isset($_POST['submit'])){
        
        // Check judul
        if(empty($_POST['judul_buku'])){
            $errors['judul_buku'] = '*judul is required <br />';
        } else {
            $judulBuku = $_POST['judul_buku'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $judulBuku)){
                $errors['judul_buku'] = '*judul must be letters and spaces only';
            }
        }

        // Check penulis
        if(empty($_POST['penulis'])){
            $errors['penulis'] = '*nama penulis is required <br />';
        } else {
            $penulis = $_POST['penulis'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $penulis)){
                $errors['penulis'] = '*nama penulis must be letters and spaces only';
            }
        }

        // Check penerbit
        if(empty($_POST['penerbit'])){
            $errors['penerbit'] = '*nama penerbit is required <br />';
        } else {
            $penerbit = $_POST['penerbit'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $penerbit)){
                $errors['penerbit'] = '*nama penerbit must be letters and spaces only';
            }
        }

        // Check tahun terbit
        if(empty($_POST['tahun_terbit'])){
            $errors['tahun_terbit'] = '*tahun terbit is required <br />';
        } else {
            $tahunTerbit = $_POST['tahun_terbit'];
            if(!preg_match('/^[0-9]+$/', $tahunTerbit)){
                $errors['tahun_terbit'] = '*tahun terbit must be numbers only';
            }
        }

        if(array_filter($errors)){
            // echo 'Errors occurred in the form';
        } else {
            
            $judulBuku = mysqli_real_escape_string($conn, $_POST['judul_buku']);
            $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
            $penerbit = mysqli_real_escape_string($conn, $_POST['penerbit']);
            $tahunTerbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

            // create sql
            $sql = "INSERT INTO buku(judul_buku,penulis,penerbit,tahun_terbit) VALUES('$judulBuku', '$penulis', '$penerbit', '$tahunTerbit')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: Index.php');
            } else {
                // error
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add Books</h4>
        <form class="white" action="FormBuku.php" method="POST">
            <label>Judul Buku:</label>
            <input type="text" name="judul_buku" value="<?php echo htmlspecialchars($judulBuku) ?>">
            <div class="red-text"><?php echo $errors['judul_buku']; ?></div>
            <label>Penulis:</label>
            <input type="text" name="penulis" value="<?php echo htmlspecialchars($penulis) ?>">
            <div class="red-text"><?php echo $errors['penulis']; ?></div>
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo htmlspecialchars($penerbit) ?>">
            <div class="red-text"><?php echo $errors['penerbit']; ?></div>
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="<?php echo htmlspecialchars($tahunTerbit) ?>">
            <div class="red-text"><?php echo $errors['tahun_terbit']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn library z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>

</html>