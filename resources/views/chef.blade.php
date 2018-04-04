<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Chef page</title>
</head>
<style>
/*
A custom Bootstrap 3.2 'Holo' style theme
from http://bootply.com

This CSS code should follow the 'bootstrap.css'
in your HTML file.

license: MIT
author: bootply.com
*/

@import url(http://fonts.googleapis.com/css?family=Droid+Sans+Mono);

html,body {
  height: 100%;
  font-family: 'Droid Sans Mono', sans-serif;
}

p,h1,h2,h3,h4 {
  font-family: 'Droid Sans Mono', sans-serif;
}

hr {
  border-color:#191919;
}



/* set the fixed height of the footer here */
footer {
  height: 120px;
  background-color: #222222;
  border:0 solid #080808;
  border-top-width: 1px;
  margin-top:50px;
}

footer > .container {
  padding: 20px;
}

body {
  padding-top: 51px; 
  color: #f9f9f9;
}
a {
  color:#bcbcbc;
}
.text-center {
  padding-top: 20px;
}

#sidebar {
  height: 100%;
  padding-right: 0;
  padding-top: 20px;
  background-color: black;
}

#sidebar .affix {
  position:fixed;
  top:55;
  width:220px;
}

#sidebar .affix-bottom {
  position:fixed;
  top:55;
  width:220px;
}

#sidebar .nav {
  width: 95%;
}
#sidebar li {
  border:0 #1e1e1e solid;
  border-bottom-width:1px;
}
#sidebar li a {
  padding-left:1px;
  color:white;

}
#sidebar li a:hover {

 background-color:#222222;
  color:#ffffff;
}

/* collapsed sidebar styles */
@media screen and (max-width: 767px) {
  .row-offcanvas {
    position: relative;
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
  }
  .row-offcanvas-right
  .sidebar-offcanvas {
    right: -41.6%;
  }

  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -41.6%;
  }
  .row-offcanvas-right.active {
    right: 41.6%;
  }
  .row-offcanvas-left.active {
    left: 41.6%;
  }
  .sidebar-offcanvas {
    position: absolute;
    top: 0;
    width: 41.6%;
  }
  #sidebar {
    background-color:#3b3b3b;
    padding-top:0;
  }
  #sidebar .nav>li {
    color: #ddd;
    background: linear-gradient(#3E3E3E, #383838);
    border-top: 1px solid #484848;
    border-bottom: 1px solid #2E2E2E;
    padding-left:10px;
  }
  #sidebar .nav>li:first-child {
    border-top:0;
  }
  #sidebar .nav>li>a {
    color: #ddd;
  }
  #sidebar .nav>li>a>img {
    max-width: 14px;
  }
  #sidebar .nav>li>a:hover, #sidebar .nav>li>a:focus {
    text-decoration: none;
    background: linear-gradient(#373737, #323232);
    color: #fff;  
  }
  #sidebar .nav .caret {
    border-top-color: #fff;
    border-bottom-color: #fff;
  }
  #sidebar .nav a:hover .caret{
    border-top-color: #fff;
    border-bottom-color: #fff;
  }
}

/* theme */
.btn,.form-control,.alert,.progress,.panel,.list-group,.well,.list-group-item:first-child {border-radius:1px;box-shadow:0 0 0;}
.btn {border-color:transparent;}
.btn-default,.well {
  background-color:#cccccc;
  border-color:#c0c0c0;
}
.btn-primary,.label-primary,.list-group-item.active,.list-group-item.active:hover,.list-group-item.active:focus,.btn.active,a.list-group-item.active, a.list-group-item.active:hover, a.list-group-item.active:focus {
   background-color:#0099CC;
   border-color:transparent;
}
.btn-info,.label-info,.progress-bar-info {
  background-color:#33b5e5;
}
.btn-success,.label-success,.progress-bar-success {
  background-color:#669900;
}
.btn-danger,.label-danger,.progress-bar-danger {
  background-color:#FF4444;
}
.btn-warning,.label-warning,.progress-bar-warning {
  background-color:#FFBB33;
  color:#444444;
}
.nav-tabs>li>a {
  border-radius:0;
}
     
h3,h4,h5,.panel {
   color:#555555;
}
.panel hr {
   border-color:#efefef;
}



</style>
<body>
  <div ng-app="myApp" ng-controller="my_cntrl" class="page-container">
  
  <!-- top navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Restuarent Chef Page</a>
      </div>
    </nav>
      
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!--sidebar-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">
            <ul class="nav" ng-repeat="x in id_array track by $index" id="sidebar-nav">
              <li>
                    <a ng-click="display_order(x)" style="cursor: pointer;">Order <%=x%></a>
                  </li>
            </ul>
           </div>
        </div><!--/sidebar-->
    
        <!--/main-->
        <div  class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
          <div class="row">
             <div class="col-sm-6 col-sm-offset-2">
                <br>
                <br>
                <div id='curr_order' class="panel panel-default">

                  <!--/panel-body-->
                </div><!--/panel-->
                <div id='sel' ng-click ='select_order(selected_order_id)'></div>
          
          <br>
          <br>
             <div id='order_selected' class="input-group">
             <div class="row">
             <div class="col-md-5">
  <input id='st_p' ng-model = "status" type="text" class="form-control" placeholder="Percentage status"> 
