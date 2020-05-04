<?php

namespace AppBundle\Controller;
use AppBundle\Entity\CartItem;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Orders;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends Controller
{
    /**
     * @Route("/addClient")
     */
    public function addClientAction(Request $request)
    {
        $input = $request->request;
        $token = $input->get('token');

        $order = new Orders();
        $order->customer = $this->getUser()->customer;
        $order->billingAddress = $this->getBillingAddress($input);
        $order->shippingAddress = $this->getShippingAddress($input);

        $transaction = $order->checkout($token);
        $orderId = $transaction->order->id;
        return $this->redirect("/orders/${orderId}");
    }

    /**
     * @Route("/previewOrder")
     */
    public function previewOrderAction(Request $request, $id)
{
    $order = Orders::findById($id);
    return $this->render('AppBundle:Order:preview_order.html.twig', [
        'order' => $order
    ]);
}


    /**
     * @Route("/createOrder")
     */
    public function createOrderAction(Request $request)
    {


        $order = new Orders();
        $order->customer = $this->getUser()->customer;
        $order->billingAddress = $this->createAddress();
        $order->shippingAddress = $this->createAddress();
        return $this->render('AppBundle:Order:add_client.html.twig', [
            'order' => $order
        ]);
    }
}
