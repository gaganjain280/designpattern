<?php
/**
* Adapter is a structural design pattern that allows objects with
* incompatible interfaces to collaborate.
*/
 namespace StructuralAdapter{
  class AdapterPattern{
    public function __construct(){
         add_action('wp_ajax_adapterClientCode', array($this,'adapterClientCode'));
         add_action('wp_ajax_nopriv_adapterClientCode', array($this,'adapterClientCode'));
    }
    /**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  public function adapterClientCode(){
  $operation1=$_POST['operation1'];

    if($operation1==1){
        $xmlconnector = new XmlAPI();
        $xmlconnector->communicate();
    }else if($operation1==2){
        $jsonApi      = new JsonApi();
        $jsonApi->communicate();
    }else{
        echo "Xml Site Communication With Json Adapter:-";
        $adapter      = new JsonAdapter();
        $adapter->communicate();
    } 
    wp_die();
    }
 }
  interface Xml {
    public function communicate();
  }
  interface Json {
    public function communicate();
  }
  class XmlAPI implements Xml {
    public function communicate() {
      echo "XML API COMUNICATION <br>";
    }
  }
  class JsonApi implements Json {
    public function communicate() {
            echo "JSON API COMUNICATION<br>";
    }
  }
  interface XmlToJson{
    public function communicate();
  }
  class JsonAdapter implements XmlToJson{
    public function communicate(){
    $xmlAPI = new XmlAPI();
    $xmlAPI->communicate();
  }
  }

}