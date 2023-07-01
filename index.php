<?php 

require __DIR__ . '/inc/header.php'; 

session_start(); 

$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
	$_SESSION['token'] = bin2hex(random_bytes(35));
	require __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
	require __DIR__ .  '/inc/post.php';
	if ($errors) {
		require	__DIR__ .  '/inc/get.php';
	}
}

require __DIR__ . '/inc/footer.php'; 

?>