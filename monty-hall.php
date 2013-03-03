<?php

$timesToRunExperiment = 1000000000;

// (33.334%)
$stayWins = 0;

// (66.666%)
$switchWins = 0;

for($experimentCounter = 0; $experimentCounter < $timesToRunExperiment; $experimentCounter++)
{
	$doors = array(0, 0, 0);
	
	$doorWithCar = mt_rand(0, 2);
	$doors[$doorWithCar] = 1;
	
	$doorSelected = mt_rand(0, 2);
	
	if($doorSelected == $doorWithCar)
	{
		$stayWins++;
	}
	else
	{
		$switchWins++;
	}
	
	if($experimentCounter % 1000000 == 0)
	{
		echo 'Progress: ' . number_format($experimentCounter / $timesToRunExperiment * 100, 1) . '%' . PHP_EOL;
	}
}

echo 'Stay Wins: ' . $stayWins . ' (' . number_format($stayWins / $timesToRunExperiment * 100, 3) . '%)' . PHP_EOL;
echo 'Switch Wins: ' . $switchWins . ' (' . number_format($switchWins / $timesToRunExperiment * 100, 3) . '%)' . PHP_EOL;
