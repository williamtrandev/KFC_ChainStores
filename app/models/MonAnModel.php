<?php
class MonAnModel extends BaseModel
{
	public function getAll()
	{
		$res = $this->db->query("select * from monan");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getNewFood()
	{
		$res = $this->db->query("select * from monan order by maMonAn desc limit 12");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getMonAnById($id)
	{
		$res = $this->db->prepare("select * from monan where id_loaimon = ?");
		$res->bind_param("d", $id);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function insert($name, $detail, $price, $image_path)
	{
		$res = $this->db->prepare("insert into combo (name, detail, price, image_path) values(?,?,?,?)");
		$res->bind_param("ssis", $name, $detail, $price, $image_path);
		$res->execute();
		return $res->affected_rows;
	}
	public function update($name, $detail, $price, $image_path, $id_combo)
	{
		if ($image_path == '') {
			$res = $this->db->prepare("update combo set name=?, detail=?, price=? where id_combo=?");
			$res->bind_param('ssii', $name, $detail, $price, $id_combo);
			$res->execute();
		} else {
			$res = $this->db->prepare("update combo set name=?, detail=?, price=?, image_path=? where id_combo=?");
			$res->bind_param('ssisi', $name, $detail, $price, $image_path, $id_combo);
			$res->execute();
		}
		return $res->affected_rows;
	}
	public function delete($id_combo)
	{
		$res = $this->db->prepare("update combo set deleted=1 where id_combo=?");
		$res->bind_param('i', $id_combo);
		$res->execute();
		return $res->affected_rows;
	}
}
