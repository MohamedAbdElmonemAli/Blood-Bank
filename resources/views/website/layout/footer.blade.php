<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="footer-logo" src="{{asset('site/imgs/logo.png')}}">
        <p class="footer-text">{{settings()->about_app}}</p>
      </div>
      <div class="col-md-4">
        <ul class="footer-list">
          <a href="{{route('homepage')}}"><li> الرئيسيه</li></a>
            <a href="{{route('allarticles')}}"> <li> المقالات </li></a>
            <a href="{{route('donations')}}"><li> طلبات التبرع </li></a>
            <a href="{{route('how_we_are')}}"> <li> من نحن </li></a>
            <a href="{{route('setting')}}">  <li> اتصل بنا </li></a>

        </ul>
        </div>
        <div class="col-md-4 change-position">
        <p class="footer-subtext">مـتــوفر علي </p>
        <img class="footer-android" src="{{asset('site/imgs/google1.png')}}">
        <img class="footer-ios" src="{{asset('site/imgs/ios1.png')}}">

          </div>

    </div>
  </div>

</footer>
<section id="last-footer">
<div class="container">
<div class="row">
<div class="col-md-4">
  <div class="social-media">
    <a href="{{settings()->fb_link}}" target="_blank"><i class="fab fa-facebook-f hvr-float" style="color: #3a549f;"></i></a>
    <a href="{{settings()->ins_link}}" target="_blank"><i class="fab fa-instagram hvr-float" style="color: #e01fe0;"></i></a>
    <a href="{{settings()->tw_link}}" target="_blank"><i class="fab fa-twitter hvr-float" style="color: #4faaf0;"></i></a>
    <a href="{{settings()->whats_link}}" target="_blank"><i class="fab fa-whatsapp hvr-float" style="color: #27d850;"></i></a>


 </div>

</div>
<div class="col-md-8">
<p class="copys"> جميع الحقوق محفوظ ل <span id="website-name"> بنك الدم وابداع تك </span> &copy;2019 </p>

</div>

</div>
<p class="myname">Made with <i class="fas fa-heart"></i> by Mazen Anwar</p>
</div>


</section>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow92.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>


    <script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('site/js/main.js')}}"></script>
    @stack('scripts')

  </body>
</html>
