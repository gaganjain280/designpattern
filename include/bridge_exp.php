<?php
/** 
 * Template Name: Structural Bridge
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="structural_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> Bridge example </h4>
			 </br>
			<h5> Variations </h5> 
			   <select class="js-example-basic-single form-control" name="color_type" id="color_type">
			      <option value = "1" id="house_standard">Light Color Cars
			      </option>
			      <option value = "2" id="bridge_data_normal">Dark Color Cars 
			      </option>
			      <option value = "3" id="bridge_data_normal">Aqua Color Cars 
			      </option>
		      </select> 
		      <select class="js-example-basic-single form-control" name="car_type" id="car_type">
			      <option value = "1" id="house_standard">OOOO
			      </option>
			      <option value = "2" id="bridge_data_normal">Jaguar
			      </option>
		      </select> 
		</div>
		<div>
			<br>
			<input type="submit" class="btn btn-lg btn-success" id="bridge_data" value ="SUBMIT">
		</div>

   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();