# ATIWD2 To-Do list

## Pre-requisites

- [ ] Setup Github Repository
- [ ] Add contained input data



## Task 1

- [x] Separate input data into different csv files for each monitoring station.

  - [x] If column 2 and 12 are null then throw input.

- [x] Move tables, and convert date/time string to UNIX timestamp.

  - [x] This format displayed

    ```
    siteID,ts,nox,no2,no,pm10,nvpm10,vpm10,nvpm2.5,pm2.5,vpm2.5,co,o3,so2,loc,lat,long
    ```

    

```php
# Set timezone
@date_default_timezone_set("GMT");

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '300');
ini_set('auto_detect_line_endings', TRUE);
```



## Task 2

XMLWriter() library useful.

- [ ] PHP script converting csv to xml files with any repeating data being held in the station section rather than records sections.
- [ ] XSD schema for XML validation

## Task 3



## Task 4

