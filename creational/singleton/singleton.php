<?php
namespace CreationalSingleton{

class SingletonDesign{
   public function __construct(){
         add_action('wp_ajax_singletonClientCode', array($this,'singletonClientCode'));
         add_action('wp_ajax_nopriv_singletonClientCode', array($this,'singletonClientCode'));
  }
/**
 * The singletonClientCode code use for geting instance and calling ourBussinessLogic function for performing bussiness logics
 */
  function singletonClientCode(){
  
    $takeiInstance1 = Singleton::getInstance();
    $takeiInstance2 = Singleton::getInstance();
 var_dump($takeiInstance1);

var_dump($takeiInstance2);

    $operation1=$_POST['operation1'];
    $operation2=$_POST['operation2'];
    $takeiInstance3 = Singleton::ourBussinessLogic($operation1,$operation2);

    if ($takeiInstance1 === $takeiInstance2) {

        echo "<h3>Singleton works, both variables contain the same instance.</h3>";
    } else {
        echo "<h3>Singleton failed, variables contain different instances.<h3>";
    }
      wp_die();
    }
}

class Singleton
{
    /**
     * The Singleton's instance is stored in a static field. This field is an
     * array, because we'll allow our Singleton to have subclasses. Each item in
     * this array will be an instance of a specific Singleton's subclass.
     */
    private static $instances = [];

    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    private function __construct() { 
   
    }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Singleton
    { Static $counter=1;
        $cls = static::class;
        if (!isset(static::$instances[$cls])) {
            static::$instances[$cls] = new static;
        }
        echo "Db connection counter =".$counter; ?> <br>
        <?php
        $counter+=1;
        return static::$instances[$cls];
    }

    /**
     * Finally, any singleton should define some business logic, which can be
     * executed on its instance.
     */
    public function ourBussinessLogic($operation1,$operation2)
    { 
         echo $operation1." Operation status done"; ?> <br><?php
         echo $operation2." Operation status done";?> <br><?php
    }

}
}