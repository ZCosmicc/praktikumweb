<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 2px solid black;
            }
        </style>
        <title>Sup bruv</title>
    </head>
    <body>
        <table>
            <tr
                bgcolor= "red" height= "65px" >
                <th style= "font-size: 26px"> Daftar Smartphone Samsung</th>
            </tr>
            <?php
                $DjiSamSoeng=array("SS1"=>"Samsung Galaxy S22", "SS2"=>"Samsung Galaxy S22+", "SS3"=>"Samsung A03", "SS4"=>"Samsung Galaxy Xcover 5");
                foreach($DjiSamSoeng as $isi):
            ?>
            <tr>
                <td><?php echo ($isi);?></td>
            </tr>
            <?php
                endforeach
            ?>
        </table>
    </body>
</html>