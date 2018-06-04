<?php
    
    namespace Base;
    
    use \Base\Cart as Cart;
    use \Exceptions\WrongStatusException as WrongStatusException;
    
    class Order extends Cart
    {
        const STATUSES = ['Принят', 'Оформлен', 'Выполен', 'Отказ'];
        
        protected static $incrementor = 0;
        
        protected $id;
        protected $status = 0;
        // @ TODO Delivery address
        
        
        public function __construct($cart)
        {
            parent::__construct();
            
            $this->products = $cart->getProducts();
            $this->customer = $cart->getCustomer();
            
            $this->id = 'ORD'.(1000000 + ++self::$incrementor);
            
            return $this;
        }
        
        public function getId()
        {
            return $this->id;
        }
        
        public function getStatus()
        {
            return $this->status;
        }
        
        public function setStatus($status)
        {
            $id = $this->getId();
            try {
                if (!in_array($status, array_keys(self::STATUSES))) {
                    throw new WrongStatusException("Статуса с id $id не существует!");
                } elseif($status <= $this->status) {
                    throw new WrongStatusException("Невозможно установить статус ниже текущего!");
                } else {
                    $this->status = $status;
                }
            } catch (WrongStatusException $e) {
                echo 'Ошибка статуса заказа: '.$e->getMessage().PHP_EOL;
            }
            
            return $this;
        }
        
        public function __toString()
        {
            $result = PHP_EOL.'Заказ '.$this->getId().':'.PHP_EOL;
            $result .= 'Статус: '.self::STATUSES[$this->status].PHP_EOL;
            foreach ($this->getProducts() as $id => $product) {
                $result .= "$id: {$product->getTitle()}: {$product->getPrice()} р.\n";
            }
            $result .= "\n==========\nИтого: {$this->getTotal()} р.\n";
            
            return $result;
        }
        
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:06
     */