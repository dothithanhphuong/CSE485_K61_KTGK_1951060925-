<?php
    require_once 'config/db.php';

    class nhanvien {
        private $manv;
        private $hovaten;
        private $chucvu;
        private $phongban;
        private $luong;
        private $ngayvaolam;

        public function index(){
            $connect = $this->connectDb();

            $sqlindex = "SELECT * FROM nhanvien";
            $results = mysqli_query($connect, $sqlindex);
            $nhanvien = [];
            if (mysqli_num_rows($results) > 0) {
                $nhanvien = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($connect);

        return $nhanvien;
        }

        public function add($nhanvienArr = []){
            $connect = $this->connectDb();

            $sqladd = "INSERT INTO nhanvien(manv,hovaten,chucvu,phongban,luong,ngayvaolam) 
            VALUES ('{$nhanvien['manv']}','{$nhanvien['hovaten']}','{$nhanvien['chucvu']}', '{$nhanvien['phongban']}','{$nhanvien['luong']}','{$nhanvien['ngayvaolam']}')";

            $isInsert = mysqli_query($connect, $sqladd);
            $this->closeDb($connect);
            return $isInsert;
        }


        public function update($tenbang = []){
            $connect = $this->connectDb();
            $sqlUpdate = "UPDATE nhanvien 
            SET 'manv' = '{$nhanvien['manv']}','hovaten' = '{$nhanvien['hovaten']}','chucvu' = '{$nhanvien['chucvu']}','phongban' = '{$nhanvien['phongban']}',
            'luong' = '{$nhanvien['luong']}','ngayvaolam' = '{$nhanvien['ngayvaolam']}'
            WHERE 'manv' = {$tenbang['manv']}";
            $isUpdate = mysqli_query($connect, $sqlUpdate);
            $this->closeDb($connect);
    
            return $isUpdate;
        }


        public function delete($cotid = null){
            $connect = $this->connectDb();
            $sqlDelete = "DELETE FROM nhanvien WHERE manv = $manv";
            $isDelete = mysqli_query($connect, $sqlDelete);
    
            $this->closeDb($connect);
    
            return $isDelete;
        }


        public function connectDb() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }
    
            return $connection;
        }
    
        public function closeDb($connection = null) {
            mysqli_close($connection);
        }
    }

?>