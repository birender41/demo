<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'inovcares');
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    $filename = '/home/software-dev/Downloads/test.csv';
    $handle = fopen($filename, "r");
    $row = 0;
    $specialities = [];
    $query = 'INSERT INTO master_subspecialty (`master_subspecialty_uuid`,`master_specialty_uuid`,`master_subspecialty_name`) VALUES ';
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($row > 0) {
//            array_push($specialities, trim($data[0]));
//    }
//    echo '<pre>';
//    foreach (array_unique($specialities) as $speciality) {
            $query .= ' ("' . md5(rand(000000000, 999999999999) . $data[1] . microtime()) . '","' . $data[2] . '","' . $data[1] . '"), ';
        }
        $row++;
    }
    echo $query;
}
?>
