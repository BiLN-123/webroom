<?php
define('IN_SITE', true);
$rootpath1 = '';
require_once('libs/core1.php');
if (!$nguoithue_user) {
    redirect($homeurl ."signin1.php");
}
require_once('libs/header1.php');
?>

<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <a class="text-decoration-none" href="<?php echo $homeurl . "appuser/?m=phongtro&a=details&ma=" . $datauser['phongtro_ma'];?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Phòng Trọ</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-home text-gray-800' style="font-size: 1.5rem ;"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a class="text-decoration-none" href="<?php echo $homeurl . "appuser/?m=hoadon&a=list&ma=" . $datauser['phongtro_ma'];?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Hoá Đơn</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bxs-edit text-gray-800' style="font-size: 1.5rem ;"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <a class="text-decoration-none" href="<?php echo $homeurl . "appuser/?m=nguoithuetro&a=nguoio&ma=" . $datauser['phongtro_ma'];?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Người Ở Chung</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-male-female text-gray-800' style="font-size: 1.5rem ;"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <a class="text-decoration-none" href="#">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Tài khoản</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bxs-user-circle text-gray-800' style="font-size: 1.5rem ;"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
require_once('libs/footer1.php');
?>