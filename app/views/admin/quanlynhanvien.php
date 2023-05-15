<div class="w-100 d-flex justify-content-center">
	<button class="btn" style="background-color: #695cfe; font-size: 1.2rem; color: #f6f5ff" data-bs-toggle="modal" data-bs-target="#addModal">Thêm nhân viên</button>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Danh sách nhân viên bán hàng</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên nhân viên</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Mật khẩu đăng nhập</th>
			<th>Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($nvbh as $item) {
				$ngaysinh = date('d-m-Y', strtotime($item->ngaySinh));
				$gioiTinh = $item->gioiTinh == 1 ? "Nam" : "Nữ";
				echo "<tr>
						<td data-id=$item->maNhanVien>$i</td>
						<td>$item->tenNhanVien</td>
						<td>$gioiTinh</td>
						<td>$ngaysinh</td>
						<td>$item->sdt</td>
						<td>$item->diaChi</td>
						<td>$item->matkhau</td>
						<td>
								<i class='fa-solid fa-marker me-4 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->chucVu'></i>
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
		<h1>Danh sách nhân viên giao hàng</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên nhân viên</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Mật khẩu đăng nhập</th>
			<th>Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($nvgh as $item) {
				$ngaysinh = date('d-m-Y', strtotime($item->ngaySinh));
				$gioiTinh = $item->gioiTinh == 1 ? "Nam" : "Nữ";
				echo "<tr>
						<td data-id=$item->maNhanVien>$i</td>
						<td>$item->tenNhanVien</td>
						<td>$gioiTinh</td>
						<td>$ngaysinh</td>
						<td>$item->sdt</td>
						<td>$item->diaChi</td>
						<td>$item->matkhau</td>
						<td>
								<i class='fa-solid fa-marker me-4 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->chucVu'></i>
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
		<h1>Danh sách đầu bếp</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên nhân viên</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Mật khẩu đăng nhập</th>
			<th>Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($db as $item) {
				$ngaysinh = date('d-m-Y', strtotime($item->ngaySinh));
				$gioiTinh = $item->gioiTinh == 1 ? "Nam" : "Nữ";
				echo "<tr>
						<td data-id=$item->maNhanVien>$i</td>
						<td>$item->tenNhanVien</td>
						<td>$gioiTinh</td>
						<td>$ngaysinh</td>
						<td>$item->sdt</td>
						<td>$item->diaChi</td>
						<td>$item->matkhau</td>
						<td>
								<i class='fa-solid fa-marker me-4 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->chucVu'></i>
								<i class='fa-solid fa-trash icon-remove' style='font-size: 1.4rem; color: red; cursor: pointer'></i>
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
				<h4 class="modal-title text-reset">Thêm nhân viên</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên nhân viên:</label>
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
						<input type="text" class="form-control sdt" required>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Địa chỉ:</label>
						<input type="text" class="form-control diachi" required>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Chức vụ:</label>
						<select class="form-select chucvu">
							<option value="Nhân viên bán hàng">Nhân viên bán hàng</option>
							<option value="Nhân viên giao hàng">Nhân viên giao hàng</option>
							<option value="Đầu bếp">Đầu bếp</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Mật khẩu:</label>
						<input type="text" class="form-control matkhau" required>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-addNV">Thêm</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="updateModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thay đổi thông tin nhân viên</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên nhân viên:</label>
						<input type="text" class="form-control tennv_update" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Giới tính:</label>
						<select class="form-select gioitinh_update">
							<option value="00" selected class="female">Nữ</option>
							<option value="1" class="male">Nam</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Ngày sinh:</label>
						<input type="date" class="form-control ngaysinhnv_update" required>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Địa chỉ:</label>
						<input type="text" class="form-control diachi_update" required>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Chức vụ:</label>
						<select class="form-select chucvu_update">
							<option value="Nhân viên bán hàng" class="nvbh">Nhân viên bán hàng</option>
							<option value="Nhân viên giao hàng" class="nvgh">Nhân viên giao hàng</option>
							<option value="Đầu bếp" class="nvdb">Đầu bếp</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label">Mật khẩu:</label>
						<input type="text" class="form-control matkhau_update" required>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-updateNV">Thay đổi</button>
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
				<button type="button" class="btn btn-success btn-removeNV">Xóa</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>
<script>
	$(function() {
		$(".btn-addNV").click(() => {
			let tennv = $(".tennv").val();
			let gioitinh = $(".gioitinh").val();
			let ngaysinhnv = $(".ngaysinhnv").val();
			let sdt = $(".sdt").val();
			let diachi = $(".diachi").val();
			let chucvu = $(".chucvu").val();
			let matkhau = $(".matkhau").val();
			fetch(`<?php echo _WEB_ROOT ?>/nhanVien/insert/${tennv}/${gioitinh}/${ngaysinhnv}/${sdt}/${diachi}/${chucvu}/<?php echo json_decode($_SESSION['user'])->maCuaHang; ?>/${matkhau}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thêm nhân viên thành công");
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
			let chucvu = $(e.target).attr("data-type");
			let manv = $(tds[0]).attr("data-id");
			$(".btn-updateNV").attr("data-id", manv);
			let tennv = $(tds[1]).text();
			let gioitinh = $(tds[2]).text();
			let ngaysinh = $(tds[3]).text();
			var dateParts = ngaysinh.split("-");
			var year = dateParts[2];
			var month = dateParts[1];
			var day = dateParts[0];

			// Định dạng ngày thành chuỗi "YYYY-MM-DD"
			ngaysinh = year + "-" + month + "-" + day;
			let sdt = $(tds[4]).text();
			let diachi = $(tds[5]).text();
			let matkhau = $(tds[6]).text();
			$(".tennv_update").val(tennv);
			if (gioitinh == "Nam") {
				$(".male").attr("selected", true);
				$(".female").attr("selected", false);
			} else {
				$(".female").attr("selected", true);
				$(".male").attr("selected", false);
			}
			$(".ngaysinhnv_update").val(ngaysinh);
			$(".diachi_update").val(diachi);
			if (chucvu == "Nhân viên bán hàng") {
				$(".nvbh").attr("selected", true);
				$(".nvgh").attr("selected", false);
				$(".nvdb").attr("selected", false);
			} else if (chucvu == "Nhân viên giao hàng") {
				$(".nvgh").attr("selected", true);
				$(".nvbh").attr("selected", false);
				$(".nvdb").attr("selected", false);
			} else {
				$(".nvdb").attr("selected", true);
				$(".nvgh").attr("selected", false);
				$(".nvbh").attr("selected", false);
			}
			$(".matkhau_update").val(matkhau);
			$("#updateModal").modal("show");
		})
		$(".btn-updateNV").click(() => {
			let manv = $(".btn-updateNV").attr("data-id");
			let tennv_update = $(".tennv_update").val();
			let gioitinh_update = $(".gioitinh_update").val();
			let ngaysinhnv_update = $(".ngaysinhnv_update").val();
			let diachi_update = $(".diachi_update").val();
			let chucvu_update = $(".chucvu_update").val();
			let matkhau_update = $(".matkhau_update").val();
			fetch(`<?php echo _WEB_ROOT ?>/nhanVien/update/${tennv_update}/${gioitinh_update}/${ngaysinhnv_update}/${diachi_update}/${chucvu_update}/${matkhau_update}/${manv}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Thay đổi thông tin nhân viên thành công");
						$("form")[1].reset();
						$("#updateModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
		$(".icon-remove").click((e) => {
			let manv = $($(e.target).closest("tr").find("td")[0]).attr("data-id");
			let tennv = $($(e.target).closest("tr").find("td")[1]).text();
			$("#removeModal .modal-title").text(`Bạn có chắc chắn xóa nhân viên "${tennv}"`);
			$("#removeModal").modal("show");
			$(".btn-removeNV").attr("data-id", manv);
		})
		$(".btn-removeNV").click(() => {
			let manv = $(".btn-removeNV").attr("data-id");
			fetch(`<?php echo _WEB_ROOT ?>/nhanVien/delete/${manv}`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Đã xóa nhân viên");
						$("#removeModal").modal("hide");
						location.reload();
					} else {
						alert("Đã có gì đó xảy ra");
					}
				})
				.catch(err => alert(err))
		})
	})
</script>