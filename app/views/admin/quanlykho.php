<div class="w-100 d-flex justify-content-center">
	<button class="btn me-4" style="background-color: #695cfe; font-size: 1.2rem; color: #f6f5ff" data-bs-toggle="modal" data-bs-target="#modalOrder">Nhập hàng mới</button>
	<button class="btn me-4" style="background-color: #695cfe; font-size: 1.2rem; color: #f6f5ff" data-bs-toggle="modal" data-bs-target="#addModal">Thêm nhà cung cấp</button>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Danh sách nhà cung cấp</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên nhà cung cấp</th>
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue tbody-ncc">
			<?php
			$i = 1;
			foreach ($ncc as $item) {
				echo "<tr data-id=$item->maNhaCungCap style='cursor:pointer'>
						<td data-id=$item->maNhaCungCap>$i</td>
						<td>$item->tenNhaCungCap</td>
						<td>$item->sdt</td>
						<td>$item->diaChi</td>
						<td>
								<i class='fa-solid fa-marker me-4 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->maNhaCungCap'></i>
								<i class='fa-solid fa-trash icon-remove' style='font-size: 1.4rem; color: red; cursor: pointer'></i>
						</td>
					</tr>";
				$i++;
			}
			?>
		</tbody>
	</table>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Danh sách hàng hóa theo nhà cung cấp</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên hàng hóa</th>
			<th>Đơn vị tính</th>
			<th>Giá nhập</th>
		</thead>
		<tbody class="body-revenue tbody-hh">

		</tbody>
	</table>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Danh sách hàng hóa theo lô nhập</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên hàng hóa</th>
			<th>Đơn vị tính</th>
			<th>Tồn kho</th>
			<th>Ngày nhập</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($hh as $item) {
				echo "<tr>
						<td>$i</td>
						<td>$item->tenHang</td>
						<td>$item->donViTinh</td>
						<td>$item->soLuong</td>
						<td>$item->ngayLap</td>
					</tr>";
				$i++;
			}
			?>
		</tbody>
	</table>
</div>




<div class="modal fade" id="addModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thêm nhà cung cấp</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên nhà cung cấp:</label>
						<input type="text" class="form-control tenncc" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Số điện thoại:</label>
						<input type="text" class="form-control sdt" required>

					</div>

					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Địa chỉ:</label>
						<input type="text" class="form-control diachi" required>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-addNCC">Thêm</button>
			</div>

		</div>
	</div>
</div>
<div class="modal fade" id="updateModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thay đổi thông tin nhà cung cấp</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên nhà cung cấp:</label>
						<input type="text" class="form-control tenncc_update" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Số điện thoại:</label>
						<input type="text" class="form-control sdt_update" required>

					</div>

					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Địa chỉ:</label>
						<input type="text" class="form-control diachi_update" required>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-updateNCC">Thay đổi</button>
			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="removeModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Bạn có chắc chắn xóa nhân viên </h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				Hành động xóa này sẽ không thể hoàn tác
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-removeNCC">Xóa</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="modalOrder">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Chi tiết phiếu nhập</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<table class="table table-striped text-reset">
					<thead>
						<tr>
							<th scope="col">STT</th>
							<th scope="col">Tên hàng hóa</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Giá</th>
							<th scope="col">Xóa</th>
						</tr>
					</thead>
					<tbody class="tbody-order">

					</tbody>
					<tfoot>
						<tr>
							<td colspan="2"></td>
							<td colspan="2" style="font-weight: 800">Tổng tiền: <span class="total_order"></span></td>
						</tr>

					</tfoot>
				</table>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-thanhtoan">Lập phiếu nhập</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>

