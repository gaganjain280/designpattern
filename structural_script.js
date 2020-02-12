//Adapter Design Script
jQuery(function($){
$('#adapter_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
      var operation1 = $('#adapter_type').val(); 
      // var operation2 = $('#operation2').val(); 
     
             var ajaxdata     = {
                               'action' :'adapterClientCode',
                               'operation1': operation1
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});

//Bridge Design Script
jQuery(function($){
$('#bridge_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();
      var color_type = $('#color_type').val(); 
      var car_type = $('#car_type').val(); 
     
             var ajaxdata     = {
                               'action' :'bridgeClientCode',
                               'color_type': color_type,
                               'car_type': car_type
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});

//devorator Design Script
jQuery(function($){
$('#decorater_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();     
             var ajaxdata     = {
                               'action' :'decoraterClientCode',
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});
//composite Design Script
jQuery(function($){
$('#composite_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();     
             var ajaxdata     = {
                               'action' :'compositeClientCode',
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});

//devorator Design Script
jQuery(function($){
$('#facade_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();     
      var title_type = $('#title_type').val(); 
   
             var ajaxdata     = {
                               'action' :'facadeClientCode',
                               'title_type' :title_type
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});
//Proxy Design Script
jQuery(function($){
$('#proxy_data').click(function(e){
          e.preventDefault();
 $( ".containerData" ).empty();     
      var title_type = $('#title_type').val(); 
             var ajaxdata     = {
                               'action' :'proxyClientCode',
                               'title_type' :title_type
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});


//Flyweight Design Script
jQuery(function($){
$('#flyweight_data').click(function(e){
          e.preventDefault();   
      var material_name = $('#material_name').val(); 
      var Quantity = $('#Quantity').val(); 
          var ajaxdata     = {
                               'action' :'flyweightClientCode',
                               'material_name' :material_name,
                               'Quantity' :Quantity
                                }
            $.ajax({
                  url: ajax_object.ajaxurl,
                  type:'POST',
                  data: ajaxdata,
                  success: function(result){
                   console.log(result);
                     $( ".containerData" ).append(result);
                    return false;
                  }
             });
      });      
});