<form action="PRAK204.php" method="POST">
    <div>
        <label for="" style="font-size:larger">Output yang diinginkan:</label>
        <br><br>
    </div>
    <div>
        <label for="">Nilai : </label>
        <input type="number" name="nilai">
    </div>
    <button type ="submit">Konversi</button>
</form>

<?php
    $nilai = NULL;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['nilai']))
        {
            $nilai = $_POST['nilai'];

            if ($nilai < 10 && $nilai > 0) {
                echo "<h2>Hasil: Satuan<h2>";
            }
            else if ($nilai == 0) {
                echo "<h2>Hasil: Nol<h2>";
            }
            else if ($nilai == 10 || $nilai >= 20 && $nilai <= 99) {
                echo "<h2>Hasil: Puluhan<h2>";
            }
            else if ($nilai >= 1000) {
                echo "<h2>Anda Menginput Melebihi Limit Bilangan<h2>";
            }
            else if ($nilai >= 100) {
                echo "<h2>Hasil: Ratusan<h2>";
            }
            else if ($nilai > 10 && $nilai < 20) {
                echo "<h2>Hasil: Belasan<h2>";
            }
            else {
                echo "<h2>Jan ngadi2 Anda<h2>";
            }
        }
    }
?>