<form action="PRAK401.php" method="POST">
    <div>
        <label for="">Panjang : </label>
        <input type="number" name="panjang">
    </div>
    <div>
        <label for="">Lebar : </label>
        <input type="number" name="lebar">
    </div>
    <div>
        <label for="">Nilai : </label>
        <input type="text" name="nilai">
    </div>
    <button type ="submit" value ="submit" name ="submit">Cetak</button>
</form>

<style>
    table, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 4px;
    }
</style>

<?php
    $panjang = NULL;
    $lebar = NULL;
    $nilai = NULL;
    if(isset($_POST['submit']))
    {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $nilai = $_POST['nilai'];
        $array = explode(" ", $nilai);
        if((int)$panjang * (int)$lebar == count($array)) {
            $order = 0;
            for($i = 0; $i < $panjang; $i++) {
                for($u = 0; $u < $lebar; $u++) {
                    $print[$i][$u] = $array[$order];
                    $order++;
                }
            }
            echo "<table>";
            for($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for($u = 0; $u < $lebar; $u++) {
                    echo "<td>".$print[$i][$u]."</td>";
                }
            }
        }
        else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }   
    }    
?>