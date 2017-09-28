<style>
.heading-elements {
	float : right;
}
.panel-body {
	 display: block;
}
.margin{
	margin-right : 50px;
}
</style>
<!-- Main content -->
			<div class="content-wrapper">
			<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->

<!-- Content area -->
	<div class="content">
		<!-- Dashboard content -->
		<div class="row">
			<div class="col-md-12">
				<!-- Quick stats boxes -->
				<div class="row panel panel-flat">
			
					<div class="panel-body col-md-3">

						<!-- Current server load -->
						<div class="panel bg-teal-400">
							<div class="panel-body">
								<div class="heading-elements">
									<i class="icon-archive" style="font-size: xx-large;"></i>
								</div>
								<h3 class="no-margin"></h3>
								<div class="margin"><span id="emp_annualTotal"></span><span>-&nbsp;Total Annuals</span></div>
								<!--<div class="text-muted text-size-small">34.6% avg</div>-->
							</div>

							<div id="server-load"></div>
						</div>
						<!-- /current server load -->

					</div>

					<div class="panel-body col-md-3">

						<!-- Current server load -->
						<div class="panel bg-teal-400">
							<div class="panel-body">
								<div class="heading-elements">
									<i class="icon-archive" style="font-size: xx-large;"></i>
								</div>
								<h3 class="no-margin"></h3>
								<div class="margin"><span id="emp_annualRemaining"></span></span><span>-&nbsp;Remaining Annuals</span></div>
								<!--<div class="text-muted text-size-small">34.6% avg</div>-->
							</div>

							<div id="server-load"></div>
						</div>
						<!-- /current server load -->

					</div>

					<div class="panel-body col-md-3">

						<!-- Today's revenue -->
						<div class="panel bg-green-400">
							<div class="panel-body">
								<div class="heading-elements">
									<i class="icon-archive" style="font-size: xx-large;"></i>
								</div>

								<h3 class="no-margin"></h3>
						      <div class="margin"><span id="emp_sickTotal"></span><span>-&nbsp;Total Sicks</span></div>
								<!--<div class="text-muted text-size-small">$37,578 avg</div>-->
							</div>

							<div id="today-revenue"></div>
						</div>
						<!-- /today's revenue -->

					</div>

					<div class="panel-body col-md-3">

						<!-- Today's revenue -->
						<div class="panel bg-green-400">
							<div class="panel-body">
								<div class="heading-elements">
									<i class="icon-archive" style="font-size: xx-large;"></i>
								</div>

								<h3 class="no-margin"></h3>
								<div class="margin"><span id="emp_sickRemaining"></span></span><span>-&nbsp;Remaining Sick</span></div>
								<!--<div class="text-muted text-size-small">$37,578 avg</div>-->
							</div>

							<div id="today-revenue"></div>
						</div>
						<!-- /today's revenue -->

					</div>
					
				
					<div class="col-md-6">
						<p id="chart1"></p>
					</div>
					<div class="col-md-6" >
						<p id="chart2"></p>
					</div>
				</div>
				<!-- /quick stats boxes -->
			</div>
			<!--<div class="col-lg-4">
			<!-- Daily financials --
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Members Online</h6>
						<div class="heading-elements">
							<span class="badge bg-danger-400 heading-text">2</span>
						</div>
					</div>

					<div class="panel-body">
						<div class="content-group-xs" id="bullets"></div>

						<ul class="media-list">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-xs"><i class="icon-user"></i></a>
								</div>
								
								<div class="media-body">
									Evelyn Cooper
									<div class="media-annotation">Market: Minnesota | Store: Riverdale</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-xs"><i class="icon-user"></i></a>
								</div>
								
								<div class="media-body">
									Ginger Barbi
									<div class="media-annotation">Market: Austin | Store: Cameron </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>-->	
	
		</div>
		<!-- /dashboard content -->	
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/highcharts-3d.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script>

