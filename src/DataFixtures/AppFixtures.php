<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 7; $i++) {
            $cat = new Category();
            $cat->setTitle('category '.$i);
            $cat->setSlug('category '.$i);
            if(1 === $i){
                $cat1 = $cat;
            }
            if(2 === $i){
                $cat2 = $cat;
            }
            if(3 === $i){
                $cat3 = $cat;
            }
            if(4 === $i){
                $cat4 = $cat;
                $cat->setParent($cat2);
            }
            if(5 === $i){
                $cat5 = $cat;
                $cat->setParent($cat3);
            }
            if(6 === $i){
                $cat6 = $cat;
                $cat->setParent($cat3);
            }
            if(7 === $i){
                $cat7 = $cat;
                $cat->setParent($cat6);
            }
            $manager->persist($cat);
        }


        for ($i = 1; $i <= 21; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $product->setDescription(mt_rand(10, 100));
            $product->setPhoto('bluza-618e8ded87168.jpg');
            $product->addCategory(${'cat'.ceil($i/3)});
            $manager->persist($product);
        }


        $manager->flush();
    }
}
