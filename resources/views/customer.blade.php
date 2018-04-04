<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>Customer Page</title>


<link href="css/bootstraps.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/stylus.css" rel="stylesheet" type="text/css" media="all" /> 
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cookery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
      });
    </script>
  <!-- start-smoth-scrolling -->
<link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->


</head>
<body>
<div ng-app="CustomApp" ng-controller="Customer_cntrl">
  <div class="header">
  <div class="container">
    <div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
<!--      <h1><a href="index.html"><span>C</span><img src="images/oo.png" alt=""><img src="images/oo.png" alt="">kery</a></h1>
 -->    </div>
    <div class="nav-icon">    
      <a href="#" class="navicon"></a>
        <div class="toggle">
          <ul class="toggle-menu">
            <li><a class="active" href="/customer">Home</a></li>
            <li><a  href="#fh5co-menus">Tiled</a></li>
            <li><a  href="#gallery">List</a></li>
          
            
          </ul>
        </div>
      <script>
      $('.navicon').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
      });
      </script>
    </div>
  <div class="clearfix"></div>
  </div>
  <!-- start search-->  
    <div class="banner">
    
    
      <h4 class="animated wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="500ms">Welcome To Restaurent</h4>
    </div>
</div>
<!--content-->
<div id="fh5co-menus" data-section="menu">
      <div class="container">
        <div class="row text-center fh5co-heading row-padded">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="heading1 to-animate">Food Menu</h2>
        
          </div>
        </div>
        <div class="row row-padded">
          <div class="col-md-12">
            <div class="fh5co-food-menu to-animate-2">
              <div class="row">
              <div class="col-md-7">
                <div class="row">
              <ul ng-repeat="item in items track by $index" >
              <div class="col-md-6">
                <li>
                  <div class="fh5co-food-desc">
                    <figure>
                      <img src="[%=item.Img_Path%]" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">
                    </figure>
                    <div>
                      <h3>[%=item.Name%]</h3>
                      <button ng-click="add_item(item)"  class="btn  btn-success btn-sm" >
          <span class="glyphicon">Select Item</span> 
        </button>
                    </div>
                  </div>
                  <div class="fh5co-food-pricing">
                    Rs.[%=item.Sale_price%]
                  </div>
                </li>
                </div>

              </ul>

              </div><!-- inner row -->
              </div>
                <div class="col-md-3 col-md-offset-1">
                    <h2 id='cart' class="text-center" style="font-family: Edwarbian Script ITC;
    font-size: 45px;
    color: #97824B;margin-bottom: 20px"></h2>
   <br>
   <div class="panel-group" ng-repeat="c in cart track by $index">
  <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 class="panel-title text-left">
      [%=c.Name%]<b>&nbsp;x[%=c.count%]</b><button ng-click="remove_item(c.id)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-minus"></span> 
        </button>
<!-- <tr>
  <td>[%=c.Name%]</td>
  <td>x[%=c.count%]</td>
  <td><button ng-click="remove_item(c.id)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-minus"></span> 
        </button></td>
</tr>  -->       
        
      </h4>
      
    </div>
  </div>
  

</div>
    <br>
    <h3 id='total_cost' style="color:#97824B;" class="pull-right">
        
           
        
      </h4>
      <br>
<div id='place' ng-click="saveCart()"></div>

                </div>
              </div>
              
            </div>
          </div>
        
        </div>  <!-- outer row -->
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
<hr class="style1">  
</div> 
    </div>    <!-- row -->
      </div>
    </div>



<!--Order-->
  <div id="gallery" class="gallery">
    <div class="container">
      <div class="agile-title">
        <h3 >Order Food</h3>
      </div>
      <div   class="gallery-agileinfo-row">
      <div class="row">
        <div class="col-md-9">
        <div ng-repeat="item in items track by $index" class="col-md-4 gallery-grids">
          <div class="hover ehover14">
            <a class="swipebox" >
              <img src="[%=item.Img_Path%]" alt="" class="img-responsive" />
              <div class="overlay">
                <h4>[%=item.Name%]</h4>
                <div style="cursor: pointer;" class="info nullbutton button" ng-click="add_item(item)" data-toggle="modal" data-target="#modal14">Select Item</div>
              </div>
            </a>  
          </div>
        </div> 
                <div class="clearfix"> </div> 

        </div><!-- Col 9 end -->
        
        <div class="col-md-3">
          <h2 id='cart1' class="text-center" style="font-family: 'Edwarbian Script ITC';
    font-size: 45px;
    color: white;margin-bottom: 20px"></h2>
   <br>
   <div class="panel-group" ng-repeat="c in cart track by $index">
  <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 class="panel-title text-left">
      [%=c.Name%];<b>&nbsp;x[%=c.count%]</b><button ng-click="remove_item(c.id)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-minus"></span> 
        </button>
