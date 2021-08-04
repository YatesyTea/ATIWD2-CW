<?php



$st = microtime(true);

# Function to convert from csv to XML
function convert($infile, $outfile) {
    
    $infile = fopen($infile,$outfile);

}



# Takes in all the inputs, concantenates them, and returns the value.
function generateFileName($prefix, $num, $postfix){
    $str_num = (string)$num;
    $concant = $prefix . $str_num . $postfix;
    echo($concant);
    return $concant;
}

/* 
    =========================================================
    This should probably be a function called main :thinking:
    =========================================================
*/
$csv_prefix = 'csvData/data_';
$xml_prefix = 'xmlData/data_';

$data_nums_int = array(
    188, 203, 206, 209, 213, 215, 228, 270, 271,
    375, 395, 447, 452, 459, 463, 481, 500, 501
);

$csv_postfix = '.csv';
$xml_postfix = '.xml';

$csvfilenames = array();
$xmlfilenames = array();

# Generating CSV file names, could have gone one step further with this.
for ($i = count($data_nums_int) - 1; $i >= 0; $i--) {
    $temp_file_name = (generateFileName($csv_prefix, $data_nums_int[$i], $csv_postfix));
    array_push($csvfilenames, $temp_file_name);
}

# Generating XML file names, could have gone one step further with this.
for ($i = count($data_nums_int) - 1; $i >= 0; $i--) {
    $temp_file_name = (generateFileName($xml_prefix, $data_nums_int[$i], $xml_postfix));
    array_push($xmlfilenames, $temp_file_name);
}

# Using the CSV to XML function using loops through the generated file names.
for ($i = count($data_nums_int) - 1; $i >= 0; $i--) {
    convert($csvfilenames[$i],$xmlfilenames[$i]);
}