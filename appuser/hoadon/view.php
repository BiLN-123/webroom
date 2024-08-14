<?php
$obj = new Hoadon();
$hoadon = $obj->getRow($id);
if (!$hoadon) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Hóa đơn này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objPhong = new Phongtro();
$phongtro = $objPhong->getRow($hoadon['phongtro_ma']);
$sonuocdung = $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'];
$sodiendung = $hoadon['chisodienmoi'] - $hoadon['chisodiencu'];
$tongtienNuoc = ($sonuocdung * $hoadon['giatiennuoc']);
$tongtienDien = ($sodiendung * $hoadon['giatiendien']);
$tongthanhtoan = $tongtienNuoc + $tongtienDien + $hoadon['giaphong'] + $hoadon['phidichvu'];
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Hoá Đơn Phòng <?php echo $phongtro['phongtro_ma']; ?></h1>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="mb-3"><h4 class="text-danger"><b><i class='bx bx-error' ></i> CHÚ Ý: Vui Lòng Đóng Tiền Từ Ngày 15 - 20 tháng <?php echo date("m"); ?> năm <?php echo date("Y"); ?> để hoá đơn của tháng được cập nhật đúng nhất</b></h4></div>
                    <div class="box-header center"><h4>Hoá Đơn Tháng <?php echo date("m, Y",strtotime($hoadon['ngaytao']));?></h4>
                    <div class="box-body">
                        <table class="table table-success table-striped overflow-scroll">
                            <tr>
                                <td>Mã phòng</td>
                                <td class="text-danger nm-text"><?php echo $phongtro['phongtro_ma']; ?> (<?php echo $phongtro['tenphongtro']; ?>)</td>
                            </tr>
                            <tr>
                                <td>Chỉ số điện tháng trước:
                                    <span class="bold"><?php echo number_format($hoadon['chisodiencu']); ?></span>
                                </td>
                                <td>Chỉ số điện tháng này:
                                    <span class="bold"><?php echo number_format($hoadon['chisodienmoi']); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Chỉ số nước tháng trước:
                                    <span class="bold"><?php echo number_format($hoadon['chisonuoccu']); ?></span>
                                </td>
                                <td>Chỉ số nước tháng này:
                                    <span class="bold"><?php echo number_format($hoadon['chisonuocmoi']); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nước dùng tháng này</td>
                                <td class=""><?php echo $sonuocdung; ?> Khối x <?php echo number_format($hoadon['giatiennuoc']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Điện dùng tháng này</td>
                                <td class=""><?php echo $sodiendung; ?> Kí x <?php echo number_format($hoadon['giatiendien']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tiền điện</td>
                                <td class=""><?php echo number_format($tongtienDien); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tiền nước</td>
                                <td class=""><?php echo number_format($tongtienNuoc); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tiền phòng</td>
                                <td class=""><?php echo number_format($hoadon['giaphong']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tiền Rác</td>
                                <td class=""><?php echo number_format($hoadon['giatienrac']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Chi phí khác</td>
                                <td class=""><?php echo number_format($hoadon['phidichvu']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tiền nợ</td>
                                <td class=""><?php echo number_format($hoadon['tienno']); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Tổng số tiền</td>
                                <td class="bold"><?php echo number_format($tongthanhtoan); ?> VND</td>
                            </tr>
                            <tr>
                                <td>Ghi chú</td>
                                <td class=""><?php echo $hoadon['ghichu']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Thanh Toán Hoá Đơn</button>
            <!--         fdlkgmflkgmblgknonmpff-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="d-flex justify-content-start"><h4 class="modal-title" id="myModalLabel">
                                THANH TOÁN
                            </h4></div>
                            <div class=" d-flex justify-content-end mt-1"><button type="button" class="close " data-dismiss="modal" aria-hidden="true">
                            <i class='bx bx-x-circle'></i>
                            </button></div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#Login" data-toggle="tab">Chuyển Khoản</a></li>
                                        <div>ㅤㅤㅤ</div>
                                        <li><a href="#Registration" data-toggle="tab">Ví Điện Tử (MoMo)</a></li>
                                        <div>ㅤㅤㅤ</div>
                                        <li><a href="#zlpay" data-toggle="tab">Ví Điện Tử (ZaloPay)</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="Login">
                                            <form role="form" class="form-horizontal">
                                                <div class="form-group row d-flex">
                                                    <div class="col-sm-6 col-md-4">
                                                        <br />
                                                        <div class="clear">
                                                            <div style="float: left; margin: 2px 10px 30px 0;">
                                                                <img class="img-thumbnail" src="<?php echo $homeurl; ?>/images/NH/VCB.jpeg"/>
                                                            </div>
                                                            <div style="float: left;">
                                                                <strong class="text-success">VIETCOMBANK</strong><br />
                                                                0261003476305<br />
                                                                Lê Tấn Ngọc
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <br />
                                                        <div class="clear">
                                                            <div style="float: left; margin: 2px 10px 30px 0;">
                                                                <img class="img-thumbnail" src="<?php echo $homeurl; ?>/images/NH/MB.png"/>
                                                            </div>
                                                            <div style="float: left;">
                                                                <strong class="text-success">MB Bank</strong><br />
                                                                1616927042000<br />
                                                                Lê Tấn Ngọc
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <br />
                                                        <div class="clear">
                                                            <div style="float: left; margin: 2px 10px 30px 0;">
                                                                <img class="img-thumbnail" src="<?php echo $homeurl; ?>/images/NH/VP.png"/>
                                                            </div>
                                                            <div style="float: left;">
                                                                <strong class="text-success">VP Bank</strong><br />
                                                                0937058455<br />
                                                                Lê Tấn Ngọc
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <h5 class="text-primary"><strong>Vui Lòng Kiếm Tra Kỹ Nội Dung Trước Khi Chuyển Khoản Để Tránh Xảy Ra Sai Xót!</strong></h5>
                                                        <h6 class="mt-3">Liên hệ với chủ nhà trọ hoặc gọi: 0937xxx455 để được hỗ trợ.</h6>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="Registration">
                                            <form role="form" class="form-horizontal">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <br />
                                                        <div class="clear">
                                                            <div style="float: left; margin: 2px 10px 30px 0;">
                                                                <img class="img-thumbnail" src="<?php echo $homeurl; ?>/images/ViDT/momo.png"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div style="float: left;margin-top: 40%; margin-left: 20%;">
                                                            <h5><strong class="text-success">MoMo</strong></h5>
                                                            0937058455<br />
                                                            Lê Tấn Ngọc
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--zalopayyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy-->
                                        <div class="tab-pane" id="zlpay">
                                            <form role="form" class="form-horizontal">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <br />
                                                        <div class="clear">
                                                            <div style="float: left; margin: 2px 10px 30px 0;">
                                                                <img class="img-thumbnail" src="<?php echo $homeurl; ?>/images/ViDT/ZaloPay.png"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" col-sm-6 col-md-6">
                                                        <div style="float: left;margin-top: 40%; margin-left: 20%;">
                                                            <h5><strong class="text-success">ZaloPay</strong></h5>
                                                            0937058455<br />
                                                            Lê Tấn Ngọc
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div id="OR" class="hidden-xs">
                                        +
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row text-center sign-with">
                                        <div class="col-md-12">
                                            <h4 class="text-dark">Nội Dung Chuyển Khoản Bắt Buộc:</h4>
                                        </div>
                                        <div class="col-md-12 text-danger">
                                            <span>Phòng 01</span>
                                            <p>Chuyển tiền tháng: <?php echo date ("m");?> năm <?php echo date ("Y");?>
                                            <br>Số tiền nợ: 4xxx(nếu có)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    tr td{
        color: black;
    }
    .img-thumbnail{
        width: 100%;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .nav-tabs {
    margin-bottom: 15px;
}
    .sign-with {
        margin-top: 25px;
        padding: 20px;
    }
    div#OR {
        height: 30px;
        width: 30px;
        border: 1px solid #C2C2C2;
        border-radius: 50%;
        font-weight: bold;
        line-height: 28px;
        text-align: center;
        font-size: 12px;
        float: right;
        position: absolute;
        right: -16px;
        top: 40%;
        z-index: 1;
        background: #DFDFDF;
    }
</style>
<script>
    $('#myModal').modal('show');
</script>