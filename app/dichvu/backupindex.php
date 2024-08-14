<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath . 'libs/core.php');
include('header.php');
$objHoadon = new Hoadon();
$i = 1;
$objDichvu = new Dichvu();
$dataNuoc = $objHoadon->sonuoc($month, $year);
$dataDien = $objHoadon->sodien($month, $year);
$dataPhong = $objHoadon->tienphong($month,$year);
switch($do){
    case 'status':
        $objDichvu->trangthai($id);
        redirect($homeurl."/app/dichvu?month=$month&year=$year");
        break;
}
?>
<input type="hidden" value="<?php echo $month;?>" id="month">
<input type="hidden" value="<?php echo $year;?>" id="year">
<div class="header">
    <span>Tháng <?php echo $month;?> năm <?php echo $year;?></span>
    <h2>Doanh thu: <span id="doanhthu"><?php echo $objHoadon->doanhthu($month, $year); ?></span> đ</h2>
</div>
<div class="block">
    <div class="flex">
        <div class="flex-item">
            <a href="<?php echo $homeurl; ?>" class="btn btn-primary btn-sm">Quay lại</a>
            <a href="all-bill.php?month=<?php echo $month;?>&year=<?php echo $year;?>" class="btn btn-danger btn-sm">In tất cả hóa đơn</a>
        </div>
        <div class="flex-item font-blue">
            <span>Điện: <span id="sodien"><?php echo $dataDien['sodien']; ?></span> KW = <span id="tiendien"><?php echo number_format($dataDien['sotiendien']); ?></span> VND</span>
            <div class="space-height"></div>
            <span>Nước: <span id="sonuoc"><?php echo $dataNuoc['sonuoc']; ?></span> Khối = <span id="tiennuoc"><?php echo number_format($dataNuoc['sotiennuoc']); ?></span> VND</span>
        </div>
        <div class="flex-item font-blue">
            <span>Phòng đang thuê: <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => 1)); ?></span>
            <div class="space-height"></div>
            <span>Phòng trống: <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => '0')); ?></span>
        </div>
        <div class="flex-item font-blue">
            <span>Đã thu: <?php echo $objHoadon->trangthai($month,$year,1);?></span>
            <div class="space-height"></div>
            <span>Chưa thu: <?php echo $objHoadon->trangthai($month,$year,0);?></span>
        </div>
    </div>
