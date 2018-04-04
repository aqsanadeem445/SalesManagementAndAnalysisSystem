<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <style type="text/css">
     
h2{
  font-family: 'Edwardian Script ITC';
    font-size: 80px;
    color: #97824B;;
}
h3{
  font-family: 'Edwardian Script ITC';
    font-size: 70px;
    color: #97824B;
}
#font_change
{
  font-family: 'Times New Roman';
    font-size: 20px;
    color: #FFB03B; 
}
.pics
{
  height: 10%;
  width: 20%;
}
.pics:hover
{
  height: 100%
  width: 100%;
}
#clockdiv{
  font-family: sans-serif;
  color: #fff;
  display: inline-block;
  font-weight: 100;
  text-align: center;
  font-size: 30px;
}

#clockdiv > div{
  padding: 5px;
  border-radius: 1px solid black;
  /*background: #97824B;*/
  display: inline-block;
}

#clockdiv div > span{
  padding: 15px;
  border: 1px solid black;
  background: #97824B;
  display: inline-block;
}

.smalltext{
  padding-top: 5px;
  font-size: 16px;
}
   </style>
   <script>
        var app=angular.module('myApp',[])

            .config(function($interpolateProvider) {
                $interpolateProvider.startSymbol('[%=');
                     $interpolateProvider.endSymbol('%]');
  });
app.controller('myc',function($scope,$http){
  $scope.stats_p;
  var hours=-1;
  var minutes=59;
  var seconds=59;
$scope.id = {{$id}};
$scope.check = 0;
function getTimeRemaining(endtime) {
  var t =  endtime;
  if(hours!=t-1){
   minutes=59;
   seconds=59;
  }
  hours = t-1;
  seconds = seconds-1;
  if(seconds==0)
  {
    seconds=59;
    minutes = minutes-1;
  }
  if(minutes==0)
  {
    minutes=59;
    hours = hours-1;
    $scope.stats_p=hours;
  }
  return {
    'total': t,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {

  var clock = document.getElementById(id);
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');
  function updateClock() {
    var t = getTimeRemaining(endtime);

    
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

   }
   updateClock();
}


$scope.submit=function(feed)
{

    obj={
        'id': $scope.id,
        'feed':feed,
    }
    $http.post('/savefeed',obj)

            .success(function(data,status,headers,config)
            {
              var elem = document.getElementById('fd_back');
                  elem.parentNode.removeChild(elem);
                alert('Thank You for Your Feedback');
            })
            .error(function(data,status,headers,config){});
}
$scope.Disp_st = function()
{ 

  $http({
      method: 'GET',
      url: '/showstatus',
      params:{'id':$scope.id},
      })
  .then(function successCallback(response) 
  {

    var data = response['data'];

    var ind = data['showstatus'];

    ind = ind[0];
    $scope.stats_t=ind['Status_Time'];
    $scope.stats_p=ind['Status_Percentage'];
    $scope.check=ind['Complete'];
    if($scope.check!=1){        
      if($scope.stats_p!=null)
      {
        console.log($scope.stats_p);
        document.getElementById('st').innerHTML='<h3>Status: </h3><div id="myProgress"><div id="myBar"></div>';
        var pro = document.getElementById('myProgress');
        pro.style.width= '100%';
  pro.style.backgroundColor= 'white';
            var bar=document.getElementById('myBar');/*.style.width=$scope.stats_t;*/
            /*innerHTML = $scope.stats_p+'%';*/
            bar.style.width=$scope.stats_p+'%';
            

    bar.style.height= '30px';
    pro.style.border='1px solid black';
    bar.style.backgroundColor= '#97824B';
    bar.style.textAlign ='center'; /* To center it horizontally (if you want) */

    bar.style.lineHeight= '30px'; /* To center it vertically */
    bar.style.color= 'white';
    bar.style.fontSize = '30px';
    bar.innerHTML = $scope.stats_p+'%';
      }
        if($scope.stats_t!=null){

            document.getElementById('status_t').innerHTML = '<h3>Time Remaining</h3><div id ="clockdiv"><div><span class="hours"></span><div class="smalltext">Hours</div></div><div><span class="minutes"></span><div class="smalltext">Minutes</div></div><div><span class="seconds"></span><div class="smalltext">Seconds</div></div></div>';
            initializeClock('clockdiv', $scope.stats_t);
        }
      }

        if($scope.check==1)
        {
          if($scope.stats_p!=null){
            document.getElementById('st').innerHTML='<h2>Your Order is ready</h2>';
          }
            
          if($scope.stats_t!=null){
            document.getElementById('status_t').innerHTML='<h2>Your Order is ready</h2>';
          }

            else{
              alert('Your Order is ready');
            }
          
        }
    
  },
  function errorCallback(response) {

  });
}
setInterval($scope.Disp_st,1000);
$scope.summ;
$scope.total_price=0;
$http({
      method: 'GET',
      url: '/showsummary',
      params:{'id':$scope.id},
      })
  .then(function successCallback(response) 
  {
    var data = response['data'];
    $scope.summ = data['summary'];
    for(var i=0;i<$scope.summ.length;i++)
    {
        $scope.temp = $scope.summ[i];
        $scope.total_price = $scope.total_price+($scope.temp['Sale_price']*$scope.temp['Quantity']); 
    }
  },
  function errorCallback(response) {

  });
$scope.openTab = function() {
    $scope.url = '/customer';
}
});

</script>
</head>
<style>
body{
	 background: url('../images/2.jpg') no-repeat center center; 
    background-size: cover;
    background-position: 70% 50%;
}

</style>
<body>




<div ng-app="myApp" ng-controller="myc" class="container">
<br>
    <div  class="alert alert-success">
        <strong>
            Success:
        </strong>
        Your Order has been placed successfully<br>
        If You want to place another order <a target="_blank" ng-href="/customer#order" ng-mousedown="openTab()">Click Here</a>
    </div>
    <div class = "row" >
        <div class="col-md-5">
        <h2 >Order Summary</h2>
   <br>

      <!-- menus -->
      <div ng-repeat="c in summ track by $index" class="panel-group"  >
  <div class="panel panel-default">
    <div class="panel-heading clearfix" >
      <h4 id='font_change' class="panel-title text-left" style="color:black;">
    
        [%=c.Name%] <span class="pull-right">[%=c.Sale_price%] x [%=c.Quantity%] = Rs.[%=c.Sale_price * c.Quantity%]</span>
        
      </h4>
      
    </div>
  </div>

</div>

      <h4 style="color:#97824B;" class="pull-right">
        
          Total Cost: <span >Rs.[%=total_price%]</span> 
        
      </h4>
     
          
      
    


<br>
<br>

</div>


<div class="col-md-2">
</div>
<div class="col-md-5">

<div id='st'>
  
</div>
<div  id="status_t"></div>
<h3 style="font-family: 'Edwardian Script ITC';
    font-size: 80px;
    color: #97824B;
 ">Feedback</h3>
 <div class="form-group">
  
  <textarea class="form-control" ng-model = "feed" rows="5" id="comment"></textarea>
</div>
<button id = 'fd_back' class="btn btn-sm btn-default" ng-click="submit(feed)" style="background-color:#97824B;">Submit</button>
<br>
</div>




</div>

</div>








</body>
</html>