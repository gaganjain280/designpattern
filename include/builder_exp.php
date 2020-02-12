<?php
/** 
 * Template Name: Builder creational
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="factory_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> Builder example </h4>
			 </br>
			<h5> House Type </h5> 
		
			   <select class="js-example-basic-single form-control" name="house_type" id="house_type">
			      <option value = "1" id="house_standard">Standard house 
			      </option><option value = "2" id="house_normal">Normal House 
			      </option>
		      </select> 
		</div>
		<div>
			<br>
			<input type="submit" class="btn btn-lg btn-success" id="builder_data" value ="SUBMIT">
		</div>

   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();