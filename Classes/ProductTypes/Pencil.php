<?php
    
    namespace ProductTypes;
    use \Base\Product as Product;
    
    class Pencil extends Product
    {
        private $color = [127, 127, 127];
        
        public function __construct($title, $price, array $color) {
            parent::__construct($title, $price, $discount = 10);
            
            $this->color = $color;
        }
        
        public function getColor()
        {
            return $this->color;
        }
        
        public function setColor($color)
        {
            $this->color = $color;
            
            return $this;
        }
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:15
     */