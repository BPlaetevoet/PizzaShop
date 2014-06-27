<?php
//ProductDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Product;
use Pizzashop\Data\IngredientDao;
use Doctrine\Common\Util\Debug;

class ProductDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Product')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $product = $mgr->getRepository('Pizzashop\\Entities\\Product')->find($id);
        return $product;
    }
    public function getOneByNaam($mgr, $naam){
        $product = $mgr->getRepository('Pizzashop\\Entities\\Product')->findOneBy($naam);
        return $product;
    }
    public function getOrderedByValue($mgr, $value){
        $query = $mgr->createQuery('select p from Pizzashop\\Entities\\Product p order by p.'.$value);
        $lijst = $query->getResult();
        return $lijst;
    }
    public function getByIngredient($mgr, $ingredient){
        $qb = $mgr->createQueryBuilder();
        $qb->select('p')
                ->from('Pizzashop\\Entities\\Product', 'p' )
                ->join('Pizzashop\\Entities\\Ingredient', 'i')
                ->where($qb->expr()->eq('i.product', 'p.id'))
                ->andwhere($qb->expr()->eq('i.i_naam', '?1'))
                ->setParameter(1, $ingredient)
                ->groupBy('i.product');
        $query = $qb->getQuery();
        $lijst = $query->getResult();
        return $lijst;
    }    
    public function addProduct($mgr, $naam, $prijs, $samenstelling){
        $product = new Product($naam, $prijs);
        foreach($samenstelling as $i_naam){
            $ingredient = IngredientDao::addIngredient($mgr, $product, $i_naam);
            $product->AddIngredient($ingredient);
        }
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
    public function deleteProduct($mgr, $product){
        $mgr->remove($product);
        $mgr->flush();
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs){
        $product = ProductDao::getById($mgr, $id);
        $product->setNaam($naam);
        $product->setSamenstelling($samenstelling);
        $product->setPrijs($prijs);
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
    
    public function getCurrentLijst($mgr){
        $pizzas = ProductDao::getAll($mgr);
            $lijst = array();
            $today = new \DateTime('NOW');
            foreach($pizzas as $pizza){
                $item = array(
                    'id'=>$pizza->getId(), 
                    'naam'=>$pizza->getNaam(),
                    'samenstelling'=>array($pizza->getSamenstelling()),
                    'prijs'=>$pizza->getPrijs(),
                    'promo'=>false
                    );
                foreach($pizza->getPromo() as $promotie){
                    if ($today > $promotie->getBegindatum() && $today < $promotie->getEinddatum()){
                        $item['prijs']= $promotie->getPromoprijs();
                        $item['promo']= true;
                    }
                }
                 array_push($lijst, $item);
            }
            return $lijst;
    }
}

