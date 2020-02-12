<?php
/**
* Flyweight is a structural design pattern that allows objects with
* incompatible interfaces to collaborate.
*/
 namespace StructuralFlyweight{
  class FlyweightPattern{
    public function __construct(){
         add_action('wp_ajax_flyweightClientCode', array($this,'flyweightClientCode'));
         add_action('wp_ajax_nopriv_flyweightClientCode', array($this,'flyweightClientCode'));
    }
   

/**
 * The client code may issue several similar download requests. In this case,
 * the caching Flyweight saves time and traffic by serving results from cache.
 *
 * The client is unaware that it works with a Flyweight because it works with
 * downloaders via the abstract interface.
 */
  public function flyweightClientCode(){
   $thtml='';
   $material_name=$_POST['material_name'];
   $Quantity=$_POST['Quantity'];

   $MakeRationList = new RationList();
   $shop = new Ration($MakeRationList);
   $thtml.=$shop->addMaterial('add', $material_name);
   $thtml.=$shop->addMaterial('add', $Quantity);
   $thtml.=$shop->addItem();
   echo $thtml;
   wp_die();
  }
}
interface Text
{
    public function render(string $extrinsicState): string;
}

class RationList
{
    protected $availablematerial = [];
    public function make($preference)
    {
        if (empty($this->availablematerial[$preference])) {
            $this->availablematerial[$preference];
        }
        return $this->availablematerial[$preference];
    }
}
class Ration
{
    protected $wish;
    protected $MakeRationList;
    public function __construct(RationList $MakeRationList)
    {
        $this->MakeRationList = $MakeRationList;
    }
    public function addMaterial(string $materialType, string $material)
    {
        $this->wish[$material] = $this->MakeRationList->make($materialType);
    }
    public function addItem()
    {
        foreach ($this->wish as $material => $type) {
            echo $material."<br>";
        }
    }
}

}

