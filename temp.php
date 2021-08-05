<?php

$csv_in = fopen('csvData/data_188.csv', 'r');
$current_line = fgetcsv($csv_in);
print('Count: '.count($current_line).'<br><br><br>');

for ($i = 1; $i < (count($current_line) - 3); $i++) {
    if($current_line[$i] != null){
        print((string)($current_line)[$i]. '<br><br><br>');
    }

}
