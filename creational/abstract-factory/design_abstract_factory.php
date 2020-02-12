<?php

namespace CreationalAbstractFactory{
class LoadAbstractFactoryFunctions{
  public function __construct(){     
       //****************** Load main method  *******************//                
        add_action('wp_ajax_abstract_design', array($this,'abstract_design'));
        add_action('wp_ajax_nopriv_abstract_design', array($this,'abstract_design'));
 } 
                
  //********* Main responsible for get data from front end ***********//        
  public function abstract_design(){
	  $thtml ="";
    $thtml.="<table>";
	  $abstract_factory_type = $_POST["abstract_factory_type"];            
    $quantity      =$_POST["quantity"];
	 // $SelectFactory = new SelectFactory;
    
	  if($abstract_factory_type==1){
	 // "Client: Testing client code with the first factory type";
	  $thtml.="<tr><td><h1> Factory type is Import Delivery System.</tr></td>";
	  $thtml.="</table></h3>";
    echo $thtml;	
    clientCode(new ImportFactory,$quantity,11000);
		}else{
	 // "Client: Testing the same client code with the second factory type:
		$thtml.="<tr><td><h1>Factory type  is Export Delivery System.</tr></td>";
	  $thtml.="</table></h3>";
    echo $thtml;
    clientCode(new ExportFactory,$quantity,12010);     
  	}
     wp_die();  
  }
}

/**
 * The Abstract Factory interface declares a set of methods that return
 * different abstract products. These products are called a family and are
 * related by a high-level theme or concept. Products of one family are usually
 * able to collaborate among themselves. A family of products may have several
 * variants, but the products of one variant are incompatible with products of
 * another.
 */
interface AbstractFactory
{
    public function firstProduct(): AbstractProductA;

    public function secondProduct(): AbstractProductB;
}

/**
 * Concrete Factories produce a family of products that belong to a single
 * variant. The factory guarantees that resulting products are compatible. Note
 * that signatures of the Concrete Factory's methods return an abstract product,
 * while inside the method a concrete product is instantiated.
 */
class ImportFactory implements AbstractFactory
{
    public function firstProduct(): AbstractProductA
    {
        return new ImportDeliveryProductA;
    }

    public function secondProduct(): AbstractProductB
    {
        return new ImportDeliveryProductB;
    }
}

/**
 * Each Concrete Factory has a corresponding product variant.
 */
class ExportFactory implements AbstractFactory
{
    public function firstProduct(): AbstractProductA
    {
        return new ExportDeliveryProductA;
    }

    public function secondProduct(): AbstractProductB
    {
        return new ExportDeliveryProductB;
    }
}

/**
 * Each distinct product of a product family should have a base interface. All
 * variants of the product must implement this interface.
 */
interface AbstractProductA
{
    public function usefulFunctionA($cost,$materialQuantity): string;
}

/**
 * Concrete Products are created by corresponding Concrete Factories.
 */
class ImportDeliveryProductA implements AbstractProductA
{
    public function usefulFunctionA($cost,$materialQuantity): string
    {
        return "Impot by Truck quantity =".$materialQuantity." and Payble cost = ".$cost;
    }
}

class ExportDeliveryProductA implements AbstractProductA
{
    public function usefulFunctionA($cost,$materialQuantity): string
    {
        return "Export by Truck quantity =".$materialQuantity." and Payble cost = ".$cost;
    }
}

/**
 * Here's the the base interface of another product. All products can interact
 * with each other, but proper interaction is possible only between products of
 * the same concrete variant.
 */
interface AbstractProductB
{
    /**
     * Product B is able to do its own thing...
     */
    public function usefulFunctionB($quantity,$cost): string;

    /**
     * ...but it also can collaborate with the ProductA.
     *
     * The Abstract Factory makes sure that all products it creates are of the
     * same variant and thus, compatible.
     */
    public function anotherUsefulFunctionB(AbstractProductA $collaborator,$cost,$materialQuantity): string;
}

/**
 * Concrete Products are created by corresponding Concrete Factories.
 */
class ImportDeliveryProductB implements AbstractProductB
{
    public function usefulFunctionB($quantity,$cost): string
    {
        return "Import SEA Manage quantity = ".$quantity."<br>with cost =".$cost;
    }
    /**
     * The variant, Product B1, is only able to work correctly with the variant,
     * Product A1. Nevertheless, it accepts any instance of AbstractProductA as
     * an argument.
     */
    public function anotherUsefulFunctionB(AbstractProductA $collaborator,$cost,$materialQuantity): string
    {
        $result = $collaborator->usefulFunctionA($cost,$materialQuantity);

        return "Import with the {$result}";
    }
}

class ExportDeliveryProductB implements AbstractProductB
{
    public function usefulFunctionB($quantity,$cost): string
    {
        return "Export SEA Manage quantity = ".$quantity."<br>with cost =".$cost;
        // return "Manage quantity = ".$quantity;
    }
    /**
     * The variant, Product B2, is only able to work correctly with the variant,
     * Product A2. Nevertheless, it accepts any instance of AbstractProductA as
     * an argument.
     */
    public function anotherUsefulFunctionB(AbstractProductA $collaborator,$cost,$materialQuantity): string
    {
        $result = $collaborator->usefulFunctionA($cost,$materialQuantity);

        return "Export with the {$result}";
    }
}

/**
 * The client code works with factories and products only through abstract
 * types: AbstractFactory and AbstractProduct. This lets you pass any factory or
 * product subclass to the client code without breaking it.
 */
function clientCode(AbstractFactory $factory,$materialQuantity,$cost)
{
  $productA = $factory->firstProduct();

  $productB = $factory->secondProduct();
  
  "<table><tr><td></table><br>";
  echo $productB->usefulFunctionB($materialQuantity,$cost)."<br></tr></td></table>";
  "<table><tr><td></table><br>";
  echo $productB->anotherUsefulFunctionB($productA,$cost,$materialQuantity)."<br></tr></td></table>";
}
}