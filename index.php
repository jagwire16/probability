<?php

$timesToRunExperiment = 1000000000;

$expected = array(
	// 2 (24.9447%, 25.1414%)
	// 0, 1		
	
	// 4 (6.2209%, 6.289%)
	// 0, 1, 0, 1
	
	// 6 (1.5296%, 1.5838%)
	// 0, 1, 0, 1, 0, 1
	
	// 8 (0.3786%, 0.3966%)
	// 0, 1, 0, 1, 0, 1, 0, 1
	
	// 10 (0.0925%, 0.1019%)
	// 0, 1, 0, 1, 0, 1, 0, 1, 0, 1
	
	// 20 (9.08E-5%, 9.88E-5%)
	0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1
);


$tosses = count($expected);

$numberOfTimesMatchedExpectedOutcome = 0;

for($experimentCounter = 0; $experimentCounter < $timesToRunExperiment; $experimentCounter++)
{
	$outcomes = array();
	
	for($i = 0; $i < $tosses; $i++)
	{
		$outcomes[] = mt_rand(0, 1);
	}

	if($expected == $outcomes)
	{
		$numberOfTimesMatchedExpectedOutcome++;
	}
	
	if($experimentCounter % 1000000 == 0)
	{
		echo 'Progress: ' . number_format($experimentCounter / $timesToRunExperiment * 100, 1) . '%' . PHP_EOL;
	}
}

echo 'Number of Times the Expected Outcome Was Reached: ' . $numberOfTimesMatchedExpectedOutcome . PHP_EOL;
echo 'Percentage: ' . bcdiv($numberOfTimesMatchedExpectedOutcome, $timesToRunExperiment, 10) * 100 . '%';
