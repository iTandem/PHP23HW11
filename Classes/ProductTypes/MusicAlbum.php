<?php
    
    namespace ProductTypes;
    use \Base\Product as Product;
    
    class MusicAlbum extends Product
    {
        private $duration;
        private $tracks;
        
        public function __construct($title, $artist, $duration, array $tracks, $price)
        {
            parent::__construct($title, $price, $discount = 10);
            
            $this->price;
            $this->tracks = $tracks;
        }
        
        
        public function getDuration()
        {
            return $this->duration;
        }
        
        public function setDuration($duration)
        {
            $this->duration = $duration;
            
            return $this;
        }
        
        public function getTracks()
        {
            return $this->tracks;
        }
        
        public function setTracks($tracks)
        {
            $this->tracks = $tracks;
            
            return $this;
        }
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 17:15
     */