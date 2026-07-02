<?php

require_once __DIR__ . "/../config/Database.php";

class Aset
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Menampilkan semua data aset
    public function getAll()
    {
        $query = "SELECT * FROM aset ORDER BY id_aset ASC";
        return $this->conn->query($query);
    }

public function search($keyword)
{
    $query = "SELECT * FROM aset
              WHERE
              kode_barang LIKE ?
              OR nama_barang LIKE ?
              OR kategori LIKE ?
              OR lokasi LIKE ?
              ORDER BY id_aset ASC";

    $stmt = $this->conn->prepare($query);

    $keyword = "%".$keyword."%";

    $stmt->bind_param(
        "ssss",
        $keyword,
        $keyword,
        $keyword,
        $keyword
    );

    $stmt->execute();

    return $stmt->get_result();
}

    // Menambahkan data aset
    public function insert($data)
{
    $query = "INSERT INTO aset
    (id_aset, kode_barang, nama_barang, kategori, lokasi, jumlah, kondisi, tanggal_masuk, foto, user_input)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($query);

    $stmt->bind_param(
        "issssissss",
        $data['id_aset'],
        $data['kode_barang'],
        $data['nama_barang'],
        $data['kategori'],
        $data['lokasi'],
        $data['jumlah'],
        $data['kondisi'],
        $data['tanggal_masuk'],
        $data['foto'],
        $data['user_input']
    );

    return $stmt->execute();
}

    public function getById($id)
{
    $query = "SELECT * FROM aset WHERE id_aset = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}

public function update($data)
{
    $query = "UPDATE aset SET
                kode_barang = ?,
                nama_barang = ?,
                kategori = ?,
                lokasi = ?,
                jumlah = ?,
                kondisi = ?,
                tanggal_masuk = ?,
                foto = ?,
                user_input = ?
              WHERE id_aset = ?";

    $stmt = $this->conn->prepare($query);

    $stmt->bind_param(
        "ssssissssi",
        $data['kode_barang'],
        $data['nama_barang'],
        $data['kategori'],
        $data['lokasi'],
        $data['jumlah'],
        $data['kondisi'],
        $data['tanggal_masuk'],
        $data['foto'],
        $data['user_input'],
        $data['id_aset']
    );

    return $stmt->execute();
}

public function delete($id)
{
    $query = "DELETE FROM aset WHERE id_aset = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

}