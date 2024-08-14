<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="/images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="<?php echo $homeurl; ?>/css/grid.css">
    <link rel="stylesheet" href="<?php echo $homeurl; ?>/css/app.css">
    <link rel="stylesheet" href="<?php echo $homeurl; ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo $homeurl; ?>/css/1file.css">
    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img class="anhbiabg " src="<?php echo $homeurl; ?>/images/nhatro.png" alt="">
            <!-- <img src="./images/img-login.jpg" alt=""> -->
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <div class="sidebar-user-name">
                    <h4>Xin Chào Admin: <?php echo $datauser['fullname']; ?></h4>
                </div>
            </div>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo $homeurl; ?>" class="<?php echo ($m == null && $a == null) ? 'active' : ''; ?>">
                    <i class="bx bx-category"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-building-house' ></i>
                    <span>Nhà Trọ</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="<?php echo $homeurl; ?>app/?m=phongtro&a=list" class="<?php echo ($m == "phongtro" && $a == "list") ? 'active' : ''; ?>">
                            <i class='bx bx-home'></i>Phòng trọ
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $homeurl; ?>app/?m=phongtro&a=liststt" class="<?php echo ($m == "phongtro" && $a == "liststt") ? 'active' : ''; ?>">
                            <i class='bx bx-info-square'></i>Status
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $homeurl; ?>app/?m=nguoithuetro&a=listnguoio" class="<?php echo ($m == 'nguoithuetro' && $a == 'listnguoio') ? 'active' : ''; ?>">
                    <i class='bx bx-body'></i>
                    <span>Người Thuê Trọ</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bxs-dollar-circle'></i>
                    <span>Hoá Đơn</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="<?php echo $homeurl; ?>app/?m=dichvu&a=ghiphieu&year=<?php echo date("Y");?>" class="<?php echo ($m == "dichvu" && $a == "ghiphieu") ? 'active' : ''; ?>">
                            <i class='bx bxs-pencil'></i>Tạo Hoá Đơn
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $homeurl; ?>app/?m=hoadon&a=all" class="<?php echo ($m == "hoadon" && $a == "all") ? 'active' : ''; ?>">
                            <i class='bx bxs-detail'></i>Tổng Hoá Đơn
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $homeurl; ?>app/?m=hoadon&a=thuhoadon" class="<?php echo ($m == "hoadon" && $a == "thuhoadon") ? 'active' : ''; ?>">
                            <i class='bx bx-book-reader' ></i>Thu Hóa Đơn
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $homeurl;?>app/?m=thongke&a=doanhthu" class="<?php echo ($m == "thongke" && $a == "doanhthu") ? 'active' : ''; ?>">
                    <i class="bx bx-dollar"></i>
                    <span>Thống Kê Doanh Thu</span>
                </a>
            </li>
            <!-- <li>
                <a href="<?php echo $homeurl; ?>app/?m=nhacthutien&a=index" class="<?php echo ($m == "nhacthutien" && $a == "index") ? 'active' : ''; ?>">
                    <i class='bx bxs-alarm-add'></i>
                    <span>Nhắc thu tiền <?php echo (Nhacnho::count() > 0) ? '<span class="badge">'.Nhacnho::count().'</span>' : '';?> </span>
                </a>
            </li> -->
            <li>
                <a href="<?php echo $homeurl;?>app/?m=accountnguoithue&a=listaccount" class="<?php echo ($m == "accountnguoithue" && $a == "listaccount") ? 'active' : ''; ?>">
                    <i class='bx bx-group'></i>
                    <span>Tài Khoản Người Dùng</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $homeurl;?>app/?m=hopdong&a=list" class="<?php echo ($m == "hopdong" && $a == "list") ? 'active' : ''; ?>">
                    <i class='bx bx-file'></i>
                    <span>Hợp Đồng</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $homeurl;?>app/?m=baiviet&a=list" class="<?php echo ($m == "baiviet" && $a == "list") ? 'active' : ''; ?>">
                    <i class='bx bx-book-open'></i>
                    <span>Bài Viết</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $homeurl; ?>app/?m=setting&a=diennuoc" class="<?php echo ($m == "setting" && $a == "diennuoc") ? 'active' : ''; ?>">
                    <i class='bx bx-cog'></i>
                    <span>Thiết Lập Dịch Vụ</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $homeurl; ?>/signout.php">
                <i class='bx bx-log-out bx-flip-horizontal'></i> 
                <span>Thoát</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
    <input type="hidden" id="url" name="url" value="<?php echo $homeurl;?>">
    <!-- MAIN CONTENT -->
    <div class="main">