<?php

    require('Koneksi.php');

    $namaMember = $nomorMember = $alamat = $tglMendaftar = $tglBayar = '';
    $errors = array('nama_member'=>'', 'nomor_member'=>'', 'alamat'=>'', 'tgl_mendaftar'=>'', 'tgl_terakhir_bayar'=>'');

    if(isset($_POST['submit'])){
        
        // Check nama member
        if(empty($_POST['nama_member'])){
            $errors['nama_member'] = '*nama member is required <br />';
        } else {
            $namaMember = $_POST['nama_member'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $namaMember)){
                $errors['nama_member'] = '*nama member must be letters and spaces only';
            }
        }

        // Check nomor member
        if(empty($_POST['nomor_member'])){
            $errors['nomor_member'] = '*nomor member is required <br />';
        } else {
            $nomorMember = $_POST['nomor_member'];
            if(!preg_match('/^[0-9]+$/', $nomorMember)){
                $errors['nomor_member'] = '*nomor member must be numbers only';
            }
        }

        // Check alamat
        if(empty($_POST['alamat'])){
            $errors['alamat'] = '*alamat is required <br />';
        } else {
            $alamat = $_POST['alamat'];
        }

        // Check tgl mendaftar
        if(empty($_POST['tgl_mendaftar'])){
            $errors['tgl_mendaftar'] = '*tanggal mendaftar is required <br />';
        } else {
            $tglMendaftar = $_POST['tgl_mendaftar'];
        }

        // Check tgl terakhir bayar
        if(empty($_POST['tgl_terakhir_bayar'])){
            $errors['tgl_terakhir_bayar'] = '*tanggal bayar is required <br />';
        } else {
            $tglBayar = $_POST['tgl_terakhir_bayar'];
        }

        if(array_filter($errors)){
            // echo 'Errors occurred in the form';
        } else {
            
            $namaMember = mysqli_real_escape_string($conn, $_POST['nama_member']);
            $nomorMember = mysqli_real_escape_string($conn, $_POST['nomor_member']);
            $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
            $tglMendaftar = mysqli_real_escape_string($conn, $_POST['tgl_mendaftar']);
            $tglBayar = mysqli_real_escape_string($conn, $_POST['tgl_terakhir_bayar']);


            // create sql
            $sql = "INSERT INTO member(nama_member,nomor_member,alamat,tgl_mendaftar,tgl_terakhir_bayar) VALUES('$namaMember', '$nomorMember', '$alamat', '$tglMendaftar', '$tglBayar')";

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
        <h4 class="center">Be a Member</h4>
        <form class="white" action="FormMember.php" method="POST">
            <label>Nama Member:</label>
            <input type="text" name="nama_member" value="<?php echo htmlspecialchars($namaMember) ?>">
            <div class="red-text"><?php echo $errors['nama_member']; ?></div>
            <label>Nomor Member:</label>
            <input type="text" name="nomor_member" value="<?php echo htmlspecialchars($nomorMember) ?>">
            <div class="red-text"><?php echo $errors['nomor_member']; ?></div>
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat) ?>">
            <div class="red-text"><?php echo $errors['alamat']; ?></div>
            <label>Tgl Mendaftar:</label>
            <input type="datetime-local" name="tgl_mendaftar" value="<?php echo htmlspecialchars($tglMendaftar) ?>">
            <div class="red-text"><?php echo $errors['tgl_mendaftar']; ?></div>
            <label>Tgl Terakhir Bayar:</label>
            <input type="date" name="tgl_terakhir_bayar" value="<?php echo htmlspecialchars($tglBayar) ?>">
            <div class="red-text"><?php echo $errors['tgl_terakhir_bayar']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn library z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>

</html>