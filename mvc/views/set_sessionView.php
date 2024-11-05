

<?php
	$arr = $data["data"]["data"];
	if(empty($arr)) $arr[0] = $data["data"]["value"];
	if (isset($_POST['value'])) {
		$type = $_POST['value'];
		$quanlity =$_POST['quanlity'];
		if (!isset($_SESSION['carts'][$type])) {
			$_SESSION['carts'][$type] = $quanlity;
	} else $_SESSION['carts'][$type] = $_SESSION['carts'][$type]+$quanlity;
	$str = '';
	$i = 0;
	foreach ($_SESSION['carts'] as $p => $q) {
		$p = substr($p,0, -2);
		// $str = $str.'8383';
		$t = $arr[0];
		$str = $str.'<p><image style="width:100px; height:100px;" src="/public/images/products/'.$p.'/1.png">'.$t.' - '.$q.'</p>';
		$i++;
	}
    echo json_encode(['status' => 'success','value' => $str]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No value provided']);
}


// <?php
// $type = $_POST['value'];
// $quanlity =$_POST['quanlity'];
// if (!isset($_POST['carts'])) {
// 	$_SESSION['carts'][$type] = $quanlity;
// } else {
//     $_SESSION['carts'][$type] = $quanlity+$_SESSION['carts'][$type];
// }

// echo json_encode(['status' => 'success', 'value' => $_SESSION['carts']]);
