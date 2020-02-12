<?php
   /*
 * Plugin Name: Structural Design
 * Plugin URI: http://gagan.codingkloud.com/wp-admin/plugins.php
 * Description: Creational Design
 * Author: Gagan
 * Author URI: http://gagan.codingkloud.com
 * Version: 1.0.1
 */
namespace StructuralScriptload{
	class ScriptLoad{
		public function __construct(){     
		        //***************** enque Script file *******************//
		        add_action( 'wp_enqueue_scripts', array($this,'loadscript' ));  
		} 
	    public  function loadscript() {       
	       wp_register_script( 'structural_design_key',  plugins_url(). '/design_pattern/structural_script.js', array( 'jquery' ));
	       wp_enqueue_script( 'structural_design_key',  plugins_url(). '/design_pattern/structural_script.js', array( 'jquery' ));
	       wp_localize_script( 'structural_design_key', 'ajax_object', array( 'ajaxurl' =>admin_url( 'admin-ajax.php' ) ) );
	    }
    }
}
namespace {
  require_once('structural/adapter/adapter.php');//connect adapter design pattern file
  require_once('structural/bridge/bridge.php');//connect bridge design pattern file
  require_once('structural/decorater/decorater.php');//connect bridge design pattern file
  require_once('structural/composite/composite.php');//connect bridge design pattern file
  require_once('structural/facade/facade.php');//connect bridge design pattern file
  require_once('structural/proxy/proxy.php');//connect bridge design pattern file
  require_once('structural/flyweight/flyweight.php');//connect bridge design pattern file
  // require_once('cache/top-cache.php');//connect bridge design pattern file
  // require_once('cache/bottom-cache.php');//connect bridge design pattern file

  new StructuralScriptload\ScriptLoad(); //common Script object for all patterns
  new StructuralAdapter\AdapterPattern(); // object creation of main class Adapter;
  new StructuralBridge\BridgePattern(); // object creation of main class bridge;
  new Structuraldecorater\DecoraterPattern(); // object creation of main class Decorater;
  new StructuralComposite\CompositePattern(); // object creation of main class Composite;
  new StructuralFacade\FacadePattern(); // object creation of main class Facade;
  new StructuralProxy\proxyPattern(); // object creation of main class Facade;
  new StructuralFlyweight\FlyweightPattern(); // object creation of main class Facade;

}


