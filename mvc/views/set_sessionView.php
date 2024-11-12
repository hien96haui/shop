<?php
	if(!isset($_POST["post_type"])){
		$colors = $data["data"]["colors"];
		$sizes = $data["data"]["sizes"];
		$getTypeList = $data["data"]["getTypeList"];
		if (isset($_POST['value'])) {
			$type = $_POST['value'];
			$quanlity =$_POST['quanlity'];
			if (!isset($_SESSION['carts'][$type])) {
				$_SESSION['carts'][$type] = $quanlity;
			} else $_SESSION['carts'][$type] = $_SESSION['carts'][$type]+$quanlity;
			$str = '';
			$i = 0;
			foreach ($_SESSION['carts'] as $p => $q) {
				$p1 = substr($p,0,-2);
				$p2 = substr($p,-5,1);
				$p3 = substr($p,-3,1);
				$p4 = substr($p,-1,1);
				$t = $colors[$i];
				$s = $sizes[$i];
				$qstr = '';
				$getTypeListStr='';
				$getColorListStr='';
				$getSizeListStr='';
				for($j = 1; $j<=30;$j++){
					if($j==$q)
						$qstr=$qstr.'<option value='.$j.' data-other="'.$p.'" selected>'.$j.'</option>';
					else
						$qstr=$qstr.'<option value='.$j.' data-other="'.$p.'">'.$j.'</option>';

				}
				$c = count($getTypeList);
				for($j = 0; $j<$c;$j++){
					if(($j+1).""==$p2)
						$getTypeListStr=$getTypeListStr.'<option value='.($j+1).' selected>'.$getTypeList[$j].'</option>';	
					else $getTypeListStr=$getTypeListStr.'<option value='.($j+1).'>'.$getTypeList[$j].'</option>';	
				}
				for($j = 0; $j<count($t);$j++){
					if(($j+1).""==$p3)
						$getColorListStr=$getColorListStr.'<option value='.($j+1). ' selected>'.$t[$j].'</option>';	
					else $getColorListStr=$getColorListStr.'<option value='.($j+1). '>'.$t[$j].'</option>';						
				}
				for($j = 0; $j<count($s);$j++){
					if(($j+1).""==$p4)
						$getSizeListStr=$getSizeListStr.'<option value='.($j+1). ' selected>'.$s[$j].'</option>';	
					else $getSizeListStr=$getSizeListStr.'<option value='.($j+1). '>'.$s[$j].'</option>';
						//$getSizeListStr=$getSizeListStr.'<option value='.$s[$j].'>'.$s[$j].'</option>';	
					
				}
				$str = $str.'<p>
				<div class="imachange" data-product-id="'.$p.'""><image style="width:100px; height:100px;" src="/public/images/products/'.$p1.'/1.png"></div>
				<select class="typeChange" data-product-id="'.$p.'" style="width: 4em; height: 41px; margin-right: 5px;">'.$getTypeListStr.'</select>
				<select class="color-change" data-product-id="'.$p.'" style="width: 3em; height: 41px; margin-right: 5px;">'.$getColorListStr.'</select>
				<select class="size-change" data-product-id="'.$p.'" style="width: 3em; height: 41px; margin-right: 5px;">'.$getSizeListStr.'</select>
				<select id="quanlilyChange" style="width: 3em; height: 41px; margin-right: 5px;">'.$qstr.'</select>
				</p> ';
				$i++;
			}
	    	echo json_encode(['status' => 'success','value' => $str]);
		} else {
		    echo json_encode(['status' => 'error', 'message' => 'No value provided']);
		}
	}
	else {
		
		$updateType = $_POST["post_type"];
		if($updateType=="1"){	
			$colors = $data["data"];
			$count = count($colors);
			$str="";
			for($j = 0;$j<$count;$j++)
			$str = $str.'<option value="'.($j+1).'">'.$colors[$j].'</option>';
			echo json_encode(['status' => 'success','value' => $str]);	

		}
		if ($updateType=="2") {
			$sizes = $data["data"];
			$count = count($sizes);
			$str="";
			for($j = 0;$j<$count;$j++)
			$str = $str.'<option value="'.($j+1).'">'.$sizes[$j].'</option>';
			echo json_encode(['status' => 'success','value' => $str]);
		}	
		if($updateType=="3"){
			$type = $_POST["value"];
			$quanlity = $_POST["quanlity"];
			$_SESSION['carts'][$type] = $quanlity;
			echo json_encode(['status' => 'success','value' => ""]);	
		}	
		// echo json_encode(['status' => 'success','value' => "o"]);
	}
