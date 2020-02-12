<?php
/** 
 * Template Name: Structural flyweight
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="structural_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> flyweight Design Example</h4>
			 </br>
			
			 <h4> Ration Data</h4>
			<textarea type="text" class="btn btn-lg btn-success" id="material_name" name="material_name" value =""></textarea>
			 <h4> Quantity</h4>

			<input type="number" class="btn btn-lg btn-success" id="Quantity" name="Quantity" value ="" min="0"/>

			 
			 <input type="submit" class="btn btn-lg btn-success" id="flyweight_data" value ="SUBMIT">
		</div>
   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();