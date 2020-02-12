<?php
/**
* Builder is a creational design pattern that lets you construct complex objects 
* step by step. The pattern allows you to produce different types and 
* representations of an object using the same construction code.
*/
 namespace CreationalBuilder{
class BuilderDesign{
   public function __construct(){
         add_action('wp_ajax_builderClientCode', array($this,'builderClientCode'));
         add_action('wp_ajax_nopriv_builderClientCode', array($this,'builderClientCode'));
  }
/**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  function builderClientCode(){
       $director = new Director;
       $builder = new ConcreteBuilder1;
       $director->setBuilder($builder);
       $house_type=$_POST["house_type"];
       $dataArraya=[];
       if ($house_type==1) {
           $director->buildFullFeaturedProduct();
        }
       else{
           $director->buildMinimalViableProduct();
        }
 
        $dataArraya["steps"]= $builder->getProduct()->listParts();
    
       echo json_encode($dataArraya);
    wp_die();
    }
}

/**
 * The Builder interface specifies methods for creating the different parts of
 * the Product objects.
 */
interface Builder
{
    public function makeWalls(): void;
    public function makeDoor(): void;
    public function makeWindow(): void;
    public function makeRoof(): void;
    public function makeSwimmingPool(): void;
}
/**
 * The Concrete Builder classes follow the Builder interface and provide
 * specific implementations of the building steps. Your program may have several
 * variations of Builders, implemented differently.
 */
class ConcreteBuilder1 implements Builder
{
    private $product;
     /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct()
    {
        $this->reset();
    }
    public function reset(): void
    {
        $this->product = new Product1;
    }
     /**
     * All production steps work with the same product instance.
     */
      public function makeWalls(): void
    {
        $this->product->parts[] = "Attech Walls";
    }
    public function makeDoor(): void
    {
        $this->product->parts[] = "Attech Door";
    }
    public function makeWindow(): void
    {
        $this->product->parts[] = "Attech Window";
    }
    public function makeRoof(): void
    {
        $this->product->parts[] = "Attech Roof";
    }
    public function makeSwimmingPool(): void
    {
        $this->product->parts[] = "Attech SwimmingPool";
    }
   
    public function getProduct(): Product1
    {
        $result = $this->product;
        $this->reset();
        return $result;
    }
}
/**
 * It makes sense to use the Builder pattern only when your products are quite
 * complex and require extensive configuration.
 *
 * Unlike in other creational patterns, different concrete builders can produce
 * unrelated products. In other words, results of various builders may not
 * always follow the same interface.
 */
class Product1
{
    public $parts = [];
    public function listParts()
    {
        return "<h3>Facilities:</h3>" . implode(', ', $this->parts) . "<br>";
    }
}
/**
 * The Director is only responsible for executing the building steps in a
 * particular sequence. It is helpful when producing products according to a
 * specific order or configuration. Strictly speaking, the Director class is
 * optional, since the client can control builders directly.
 */
class Director
{
    /**
     * @var Builder
     */
    private $builder;
    /**
     * The Director works with any builder instance that the client code passes
     * to it. This way, the client code may alter the final type of the newly
     * assembled product.
     */
    public function setBuilder(Builder $builder): void
    {
        $this->builder = $builder;
    }
    /**
     * The Director can construct several product variations using the same
     * building steps.
     */
    public function buildMinimalViableProduct(): void
    {
        $this->builder->makeWalls();
        $this->builder->makeDoor();
         $this->builder->makeWindow();
        $this->builder->makeRoof();
    }
    public function buildFullFeaturedProduct(): void
    {
        $this->builder->makeWalls();
        $this->builder->makeDoor();
        $this->builder->makeWindow();
        $this->builder->makeRoof();
        $this->builder->makeSwimmingPool();
    }
}
}