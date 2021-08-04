<?php

# Setting measurements.
$time_taken = microtime(true);
$loops = 0;

# Function to convert from CSV to XML formats.
function convert($in, $out) {

    # Create New Temporary XML Document.
    $temp_xml  = new DomDocument('1.0',"UTF-8");
    $temp_xml->formatOutput = true;
    

    /*  Here we want to set station
        id:
        name: 
        geocode: (combo of lat and long)
    */
    $csv_in = fopen($in, 'r');
    $first_line = fgets($csv_in);
    $second_line = fgets($csv_in);

    # Setting ID of station.

    # Setting Name (location) of station.

    # Setting Geocode (Lat + Long) of station.

    fclose($csv_in);



    # Opening our Csv file.
    $csv_in = fopen($in, 'r');

    #   Use CSV Header line to generate names for usage in XML creation
    $header_line = fgets($csv_in);
    print_r($header_line);
    $temp_list = list($siteID,$ts,$nox,$no2,$no,$PM10,$NVPM10,$VPM10,$NVPM2_5,$PM2_5,$VPM2_5,$CO,$O3,$SO2,$loc,$lat,$long) = explode(',', $header_line);
    $header_names = array();
    
    /*  Loop through $temp_list and push the 
        header string values to $header_names*/
    for ($i = 1; $i <= count($temp_list)-4; $i++) {
        array_push($header_names, $temp_list[$i]);
    }
    

    while(!feof($csv_in)) {
        # Load line.
        $current_line = fgets($csv_in);

        /*  Break it down into pieces to use as tags.
            CSV headers is: siteID,ts,nox,no2,no,pm10,nvpm10,vpm10,nvpm2.5,pm2.5,vpm2.5,co,o3,so2,loc,lat,long.*/
        [$siteID, $ts, $NOx, $NO2, $NO, $PM10, $NVPM10, $VPM10, $NVPM2_5, $PM2_5, $VPM2_5, $CO, $O3, $SO2, $loc, $long, $lat] = explode(';', $current_line);

        # Taking values we want.
        $current_line_array = array($ts, $NOx, $NO2, $NO, $PM10, $NVPM10, $VPM10, $NVPM2_5, $PM2_5, $VPM2_5, $CO, $O3, $SO2);

        # Loop through $current_line_array and add values to record wherever value != null.

        
        
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
for ($i = count($data_nums_int) - 1; $i >= 0; $i--) {
    convert($csvfilenames[$i],$xmlfilenames[$i]);
    $loops++;
    echo($loops.' files converted.<br>');
}

echo('Complete in '.$time_taken.'ms.');