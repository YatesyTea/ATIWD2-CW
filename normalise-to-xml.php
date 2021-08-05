<?php

# Setting measurements.

use function PHPSTORM_META\type;

$time_taken = microtime(true);
$loops = 0;

# Function to convert from CSV to XML formats.
function convert($in, $out)
{

    # Create New XML writer that will contain data we shove in it.
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument('1.0', 'UTF-8');


    $csv_in = fopen($in, 'r');
    while (!feof($csv_in)) {
        $current_line = fgetcsv($csv_in);

        # Section to create station and it's attributes.
        if ($current_line[0] == 'siteID') {
            print($current_line[0] . 'proccing<br><br>');
            # Setting what the titles are, as an array to check against later.
            $header_line = $current_line;
            # Load second line to set station stuff.
            $current_line = fgetcsv($csv_in);

            # Create Geocode
            $geocode = ((string)$current_line[15] . ',' . (string)$current_line[16]);

            /*  Here we want to set station
            id:
            name: 
            geocode: (combo of lat and long)*/
            $xml->startElement('station');
            $xml->writeAttribute('id', $current_line[0]);
            $xml->writeAttribute('name', $current_line[14]);
            $xml->writeAttribute('geocode', $geocode);
        }

        # Starting a record before filling in it's parameters.
        $xml->startElement('rec');

        for ($i = 1; $i < count($header_line); $i++) {
            $xml ->writeAttribute($header_line[$i], $current_line[$i]);
        }
        # Closes 'rec'
        $xml->endElement();
        // print('Count: '.count($current_line)); # Adresses length of array.
    }
    # Closing the XML writer.
    $xml->endElement();
    $xml->endDocument();
    # Offloading all XML data to the XML file.
    file_put_contents($out, $xml->outputMemory());

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



# Takes in all the inputs, concantenates them, and returns the value.
function generateFileName($prefix, $num, $postfix)
{
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
    375, 395, 447, 452, 459, 463, 500, 501
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
    $loops++;
    echo($loops.' files converted.<br>');
}
// convert('csvData/data_188.csv', 'xmlData/data_188.xml');
echo ('Complete in ' . ($time_taken / 1000000) . 'ms.');
