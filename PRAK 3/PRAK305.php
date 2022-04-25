<form action="PRAK305.php" method="POST">
    <div>
        <input type="text" name="input">
        <button type ="submit" value ="submit" name ="submit">Cetak</button>
    </div>
</form>

<?php
    if(isset($_POST['submit']))
    {
        $input = $_POST['input'];
        $jmlh = strlen($input);
        $array = str_split($input);
        $a = $b = 0;

        while ($a < $jmlh) {
            echo strtoupper($input[$b]);
            for ($i = 1; $i < $jmlh; $i++) {
                echo strtolower($input[$b]);
            }
            $a++;
            $b++;
        }
    }
?>