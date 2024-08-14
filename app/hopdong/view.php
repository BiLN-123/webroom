<?php
$objhopdong = new Hopdong();
$hopdong = $objhopdong->getRow($id);

$objPhong = new Phongtro();
$phongtro = $objPhong->getRow($hopdong['phongtro_ma']);

$objSetting = new Setting();
$st = $objSetting->getRow();
?>
<div class="original_form"><div class="Section0">
<div>
<p>&nbsp;</p>
</div>
<p style="text-align:center"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p>
<p style="text-align:center">Độc lập – Tự do – Hạnh phúc</p>
<p style="text-align:center">&nbsp;</p>
<p style="text-align:center"><strong>HỢP ĐỒNG THUÊ PHÒNG TRỌ</strong></p>
<p>&nbsp;</p>
<div class="container" style="margin-left: 25%; margin-right:25%">
    <p class="pp" style="text-align:justify">Hôm nay ngày <?php echo date('d/m/Y',strtotime($hopdong['ngaythue'])); ?> ; tại địa chỉ: <?php echo $hopdong['diachithue'];?> &nbsp;</p>
    <p class="pp" style="text-align:justify"><strong>Chúng tôi gồm:</strong></p>
    <p class="pp" style="text-align:justify">1.Đại diện bên cho thuê phòng trọ (Bên A):</p>
    <p class="pp" style="text-align:justify">Ông/bà: <?php echo $hopdong['tenA'] ?> . Sinh ngày: <?php echo $hopdong['ngaysinhA'] ?> .</p>
    <p class="pp" style="text-align:justify">Nơi đăng ký HK thường trú: <?php echo $hopdong['quequanA'] ?> .</p>
    <p class="pp" style="text-align:justify">CMND số: <?php echo $hopdong['cccdA'] ?> </p>
    <p class="pp" style="text-align:justify">2. Bên thuê phòng trọ (Bên B):</p>
    <p class="pp" style="text-align:justify">Ông/bà: <?php echo $hopdong['tenB'] ?> . Sinh ngày: <?php echo $hopdong['ngaysinhB'] ?> .</p>
    <p class="pp" style="text-align:justify">Nơi đăng ký HK thường trú: <?php echo $hopdong['quequanB'] ?> .</p>
    <p class="pp" style="text-align:justify">Số CMND: <?php echo $hopdong['cccdB'] ?> </p>
    <p class="pp" style="text-align:justify">Sau khi bàn bạc trên tinh thần dân chủ, hai bên cùng có lợi, cùng thống nhất như sau:</p>
    <p class="pp" style="text-align:justify">Bên A đồng ý cho bên B thuê 01 phòng ở tại địa chỉ: <?php echo $hopdong['diachithue'];?> &nbsp;</p>
    <p class="pp" style="text-align:justify">Giá thuê: <?php echo $phongtro['giaphong']; ?>. vnđ/tháng</p>
    <p class="pp" style="text-align:justify">Tiền điện <?php echo $st['tiendien']?> .đ/kwh tính theo chỉ số công tơ, thanh toán vào cuối các tháng.</p>
    <p class="pp" style="text-align:justify">Tiền nước: <?php echo $st['tiennuoc']?>.đ/m&#179; thanh toán vào đầu các tháng.</p>
    <p class="pp" style="text-align:justify">Tiền đặt cọc: <?php echo $phongtro['tiencoc']; ?> .vnđ</p>
    <p class="pp" style="text-align:justify">Hợp đồng có giá trị kể từ ngày <?php echo $hopdong['tungay']; ?> đến ngày <?php echo $hopdong['toingay']; ?> &nbsp;</p>
    <p class="pp" style="text-align:justify">&nbsp;</p>
    <p class="pp" style="text-align:justify"><strong>TRÁCH NHIỆM CỦA CÁC BÊN</strong></p>
    <p class="pp" style="text-align:justify">* Trách nhiệm của bên A:</p>
    <p class="pp" style="text-align:justify">- Tạo mọi điều kiện thuận lợi để bên B thực hiện theo hợp đồng.</p>
    <p class="pp" style="text-align:justify">- Cung cấp nguồn điện, nước, wifi cho bên B sử dụng.</p>
    <p class="pp" style="text-align:justify">* Trách nhiệm của bên B:</p>
    <p class="pp" style="text-align:justify">- Thanh toán đầy đủ các khoản tiền theo đúng thỏa thuận.</p>
    <p class="pp" style="text-align:justify">- Bảo quản các trang thiết bị và cơ sở vật chất của bên A trang bị cho ban đầu (làm hỏng phải sửa, mất phải đền).</p>
    <p class="pp" style="text-align:justify">- Không được tự ý sửa chữa, cải tạo cơ sở vật chất khi chưa được sự đồng ý của bên A.</p>
    <p class="pp" style="text-align:justify">- Giữ gìn vệ sinh trong và ngoài khuôn viên của phòng trọ.</p>
    <p class="pp" style="text-align:justify">- Bên B phải chấp hành mọi quy định của pháp luật Nhà nước và quy định của địa phương.</p>
    <p class="pp" style="text-align:justify">- Nếu bên B cho khách ở qua đêm thì phải báo và được sự đồng ý của chủ nhà đồng thời phải chịu trách nhiệm về các hành vi vi phạm pháp luật của khách trong thời gian ở lại.</p>
    <p class="pp" style="text-align:justify">&nbsp;</p>
    <p class="pp" style="text-align:justify"><strong>TRÁCH NHIỆM CHUNG</strong></p>
    <p class="pp" style="text-align:justify">- Hai bên phải tạo điều kiện cho nhau thực hiện hợp đồng.</p>
    <p class="pp" style="text-align:justify">- Trong thời gian hợp đồng còn hiệu lực nếu bên nào vi phạm các điều khoản đã thỏa thuận thì bên còn lại có&nbsp;<a href="https://luatminhkhue.vn/tu-van-luat-dan-su/tu-van-ve-quyen-don-phuong-cham-dut-hop-dong-thue-nha.aspx">quyền đơn phương chấm dứt hợp đồng</a>; nếu sự vi phạm hợp đồng đó gây tổn thất cho bên bị vi phạm hợp đồng thì bên vi phạm hợp đồng phải bồi thường thiệt hại.</p>
    <p class="pp" style="text-align:justify">- Một trong hai bên muốn chấm dứt hợp đồng trước thời hạn thì phải báo trước cho bên kia ít nhất 30 ngày và hai bên phải có sự thống nhất.</p>
    <p class="pp" style="text-align:justify">- Bên A phải trả lại tiền đặt cọc cho bên B.</p>
    <p class="pp" style="text-align:justify">- Bên nào vi phạm điều khoản chung thì phải chịu trách nhiệm trước pháp luật.</p>
    <p class="pp" style="text-align:justify">- Hợp đồng được lập thành 02 bản có giá trị pháp lý như nhau, mỗi bên giữ một bản.</p>
</div>
<p style="text-align:center; margin-top: 2%; "><strong>ĐẠI DIỆN BÊN B&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ĐẠI DIỆN BÊN A</strong></p>



<p style="text-align:center; margin-top: 5%; "><strong><?php echo $hopdong['tenB'];?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $hopdong['tenA'];?></strong></p>
<style>
    .pp {
        margin-top: 2% ;
    }
</style>
