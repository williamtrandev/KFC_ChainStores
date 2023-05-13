<!-- ===================== MAIN ===================== -->

<h1>Doanh thu trong tháng này</h1>

<div class="insights">
	<div class="totalSale">
		<span class="material-icons-sharp">assessment</span>
		<div class="middle">
			<div class="left">
				<h3 class="text-total">Tổng doanh thu</h3>
				<h1 class="total-revenue"><?php echo number_format($tongdt, 0, ",", ".") . "đ" ?></h1>
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
				<h1 class="total-revenue">???</h1>
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
				<h1 class="total-revenue">???</h1>
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
		<ul class="pagination d-flex pag-dho">
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
		let currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
		if (currNumDh == 1) {
			$(".prev-btn-dh").parent().addClass("disabled");
		} else {
			$(".prev-btn-dh").parent().removeClass("disabled");
		}
		fetchLichSuDonHang(1);

		function fetchLichSuDonHang(page) {
			let perpage = 10;
			let i = (page - 1) * perpage + 1;
			$(".body-dh").children().remove();
			fetch(`<?php echo _WEB_ROOT ?>/donHang/getAllDonHang/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>/${page}`)
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
		$(".pag-dh li").click(() => {
			currNumDh = $($(".pag-dh li").filter('.active').find('a')[0]).text();
			fetchLichSuDonHang(currNum);
		})
	})
</script>