@extends('layouts.template')

@section('pagetitle')
  <title>Top App Ninja - Home Page</title>
@show

@section('content')
  <div class="searcharea">
   <div class="wrapper">
     <div class="filter">
        <form>
           <input type="button" value="MOST RECENT" class="recent">
           <input type="button" value="MOST VIEWED" class="viewed">
           <input type="button" value="SPONSORED" class="sponsored">
           <div class="clear"></div>
        </form>
        <div class="searchbox">
          <div class="textboxes">
            {{Form::open()}}
              {{Form::input('text','tags', implode(',', $tags), array('id' => 'tags'))}}
            {{Form::close()}}
          </div>
        </div>
     </div>
   </div>
</div>

  <div class="content">
    <div class="wrapper">

      @foreach($professionals as $professional)
         <div class="main">
            <div class="mainbg">
              <div class="featured"></div>
             <div class="mainsec1">
               <div class="companylogo">
                <img src="{{$professional -> Logo}}">
               </div>
             </div>
             <div class="mainsec2">
               <h1>{{$professional -> CompanyName}}</h1>
               <p class="location"><span class="locationimg"></span> {{$professional -> city -> CityName}}, Australia</p><p class="money"><span class="moneyimg"></span> 
               ${{$professional -> PriceRangeBottom}}-${{$professional -> PriceRangeTop}}</p>
               <div class="clear"></div>
               <p>{{$professional -> Description}}</p>
               <div class="specialization">
                  <p>Specialization:</p>
                  @foreach($professional -> specializations as $specialization)
                    <span class="speztag">{{$specialization -> SpecializationName}}</span>
                  @endforeach
                   
                  <div class="clear"></div>
               </div>
               <div class="platform">
                  <p>Platform:</p>
                    <span class="icons">
                      @foreach($professional -> platforms as $platform)
                        @if(in_array($platform -> PlatformName, array('iPhone', 'iPad')))
                          <img src="images/apple.png">
                        @elseif ($platform -> PlatformName == 'Android')
                          <img src="images/android.png">
                        @elseif ($platform -> PlatformName == 'Windows Phone')
                          <img src="images/windows.png">
                        @endif
                      @endforeach
                    </span>
                  <div class="clear"></div>
               </div>
               <div class="buttons">
                   <a href='{{$professional -> CompanyURL}}' class="mainbutton">WEBSITE</a> <button class="mainbutton">PORTFOLIO</button> <button class="mainbutton">SEND MESSAGE</button>
                   <div class="clear"></div>
               </div>
             </div>
             <div class="mainsec3">
                <div class="iphone">
                 <div class="slideriphone"></div>
                </div>
                <h3>Music Gallery</h3>
                <span class="like"></span> <p>12345</p> <span class="view"></span> <p>256</p>
                <div class="clear"></div>
             </div>
             <div class="clear"></div>
          </div>
        </div>
          <div class="submain">
        </div>
      @endforeach

  </div>
</div>

<div class="pagenav">
</div>

<div class="recentportfolio">
 <div class="wrapper">
   <p>Recent Portfolio</p>
   <div class="portcontent">
     <div class="leftarrow"></div>
    
    <div class="singleportfolio">
      <div class="appimage">
       <img src="images/appimage.png">
      </div>
      <h1>Viber</h1>
      <h4>by Viber Technologies</h4>
      <div class="line"></div>
      <div class="clear"></div>
      <div><span class="icons"> <img src="images/apple.png"> <img src="images/android.png"> <img src="images/windows.png"> <img src="images/blackberry.png"></span>
      <div class="clear"></div>
      </div>
       <div class="line"></div>
      <div class="speztag2">bussiness</div>
      <div class="clear"></div>
       <div class="line"></div>
      <div><span class="like2"></span> <p style="float:left">12345</p> <span class="view2"></span> <p style="float:left">256</p></div>
            <div class="clear"></div>
    </div>

    <div class="singleportfolio">
      <div class="appimage">
       <img src="images/appimage.png">
      </div>
      <h1>Viber</h1>
      <h4>by Viber Technologies</h4>
      <div class="line"></div>
      <div class="clear"></div>
      <div><span class="icons"> <img src="images/apple.png"> <img src="images/android.png"> <img src="images/windows.png"> <img src="images/blackberry.png"></span>
      <div class="clear"></div>
      </div>
       <div class="line"></div>
      <div class="speztag2">bussiness</div>
      <div class="clear"></div>
       <div class="line"></div>
      <div><span class="like2"></span> <p style="float:left">12345</p> <span class="view2"></span> <p style="float:left">256</p></div>
            <div class="clear"></div>
    </div>

    <div class="singleportfolio">
      <div class="appimage">
       <img src="images/appimage.png">
      </div>
      <h1>Viber</h1>
      <h4>by Viber Technologies</h4>
      <div class="line"></div>
      <div class="clear"></div>
      <div><span class="icons"> <img src="images/apple.png"> <img src="images/android.png"> <img src="images/windows.png"> <img src="images/blackberry.png"></span>
      <div class="clear"></div>
      </div>
       <div class="line"></div>
      <div class="speztag2">bussiness</div>
      <div class="clear"></div>
       <div class="line"></div>
      <div><span class="like2"></span> <p style="float:left">12345</p> <span class="view2"></span> <p style="float:left">256</p></div>
            <div class="clear"></div>
    </div>

    <div class="singleportfolio">
      <div class="appimage">
       <img src="images/appimage.png">
      </div>
      <h1>Viber</h1>
      <h4>by Viber Technologies</h4>
      <div class="line"></div>
      <div class="clear"></div>
      <div><span class="icons"> <img src="images/apple.png"> <img src="images/android.png"> <img src="images/windows.png"> <img src="images/blackberry.png"></span>
      <div class="clear"></div>
      </div>
       <div class="line"></div>
      <div class="speztag2">bussiness</div>
      <div class="clear"></div>
       <div class="line"></div>
      <div><span class="like2"></span> <p style="float:left">12345</p> <span class="view2"></span> <p style="float:left">256</p></div>
            <div class="clear"></div>
    </div>

     <div class="rightarrow"></div>
     <div class="clear"></div>
   </div>
  </div>
</div>
@stop

@section('customscript')
  <script type="text/javascript">
    $(document).ready(function(){

      $("#tags").tagsInput();

    });
  </script> 
  
@stop
