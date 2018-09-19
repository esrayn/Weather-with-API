<!doctype html>
<html lang="en">
<head>
    <meta  http-equiv="Content-Type" content="text/html; charset=utf-8"">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hava Durumu</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
ini_set('display_errors','0');

function veri($city)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://volkansengul.com/havadurumu/?city='.$city.'&app_id=a9d7aee0786e81ead3079cf8a08eab21',
        CURLOPT_USERAGENT => 'GET CITY URL'
    ));

    $resp = curl_exec($curl);
    $resp = json_decode($resp);
    $name = $resp->name;
    $temp = $resp->main->temp;
    $speed = $resp->wind->speed;

    echo "Şehir :" . $name;
    echo "<br>";
    echo "Ortalama Sıcaklık :" . $temp;
    echo "<br>";
    echo "Rüzgar Hızı :" . $speed;
    echo "<br>";
    curl_close($curl);
}

function detay($cityid, $num)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://volkansengul.com/havadurumu/detay.php?city_id='.$cityid.'&app_id=a9d7aee0786e81ead3079cf8a08eab21',
        CURLOPT_USERAGENT => 'GET CITY DETAY'
    ));
    $resp = curl_exec($curl);
    $resp = json_decode($resp);
    $datetime = $resp->list[$num]->dt_txt;
    $temp = $resp->list[$num]->main->temp;
    $speed = $resp->list[$num]->wind->speed;

    @setlocale(LC_ALL, "turkish");


    $modified =  strftime("%d %B %Y, %A", strtotime("$datetime"));
    $modified = iconv("ISO-8859-1", "UTF-8", $modified);
    echo $modified;
    echo "<br>";
    echo "Ortalama Sıcaklık :" .$temp;
    echo "<br>";
    echo "Rüzgar Hızı :" .$speed;
    echo "<br>";

    curl_close($curl);
}


function goster($sehir)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://volkansengul.com/havadurumu/?city='.$sehir.'&app_id=a9d7aee0786e81ead3079cf8a08eab21',
        CURLOPT_USERAGENT => 'SHOW CITY'
    ));

    $resp = curl_exec($curl);
    $resp = json_decode($resp);
    $main = $resp->weather[0]->main;

    if ($main == "Clear") {
        echo "<img src='/weather/assets/clear.png'/>";
    } elseif ($main == "Clouds") {
        echo "<img src='/weather/assets/clouds.png'/>";
    }
    curl_close($curl);
}

?>

<body>
<div class="background">
    <div class="container">
        <section class="form">
            <div class="form-nav">
                <form id="form1" name="form1" method="post" action="#">
                    <select name="cb" id="cb">
                        <option selected="disabled">Lütfen bir şehir seçiniz</option>
                        <option value="istanbul">İstanbul</option>
                        <option value="eskisehir">Eskişehir</option>
                        <option value="antalya">Antalya</option>
                        <option value="bilecik">Bilecik</option>
                        <option value="mugla">Muğla</option>
                    </select>
                    <input type="submit" name="buton" id="buton" value="Hava Durumunu Göster"/>
                </form>
            </div>
        </section>
        <section class="data">

            <?php

            $cityIds = array("745044", "315202", "323777", "750598", "304184");
            $cities = array("istanbul", "eskisehir", "antalya", "bilecik", "mugla");
            $showTimeOfDay = array("5", "13", "20", "26");



            $cb = $_POST['cb'];

            switch ($_POST['cb'])
            {
            case $cities[0]:?>
             <div class="box">
                <div class="image"> <?php goster($cities[0]); ?></div>

                 <p> <strong>Bugün</strong> <br>

                     <?php veri($cities[0]);?>

                 </p></div>
                <div class="data-general">
                    <div class="flex-box"><?php detay($cityIds[0], $showTimeOfDay[0]); ?></div>
                    <div class="flex-box"><?php detay($cityIds[0], $showTimeOfDay[1]); ?></div>
                    <div class="flex-box"><?php detay($cityIds[0], $showTimeOfDay[2]); ?></div>
                    <div class="flex-box"><?php detay($cityIds[0], $showTimeOfDay[3]); ?></div>

                </div>
                <?php
            break;

                case $cities[1]:?>
                    <div class="box">
                        <div class="image"> <?php goster($cities[1]); ?></div>

                        <p> <strong>Bugün</strong> <br>

                            <?php veri($cities[1]);?>

                        </p></div>
                    <div class="data-general">
                        <div class="flex-box"><?php detay($cityIds[1], $showTimeOfDay[0]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[1], $showTimeOfDay[1]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[1], $showTimeOfDay[2]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[1], $showTimeOfDay[3]); ?></div>

                    </div>
                    <?php
                    break;
                case $cities[2]:?>
                    <div class="box">
                        <div class="image"> <?php goster($cities[2]); ?></div>

                        <p> <strong>Bugün</strong> <br>

                            <?php veri($cities[2]);?>

                        </p></div>
                    <div class="data-general">
                        <div class="flex-box"><?php detay($cityIds[2], $showTimeOfDay[0]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[2], $showTimeOfDay[1]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[2], $showTimeOfDay[2]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[2], $showTimeOfDay[3]); ?></div>

                    </div>
                    <?php
                    break;

                case $cities[3]:?>
                    <div class="box">
                        <div class="image"> <?php goster($cities[3]); ?></div>

                        <p> <strong>Bugün</strong> <br>

                            <?php veri($cities[3]);?>

                        </p></div>
                    <div class="data-general">
                        <div class="flex-box"><?php detay($cityIds[3], $showTimeOfDay[0]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[3], $showTimeOfDay[1]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[3], $showTimeOfDay[2]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[3], $showTimeOfDay[3]); ?></div>

                    </div>
                    <?php
                    break;

                case $cities[4]:?>
                    <div class="box">
                        <div class="image"> <?php goster($cities[4]); ?></div>

                        <p> <strong>Bugün</strong> <br>

                            <?php veri($cities[4]);?>

                        </p></div>
                    <div class="data-general">
                        <div class="flex-box"><?php detay($cityIds[4], $showTimeOfDay[0]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[4], $showTimeOfDay[1]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[4], $showTimeOfDay[2]); ?></div>
                        <div class="flex-box"><?php detay($cityIds[4], $showTimeOfDay[3]); ?></div>

                    </div>
                    <?php
                    break;

            default:
            ;
            }






?>






        </section>
    </div>
</div>
</body>
</html>







