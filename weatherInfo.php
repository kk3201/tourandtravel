
<?php
@session_start();
$cityName=$_SESSION['$cityname'];

$apiKey = "747a7aa07e239a2d588e8ca07968f018";  // Replace with your actual API key
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

   <?php echo $data->name; ?> 
   
        <?php echo date("l g:i a", $currentTime); ?>
        <?php echo date("jS F, Y", $currentTime); ?>
       <?php echo ucwords($data->weather[0]->description); ?>
 
       <?php echo $data->weather[0]->icon; ?>
         <?php echo $data->main->temp_max; ?>°C
         <?php echo $data->main->temp_min; ?>°C
 
       Humidity: <?php echo $data->main->humidity; ?> %
        Wind: <?php echo $data->wind->speed; ?> km/h

