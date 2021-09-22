$(function(){
  var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

  var drno = $("#drno_id_sec").data("drno");


  var dataTable = $('#table-grid').DataTable({
    
    "serverSide": true,
    "destroy":true,
    "ajax":{
      url :base_url+"Main_sales/table_directsales_view", // json datasource
      type: "post",  // method  , by default get
      data: {"drno" : drno},
      error: function(){  // error handling
        $(".table-grid-error").html("");
        // $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#table-grid_processing").css("display","none");
      }
    },
  });

  dataTable.destroy();

    var dataTable1 = $('#table-drsales').DataTable({
    
    "serverSide": true,
    "destroy":true,
    "ajax":{
      url :base_url+"Main_sales/tbl_directsales_forbalance", // json datasource
      type: "post",  // method  , by default get
      data: {"drno" : drno},
      error: function(){  // error handling
        $(".table-grid-error").html("");
        // $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#table-grid_processing").css("display","none");
      }
    },
  });

    dataTable1.destroy();

  
  $('.search-input-text').on('keyup click', function(){   // for text boxes
    var i =$(this).attr('data-column');  // getting column index
    var v =$(this).val();  // getting search input value
    dataTable.columns(i).search(v).draw();
  });

  $('.search-input-select').on('change', function(){   // for select box
    var i =$(this).attr('data-column');  
    var v =$(this).val();  
    dataTable.columns(i).search(v).draw();
  });

  $('.printBtn').click(function(e){

    var currUrl = window.location.href;

    currUrl = currUrl.replace("directsalesreference_view", "sales_drprint");
    window.open (currUrl, '_blank');

    $('.printBtn').attr("disabled","true");
    $('.printBtn').attr("title","This document has already been printed.");
  });

  // $(".printSalesOrder").click(function(e){
  //   e.preventDefault();

  //   var sono = $(".sono_id_sec").val();

  //   alert(sono);

  //     window.location.href = ''+base_url+'Main/salesorder_exportPDF/'+sono;
  // });
});