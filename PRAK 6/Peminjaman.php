<?php 

    require('Koneksi.php');

    session_start();
    if(!isset($_SESSION['nomor_member'])) {
        header('Location: ErrorPage.php');
        exit;
    } else {
        // Show users the page
    }

    if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM peminjaman WHERE id_peminjaman = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: Index.php');
        } else{
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    //check GET request id parameter
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
    
        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $peminjaman = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($book);

    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center brown-text">
        <?php if($peminjaman): ?>

            <p>Tanggal Pinjam :</p>
            <h4><?php echo htmlspecialchars($peminjaman['tgl_pinjam']); ?></h4>
            <p>Tanggal Kembali :</p>
            <h5> <?php echo htmlspecialchars($peminjaman['tgl_kembali']); ?></h5>
        
            <!-- DELETE FORM -->
            <form action="Peminjaman.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $peminjaman['id_peminjaman'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn library z-depth-0" onclick="return confirm('Are you sure that you want to permanently delete the selected item?')">
            </form>

        <?php else: ?>

            <h5>No such peminjaman exists!</h5>

        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>