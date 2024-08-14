<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$accountnguoithue = new Selectuser();
$listAccount = $accountnguoithue->getListAC();

switch ($do){
    case 'status':
        $accountnguoithue ->active($id);
        redirect(homeurl(). "/app/?m=accountnguoithue&a=listaccount");
        break;
}
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        TÀI KHOẢN NGƯỜI DÙNG
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Tài Khoản Người Dùng</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12" >
            <a href="<?php echo $homeurl; ?>app/?m=accountnguoithue&a=addaccount" class="btn btn-default bg-blue light-text">
            <i class='bx bx-plus-circle'></i>  Tạo Tài Khoản Người Dùng Mới</a>    
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Danh Sách Tài Khoản
                </div>
                <div class="box-body overflow-scroll">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User Name</th>
                                <th>Mã Phòng Trọ</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($listAccount as $LAccount){
                                //$trangthai = $LAccount['role'] == 0 ? '<span class = "text-success">Acitve</span>':'<span class = "text-danger">Unactive</span>';
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $LAccount['email']; ?></td>
                                    <td><?php echo $LAccount['phongtro_ma']; ?></td>
                                    <td>
                                        <a href="<?php echo $homeurl;?>/app/accountnguoithue/edit.php?id=<?php echo $LAccount['nguoithue_id'];?>" class="btn-default <?php echo ($LAccount['role'] == 1) ? 'bg-purple' : 'bg-green';?>"> <?php echo ($LAccount['role'] == 0) ? 'Active' : 'Unactive';?> </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $homeurl;?>/app/accountnguoithue/delete.php?id=<?php echo $LAccount['nguoithue_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')" class="btn-default bg-red"> Xoá </a>
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
</div>