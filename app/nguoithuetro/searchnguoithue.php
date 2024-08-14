<?php
$nguoio = new Nguoio();
$listNguoio = $nguoio->getListTong();
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
        <h3>Danh Sách Người Thuê Trọ</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-2">
            <a href="<?php echo $homeurl; ?>app/?m=nguoithuetro&a=listnguoio" class="btn btn-default bg-blue light-text" style="margin-top:-0.5%">
            <i class='bx bx-arrow-back' ></i>Quay Về</a>    
        </div>
        <div class="col-10">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-11">
                        <input name="hoten" id="hoten" type="search" class="form-control" placeholder="Tìm Kiếm (Nhập Vào Tên Người Cần Tìm)">
                    </div>
                    <div class="col-1" >
                        <button class="btn btn-default bg-blue" name="search" value="search"><i class='bx bx-search-alt'></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Danh Sách Tất Cả Người Thuê Trọ
                </div>
                <div class="box-body overflow-scroll">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã Phòng</th>
                                <th>CMND/ CCCD</th>
                                <th>Họ Tên</th>
                                <th>Quê Quán</th>
                                <th>Điện Thoại</th>
                                <th>Ngày Thuê</th>
                                <th>Vai Trò</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $error = array();
                                if(isset($_POST['search'])){
                                    $obj = new Nguoio();
                                    $tennguoio = input_post('hoten');
                                    $ten = $obj->searchnguoio($tennguoio);
                                    if(!$ten)
                                    {
                                        $error['hoten'] = 'Không tìm thấy người có tên này';
                                    }
                                    else
                                    {
                                        foreach($ten as $tten){
                                            $vaitro = $tten['vaitro'] == 0 ? '<span class = "text-success">Người Thuê Chung</span>':'<span class = "text-danger">Chủ Phòng</span>';
                                            echo ('<tr>');
                                                echo ('<td>'.$tten['phongtro_ma'].'</td>');
                                                echo ('<td>'.$tten['cmnd'].'</td>');
                                                echo ('<td>'.$tten['hoten'].'</td>');
                                                echo ('<td>'.$tten['quequan'].'</td>');
                                                echo ('<td>'.$tten['dienthoai'].'</td>');
                                                echo ('<td>'.$tten['ngaythue'].'</td>');
                                                echo ('<td>'.$vaitro.'</td>');
                                                echo ('<td>');
                                                echo('<a href="?m=nguoithuetro&a=viewnguoi&id='. $tten['cmnd'] .'" class="btn-default bg-yellow">Chi Tiết</a>');
                                                echo('</td>');
                                            echo ('</tr>');
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="name" name="hoten">
            <?php echo showError($error, 'hoten');?>
        </div>
    </div>
</div>
<script>
var url = document.querySelector('#url').value;
document.getElementById("ngoc").onchange = function(event) {
    let type = this.value;
    window.location.href = url+"app/?m=nguoithuetro&a=listnguoio&type="+type;
};
</script>
