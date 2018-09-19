<!--
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
/*ini_set('display_errors','0');

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
    echo strftime("%d %B %Y, %A", strtotime("$datetime"));

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

*/?>

<body>
<div class="background">
    <div class="container">
        <section class="form">
            <div class="form-nav">
                <form id="form1" name="form1" method="post" action="index.php">
                    <select name="cb" id="cb">
                        <!--<option selected="disabled">Lütfen bir şehir seçiniz</option>-->
                        <option  selected="enable" value="istanbul">İstanbul</option>
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
/*            $cb = $_POST['cb'];
            $cityIds = array(
                "istanbul" => "745044",
                "eskisehir" => "315202",
                "antalya" => "323777",
                "bilecik" => "750598",
                "mugla" => "304184");

            $showTimeOfDay = array("5", "13", "20", "23");

            */?>


            <div class="box">
                <div class="image"> <?php /*goster($cb); */?></div>
                <p> <strong>Bugün</strong> <br>
                    <?php /*veri($cb);*/?>
                </p></div>

            <div class="data-general">
                <div class="flex-box"><?php /*detay($cityIds[$cb], $showTimeOfDay[0]); */?></div>
                <div class="flex-box"><?php /*detay($cityIds[$cb], $showTimeOfDay[1]); */?></div>
                <div class="flex-box"><?php /*detay($cityIds[$cb], $showTimeOfDay[2]); */?></div>
                <div class="flex-box"><?php /*detay($cityIds[$cb], $showTimeOfDay[3]); */?></div>

            </div>
        </section>
    </div>
</div>
</body>
</html>







-->