<div class="d-flex justify-content-center">
	<?php
	$i = 1;
	foreach ($loaimon as $item) {
		if ($i == count($loaimon)) {
			echo "<button class='btn btn-filter' style='background: var(--primary-color); color: #fff' data-id=$item->id_loaimon>$item->tenLoaiMon</button>";
		} else {
			echo
			"<button class='btn btn-filter' style='background: var(--primary-color); color: #fff; margin-right: 20px;' data-id=$item->id_loaimon>$item->tenLoaiMon</button>";
		}

		$i++;
	}
	?>
</div>
<div class="container">
	<div class="row row-monan">
	</div>
</div>
<button class="order-list-cart" data-bs-toggle="modal" data-bs-target="#modalOrder">
	<i class="fa-solid fa-cart-shopping icon-cart" style="color:beige; font-size: 1.3rem"></i>
	<span class="number-items"></span>
</button>

<div class="modal fade" id="modalOrder">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Đơn order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">STT</th>
							<th scope="col">Tên món ăn</th>
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
						<tr>
							<td colspan="2">Số điện thoại khách hàng</td>
							<td colspan="2">
								<input type="text" class="form-control sdt">
							</td>
						</tr>
					</tfoot>
				</table>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-thanhtoan">Thanh toán</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
			</div>

		</div>
	</div>
</div>
<script>
	$(function() {


		function handleAddToOrder(elem) {
			let name = $(elem).attr("data-name");
			let price = $(elem).attr("data-price");
			console.log(name);
		}

		function handleFetchMonAn(id) {
			fetch(`<?php echo _WEB_ROOT ?>/monAn/getMonAnById/${id}`)
				.then(res => res.json())
				.then(data => {
					$(".row-monan").children().remove();
					let items = "";
					data.forEach(element => {
						let price = element.gia.toLocaleString('vi-VN') + "đ";
						items += `<div class='col-md-3'>
							<div class='card my-4 card-monan' style='height: 420px; cursor: pointer' data-name='${element.tenMonAn}' data-price=${element.gia} data-id=${element.maMonAn}>
								<img class='card-img-top' src='<?php echo _WEB_ROOT ?>/public/assets/client/img/${element.image_path}' alt=''>
								<div class='card-body'>
								<div class='w-100 d-flex justify-content-between'><h5 class='card-title' style='width: 50%'>${element.tenMonAn}</h5>
								<h5 class='card-text text-end' style='width: 40%;'>${price}</h5></div>
								<p class='card-text'>${element.mota}</p>
								</div>
							</div>
							</div>`;
					});
					$(".row-monan").append(items);

				})
		}

		handleFetchMonAn(1);
		$(".btn-filter").click(function() {
			let id = $(this).attr("data-id");
			handleFetchMonAn(id);
		});
		$(".row-monan").on("click", ".card-monan", function() {
			// Xử lý sự kiện click ở đây
			let tbody = $(".tbody-order");
			let name = $(this).attr("data-name");
			let price = parseInt($(this).attr("data-price"));
			let mamonan = parseInt($(this).attr("data-id"));
			let flag = false;
			let total = 0;
			let listOrder = [];
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
				// let tr = `<tr data-id=${mamonan}>
				// 				<td>${stt+1}</td>
				// 				<td>${name}</td>
				// 				<td>${soluong}</td>
				// 				<td>${price}</td>
				// 				<td class="remove-td"><i class="fa-solid fa-trash icon-rm" style="color: #EE0000; cursor: pointer"></i></td>
				// 			</tr>`;
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
				listOrder.push({
					mamonan: mamonan,
					soluong: soluong
				});
			});
			localStorage.setItem("listOrder", JSON.stringify(listOrder));
		});

		function updateTotalAndNumItem() {
			let tbody = $(".tbody-order");
			let total = 0;
			let listOrder = [];
			tbody.find("tr").each(function() {
				let mamonan = $(this).attr("data-id");
				let priceBase = parseInt($($(this).find("td")[3]).attr("data-price"));
				let soluong = parseInt($($(this).find("input")).val());
				console.log(priceBase);
				$($(this).find("td")[3]).text(priceBase * soluong)
				total += parseInt($($(this).find("td")[3]).text());
				listOrder.push({
					mamonan: mamonan,
					soluong: soluong
				});
			});
			localStorage.setItem("listOrder", JSON.stringify(listOrder));
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
			let sdt = $(".sdt").val() == "" ? "0123456789" : $(".sdt").val();
			let total = parseInt($(".total_order").text());
			fetch(`<?php echo _WEB_ROOT ?>/donHang/insert/${sdt}/${total}/<?php echo json_decode($_SESSION['user'])->maNhanVien ?>/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
				.then(res => res.text())
				.then(data => {
					if (data == 1) {
						alert("Đã gửi order cho nhân viên bếp");

						fetch(`<?php echo _WEB_ROOT ?>/donHang/getMaDonHangMoiNhat/<?php echo json_decode($_SESSION['user'])->maCuaHang ?>`)
							.then(res => res.text())
							.then(data => {
								let listOrder = JSON.parse(localStorage.getItem("listOrder"));
								listOrder.forEach(element => {
									fetch(`<?php echo _WEB_ROOT ?>/chiTietDonHang/insert/${data}/${element.mamonan}/${element.soluong}`)
										.catch(err => console.log("Loi insert chitiethoadon"))
								});
							});
						$(".tbody-order").children().remove();
						$(".total_order").text("");
						$("#modalOrder").modal("hide");
						$(".number-items").text("");
					} else {
						alert("Có gì đó đã xảy ra");
					}
				})
				.catch(err => console.log(err))
		});



	})
</script>