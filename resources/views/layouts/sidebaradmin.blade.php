@yield('sidebaradmin')
<!--slider menu-->
<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
        <!--<img id="logo" src="" alt="Logo"/>--> 
    </a> </div>		  
  <div class="menu">
    <ul id="menu" >
      <li id="menu-home" ><a href="{{ url('/admin') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
      <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
           </ul>
      </li>
       <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="{{ url('/admin/products') }}">Product</a></li>
              <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
           </ul>
       </li>
    </ul>
  </div>
</div>
<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
    var toggle = true;
                
    $(".sidebar-icon").click(function() {                
      if (toggle)
      {
        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
        $("#menu span").css({"position":"absolute"});
      }
      else
      {
        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
        setTimeout(function() {
          $("#menu span").css({"position":"relative"});
        }, 400);
      }               
                    toggle = !toggle;
                });
    </script>