</div>
<div class="col-md-5">
 <input id='st_t' ng-model = "status2" type="text" class="form-control" placeholder="Time status">
</div>
<div id = 'send_st' ng-click="send_status(status,status2)" class="col-md-2">
</div>
    
            </div>
            
            </div>
<br>
<div id='rem_order' ng-click = "remove_order(itm_some_id)"></div>
 
          </div><!--/row-->
          
          
          
            <div class="clearfix"></div>
          
          
        </div><!--/.col-xs-12-->
      </div><!--/.row-->
    </div>
  </div><!--/.container-->
</div><!--/.page-container-->

  
        <script type="text/javascript">
            var app=angular.module('myApp',[])
        .config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%=');
    $interpolateProvider.endSymbol('%>');
  });
app.controller('my_cntrl',function($scope,$window,$http){

$scope.id_array = [];
// displaying menue
$scope.disp_menu = function(){
    $http.get('{{url('chef_order')}}')
              .success(function(data){
                $scope.id_array = [];
              $scope.names = angular.fromJson(data);
             $scope.items = $scope.names["chef_orders"];
            for(var i=0;i<$scope.items.length;i++)

             { 
                var check=0;
                for(var j=0;j<$scope.id_array.length;j++)
                {
                    if($scope.items[i].id ==$scope.id_array[j])
                    {
                        check=1;
                    }

                }
                if(check==0)
                {
                    $scope.id_array.push($scope.items[i].id);
                }
             }

               })
              .error(function(data){
                $scope.data="error in fetching data"
              });
}
          setInterval($scope.disp_menu,1000);
              $scope.select_order = function(id)
              {
                    $http.post('/editst',id)
                .success(function(data,status,headers,config)
                {
                  document.getElementById('send_st').innerHTML='<button  class="btn btn-sm btn-info">Send Status</button>';
                    document.getElementById('sel').innerHTML='';
                    document.getElementById('rem_order').innerHTML='<button  class="btn btn-sm btn-info">Order Completed</button>'; 
                })
                .error(function(data,status,headers,config){});
  
                 
              }
              $scope.itm_some_id = 0;
              $scope.current_order = [];
              $scope.selected_order_id = 0;
              $scope.display_order=function(id)
              {
                $scope.selected_order_id=id;
                $scope.current_order = [];
                for(var i=0;i<$scope.items.length;i++)
                {

                          if($scope.items[i].id==id)
                          {
                            $scope.itm_some_id = id;
                               $scope.itm_data = 
                                {   'Name':$scope.items[i].Name,
                                    'Quantity':$scope.items[i].Quantity,
                                }
                                $scope.current_order.push($scope.itm_data);

                          }
                }
                var hehe = "";
                for(var i = 0; i < $scope.current_order.length; i++){
                    hehe = hehe + '<a  class="list-group-item">' + 
                    $scope.current_order[i].Name + 
                    '<span class="pull-right">' + 
                    $scope.current_order[i].Quantity + 
                    '</span></a>';
                  }

                document.getElementById('curr_order').innerHTML='<div class="panel-heading"> <h4>Current Order</h4></div><div id="order" class="panel-body"><div class="list-group">'+ hehe +'</div></div>';
                document.getElementById('sel').innerHTML='<button  class="btn btn-sm btn-info" >Select Order</button>';
                
              }
              $scope.remove_order = function(id)
              {
                if(id==0)
                    {
                        alert('Please select an Order first')
                    }
                else{
                    $http.post('/removeorder',id)

                    .success(function(data)
                    {
                      document.getElementById('order').innerHTML='';
                    })
                    .error(function(data)
                    {

                    });
            }
                 
              }
              $scope.send_status = function(st,st2)
              {
                if ($scope.itm_some_id==0)
                {
                    alert('Please Select an order first');
                    document.getElementById('st_t').value='';
                    document.getElementById('st_p').value='';
                }
                else{
                  if(st!=null||st2!=null){
                             var data;
                    if(st==null &&st2!=null){

                      data = {'id':$scope.itm_some_id,'status_t':st2}
                    }
                    if(st2==null &&st!=null){
                      data = {'id':$scope.itm_some_id,'status_p':st}
                    }
                    if(st2!=null &&st!=null){
                      data = {'id':$scope.itm_some_id,'status_p':st,'status_t':st2}
                    }

                    $http.post('/setstatus',data)

                .success(function(data)
                {
                    alert('Status successfully sent');
                    document.getElementById('st_t').value='';
                    document.getElementById('st_p').value='';
                })
                .error(function(data)
                {

                });
           
                  }
            
                }
                
              } 
                
});

        </script>

        

        
    
</body>

</html>