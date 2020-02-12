<?php
/** 
 * Template Name: Singleton Creational
 */

get_header(); ?>
<div class="row">
<div class="col-md-4"> 
   <form action="" id="factory_example"> 	
   	 <!-----   Display All address List  --------->
	   	  <div>
			 <h4> Singleton example </h4>
			 </br>
			 <h5> Operatioion 1 </h5>
			<select class="js-example-basic-single form-control" name="operation1" id="operation1">
			      <option value = "read" id="read">table read
			      </option><option value = "write" id="write">table Write 
			      </option>
		      </select>

			 <h5> Operatioion 2 </h5>
		
			<select class="js-example-basic-single form-control" name="operation2" id="operation2">
			      <option value = "read" id="read">table read
			      </option><option value = "write" id="write">table Write 
			      </option>
		      </select>

			   
		</div>
     
		<div>
			<br>
			<input type="submit" class="btn btn-lg btn-success" id="singleton_data" value ="SUBMIT">
		</div>

   </form>
   </div>

   <div class="containerData"></div>
<?php
get_footer();