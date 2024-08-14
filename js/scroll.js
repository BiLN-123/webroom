const btnScroll = document.querySelector('.btn-scroll');
const btnScrollIcon = document.querySelector('.btn-scroll i');
const scrollContent = document.querySelector('.scroll-content');
var scrollActive = true;
btnScroll.addEventListener('click', (e) => {
    scrollActive = !scrollActive;
    if (scrollActive == false) {
        scrollContent.style.height = scrollContent.scrollHeight + "px";
        btnScrollIcon.style.transform = "rotate(180deg)";
        btnScrollIcon.style.transition = "transform 0.3s ease";
    } else {
        scrollContent.style.height = "0px";
        btnScrollIcon.style.transform = "rotate(360deg)";
        btnScrollIcon.style.transition = "transform 0.3s ease";
    }
});

// close modal
function funcModal(flag) {
    if (flag == true) {
        $('.modal').addClass('open');
    } else {
        $('.modal').removeClass('open');
    }
}

const closeModal = document.querySelector('.modal-close');
closeModal.addEventListener('click', function() {
    funcModal(false);
});
const modalContainer = document.querySelector('.modal');
modalContainer.addEventListener('click', function(e) {
    if (e.target.classList.contains("modal")) {
        funcModal(false);
    }
});

// number format

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

/// ajax xem phong tro
// $('.ajax-pt').on('click', function() {
//     var phongtro = $(this).attr('data-pt');
//     var goUrl = $("#url").val() + "/app/dichvu/ajax-info-order.php";
//     $.ajax({
//         url: goUrl,
//         type: 'GET',
//         dataType: 'JSON',
//         cache: false,
//         data: {
//             ma: phongtro
//         },
//         success: function(result) {
//             funcModal(true);
//             console.log(result);
//             $("#tenphong").html("Phòng " + result.phongtro.tenphongtro);
//             var tdPhong = $("#infor-phong tr td:nth-child(2)");
//             tdPhong[0].innerHTML = result.phongtro.nguoithue;
//             tdPhong[1].innerHTML = result.phongtro.sodienthoai;
//             tdPhong[2].innerHTML = result.phongtro.namsinh;
//             tdPhong[3].innerHTML = result.phongtro.nghenghiep;
//             tdPhong[4].innerHTML = result.phongtro.songuoio;
//             // order
//             $("#infoOrder").html(result.hoadon.thangghi);
//             $("#contentOrder").html('');
//             $content = "<tr><td>Tiền phòng</td><td>" + result.hoadon.giaphong + "</td></tr>";
//             var nuocdung = parseInt(result.hoadon.chisonuocmoi) - parseInt(result.hoadon.chisonuoccu);
//             var diendung = parseInt(result.hoadon.chisodienmoi) - parseInt(result.hoadon.chisodiencu);
//             var tongtienNuoc = parseInt(nuocdung) * parseInt(result.hoadon.giatiennuoc);
//             var tongtienDien = parseInt(diendung) * parseInt(result.hoadon.giatiendien);
//             $content = "<tr><td>Nước dùng</td><td>" + nuocdung + " m3 (" + addCommas(result.hoadon.giatiennuoc) + ")</td></tr>";
//             $content += "<tr><td>Điện dùng</td><td>" + diendung + " kw (" + addCommas(result.hoadon.giatiendien) + ")</td></tr>";
//             $content += "<tr><td>Tiền nước</td><td>" + addCommas(tongtienNuoc) + "</td></tr>";
//             $content += "<tr><td>Tiền điện</td><td>" + addCommas(tongtienDien) + "</td></tr>";
//             $content += "<tr><td>Chi phí khác</td><td>" + addCommas(result.hoadon.phidichvu) + "</td></tr>";
//             $content += "<tr><td>Tiền nợ</td><td>" + addCommas(result.hoadon.tienno) + "</td></tr>";
//             $content += "<tr><td>Tổng tiền</td><td class='bold text-lg'>" + result.hoadon.tongtien + " VND</td></tr>";
//             $("#contentOrder").append($content);
//         },
//         error: function() {
//             alert("Có lỗi xảy ra khi lấy thông tin...");
//         }
//     });
// });