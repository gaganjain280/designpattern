<?php
/**
* Bridge is a structural design pattern that lets you split a large class or
* a set of closely related classes into two separate hierarchies—abstraction and 
*implementation—which can be developed independently of each other.
*/
 namespace StructuralBridge{
  class BridgePattern{
    public function __construct(){
         add_action('wp_ajax_bridgeClientCode', array($this,'bridgeClientCode'));
         add_action('wp_ajax_nopriv_bridgeClientCode', array($this,'bridgeClientCode'));
    }
/**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  public function bridgeClientCode(){
      $color_type=$_POST['color_type'];
      $car_type=$_POST['car_type'];
      $getCarColor=nul;
      if($color_type==1){
        $getCarColor = new LightColor();
      }else if($color_type==2){
        $getCarColor = new DarkColor();
      }else{
        $getCarColor = new AquaColor();
      }
      if($car_type==1){
      $OD = new OD($getCarColor);
      echo '<br><table><tr><td>'.$OD->getContent().'</tr></td></table>'; 
      }else{
      $Jaguar = new Jaguar($getCarColor);
      echo '<br><table><tr><td>'.$Jaguar->getContent().'</tr></td></table>';
      }
        wp_die();
    }
 }
 interface Car
{
    public function __construct(Color $color);
    public function getContent();
}

class OD implements Car
{
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getContent()
    {
        return "OOOO in " . $this->color->getColor();
    }
}

class Jaguar implements Car
{
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getContent()
    {
        return "Jaguar in " . $this->color->getColor();
    }
}
// And the separate color hierarchy


interface Color
{
    public function getColor();
}

class DarkColor implements Color
{
    public function getColor()
    {
        return 'Dark Black/ Red/ Blue';
    }
}
class LightColor implements Color
{
    public function getColor()
    {
        return 'Light white/ Yellow/ Blue';
    }
}
class AquaColor implements Color
{
    public function getColor()
    {
        return 'Aqua Blue/ Green/ pink';
    }
}
 

}