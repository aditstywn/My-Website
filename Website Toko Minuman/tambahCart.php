<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {	
	$brg=$_GET['brg'];
	$hrg=$_GET['hrg'];
	$jml=$_GET['jml'];
	if (!empty($_SESSION['cart']['arrCart'])){
		$max=sizeof($_SESSION['cart']['arrCart']);
		$find=false;
		
		for ($i=0;$i<$max;$i++){
			$cari=array_search($brg, $_SESSION['cart']['arrCart'][$i]);
			if ($cari) {
				$_SESSION['cart']['arrCart'][$i]['jml']+=1;
                // $tot = 0;
				// $tot=$tot+$hrg;
				$find=true;
				break;
				//echo "tot =$tot";
			}			
		}			
	}
	if (!$find){
		$item = array('nmBrg'=>$brg, 'jml'=>$jml, 'hrg'=>$hrg);
		array_push($_SESSION["cart"]["arrCart"],$item);		
	}
	
 }
header("location:pesanan.php");	
?>