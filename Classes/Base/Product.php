<?php
    
    namespace Base;
    
    abstract class Product
    {
        protected $title;
        protected $price;
        protected $discount;
        protected $deliveryPrice;
        
        public function __construct($title, $price, $discount)
        {
            $this->title = $title;
            $this->price = $price;
            $this->discount = $discount;
            $this->deliveryPrice = $discount ? 300 : 250;
        }
        
        public function getTitle()
        {
            return $this->title;
        }
        
        public function setTitle($title)
        {
            $this->title = $title;
            
            return $this;
        }
        
        public function getPrice()
        {
            return round($this->price*(1 - 0.01 * $this->discount));
        }
        
        public function setPrice($price)
        {
            $this->price = $price;
            
            return $this;
        }
        
        public function getDiscount()
        {
            return $this->discount;
        }
        
        public function setDiscount($discount)
        {
            $this->discount = $discount;
            
            return $this;
        }
        
        public function getDeliveryPrice()
        {
            return $this->deliveryPrice;
        }
        
        public function setDeliveryPrice($deliveryPrice)
        {
            $this->deliveryPrice = $deliveryPrice;
            
            return $this;
        }
    }
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:07
     */