$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	$('.search').show('slow');
	var datefrom1 = $("#datefrom1").val();
	var dateto1 = $("#dateto1").val();
	dataTable = $('#table-grid').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/dr_listing_report_table", // json datasource
			type: "post",  // method  , by default get
			data:{'datefrom': datefrom1, 'dateto': dateto1},
			beforeSend:function(data){
				$.LoadingOverlay("show");	
			},
			complete: function(data)
			{
				var response = $.parseJSON(data.responseText);
				if(response.recordsTotal > 0){	
					$('.printBtn').show('slow');
					$("#table-grid").find(".tfoot").remove();
					var list = "";
					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th colspan='3' class='text-right'>Total</th>";
					list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
					list += "<th colspan='4' class='text-right'></th>";
					list += " </tr></tfoot>";
					$("#table-grid").append(list);
				}
				else{
					$('.printBtn').hide('slow');
					$("#table-grid").find(".tfoot").remove();
				}
				setTimeout(function(){
					$.LoadingOverlay("hide");
				},500); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});

salesArr = [];
	//start
	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();
		var checker=0;
		var searchtype = "bddatediv";
		$("#datefrom1").val(date1)
		$("#dateto1").val(date2)
		var datefrom1 = $("#datefrom1").val();
		var dateto1 = $("#dateto1").val();

		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date1 == "" && date2 == "")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill date range field.",
				    icon: 'info',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#FFA500',
					textColor: 'white',
					allowToastClose: false,
					hideAfter: 3000          
				});
			}
			else
			{
				checker=1;
			}
		}
		
		if(checker == 1)
		{
			var datefrom = formatDate(datefrom1);
			var dateto = formatDate(dateto1);
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/dr_listing_report_table", // json datasource
					type: "post",  // method  , by default get
					data:{'datefrom': datefrom, 'dateto': dateto},
					beforeSend:function(data){
						$("#table-grid").LoadingOverlay("show");	
					},
					complete: function(data)
					{
						setTimeout(function(){
							$("#table-grid").LoadingOverlay("hide");
						},500); 

						var response = $.parseJSON(data.responseText);

						if(response.recordsTotal > 0){	
							$('.printBtn').show('slow');
							$("#table-grid").find(".tfoot").remove();
							var list = "";
							list += "<tfoot class='tfoot'> <tr> ";
							list += "<th colspan='3' class='text-right'>Total</th>";
							list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
							list += "<th colspan='4' class='text-right'></th>";
							list += " </tr></tfoot>";
							$("#table-grid").append(list);

							var totalmonth1 = response.total_per_month;
							var totalmonth = totalmonth1.replace(",", "");

							//sales_chart(totalmonth);
						}
						else{
							$('.printBtn').hide('slow');
							$("#table-grid").find(".tfoot").remove();
						}

					},
					error: function(){  // error handling
						$(".table-grid-error").html("");
						$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#table-grid_processing").css("display","none");
					}
				}
			});
		}

	});
	//end

	//start
//totalmonth = [];
// function sales_chart(totalmonth){
// 	alert(totalmonth);
// var ctx = document.getElementById("myChart");
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ["January"],
//         datasets: [{
//             label: '# of Votes',
//             data: [totalmonth],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         }
//     }
// });
// }

let draw = false;

  init();

  function init() {
  // initialize DataTables
 // const table = $("#table-grid").DataTable();
  // get table data
  const tableData = getTableData(dataTable);
  // create Highcharts
  createHighcharts(tableData);
  // table events
  setTableEvents(dataTable);
}

function getTableData(table) {
  const dataArray = [],
  countryArray = [],
  populationArray = [],
  densityArray = [];

  // loop table rows
  dataTable.rows({ search: "applied" }).every(function() {
    const data = this.data();
    countryArray.push(data[9]);
    populationArray.push(parseInt(data[1].replace(/\,/g, "")));
    densityArray.push(parseInt(data[8].replace(/\,/g, "")));
  });

  // store all data in dataArray
  dataArray.push(countryArray, populationArray, densityArray);

  return dataArray;
}

function createHighcharts(data) {
  Highcharts.setOptions({
    lang: {
      thousandsSep: ","
    }
  });

  Highcharts.chart("chart", {
    // title: {
    //   text: "DataTables to Highcharts"
    // },
    // subtitle: {
    //   text: "Data from worldometers.info"
    // },
    xAxis: [
    {
      categories: data[0],
      labels: {
        rotation: -45
      }
    }
    ],
    yAxis: [
    {
        // first yaxis
        title: {
          text: "Population"
        }
      },
      {
        // secondary yaxis
        title: {
          text: "Density (P/Km²)"
        },
        min: 0,
        opposite: true
      }
      ],
      series: [
      {
        name: "Population (2017)",
        color: "#0071A7",
        type: "column",
        data: data[1],
        tooltip: {
          valueSuffix: " M"
        }
      },
      {
        name: "Density (P/Km²)",
        color: "#FF404E",
        type: "spline",
        data: data[2],
        yAxis: 1
      }
      ],
      tooltip: {
        shared: true
      },
      legend: {
        backgroundColor: "#ececec",
        shadow: true
      },
      credits: {
        enabled: false
      },
      noData: {
        style: {
          fontSize: "16px"
        }
      }
    });
}

function setTableEvents(table) {
  // listen for page clicks
  dataTable.on("page", () => {
    draw = true;
  });

  // listen for updates and adjust the chart accordingly
  dataTable.on("draw", () => {
    if (draw) {
      draw = false;
    } else {
      const tableData = getTableData(dataTable);
      createHighcharts(tableData);
    }
  });
}

	
});

function isNumberKeyOnly(evt)   
{    
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
          return true;
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

