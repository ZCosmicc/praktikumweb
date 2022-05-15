<?php

    require('Koneksi.php');

    $tglPinjam = $tglKembali = '';
    $errors = array('tgl_pinjam'=>'', 'tgl_kembali'=>'');
    
    if(isset($_POST['submit'])){

        // Check tgl mendaftar
        if(empty($_POST['tgl_pinjam'])){
            $errors['tgl_pinjam'] = '*tanggal pinjam is required <br />';
        } else {
            $tglPinjam = $_POST['tgl_pinjam'];
        }

        // Check tgl terakhir bayar
        if(empty($_POST['tgl_kembali'])){
            $errors['tgl_kembali'] = '*tanggal kembali is required <br />';
        } else {
            $tglKembali = $_POST['tgl_kembali'];
        }

        if(array_filter($errors)){
            // echo 'Errors occurred in the form';
        } else {
            
            $tglPinjam = mysqli_real_escape_string($conn, $_POST['tgl_pinjam']);
            $tglKembali = mysqli_real_escape_string($conn, $_POST['tgl_kembali']);
        }

        // create sql
        $sql = "INSERT INTO peminjaman(tgl_pinjam,tgl_kembali) VALUES('$tglPinjam', '$tglKembali')";

        // save to db and check
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: Index.php');
        } else {
            // error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Peminjaman</h4>
        <form class="white" action="FormPeminjaman.php" method="POST">
            <label>Tanggal Pinjam:</label>
            <input type="date" name="tgl_pinjam" value="<?php echo htmlspecialchars($tglPinjam) ?>">
            <div class="red-text"><?php echo $errors['tgl_pinjam']; ?></div>
            <label>Tanggal Kembali:</label>
            <input type="date" name="tgl_kembali" value="<?php echo htmlspecialchars($tglKembali) ?>">
            <div class="red-text"><?php echo $errors['tgl_kembali']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn library z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>