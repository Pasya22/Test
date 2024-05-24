<?php
function isBalancedBracket($str) {
    // Inisialisasi stack
    $stack = [];
    
    // Iterasi melalui string
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        
        // Jika karakter adalah tanda kurung pembuka, masukkan ke dalam stack
        if ($char == '(' || $char == '{' || $char == '[') {
            array_push($stack, $char);
        }
        // Jika karakter adalah tanda kurung penutup
        elseif ($char == ')' || $char == '}' || $char == ']') {
            // Periksa apakah stack kosong
            if (empty($stack)) {
                return "NO";
            }
            // Ambil tanda kurung teratas dari stack
            $top = array_pop($stack);
            // Periksa apakah tanda kurung teratas cocok dengan tanda kurung penutup saat ini
            if (($char == ')' && $top != '(') || ($char == '}' && $top != '{') || ($char == ']' && $top != '[')) {
                return "NO";
            }
        }
    }
    
    // Periksa apakah stack kosong setelah iterasi selesai
    return (empty($stack)) ? "YES" : "NO";
}

// eksekusi kasus
$input1 = "{[()]}";
$input2 = "{[(])}";
$input3 = "{{[[(())]]}}";

echo "Input: $input1 => Output: " . isBalancedBracket($input1) . "\n";
echo "Input: $input2 => Output: " . isBalancedBracket($input2) . "\n";
echo "Input: $input3 => Output: " . isBalancedBracket($input3) . "\n";

