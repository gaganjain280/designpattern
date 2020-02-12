<?php
/** 
 * Template Name: Prototype Creational
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="factory_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> Prototype example </h4>
			 </br>
			 <h5> Material quantity (In Kilogram ) </h5>

		<input type="number" class="btn btn-lg btn-success" id="quantity" name="quantity" value ="" min="0"/> 

			<!--    <select class="js-example-basic-single form-control" name="delivery_type" id="delivery_type">
			      <option value = "1" id="car"> Delivery By car </option>
			      <option value = "2" id="submarine"> Delivery By Submarine</option>
			      <option value = "3" id="truck">  Delivery by truck </option>
			      <option value = "4" id="aeroplane">  Delivery by aeroplane </option>
		      </select>  -->
		    
		</div>
     
		<div>
			<br>
			<input type="submit" class="btn btn-lg btn-success" id="prototype_data" value ="SUBMIT">
		</div>

   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();