<!-- <tr>
  <td>[%=c.Name%]</td>
  <td>x[%=c.count%]</td>
  <td><button ng-click="remove_item(c.id)" class="btn btn-info btn-sm pull-right" >
          <span class="glyphicon glyphicon-minus"></span> 
        </button></td>
</tr>  -->       
        
      </h4>
      
    </div>
  </div>
  

</div>
    <br>
    <h3 id='total_cost1' style="color:#97824B;" class="pull-right">
        
           
        
      </h4>
      <br>
<div id='place1' ng-click="saveCart()"></div>
        </div>   <!-- col 3 ends here -->
          
        

        <!-- Row end here -->
      </div>  
        
         
      </div>
    </div>
  </div>



<!--news-->
  
</div>
<!--footer-->
  <div class="footer">
    <div class="container">
      <div class="footer-head">
        <div class="col-md-8 footer-top animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
          <ul class=" in">
            <li><a href="/customer">Home</a></li>
            <li><a  href="#fh5co-menus">Menu</a></li>
            <li><a  href="#gallery">Order Food</a></li>
          </ul>         
          </div>
        <div class="col-md-4 footer-bottom  animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <h2>Follow Us</h2>
          <label><i class="glyphicon glyphicon-menu-up"></i></label>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>
          

        </div>
      <div class="clearfix"> </div>
          
      </div>
      <p class="footer-class animated wow bounce" data-wow-duration="1000ms" data-wow-delay="500ms">&copy; 2016 Cookery . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
    </div>
  </div>
</div>
     
  <!--//footer-->
  <script type="text/javascript">
  var app=angular.module('CustomApp',[])
.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[%=');
    $interpolateProvider.endSymbol('%]');
  });
app.controller('Customer_cntrl',function($scope,$window,$http){

$scope.cart = [];
$scope.total=0;
// displaying menue
              $http.get('{{url('showitems')}}')
              .success(function(data){
              $scope.names = angular.fromJson(data);
             $scope.items = $scope.names["orders"];
             console.log($scope.items);
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
            document.getElementById('total_cost').innerHTML='Total Cost: <span >Rs.'+$scope.total+'</span>';
            document.getElementById('total_cost1').innerHTML='Total Cost: <span >Rs.'+$scope.total+'</span>';
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
    document.getElementById('cart1').innerHTML='';
    document.getElementById('place1').innerHTML='';
    document.getElementById('total_cost').innerHTML='';
    document.getElementById('total_cost1').innerHTML='';
    }
}
  // adding items to cart function

  $scope.add_item=function(item)
  {
    document.getElementById('cart').innerHTML='Your Order';
    document.getElementById('place').innerHTML='<button class="btn btn-info btn-md pull-riht" >Place Order</button>';
    document.getElementById('cart1').innerHTML='Your Order';
    document.getElementById('place1').innerHTML='<button class="btn btn-info btn-md pull-riht" >Place Order</button>';     
         var obj = {
         'id':item.id,
         'Name':item.Name,
         'Price':item.Sale_price,
         'Actual':item.Cost_price,
         'count':1,
         };
         $scope.ct=obj.Price*obj.count;
        $scope.total = $scope.total + $scope.ct;
        document.getElementById('total_cost').innerHTML='Total Cost: <span >Rs.'+$scope.total+'</span>';
        document.getElementById('total_cost1').innerHTML='Total Cost: <span >Rs.'+$scope.total+'</span>';
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
        console.log($scope.cart);
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
              url: 'http://localhost:28017/testdb/my_collection/?limit=0',
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