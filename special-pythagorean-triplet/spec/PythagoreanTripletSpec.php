<?php
/**
 * Note: 
 */

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PythagoreanTripletSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PythagoreanTriplet');
    }


    function it_computes_triplets_where_c_is_under_10(){
    	$this->generate(10)->shouldReturn([[3,4,5], [6,8,10]]);
    }

    function it_computes_whether_two_numbers_make_an_odd(){
    	$this->is_odd(2, 5)->shouldReturn(true);
    }

    function it_computes_factors(){
    	$this->factors(9)->shouldReturn([1, 3]); 
    }

    function it_computes_coprimes(){
    	$this->is_coprime(1, 2)->shouldReturn(true);
    }

    function it_computes_coprimes_correctly(){
    	$this->is_coprime(12, 6)->shouldReturn(false);
    }

    function it_knows_n_is_less_than_m(){
    	$this->m_is_greater_than_n(2, 4)->shouldReturn(true);
    }

    function it_computes_triplets(){
    	$this->is_triplet(3,4,5)->shouldReturn(true);
     }
    function it_computes_triplets_where_c_is_under_20(){
    	$this->generate(20)->shouldReturn([[3,4,5],[6,8,10],[9,12,15],[12,16,20],[5, 12, 13], [15,8,17]]);
    }

    function it_computes__a_given_m_and_n(){
       $this->find_a(['m' => 2, 'n' => 1, 'k' => 1])->shouldReturn(3);  
    }

    function it_computes_b_given_m_and_n(){
        $this->find_b(['m'=> 2, 'n' => 1, 'k' => 1])->shouldReturn(4);
    }

    function it_computes_c_given_m_and_n(){
        $this->find_c(['m' => 2, 'n' => 1, 'k' => 1])->shouldReturn(5);
    }

    function it_computes_m_and_n_given_a_max_value_for_c(){
        $this->find_m_and_n(10)->shouldReturn([[ 'm'=> 2, 'n' => 1], ['m' => 3, 'n'=> 2]]);
    }

    function it_determins_m_and_n_are_valid(){
        $this->m_and_n_are_valid(['m' => 2, 'n' => 1])->shouldReturn(true);
    }

    function it_determins_m_and_n_given_max_27_for_c(){
        $this->find_m_and_n(27)->shouldReturn([['m' => 2, 'n' => 1],['m' => 3, 'n'=> 2],['m' => 4, 'n' => 1 ], ['m' => 4, 'n' => 3]]);
    }

}
