<?php
    
    namespace Traits;
    
    trait CalculateDiscount
    {
        public function calculateDiscount($baseDiscount)
        {
            return ($this->weight > 10) ? $baseDiscount : 0;
        }
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:28
     */