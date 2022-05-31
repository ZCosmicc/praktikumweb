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

        $sql = "DELETE FROM buku WHERE id_buku = $id_to_delete";

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
        $sql = "SELECT * FROM buku WHERE id_buku = $id";
    
        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $book = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($book);

    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center brown-text">
        <?php if($book): ?>

            <h4><?php echo htmlspecialchars($book['judul_buku']); ?></h4>
            <p>Written by :</p>
            <h5> <?php echo htmlspecialchars($book['penulis']); ?></h5>
            <p>Published by :</p>
            <h5> <?php echo htmlspecialchars($book['penerbit']); ?></h5>
            <p><?php echo htmlspecialchars($book['tahun_terbit']); ?></p>
        
            <!-- DELETE FORM -->
            <form action="Buku.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $book['id_buku'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn library z-depth-0" onclick="return confirm('Are you sure that you want to permanently delete the selected item?')">
            </form>

        <?php else: ?>

            <h5>No such book exists!</h5>

        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>