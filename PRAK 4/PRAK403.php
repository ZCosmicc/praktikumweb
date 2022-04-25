<style>
    table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 4px;
    }
</style>

<?php 
    $students = array(

    array("No" => "1", "Nama" => "Ridho", "Matkul" => array(
        array("mk" => "Pemrograman I", "SKS" => "2"),
        array("mk" => "Praktikum Pemrograman I", "SKS" => "1"),
        array("mk" => "Pengantar Lingkungan Lahan Basah", "SKS" => "2"),
        array("mk" => "Arsitektur Komputer", "SKS" => "3"),),
    ),
    array("No" => "2", "Nama" => "Ratna", "Matkul" => array(
        array("mk" => "Basis Data I", "SKS" => "2"),
        array("mk" => "Praktikum Basis Data I", "SKS" => "2"),
        array("mk" => "Kalkulus", "SKS" => "3"),),
    ),
    array("No" => "3", "Nama" => "Tono", "Matkul" => array(
        array("mk" => "Rekayasa Perangkat Lunak", "SKS" => "1"),
        array("mk" => "Analisis dan Perancangan Sistem", "SKS" => "1"),
        array("mk" => "Komputasi Awan", "SKS" => "1"),
        array("mk" => "Kecerdasan Bisnis", "SKS" => "2"),),
    ),
    );

    for($i = 0; $i < count($students); $i++) {
        $Total = 0;
        for($u = 0; $u < count($students[$i]["Matkul"]); $u++) {
            $Total += $students[$i]["Matkul"][$u]["SKS"];
        }

        $students[$i]["Total"] = $Total;
        if($students[$i]["Total"] < 7) {
            $students[$i]["Keterangan"] = "Revisi KRS";
        }
        else {
            $students[$i]["Keterangan"] = "Tidak Revisi";
        }
    }

    echo "<table style = 'width: 600px'>";
    echo "<tr style='background-color:lightgrey; text-align:left;'>";
    echo "<th>No";
    echo "<th>Nama";
    echo "<th>Mata Kuliah Diambil";
    echo "<th>SKS";
    echo "<th>Total SKS";
    echo "<th>Keterangan";

    for($i = 0; $i < count($students); $i++) {
        for($u = 0; $u <count($students[$i]["Matkul"]); $u++) {
            echo "<tr>";
            if($u == 0) {
                echo "<td>".$students[$i]["No"];
                echo "<td>".$students[$i]["Nama"];
                echo "<td>".$students[$i]["Matkul"][$u]["mk"];
                echo "<td>".$students[$i]["Matkul"][$u]["SKS"];
                echo "<td>".$students[$i]["Total"];
                if($students[$i]["Keterangan"]=="Revisi KRS") {
                    echo "<td style='background-color:red'>".$students[$i]["Keterangan"]."</td>";
                }
                else {
                    echo "<td style='background-color:green'>".$students[$i]["Keterangan"]."</td>";
                }
            }
            else {
                echo "<td>";
                echo "<td>";
                echo "<td>".$students[$i]["Matkul"][$u]["mk"];
                echo "<td>".$students[$i]["Matkul"][$u]["SKS"];
                echo "<td>";
                echo "<td>";
            }
        }
    }
?>