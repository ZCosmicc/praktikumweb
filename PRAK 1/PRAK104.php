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
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php
                $DjiSamSoeng=array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung A03", "Samsung Galaxy Xcover 5");
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