<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Bahan Bakar</title>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.title h1 {
    font-size: 28px;
    color: #2c3e50;
    margin-bottom: 20px;
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

label {
    display: block;
    font-size: 16px;
    margin-bottom: 8px;
    color: #7f8c8d;
}

select{
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    background-color: #ecf0f1;
}
input[type="number"] {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    background-color: #ecf0f1;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}
.output {
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 20px auto;
    text-align: left;
    font-size: 16px;
    color: #2c3e50;
}

.output h2 {
    font-size: 22px;
    margin-bottom: 15px;
    color: #2980b9;
}

.output p {
    margin: 10px 0;
    line-height: 1.6;
}

.output .highlight {
    color: #e74c3c;
    font-weight: bold;
}

.output-footer {
    margin-top: 20px;
    text-align: center;
}

.result {
    display: none; /* Hide the result initially */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 999;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
}

center {
    text-align: center;
}

        .result {
            display: none; /* Hide the result initially */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }


    .back-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
<?php
include 'shell.php';
$beli = new Beli();
$beli->SetHarga(15420, 16130, 18310, 16510);
$showForm = true;

if (isset($_POST['kirim'])) {
    $beli->jenis = isset($_POST['jenis']) ?  $_POST['jenis'] : '';
    $beli->jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : 0;
    
    if($beli->jumlah > 0 && !empty($beli->jenis)){
        $showForm = false;
        $beli->CetakPembelian();
    }
}
?>
<?php if ($showForm) : ?>
<center>
    <div class="title">
        <h1>Bahan Bakar Shell</h1>
    </div>
    <form action="" method="POST">
        <label>Pilih Tipe Bahan Bakar :</label>
        <select name="jenis" id="jenis"> 
            <option disabled selected> --- Pilih Tipe Shell ---</option>
            <option value="SSuper">Shell Super</option>
            <option value="SVPower">Shell V Power</option>
            <option value="SVPowerDiesel">Shell V Power Diesel</option>
            <option value="SVPowerNitro">Shell V Power Nitro</option>
        </select>
        <label>Jumlah Liter :</label>
        <input type="number" name="jumlah" id="jumlah" placeholder="Masukan Jumlah Liter">          
        <input type="submit" value="kirim" name="kirim">
    </form>
</center>
<?php endif; ?>
</body>
</html>
