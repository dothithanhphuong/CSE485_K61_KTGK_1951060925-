<?php
    // require_once 'view/commons/message.php';
?>

<button>
    <a href="index.php?controller=nhanvien&action=add">
        Thêm
    </a>
</button>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Mã nhân viên</th>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Phòng ban</th>
        <th>Lương</th>
        <th>Ngày vào làm</th>
    </tr>
    <?php if (!empty($nhanvien)): ?>
        <?php foreach ($nhanviens AS $nhanvien) : ?>
            <tr>
                <td><?php echo $nhanvien['maNV'] ?></td>
                <td><?php echo $nhanvien['hovaten'] ?></td>
                <td><?php echo $nhanvien['chucvu'] ?></td>
                <td><?php echo $nhanvien['phongban'] ?></td>
                <td><?php echo $nhanvien['luong'] ?></td>
                <td><?php echo $nhanvien['ngayvaolam'] ?></td>
                <td>
                    <?php
                    
                    $urlUpdate =
                        "index.php?controller=nhanvienien&action=update&maNV=" . $nhanvien['maNV'];
                    $urlDelete =
                        "index.php?controller=nhanvien&action=delete&maNV=" . $nhanvien['maNV'];
                       
                    ?>
                    
                    <a href="<?php echo $urlUpdate?>">Sửa</a> &nbsp;
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                       href="<?php echo $urlDelete?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>