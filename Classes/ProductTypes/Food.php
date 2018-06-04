<?php
    
    namespace ProductTypes;
    use \Base\Product as Product;
    
    
    class Food extends Product
    {
        private $weight;
        
        use \Traits\CalculateDiscount;
        
        public function __construct($title, $price, $weight, $discount) {
            
            $this->weight = $weight;
            
            $calculatedDiscount = $this->calculateDiscount($discount);
            
            parent::__construct($title, $price, $calculatedDiscount);
            
        }
        
        public function getWeight()
        {
            return $this->weight;
        }
        
        public function setWeight($weight)
        {
            $this->weight = $weight;
            
            return $this;
        }
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:14
     */