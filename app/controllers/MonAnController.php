<?php
class MonAnController extends BaseController
{
	public $model_food, $data = [];
	public function __construct()
	{
		$this->model_food = $this->model("MonAnModel");
	}
	public function insert()
	{
		$name = $_POST['name-add'];
		$detail = $_POST['detail-add'];
		$price = $_POST['price-add'];
		$loaimon = $_POST['loaimon-add'];
		$target_dir = 'public/assets/client/img/';
		$image_path = $_FILES['image_path-add']['name'];
		$target_file = $target_dir . basename($image_path);
		move_uploaded_file($_FILES['image_path-add']['tmp_name'], $target_file);
		echo $this->model_food->insert($name, $detail, $price, $image_path, $loaimon);
	}
	public function update()
	{
		$mamonan = $_POST['maMonAn'];
		$name = $_POST['name'];
		$detail = $_POST['detail'];
		$price = $_POST['price'];
		$loaimon = $_POST['loaimon'];
		$target_dir = 'public/assets/client/img/';
		$image_path = $_FILES['image_path']['name'];
		if ($image_path != '') {
			$target_dir = 'public/assets/client/img/';
			$target_file = $target_dir . basename($image_path);
			move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file);
		}
		echo $this->model_food->update($name, $detail, $price, $image_path, $loaimon, $mamonan);
	}
	public function delete($mamonan)
	{
		echo $this->model_food->delete($mamonan);
	}
	public function getMonAnById($id)
	{
		echo $this->model_food->getMonAnById($id);
	}
	public function getAllNguyenLieu($mamonan)
	{
		echo $this->model_food->getAllNguyenLieu($mamonan);
	}
	public function insertNL($mahang, $mamonan, $soluong)
	{
		echo $this->model_food->insertNL($mahang, $mamonan, $soluong);
	}
}
