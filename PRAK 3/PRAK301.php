<form action="PRAK301.php" method="POST">
    <style type="">
        #merah{color :red; font-size: large;}
        #hijau{color :green; font-size: large;}
    </style>
    <div>
        <label for="">Jumlah Peserta : </label>
        <input type="number" name="jumlah">
    </div>
    <button type ="submit" value ="submit" name ="submit">Cetak</button>
</form>

<?php
    $jumlah = NULL;
    $looper = 1;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['jumlah']))
        {
            $jumlah = $_POST['jumlah'];

            while ($looper <= $jumlah) {
                echo "<br>";
                if($looper % 2 == 1) {
                    echo "<label id= 'merah'>Peserta ke-$looper";
                } else {
                    echo "<label id= 'hijau'>Peserta ke-$looper";
                }
                echo "<br>";
                $looper++;
            }
        }
    }
?>