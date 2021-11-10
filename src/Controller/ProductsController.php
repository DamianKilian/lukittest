<?php  
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;  




class ProductsController extends AbstractController
{
   /** 
    * @Route("/") 
   */ 
   public function index(CategoryRepository $categories) {


        return $this->render('products/index.html.twig', ['mainCategories' => $categories->mainCategories()]);
   }

    /**
     * @Route("/{slug}", name="category_products")
     */
    public function categoryProducts(Category $category) {

dump($category);
exit();//mydump
        return $this->render('products/category_products.html.twig', ['category' => $category]);
    } 
}


