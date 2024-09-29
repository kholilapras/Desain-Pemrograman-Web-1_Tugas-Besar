<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $input = json_decode(file_get_contents('php://input'), true);

    $pesanan = $input['pesanan'];
    $diskon = $input['diskon'];
    $uangBayar = $input['uangBayar'];

    $total = array_reduce($pesanan, function ($sum, $item) {
        return $sum + $item['subtotal'];
    }, 0);

    $total -= $diskon;
    $kembalian = $uangBayar - $total;

    $response = [
        'status' => 'success',
        'total' => $total,
        'kembalian' => $kembalian,
        'diskon' => $diskon,
        'uangBayar' => $uangBayar,
        'pesanan' => $pesanan
    ];

    echo json_encode($response);
    exit();
}
