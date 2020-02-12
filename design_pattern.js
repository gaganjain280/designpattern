
// alert("ok");


// Abstract Design factory Script
jQuery(function($){
$('#abstract_factory_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
             var abstract_factory_type = $('#abstract_factory_type').val(); 
              var quantity     = $('#quantity').val(); 
             if(quantity=="" || quantity<=100){
             alert("Quantity must be greater than 100 kg");
             return false;
             }else{
             var ajaxdata     = {
                               'action' :'abstract_design',
                               'abstract_factory_type': abstract_factory_type,
                               'quantity': quantity
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                    console.log(result);
                    // alert(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
           }
      });      
});


// builder Design Script
jQuery(function($){
$('#builder_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
             var house_type = $('#house_type').val(); 
             var ajaxdata     = {
                               'action' :'builderClientCode',
                               'house_type': house_type
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                    // console.log(result);
                   var houseData=JSON.parse(result);
                   $( ".containerData" ).append(houseData["steps"]);
                    return false;
                  }
             });
      });      
});


//Prototype Design Script
jQuery(function($){
$('#prototype_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
      var quantity = $('#quantity').val(); 
             alert(quantity);
             var ajaxdata     = {
                               'action' :'prototypeClientCode',
                               'quantity': quantity
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});


//Singleton Design Script
jQuery(function($){
$('#singleton_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
      var operation1 = $('#operation1').val(); 
      var operation2 = $('#operation2').val(); 
     
             var ajaxdata     = {
                               'action' :'singletonClientCode',
                               'operation1': operation1,
                               'operation2':operation2
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});