$(document).ready(function(){

	var base_url     = $("body").data('base_url'); //base_url come from php functions base_url();
  var productArray = [];
  var packageArray = [];

// triggers Place Order button
  $("#btnPlaceOrder").click(function(){
    // clears package div, package and product array
      $('#packageDiv').empty();
      productArray = [];
      packageArray = [];
      
      // get selected products
      $.each($("input[name='checkboxPerProduct']:checked"), function(){

        // each product stores to array
          dataArr = {
            'product_name' : $(this).data('name'),
            'price'        : $(this).data('price'),
            'weight'       : $(this).data('weight'),
          };
          productArray.push(dataArr);
      });

      $("#productListModal").modal("toggle");

      // display products each packages
      populatePackage();
  });

  function populatePackage(){

    str         = "";
    counter     = 1;
    package_key = 1;
    $.each(productArray, function(key, value) {
     
      packagedataArr = {
        'package_key'  : package_key,
        'product_name' : value.product_name,
        'price'        : value.price,
        'weight'       : value.weight
      };
      packageArray.push(packagedataArr);

      //increments number of package
      if(counter >= 3){
        package_key++;
        counter = 0;
      }

       counter++;
    });

    $.each(packageArray, function(key, value) {
       str += "<b>Package "+value.package_key+"</b><br>";
       str += "<label class='control-label'>Items:"+value.product_name+"</label><br>";
       str += "<label class='control-label'>Price:"+value.price+"</label><br>";
       str += "<label class='control-label'>Weight:"+value.weight+"</label><br>";
    });

  
    $('#packageDiv').append(str);
  }

});