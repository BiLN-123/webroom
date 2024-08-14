<?php
$obj = new Nguoio();
$nguoio = $obj->getRow($id);
if(!$nguoio){
    echo ('<div class= "alert alert-danger">Thông tin người thuê không tồn tại</div>');
    exit;
}
$objphong = new Phongtro();
$phongtro = $objphong->getRow($nguoio['phongtro_ma']);

?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        NGƯỜI THUÊ TRỌ
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Xem Thông Tin Người Ở - (<?php echo($nguoio['hoten'])?>)</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-6">
            <a href="?m=nguoithuetro&a=listnguoio" class="btn btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở Lại Danh Sách</a>
        </div>
        <div class="col-6">
        <a href="?m=nguoithuetro&a=suanguoio&id=<?php echo $nguoio['cmnd'];?>" class="btn btn-default bg-yellow"><i class='bx bxs-edit-alt' ></i>Sửa Người Ở</a>
        </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header center">Thông Tin Người Ở Trọ - <?php echo $nguoio['hoten']; ?></div>
                <div class="box-body">
                    <table class="table overflow-scroll">
                        <tr>
                            <td >Mã Phòng:ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</td>
                            <td class="text-danger nm-text"><?php echo $phongtro['phongtro_ma'];?> ( <?php echo $phongtro['tenphongtro'];?> )ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</td>
                        </tr>
                        <tr>
                            <td>CMND/ CCCD:</td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['cmnd'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Họ Tên: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['hoten'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Năm Sinh: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['namsinh'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Quê Quán: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['quequan'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nghề Nghiệp: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['nghenghiep'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Điện Thoại: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['dienthoai'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày Thuê: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['ngaythue'];?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Thông Tin: </td>
                            <td>
                                <span class="bold">
                                    <?php echo $nguoio['khac'];?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>