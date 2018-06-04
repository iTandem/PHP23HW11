<?php
    
    namespace Base;
    use \Base\Product as Product;
    use \Exceptions\NoPriceException as NoPriceException;
    use \Exceptions\NoProductException as NoProductException;
    
    class Cart
    {
        protected $products = [];
        protected $customer;
        
        public function __construct($customer = null)
        {
            $this->customer = $customer;
        }
        
        public function getCustomer()
        {
            return $this->customer;
        }
        
        public function getProducts()
        {
            return $this->products;
        }
        
        public function setCustomer($customer)
        {
            $this->customer = $customer;
            
            return $this;
        }
        
        public function add(Product $product)
        {
            try {
                if ($product->getPrice()){
                    $this->products[] = $product;
                }
                else {
                    throw new NoPriceException("Цена товара {$product->getTitle()} указана или равна 0!");
                }
            } catch (NoPriceException $e) {
                echo 'Внимание! '.$e->getMessage().PHP_EOL;
            }
            
            
            
            return $this;
        }
        
        public function remove($id)
        {
            
            try {
                if (in_array($id, array_keys($this->products))){
                    unset($this->products[$id]);
                }
                else {
                    throw new NoProductException("Товара с id $id нет в корзине!");
                }
            } catch (NoProductException $e) {
                echo 'Внимание! '.$e->getMessage().PHP_EOL;
            }
            
            
            
            return $this;
        }
        
        public function getTotal()
        {
            if (empty($this->products)) {
                return 0;
            }
            else {
                $total = 0;
                foreach($this->products as $product)
                {
                    $total += $product->getPrice();
                }
                
                return $total;
            }
        }
        
        public function __toString()
        {
            if (empty($this->products)) {
                return 'Корзина пуста'.PHP_EOL;
            }
            else {
                $result = PHP_EOL;
                foreach ($this->products as $id => $product) {
                    $result .= "$id: {$product->getTitle()}".PHP_EOL;
                }
                
                return $result;
            }
        }
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:02
     */