<?php
define('IN_SITE', true);
$rootpath = '';
require_once('libs/core.php');
if (!$user_id) {
    redirect($homeurl ."signin.php");
}
require_once('libs/header.php');
$hoadon = new Hoadon();
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        THỐNG KÊ
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Thống Kê</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-3 col-md-6 col-sm-12">
            <a href="app/?m=phongtro&a=list" style="display:block;">
                <div class="box box-hover bg-purple">
                    <div class="counter">
                        <div class="counter-title">
                            Tổng phòng trọ
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php echo db_count($DB_PHONGTRO, 'phongtro_ma'); ?>
                            </div>
                            <i class='bx bxs-home'></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <a href="app/?m=phongtro&a=list&type=2" style="display:block;">
                <div class="box box-hover bg-yellow">
                    <div class="counter">
                        <div class="counter-title">
                            Phòng đang thuê
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => 1)); ?>
                            </div>
                            <i class='bx bxs-home-smile'></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <a href="app/?m=phongtro&a=list&type=1" style="display:block;">
                <div class="box box-hover bg-red">
                    <div class="counter">
                        <div class="counter-title">
                            Phòng trống
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => '0')); ?>
                            </div>
                            <i class='bx bx-loader-circle'></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <div class="box box-hover bg-blue">
                <div class="counter">
                    <div class="counter-title">
                        Quản trị
                    </div>
                    <div class="counter-info">
                        <div class="counter-count">
                            <?php echo db_count($DB_ACCOUNT, 'account_id'); ?>
                        </div>
                        <i class='bx bx-user'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <a href="app/?m=nguoithuetro&a=listnguoio" style="display:block;">
                <div class="box box-hover bg-brown">
                    <div class="counter">
                        <div class="counter-title">
                            Người Thuê Trọ
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php echo db_count($DB_PHONGTRO_PEOPLE, 'cmnd');?>
                            </div>
                            <i class='bx bx-male-female'></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <div class="box box-hover bg-blue">
                <div class="counter">
                    <div class="counter-title">
                        Tài Khoản Người Dùng
                    </div>
                    <div class="counter-info">
                        <div class="counter-count">
                            <?php echo db_count($DB_ACCOUNT_USER, 'nguoithue_id'); ?>
                        </div>
                        <i class='bx bxs-user-account'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <div class="box box-hover bg-green">
                <div class="counter">
                    <div class="counter-title">
                        Tổng doanh thu
                    </div>
                    <div class="counter-info">
                        <div class="counter-count">
                            <?php echo $hoadon->tongdoanhthu(); ?>Đ
                        </div>
                        <i class='bx bx-line-chart'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-6 col-sm-12">
            <div class="box box-hover bg-yellow">
                <div class="counter">
                    <div class="counter-title">
                        Bài Viết
                    </div>
                    <div class="counter-info">
                        <div class="counter-count">
                            <?php 
                            echo db_count($DB_BAIVIET, 'id');
                            ?>
                        </div>
                        <i class='bx bx-book-content'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="box f-height">
                <div class="box-header">
                    Biểu Đồ Thống Kê
                </div>
                <div class="box-body">
                    <div id="customer-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$hoadon = new Hoadon();
$doanhthu = $hoadon->thongke1();
$label = array();
$dataline = array();
foreach ($doanhthu as $tk) {
    $label[] = "T" . $tk['month'] . " năm " . $tk['year'];
    $dataline[] = str_replace(",", "", $hoadon->doanhthu($tk['month'], $tk['year']));
}
$label = array_reverse($label);
$dataline = array_reverse($dataline);
?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    var label = <?php echo json_encode($label); ?>;
    var dataline = <?php echo json_encode($dataline); ?>;
    console.log(label);
    console.log(dataline);
    let customer_options = {
        series: [{
            name: "Doanh thu",
            data: dataline
        }, ],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return addCommas(value) + "VND";
                }
            },
        },
        colors: ['#2980b9'],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: label,
        },
        legend: {
            position: 'top'
        },
        theme: {
            mode: 'light'
        },
        
    }
    let customer_chart = new ApexCharts(document.querySelector("#customer-chart"), customer_options)
    customer_chart.render();
</script>
<?php
require_once('libs/footer.php');
?>