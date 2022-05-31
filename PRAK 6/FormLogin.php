<?php 
    
    require('Koneksi.php');

    $nomorMember = $password = '';
    $errors = array('nomor_member'=>'', 'password'=>'');

    if(isset($_POST['submit'])){

        // Check nomor member
        if(empty($_POST['nomor_member'])){
            $errors['nomor_member'] = '*nomor member is required <br />';
        } else {
            $nomorMember = $_POST['nomor_member'];
            if(!preg_match('/^[0-9]+$/', $nomorMember)){
                $errors['nomor_member'] = '*nomor member must be numbers only';
            }
        }

        // Check password
        if(empty($_POST['password'])){
            $errors['password'] = '*password is required <br />';
        } else {
            $password = $_POST['password'];
            if(!preg_match('/^[a-zA-Z0-9]+$/', $password)){
                $errors['password'] = '*password must be letters and numbers only';
            }
        }
        
        session_start();

        //session start

        $_SESSION['nomor_member'] = $_POST['nomor_member'];

        header('Location: Index.php'); 

        // if(isset($_POST['nomor_member'] , $_POST['password'])) {
        //     include('Login.php');
        // }

    }


?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Nomor Member:</label>
            <input type="text" name="nomor_member" value="<?php echo htmlspecialchars($nomorMember) ?>">
            <div class="red-text"><?php echo $errors['nomor_member']; ?></div>
            <label>Password:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="red-text"><?php echo $errors['password']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn library z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>

</html>