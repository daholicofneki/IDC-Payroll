<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function formatMoney($number, $fractional = FALSE)
{
	if ($fractional)
	{
		$number = sprintf('%.2f', $number);
	}
	
	while (true)
	{
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		
		if ($replaced != $number)
		{
			$number = $replaced;
		}
		else
		{
			 break;
		}
	}
	return $number;
}

/* end number helper.php*/