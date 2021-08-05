<?php

# Setting measurements.

use function PHPSTORM_META\type;

$time_taken = microtime(true);
$loops = 0;

# Function to convert from CSV to XML formats.
function convert($in, $out) {

    # Create New Temporary XML Document.
    $xml = new XMLWriter();
    $xml ->openMemory();
    $xml ->startDocument('1.0', 'UTF-8');
    

    /*  Here we want to set station
        id:
        name: 
        geocode: (combo of lat and long)
    */


    # Setting ID of station.
    // $second_list[0];

    # Setting Name (location) of station.
    // $second_list[14];

    # Setting Geocode (Lat + Long) of station.
    // $geo_input = (string)$second_list[15].','.(string)$second_list[16];




    # Opening our Csv file for usage in loop.

    # Wasting header, with faster fgets.

    


        # Load as array


        /*  Loop through $current_line_array and add values to record wherever value != null.
            Skipping out the first value, and the last 3, since they are the repeating values.*/
  
        }   
    }
}



# Takes in all the inputs, concantenates them, and returns the value.
function generateFileName($prefix, $num, $postfix){
    $str_num = (string)$num;
    $concant = $prefix . $str_num . $postfix;
    #echo($concant.'<br>'); # Is just here for when genFileName doesn't work.
    return $concant;
}

/* 
    =========================================================
    This should probably be a function called main :thinking:
    =========================================================
*/
$csv_prefix = 'csvData/data_';
$xml_prefix = 'xmlData/data_';

/*  Instead of doing this could take the filenames from the dir in this task.
    Then replace each occurance of csv with xml for the xml files.*/
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
// for ($i = count($data_nums_int) - 1; $i >= 0; $i--) {
//     convert($csvfilenames[$i],$xmlfilenames[$i]);
//     $loops++;
//     echo($loops.' files converted.<br>');
// }
convert('csvData/data_188.csv', 'xmlData/data_188.xml');
echo('Complete in '.($time_taken/1000000).'ms.');