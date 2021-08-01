<?php
if (isset($_GET['son']) && $_GET['son']) {
	$son = $_GET['son'];

	$i = 2;
	$count = 0;

	$inc = 0;

	while ($i <= $son) {
	  $count = 0;

	  $j = 1;
	  while($i >= $j){
	  	$inc ++;
	    if ($i % $j == 0 ) {
	      $count++;
	    }
	    $j++;
	  }
	  if($count == 2){
	    echo  "Tub son : ".$i."<br>";
	  }
	  $i++;
	}

	echo "Sikl aylanish soni=".$inc;

	echo "<hr>";
	$i = 2;
	$inc = 0;

	while ($i <= $son) {
		$tub = true;

		$j = 2;

		while ($j < $i) {
			$inc ++;
			if ($i % $j == 0) {
				$tub = false;
				break;
			}

			$j ++;
		}

		if ($tub) {
			echo $i.", ";
		}

		$i ++;
	}
	echo "<br>Sikl aylanish soni=".$inc;
}
?>