<?php define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/imgs/"); ?>
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
        <h3>Thêm Mới Bài Viết</h3>
    </div>
</div>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
    [
        "tieude" => input_post('tieude'),
        "keyword" => input_post('keyword'),
        "noidung" => input_post('noidung'),
        "nguoiviet" => input_post('nguoiviet'),
        "created_at" => date('Y:m:d H:m:s')
    ];


    $error = [];
    if(input_post('tieude') == '')
    {
        $error['tieude'] = "Mời bạn nhập tiêu đề bài viết";
    }

    if(input_post('keyword') == '')
    {
        $error['keyword'] = "Mời bạn nhập mô tả của bài viết";
    }

    if(input_post('noidung') == '')
    {
        $error['noidung'] = "Mời bạn nhập nội dung cho bài viết";
    }

    if(input_post('nguoiviet') == '')
    {
        $error['nguoiviet'] = "Mời bạn nhập tác giả bài viết";
    }
    if(!isset($_FILES['hinhanh'])){
        $error['hinhanh'] = "Vui lòng thêm hình ảnh bài viết";
    }
			// error trống có nghĩa là  không có lỗi
    if(empty($error))
    {
        
        if (isset($_FILES['hinhanh']))
        {
            $file_name = $_FILES['hinhanh']['name'];
            $file_tmp  = $_FILES['hinhanh']['tmp_name'];
            $file_type = $_FILES['hinhanh']['type'];
            $file_erro = $_FILES['hinhanh']['error'];

            if ($file_erro == 0)
            {
                $part = ROOT ."";
                $data['hinhanh'] = $file_name;
            }
        }
        
        $id_insert = db_insert($DB_BAIVIET,$data);
        if($id_insert)
        {
            move_uploaded_file($file_tmp,$part.$file_name);
            echo '<div class = "alert alert-success">Thêm bài viết mới thành công<a href = "' . $homeurl . '/app/?m=baiviet&a=list" class="url">Nhấn vào đây để quay về danh sách bài viết</a></div>';
        }
        else
        {
            echo '<div class = "alert alert-danger">Thêm bài viết thất bại</div>';
        }
    }
}
?>
<div class="main-content">
    <form action="" method="POST" enctype="multipart/form-data" class="form" autocomplete="off">
        <div class="row">
            <div class="col-8 col-sm-8 col-md-8">
                <div class="form-group">
                        <div class="label">
                        Tiêu đề Bài Viết
                        </div>
                        <input type="text" class="form-control" placeholder="Tiêu đề" name="tieude">
                        <?php if(isset($error['tieude'])): ?>
			        	<p class="text-danger"> <?php echo $error['tieude'] ?> </p>	
			            <?php endif?>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="form-group">
                        <div class="label">
                        Mô Tả(Từ Khoá)
                        </div>
                        <textarea class="form-control" name="keyword" rows="4"></textarea>
                        <?php if(isset($error['keyword'])): ?>
			        	<p class="text-danger"> <?php echo $error['keyword'] ?> </p>	
			            <?php endif?>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="form-group">
                        <div class="label">
                        Hình Ảnh
                        </div>
                        <input type="file" class="form-control" name="hinhanh">
                        <?php if(isset($error['hinhanh'])): ?>
			        	<p class="text-danger"> <?php echo $error['hinhanh'] ?> </p>	
			            <?php endif?>
                        
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="form-group">
                        <div class="label">
                        Tác Giả(Người Tạo Bài Viết)
                        </div>
                        <input type="text" class="form-control" placeholder="vd: BiLN(Lê Tấn Ngọc)" name="nguoiviet">
                        <?php if(isset($error['nguoiviet'])): ?>
			        	<p class="text-danger"> <?php echo $error['nguoiviet'] ?> </p>	
			            <?php endif?>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="form-group">
                        <div class="label">
                        Nội Dung Bài Viết
                        </div>
                        <textarea class="form-control" name="noidung" rows="15"></textarea>
                        <?php if(isset($error['noidung'])): ?>
			        	<p class="text-danger"> <?php echo $error['noidung'] ?> </p>	
			            <?php endif?>
                </div>
            </div>

            <div class="col-8">
                <button class="btn btn-default btn-add" type="submit" ><i class='bx bx-plus'></i>Thêm Mới Bài Viết</button>
            </div>
        </div>
    </form>
</div>