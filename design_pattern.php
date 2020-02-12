<?php
   /*
 * Plugin Name: Design Pattern
 * Plugin URI: http://gagan.codingkloud.com/wp-admin/plugins.php
 * Description: Design Pattern structured
 * Author: Gagan
 * Author URI: http://gagan.codingkloud.com
 * Version: 1.0.1
 */
namespace PatternScriptload{
class FactoryNameTest{
	public function __construct(){     
	        //***************** enque Script file *******************//
	        add_action( 'wp_enqueue_scripts', array($this,'scriptload' ));  
	} 
    public  function scriptload() {       
        
       wp_register_script( 'my_loadmore',  plugins_url(). '/design_pattern/design_pattern.js', array( 'jquery' ));
       wp_enqueue_script( 'my_loadmore',  plugins_url(). '/design_pattern/design_pattern.js', array( 'jquery' ));
       wp_localize_script( 'my_loadmore', 'ajax_object', array( 'ajaxurl' =>admin_url( 'admin-ajax.php' ) ) );
    }
 }
}

namespace {

 require_once('creational/singleton/singleton.php');//connect singleton design pattern file
 require_once('creational/builder/builder.php');//connect builder design pattern file
 require_once('creational/prototype/prototype.php');//connect prototype design pattern file
 require_once('creational/abstract-factory/design_abstract_factory.php');//connect abstract factory design pattern file
 
 new PatternScriptload\FactoryNameTest(); //common Script object for all patterns
 new CreationalPrototype\PrototypeDesign(); //Prototype pattern main object creation
 new CreationalBuilder\BuilderDesign();   //Builder pattern main object creation
 new CreationalSingleton\SingletonDesign(); //singleton pattern main object creation
 new CreationalAbstractFactory\LoadAbstractFactoryFunctions();// abstract factory main object creation
} 

  ?>