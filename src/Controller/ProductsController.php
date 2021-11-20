<?php  
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;  
use Symfony\Component\HttpFoundation\Cookie;



class ProductsController extends AbstractController
{
   /** 
    * @Route("/") 
   */ 
   public function index(CategoryRepository $categoryRepository) {
        return $this->render('products/index.html.twig', ['mainCategories' => $categoryRepository->mainCategories()]);
    }

    /**
     * @Route("/products/{slug}", name="category_products")
     */
    public function categoryProducts($slug, Request $request, ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $sortProductsBy = $request->cookies->get('sortProductsBy');
        $categoryProducts = $productRepository->categoryProducts($slug, $sortProductsBy);
        return $this->render('products/category_products.html.twig', [
            'sortProductsBy' => $sortProductsBy,
            'categoryProducts' => $categoryProducts,
            'mainCategories' => $categoryRepository->mainCategories()
        ]);
    }

    /**
     * @Route("/products/{slug}/{sortProductsBy}", name="products")
     */
    public function products($slug, $sortProductsBy, ProductRepository $productRepository) {
        $response = new Response();
        $response->headers->setCookie( Cookie::create('sortProductsBy')
            ->withValue($sortProductsBy)
            ->withExpires(time() + (86400 * 30)) // 1 day
        );
        $categoryProducts = $productRepository->categoryProducts($slug, $sortProductsBy);
        $contents = $this->renderView('products/products.html.twig', [
            'categoryProducts' => $categoryProducts,
        ]);
        $response->setContent($contents);
        return $response;
    }
}


