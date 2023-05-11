<div class="dangchieu" id="showing">
	<div class="mt-5 title text">
		<h2 class="mb-0">CÁC MÓN MỚI</h2>
	</div>

	<div class="container">
		<div class="row">
			<?php
			foreach ($monan as $item) {
				# code...
				echo 
				"<div class='col-md-3'>
				<div class='card'>
					<img class='card-img-top' src='"._WEB_ROOT."/public/assets/client/img/$item->image_path' alt=''>
					<div class='card-body'>
						<h5 class='card-title'>$item->tenMonAn</h5>
						<p class='card-text'>$item->donViTinh</p>
					</div>
				</div>
			</div>";
			}
			?>	
		</div>
	</div>
</div>