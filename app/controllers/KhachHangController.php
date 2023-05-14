<?php
class KhachHangController extends BaseController
{
	public $model_kh, $data = [];
	public function __construct()
	{
		$this->model_kh = $this->model("KhachHangModel");
	}
	public function authenticate($sdt, $matkhau)
	{
		echo $this->model_kh->authenticate($sdt, $matkhau);
	}
}
