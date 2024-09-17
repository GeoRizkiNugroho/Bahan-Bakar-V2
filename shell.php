<?php
    class Shell {
        protected $ppn;
        private $SSuper, $SVPower, $SVPowerDiesel, $SVPowerNitro;

        public function __construct(){
            $this->ppn = 0.1;
        }

        public function SetHarga($tipe1, $tipe2, $tipe3, $tipe4){
            $this->SSuper = $tipe1;
            $this->SVPower = $tipe2;
            $this->SVPowerDiesel = $tipe3;
            $this->SVPowerNitro = $tipe4;
        }

        public function GetHarga(){
            $data["SSuper"] = $this->SSuper;
            $data["SVPower"] = $this->SVPower;
            $data["SVPowerDiesel"] = $this->SVPowerDiesel;
            $data["SVPowerNitro"] = $this->SVPowerNitro;
            return $data;
        }
    }

    class Beli extends Shell {
        public $jumlah;
        public $jenis;

        public function HargaBeli(){
            $DataHarga = $this->GetHarga();
            $HargaBeli = $this->jumlah * $DataHarga[$this->jenis];
            $hargaPPN = $HargaBeli * $this->ppn;
            $HargaBayar = $HargaBeli + $hargaPPN;
            return $HargaBayar;
        }

        public function HargaPPN(){
            $DataHarga = $this->GetHarga();
            $HargaBeli = $this->jumlah * $DataHarga[$this->jenis];
            return $HargaBeli * $this->ppn;
        }

        public function CetakPembelian(){
            $DataHarga = $this->GetHarga();
            $hargaPerLiter = $DataHarga[$this->jenis];
            $totalHargaDasar = $this->HargaBeli() - ($this->HargaBeli() * $this->ppn);
            $hargaPPN = $this->HargaPPN();

            echo "<center>";
            echo "<div class='output'>";
            echo "<h2>Detail Pembelian</h2>";
            echo "<p>Anda membeli bahan bakar minyak tipe: <span class='highlight'>" . $this->jenis . "</span></p>";
            echo "<p>Dengan jumlah: <span class='highlight'>" . $this->jumlah . " Liter</span></p>";
            echo "<p>Harga per liter: <span class='highlight'>Rp " . number_format($hargaPerLiter, 0, ',', '.') . "</span></p>";
            echo "<p>Harga sebelum pajak: Rp " . number_format($totalHargaDasar, 0, ',', '.') . "</p>";
            echo "<p>PPN (10%): Rp " . number_format($hargaPPN, 0, ',', '.') . "</p>";
            echo "<p>Total yang harus dibayar: <span class='highlight'>Rp " . number_format($this->HargaBeli(), 0, ',', '.') . "</span></p>";
            echo "<div class='output-footer'>Terima kasih telah membeli bahan bakar!</div>";
            echo "<a href='index.php' class='back-button'>Kembali ke Form Pengisian</a>";
            echo "</center>";
            echo "</div>";
        }
    }
?>
