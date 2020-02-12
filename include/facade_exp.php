<?php
/** 
 * Template Name: Structural Facade
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="structural_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> facade Design Example</h4>
			 </br>
			 <h5> API TYPES </h5> 
			   <select class="js-example-basic-single form-control" name="title_type" id="title_type">
			      <option value = "1" id="house_standard">Book Title
			      </option>
			      <option value = "2" id="adapter_data_normal">Reverse Book Title
			      </option>
			   </select> 
			 <input type="submit" class="btn btn-lg btn-success" id="facade_data" value ="SUBMIT">
		</div>
   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();