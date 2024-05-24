<?php
function calculateWeight($char, $count) {
    $baseWeights = [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
    ];
    return $baseWeights[$char] * $count;
}

function weightedStrings($string, $queries) {
    $weights = [];
    $length = strlen($string);
    
    // Iterasi string untuk menghitung bobot substring
    for ($i = 0; $i < $length; $i++) {
        $currentChar = $string[$i];
        $count = 1;
        
        // ini untuk Menangani karakter berulang
        while ($i + 1 < $length && $string[$i + 1] == $currentChar) {
            $count++;
            $i++;
        }
        
        //  untuk karakter yang berulang
        for ($j = 1; $j <= $count; $j++) {
            $substring = str_repeat($currentChar, $j);
            $weight = calculateWeight($currentChar, $j);
            $weights[$substring] = $weight;
        }
    }
    
    // Periksa setiap queri terhadap bobot uniknya
    $results = [];
    foreach ($queries as $query) {
        if (in_array($query, $weights)) {
            $results[] = "Yes";
        } else {
            $results[] = "No";
        }
    }
    
    // Cetak detail substring dan bobotnya
    foreach ($weights as $substring => $weight) {
        echo "Substring: $substring, Weight: $weight\n";
    }
    
    return $results;
}

// eksekusi kasus
$string = "abbcccd";
$queries = [1, 3, 9, 8];
$output = weightedStrings($string, $queries);
print_r($output);
 