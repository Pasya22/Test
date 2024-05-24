<?php
function highestPalindrome($string, $k) {
    // Ubah string menjadi array karakter
    $chars = str_split($string);
    // Fungsi rekursif untuk mencari palindrom tertinggi
    $findPalindrome = function($chars, $left, $right, $k, $func) use (&$findPalindrome) {
        // Jika semua karakter, sudah diperiksa atau tidak ada penggantian yang tersisa, maka kembalikan string
        if ($left >= $right) {
            return implode('', $chars);
        }
        // Jika karakter di posisi "$left" dan "$right" sama, maka lanjutkan ke karakter selanjutnya
        if ($chars[$left] == $chars[$right]) {
            return $func($chars, $left + 1, $right - 1, $k, $func);
        }
        // Ganti karakter di posisi "$left" dan "$right" dengan yang lebih besar
        $chars[$left] = $chars[$right] = max($chars[$left], $chars[$right]);
        // Kurangi jumlah penggantian yang tersisa jika dilakukan penggantian
        $k--;
        // Jika jumlah penggantian telah habis, maka kembalikan -1
        if ($k < 0) {
            return -1;
        }
        // dan lanjutkan pencarian palindrom pada posisi karakter selanjutnya
        return $func($chars, $left + 1, $right - 1, $k, $func);
    };
    // Manggil fungsi rekursif dengan parameter awal
    $result = $findPalindrome($chars, 0, strlen($string) - 1, $k, $findPalindrome);
    // Jika hasil akhir adalah -1, maka kembalikan -1, jika tidak, maka kembalikan string hasil
    return ($result == -1) ? -1 : intval($result);
}

// eksekusi kasus
$string1 = "3943";
$k1 = 1;
echo "Sampel 1: " . highestPalindrome($string1, $k1) . "\n";

$string2 = "3943";
$k2 = 1;
echo "Sampel 2: " . highestPalindrome($string2, $k2) . "\n"; 