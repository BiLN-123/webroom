<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$nguoio = new Nguoio();
$listNguoio = $nguoio->getListTT($type);
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
        <div class="col-10">
            <select name="ngoc" id="ngoc" class="form-control">
                <option value="">Vui lòng chọn</option>
                <option value="0" <?php echo ($type == 0) ? 'selected' : ''?>>TẤT CẢ</option>
                <option value="2" <?php echo ($type == 2) ? 'selected' : ''?>>CHỦ PHÒNG</option>
                <option value="1" <?php echo ($type == 1) ? 'selected' : ''?>>NGƯỜI THUÊ CHUNG</option>
            </select>
        </div>
        <div class="col-2" >
            <a href="<?php echo $homeurl; ?>app/?m=nguoithuetro&a=searchnguoithue" class="btn btn-default bg-blue light-text">
            <i class='bx bx-search-alt'></i>Tìm Kiếm</a>    
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
                            foreach ($listNguoio as $LNguoio){
                                $vaitro = $LNguoio['vaitro'] == 0 ? '<span class = "text-success">Người Thuê Chung</span>':'<span class = "text-danger">Chủ Phòng</span>';
                            ?>
                                <tr>
                                    <td><?php echo $LNguoio['phongtro_ma']; ?></td>
                                    <td><?php echo $LNguoio['cmnd']; ?></td>
                                    <td><?php echo $LNguoio['hoten']; ?></td>
                                    <td><?php echo $LNguoio['quequan']; ?></td>
                                    <td><?php echo $LNguoio['dienthoai']; ?></td>
                                    <td><?php echo $LNguoio['ngaythue']; ?></td>
                                    <td><?php echo $vaitro; ?></td>
                                    <td>
                                        <a href="?m=nguoithuetro&a=viewnguoi&id=<?php echo $LNguoio['cmnd'];?>" class="btn-default bg-yellow">Chi Tiết</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <?php
                $demtrang = db_count($DB_PHONGTRO_PEOPLE, 'cmnd');
                $config = [
                    'total' => $demtrang,
                    'querys' => $id,
                    'limit' => $limit,
                    'url' => 'app/?m=nguoithuetro&a=listnguoio&type='.$type.''
                ];
                $page1 = new Pagination($config);
                ?>
                <?php
                if ($demtrang > $limit) {
                    echo '<div><center><ul class="pagination">' . $page1->getPagination() . '</ul></center></div>';
                }
                ?>
            </div>
            <?php
            if(count($listNguoio) == 0){
                echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
            }
            ?>
    </div>
</div>
<script>
var url = document.querySelector('#url').value;
document.getElementById("ngoc").onchange = function(event) {
    let type = this.value;
    window.location.href = url+"app/?m=nguoithuetro&a=listnguoio&type="+type;
};
</script>
