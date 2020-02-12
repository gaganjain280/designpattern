<?php
   /*
 * Plugin Name: Factory
 * Plugin URI: http://gagan.codingkloud.com/wp-admin/plugins.php
 * Description: factory Design Pattern.
 * Author: Gagan
 * Author URI: http://gagan.codingkloud.com
 * Version: 1.0.1
 */

class Factory{
public function __construct(){     
        //***************** enque Script file *******************//
        add_action( 'wp_enqueue_scripts', array($this,'add_factory_scripts' ));  
        //****************** Load main method *******************//                
        add_action('wp_ajax_factroyData', array($this,'factroyData'));
        add_action('wp_ajax_nopriv_factroyData', array($this,'factroyData'));

 } 
public  function add_factory_scripts() {       
        
        wp_enqueue_script( 'factory_script_key',  plugins_url(). '/design_pattern/factory.js', array( 'jquery' ));
         wp_localize_script( 'factory_script_key', 'ajax_object', array( 'ajaxurl' =>admin_url( 'admin-ajax.php' ) ) );
         wp_enqueue_script( 'factory_script_key');
        }
                   
     //********* Main responsible for get data from front end **************//        
public function factroyData(){
        $thtml          ="";
        $thtml.="<table>";       
        $oderDetails   = new FactoryMain;
        $BaseTransport = new BaseTransport;
        $factory_type  =$_POST["factory_type"];            
        $quantity      =$_POST["quantity"];
        $oderDetails->materialquantity = $quantity;
        if ($factory_type=="2") 
        {       
         $oderDetails->cost      = "12000";
         $oderDetails->totaltime = "2 Day";
         $order                  = $BaseTransport->createTransport("Sea", $oderDetails);
         $thtml.="<tr><th>Transport by Sea</th></tr>";
        }
         else{
         $oderDetails->totaltime = "1 Day";  
         $oderDetails->cost      = "10000";
         $order                  = $BaseTransport->createTransport("Road", $oderDetails);
         $thtml.="<tr><th>Transport by Road</th></tr>";
        }
        $thtml.="<tr><td>" . $order->cost()."</td></tr>"; 
        $thtml.="<tr><td>" . $order->totaltime()."</td></tr>"; 
        $thtml.="<tr><td>" . $order->materialquantity()."</td></tr>"; 
       echo $thtml;   
      wp_die();  
    }
}
new Factory();

interface Transport{
     public function cost();
     public function materialquantity();
     public function totaltime();
}
// Super class for common global variables 
class FactoryMain{
    public $cost;
    public $totaltime;
    public $materialquantity;
}
// here we can implement as many subclasses we want, just need to implement interface
class Road implements Transport{
    private $storeOderDetail;
    public function __construct(FactoryMain $oderDetails) {
        $this->storeOderDetail = $oderDetails;
    }
    public function cost(){
        return "Total Cost ".$this->storeOderDetail->cost ."<br/>";
    }
    
    public function totaltime(){
        return " Delivery Time ".$this->storeOderDetail->totaltime ."<br/>";
    }
    public function materialquantity(){
        return "Material Quantity ".$this->storeOderDetail->materialquantity ."<br/>";
    }
}
class Sea implements Transport{
    private $storeOderDetail;
    public function __construct(FactoryMain $oderDetails) {
        $this->storeOderDetail = $oderDetails;
    }
    public function cost(){
        return "Total Cost ".$this->storeOderDetail->cost ."<br/>";
    }
    public function totaltime(){
        return " Delivery Time ".$this->storeOderDetail->totaltime ."<br/>";
    }
    public function materialquantity(){
        return "Material Quantity ".$this->storeOderDetail->materialquantity ."<br/>";
    }
}
    interface LogisticsFactory {
    // public function createTransport($class, $storeOderDetail);
    }
    // BaseTransport class used for decision making, that which class object should created
    class BaseTransport implements LogisticsFactory {
    public function createTransport($class, $storeOderDetail)
    {
        return new $class($storeOderDetail);
    }
}

