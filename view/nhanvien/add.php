<h1>
    Thêm mới nhân viên
</h1>

<!--</form>-->
<div style="color: red">
    <?php echo $error; ?>
</div>
<form method="post" action="" style = "display:flex;flex-flow:column;">
    <span>Mã Nhân viên</span>
    <input type="text" name="maNV" value="" style = "width:500px"/>
    <span>Họ và tên<noscript></noscript></span>
    <input type="text" name="hovaten" value="" style = "width:500px"/>
    <span>Chức vụ</span>
    <input type="text" name="chucvu" value=""style = "width:500px" />
    <span>Phòng ban</span>
    <input type="text" name="phongban" value="" style = "width:500px"/>
    <span>Lương</span>
    <input type="text" name="luong" value="" style = "width:500px"/>
    <span>Ngày vào làm</span>
    <input type="date" name="ngayvaolam" value="" style = "width:500px"/>
    <br />
    <input type="submit" name="submit" value="Save" style = "width:200px"/>
</form>