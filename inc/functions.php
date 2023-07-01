<?php 

function componeString($string){
    $vocals = ["A", "E", "I", "O", "U"]; 
    $upperString = strtoupper($string); 
    $code_string = ""; 
    
    if (strlen($upperString) < 3){
        $code_string = $upperString . 'X'; 
    } else {
        $code_string = ""; 
        $consonants = "";
        $vowels = "";
        
        for ($i=0; $i<strlen($upperString); $i++){
            if (!in_array($upperString[$i], $vocals)){
                $consonants .= $upperString[$i]; 
            } else {
                $vowels .= $upperString[$i]; 
            }
        }
        
        if (strlen($consonants) >= 3){
            $code_string = substr($consonants, 0, 3);
        } else {
            $code_string = $consonants;
            
            $remaining_vowels = 3 - strlen($consonants);
            if ($remaining_vowels > 0){
                $code_string .= substr($vowels, 0, $remaining_vowels);
            }
        }
    }
    
    return $code_string;
};

function yearCode($string){
    $year = substr($string, 2, 2);
    return $year; 
};

function monthCode($string){
    $month_conversion = [
        "Gennaio" => "A", "Febbraio" => "B", "Marzo" => "C", "Aprile" => "D", "Maggio" => "E", 
        "Giugno" => "H", "Luglio" => "L", "Agosto" => "M", "Settembre" => "P", "Ottobre" => "R", 
        "Novembre" => "S", "Dicembre" => "T"
    ];
    $month_code = $month_conversion[$string]; 
    return $month_code; 
}; 

function dayCode($gender, $day){
    if ($gender === "M"){
        if ($day <= 9){
            $day_code = "0".$day; 
            return $day_code; 
        } else {
            $day_code = $day; 
            return $day_code; 
        }
    } else {
        $day_code = $day . "40"; 
        return $day_code; 
    }
}; 

function getCode($city, $district){
    $file = fopen("/Users/alessiomirra/Desktop/codice/belfiore.txt", "r"); 

    if ($file){
        while (($line = fgets($file)) !== false){
            $elements = explode(",", $line); 
            $currentCity = $elements[2]; 
            $currentDistrict = $elements[3];

            if (strcasecmp(trim($currentCity), trim($city)) === 0 && strcasecmp(trim($currentDistrict), trim($currentDistrict)) === 0){
                $code = trim($elements[0]); 
                fclose($file);
                return $code; 
            }
        }

        fclose($file);
    }; 

    return null; 
}; 


function calculateControlCode($characters) {
    $evenValues = [
        '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
        'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3, 'E' => 4, 'F' => 5, 'G' => 6, 'H' => 7, 'I' => 8, 'J' => 9,
        'K' => 10, 'L' => 11, 'M' => 12, 'N' => 13, 'O' => 14, 'P' => 15, 'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19,
        'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23, 'Y' => 24, 'Z' => 25
    ];
    $oddValues = [
        '0' => 1, '1' => 0, '2' => 5, '3' => 7, '4' => 9, '5' => 13, '6' => 15, '7' => 17, '8' => 19, '9' => 21,
        'A' => 1, 'B' => 0, 'C' => 5, 'D' => 7, 'E' => 9, 'F' => 13, 'G' => 15, 'H' => 17, 'I' => 19, 'J' => 21,
        'K' => 2, 'L' => 4, 'M' => 18, 'N' => 20, 'O' => 11, 'P' => 3, 'Q' => 6, 'R' => 8, 'S' => 12, 'T' => 14,
        'U' => 16, 'V' => 10, 'W' => 22, 'X' => 25, 'Y' => 24, 'Z' => 23
    ];

    $oddSum = $evenSum = 0;

    for ($i = 0; $i < strlen($characters); $i++) {
        $char = strtoupper($characters[$i]);
        if ($i % 2 == 0) {
            $oddSum += $oddValues[$char];
        } else {
            $evenSum += $evenValues[$char];
        }
    }

    $totalSum = $oddSum + $evenSum;
    $controlCode = $totalSum % 26;

    $conversionTable = [
        0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D', 4 => 'E', 5 => 'F', 6 => 'G', 7 => 'H', 8 => 'I', 9 => 'J',
        10 => 'K', 11 => 'L', 12 => 'M', 13 => 'N', 14 => 'O', 15 => 'P', 16 => 'Q', 17 => 'R', 18 => 'S', 19 => 'T',
        20 => 'U', 21 => 'V', 22 => 'W', 23 => 'X', 24 => 'Y', 25 => 'Z'
    ];

    return $conversionTable[$controlCode];
}

?> 