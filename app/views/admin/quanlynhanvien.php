<div class="staticFilm">
	<div class="head">
		<h1>Doanh sách nhân viên bán hàng</h1>
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
		</thead>
		<tbody class="body-revenue">
			<?php
			foreach ($nvbh as $item) {
				$ngaysinh = date('d-m-Y', strtotime($item->ngaySinh));
				$gioiTinh = $gioiTinh == 1 ? "Nam" : "Nữ";
				echo "<tr>
							<td>$item->tenNhanVien</td>
							<td>$gioiTinh</td>
							<td>
								$ngaysinh
							</td>
							<td>
								$item->sdt
							</td>
							<td>
								$item->diaChi
							</td>
							<td>
								$item->matkhau
							</td>
						</tr>";
			}
			?>
		</tbody>
	</table>
</div>