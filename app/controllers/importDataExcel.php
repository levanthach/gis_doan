<?php
//Nhúng file PHPExcel
require_once "../../public/assets/lib/PHPExcel/Classes/PHPExcel.php";
require_once "../config/config.php";

// GET parameter CLI in PHOP
parse_str(implode('&', array_slice($argv, 1)), $_GET);
//Đường dẫn file
$file = '../import_data/Data_GIS.xlsx';
//Tiến hành xác thực file
$objFile = PHPExcel_IOFactory::identify($file);
$objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
$objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
$objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
$sheet = $objPHPExcel->setActiveSheetIndex($_GET['tab']);

//Lấy ra số dòng cuối cùng
$Totalrow = $sheet->getHighestRow();
//Lấy ra tên cột cuối cùng
$LastColumn = $sheet->getHighestColumn();


//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

//Tạo mảng chứa dữ liệu
$data = [];

//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
for ($i = 2; $i <= $Totalrow; $i++) {
    //----Lặp cột
    for ($j = 0; $j < $TotalCol; $j++) {
        // Tiến hành lấy giá trị của từng ô đổ vào mảng
        $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
    }
}

$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  switch ($_GET['table']) {
        case "province":
            foreach ($data as $improt_data) {
                $sql = "INSERT INTO " . $_GET['table'] . "(id, name)
                VALUES (" . $improt_data[0] . ",'" . $improt_data[1] . "')";
                $conn->exec($sql);  
            }
            break;
        case "district": 
            foreach ($data as $improt_data) {
                $sql = 'INSERT INTO ' . $_GET['table'] . '(id, province_id, name)
                VALUES (' . $improt_data[0] . ',' . $improt_data[1] . ',"' . $improt_data[2] . '")';
                $conn->exec($sql);  
            }
            break;
        case "commune": 
            foreach ($data as $improt_data) {
                $sql = 'INSERT INTO ' . $_GET['table'] . '(id, district_id, name, acreage)
                VALUES (' . $improt_data[0] . ',' . $improt_data[1] . ',"' . $improt_data[2] . '",' . $improt_data[3] . ')';
                $conn->exec($sql);
            }
            break;
        case "population": 
            foreach ($data as $improt_data) {
                $sql = "INSERT INTO " . $_GET['table'] . "(id, commune_id, time, count)
                VALUES (" . $improt_data[0] . "," . $improt_data[1] . "," . $improt_data[2] . "," . $improt_data[3] . ")";
                $conn->exec($sql);
            }
            break;
        case "polygon": 
            foreach ($data as $improt_data) {
                $sql = 'INSERT INTO ' . $_GET['table'] . '(id, commune_id)
                VALUES (' . $improt_data[0] . ',' . $improt_data[1] . ')';
                $conn->exec($sql);
            }
            break;
        case "point": 
            foreach ($data as $improt_data) {
                $sql = "INSERT INTO " . $_GET['table'] . "(id, polygon_id, longs, lats)
                VALUES (" . $improt_data[0] . "," . $improt_data[1] . "," . $improt_data[2] . "," . $improt_data[3] . ")";
                $conn->exec($sql);
            }
            break;
  }

  echo "Insert successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;