<?php

/*
    Prakesh has provided timezone setting and PHP flags for:
        Memory overflow (leading to the lovely bluescreen)
        Program taking too long to run.
        And the last flag to make the data transfer easier by detecting line endings in csv files.
*/
@date_default_timezone_set("GMT");

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '300');
ini_set('auto_detect_line_endings', TRUE);

# Open big file
$read_file = fopen('air-quality-data-2004-2019.csv', 'r');
$header = array();


# Set Up Concantenation of Strings
$data_prefix = 'csvData/data_';
$data_nums = array('188', ' 203', '206', '209', '213', '215', '228', '270', '271', '375', '395', '447', '452', '459', '463', '481', '500', '501');
$data_postfix = '.csv'; 
$data_holders = array('data_188', 'data_203', 'data_206', 'data_209', 'data_213','data_215', 'data_228', 'data_270', 
'data_271', 'data_375', 'data_395', 'data_447', 'data_452', 'data_459', 'data_463'
, 'data_481', 'data_500', 'data_501');

# Loop through and open all required docs.
for($i = count($data_nums)-1; $i >= 0;$i--) {
    $concant = $data_prefix.$data_nums[$i].$data_postfix;
    ${$data_holders[$i]} = fopen($concant, 'w');   
}

# Loop through and add header to all documents.
for($i = count($data_nums)-1; $i >= 0;$i--) {
    $concant = $data_prefix.$data_nums[$i].$data_postfix;
    fputcsv(${$data_holders[$i]}, $header);   
}


# Loop through and close all files.
for($i = count($data_nums)-1; $i >= 0;$i--) {
    $concant = $data_prefix.$data_nums[$i].$data_postfix;
    fclose(${$data_holders[$i]});   
}