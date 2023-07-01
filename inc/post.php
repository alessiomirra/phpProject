<?php 

require 'functions.php'; 

// get the values from the form 

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!$token || $token !== $_SESSION['token']) {
    // show an error message
    echo '<p class="error">Error: invalid form submission</p>';
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
}

// name and surname 
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["name"] = $name; 
if (!$name || trim($name) === ""){
    $errors["name"] = "Non hai inserito il tuo nome"; 
}; 

$surname = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["surname"] = $surname; 
if (!$surname || trim($surname) === ""){
    $errors["surname"] = "Non hai inserito il tuo cognome"; 
}; 

// day, month and year of birth
$day = filter_input(INPUT_POST, "day", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["day"] = $day; 
if (!$day || trim($day) === ""){
    $errors["day"] = "Non hai inserito il tuo giorno di nascita"; 
}; 
$month = filter_input(INPUT_POST, "month", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["month"] = $month; 
if (!$month || trim($month) === ""){
    $errors["month"] = "Non hai inserito il tuo mese di nascita"; 
}; 
$year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["year"] = $year; 
if (!$year || trim($year) === ""){
    $errors["year"] = "Non hai inserito il tuo anno di nascita"; 
}; 

// gender
$gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["gender"] = $gender; 
if (!$gender || trim($gender) === ""){
    $errors["year"] = "Specifica il sesso"; 
}; 

// city and district
$city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["city"] = $city; 
if (!$city || trim($city) === ""){
    $errors["city"] = "Non hai inserito la tua città di nascita"; 
};
$district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
$inputs["district"] = $district; 
if (!$district || trim($district) === ""){
    $errors["district"] = "Non hai inserito la tua provincia di nascita"; 
};


// call the functions and calculate the code 

$name_code = componeString($name); 
$surname_code = componeString($surname); 
$day_code = dayCode($gender, $day);
$month_code = monthCode($month);  
$year_code = yearCode($year);
$city_code = getCode($city, $district); 

$temporary_code = $surname_code . $name_code . $year_code . $month_code . $day_code . $city_code ; 

$control = calculateControlCode($temporary_code);

$definitive = $temporary_code . $control; 

echo "<div class='alert alert-success text-center' role='alert'>{$definitive}</div>";

?>
