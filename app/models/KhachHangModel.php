<?php
class KhachHangModel extends BaseModel
{
	public function authenticate($sdt, $matkhau)
	{
		$res = $this->db->prepare("select count(*) as ketqua from khachhang where sdt=? and matkhau=?");
		$res->bind_param("ss", $sdt, $matkhau);
		$res->execute();
		return json_encode($res->get_result()->fetch_assoc()['ketqua'] == 1);
	}
}
