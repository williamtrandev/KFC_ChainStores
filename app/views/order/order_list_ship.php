<div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; background-color: #fff">
	<table class="table table-striped mb-0 table-order-list-online">
		<thead style="background-color: #002d72;">
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã đơn</th>
				<th scope="col">Số điện thoại khách hàng</th>
				<th scope="col">Địa chỉ giao</th>
				<th scope="col">Tổng tiền</th>
				<th scope="col">Trạng thái thanh toán</th>
				<th scope="col">Nhân viên giao</th>

			</tr>
		</thead>
		<tbody class="tbody-order-online">

		</tbody>
	</table>
</div>
<div class="modal fade" id="modalOrderList">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Chọn nhân viên để giao hàng</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">STT</th>
							<th scope="col">Mã nhân viên</th>
							<th scope="col">Tên nhân viên</th>
							<th scope="col">Chọn</th>
						</tr>
					</thead>
					<tbody class="tbody-nhanvien">

					</tbody>
				</table>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-phanbo">Phân bổ</button>
			</div>

		</div>
	</div>
</div>

<script>
	$(function() {


		function fetchGetDonHangOnlineShip() {
			let tbody = $(".tbody-order-online");
			tbody.children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getAllDonHangOnlineShip`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					let i = 1;
					data.forEach(element => {
						let nvgiao = element.maNhanVienGiao == null ? "Chưa có" : element.tenNhanVien;
						let tttt = element.trangThaiThanhToan == 1 ? "Đã thanh toán" : "Chưa thanh toán";
						tr += `<tr class="detail" style='cursor: pointer;'>
					<td>${i++}</td>
					<td>${element.maDonHang}</td>
					<td>${element.sdtKhachHang}</td>
					<td>${element.diaChiGiaoHang}</td>
					<td>${element.tongTien}</td>
					<td>${tttt}</td>
					<td>${nvgiao}</td>
				</tr>`
					});
					tbody.append(tr);
				});
		}
		fetchGetDonHangOnlineShip();
		$(".tbody-order-online").on("click", ".detail", function() {
			let modal = $("#modalOrderList");
			let madonhang = $($(this).find("td")[1]).text();
			$(".tbody-nhanvien").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/nhanVien/getAllNhanVienGiaoHang/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					let i = 1;
					data.forEach(element => {
						tr += `<tr>
						<td>${i++}</td>
						<td>${element.maNhanVien}</td>
						<td>${element.tenNhanVien}</td>
						<td><input class="form-check-input" type="radio" name="choose"></td>
					</tr>`
					});
					$(".tbody-nhanvien").append(tr);
				})
			$(".btn-phanbo").click(() => {
				var selectedRow = $("input[type='radio']:checked").closest("tr");
				let manv = $(selectedRow.find("td")[1]).text();
				fetch(`<?php echo _WEB_ROOT ?>/donHang/updateNhanVienGiao/${madonhang}/${manv}`)
					.then(res => res.text())
					.then(data => {
						if (data == 1) {
							alert("Đã giao cho nhân viên này");
							fetchGetDonHangOnlineShip();
							modal.modal("hide");
						} else {
							alert("Đã có gì đó xảy ra");
						}
					})
					.catch(err => alert(err))
			})
			modal.modal("show");

		})
	})
</script>