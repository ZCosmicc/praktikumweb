<?php
    $jumlah = 0;
    if (isset($_POST['jumlah'])) {
        $jumlah = $_POST['jumlah'];
    }
    if (isset($_POST['tambah'])) {
        $jumlah++;
    }
    else if (isset($_POST['kurang'])) {
        $jumlah--;
    }
?>

<?php
    if ($jumlah == 0) :
?>

    <form action="PRAK304.php" method="POST">
        <div>
            <label for="">Jumlah bintang </label>
            <input type="text" name="jumlah">
        </div>
        <button type ="submit" value ="submit" name ="submit">Submit</button>
    </form>

<?php
endif;
    if(isset($_POST['jumlah']))
        echo "Jumlah Bintang : $jumlah<br><br><br><br>";

    for($i = 0; $i < $jumlah; $i++) {
        echo "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' width= '55' height= '55'>";
    }

    if($jumlah != 0) :
?>

        <form action="PRAK304.php" method="POST">
            <input type='hidden' name='jumlah' value='<?= $jumlah; ?>' />
            <input type="submit" value="Tambah" name="tambah">
            <input type="submit" value="Kurang" name="kurang">
        </form>
        
<?php
endif;

?>