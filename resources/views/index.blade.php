<!DOCTYPE html>
<html>

    <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Restaurant</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main1.css" media="screen" type="text/css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
        <style>
        .marb-35{
    margin-bottom: 35px;
}
.menu-restaurant{
    width: 50%;
    float: left;  
    padding: 15px;
    position: relative;
}
.menu-restaurant .menu-title {
    float: left;
    font-family: Montserrat,arial;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #FFB03B;
}
.menu-restaurant .menu-line {
    position: absolute;
    bottom: 6px;
    border-bottom: 1px dotted rgba(0,0,0,.3);
    margin-left: .6rem;
    margin-right: .6rem;
}
.menu-restaurant .menu-price {
    font-weight: 600;
    position: absolute;
    right: 0;
    top: 0;
}
.menu-restaurant .menu-subtitle {
    display: block;
    float: left;
    color: #B1B1B1;
    font-family: Satisfy,'Open Sans',arial;
    font-size: 1.2rem;
}
.menu-restaurant span.clearfix {
    position: relative;
    display: block;
}
.header-h {
    color: #FFB03B;
    font-size: 46px;
    font-family: 'Satisfy', sans-serif;
    font-weight: 300;
}
.gallery-trigger ul li a.active, .gallery-trigger ul li a:hover {
    background: #FFB03B;
    color: #fff;
    border: 1px solid #FFB03B;
}
.gallery-trigger ul li {
    display: inline-block;
    color: #fff;
    text-transform: capitalize;
    letter-spacing: 1px;
    margin-bottom: 40px;
}
.gallery-trigger ul li a {
    padding: 10px 20px;
    font-size: 14px;
    color: #565656;
    border-radius: 0px;
    border: 1px solid #BBBBBB;
    text-decoration: none;
    cursor: pointer;
}
.btn-info{
    background-color:#FF8C00;
     outline:none;
}

#order{
       background: url('images/new/pexels-photo-260922.jpeg') no-repeat center center; 
    background-size: cover;
    background-position: 70% 50%;
}
#blog {
  padding-top: 75px;
  padding-bottom: 100px;

background-color:#FFB03B;
background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  position: relative;
}
#blog:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: url("../images/overlay-pattern.png") #000000;
  opacity: 0.3;
}
#blog .block .heading {
  color: #fff;
}
#blog .block ul {
  padding-top: 40px;
}
#blog .block ul li {
  overflow: hidden;
  width: 50%;
  float: left;
  background: #fff;
  text-align: center;
  color: #959595;
  transform: 1s;
}
#blog .block ul li:hover img {
  transform: scale(1.2) rotate(10deg);
}
#blog .block ul li h3 {
  color: #323232;
  padding: 0px 40px 20px;
  line-height: 26px;
  position: relative;
}
#blog .block ul li h3:before {
  content: "";
  position: absolute;
  left: 50%;
  bottom: 0;
  width: 90px;
  height: 1px;
  background: #CBC4B5;
  margin-left: -45px;
}
#blog .block ul li p {
  padding-top: 25px;
}
#blog .block ul li .blog-img {
  float: left;
  width: 50%;
  height: 100%;
  background: red;
  overflow: hidden;
}
#blog .block ul li .blog-img img {
  -webkit-transition: all 0.8s ease-out;
  -o-transition: all 0.8s ease-out;
  transition: all 0.8s ease-out;
}
#blog .block ul li .blog-img-2 {
  width: 50%;
  float: right;
  overflow: hidden;
}
#blog .block ul li .blog-img-2 img {
  -webkit-transition: all 0.8s ease-out;
  -o-transition: all 0.8s ease-out;
  transition: all 0.8s ease-out;
  width: 100%;
}
#blog .block ul li .content-right {
  padding: 40px 35px 23px;
  font-size: 16px;
  line-height: 26px;
  float: right;
  width: 50%;
  height: 100%;
  position: relative;
}
#blog .block ul li .content-right:after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  top: 50%;
  width: 30px;
  height: 30px;
  margin-top: -15px;
  background: #fff;
  transform: rotate(45deg);
  margin-left: -15px;
}
#blog .block ul li .content-left {
  padding: 40px 35px 23px;
  width: 50%;
  height: 100%;
  float: left;
  position: relative;
  z-index: 999;
}
#blog .block ul li .content-left:after {
  content: "";
  position: absolute;
  right: -15px;
  top: 50%;
  width: 30px;
  height: 30px;
  margin-top: 0px;
  background: #fff;
  transform: rotate(45deg);
}
#blog .block .btn-more-info {
  float: right;
  padding: 28px 102.5px;
  border-radius: 0px;
  background: #ff530a;
  color: #fff;
  border: 1px solid transparent ;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 16px;
  -webkit-transition: .3s all;
  -o-transition: .3s all;
  transition: .3s all;
}
#blog .block .btn-more-info:hover {
  background: transparent;
  color: #ff530a;
  border: 1px solid #ff530a;
}
.heading {
  text-align: center;
  font-weight: 500;
  color: #2E2E2E;
  padding: 40px 0px;
  position: relative;
}
        </style>
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Restaurant</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href="#home">Home</a></li>
                            <li><a class="color_animation" href="#blog">Menu</a></li>
                            <li><a class="color_animation" href="#order">Place Order</a></li>
                            
                   
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="home" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="top-title"> Restaurant</h2>
                                  </div>
            </div>
        </div>

        <!-- ============ MENU ============= -->
<div ng-app="myApp" ng-controller="cntrl">
       <section  class="section-padding abc" id='blog'>
           <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="block">
