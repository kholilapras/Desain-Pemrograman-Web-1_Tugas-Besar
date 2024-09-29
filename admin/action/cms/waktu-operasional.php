<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'waktu-operasional') {
    $id = $_POST['id'];
    $senin = $_POST['senin'];
    $selasa = $_POST['selasa'];
    $rabu = $_POST['rabu'];
    $kamis = $_POST['kamis'];
    $jumat = $_POST['jumat'];
    $sabtu = $_POST['sabtu'];
    $minggu = $_POST['minggu'];

    $sql = "UPDATE waktu_operasional SET 
                senin = '$senin', 
                selasa = '$selasa', 
                rabu = '$rabu', 
                kamis = '$kamis', 
                jumat = '$jumat', 
                sabtu = '$sabtu', 
                minggu = '$minggu' 
            WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: page.php?page=waktu-operasional");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Close connection
$koneksi->close();
