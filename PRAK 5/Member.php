<?php 

    require('Koneksi.php');

    if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM member WHERE id_member = $id_to_delete";

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
        $sql = "SELECT * FROM member WHERE id_member = $id";
    
        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $member = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($member);

    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center brown-text">
        <?php if($member): ?>

            <h4><?php echo htmlspecialchars($member['nama_member']); ?></h4>
            <p>Nomor Member :</p>
            <h5> <?php echo htmlspecialchars($member['nomor_member']); ?></h5>
            <p>Alamat :</p>
            <h5> <?php echo htmlspecialchars($member['alamat']); ?></h5>
            <p><?php echo htmlspecialchars($member['tgl_mendaftar']); ?></p>
        
            <!-- DELETE FORM -->
            <form action="Member.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $member['id_member'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn library z-depth-0">
            </form>

        <?php else: ?>

            <h5>No such member exists!</h5>

        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>