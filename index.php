<?php

$timesToRunExperiment = 100000000;

// 2 (24.9447%, 25.1414%
$expected = array(
	0, 1
);

// 4 (6.2209%, 6.289%)
$expected = array(
	0, 1, 0, 1
);

// 6 (1.5296%, 1.5838%)
$expected = array(
	0, 1, 0, 1, 0, 1
);

// 8 (0.3786%, 0.3966%)
$expected = array(
	0, 1, 0, 1, 0, 1, 0, 1
);

// 10 (0.0925%, 0.1019%)
$expected = array(
	0, 1, 0, 1, 0, 1, 0, 1, 0, 1
);

// 20 (8.4E-5%)
$expected = array(
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
}

echo 'Number of Times the Expected Outcome Was Reached: ' . $numberOfTimesMatchedExpectedOutcome . PHP_EOL;
echo 'Percentage: ' . bcdiv($numberOfTimesMatchedExpectedOutcome, $timesToRunExperiment, 10) * 100 . '%';
