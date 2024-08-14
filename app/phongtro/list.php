<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$phongtro = new Phongtro();
$ListPhongtro = $phongtro->getList($type);
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        PHÒNG TRỌ
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Phòng Trọ</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <a href="<?php echo $homeurl; ?>/app/?m=phongtro&a=create" class="btn-default btn-add"><i class='bx bx-plus-circle'></i> Tạo mới</a>
        </div>
        <div class="col-12">
            <select name="ngoc" id="ngoc" class="form-control">
                <option value="">Vui lòng chọn</option>
                <option value="0" <?php echo ($type == 0) ? 'selected' : ''?>>TẤT CẢ</option>
                <option value="2" <?php echo ($type == 2) ? 'selected' : ''?>>Đang thuê</option>
                <option value="1" <?php echo ($type == 1) ? 'selected' : ''?>>Phòng trống</option>
            </select>
        </div>
        <?php
        foreach ($ListPhongtro as $phong) {
            $trangthai = $phong['trangthai'] == 0 ? '<span class="text-danger">Trống</span>' : '<span class="text-success">Đang thuê</span>';
        ?>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="phongtro">
                    <h3 class="phongtro_name">
                        <?php echo $phong['tenphongtro']; ?>
                    </h3>
                    <?php echo $trangthai; ?>
                    <a href="<?php echo $homeurl . "/app/?m=phongtro&a=details&ma=" . $phong['phongtro_ma']; ?>" class="phongtro_img"><img src="<?php echo $homeurl; ?>/images/home.png" alt=""></a>
                    <div class="phongtro_operation">
                        <a href="<?php echo $homeurl . "/app/?m=phongtro&a=details&ma=" . $phong['phongtro_ma']; ?>" class="btn-default bg-blue"><i class='bx bx-info-circle'></i> Chi tiết</a>
                    </div>
                </div>
            </div>
            <!-- div -->
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $demtrang = db_count($DB_PHONGTRO, 'phongtro_ma');
            $config = [
                'total' => $demtrang,
                'querys' => $id,
                'limit' => $limit,
                'url' => 'app/?m=phongtro&a=list&type='.$type.''
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
        if(count($ListPhongtro) == 0){
            echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
        }
        ?>
    </div>
</div>
<script>
var url = document.querySelector('#url').value;
document.getElementById("ngoc").onchange = function(event) {
    let type = this.value;
    window.location.href = url+"/app/?m=phongtro&a=list&type="+type;
};
</script>