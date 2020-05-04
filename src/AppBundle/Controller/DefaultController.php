<?php

namespace AppBundle\Controller;
use AppBundle\Entity\CartItem;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:Category');
        $categories = $em->findAll();
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:home.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/{id}", name="category")
     */
    public function categoryAction($id){
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:Category');
        $category = $em->findOneById($id);
        $categories = $em->findAll();
        return $this->render('AppBundle:Default:category.html.twig', ['products'=>$category->getProducts(),
            'categories'=> $categories,
            'category'=> $category
        ]);

    }

    /**
     * @Route("/product/{id}", name="product")
     */
    public function productAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cookie = $request->cookies->get('Uid');
        $cartRepo = $this->getDoctrine()->getManager()->getRepository('AppBundle:Cart');
        $cartItemRepo = $this->getDoctrine()->getManager()->getRepository('AppBundle:CartItem');
        $cartItem = null;
        if($cookie){
            $cart = $cartRepo->findOneByCookie($cookie);
            $cartItem = $cartItemRepo->findOneBy(["cartId"=>$cart->getId(),"productId"=>$id]);
        }
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:Product');
        $products = $em->findAll();
        $product = $em->findOneById($id);
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:Category');
        $category = $em->findOneById($id);
        $categories = $em->findAll();
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:CartItem');
        $cartItems = $em ->findAll();

        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:product.html.twig', [
            'product'=>$product,
            'categories'=>$categories,
            'products'=>$products,
            'cartItems'=>$cartItems,
            'cartItem'=>$cartItem
        ]);
    }
    /**
     * @Route("/search", name="search", methods={"POST"})
     */
    public function searchAction(){
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product');
        $products = $em->findAll();
        $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:Category');
        $categories = $em->findAll();
        $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:CartItem');
        $cartItems = $em->findAll();

        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:contact.html.twig', [

            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
