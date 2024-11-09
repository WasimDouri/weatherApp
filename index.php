

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App </title>
</head>
<body>
    <div align="center">
        <form method="post">
            <h2> Weather App By Wasim Douri </h2>
            Enter City:
            <input type="text" name="city">
            <input type="submit" name="submit" value="Check weather">
        </form><br><br>
   
    </div>    
</body>
</html>

<?php
    if (isset($_POST["submit"])){
        if(empty($_POST["city"])){
            echo "Enter city name";
     } else {
            $city=$_POST["city"];
            $api_key="26436712345201a7c36960f2af7a9b7b";
            $api="https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key";
            $api_data=file_get_contents($api);
            //print_r($api_data);
            $weather=json_decode($api_data,true);
            //print_r($weather);
            $status=$weather ["weather"][0]["description"];
            $celecious=$weather ["main"]["temp"]-273;
            $humidity=$weather ["main"]["humidity"];
            $wind=$weather ["wind"]["speed"];  
         echo "<table border=1 align=center bgcolor=#addddd>";
         echo "<tr><td>";
         echo "Weather Status";  echo "<td>"; echo $status;
$w=(string) $status;
if (strpos ($w,'sun')== true)  { echo "<td><img src='sun.png' width=50 height=50></td>"; }
elseif (strpos ($w,'rain')==true)  { echo "<td><img src='rain.png' width=50 height=50></td>"; }
elseif (strpos ($w,'cloud')==true)  { echo "<td><img src='cloudy.png' width=50 height=50></td>"; }
elseif (strpos ($w, 'snow')==true)  { echo "<td><img src='snow.png' width=50 height=50></td>"; }
elseif (strpos ($w,'sky')==true)  { echo "<td><img src='sun.png' width=50 height=50></td>"; }

else  { echo "<td><img src='cloudy (1).png' width=50 height=50></td>"; }

 
         echo "<tr>";
         echo "<td>";
         echo " Humidity";echo "<td>"; echo $humidity;
         echo "<tr>";
         echo "<td>";
         echo "Temprature (C) ";echo "<td>"; echo $celecious;
         echo "<tr>";
         echo "<td>";
         echo " Wind speed";echo "<td>"; echo $wind;
     }
 }             
?>

