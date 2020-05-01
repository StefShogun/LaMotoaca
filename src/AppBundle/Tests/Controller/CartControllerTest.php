<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartControllerTest extends WebTestCase
{
    public function testShowcartitems()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showCartItems');
    }

    public function testAddtocart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addToCart');
    }

    public function testRemovefromcart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeFromCart');
    }

    public function testChangecart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/changeCart');
    }

}
