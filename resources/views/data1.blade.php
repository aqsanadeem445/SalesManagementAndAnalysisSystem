<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Owner</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style type="text/css">
    #hist_div{
      cursor: pointer;
    }
    #pie_div{
      cursor: pointer;
    }
  </style>
  <script type="text/javascript">
  $(document).ready(function()     
  	{
  		
  			var month = {
  			"Jan":1,
  			"Feb":2,
  			"Mar":3,
  			"Apr":4,
  			"May":5,
  			"Jun":6,
  			"Jul":7,
  			"Aug":8,
  			"Sep":9,
  			"Oct":10,
  			"Nov":11,
  			"Dec":12
  		}
    	var as;
    	var sz;
    	$.ajax({
       url: 'http://localhost:28017/testdb/my_collection/?limit=0',
       type: 'get',
       dataType: 'jsonp',
       jsonp: 'jsonp',       
       success: function (data) 
       {
       		as = data["rows"];
       		sz = as.length;       
       },
        error: function (XMLHttpRequest, textStatus, errorThrown) 
        {
          alert("error Fetching data from Database");
        }});
    	
    	

    		var check  = false;
    		var d = new Date();
    		var dt_sys = d.toString();
    		var sys_date_time = dt_sys.split(" ");
    		var sys_mon = sys_date_time[1];
    		sys_mon = month[sys_mon];
    		var sys_date = sys_date_time[2];
    		var sys_year = sys_date_time[3];
    			
        var my_data;
      var pie_data;
      var options;
      var options_pie;
      var chart;
      var chart_pie;

				google.charts.load("current", {packages:["corechart","bar","controls","calendar"]});
				  google.charts.setOnLoadCallback(function () 
				  {
				           my_data = new google.visualization.DataTable();
				          my_data.addColumn("string","Year");
				          my_data.addColumn("number","Quantity");
				          my_data.addColumn("number","Profit");
				         pie_data = new google.visualization.DataTable();
		          		pie_data.addColumn("string","Item_name");
		          		pie_data.addColumn("number","Quantity");
		          		  var year=0;
				          var itm = {};
				          var profit=0;
				          var yearly_data= {};
				          var sale_yr = {};
				          var cost_yr = {};
				          for (i=0;i<sz;i++)
				        {
				            time=as[i].Time;
				            date_time = time.split(" ");

				            time = date_time[1];            
				            date = date_time[0];
				            time = time.split(":");
				            var sale = as[i].Sale_price;
				            var cost = as[i].Cost_price;
				            date = date.split("-");
				            year = parseInt(date[0]);
				            it=as[i].Item;
		            		num = as[i].Quantity;
		            		if(year>=sys_year-5&&year<=sys_year)
		            		{
		            			if(yearly_data.hasOwnProperty(year))
		            			{
		            				yearly_data[year] = yearly_data[year] + num;
		            				sale_yr[year] = sale_yr[year]+sale;
		            				cost_yr[year]=cost_yr[year]+cost;
		            			}
		            			else
		            			{
		            				yearly_data[year] = num;
		            				sale_yr[year] = sale;
		            				cost_yr[year]=cost;
		            			}
		            			if (itm.hasOwnProperty(it))
		            			{
		            				itm[it] = itm[it] + num; 
		            			}
		            			else
		            			{
		            				itm[it] = num;
		            			}
		            		}
		            	}
		            	for (var key in itm)
			          		{
			          			if (itm.hasOwnProperty(key))
			          			{
			          				var val = itm[key];          		
			          				pie_data.addRows([[key,val]]);
			          			}
			          		}
		          			for (var key in yearly_data)
		          			{
		          				if(yearly_data.hasOwnProperty(key))
		          				{
		          					var val = yearly_data[key];
		          					var pro = sale_yr[key]-cost_yr[key];

		          					 my_data.addRows([[key,val,pro]]);
		          				}
		          			}
		          			 options_pie = 
			          		{};

          					 chart_pie = new google.visualization.PieChart(document.getElementById('pie_year'));
          					chart_pie.draw(pie_data, options_pie);
				          	 options = 
				          	{
				          		curveType: 'function',
				          		hAxis:{title:"Year"},
				          		vAxis:{title:"Sales"},
				          	};
		          			 chart = new google.charts.Bar(document.getElementById('hist_year'));
		          			chart.draw(my_data, options);

			});
          $('#hist_div').click(function(){
    document.getElementById('no_sale').innerHTML = '<div class="col-lg-12"><section class="panel"><div class="panel-body"><div class="tab-pane" id="chartjs"><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Histogram</header><div class="panel-body text-center"><div id="hist"></div></div></section></div></div><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Pie Chart</header><div class="panel-body text-center"><div id="pie_daily" ></div></div></section></div></div></div></div></div>';
    document.getElementById("pie_daily").style.height=100+"%";
                    document.getElementById("pie_daily").style.width=100+"%";
                  document.getElementById("hist").style.height=100+"%";
                    document.getElementById("hist").style.width=100+"%";
    chart_pie = new google.visualization.PieChart(document.getElementById('pie_daily'));
    chart_pie.draw(pie_data, options_pie);
    chart = new google.charts.Bar(document.getElementById('hist'));
    chart.draw(my_data, options);
  
});
$('#pie_div').click(function(){
    document.getElementById('no_sale').innerHTML = '<div class="col-lg-12"><section class="panel"><div class="panel-body"><div class="tab-pane" id="chartjs"><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Pie Chart</header><div class="panel-body text-center"><div id="pie_daily"></div></div></section></div></div><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Histogram</header><div class="panel-body text-center"><div id="hist" ></div></div></section></div></div></div></div></div>';
    document.getElementById("pie_daily").style.height=100+"%";
                    document.getElementById("pie_daily").style.width=100+"%";
                  document.getElementById("hist").style.height=100+"%";
                    document.getElementById("hist").style.width=100+"%";
                    
    chart_pie = new google.visualization.PieChart(document.getElementById('pie_daily'));
    chart_pie.draw(pie_data, options_pie);
    chart = new google.charts.Bar(document.getElementById('hist'));
    chart.draw(my_data, options);
  
  });
		});
  		
  </script>
