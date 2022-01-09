<?php
require_once 'model/nhanvien.php';
class nhanvienController {

    public function index() {
       
        $nhanvien = new nhanvien();
        $nhanviens = $nhanvien->index();

        require_once 'view/nhanvien/index.php';
    }

    public function add() {
        $error = '';

        if (isset($_POST['submit'])) {
            $cot1 = $_POST['maNV'];

            if (empty($cot1)) {
                $error = "Mã nhân viên không được để trống";
            }
            else {
  
                $nhanvien = new nhanvien();

                $nhanvienArr = [
                    'maNV' => $maNV,
                    'hovaten' => $hovaten,  
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isInsert = $nhanvien->insert($nhanvienArr);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php?controller=nhanvien&action=index");
                exit();
            }
        }
      
        require_once 'view/nhanvien/add.php';
    }

    public function update() {
   
        if (!isset($_GET['maNV'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=nhanvien&action=index");
            return;
        }
        
        $maNV = $_GET['maNV'];
        
        $nhanvien = new nhanvien();
        $nhanvien = $nhanvien->getBookById($maNV);

        
        $error = '';
        if (isset($_POST['submit'])) {
            $maNV = $_POST['maNV'];

            if (empty($maNV)) {
                $error = "Mã nhân viên không được để trống";
            }
            else {
              
                $nhanvien = new nhanvien();
                $nhanvienArr = [
                    'maNV' => $manv,
                    'hovaten' => $hovaten,
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isUpdate = $nhanvien->update($nhanvienArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update bản ghi #$maNV thành công";
                }
                else {
                    $_SESSION['error'] = "Update bản ghi #$maNV thất bại";
                }
                header("Location: index.php?controller=nhanvien&action=index");
                exit();
            }
        }
        
        require_once 'view/nhanvien/update.php';
    }

    public function delete() {

        $maNV = $_GET['maNV'];
        
        $nhanvien = new nhanvien();
        $isDelete = $nhanvien->delete($maNV);

        if ($isDelete) {    
            $_SESSION['success'] = "Xóa bản ghi #$maNV thành công";
        }
        else {
            $_SESSION['error'] = "Xóa bản ghi #$maNV thất bại";
        }

        exit();
    }
}