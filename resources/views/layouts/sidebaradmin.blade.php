<!--slider menu-->
<div class="sidebar-menu" style="height:100%;position: fixed;">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
        <!--<img id="logo" src="" alt="Logo"/>--> 
    </a> </div>		  
  <div class="menu">
    <ul id="menu" >
      <li id="menu-home" ><a href="{{ url('/admin') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
      <li><a href="#"><i class="fa fa-user"></i><span>Admins</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-boletim" ><a href="{{ url('/admin/transaksi') }}">Transaction</a></li>
           </ul>
      </li>
       <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="{{ url('/admin/products') }}">Products</a></li>
              <li id="menu-academico-boletim" ><a href="{{ url('/admin/categories') }}">Categories</a></li>
              <li id="menu-academico-boletim" ><a href="{{ url('/admin/couriers') }}">Courier</a></li>
           </ul>
       </li>
    </ul>
  </div>
</div>
<div class="clearfix"> </div>
<!--slide bar menu end here-->
</div>
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