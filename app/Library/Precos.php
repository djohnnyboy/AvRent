<?php

namespace App\Library;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Precos {
    // quotePeriod properties
    private $validMedia;
    private $validAlta;
    private $validMediaAlta;
    private $validBaixa;
    // ano global
    private $ano;
    // epoca media properties
    private $epocaMediaIn;
    private $epocaMediaOut;
    private $epocaMedia;
    // epoca alta properties
    private $epocaAltaIn;
    private $epocaAltaOut;
    private $epocaAlta;
    // epoca mediaAlta properties
    private $epocaMediaAlta;
    private $epocaMediaAltaIn;
    private $epocaMediaAltaOut;

    public function __construct(){
        
        $this->validMedia = 0;
        $this->validAlta = 0;
        $this->validMediaAlta = 0;
        $this->validBaixa = 0;
        // ano global
        $this->ano = date('y');
        // epoca media properties
        $this->epocaMediaIn = null;
        $this->epocaMediaOut = null;
        $this->epocaMedia = null;
        // epoca alta properties
        $this->epocaAltaIn = null;
        $this->epocaAltaOut = null;
        $this->epocaAlta = null;
        // epoca mediaAlta properties
        $this->epocaMediaAlta = null;
        $this->epocaMediaAltaIn = null;
        $this->epocaMediaAltaOut = null;
    }

    public function quotePeriod($start, $end){
        /* properties of the class precos has the client suggest it 
            was made with a fixed season date */
        $quotePeriod = CarbonPeriod::create($start, $end);
        
        if ($quotePeriod->getStartDate() >= $this->epocaMedia()->getStartDate() && 
               $quotePeriod->getEndDate() <= $this->epocaMedia()->getEndDate() ) {

            $this->validMedia = $quotePeriod->count()-1;

            return 'epocaMedia '.$this->validMedia;

        }elseif($quotePeriod->getStartDate() >= $this->epocaAlta()->getStartDate() && 
                    $quotePeriod->getEndDate() <= $this->epocaAlta()->getEndDate() ){

            $this->validAlta = $quotePeriod->count()-1;

            return 'epocaAlta '.$this->validAlta; 

        }elseif($quotePeriod->getStartDate() >= $this->epocaMediaAlta()->getStartDate() && 
                    $quotePeriod->getEndDate() <= $this->epocaMediaAlta()->getEndDate() ){

            $this->validMediaAlta = $quotePeriod->count()-1;

            return 'epocaAltaMedia '.$this->validMediaAlta; 
            
        }else{

            $this->validBaixa = $quotePeriod->count()-1;

            return 'epocaBaixa '.$this->validBaixa; 
        }      
    }

    private function epocaMedia(){

        // epoca media function 
        $this->epocaMediaIn = "$this->ano-04-01";
        $this->epocaMediaOut = "$this->ano-06-20";
        $this->epocaMedia = CarbonPeriod::create($this->epocaMediaIn, $this->epocaMediaOut);

        return $this->epocaMedia;

    }    
    private function epocaAlta(){

        // epoca Alta function
        $this->epocaAltaIn = "$this->ano-06-21";
        $this->epocaAltaOut = "$this->ano-08-31";
        $this->epocaAlta = CarbonPeriod::create($this->epocaAltaIn, $this->epocaAltaOut);

        return $this->epocaAlta;

    }
    private function epocaMediaAlta(){

        // epoca mediaAlta function 
        $this->epocaMediaAltaIn = "$this->ano-09-01";
        $this->epocaMediaAltaOut = "$this->ano-10-31";
        $this->epocaMediaAlta = CarbonPeriod::create($this->epocaMediaAltaIn, $this->epocaMediaAltaOut);

        return $this->epocaMediaAlta;

    }
}

?>