var emp_id = '<?php echo $this->session->userdata('id') ?>';
var emp_name = '<?php echo $this->session->userdata('name') ?>';
function incr_date(date_str){
  var parts = date_str.split("-");
  var dt = new Date(
    parseInt(parts[0], 10),      // year
    parseInt(parts[1], 10) - 1,  // month (starts with 0)
    parseInt(parts[2], 10)       // date
  );
  dt.setDate(dt.getDate());
  parts[2] = "" + dt.getFullYear();
  parts[0] = "" + (dt.getMonth() + 1);
  if (parts[0].length < 2) {
    parts[0] = "0" + parts[0];
  }
  parts[1] = "" + dt.getDate();
  if (parts[1].length < 2) {
    parts[1] = "0" + parts[1];
  }
  return parts.join("/");
}

	   function parseDate(str) {
			var mdy = str.split('/');
			return new Date(mdy[2], mdy[0]-1, mdy[1]);
		}

		function daydiff(firstDate, secondDate) {
			return (secondDate-firstDate)/(1000*60*60*24)
		}
	  function classWithConditionForDprtandDesg(id,content){
            $(id).show();  
			$(id).addClass('alert-warning');
			$(id).removeClass('alert-success');
			$(id).slideDown(2500).html(content);
			setTimeout(function(){$(id).hide()}, 5000)
	}
	function monthDiff(joiningYear, currentYear,joiningMonth,currentMonth,joiningDate,currentDate) {
		var months;
		months = (currentYear - joiningYear) * 12;
		months -= joiningMonth;
		months += currentMonth;
		months -= Math.ceil((joiningDate - currentDate) *12 / 365);
		return months <= 0 ? 0 : months;
	}


var joiningYear = new Date(incr_date('<?php echo $this->session->userdata('doj') ?>')).getFullYear();
var joiningMonth = new Date(incr_date('<?php echo $this->session->userdata('doj') ?>')).getMonth()+1;
var joiningDate = new Date(incr_date('<?php echo $this->session->userdata('doj') ?>')).getDate();
var currentYear = new Date().getFullYear();
var currentMonth = new Date().getMonth()+1;
var currentDate = new Date().getDate();
var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(joiningYear,joiningMonth,joiningDate);
var secondDate = new Date(currentYear,currentMonth,currentDate);

var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);

// annual Leave
$.ajax({
	type: 'POST',
	data: {'employeeId' : emp_id},
	url: '<?php echo base_url('user/getALApprovedDays');?>',	
	dataType: 'json',
	success: function (data){
		var totalAnnuals = 0;
		if(currentStatusMonth >= 12 ){
			var exceeded =  Math.floor(currentStatusMonth / 12) ;
			totalAnnuals = (exceeded > 0) ? 21 * exceeded : 21;
		} 

		var approvedDays = (parseInt('<?php echo $this->session->userdata('remaining_annuals') ?>') > 0)  ? parseInt('<?php echo $this->session->userdata('remaining_annuals') ?>') : 0;
		if(data){
			for(var i=0 ; i<data.length ; i++){
			approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
			}
		}
	
		var annualTotal = document.getElementById('emp_annualTotal');
		var annualRemaining = document.getElementById('emp_annualRemaining');
		annualTotal.innerHTML = (totalAnnuals) ? (totalAnnuals) : 0 ;
		annualRemaining.innerHTML = (approvedDays) ? totalAnnuals - approvedDays : 0 ;
		},
	error:function(data){console.log(data.responseText);}
});  

// Sick Leave

$.ajax({
	type: 'POST',
	data: {'employeeId' :emp_id},
	url: '<?php echo base_url('user/getSLApprovedDays');?>',	
	dataType: 'json',
	success: function (data){
		var totalSicks = 0;
        var approvedDays = (parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') > 0)  ? parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') : 0;
		console.log(approvedDays)
		if(currentStatusMonth < 3){
           totalSicks = 0
		   approvedDays = 0;
		}
		if(currentStatusMonth >= 3 && currentStatusMonth < 12){
           totalSicks = 6
		   approvedDays = (parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') > 0)  ? parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') : 0;
		}
		if(data){
			for(var i=0 ; i<data.length ; i++){
			approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
			}
		}
	    console.log(approvedDays)
		var sickTotal = document.getElementById('emp_sickTotal');
		var sickRemaining = document.getElementById('emp_sickRemaining');
		sickTotal.innerHTML = (totalSicks) ?  totalSicks : 0;
		sickRemaining.innerHTML = (totalSicks) ? totalSicks - approvedDays : 0 ;
		},
	error:function(data){console.log(data.responseText);}
	});  

