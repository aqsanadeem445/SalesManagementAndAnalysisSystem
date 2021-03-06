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
  <style type="text/css">
    #hist_div{
      cursor: pointer;
    }
    #pie_div{
      cursor: pointer;
    }
  </style>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Owner</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    	var my_data;
    	var pie_data;
      var options;
      var options_pie;
      var chart;
      var chart_pie;
    		var check  = false;
    		var d = new Date();
    		var dt_sys = d.toString();
    		var sys_date_time = dt_sys.split(" ");
    		var sys_mon = sys_date_time[1];
    		sys_mon = month[sys_mon];
    		var sys_date = sys_date_time[2];
    		var sys_year = sys_date_time[3];
    			  google.charts.load("current", {packages:["corechart","controls","calendar"]});
				  google.charts.setOnLoadCallback(function () 
				  {
				           my_data = new google.visualization.DataTable();
				          my_data.addColumn("string","Time");
				          my_data.addColumn("number","Quantity");
				          my_data.addColumn("number","Profit");
				         pie_data = new google.visualization.DataTable();
		          		pie_data.addColumn("string","Item_name");
		          		pie_data.addColumn("number","Quantity");
		          		var itm= {};
				          var time_array = new Array(24);
				          var sum_sale = new Array(24);
				          var sum_cost = new Array(24);
				          for(var i=0;i<24;i++)
				          {
				          	time_array[i] = 0;
				          	sum_sale[i]=0;
				          	sum_cost[i]=0;
				          }
				          var mon=0;
				          var year=0;   
				          var profit=0;
				          var customers_array = [];
				          for (i=0;i<sz;i++)
				          {
					            time=as[i].Time;
					            Qty = as[i].Quantity;
					            date_time = time.split(" ");
					            /*var sale = as[i].Sale_price - as[i].Cost_price;
					             profit = (sale/as[i].Sale_price)*100;
					            */  
					            time = date_time[1];            
					            date = date_time[0];
					            time = time.split(":");

					            date = date.split("-");
					            time = parseInt(time[0]);
					            mon = parseInt(date[1]);
					            year = parseInt(date[0]);
					            date = parseInt(date[2]);
					            it=as[i].Item;
			            		num = as[i].Quantity;
			            		var sale = as[i].Sale_price;
			            		var cost = as[i].Cost_price;
                      console.log(date+'-'+mon+'-'+year);
					            if(date==sys_date&&mon==sys_mon&&year==sys_year)
					          	{
                        var order_check = false;
					          		if(customers_array.length==0){
					          			customers_array.push(as[i].Order);
					          		}
						          	else
						          	{
						          		for(var j=0;j<customers_array.length;j++)
						          		{
						          			if(customers_array[j]==as[i].Order)
						          			{
						          				order_check=true;	
						          			}
						          		}
                          if(order_check==false)
                          {
                            customers_array.push(as[i].Order);
                          }
						          	}
					          		
					          		check = true;
					          		time_array[time] = time_array[time] + Qty;
					          		sum_sale[time]=sum_sale[time]+sale;
					          		sum_cost[time]=sum_cost[time]+cost;
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
				      		document.getElementById('Custom').innerHTML=customers_array.length;
				      		if(check==true)
				      		{

				      			/*document.getElementById("pie_daily").style.height=100+"%";
        						document.getElementById("pie_daily").style.width=100+"%";
    							document.getElementById("hist").style.height=100+"%";
        						document.getElementById("hist").style.width=100+"%";
				      			*/for (var i=0; i < time_array.length; i++)
						          {
				          			val=time_array[i];
				          			var pro = sum_sale[i]-sum_cost[i];
				          			pro = pro/sum_sale[i];
				          			pro=pro*100;
				          			my_data.addRows([[i+":00",val,pro]]);
				          		  }
		          		  		for (var key in itm)
				          		{
				          			if (itm.hasOwnProperty(key))
				          			{
				          				val = itm[key];          		
				          				pie_data.addRows([[key,val]]);
				          			}
				          		}
					          	 options_pie = 
					          		{
					          			is3D: true,
					              	};

			          				 chart_pie = new google.visualization.PieChart(document.getElementById('pie_daily'));
			          				chart_pie.draw(pie_data, options_pie);
		          
						           options = 
						          {
						          	curveType: 'function',
						          	hAxis:{title:"Time"},
						          	vAxis:{title:"Sales"},
						          };
						           chart = new google.visualization.AreaChart(document.getElementById('hist'));
						          chart.draw(my_data, options);
				      		}
				      		else
				      		{
				      			document.getElementById('no_sale').style.color = '#ff0000';
				      			document.getElementById('no_sale').style.fontStyle= "italic";
				      			document.getElementById('no_sale').innerHTML='<center><h4>No Sales Today</h4></center>';
				      		}

				    });
$('#hist_div').click(function(){
  if(check==true)
  {
    document.getElementById('no_sale').innerHTML = '<div class="col-lg-12"><section class="panel"><div class="panel-body"><div class="tab-pane" id="chartjs"><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Line Chart</header><div class="panel-body text-center"><div id="hist"></div></div></section></div></div><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Pie Chart</header><div class="panel-body text-center"><div id="pie_daily" ></div></div></section></div></div></div></div></div>';
    document.getElementById("pie_daily").style.height=100+"%";
                    document.getElementById("pie_daily").style.width=100+"%";
                  document.getElementById("hist").style.height=100+"%";
                    document.getElementById("hist").style.width=100+"%";
    chart_pie = new google.visualization.PieChart(document.getElementById('pie_daily'));
    chart_pie.draw(pie_data, options_pie);
    chart = new google.visualization.AreaChart(document.getElementById('hist'));
    chart.draw(my_data, options);
  }
});
$('#pie_div').click(function(){
  if(check==true){
    document.getElementById('no_sale').innerHTML = '<div class="col-lg-12"><section class="panel"><div class="panel-body"><div class="tab-pane" id="chartjs"><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Pie Chart</header><div class="panel-body text-center"><div id="pie_daily"></div></div></section></div></div><div class="row"><div class="col-lg-12"><section class="panel"><header class="panel-heading">Line Chart</header><div class="panel-body text-center"><div id="hist" ></div></div></section></div></div></div></div></div>';
    document.getElementById("pie_daily").style.height=100+"%";
                    document.getElementById("pie_daily").style.width=100+"%";
                  document.getElementById("hist").style.height=100+"%";
                    document.getElementById("hist").style.width=100+"%";
                    
    chart_pie = new google.visualization.PieChart(document.getElementById('pie_daily'));
    chart_pie.draw(pie_data, options_pie);
    chart = new google.visualization.AreaChart(document.getElementById('hist'));
    chart.draw(my_data, options);
  }
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
          </div>
      </aside>
      <section id="main-content">
        <div class="row">
        <div class="col-md-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/home">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>                
          </ol>
        </div>
      </div>
              <div class="row">
        
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-shopping-cart"></i>
            <div id='Custom' class="count"></div>
            <div class="title">Customers</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
        
        
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
                                      Line Chart
                                  </header>
                                  <div class="panel-body text-center">
                                     <div id="hist"></div>
                                  </div>
                              </section>
                          </div>  
                                              
                          <div id='pie_div' class="col-md-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Pie Chart
                                  </header>
                                  <div class="panel-body text-center">
                                      
                       <div id="pie_daily" ></div>
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
          </section>
</section>
 </body></html>