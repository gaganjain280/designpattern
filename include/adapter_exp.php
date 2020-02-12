<?php
/** 
 * Template Name: Structural Adapter
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="structural_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> Adapter example </h4>
			 </br>
			<h5> API TYPES </h5> 
			   <select class="js-example-basic-single form-control" name="adapter_type" id="adapter_type">
			      <option value = "1" id="house_standard">XML API's WITH XML
			      </option>
			      <option value = "2" id="adapter_data_normal">JSON API's WITH JSON 
			      </option>
			      <option value = "3" id="adapter_data_normal">API WITHJSON/XML 
			      </option>

		      </select> 
		</div>
		<div>
			<br>
			<input type="submit" class="btn btn-lg btn-success" id="adapter_data" value ="SUBMIT">
		</div>

   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();