</head>
<body>
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="" class="logo">Admin <span class="lite">Page</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                             
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                   
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                  
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li>
                        <a href="{{ route('logout') }}"
                                            >Logout</a>
                        
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="/home">
                          <i class="icon_house_alt"></i>
                          <span>Daily Sales</span>
                      </a>
                  </li>
				      
                  <li>                     
                      <a class="" href="/month">
                          <i class="icon_piechart"></i>
                          <span>Monthly Sale </span>
                          
                      </a>
                                         
                  </li>
                  <li>                     
                      <a class="" href="/year">
                          <i class="icon_piechart"></i>
                          <span>Yearly Sale</span>
                          
                      </a>
                                         
                  </li>
                             
              
                  
                 
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <section id="main-content">
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/home">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
              
            <div id='no_sale' onclick="" class="row">
              <div class="col-md-12">
                  <section class="panel">
                     
                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->
                          <div id="hist_div" class="col-md-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Histogram
                                  </header>
                                  <div class="panel-body text-center">
                                     <div id="hist_year"></div>
                                  </div>
                              </section>
                          </div>  
                                              
                          <div id='pie_div' class="col-md-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Pie Chart
                                  </header>
                                  <div class="panel-body text-center">
                                      
                       <div id="pie_year" ></div>
                                  </div>
                              </section>
                          </div>  
                          </div>             
                          
                
                  </div>
                      </div>
                      </div>
                  
              </div>
              <!-- chart morris start -->
            </div>
			 
            
            
		  
		  <!-- Today status end -->
			
              
			

				
					
				

              <!-- project team & activity start -->
     
         
                  
		
		
              <!-- project team & activity end -->

          </section>

      <!--main content end-->
  </section>
<!--   <h4>Sales based on Dates</h4>
  <div class="form-group">
