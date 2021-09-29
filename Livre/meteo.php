<?php
require_once 'class/OpenWeather.php';
$weather = new OpenWeather('9a68542a5d812a11f56a4f056e313a0f');
$forcast = $weather->getForecast('Lille,fr');
var_dump($forecast);