<h2 style="font-family: 'Times New Roman';
    font-size: 45px;
    color: white;
    text-align: center;" >Menu</h2> 

<br>    <div class="row">   

    <div class="col-md-3">
    </div>
    <div class="col-md-6">                
        <div class="panel-group" ng-repeat="item in items track by $index">
                 <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 class="panel-title text-left"><%=item.Name%> <span class="pull-right">Rs.<%=item.Sale_price%></span>
        
      </h4>
      
    </div>
  </div>            
                  </div>

</div>


                  </div> <!-- inner row-->


                       
                    </div>

                </div>



            </div>                   <!-- row ends here  -->

        </div>
        </section>


       <!-- ============ Pricing  ============= -->


        <section id ="order" class="description_content" >
            <div   class="container spacer about pic">

  <div class="row">
  <div class="col-sm-4 col-md-offset-1 ">
   <h2 style="font-family: 'Times New Roman';
    font-size: 45px;
    color: #FFB03B;" >Menu</h2>
   <br>

      <!-- menus -->
<div class="panel-group" ng-repeat="item in items track by $index" >
  <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 class="panel-title text-left"><%=item.Name%><button ng-click="add_item(item)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-plus"></span> 
        </button>
        
      </h4>
      
    </div>
  </div>


</div>

  </div>
  <div class="col-sm-4 col-md-offset-2 ">
      <h2 id='cart' style="font-family: 'Times New Roman';
    font-size: 45px;
    color: #FFB03B;"></h2>
   <br>
     

      <!-- menus -->
<div class="panel-group" ng-repeat="c in cart track by $index">
  <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 class="panel-title text-left">
<tr>
  <td><%=c.Name%></td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
    <td></td>
  <td></td>
  <td></td>
  <td></td>
    <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>x<%=c.count%></td>
  <td><button ng-click="remove_item(c.id)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-minus"></span> 
        </button></td>
</tr>        
        
      </h4>
      
    </div>
  </div>
  

</div>
    <br>
<div id='place' ng-click="saveCart()"></div>
</div>
</div>
</div>
        </section>
</div>



        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
<script>
var app=angular.module('myApp',[])
.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%=');
    $interpolateProvider.endSymbol('%>');
  });
app.controller('cntrl',function($scope,$window,$http){

$scope.cart = [];
$scope.total=0;
// displaying menue
              $http.get('{{url('showitems')}}')
              .success(function(data){
              $scope.names = angular.fromJson(data);
             $scope.items = $scope.names["orders"];
               })
              .error(function(data){
                $scope.data="error in fetching data"
              });

   //Remove Item

$scope.remove_item=function(iid)
{
    for (var i=0;i<$scope.cart.length;i++)
    {
        if($scope.cart[i].id==iid)
        {
            $scope.total = $scope.total - $scope.cart[i].Price;
            $scope.cart[i].count--;
            if($scope.cart[i].count==0)
            {
                $scope.cart.splice(i,1);
            }
        }
    }
    if($scope.cart.length==0)
    {
      document.getElementById('cart').innerHTML='';
    document.getElementById('place').innerHTML='';
    }
}
  // adding items to cart function

  $scope.add_item=function(item)
  {
    document.getElementById('cart').innerHTML='Your Order';
    document.getElementById('place').innerHTML='<button class="btn btn-info btn-md pull-riht" >Place Order</button>';     
         var obj = {
         'id':item.id,
         'Name':item.Name,
         'Price':item.Sale_price,
         'Actual':item.Cost_price,
         'count':1,
         };
         $scope.ct=obj.Price*obj.count;
        $scope.total = $scope.total + $scope.ct;
        if($scope.cart.length==0)
        {
            $scope.cart.push(obj);
        }
        else
        {
            var z = 0 ;
            for (var i=0;i<$scope.cart.length;i++)
            {
                if($scope.cart[i].id==obj['id'])
                {
                    $scope.cart[i].count++;

                    z= 1;
                    break;
                }
            }
            if(z==0)
            {
                $scope.cart.push(obj);
            }
        }

  }
$scope.arr = [];
$scope.id_order=0;
  //saving cart
$scope.date;
 $scope.saveCart = function ()
 {
        if($scope.cart.length==0){
        alert('You have not selected anything');
        }
        else{
            document.getElementById('place').innerHTML='';
            $http.post('/savecart',$scope.cart)

            .success(function(data,status,headers,config)
            {
              console.log(data);
                var dt = data.split('{');

                dt = dt[1]+'{'+dt[2];
                dt = '{'+dt;
                dt = angular.fromJson(dt);
                $scope.id_order = dt['id'];
                dt =  dt['Time'];
                $scope.date=dt['date'];
                $scope.dumpdata($scope.date);
            })
            .error(function(data,status,headers,config){});

        }

}
$scope.dumpdata = function(date)
{
  var obj = {};
  for(var i=0;i<$scope.cart.length;i++)
  {
    var obj = {
              "Item" :$scope.cart[i].Name,
              "Quantity":$scope.cart[i].count,
              "Time":date,
              "Cost_price":$scope.cart[i].Actual,
              "Sale_price":$scope.cart[i].Price,
              "Order":$scope.id_order,
              }
            $http({
              method: "POST",
              url: 'http://localhost:28017/Store_inventory/items/?limit=0',
              headers:{'Content-Type': undefined},
              dataType: 'jsonp',
              //jsonp: 'jsonp', 
              data: JSON.stringify(obj),
            });
  
  var ur='/success/'+$scope.id_order;
  $window.location=ur;  
  }
}
});

</script>
    </body>
</html>