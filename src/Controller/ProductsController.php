<?php  
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;  




class ProductsController extends AbstractController
{
   /** 
    * @Route("/") 
   */ 
   public function index(CategoryRepository $categoryRepository) {
        return $this->render('products/index.html.twig', ['mainCategories' => $categoryRepository->mainCategories()]);
   }

    /**
     * @Route("/{slug}", name="category_products")
     */
    public function categoryProducts($slug, ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $categoryProducts = $productRepository->categoryProducts($slug);
        return $this->render('products/category_products.html.twig', [
            'categoryProducts' => $categoryProducts,
            'mainCategories' => $categoryRepository->mainCategories()
        ]);
    } 
}


