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
   <p class="searchby">Search By</p>
   <div class="textboxes">
      {{Form::open(array('url' => 'search-professionals', 'method' => 'POST'))}}
        {{Form::text('name',
          null, 
          array('placeholder' => 'Company Name, App name etc', 'class' => 'textstyle'))}}
        {{Form::button(null, 
          array('class' => 'searchbutton', 'name' => 'search_button', 'id' => 'search_button'))}}
        <!-- The first value is zero and it will be ignored in the search query if it is selected -->
        {{Form::select('specializations[]', 
          $specializations, 
          null, 
          array('id' => 'specializations', 'multiple' => 'multiple'))}}
        
        {{Form::select('countries',
          $countries,
          null, 
          array('id' => 'countries'))}}
        
        {{Form::select('cities[]', array(), null, array('id' => 'cities', 'multiple' => 'multiple'))}}
        <div class="clear"></div><br/><br/>
        {{-- <input type="range" min="0" max="200000" value="0" step="5" onchange="showValue(this.value)" />
        <span id="range">$0</span> --}}
        {{Form::select('creative_fields[]', 
          $creativeFields,
          null,
          array('multiple' => 'multiple', 'id' => 'creative_fields'))}}

        {{Form::select('platforms[]', 
        array_merge(array('0' => '--Platforms--'),$platforms),
        null,
        array('id' => 'platforms', 'multiple' => 'multiple'))}}

        {{Form::submit('Search', array('class' => 'appprofesional'))}}
        {{Form::Reset('Reset', array('class' => 'appprofesional'))}}
        <div class="clear"></div><br/><br/><br/>
      {{Form::close()}}
   </div>
   <button class="random"></button>
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

      {{ $professionals -> links() }}

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
      $("#specializations").multiselect({
        "noneSelectedText": "specializations",
        "minWidth": 150,
      });
      $("#countries").multiselect({
        "noneSelectedText": "countries",
        "multiple": false,
        "minWidth": 150,
        "header": false
      });
      $("#cities").multiselect({
        "noneSelectedText": "cities",
        "minWidth": 150
      });
      $("#creative_fields").multiselect({
        "noneSelectedText": "creative fields"
      });
      $("#platforms").multiselect({
        "noneSelectedText": "platforms"
      });
    });
  </script>
@stop
