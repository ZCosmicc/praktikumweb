<?php 
    $nama= NULL;
    $nim = NULL;
    $gender = NULL;
    $namaError = $nimError = $genderError = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['nama'])) {
           $namaError = "nama tidak boleh kosong";
        } else {
            $nama = $_POST['nama'];
        }
        if(empty($_POST['nim'])) {
        $nimError = "nim tidak boleh kosong";
        } else {
            $nim = $_POST['nim'];
        }
        if(empty($_POST['gender'])) {
            $genderError = "jenis kelamin tidak boleh kosong";
        } else {
            $gender = $_POST['gender'];
        }
    }
?>

<form action="PRAK202.php" method="POST"
    <div>
        <label for="">Nama: </label>
        <input type="text" name="nama">
        <span class="error" style="color:red">* <?php echo $namaError;?></span>
    </div>
    <div>
        <label for="">Nim: </label>
        <input type="number" name="nim">
        <span class="error" style="color:red">* <?php echo $nimError;?></span>
    </div>
    <div>
        <label for="">Jenis Kelamin : <span class="error" style="color:red">* <?php echo $genderError;?></span></br></label>
        <input type="radio" name="gender" value="Laki-Laki"> Laki-Laki </br>
        <input type="radio" name="gender" value="Perempuan"> Perempuan </br>
    </div>
    <button type ="submit">Submit</button>
    <br><br>
<?php
    if ($nama && $nim && $gender != NULL) {
        echo "$nama</br>";
        echo "$nim</br>";
        echo "$gender";
    }
?>
</form>