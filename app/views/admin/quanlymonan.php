<div class="w-100 d-flex justify-content-center">
	<button class="btn" style="background-color: #695cfe; font-size: 1.2rem; color: #f6f5ff" data-bs-toggle="modal" data-bs-target="#addFood">Thêm món ăn</button>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Món mới</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($monmoi as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
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
		<h1>Combo 1 người</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($cb1 as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
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
		<h1>Combo nhóm</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($cbn as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
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
		<h1>Gà rán - Gà quay</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($gr_gq as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
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
		<h1>Burger - Cơm - Mì Ý</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($bg as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
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
		<h1>Thức ăn nhẹ</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($tan as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
								<i class='fa-solid fa-trash icon-remove' style='font-size: 1.4rem; color: red; cursor: pointer' onclick='removeFood()'></i>
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
		<h1>Thức uống</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên món ăn</th>
			<th>Mô tả</th>
			<th>Giá</th>
			<th>Ảnh</th>
			<th>Thêm NL/Sửa/Xóa</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($tu as $item) {
				$price = number_format($item->gia, 0, ",", ".");
				$img_path = _WEB_ROOT . "/public/assets/client/img/" . $item->image_path;
				echo "<tr>
						<td data-id=$item->maMonAn>$i</td>
						<td>$item->tenMonAn</td>
						<td>$item->mota</td>
						<td>$price</td>
						<td><div class='w-100 d-flex justify-content-center'><img src='$img_path' style='width: 50px; height: 50px'></div></td>
						<td>
								<i class='fa-solid fa-wheat-awn-circle-exclamation me-3' style='font-size: 1.4rem; color: blue; cursor: pointer'></i>
								<i class='fa-solid fa-marker me-3 icon-update' style='font-size: 1.4rem; color: green; cursor: pointer' data-type='$item->id_loaimon' onclick='handleEdit(this, $item->maMonAn)'></i>
								<i class='fa-solid fa-trash icon-remove' style='font-size: 1.4rem; color: red; cursor: pointer' onclick='removeFood()'></i>
						</td>
					</tr>";
				$i++;
			}
			?>
		</tbody>
	</table>
</div>
</main>
<!-- ============= FORM SUA MON AN ============= -->
<div class="modal fade text-reset" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Sửa món ăn</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body modal-food-body">
				<form method="post" enctype="multipart/form-data" class="upload-food-form">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên món ăn:</label>
						<input type="text" class="form-control" id="recipient-name" name="name" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Mô tả:</label>
						<input type="text" class="form-control" id="recipient-name" name="detail" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Giá:</label>
						<input type="text" class="form-control" id="recipient-name" name="price" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Ảnh:</label>
						<input type="file" accept="image/*" class="form-control" id="message-text" name="image_path" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Loại món:</label>
						<select class="form-select loaimon" name="loaimon">
							<option value="1">Món mới</option>
							<option value="2">Combo 1 người</option>
							<option value="3">Combo nhóm</option>
							<option value="4">Gà rán - Gà quay</option>
							<option value="5">Burger - Cơm - Mì Ý</option>
							<option value="6">Thức ăn nhẹ</option>
							<option value="7">Thức uống</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="updateFood()">Lưu</button>
			</div>
		</div>
	</div>
</div>
<!-- ============= FORM THEM MON AN ============= -->
<div class="modal fade text-reset" id="addFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Thêm món ăn</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" class="upload-food-form-add">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Tên món ăn:</label>
						<input type="text" class="form-control" id="recipient-name" name="name-add" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Mô tả:</label>
						<input type="text" class="form-control" id="recipient-name" name="detail-add" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Giá:</label>
						<input type="text" class="form-control" id="recipient-name" name="price-add" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Hình ảnh:</label>
						<input type="file" accept="image/*" class="form-control" id="message-text" name="image_path-add" />
					</div>
					<div class="mb-3">
						<label for="message-text" class="col-form-label">Loại món:</label>
						<select class="form-select" name="loaimon-add">
							<option value="1">Món mới</option>
							<option value="2">Combo 1 người</option>
							<option value="3">Combo nhóm</option>
							<option value="4">Gà rán - Gà quay</option>
							<option value="5">Burger - Cơm - Mì Ý</option>
							<option value="6">Thức ăn nhẹ</option>
							<option value="7">Thức uống</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="insertFood()">Lưu</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="removeModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Bạn có chắc chắn xóa món ăn </h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">
				Hành động xóa này sẽ không thể hoàn tác
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-remove">Xóa</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="addNLModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-reset">Thêm nguyên liệu</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body text-reset text-muted">

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-addNL">Thêm</button>
			</div>

		</div>
	</div>
</div>
<script>
	$(function() {
		$("#addNLModal").modal("show");
	})

	function handleEdit(elem, maMonAn) {
		let tds = $(elem).closest("tr").find("td");
		let name = $(tds[1]).text();
		let mota = $(tds[2]).text();
		let gia = $(tds[3]).text().replaceAll(".", "")
		let loaiMonAn = $(elem).attr("data-type");
		$("input[name='name']").val(name);
		$("input[name='detail']").val(mota);
		$("input[name='price']").val(gia);
		$("#updateModal .modal-food-body").attr("data-mamonan", maMonAn);
		$(".loaimon").val(loaiMonAn);
		$("#updateModal").modal("show");
	}

	function updateFood() {
		const form = document.querySelector('.upload-food-form');
		const formData = new FormData(form);
		formData.append("maMonAn", $(".modal-food-body").attr("data-mamonan"));
		formData.forEach(function(value, key) {
			console.log(key + ': ' + value);
		});
		fetch('<?php echo _WEB_ROOT ?>/monAn/update', {
				method: 'POST',
				body: formData,
			})
			.then(res => res.text())
			.then(data => {
				if (data == 1) {
					alert('Cập nhật thông tin món ăn thành công');
					location.reload();
				} else {
					alert("Cập nhật không thành công");
				}
			})
			.catch(err => {
				alert('Upload failed');
			})

	}

	$(".icon-remove").click((e) => {
		let mamonan = $($(e.target).closest("tr").find("td")[0]).attr("data-id");
		let tenmonan = $($(e.target).closest("tr").find("td")[1]).text();
		$("#removeModal .modal-title").text(`Bạn có chắc chắn xóa món ăn "${tenmonan}"`);
		$("#removeModal").modal("show");
		$(".btn-remove").attr("data-id", mamonan);
	})
	$(".btn-remove").click(() => {
		let mamonan = $(".btn-remove").attr("data-id");
		fetch(`<?php echo _WEB_ROOT ?>/monAn/delete/${mamonan}`)
			.then(res => res.text())
			.then(data => {
				if (data == 1) {
					alert("Đã xóa món ăn");
					$("#removeModal").modal("hide");
					location.reload();
				} else {
					alert("Đã có gì đó xảy ra");
				}
			})
			.catch(err => alert(err))
	})



	function insertFood() {
		const form = document.querySelector('.upload-food-form-add');
		const formData = new FormData(form);

		fetch('<?php echo _WEB_ROOT ?>/monAn/insert', {
				method: 'POST',
				body: formData,
			})
			.then(res => res.text())
			.then(data => {
				console.log(data);
				if (data == 1) {
					alert('Thêm món ăn thành công');
					location.reload();
				} else {
					alert("Không thành công");
				}
			})
			.catch(err => {
				alert('Upload failed');
			})
	}
</script>