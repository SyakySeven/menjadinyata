<?php
function rupiah($price)
	{
        $res = "Rp. " . number_format($price, 0, ",", ".");
        return $res;
	}
?>
