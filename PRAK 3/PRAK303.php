<form action="PRAK303.php" method="POST">
    <div>
        <label for="">Batas Bawah : </label>
        <input type="text" name="bawah">
    </div>
    <div>
        <label for="">Batas Atas : </label>
        <input type="text" name="atas">
    </div>
    <button type ="submit" value ="submit" name ="submit">Cetak</button>
</form>

<?php
    if(isset($_POST['submit']))
    {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];

        $bintang = $bawah;
        do {
            if (($bintang + 7) % 5 == 0) {
                echo "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' width= '20' height= '20'>";
            } else {
                echo "$bintang";
            }
            echo " ";
            $bintang++;
        } while ($bintang <= $atas);
    }
?>