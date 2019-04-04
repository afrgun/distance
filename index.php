<!DOCTYPE html>
<html>
    <head>
        <title> Afrila Gunadi </title>
    </head>
    <style>
        *{ padding: 0; margin: 0;}
        body{ display: flex; height: 100vh; width: 100%; justify-content: center; align-items: center; }
        form{ border: 2px solid #ddd; border-radius: 5px; padding: 20px; }
        form p{ margin-bottom: 5px; }
        form input{ margin-top: 10px; padding: 5px;}
        form > .btn-proses{ padding: 10px; display: block; margin-bottom: 10px;}
        form label{ width: 100px; display: inline-block; }
    </style>
    <body>
        <?php
            $city = array("A", "B", "C", "D", "E", "F");
            $distance = array(45, 51, 38, 104, 93, 0);
            $hasil = 0;
            $consume = 0;   
            $nameCityOne = "-";
            $nameCityTwo = "-";
            $nameCityThree = "-"; 
        ?>
        <form method="post" action="">

            <p> Name : Afrila Gunadi </p>
            <p> NPM  : 201643500228 </p>

            <div>
                <label> Kota Pertama </label>
                <select name="cityOne">
                    <option value="">Select City</option>
                    <?php foreach($city as $key => $value):
                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                        endforeach; ?>
                </select>
            </div>

            <div>
                <label> Kota Kedua </label>
                <select name="cityTwo">
                    <option value="">Select City</option>
                    <?php foreach($city as $key => $value):
                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                        endforeach; ?>
                </select>
            </div>

            <div>
                <label> Kota Ketiga </label>
                <select name="cityThree">
                    <option value="">Select City</option>
                    <?php foreach($city as $key => $value):
                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                        endforeach; ?>
                </select>
            </div>

            <input type="submit" name="proses" value="Hitung" class="btn-proses">

            <?php
            include 'hitung.php';
            if(isset($_POST['proses'])){ 
                $cityOne = strtoupper($_POST['cityOne']);  
                $cityTwo = strtoupper($_POST['cityTwo']);  
                $cityThree = strtoupper($_POST['cityThree']);

                if($cityOne != "" && $cityTwo != ""){
                    $nameCityOne = $city[$cityOne];
                    $nameCityTwo = $city[$cityTwo];

                    $result = counts($cityOne, $cityTwo);
                    $consume = $result[0];
                    $hasil = $result[1];

                    if($cityThree != ""){
                        $nameCityThree = $city[$cityThree];
                        
                        $result = counts($cityTwo, $cityThree);
                        $hasil += $result[1];
                        $consume += $result[0];
                    }
                } 
            ?>

                <p> Perjalanan dari kota <?php echo $nameCityOne ?> ke kota <?php echo $nameCityTwo; ?>
                <?php if($cityThree != ""){?>
                    dan dilanjut menuju kota <?php echo $nameCityThree; ?> sejauh <?php echo $hasil; ?> km.<br/>
                    Dan akhirnya mengkonsumsi BBM sebanyak <?php echo number_format((float)$consume, 2, '.', '');; ?> Liter </p>
               <?php } else { ?>
                    adalah sejauh <?php echo $hasil; ?> km. <br/>
                    Dan akhirnya mengkonsumsi BBM sebanyak <?php echo number_format((float)$consume, 2, '.', '');; ?> Liter </p>
               <?php } ?>
                 
                
            <?php } ?>
        </form>


    </body>
</html>