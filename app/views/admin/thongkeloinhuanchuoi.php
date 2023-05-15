<div class="staticFilm">
	<h1>Danh sách cửa hàng trong chuỗi</h1>
	<table>
		<thead>
			<th>STT</th>
			<th>Tên cửa hàng</th>
			<th>Chi nhánh</th>
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
					</tr>";
				$i++;
			}
			?>
		</tbody>
	</table>
</div>


<div class="staticFilm">
	<h1>Doanh thu trong tháng của cửa hàng</h1>

	<div class="insights">
		<div class="totalSale">
			<span class="material-icons-sharp">assessment</span>
			<div class="middle">
				<div class="left">
					<h3 class="text-total">Tổng doanh thu</h3>
					<h1 class="total-revenue tongdoanhthu">???</h1>
				</div>
			</div>
		</div>
		<div class="totalSale">
			<span class="material-icons-sharp">
				add_chart
			</span>
			<div class="middle">
				<div class="left">
					<h3 class="text-total">Chi phí nhập hàng</h3>
					<h1 class="total-revenue chiphinhaphang">???</h1>
				</div>
			</div>
		</div>
		<div class="totalSale">
			<span class="material-icons-sharp">
				insights
			</span>

			<div class="middle">
				<div class="left">
					<h3 class="text-total">Lợi nhuận tháng này</h3>
					<h1 class="total-revenue loinhuan">???</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="staticFilm">
	<h1>Doanh thu bán hàng</h1>
	<table>
		<thead>
			<th>STT</th>
			<th>Mã đơn hàng</th>
			<th>Ngày lập</th>
			<th>Tổng tiền</th>
		</thead>
		<tbody class="body-revenue body-dh">

		</tbody>
	</table>
	<div class="w-100 d-flex justify-content-center mt-2">
		<ul class="pagination d-flex pag-dh">
			<li class="page-item active"><a class="page-link" href="#">1</a></li>
			<?php
			// $totalItems = $ndh;
			// $perPage = 10;
			// $totalPages = ceil($totalItems / $perPage);
			// for ($i = 2; $i <= $totalPages; $i++) {
			// 	echo "<li class='page-item'><a class='page-link' href='#'>$i</a></li>";
			// }
			?>
		</ul>
	</div>
</div>
<div class="staticFilm">
	<h1>Chi phí nhập hàng</h1>
	<table>
		<thead>
			<th>STT</th>
			<th>Mã phiếu nhập</th>
			<th>Ngày nhập</th>
			<th>Tổng tiền</th>
		</thead>
		<tbody class="body-revenue body-nh">

		</tbody>
	</table>
</div>

</main>


<script>
	$(function() {
		let mach_click = null;

		function fetchLichSuDonHang(macuahang, page) {
			let perpage = 10;
			let i = (page - 1) * perpage + 1;
			$(".body-dh").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getAllDonHang/${macuahang}/${page}`)
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
							<td>${element.maDonHang}</td>
							<td>${ngayLap}</td>
							<td>${price}</td>
						</tr>`;
					});
					$(".body-dh").append(tr);
				})
		}
		$(".body-ch tr").click(function(e) {
			let mach = $(e.target).closest("tr").attr("data-id");
			mach_click = mach;
			let cpnh = 0;
			let tdt = 0;
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getTotalRevenue/${mach}`)
				.then(res => res.text())
				.then(data => {
					$(".tongdoanhthu").text(parseInt(data).toLocaleString("vi-VN") + "đ");
					tdt = parseInt(data);
					fetch(`<?php echo _WEB_ROOT ?>/phieuNhapHang/getTotal/${mach}`)
						.then(res => res.text())
						.then(data => {
							$(".chiphinhaphang").text(parseInt(data).toLocaleString("vi-VN") + "đ");
							cpnh = parseInt(data);
							$(".loinhuan").text(parseInt(tdt - cpnh).toLocaleString("vi-VN") + "đ");
						})
						.catch(err => console.log(err));
				})
				.catch(err => console.log(err));
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getNumberDonHang/${mach}`)
				.then(res => res.text())
				.then(data => {
					var totalItems = data;
					var perPage = 10;
					var totalPages = Math.ceil(totalItems / perPage);
					for (var i = 2; i <= totalPages; i++) {
						var li = $("<li>").addClass("page-item");
						var a = $("<a>").addClass("page-link").attr("href", "#").text(i);
						li.append(a);
						$(".pag-dh").append(li);
					}
				})
			fetchLichSuDonHang(mach_click, 1);
			$(".body-nh").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/phieuNhapHang/getAll/${mach}`)
				.then(res => res.json())
				.then(data => {
					let tr = "";
					let i = 1;
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
							<td data-id=${element.maPhieuNhap}>${i++}</td>
							<td>${element.maPhieuNhap}</td>
							<td>${ngayLap}</td>
							<td>${price}</td>
						</tr>`;
					});
					$(".body-nh").append(tr);
				})
				.catch(err => console.log(err));
		})
		let currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
		if (currNumDh == 1) {
			$(".prev-btn-dh").parent().addClass("disabled");
		} else {
			$(".prev-btn-dh").parent().removeClass("disabled");
		}
		$(".pag-dh li").click(() => {
			currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
			fetchLichSuDonHang(mach_click, currNum);
		})
	})
</script>