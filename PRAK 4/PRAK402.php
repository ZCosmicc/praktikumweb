<style>
    table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 4px;
    }
</style>

<?php 
    $students = array(

    array("Nama" => "Andi", "NIM" => "2101001", "UTS" => "87", "UAS" => "65"),
    array("Nama" => "Budi", "NIM" => "2101002", "UTS" => "76", "UAS" => "79"),
    array("Nama" => "Tono", "NIM" => "2101003", "UTS" => "50", "UAS" => "41"),
    array("Nama" => "Jessica", "NIM" => "2101004", "UTS" => "60", "UAS" => "75"),
    );

    for($i = 0; $i < count($students); $i++) {

        $students[$i]["Nilai"] = $students[$i]["UTS"] * 0.4 + $students[$i]["UAS"] * 0.6;
        
        if($students[$i]["Nilai"] >= 80) {
            $students[$i]["value"] = "A";
        }
        elseif($students[$i]["Nilai"] > 70) {
            $students[$i]["value"] = "B";
        }
        elseif($students[$i]["Nilai"] > 60) {
            $students[$i]["value"] = "C";
        }
        elseif($students[$i]["Nilai"] > 50) {
            $students[$i]["value"] = "D";
        }
        else {
            $students[$i]["value"] = "E";
        }
    }

    echo "<table style = 'width: 600px'>";
    echo "<tr style='background-color:lightgrey; text-align:left;'>";
    echo "<th>Nama";
    echo "<th>NIM";
    echo "<th>Nilai UTS";
    echo "<th>Nilai UAS";
    echo "<th>Nilai Akhir";
    echo "<th>Huruf";

    for($i = 0; $i < count($students); $i++) {
        echo "<tr>";
        echo "<td>".$students[$i]["Nama"];
        echo "<td>".$students[$i]["NIM"];
        echo "<td>".$students[$i]["UTS"];
        echo "<td>".$students[$i]["UAS"];
        echo "<td>".$students[$i]["Nilai"];;
        echo "<td>".$students[$i]["value"];;
    }
?>