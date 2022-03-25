<form action="PRAK203.php" method="POST">
    <div>
        <label for="" style="font-size:larger">Output yang diinginkan:</label>
    </div>
    <div>
        <label for="">Nilai : </label>
        <input type="number" name="nilai">
    </div>
    <div>
        <label for="">Dari : </br></label>
        <input type="radio" name="suhu" value="Celcius"> Celcius </br>
        <input type="radio" name="suhu" value="Fahrenheit"> Fahrenheit </br>
        <input type="radio" name="suhu" value="Rheamur"> Rheamur </br>
        <input type="radio" name="suhu" value="Kelvin"> Kelvin </br>
    </div>
    <div>
        <label for="">Ke : </br></label>
        <input type="radio" name="suhuConverted" value="Celcius"> Celcius </br>
        <input type="radio" name="suhuConverted" value="Fahrenheit"> Fahrenheit </br>
        <input type="radio" name="suhuConverted" value="Rheamur"> Rheamur </br>
        <input type="radio" name="suhuConverted" value="Kelvin"> Kelvin </br>
    </div>
    <button type ="submit">Konversi</button>

</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['nilai'])) {
            $nilai = $_POST['nilai'];
        }
        if(isset($_POST['suhu'])) {
            $suhu = $_POST['suhu'];
        }
        if(isset($_POST['suhuConverted'])) {
            $suhuConverted = $_POST['suhuConverted'];
        
            if($suhu == "Celcius" && $suhuConverted == "Celcius") {
                $temp = $nilai;
                $satuan = "C";
            }
            else if($suhu == "Celcius" && $suhuConverted == "Fahrenheit") {
                $temp = ($nilai * 9/5) + 32;
                $satuan = "F";
            }
            else if($suhu == "Celcius" && $suhuConverted == "Rheamur") {
                $temp = $nilai * 4/5;
                $satuan = "R";
            }
            else if($suhu == "Celcius" && $suhuConverted == "Kelvin") {
                $temp = $nilai + 273.15;
                $satuan = "K";
            }
            else if($suhu == "Fahrenheit" && $suhuConverted == "Celcius") {
                $temp = ($nilai - 32) * 5/9;
                $satuan = "C";
            }
            else if($suhu == "Fahrenheit" && $suhuConverted == "Fahrenheit") {
                $temp = $nilai;
                $satuan = "F";
            }
            else if($suhu == "Fahrenheit" && $suhuConverted == "Rheamur") {
                $temp = ($nilai - 32) * 4/9;
                $satuan = "R";
            }
            else if($suhu == "Fahrenheit" && $suhuConverted == "Kelvin") {
                $temp = ($nilai - 32) * 5/9 + 273.15;
                $satuan = "K";
            }
            else if($suhu == "Rheamur" && $suhuConverted == "Celcius") {
                $temp = $nilai / 4/5;
                $satuan = "C";
            }
            else if($suhu == "Rheamur" && $suhuConverted == "Fahrenheit") {
                 $temp = $nilai * 2.2500 + 32.00;
                 $satuan = "F";
            }
            else if($suhu == "Rheamur" && $suhuConverted == "Rheamur") {
                $temp = $nilai;
                $satuan = "R";
            }
            else if($suhu == "Rheamur" && $suhuConverted == "Kelvin") {
                $temp = ($nilai / 4/5) + 273.15;
                $satuan = "K";
            }
            else if($suhu == "Kelvin" && $suhuConverted == "Celcius") {
                $temp = $nilai - 273.15;
                $satuan = "C";
            }
            else if($suhu == "Kelvin" && $suhuConverted == "Fahrenheit") {
                $temp = ($nilai - 273.15) * 9/5 + 32;
                $satuan = "F";
            }
            else if($suhu == "Kelvin" && $suhuConverted == "Rheamur") {
                $temp = ($nilai - 273.15) * 4/5;
                $satuan = "R";
            }
            else if($suhu == "Kelvin" && $suhuConverted == "Kelvin") {
                $temp = $nilai;
                $satuan = "K";
            }
            echo "<h2>Hasil Konversi : $temp °$satuan<h2>";  
        }
    }
?>