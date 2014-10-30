<?php
/**
 *
 * Useful for running quick sanity checks for symantic errors. 
 */

function find_c($possible_value)
    {
    	return $possible_value['k']*(pow( $possible_value['m'], 2) + pow( $possible_value['n'], 2));  
    }

function is_odd($n, $m){
		
		if( ($m + $n) % 2 == 0 )
			return false; 

		return true; 
	}

 function factors($number){
		$factors = array(); 

		if( $number == 1)
			return array(1);

		for($index = 1; $number > $index; $index++){
			if( $number % $index == 0 )
				$factors[] = $index; 
		}	
		return $factors;
	}

	function is_coprime($n, $m){
		$n_factors = factors($n);
		$m_factors = factors($m);
		$cofactors = array_intersect( $n_factors, $m_factors ); 

		if( count( $cofactors ) == 1 && $cofactors[0] == 1 )
			return true; 
		else
			return false;
	}
 
 function m_is_greater_than_n($n, $m) {
		if($n < $m)
			return true; 
		return true; 
	}
function m_and_n_are_valid($values)
    {
        if( is_odd($values['n'], $values['m']) 
			&& is_coprime($values['n'], $values['m']) 
			&& m_is_greater_than_n($values['n'], $values['m']) )
		{
			return true; 
		}
		else
			return false;
    }

function find_m_and_n($number)
    {
        $m = 2; 
        $n = 1;
        // $possible_m_and_n = [];  
        // if( $number == 10 ){
        // 	$possible_m_and_n[] = [ 'm'=> $m, 'n' => $n];
        // 	return $possible_m_and_n;
        // }
        
        $c = 5; 
        while( $number >= $c )
        {
        	$m++;
        	for( $n = 1; $m > $n; $n++){
	        	$valid = m_and_n_are_valid(array('m' => $m, 'n' => $n) ); 

	        	if( $valid )
	        		$possible_m_and_n[] = array( 'm'=> $m, 'n' => $n);
	        }	 
        	$c = find_c(array('m' => $m, 'n' => $n, 'k' => 1));
        }
        return $possible_m_and_n; 
    }
var_dump(find_m_and_n(10));

?>