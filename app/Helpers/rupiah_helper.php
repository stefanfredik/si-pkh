<?php

function rupiah($angka) {
    if ($angka == 0 || $angka == null) {
        return "Rp. 0";
    }
    return "Rp. " . number_format($angka, 0, ',', '.');
}
