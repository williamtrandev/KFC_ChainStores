<div class="staticFilm">
	<div class="head">
		<h1>Lịch sử các đơn hàng giao dịch tại cửa hàng</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Số điện thoại khách hàng</th>
			<th>Ngày lập</th>
			<th>Tổng tiền</th>
			<th>Nhân viên thu</th>
		</thead>
		<tbody class="body-revenue body-dh">
		</tbody>
	</table>
</div>
<div class="w-100 d-flex justify-content-center mt-2">
	<ul class="pagination d-flex pag-dh">
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<?php
		$totalItems = $ndh;
		$perPage = 10;
		$totalPages = ceil($totalItems / $perPage);
		for ($i = 2; $i <= $totalPages; $i++) {
			echo "<li class='page-item'><a class='page-link' href='#'>$i</a></li>";
		}
		?>
	</ul>
</div>
<div class="staticFilm">
	<div class="head">
		<h1>Lịch sử các đơn hàng online giao dịch tại cửa hàng</h1>
	</div>
	<table>
		<thead>
			<th>STT</th>
			<th>Số điện thoại khách hàng</th>
			<th>Ngày lập</th>
			<th>Tổng tiền</th>
			<th>Nhân viên tiếp nhận</th>
			<th>Nhân viên giao hàng</th>
			<th>Địa chỉ giao hàng</th>
		</thead>
		<tbody class="body-revenue">
			<?php
			$i = 1;
			foreach ($dho as $item) {
				$ngayLap = date('d-m-Y', strtotime($item->ngayLap));
				$tongtien = number_format($item->tongTien, 0, ",", ".") . "đ";
				echo "<tr>
						<td data-id=$item->maDonHang>$i</td>
						<td>$item->sdtKhachHang</td>
						<td>$ngayLap</td>
						<td>$tongtien</td>
						<td>$item->tenNhanVien</td>
						<td>$item->tenNhanVienGiao</td>
						<td>$item->diaChiGiaoHang</td>
					</tr>";
				$i++;
			}
			?>
		</tbody>
	</table>
</div>
<div class="w-100 d-flex justify-content-center mt-2">
	<ul class="pagination d-flex pag-dho">
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<?php
		$totalItems = $ndho;
		$perPage = 10;
		$totalPages = ceil($totalItems / $perPage);
		for ($i = 2; $i <= $totalPages; $i++) {
			echo "<li class='page-item'><a class='page-link' href='#'>$i</a></li>";
		}
		?>
	</ul>
</div>

<script>
	$(function() {
		let currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
		if (currNumDh == 1) {
			$(".prev-btn-dh").parent().addClass("disabled");
		} else {
			$(".prev-btn-dh").parent().removeClass("disabled");
		}
		fetchLichSuDonHang(1);

		let currNumDho = $($(".pag-dho li").filter('.active').find('a')[0]).text();
		if (currNumDho == 1) {
			$(".prev-btn-dh").parent().addClass("disabled");
		} else {
			$(".prev-btn-dh").parent().removeClass("disabled");
		}
		fetchLichSuDonHangOnline(1);

		function fetchLichSuDonHang(page) {
			let perpage = 10;
			let i = (page - 1) * perpage + 1;
			$(".body-dh").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getAllDonHangDaBan/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>/${page}`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					data.forEach(element => {
						let price = element.tongTien.toLocaleString('vi-VN') + "đ";

						let ngayLap = element.ngayLap;
						const parts = ngayLap.split(" ");
						const datePart = parts[0];
						const timePart = parts[1];

						const dateParts = datePart.split("-");
						const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;

						ngayLap = `${formattedDate} ${timePart}`;
						tr += `<tr>
							<td data-id=${element.maDonHang}>${i++}</td>
							<td>${element.sdtKhachHang}</td>
							<td>${ngayLap}</td>
							<td>${price}</td>
							<td>${element.tenNhanVien}</td>
						</tr>`;
					});
					$(".body-dh").append(tr);
				})
		}
		$(".pag-dh li").click(() => {
			currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
			fetchLichSuDonHang(currNum);
		})

		function fetchLichSuDonHangOnline(page) {
			let perpage = 10;
			let i = (page - 1) * perpage + 1;
			$(".body-dho").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getAllDonHangOnlineDaBan/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>/${page}`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					data.forEach(element => {
						let price = element.tongTien.toLocaleString('vi-VN') + "đ";

						let ngayLap = element.ngayLap;
						const parts = ngayLap.split(" ");
						const datePart = parts[0];
						const timePart = parts[1];

						const dateParts = datePart.split("-");
						const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;

						ngayLap = `${formattedDate} ${timePart}`;
						tr += `<tr>
							<td data-id=${element.maDonHang}>${i++}</td>
							<td>${element.sdtKhachHang}</td>
							<td>${ngayLap}</td>
							<td>${price}</td>
							<td>${element.tenNhanVien}</td>
							<td>${element.tenNhanVienGiao}</td>
							<td>${element.diaChiGiaoHang}</td>
						</tr>`;
					});
					$(".body-dho").append(tr);
				})
		}
		$(".pag-dho li").click(() => {
			currNumDho = $($(".pag-dho li").filter('.active').find('a')[0]).text();
			fetchLichSuDonHangOnline(currNum);
		})
	})
</script>