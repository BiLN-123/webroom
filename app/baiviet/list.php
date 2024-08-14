<?php
$limit = 5;
$start = abs(intval($limit*$page)-$limit);
$baiviet = new DSBaiviet();
$listbaiviet = $baiviet->getList();
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        BÀI VIẾT
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Bài Viết</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12" >
            <a href="<?php echo $homeurl; ?>app/?m=baiviet&a=add" class="btn btn-default bg-purple light-text">
            <i class='bx bx-plus-circle'></i>  Tạo Bài Viết Mới</a>    
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body overflow-scroll">
                    <table class="table table-bordered table-hover" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tên Bài Viết</th>
                                <th>Từ Khoá</th>
                                <th>Người Viết</th>
                                <th>Hình Ảnh</th>
                                <th>Thao Tác</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($listbaiviet as $item){
                                //$trangthai = $LAccount['role'] == 0 ? '<span class = "text-success">Acitve</span>':'<span class = "text-danger">Unactive</span>';
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td  style="width: 23%;"><?php echo $item['tieude']; ?></td>
                                    <td style="width: 29%;"><?php echo $item['keyword']; ?></td>
                                    <td><?php echo $item['nguoiviet']; ?></td>
                                    <td>
                                        <img src="<?php echo uploads() ?><?php  echo $item['hinhanh'] ?>" width="80px" height="80px" alt="">    
                                    </td>
                                    <td>
                                        <a href="?m=baiviet&a=edit&id=<?php echo $item['id'];?>" class="btn-default bg-yellow">Sửa</a>
                                        <a href="<?php echo $homeurl;?>/app/baiviet/delete.php?id=<?php echo $item['id'];?>" class="btn-default bg-red" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $homeurl;?>/app/baiviet/active.php?id=<?php echo $item['id'];?>" class="btn-default <?php echo ($item['status'] == 1) ? 'bg-purple' : 'bg-green';?>"> <?php echo ($item['status'] == 0) ? 'Active' : 'Unactive';?> </a>
                                    </td>
                                </tr>
                            <?php
                            $i++;
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
                $demtrang = db_count($DB_BAIVIET, 'id');
                $config = [
                    'total' => $demtrang,
                    'querys' => $id,
                    'limit' => $limit,
                    'url' => 'app/?m=baiviet&a=list'
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
            if(count($listbaiviet) == 0){
                echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
            }
            ?>
    </div>
</div>