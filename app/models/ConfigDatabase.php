<?php
class Keuangan {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'n1577759_fransiska1', 'latihanphp123', 'n1577759_fransiska1');
    }

    public function tambahData() {
        if(isset($_POST['tambahdata'])) {
            $Tanggal    = $_POST['Tanggal'];
            $Keterangan = $_POST['Keterangan'];
            $Debit      = $_POST['Debit'];
            $Kredit     = $_POST['Kredit'];
            $sql = "INSERT INTO keuangan (id, tanggal, keterangan, debit, kredit) VALUES ( '','$Tanggal', '$Keterangan', '$Debit', '$Kredit')";
            mysqli_query($this->conn, $sql);
            header("location: index.php");
        }
    }

    public function ambilData() {
        return mysqli_query($this->conn, "SELECT * FROM keuangan");
    }

    public function ubahData() {
        if(isset($_POST['ubahdata'])) {
            $ID         = $_POST['id'];
            $Tanggal    = $_POST['Tanggal'];
            $Keterangan = $_POST['Keterangan'];
            $Debit      = $_POST['Debit'];
            $Kredit     =$_POST['Kredit'];
            $sql = "UPDATE keuangan  SET tanggal= '$Tanggal',keterangan= '$Keterangan',debit='$Debit',kredit='$Kredit' WHERE id=$ID";
            mysqli_query($this->conn, $sql);
            header("location: index.php");
        }
    }

    public function hapusData() {
        if (isset($_POST['hapus'])) {
            $ID = $_POST['id'];
            $query = "DELETE FROM keuangan WHERE id = '$ID'";
            $result = mysqli_query($this->conn, $query);
            header('Location: index.php');
        }
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}

$keuangan = new Keuangan();

$keuangan->tambahData();
$AmbilData = $keuangan->ambilData();
$keuangan->ubahData();
$keuangan->hapusData();

?>