<script>
	$(function() {
		let mancc_click = null;
		$(".tbody-ncc").on("click", "tr", function(e) {
			let mancc = $(e.target).closest("tr").attr("data-id");
			mancc_click = mancc;
			$(".tbody-hh").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/hangHoa/getHangHoaTheoNCC/${mancc}`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					let i = 1;
					data.forEach(function(element) {
						tr +=
							`<tr style='cursor:pointer' data-id=${element.maHang} data-price=${element.giaNhap} data-name='${element.tenHang}'>
							<td>${i++}</td>
							<td>${element.tenHang}</td>
							<td>${element.donViTinh}</td>
							<td>${element.giaNhap}</td>
						</tr>`
					})
					$(".tbody-hh").append(tr);
				})
		})
		$(".btn-addNCC").click((e) => {
			let tenncc = $(".tenncc").val();
			let sdt = $(".sdt").val();
			let diachi = $(".diachi").val();
			fetch(`<?php echo _WEB_ROOT ?>/nhaCungCap/insert/${tenncc}/${sdt}/${diachi}/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thêm nhà cung cấp thành công");
						$("form")[0].reset();
						$("#addModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
		$(".icon-update").click((e) => {
			let tds = $(e.target).closest("tr").find("td");
			$(".btn-updateNCC").attr("data-id", $(tds[0]).attr("data-id"));
			let tenncc = $(tds[1]).text();
			let sdt = $(tds[2]).text();
			let diachi = $(tds[3]).text();
			$(".tenncc_update").val(tenncc);
			$(".sdt_update").val(sdt);
			$(".diachi_update").val(diachi);
			$("#updateModal").modal("show");
		})
		$(".btn-updateNCC").click(() => {
			let mancc = $(".btn-updateNCC").attr("data-id");
			let tenncc_update = $(".tenncc_update").val();
			let sdt_update = $(".sdt_update").val();
			let diachi_update = $(".diachi_update").val();
			fetch(`<?php echo _WEB_ROOT ?>/nhaCungCap/update/${tenncc_update}/${sdt_update}/${diachi_update}/${mancc}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thay đổi thông tin nhà cung cấp thành công");
						$("#updateModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
		$(".icon-remove").click((e) => {
			let mancc = $($(e.target).closest("tr").find("td")[0]).attr("data-id");
			let tenncc = $($(e.target).closest("tr").find("td")[1]).text();
			$("#removeModal .modal-title").text(`Bạn có chắc chắn xóa nhân viên "${tenncc}"`);
			$("#removeModal").modal("show");
			$(".btn-removeNCC").attr("data-id", mancc);
		})
		$(".btn-removeNCC").click(() => {
			let mancc = $(".btn-removeNCC").attr("data-id");
			fetch(`<?php echo _WEB_ROOT ?>/nhaCungCap/delete/${mancc}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Đã xóa nhà cung cấp này");
						$("#removeModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})

		$(".circle-nhaphang").click(() => {
			$("#modalOrder").modal("show");
		})
		$(".btn-addPNH").click(() => {

		})



		$(".tbody-hh").on("click", "tr", function() {
			// Xử lý sự kiện click ở đây
			let tbody = $(".tbody-order");
			let name = $(this).attr("data-name");
			let price = parseInt($(this).attr("data-price"));
			let mamonan = parseInt($(this).attr("data-id"));
			let flag = false;
			let total = 0;
			let listNhapHang = [];
			tbody.find("tr").each(function() {
				var rowName = $($(this).find("td")[1]).text();
				total += parseInt($($(this).find("td")[3]).text());
				if (rowName === name) {
					flag = true;
					let currQuan = parseInt($($(this).find("input")).val());
					let currPrice = parseInt($($(this).find("td")[3]).text());
					$($(this).find("input")).val(currQuan + 1);
					$($(this).find("td")[3]).text(currPrice + price);
					total += price;
				}
			});
			if (!flag) {
				let stt = tbody.find("tr").length;
				let soluong = 1;
				let tr = `<tr data-id=${mamonan}>
								<td>${stt+1}</td>
								<td>${name}</td>
								<td>
								<div class="d-flex wrapper-product justify-content-center align-items-center">
									<div class='minus-product action-product disabled' style='font-size: 1.8rem'>-</div>
									<input type='number' value='1' readonly class='num-product' style='text-align: center !important'>
									<div class='add-product action-product'>+</div>
								</div>
								</td>
								<td data-price=${price}>${price}</td>
								<td class="remove-td"><i class="fa-solid fa-trash icon-rm" style="color: #EE0000; cursor: pointer"></i></td>
							</tr>`;
				tbody.append(tr);
				total += price;
			}
			$(".total_order").text(total);
			$(".number-items").text(tbody.find("tr").length);
			tbody.find("tr").each(function() {
				let mamonan = $(this).attr("data-id");
				let soluong = $($(this).find("input")).val();
				listNhapHang.push({
					mamonan: mamonan,
					soluong: soluong
				});
			});
			localStorage.setItem("listNhapHang", JSON.stringify(listNhapHang));
		});


		function updateTotalAndNumItem() {
			let tbody = $(".tbody-order");
			let total = 0;
			let listNhapHang = [];
			tbody.find("tr").each(function() {
				let mamonan = $(this).attr("data-id");
				let priceBase = parseInt($($(this).find("td")[3]).attr("data-price"));
				let soluong = parseInt($($(this).find("input")).val());
				console.log(priceBase);
				$($(this).find("td")[3]).text(priceBase * soluong)
				total += parseInt($($(this).find("td")[3]).text());
				listNhapHang.push({
					mamonan: mamonan,
					soluong: soluong
				});
			});
			localStorage.setItem("listNhapHang", JSON.stringify(listNhapHang));
			let num = tbody.find("tr").length == 0 ? "" : tbody.find("tr").length;
			total = total == 0 ? "" : total;
			$(".total_order").text(total);
			$(".number-items").text(num);
		}
		$(".tbody-order").on("click", ".icon-rm", function() {
			$(this).closest("tr").remove();
			updateTotalAndNumItem();
		})
		$(".tbody-order").on("click", ".add-product", function() {
			let targetInput = $(this).siblings('.num-product');
			let numProduct = parseInt(targetInput.val());
			targetInput.val(numProduct + 1);
			if (numProduct + 1 > 1) {
				let minusTarget = $(this).siblings('.minus-product'); // Tìm nút giảm số lượng
				$(minusTarget).removeClass("disabled");
			}
			updateTotalAndNumItem();
		})

		$(".tbody-order").on("click", ".minus-product", function() {
			let targetInput = $(this).siblings('.num-product');
			let numProduct = parseInt(targetInput.val());
			if (numProduct > 1) {

				targetInput.val(numProduct - 1);
				if (numProduct - 1 == 1) {
					$(this).addClass("disabled");
				}
				updateTotalAndNumItem();
			}
		})

		$(".btn-thanhtoan").click(() => {
			let total = parseInt($(".total_order").text());
			fetch(`<?php echo _WEB_ROOT ?>/phieuNhapHang/insert/${mancc_click}/${total}/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Đã nhập hàng");

						fetch(`<?php echo _WEB_ROOT ?>/phieuNhapHang/getMaMoiNhat/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
							.then(res => res.text())
							.then(data => {
								let listNhapHang = JSON.parse(localStorage.getItem("listNhapHang"));
								listNhapHang.forEach(element => {
									fetch(`<?php echo _WEB_ROOT ?>/chiTietPhieuNhap/insert/${data}/${element.mamonan}/${element.soluong}/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
										.catch(err => console.log("Loi insert chitietphieunhap"))
								});
							});
						$(".tbody-order").children().remove();
						$(".total_order").text("");
						$("#modalOrder").modal("hide");
						$(".number-items").text("");
						location.reload();
					} else {
						alert("Có gì đó đã xảy ra");
					}
				})
				.catch(err => console.log(err))
		});

	})
</script>