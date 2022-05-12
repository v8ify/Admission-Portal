<?php
    $calendar_year = $_GET["calendar_year"];
    $year = $_GET["year"];
    $dept = $_GET["dept"];
    $div = $_GET["div"];

    include("xlsxwriter.class.php");
    include("inc_function.php");
    include("inc_con.php");

    $writer = new XLSXWriter();

    $data = array(array("PRN", "Name"));

    $result = get_roll_call($conn, $calendar_year, $year, $dept, $div);

    while ($row = mysqli_fetch_row($result)) {
        array_push($data, $row);
    }

    $temp_file = tempnam(sys_get_temp_dir(), 'output.xlsx');

    $writer->writeSheet($data);

    $writer->writeToFile($temp_file);

    // We'll be outputting an excel file
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    // It will be called file.xls
    header('Content-Disposition: attachment; filename="output.xlsx"');

    //No cache
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    //Define file size
    header('Content-Length: ' . filesize($temp_file));

    ob_clean();
    flush();
    readfile($temp_file);
    exit;
?>