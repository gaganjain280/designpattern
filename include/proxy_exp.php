<?php
/** 
 * Template Name: Structural proxy
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="structural_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> proxy Design Example</h4>
			 </br>
			 <h5> API TYPES </h5> 
			   <select class="js-example-basic-single form-control" name="title_type" id="title_type">
			      <option value = "1" id="house_standard">Image Direct
			      </option>
			      <option value = "2" id="adapter_data_normal">Image Via Proxy
			      </option>
			   </select> 
			 <input type="submit" class="btn btn-lg btn-success" id="proxy_data" value ="SUBMIT">
		</div>
   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();