// // Unpaid Leave
// $.ajax({
// 		type: 'POST',
// 		data: {'employeeId' : emp_id},
// 		url: '<?php echo base_url('user/getULApprovedDays');?>',	
// 		dataType: 'json',
// 		success: function (data){
// 			var totalUnpaid = 0;
// 			if(currentStatusMonth >= 3){
// 			totalUnpaid = 15
// 			}
// 			if(currentStatusMonth < 3){
// 			totalSicks = 0
// 			approvedDays = 0;
// 			}
// 			var approvedDays = 0;
// 			if(data){
// 				for(var i=0 ; i<data.length ; i++){
// 				approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
// 				}
// 			}
// 			console.log(approvedDays)
// 			var unpaidTotal = document.getElementById('emp_unpaidTotal');
// 			var unpaidRemaining = document.getElementById('emp_unpaidRemaining');
// 			unpaidTotal.innerHTML = (totalUnpaid) ?  totalUnpaid : 0;
// 			unpaidRemaining.innerHTML = (totalUnpaid) ? totalUnpaid - approvedDays : 0;
// 			},
// 		error:function(data){console.log(data.responseText);}
// 		});  
          
		
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url('user/userChart');?>',	
		dataType: 'json',
		success: function (data){
              Highcharts.chart('chart1', {
						chart: {
							type: 'column',
							options3d: {
								enabled: true,
								alpha: 10,
								beta: 25,
								depth: 70
							}
						},
					title: {
							text: 'Your Leaves'
						},
						subtitle: {
							text: 'Your Monthly Wise Leave'
						},
						plotOptions: {
							column: {
								depth: 25
							}
						},
						xAxis: {
							categories: Highcharts.getOptions().lang.shortMonths
						},
						yAxis: {
							title: {
								text: null
							}
						},
						series: [{
							name: "Leaves",
							data:data.chartArray
						}]
					});
			},
		error:function(data){console.log(data.responseText);}
		});  
		
</script>
<script type="text/javascript">
$(function () {

	var chartdata = <?php echo json_encode($chartdata); ?>;
	var chartView = false;
	for(var i = 0 ; i < chartdata.length ; i++){
		if(chartdata[i].y > 0){
          chartView = true
		}
	}
	if(chartView){
	$('#chart1').parent().removeClass('col-md-12');
	$('#chart1').parent().addClass('col-md-6');
    var department = <?php echo json_encode($department); ?>;
    var colors = Highcharts.getOptions().colors;
    var categories = department;
    var data =[
				<?php $i=0; foreach ($chartdata as $data){ ?>
				{
					y:<?php echo $data['y']; ?>,
					color: colors[<?php echo $i ?>],
					drilldown: {
		                name:"<?php echo $data['department']; ?>",
		                categories: <?php echo json_encode($data['employees']); ?>,
		                data:       <?php echo json_encode($data['days']); ?>,
		                color: colors[<?php echo $i ?>]
            			}		
				},
				<?php $i++;}?>
		       ];
    console.log(data)
    var browserData = [];
    var versionsData = [];
    var i;
    var j;
    var dataLen = data.length;
    var drillDataLen;
    var brightness;


            // Build the data arrays
            for (i = 0; i < dataLen; i += 1) {

                // add browser data
                browserData.push({
                    name: categories[i],
                    y: data[i].y,
                    color: data[i].color
                });

                // add version data
                drillDataLen = data[i].drilldown.data.length;
                for (j = 0; j < drillDataLen; j += 1) {
                    brightness = 0.2 - (j / drillDataLen) / 5;
                    versionsData.push({
                        name: data[i].drilldown.categories[j],
                        y: data[i].drilldown.data[j],
                        color: Highcharts.Color(data[i].color).brighten(brightness).get()
                    });
                }
            }

            // Create the chart
            $('#chart2').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Applied Leaves'
                },
                subtitle: {
                    text: 'Managers Applied Leaves Chart'
                },
                yAxis: {
                    title: {
                        text: 'Total percent market share'
                    }
                },
                plotOptions: {
                    pie: {
                        shadow: false,
                        center: ['50%', '50%']
                    }
                },
                tooltip: {
                    valueSuffix: ' days'
                },
                series: [{
                    name: 'Department Leaves',
                    data: browserData,
                    size: '60%',
                    dataLabels: {
                        formatter: function () {
                            return this.y > 5 ? this.point.name : null;
                        },
                        color: '#ffffff',
                        distance: -30
                    }
                }, {
                    name: 'Leave Days',
                    data: versionsData,
                    size: '100%',
                    innerSize: '60%',
                    dataLabels: {
                        formatter: function () {
                            // display only if larger than 1
                            return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + ' days' : null;
                        }
                    }
                }]
            });
	}
	else{
		$('#chart1').parent().addClass('col-md-12');
		$('#chart1').parent().removeClass('col-md-6');
	
	}
   
    
});

</script>