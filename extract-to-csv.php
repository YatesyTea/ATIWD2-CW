<?php

/*
    Prakesh has provided timezone setting and PHP flags for:
        Memory overflow (leading to the lovely bluescreen)
        Program taking too long to run.
        And the last flag to make the data transfer easier by detecting line endings in csv files.
		.\..\php\php -S localhost:8000 to run server btw
*/
@date_default_timezone_set("GMT");

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '300');
ini_set('auto_detect_line_endings', TRUE);

# Setting values for timing and while loops.
$time_taken=microtime(true);
$loops=0;

# Open big file
$read_file = fopen('air-quality-data-2004-2019.csv', 'r');

/*List of Stations, could scan the whole doc to generate this,
but may take too much computational time and is outside of spec*/
$data_nums_int = array(
    188, 203, 206, 209, 213, 215, 228, 270, 271,
    375, 395, 447, 452, 459, 463, 481, 500, 501
);

# Set Up Concantenation of Strings
$data_prefix = 'csvData/data_';

$data_nums = array(
    '188', ' 203', '206', '209', '213', '215', '228', '270',
    '271', '375', '395', '447', '452', '459', '463', '481', '500', '501'
);

$data_postfix = '.csv';
$data_holders = array(
    'data_188', 'data_203', 'data_206', 'data_209', 'data_213',
    'data_215', 'data_228', 'data_270', 'data_271', 'data_375', 'data_395', 'data_447',
    'data_452', 'data_459', 'data_463', 'data_481', 'data_500', 'data_501'
);



# Loop through and open all required docs.
for ($i = count($data_nums) - 1; $i >= 0; $i--) {
    $concant = $data_prefix . $data_nums[$i] . $data_postfix;
    ${$data_holders[$i]} = fopen($concant, 'w');
}

# Sets header then loop through and add header to all documents.
$header = array(
    'siteID', 'ts', 'nox', 'no2', 'no', 'pm10', 'nvpm10', 'vpm10',
    'nvpm2.5', 'pm2.5', 'vpm2.5', 'co', 'o3', 'so2', 'loc', 'lat', 'long'
);

for ($i = count($data_nums) - 1; $i >= 0; $i--) {
    $concant = $data_prefix . $data_nums[$i] . $data_postfix;
    fputcsv(${$data_holders[$i]}, $header);
}

# Loop through data file until end of file.
while (!feof($read_file)) {
    	
    $current_line = fgets($read_file);
	
	# Used 2nd answer in link below to learn explode in this form:
	# https://stackoverflow.com/questions/16371524/how-can-i-split-a-csv-file-in-php
	[$date_time,$NOx,$NO2,$NO,$siteID,$PM10,$NVPM10,$VPM10,$NVPM2_5,$PM2_5,$VPM2_5,$CO,$O3,$SO2,$Temperature,$RH,$Air_Pressure,$loc,$geo_point_2d] = explode(';', $current_line);
	
	# Conversion from string to UNIX datetime format.
	$ts = strtotime($date_time);
	
	# Conversion from 2d value, to 2 separate values.
	[$long, $lat] = explode(',', $geo_point_2d);

	# Create array to destroy 
	$current_line = array($siteID, $ts, $NOx, $NO2, $NO, $PM10, $NVPM10, $VPM10, $NVPM2_5, $PM2_5, $VPM2_5, $CO, $O3, $SO2, $loc, $long, $lat);
	
	# Check that NOx or CO2 are not both null.
	if ($current_line[2] != null or $current_line[11] != null) {
	
		/*Could have looped through like previous parts of the doc.
		  However switch case runs fine, and I don't know how efficient
		  the loops would be in PHP in comparison to this simple statement.
		  This is not flexible as I would like for this program however.*/
		switch($current_line[0]) {
			
			case 188:
				fputcsv($data_188, $current_line);
				break;
			
			case 203:
				fputcsv($data_203, $current_line);
				break;
			
			case 206:
				fputcsv($data_206, $current_line);
				break;
			
			case 209:
				fputcsv($data_209, $current_line);
				break;
			
			case 213:
				fputcsv($data_213, $current_line);
				break;
			
			case 215:
				fputcsv($data_215, $current_line);
				break;
			
			case 228:
				fputcsv($data_228, $current_line);
				break;
			
			case 270:
				fputcsv($data_270, $current_line);
				break;
			
			case 271:
				fputcsv($data_271, $current_line);
				break;
			
			case 375:
				fputcsv($data_375, $current_line);
				break;
			
			case 395:
				fputcsv($data_395, $current_line);
				break;
			
			case 447:
				fputcsv($data_447, $current_line);
				break;
			
			case 452:
				fputcsv($data_452, $current_line);
				break;
			
			case 459:
				fputcsv($data_459, $current_line);
				break;
			
			case 463:
				fputcsv($data_463, $current_line);
				break;
			
			case 481:
				fputcsv($data_481, $current_line);
				break;
			
			case 500:
				fputcsv($data_500, $current_line);
				break;
			
			case 501:
				fputcsv($data_501, $current_line);
				break;
		}	
	}
	$loops++;
}

# Loop through and close all files.
for ($i = count($data_nums) - 1; $i >= 0; $i--) {
    $concant = $data_prefix . $data_nums[$i] . $data_postfix;
    fclose(${$data_holders[$i]});
}

ob_clean();
echo '<p>Run complete in '.$time_taken.' ms and '.$loops.' loops of document.</p>';
