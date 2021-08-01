<?php
session_start();
require_once "db.php";

if (isset($_GET['product_id']) && $_GET['product_id']) {
	$product_id = $_GET['product_id'];

	$data = "";

	$sql = "SELECT s.text as matni, s.date as sana, user.username as foydalanuvchi
		FROM comment s
		INNER JOIN users user ON user.id = s.user_id
		WHERE product_id=".$product_id;

	$data .= '<table>';
	foreach ($conn->query($sql) as $comment) {
		$data .= '<tr>
			<td><b>'.$comment['foydalanuvchi'].'</b></td>
			<td align="right">'.date('d.m.Y H:i', strtotime($comment['sana'])).'</td>
		</tr>';
		$data .= '<tr>
			
			<td colspan="2">'.$comment['matni'].'</td>
			
		</tr>';
	}

	$data .= '</table>';

	echo $data;
}
?>