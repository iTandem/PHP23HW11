<?php
    
    require_once 'autoloader.php';
    
    use \Base\Cart as Cart;
    use \Base\Order as Order;
    use \ProductTypes\Food as Food;
    use \ProductTypes\MusicAlbum as MusicAlbum;
    use \ProductTypes\Pencil as Pencil;
    
    $steak = new Food('Ribai', 700, 300, 10);
    
    // echo $steak->getTitle();
    // echo $steak->getPrice().PHP_EOL;
    // echo $steak->getDeliveryPrice().PHP_EOL;
    
    $potatoes = new Food('Potatoes', 45, 15, 20);
    
    // echo $potatoes->getPrice().PHP_EOL;
    
    $tracks = ['Highway to Hell', 'Girls Got Rhythm', 'Walk All Over You', 'Beating Around the Bush'];
    $acdc = new MusicAlbum('Highway to Hell', 'AC/DC', '48:00', $tracks, 500);
    
    // echo $acdc->getPrice().PHP_EOL;
    
    $yellowPencil = new Pencil('Standard regular yellow pencil', 20, [255, 255, 0]);
    $pricelessPencil = new Pencil('Priceless silver pencil', 0, [240, 240, 240]);
    
    // echo $yellowPencil->getPrice().PHP_EOL;
    
    $cart = new Cart();
    
    $cart->add($potatoes);
    $cart->add($steak);
    $cart->add($acdc);
    $cart->add($yellowPencil);
    $cart->add($pricelessPencil);

    // echo $cart->getTotal().PHP_EOL;
    // echo nl2br($cart);
    
    $cart->remove(10);

    // $cart->remove(0);
    // echo nl2br($cart);
    
    $ord = new Order($cart);
    
    // echo $ord->getId().PHP_EOL;
    
    echo nl2br($ord) . PHP_EOL;
    $ord->setStatus(3);
    $ord->setStatus(1);
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 16:54
     */