<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CartController extends Controller
{
    /**
     * @Route("/showCartItems")
     */
    public function showCartItemsAction()
    {
        return $this->render('AppBundle:Cart:show_cart_items.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/addToCart")
     */
    public function addToCartAction()
    {
        return $this->render('AppBundle:Cart:add_to_cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeFromCart")
     */
    public function removeFromCartAction()
    {
        return $this->render('AppBundle:Cart:remove_from_cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/changeCart")
     */
    public function changeCartAction()
    {
        return $this->render('AppBundle:Cart:change_cart.html.twig', array(
            // ...
        ));
    }

}
