<?php 
	if (!function_exists('uang')) {
		function uang($angka, $rupiah = false){
            
            $uang = number_format($angka,0,',','.');
            if ($rupiah) {
                return "Rp " . $uang;
            }
            return $uang;
        }
	}
?>