<?php
class NhanVienModel extends BaseModel
{
	public function getDetail($id)
	{
		$data = $this->db->prepare("select * from nhanvien where maNhanVien = ?");
		$data->bind_param("i", $id);
		$data->execute();
		$info = $data->get_result()->fetch_assoc();
		return json_encode($info);
	}
	public function getDetailByPhone($phone)
	{
		$data = $this->db->prepare("select * from nhanvien where sdt = ?");
		$data->bind_param("s", $phone);
		$data->execute();
		$info = $data->get_result()->fetch_assoc();
		return json_encode($info);
	}
	public function login($username, $password)
	{
		$roleStaff = "nv";
		$sql = "SELECT * FROM nhanvien WHERE sdt=?";
		$result = $this->db->prepare($sql);
		$result->bind_param("s", $username);
		$result->execute();
		$user = $result->get_result();
		if ($user->num_rows == 1) {
			$row = $user->fetch_assoc();
			// if (password_verify($password, $row['matkhau'])) {
			if ($password == $row['matkhau']) {
				if ($row['chucVu'] == "Quản lý tổng") {
					$roleStaff = "qlt";
					return ['authenticate' => true, 'roleStaff' => $roleStaff];
				} else if ($row['chucVu'] == "Quản lý") {
					$roleStaff = "ql";
					return ['authenticate' => true, 'roleStaff' => $roleStaff];
				} else {
					return ['authenticate' => true, 'roleStaff' => $roleStaff];
				}
			}
		}
		return ['authenticate' => false, 'roleStaff' => $roleStaff];
	}
	public function checkExists($phone)
	{
		$data = $this->db->prepare("select * from nhanvien where sdt = ?");
		$data->bind_param("s", $phone);
		$data->execute();
		$user = $data->get_result();
		return $user->num_rows == 1;
	}
	public function updateInfo($name, $email, $birthday, $id_khachhang)
	{
		$data = $this->db->prepare("update khachhang set name=?, email=?, birthday=? where id_khachhang=?");
		$data->bind_param("sssi", $name, $email, $birthday, $id_khachhang);
		$data->execute();
		return $data->affected_rows == 1;
	}
	public function getAll($page)
	{
		$offset = ($page - 1) * 10;
		$res = $this->db->query("select * from khachhang order by point desc limit $offset, 10");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllNhanVienGiaoHang($macuahang) {
		$res = $this->db->prepare("select * from nhanvien where macuahang = ? and chucVu = 'Nhân viên giao hàng'");
		$res->bind_param('i', $macuahang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
}
