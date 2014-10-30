<?php

class PythagoreanTriplet
{

	public function generate( $number ){

	$possible_values = $this->find_m_and_n( $number );
		$triplets = [];
		$c = 5; 
		$i = 0; 
		foreach ( $possible_values as $value ){
			for( $k = 1; $number > $c; $k++ ){ 
				$value['k'] = $k; 
				$a = $this->find_a( $value );
				$b = $this->find_b( $value ); 
				$c = $this->find_c( $value );
			
				if( $number >= $c ) 
					$triplets[] = [ $a, $b, $c ];
				else 
					continue;
			}
			$i++; 
			if( isset( $value[$i] )) 
				$value = $value[$i];
	
			
			$value['k'] = 1; 
			$c = $this->find_c( $value );	
		}
		return $triplets;
	}
	
	public function is_odd($n, $m){
		
		if( ($m + $n) % 2 == 0 )
			return false; 

		return true; 
	}

	public function factors($number){
		$factors = []; 

		if( $number == 1)
			return [1];

		for($index = 1; $number > $index; $index++){
			if( $number % $index == 0 )
				$factors[] = $index; 
		}	
		return $factors;
	}

	public function is_coprime($n, $m){
		$n_factors = $this->factors($n);
		$m_factors = $this->factors($m);
		$cofactors = array_intersect( $n_factors, $m_factors ); 

		if( count( $cofactors ) == 1 && $cofactors[0] == 1 )
			return true; 
		else
			return false;
	}
 
	public function m_is_greater_than_n($n, $m) {
		if($n < $m)
			return true; 
		return true; 
	}

	public function is_triplet($a, $b, $c){

		if( pow($a, 2) + pow($b, 2 ) == pow($c, 2) )
			return true; 

		return false;
	}

    public function find_a($possible_value)
    {
        return $possible_value['k']*(pow( $possible_value['m'], 2) - pow( $possible_value['n'], 2));
    }

    public function find_b($possible_value)
    {
        return $possible_value['k']*(2*$possible_value['m']*$possible_value['n']);
    }

    public function find_c($possible_value)
    {
    	return $possible_value['k']*(pow( $possible_value['m'], 2) + pow( $possible_value['n'], 2));  
    }

    public function find_m_and_n($number)
    {
        $m = 2; 
      	$possible_m_and_n = array();
      	$possible_m_and_n[] = ['m' => 2, 'n' => 1]; 
        $c = 5; 
        while( $number > $c )
        {
        	$m++;
        	for( $n = 1; $m > $n; $n++){
	        	$valid = $this->m_and_n_are_valid(['m' => $m, 'n' => $n] ); 

	        	if( $valid )
	        		$possible_m_and_n[] = [ 'm'=> $m, 'n' => $n];
	        }	 
        	$c = $this->find_c(['m' => $m, 'n' => $n, 'k' => 1]);
        }
        return $possible_m_and_n; 
    }

    public function m_and_n_are_valid($values)
    {
        if( $this->is_odd($values['n'], $values['m']) 
			&& $this->is_coprime($values['n'], $values['m']) 
			&& $this->m_is_greater_than_n($values['n'], $values['m']) )
		{
			return true; 
		}
		else
			return false;
    }
}


$euler = new PythagoreanTriplet(); 

$trips = $euler->generate(1000); 

/**
 *Sloppy but this gets er done. 
 *
 */
foreach ( $trips as $t ){
	if( $t[0] + $t[1] + $t[2] === 1000 ){
		echo $t[0]*$t[1]*$t[2] . "<br />";
	}
}

