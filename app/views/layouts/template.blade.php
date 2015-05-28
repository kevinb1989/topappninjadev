<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@section('pagetitle')
	<title>Top App Ninja</title>
@show
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }} 
{{ HTML::style('css/style.css') }}
{{ HTML::style('css/jquery-ui.css') }}
{{ HTML::style('css/jquery-ui.structure.css') }}
{{ HTML::style('css/jquery-ui.theme.css') }}
{{ HTML::style('css/jquery.multiselect.css') }}
{{ HTML::style('css/jquery.tagsinput.css') }}

<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function showValue(newValue)
{
  document.getElementById("range").innerHTML=newValue;
}
</script>
</head>

<body>

<div class="head">
 <div class="wrapper">
   <a href="#" class="logo"></a>
   <div class="headright">
    <input type="submit" value="LOG IN" class="login">
    <input type="submit" value="APP PROFESSIONAL SIGN UP" class="appprofesional">
    <div class="clear"></div>
    <p class="headwritup">Are you a App Professional? Register for Free</p>
   </div>
  <div class="clear"></div>
 </div>
</div>

@yield('content')

<div class="subfooter">
 <div class="wrapper">
  <p>Browse App Professionals By..</p>
  <ul style="margin-right:120px;">
   <li><a href="" id="heading">SPECIALIZATION</a></li>
   <li><a href="">Business</a></li>
   <li><a href="">Education</a></li>
   <li><a href="">Music</a></li>
   <li><a href="">Healthcare & Medical</a></li>
   <li><a href="">News</a></li>
   <li><a href="">Sales</a></li>
   <li><a href="">Sports</a></li>
   <li><a href="">See All</a></li>
  </ul>
  <ul  style="margin-right:140px;">
   <li><a href="" id="heading">MAJOR CITY</a></li>
   <li><a href="">Sydney</a></li>
   <li><a href="">Melbourne</a></li>
   <li><a href="">Brisbane</a></li>
   <li><a href="">Gold Coast</a></li>
   <li><a href="">Perth</a></li>
   <li><a href="">Adelaide</a></li>
   <li><a href="">Hobart</a></li>
   <li><a href="">See All</a></li>
  </ul>
  <ul  style="margin-right:140px;">
   <li><a href="" id="heading">COUNTRY</a></li>
   <li><a href="">Australia</a></li>
   <li><a href="">USA</a></li>
   <li><a href="">UK</a></li>
   <li><a href="">Russia</a></li>
   <li><a href="">India</a></li>
   <li><a href="">See All</a></li>
  </ul>
   <ul  style="margin-right:140px;">
   <li><a href="" id="heading">PLATFORM</a></li>
   <li><a href="">iPhone</a></li>
   <li><a href="">iPad</a></li>
   <li><a href="">Android</a></li>
   <li><a href="">Windows</a></li>
   <li><a href="">Blackberry</a></li>
    <li><a href="">iOS</a></li>
   <li><a href="">See All</a></li>
  </ul>
  <ul>
   <li><a href="" id="heading">COST</a></li>
   <li><a href="">Less than $10,000</a></li>
   <li><a href="">Less than $15,000</a></li>
   <li><a href="">Less than $20,000</a></li>
   <li><a href="">Less than $25,000</a></li>
   <li><a href="">See All</a></li>
  </ul>
  <div class="clear"></div>
 </div>
</div>

<div class="footer">
 <div class="wrapper">
  <div class="fsec1">
   <p>Follow Us</p>
   <ul>
    <li><a href=""><img src="images/facebook.png"></a></li>
    <li><a href=""><img src="images/google.png"></a></li>
    <li><a href=""><img src="images/twitter.png"></a></li>
    <li><a href=""><img src="images/rss.png"></a></li>
    <li><a href=""><img src="images/linkedin.png"></a></li>
    <div class="clear"></div>
   </ul>
  </div>
  <div class="fsec2">
   <ul>
    <li><a href="">About Us</a></li>
    <li><a href="">Advertise With Us</a></li>
    <li><a href="">How iIt Works</a></li>
    <li><a href="">Contact Us</a></li>
    <html>
    <head>
      <title></title>
    </head>
    <body>
    
    </body>
    </html>
   </ul>
  </div>
  <div class="fsec3">
   <p>© 2014 TopApp Ninja. All Rights Reserved</p>
  </div>
  <div class="clear"></div>
 </div>
</div>
</body>

{{HTML::script('js/jquery-1.11.2.js')}}
{{HTML::script('js/jquery-ui.js')}}
{{HTML::script('js/boostrap.js')}}
{{HTML::script('js/jquery.multiselect.js')}}
{{HTML::script('js/jquery.tagsinput.js')}}

@section('customscript')
            <script type="text/javascript"></script>
@show       
</html>