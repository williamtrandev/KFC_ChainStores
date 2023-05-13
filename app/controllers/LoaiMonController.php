<?php
class LoaiMonController extends BaseController
{
	public $model_loaimon, $data = [];
	public function __construct()
	{
		$this->model_loaimon = $this->model("LoaiMonModel");
	}
	public function getAll()
	{
		echo $this->model_loaimon->getAll();
	}
}
