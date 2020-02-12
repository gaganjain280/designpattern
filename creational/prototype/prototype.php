<?php
 namespace CreationalPrototype{
class PrototypeDesign{
   public function __construct(){
         add_action( 'wp-footer', array($this,'add_sripts' ));
         add_action('wp_ajax_prototypeClientCode', array($this,'prototypeClientCode'));
         add_action('wp_ajax_nopriv_prototypeClientCode', array($this,'prototypeClientCode'));
  }
/**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  function prototypeClientCode(){
    $p1 = new Prototype;
    $p1->quantity = $_POST['quantity'];
    $p1->component = new \DateTime;
    $p1->derivery= "CAR";
    $p1->Price = 1200;
    $p2 = clone $p1;
    $p3 = clone $p1;
    $p4 = clone $p1;
    $p5 = clone $p1;
    var_dump($p2);
    var_dump($p3);
    var_dump($p4);
    var_dump($p5);
    $p1->derivery= "TRUCK";
    $p2->derivery ="TACTOR";
    $p3->derivery ="AUTO";
    $p4->derivery ="PLANE";
    $p5->derivery ="SUMARINE";
    echo "Delivery by  ".$p1->derivery; ?><br> 
   <?php echo "Price =".$p1->Price;?>    <br><hr><?php
    echo "Delivery by ".$p2->derivery; ?><br> 
   <?php echo "Price =".$p1->Price+(100);?>    <br><hr><?php
    echo "Delivery by ".$p3->derivery; ?><br> 
   <?php echo "Price =".$p1->Price*3;?>    <br><hr><?php
    echo "Delivery by ".$p4->derivery; ?><br> 
   <?php echo "Price =".$p1->Price+($p1->Price*7);?>    <br><hr><?php
    echo "Delivery by ".$p5->derivery; ?><br> 
   <?php echo "Price =".$p1->Price+($p1->Price*8);?>    <br><hr><?php
      wp_die();
    }
}
new PrototypeDesign();

class Prototype
{
    public $quantity;
    public $component;

    /**
     * PHP has built-in cloning support. You can `clone` an object without
     * defining any special methods as long as it has fields of $quantity types.
     * Fields containing objects retain their references in a cloned object.
     * Therefore, in some cases, you might want to clone those referenced
     * objects as well. You can do this in a special `__clone()` method.
     */
    public function __clone()
    {
        $this->component = clone $this->component;

        // Cloning an object that has a nested object with backreference
        // requires special treatment. After the cloning is completed, the
        // nested object should point to the cloned object, instead of the
        // original object.
    }
}
}