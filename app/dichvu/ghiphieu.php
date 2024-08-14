<?php
$objDichvu = new Dichvu();
$objDichvu->ghithangmoi();
switch($do){
    case 'orderaferthismonth':
        $objDichvu->ghithangsau();
        break;
    case 'oderishere';
        $objDichvu->ghithangmoi();
        break;
    default;
}
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        <i class='bx bx-book-reader'></i> TẠO HÓA ĐƠN
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Ghi Điện Nước</h3>
    </div>
</div>
<div class="main-content">
    <div class="box">
        <div class="box-header">Ghi Phiếu Tháng</div>
        <div class="box-body">
            <div class="form-group">
                <div class="flex">
                    <div class="flex-item">
                        <span>Tháng</span>
                        <select name="month" id="month">
                            <?php
                            foreach ($objDichvu->getMonthofYear($year) as $m) {
                            ?>
                                <option value="<?php echo $m['month']; ?>"><?php echo $m['month']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex-item">
                        <span>Năm</span>
                        <select name="year" id="year">
                            <?php
                            foreach ($objDichvu->getListYears() as $y) {
                            ?>
                                <option value="<?php echo $y['year']; ?>" <?php echo ($year == $y['year']) ? 'selected' : '';?>><?php echo $y['year']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="space-height"></div>
                <div class="row center">
                    <button class="btn-default btn-primary bg-red" id="select">Ghi Phiếu Cho Tháng <i class='bx bxs-edit-alt'></i></button>
                </div>
            </div>
            <br>
            <br>
            <div class="flex-end">
                <a onclick="return confirm('Bạn có chắc muốn tạo đơn cho tháng <?php echo date('m')+1;?> không?');" href="<?php echo $homeurl;?>/app/?m=dichvu&a=ghiphieu&do=orderaferthismonth" class="btn-default btn-primary bg-blue">Tạo hóa đơn tháng sau</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var button = document.querySelector('#select');
        button.addEventListener('click', (e) => {
            var month = $("#month").val();
            var year = $("#year").val();
            var url = $("#url").val();
            window.location.href = url + "/app/dichvu/?month=" + month + "&year=" + year;
        });

        // change year
        $('#year').on('change', function() {
            var year = this.value;
            var url = $("#url").val();
            window.location.href = url + "/app/?m=dichvu&a=ghiphieu&year=" + year;
        });
    });
</script>