<?php
if (!empty($_POST['email']) && !empty($_POST['message'])) {
	$name = $_POST['name'] ?? '';
	$lastName = $_POST['nameName'] ?? '';
	$email = $_POST['email'];
	$message = $_POST['message'];

	$html = <<<HTML
	<h3>Сообщение отправлено с помощью контактной формы на сайте litecdn</h3>
	<p>Имя: $name</p>
	<p>Фамилия: $lastName</p>
	<p>Почта: $email</p>
	<p>Сообщение: $message</p>
	HTML;
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=utf-8';
	if (mail("info@litecdn.ru", "Форма обратной связи на сайте", $html, $headers)) {
		echo json_encode(['status' => 'success', 'message' => 'mail has been sent']);
	}
}