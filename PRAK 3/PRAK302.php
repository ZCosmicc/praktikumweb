<form action="PRAK302.php" method="POST">
    <div>
        <label for="">Tinggi : </label>
        <input type="number" name="tinggi">
    </div>
    <div>
        <label for="">Alamat Gambar : </label>
        <input type="textbox" name="alamat">
    </div>
    <button type ="submit" value ="submit" name ="submit">Cetak</button>
</form>

<?php
    $alamat = NULL;
    $tinggi = NULL;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['tinggi']))
        {
            $alamat = $_POST['alamat'];
            $tinggi = $_POST['tinggi'];

            for ($looper = 0; $looper < $tinggi; $looper++) {
                $i = 0;
                $space="";
                while($i <= $looper) {
                    $space .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    $i++;
                }
                echo $space;
                $z = $tinggi;
                $image="";
                while($z > $looper) {
                    $image .="<img src= '$alamat' width= '20' height '20' />";
                    $z--;
                }
                echo $image."<br/>";
            }
        }
    }
?>