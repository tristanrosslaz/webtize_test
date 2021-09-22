$(document).ready(function(){
    let base_url = $("body").data('base_url');

    $('.needs').select2({
        placeholder: ' Choose your needs',
        allowClear: true
    });


    $("#regCode").change(function(){
        $('#provCode').empty();
        $('#citymunCode').empty();
        $('#brgyCode').empty();
        var regCode = $(this).val();

        if(regCode != ""){
            $.ajax({
                type:'post',
                url: base_url+'Main/get_provcode',
                data:{"regCode": regCode},
                beforeSend:function(data)
                {
                },
                complete: function()
                {
                },
                success:function(data){
                        if (data.success == 1) {
                            $('#provCode').append("<option value=''></option>");
                            for(x = 0; data.result.length > x; x++){
                                $('#provCode').append("<option value='"+data.result[x]['provCode']+"'>"+data.result[x]['provDesc']+"</option>");
                            }
                        }
                    }
        
            });
        }
       
    });

    $("#provCode").change(function(){
        $('#citymunCode').empty();
        $('#brgyCode').empty();
        var provCode = $(this).val();

        if(provCode != ""){
            $.ajax({
                type:'post',
                url: base_url+'Main/get_citymunCode',
                data:{"provCode": provCode},
                beforeSend:function(data)
                {
                },
                complete: function()
                {
                },
                success:function(data){
                        if (data.success == 1) {
                            $('#citymunCode').append("<option value=''></option>");
                            for(x = 0; data.result.length > x; x++){
                                $('#citymunCode').append("<option value='"+data.result[x]['citymunCode']+"'>"+data.result[x]['citymunDesc']+"</option>");
                            }
                        }
                    }
        
            });
        }
       
    });

    $("#citymunCode").change(function(){
        $('#brgyCode').empty();
        var citymunCode = $(this).val();

        if(citymunCode != ""){
            $.ajax({
                type:'post',
                url: base_url+'Main/get_brgyCode',
                data:{"citymunCode": citymunCode},
                beforeSend:function(data)
                {
                },
                complete: function()
                {
                },
                success:function(data){
                        if (data.success == 1) {
                            $('#brgyCode').append("<option value=''></option>");
                            for(x = 0; data.result.length > x; x++){
                                $('#brgyCode').append("<option value='"+data.result[x]['brgyCode']+"'>"+data.result[x]['brgyDesc']+"</option>");
                            }
                        }
                    }
        
            });
        }
       
    });

    $("#tagBtn").click(function(){
        var needs = $('.needs').val();
        var regCode = $('#regCode').val();
        var provCode = $('#provCode').val();
        var citymunCode = $('#citymunCode').val();
        var brgyCode = $('#brgyCode').val();
        var contact_no = $('#contact_no').val();
        var remarks = $('#remarks').val();

        
        if(needs == "" || regCode == "" || provCode == "" || citymunCode == "" || brgyCode == ""){
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
            });
        }else{
            $.ajax({
                type:'post',
                url: base_url+'Main/save_entry',
                data:{
                    "needs": needs,
                    "regCode": regCode,
                    "provCode": provCode,
                    "citymunCode": citymunCode,
                    "brgyCode": brgyCode,
                    "contact_no": contact_no,
                    "remarks": remarks
                },
                beforeSend:function(data)
                {
                    $('.loading').show()
                },
                complete: function()
                {
                    $('.loading').hide()
                },
                success:function(data){
                        if (data.success == 1) {
                            $.toast({
                                heading: 'Success',
                                text: data.message,
                                icon: 'success',
                                loader: false,  
                                stack: false,
                                position: 'top-center', 
                                bgColor: '#5cb85c',
                                textColor: 'white',
                                allowToastClose: false,
                                hideAfter: 3000
                            });
                            location.reload();
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
    });

    fillDatatable();
    showMap();
    function fillDatatable() {
        dataTable = $('#table-grid').DataTable({
            "serverSide": true,
            "order": [[ 2, "desc" ]],
            "columnDefs": [{"className": "dt-center"}],
            "destroy": true,
            "bFilter": false,
            "ajax":{
                url :base_url+"Main/table_top_logs", // json datasource
                type: "post",
                data:{'search': 0},
                error: function() {  // error handling
                    $(".table-grid-error").html("");
                    $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#table-grid_processing").css("display","none");
                },
                complete: function(data) {
                }
            }
        });
    }
    


    /// Graph reports donut chart
    $.ajax({
        type:'post',
        url: base_url+'Main/get_data_donut_chart',
        success:function(data){
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';
                
                // Pie Chart Example
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.label,
                    datasets: [{
                    data: data.total_count,
                    backgroundColor: ['#4e73df', '#f6c23e', '#36b9cc', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#f6c23e', '#2c9faf', '#1cc88a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    },
                    legend: {
                    display: false
                    },
                    cutoutPercentage: 80,
                },
                });
            }
    });

    ////Grap area chart

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

    // Entry Tag Chart Example
    $.ajax({
        type:'post',
        url: base_url+'Main/get_data_total_tag_per_month',
        success:function(data){

            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.label_month,
                datasets: [{
                label: "Total Entry",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: data.total_per_month,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
                },
                scales: {
                xAxes: [{
                    time: {
                    unit: 'date'
                    },
                    gridLines: {
                    display: false,
                    drawBorder: false
                    },
                    ticks: {
                    maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return number_format(value);
                    }
                    },
                    gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                    }
                }],
                },
                legend: {
                display: false
                },
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
                }
            }
            });
            
            }
    });


    ////Map
    function showMap(){
        var options = {
            maxZoom: 10,
            minZoom: 6
        };
    
        var mymap = L.map('mapid', options).setView([14.1564045, 121.1071632], 6);
    
    
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoic3RyYXdoYXRzbGVha3kiLCJhIjoiY2s5Nm51NzhuMHhvMzNrcGc5OGl4NTRpYyJ9.8RG8Mt6ISnCLtrWbgrRBgg'
        }).addTo(mymap);
       
    
        $.ajax({
            type:'post',
            url: base_url+'Main/get_long_lat',
            success:function(data){
                    for(x = 0; data.longitude.length > x; x++){
                        if(data.longitude[x] != ''){
                            var marker = L.marker([data.longitude[x], data.latitude[x]]).addTo(mymap);

                            var circle = L.circle([data.longitude[x], data.latitude[x]], {
                                color: 'red',
                                fillColor: '#f03',
                                fillOpacity: 0.5,
                                radius: 15000
                            }).addTo(mymap);


                            marker.bindPopup("<b>Province:</b><br>"+data.province[x]);

                        }
                    }
                }
        });

        
    }
    
      
});



