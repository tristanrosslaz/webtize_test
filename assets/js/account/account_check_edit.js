$(function(){

var base_url = $("body").data('base_url');

checkData = [];
descData = [];
acctData = [];
amountData = [];
delBtnData = [];

    loadTables();

    function loadTables(){
        $.LoadingOverlay("show");
        var checkid = $("section").data('checkid');

        $.ajax({
            type: 'post',
            url: base_url+'Main_account/check_approve_edit_table',
            data:{"checkid":checkid},
            
            success:function(data){
                $.LoadingOverlay("hide");
                if(data.success == 1){
                    var count = data.count;   
                    var checkData = data.date;
                    var descData = data.desc;
                    var acctData = data.acct;
                    var amountData = data.amount;
                    var delBtnData = data.delBtn;
                    var acctidData = data.acctid;
                    //clearTable();

                    try{
                        for(i=0;i<count;i++){
                            editArray = [checkData[i],descData[i],amountData[i],acctData[i],acctidData[i],delBtnData[i]];

                            populateTable(editArray,1);
                        }
                    }catch(e){
                        // console.log("Error msg",e);
                    }
                    
                    //$(".lblItemnameedit").text(data.itemname);

                }else{
                    $.toast({
                        heading: 'Note',
                        text: data.message,
                        icon: 'error',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        allowToastClose: false,
                        bgColor: '#f0ad4e',
                        textColor: 'white'  
                    });
                }
            }
        });       
    }

var table = $('#table-grid').DataTable({ //declaring of table
    columnDefs: [{ targets: [5], visible: true, orderable: false, sClass: 'text-center'},{ targets: [4], visible: false}],
    //columnDefs: [],
    //columnDefs: [{ targets: [4], visible: false}],
    //olumnDefs: [{ targets: [0], sClass: 'td_id'}],
   //columnDefs: [{targets: [ 0 ],visible: false,searchable: false},{targets: [ 1 ],visible: false,searchable: false}]
});//data table

//var grand_total = 0;

//for delete parent row in the table
$("#table-grid").on('click', '.btnDelete', function(){ 

    table.row($(this).parents('tr')).remove().draw(false); //get the selected row to delete
    var data_totalamt = table.rows().columns(2).data(); //get no.6 data which is the total
    data_totalamt.each(function(value, index){ //fetch array to string sum 
        grand_total = eval(value.join("+").replace(/,/g, '')); //convert array to summation of string without comma
    });
    $("#grandtotal_hide").val(grand_total);
    $("#grand_total").text("Total : "+ accounting.formatMoney(grand_total)); 
});

//insert data to table
function populateTable(data,val){
    if(val == 1){
        table.row.add(editArray);         
        table.draw();           
    }else if(val == 2){
        table.row.add(selectedDataarray);         
        table.draw();
    }else{
        alert('There was an error populating table');
    }
}

///add item inside modal
$("#addcheck").click(function(e){

    //checkInputs('#addRow');
    var date = $("#ff_date").val();
    var desc = $("#ff_description").val();
    var amt = $("#ff_amount").val();
    var glid = $("#ff_gl_account").val();
    //var glname = $("#ff_gl_account").text();
    var glname = $("#ff_gl_account option:selected").text()

    //check if not empty fields
    if(date == "" || desc == "" || amt == "" || glid == ""){
        clearAddform();

        $.toast({
            heading: 'Note',
            text: "Please fill up all required fields",
            icon: 'error',
            loader: false,  
            stack: false,
            position: 'top-center', 
            allowToastClose: false,
            bgColor: '#f0ad4e',
            textColor: 'white'  
        });// if there is no seleccted item or the input item is not on the list

    }else{

        //deleteMatchRow(item);

        matchFound = false;

        // var dataIDstackup = table.rows().columns(0).data();
        // tableID = [];

        // dataIDstackup.each(function (value, index){    
        //     tableID = tableID.concat(value);
        // });//columns COLUMN TO CHANGE/GET VALUE data VALUE OF CELL row CURRENT ROW IN THE LOOP 

        // for(i=0;i<tableID.length;i++){

            //for fetching of rows in the table, prepare your data.
            selectedDataarray = [
            formatDate(date),             
            desc,
            accounting.formatMoney(amt),
            glname, 
            glid,
            "<center><button class='btn btn-danger btnDelete btnTable'><i class='fa fa-trash-o'></i> Delete</button></center>"
            ];// adding selected data to array 

            populateTable(selectedDataarray, 2);    
       // }

        //start - to get total amount in the specific column
        var data_totalamt = table.rows().columns(2).data();

        data_totalamt.each(function(value, index){ 
            grand_total = eval(value.join("+").replace(/,/g, ''));
        });

        $(".grand_total").text("Total : "+ accounting.formatMoney(grand_total));
        $(".grandtotal_hide").val(grand_total);
        //end - to get total amount in the specific column

        $('#addItemModal').modal('toggle'); //close modal

        clearAddform(); //clear all forms                        
    }
});

//SAVING
dateArr = [];
descArr = [];
amtArr = [];
glArr = [];

$(".submitcheckbtn").click(function(e){
    e.preventDefault();

    var total = $("#grandtotal_hide").val();
    var checkno = $("section").data("checkid");
    var notes = $("#f_notes").val();

    //getting data in datatable
        var dataDate = table.rows().columns(0).data();
        dataDate.each(function (value, index) {

            if((value == null) || (value == 0) || (value == '')){
                tableisEmpty = true;
            }else{
                tableisEmpty = false;
            }//check if table is empty

            dateArr = dateArr.concat(value);
        });   

        var dataDesc = table.rows().columns(1).data();
        dataDesc.each(function (value, index) {

            if((value == null) || (value == 0) || (value == '')){
                tableisEmpty = true;
            }else{
                tableisEmpty = false;
            }//check if table is empty

            descArr = descArr.concat(value);
        });   

        var dataAmt = table.rows().columns(2).data();
        dataAmt.each(function (value, index) {

            if((value == null) || (value == 0) || (value == '')){
                tableisEmpty = true;
            }else{
                tableisEmpty = false;
            }//check if table is empty

            amtArr = amtArr.concat(value);
        });   

        var dataGL = table.rows().columns(4).data();
        dataGL.each(function (value, index) {

            if((value == null) || (value == 0) || (value == '')){
                tableisEmpty = true;
            }else{
                tableisEmpty = false;
            }//check if table is empty

            glArr = glArr.concat(value);
        });

    if (total == 0) {
        $.toast({
            heading: 'Note',
            text: 'Must have at least one sales order.',
            icon: 'error',
            loader: false,  
            stack: false,
            position: 'top-center', 
            allowToastClose: true,
            bgColor: '#f0ad4e',
            textColor: 'white' 
        });
    } else {
        $.ajax({
            url: base_url+"Main_account/saveChanges_check",
            type: 'post',
            data: { 
                'total':total,
                'checkno':checkno,
                'dateArr':dateArr,
                'descArr':descArr,
                'amtArr':amtArr,
                'glArr':glArr,    
                'notes':notes,   
            },

            // beforeSend: function() {
            //     $.LoadingOverlay("show");
            // },

            success:function(data){
                $.LoadingOverlay("hide");
                if(data.success == 1){
                    
                    $.toast({
                        heading: 'Success',
                        text: 'Check  has been successfully saved changes.',
                        icon: 'success',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#5cb85c',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 3000
                     });
                    window.setTimeout(function(){
                        // window.location.href=base_url+"Main_account/account_check_edit/" + $("#token").val() + '/'+ $("#checkid").val();
                         window.location.href=base_url+"Main_account/check_transaction_history/" + $("#token").val();
                  },1000);

                }else{
                    $.toast({
                        heading: 'Note',
                        text: 'Please fill required fields.',
                        icon: 'error',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#f0ad4e',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 3000
                   });
                }    
            }
        });
    }   
});

});

//check if number
function isNumberKeyOnly(evt){    
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
}

//clear all form function, please add/change other input to clear if needed
function clearAddform(){

    $("#ff_date").css("border-color", "#eee");  //rollback when not empty
    $("#ff_date").val('');
    $("#ff_description").css("border-color", "#eee");  //rollback when not empty
    $("#ff_description").val('');
    $("#ff_gl_account").val('');
    $("#ff_amount").css("border-color", "#eee");  //rollback when not empty
    $("#ff_amount").val('');

}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}