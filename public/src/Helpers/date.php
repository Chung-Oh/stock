<?php 

function testArg($arg)
{
	if ($arg) {
		return true;
	} else {
		return false;
	}
}

function messageDefault()
{
	echo "N/D";
}

function manipulateDate($arg)
{
	if (testArg($arg)) {
		$year = substr($arg, 0, 4);
		$month = substr($arg, 5, 2);
		$day = substr($arg, 8, 2);
		$char = '/';
		$date = $day . $char . $month . $char . $year;
		return $date; 	
	} else {
		messageDefault();
	}
}

function manipulateTime($arg)
{
	if (testArg($arg)) {
		$time = substr($arg, 11, 8) . " hrs";
		return $time;
	} else {
		messageDefault();
	}
}

function dateFull($arg)
{
	if (testArg($arg)) {
		$time = manipulateTime($arg);
		$date = manipulateDate($arg);
		$full = $time . " - " . $date;
		return $full;		
	} else {
		messageDefault();
	}
}