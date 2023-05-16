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
	public function getDetailQuanLyByMaCuaHang($macuahang)
	{
		$data = $this->db->prepare("select * from nhanvien where chucVu='Quản lý' and maCuaHang = ?");
		$data->bind_param("i", $macuahang);
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
	public function authenticateMobile($sdt, $matkhau)  {
		$res = $this->db->prepare("select * from nhanvien where sdt=? and matkhau=?");
		$res->bind_param("ss", $sdt, $matkhau);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		$status = count($data) == 1;
		return json_encode(array('status' => $status, 'data' => $data[0]));
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
	public function getAllNhanVienGiaoHang($macuahang)
	{
		$res = $this->db->prepare("select * from nhanvien where macuahang = ? and chucVu = 'Nhân viên giao hàng' and deleted=0");
		$res->bind_param('i', $macuahang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllNhanVienBanHang($macuahang)
	{
		$res = $this->db->prepare("select * from nhanvien where macuahang = ? and chucVu = 'Nhân viên bán hàng' and deleted=0");
		$res->bind_param('i', $macuahang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllDauBep($macuahang)
	{
		$res = $this->db->prepare("select * from nhanvien where macuahang = ? and chucVu = 'Đầu bếp' and deleted=0");
		$res->bind_param('i', $macuahang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function insert($tennv, $gioitinh, $ngaysinh, $sdt, $diachi, $chucVu, $maCuaHang, $matkhau)
	{
		$res = $this->db->prepare("insert into NhanVien (tenNhanVien, gioiTinh, ngaySinh, sdt, diaChi, chucVu, maCuaHang, matkhau) values(?,?,?,?,?,?,?,?)");
		$res->bind_param('sissssis', $tennv, $gioitinh, $ngaysinh, $sdt, $diachi, $chucVu, $maCuaHang, $matkhau);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function update($tennv, $gioitinh, $ngaysinh, $diachi, $chucVu, $matkhau, $manv)
	{
		$res = $this->db->prepare("UPDATE NhanVien SET tenNhanVien=?, gioiTinh=?, ngaySinh=?, diaChi=?, chucVu=?, matkhau=? WHERE maNhanVien=?");
		$res->bind_param('sissssi', $tennv, $gioitinh, $ngaysinh, $diachi, $chucVu, $matkhau, $manv);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function delete($manv)
	{
		$res = $this->db->prepare("UPDATE NhanVien SET deleted=1 WHERE maNhanVien=?");
		$res->bind_param('i', $manv);
		$res->execute();
		return $res->affected_rows == 1;
	}
}
