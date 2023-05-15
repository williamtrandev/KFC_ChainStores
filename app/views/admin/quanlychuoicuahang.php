<div class="w-100 d-flex justify-content-center">
	<button class="btn me-4" style="background-color: #695cfe; font-size: 1.2rem; color: #f6f5ff" data-bs-toggle="modal" data-bs-target="#addModal">Thêm cửa hàng mới</button>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Danh sách cửa hàng trong chuỗi</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên cửa hàng</th>
			<th>Chi nhánh</th>
			<th>Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue body-ch">
			<style>
				.body-ch tr:hover {
					background-color: #C6E2FF;
				}
			</style>
			<?php
			$i = 1;
			foreach ($ch as $item) {
				echo "<tr data-id=$item->maCuaHang style='cursor: pointer'>
						<td data-id=$item->maCuaHang>$i</td>
						<td>$item->tenCuaHang</td>
						<td>$item->chiNhanh</td>
						<td>
								<i class='fa-solid fa-marker me-4 icon-update icon' style='font-size: 1.4rem; color: green; cursor: pointer'></i>
								<i class='fa-solid fa-trash icon-remove icon' style='font-size: 1.4rem; color: red; cursor: pointer'></i>
						</td>
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
				<h4 class="modal-title text-reset">Thêm cửa hàng mới</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên cửa hàng:</label>
						<input type="text" class="form-control tench" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Chi nhánh:</label>
						<input type="text" class="form-control chinhanh" required>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-addCH">Thêm</button>
			</div>

		</div>
	</div>
</div>
<div class="modal fade" id="updateModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thay đổi thông tin cửa hàng</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên cửa hàng:</label>
						<input type="text" class="form-control tench_update" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Chi nhánh:</label>
						<input type="text" class="form-control chinhanh_update" required>

					</div>

				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-updateCH">Thay đổi</button>
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
				<button type="button" class="btn btn-success btn-removeCH">Xóa</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="managerModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thông tin quản lý của cửa hàng</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form class="form-infoManager">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên quản lý cửa hàng:</label>
						<input type="text" class="form-control tennv" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Giới tính:</label>
						<select class="form-select gioitinh">
							<option value="00" selected>Nữ</option>
							<option value="1">Nam</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Ngày sinh:</label>
						<input type="date" class="form-control ngaysinhnv" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Số điện thoại:</label>
						<input type="text" class="form-control sdt" required readonly>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Địa chỉ:</label>
						<input type="text" class="form-control diachi" required>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Mật khẩu:</label>
						<input type="text" class="form-control matkhau" required>
					</div>

				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-info btn-addQL">Thêm</button>
				<button type="button" class="btn btn-success btn-updateQL">Thay đổi</button>
			</div>

		</div>
	</div>
</div>
<script>
	$(function() {
		$(".btn-addCH").click((e) => {
			let tench = $(".tench").val();
			let chinhanh = $(".chinhanh").val();
			fetch(`<?php echo _WEB_ROOT ?>/cuaHang/insert/${tench}/${chinhanh}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thêm cửa hàng thành công");
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
			$(".btn-updateCH").attr("data-id", $(tds[0]).attr("data-id"));
			let tench = $(tds[1]).text();
			let chinhanh = $(tds[2]).text();
			$(".tench_update").val(tench);
			$(".chinhanh_update").val(chinhanh);
			$("#updateModal").modal("show");

		})
		$(".btn-updateCH").click(() => {
			let mach = $(".btn-updateCH").attr("data-id");
			let tench_update = $(".tench_update").val();
			let chinhanh_update = $(".chinhanh_update").val();
			fetch(`<?php echo _WEB_ROOT ?>/cuaHang/update/${tench_update}/${chinhanh_update}/${mach}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thay đổi thông tin cửa hàng thành công");
						$("#updateModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
		$(".icon-remove").click((e) => {

			let mach = $($(e.target).closest("tr").find("td")[0]).attr("data-id");
			let tench = $($(e.target).closest("tr").find("td")[1]).text();
			$("#removeModal .modal-title").text(`Bạn có chắc chắn xóa cửa hàng "${tench}"`);
			$("#removeModal").modal("show");
			$(".btn-removeCH").attr("data-id", mach);

		})
		$(".btn-removeCH").click(() => {
			let mach = $(".btn-removeCH").attr("data-id");
			fetch(`<?php echo _WEB_ROOT ?>/cuaHang/delete/${mach}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Đã xóa cửa hàng này");
						$("#removeModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
		$(".body-ch tr").click((e) => {
			if (!$(e.target).hasClass("icon")) {
				let mach = $(e.target).closest("tr").attr("data-id");
				$(".form-infoManager")[0].reset();
				$("#managerModal").attr("data-id", mach);
				fetch(`<?php echo _WEB_ROOT ?>/nhanVien/getDetailQuanLyByMaCuaHang/${mach}`)
					.then(res => res.json())
					.then(data => {
						if (data != null) {
							let gioitinh = data.gioiTinh == 0 ? "00" : "1";
							$(".tennv").val(data.tenNhanVien);
							$(".gioitinh").val(gioitinh);
							$(".ngaysinhnv").val(data.ngaySinh);
							$(".sdt").val(data.sdt);
							$(".diachi").val(data.diaChi);
							$(".matkhau").val(data.matkhau);
							$("#managerModal").attr("data-maql", data.maNhanVien);
						} else {
							$("#managerModal").removeAttr("data-maql");
						}
						$("#managerModal").modal("show");

					});
			}
		})
		$(".btn-addQL").click(() => {
			let tennv = $(".tennv").val();
			let gioitinh = $(".gioitinh").val();
			let ngaysinhnv = $(".ngaysinhnv").val();
			let sdt = $(".sdt").val();
			let diachi = $(".diachi").val();
			let matkhau = $(".matkhau").val();
			let mach = $("#managerModal").attr("data-id");
			fetch(`<?php echo _WEB_ROOT ?>/nhanVien/insert/${tennv}/${gioitinh}/${ngaysinhnv}/${sdt}/${diachi}/Quản lý/${mach}/${matkhau}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thêm quản lý cửa hàng thành công");
						$("#addModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))

		})

		$(".btn-updateQL").click(() => {
			let tennv = $(".tennv").val();
			let gioitinh = $(".gioitinh").val();
			let ngaysinhnv = $(".ngaysinhnv").val();
			let diachi = $(".diachi").val();
			let matkhau = $(".matkhau").val();
			let manv = $("#managerModal").attr("data-maql");
			if (manv) {
				fetch(`<?php echo _WEB_ROOT ?>/nhanVien/update/${tennv}/${gioitinh}/${ngaysinhnv}/${diachi}/Quản lý/${matkhau}/${manv}`)
					.then(res => res.text())
					.then(data => {
						if (data == 1) {
							alert("Thay đổi thông tin quản lý cửa hàng thành công");
							$("#addModal").modal("hide");
							location.reload();
						} else {
							alert("Đã có gì đó xảy ra");
						}
					})
					.catch(err => alert(err))
			} else {
				alert("Cửa hàng chưa có quản lý để chỉnh sửa thông tin");
			}
		})
	})
</script>