<form class="form-inline" id="date_select">
<b>Start Date: </b>
<select name="date_st">
  		<option value="1">1</option>
  		<option value="2">2</option>
  		<option value="3">3</option>
  		<option value="4">4</option>
  		<option value="5">5</option>
  		<option value="6">6</option>
  		<option value="7">7</option>
  		<option value="8">8</option>
  		<option value="9">9</option>
  		<option value="10">10</option>
  		<option value="11">11</option>
  		<option value="12">12</option>
  		<option value="13">13</option>
  		<option value="14">14</option>
  		<option value="15">15</option>
  		<option value="16">16</option>
  		<option value="17">17</option>
  		<option value="18">18</option>
  		<option value="19">19</option>
  		<option value="20">20</option>
  		<option value="21">21</option>
  		<option value="22">22</option>
  		<option value="23">23</option>
  		<option value="24">24</option>
  		<option value="25">25</option>
  		<option value="26">26</option>
  		<option value="27">27</option>
  		<option value="28">28</option>
  		<option value="29">29</option>
  		<option value="30">30</option>  		
  		<option value="31">31</option>  		
  	</select>
  	<b>End Date: </b>
  	<select name="date_st">
  		<option value="1">1</option>
  		<option value="2">2</option>
  		<option value="3">3</option>
  		<option value="4">4</option>
  		<option value="5">5</option>
  		<option value="6">6</option>
  		<option value="7">7</option>
  		<option value="8">8</option>
  		<option value="9">9</option>
  		<option value="10">10</option>
  		<option value="11">11</option>
  		<option value="12">12</option>
  		<option value="13">13</option>
  		<option value="14">14</option>
  		<option value="15">15</option>
  		<option value="16">16</option>
  		<option value="17">17</option>
  		<option value="18">18</option>
  		<option value="19">19</option>
  		<option value="20">20</option>
  		<option value="21">21</option>
  		<option value="22">22</option>
  		<option value="23">23</option>
  		<option value="24">24</option>
  		<option value="25">25</option>
  		<option value="26">26</option>
  		<option value="27">27</option>
  		<option value="28">28</option>
  		<option value="29">29</option>
  		<option value="30">30</option>  		
  		<option value="31">31</option>  		
  	</select>
<b>Month: </b>
<select name="month_st">
  		<option value="January">January</option>
  		<option value="February">February</option>
  		<option value="March">March</option>
  		<option value="April">April</option>
  		<option value="May">May</option>
  		<option value="June">June</option>
  		<option value="July">July</option>
  		<option value="August">August</option>
  		<option value="September">September</option>
  		<option value="October">October</option>
  		<option value="November">November</option>
  		<option value="December">December</option>
  	</select>
<label for="yr">Year:</label>
<input type="text" class="form-control" id = "yr">	
</form>
</div>
<div class="container">
	<button id="Week" class="btn btn-primary">
		Submit
	</button>  
<br>
</div>
  <div id="hist_week"></div>
  <div id="pie" ></div>
 <h4>Monthly Sales</h4>  
  <form id="month_select">
 <b>Start Month:</b> 	<select name="month_st">
  		<option value="January">January</option>
  		<option value="February">February</option>
  		<option value="March">March</option>
  		<option value="April">April</option>
  		<option value="May">May</option>
  		<option value="June">June</option>
  		<option value="July">July</option>
  		<option value="August">August</option>
  		<option value="September">September</option>
  		<option value="October">October</option>
  		<option value="November">November</option>
  		<option value="December">December</option>
  	</select>
<b>End Month:</b> <select name="month_en">
  		<option value="January">January</option>
  		<option value="February">February</option>
  		<option value="March">March</option>
  		<option value="April">April</option>
  		<option value="May">May</option>
  		<option value="June">June</option>
  		<option value="July">July</option>
  		<option value="August">August</option>
  		<option value="September">September</option>
  		<option value="October">October</option>
  		<option value="November">November</option>
  		<option value="December">December</option>
  	</select>
 <b>Enter Year:</b> 	 <input type="text">
  </form>	
<div class="container">
	<button id="montly_sale" class="btn btn-primary">
		Submit
	</button>
	<br>  
<div id="hist_month"></div>
<div id="pie_month"></div>
</div>
<h4>Yearly Sales</h4>
<div class="form-group">
<form class="form-inline" id="year_select">
<label for="st_date">Start Year:</label>
	<input type="text" class="form-control" id = "st_year">
<label for="en_date">End Year:</label>
<input type="test" class="form-control" id = "en_year">	
</form>
</div>
<div class="container">
	<button id="yearly_sale" class="btn btn-primary">
		Submit
	</button>
</div>
<div id = "hist_year"></div>
<div id = "pie_year"></div>

 -->
 </body></html>