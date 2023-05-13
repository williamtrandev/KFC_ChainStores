<?php
class MonAnModel extends BaseModel
{
	public function getAll()
	{
		$res = $this->db->query("select * from monan where deleted = 0");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getNewFood()
	{
		$res = $this->db->query("select * from monan where deleted = 0 order by maMonAn desc limit 12");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getMonAnById($id)
	{
		$res = $this->db->prepare("select * from monan where deleted = 0 and id_loaimon = ?");
		$res->bind_param("d", $id);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function insert($name, $detail, $price, $image_path, $loaimon)
	{
		$res = $this->db->prepare("insert into monan (tenMonAn, mota, gia, image_path, id_loaimon) values(?,?,?,?,?)");
		$res->bind_param("ssisi", $name, $detail, $price, $image_path, $loaimon);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function update($name, $detail, $price, $image_path, $id_loaimon, $mamonan)
	{
		if ($image_path == '') {
			$res = $this->db->prepare("update monan set tenMonAn=?, mota=?, gia=?, id_loaimon=? where maMonAn=?");
			$res->bind_param('ssiii', $name, $detail, $price, $id_loaimon, $mamonan);
			$res->execute();
		} else {
			$res = $this->db->prepare("update monan set tenMonAn=?, mota=?, gia=?, image_path=?, id_loaimon=? where maMonAn=?");
			$res->bind_param('ssisii', $name, $detail, $price, $image_path,$id_loaimon, $mamonan);
			$res->execute();
		}
		return $res->affected_rows == 1;
	}
	public function delete($mamonan)
	{
		$res = $this->db->prepare("update monan set deleted=1 where maMonAn=?");
		$res->bind_param('i', $mamonan);
		$res->execute();
		return $res->affected_rows == 1;
	}
}