</div>
<div class="table">
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th rowspan="2">STT</th>
                <th rowspan="2">Phòng</th>
                <th rowspan="2">Tình trạng</th>
                <th colspan="5" class="bg-warning">Điện</th>
                <th colspan="5" class="bg-success">Nước</th>
                <th rowspan="2">Tiền phòng</th>
                <th rowspan="2">Chi phí khác</th>
                <th rowspan="2">Tổng cộng</th>
                <th rowspan="2">Ghi chú</th>
                <th rowspan="2">Thao tác</th>
            </tr>
            <tr>
                <th class="bg-warning">Số cũ</th>
                <th class="bg-warning">Số mới</th>
                <th class="bg-warning">Tiêu thụ</th>
                <th class="bg-warning">Đơn giá</th>
                <th class="bg-warning">T. tiền</th>
                <th class="bg-success">Số cũ</th>
                <th class="bg-success">Số mới</th>
                <th class="bg-success">Tiêu thụ</th>
                <th class="bg-success">Đơn giá</th>
                <th class="bg-success">T. tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $list = $objDichvu->ghidien($month, $year);
            foreach ($list as $row) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['phongtro_ma']; ?></td>
                    <td class="bg-success">Đang thuê</td>
                    <td><?php echo $row['chisodiencu']; ?></td>
                    <td><?php echo $row['chisodienmoi']; ?></td>
                    <td><?php echo $row['chisodienmoi'] - $row['chisodiencu']; ?></td>
                    <td><?php echo number_format($row['giatiendien']); ?></td>
                    <td><?php echo number_format(($row['chisodienmoi'] - $row['chisodiencu']) * $row['giatiendien']); ?></td>
                    <td><?php echo $row['chisonuoccu']; ?></td>
                    <td><?php echo $row['chisonuocmoi']; ?></td>
                    <td><?php echo $row['chisonuocmoi'] - $row['chisonuoccu']; ?></td>
                    <td><?php echo number_format($row['giatiennuoc']); ?></td>
                    <td><?php echo number_format(($row['chisonuocmoi'] - $row['chisonuoccu']) * $row['giatiennuoc']); ?></td>
                    <td><?php echo number_format($row['giaphong']); ?></td>
                    <td><?php echo number_format($row['phidichvu']); ?></td>
                    <td><?php echo number_format($objHoadon->Tinhtienltn($row['hoadon_id'])); ?></td>
                    <td><?php echo $row['ghichu']; ?></td>
                    <td>
                        <a id="<?php echo $row['hoadon_id']; ?>" data-toggle="tooltip" class="btn btn-info edit">Sửa</a>
                        <a href="?do=status&month=<?php echo $month;?>&year=<?php echo $year;?>&id=<?php echo $row['hoadon_id'];?>" 
                        class="btn <?php echo ($row['trangthai'] == 0) ? 'btn-danger' : 'btn-success';?>"><?php echo ($row['trangthai'] == 0) ? 'Chưa thu' : 'Đã thu';?></a>
                        <a href="<?php echo $homeurl;?>/app/dichvu/bill.php?id=<?php echo $row['hoadon_id'];?>" class="btn btn-warning">In</a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
            <tr>
                <td colspan="3" class="bg-danger bold light-text">Tổng cộng</td>
                <td colspan="5" class="font-red"><?php echo number_format($dataDien['sotiendien']); ?></td>
                <td colspan="5" class="font-red"><?php echo number_format($dataNuoc['sotiennuoc']); ?></td>
                <td class="font-red"><?php echo $dataPhong['tongtien'];?></td>
                <td class="font-red"><?php echo $dataPhong['dichvu'];?></td>
                <td class="font-red"><?php echo $objHoadon->doanhthu($month, $year); ?></td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var actions = $("table td:last-child").html();
        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            var id = $(this).attr("id");
            $(this).parents("tr").find("td:not(:last-child)").each(function(i) {
                if (i == '3') {
                    var idname = 'sodiencu' + id;
                } else if (i == '4') {
                    var idname = 'sodienmoi' + id;
                } else if (i == '6') {
                    var idname = 'giatiendien' + id;
                } else if (i == '8') {
                    var idname = 'sonuoccu' + id;
                } else if (i == '9') {
                    var idname = 'sonuocmoi' + id;
                } else if (i == '11') {
                    var idname = 'giatiennuoc' + id;
                } else if (i == '13') {
                    var idname = 'tienphong' + id;
                } else if (i == '14') {
                    var idname = 'dichvu' + id;
                } else if (i == '16') {
                    var idname = 'ghichu' + id;
                } else {}
                if (i != '0' && i != '1' && i != '2' && i != '5' && i != '7' && i != '10' && i != '12' && i != '15') {
                    $(this).html('<input type="text" name="updaterec" id="' + idname + '" class="form-control" value="' + $(this).text() + '">');
                }

            });
            $(this).html("Lưu");
            $(this).parents("tr").find(".edit").removeClass("edit").addClass("update");
        });
        // update rec row on edit button click
        $(document).on("click", ".update", function() {
            var id = $(this).attr("id");
            var sodiencu = $("#sodiencu" + id).val();
            var sodienmoi = $("#sodienmoi" + id).val();
            var giatiendien = $("#giatiendien" + id).val();
            var sonuoccu = $("#sonuoccu" + id).val();
            var sonuocmoi = $("#sonuocmoi" + id).val();
            var giatiennuoc = $("#giatiennuoc" + id).val();
            var tienphong = $("#tienphong" + id).val();
            var dichvu = $("#dichvu" + id).val();
            var ghichu = $("#ghichu" + id).val();
            $.ajax({
                url: 'save-ajax.php',
                cache: false,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    sodiencu: sodiencu,
                    sodienmoi: sodienmoi,
                    giatiendien: giatiendien,
                    sonuoccu: sonuoccu,
                    sonuocmoi: sonuocmoi,
                    giatiennuoc: giatiennuoc,
                    tienphong: tienphong,
                    dichvu: dichvu,
                    ghichu: ghichu,
                    month: $("#month").val(),
                    year: $("#year").val()
                },
                success: (data) => {
                    console.log(data);
                    if (data) {
                        $(this).parents("tr").find("td:not(:last-child)").each(function(i) {
                            if (i == '3') {
                                $(this).html(data.chisodiencu);
                            } else if (i == '4') {
                                $(this).html(data.chisodienmoi);
                            }  else if (i == '5') {
                                $(this).html(data.dientieuthu);
                            } else if (i == '6') {
                                $(this).html(data.giatiendien);
                            } else if (i == '7') {
                                $(this).html(data.tongtiendien);
                            } else if (i == '8') {
                                $(this).html(data.chisonuoccu);
                            } else if (i == '9') {
                                $(this).html(data.chisonuocmoi);
                            }  else if (i == '10') {
                                $(this).html(data.nuoctieuthu);
                            } else if (i == '11') {
                                $(this).html(data.giatiennuoc);
                            } else if (i == '12') {
                                $(this).html(data.tongtiennuoc);
                            } else if (i == '13') {
                                $(this).html(data.giaphong);
                            } else if (i == '14') {
                                $(this).html(data.phidichvu);
                            } else if (i == '15') {
                                $(this).html(data.tongcong);
                            } else if (i == '16') {
                                $(this).html(data.ghichu);
                            }
                        });
                        $(this).html("Sửa");
                        $(this).parents("tr").find(".update").removeClass("update").addClass("edit");
                        $("#sonuoc").html(data.sonuoc);
                        $("#sodien").html(data.sodien);
                        $("#tiendien").html(data.tiendien);
                        $("#tiennuoc").html(data.tiennuoc);
                        $("#doanhthu").html(data.doanhthu);
                    }
                },
                error: function() {
                    alert("Có lỗi xảy ra khi lưu dữ liệu..");
                }
            });
        });
    });
</script>
<?php
include('footer.php');
?>