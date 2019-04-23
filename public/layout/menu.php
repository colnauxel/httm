 <!-- Fixed navbar -->

 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          
          <!-- giỏ hàng  -->
          <ul class="nav navbar-nav navbar-right">
									<li>
										<a id="cart-popover" class="btn" data-placement="bottom" title="Giỏ Hàng" data-original-title="Shopping Cart">
											<span class="glyphicon glyphicon-shopping-cart"></span>
											<span class="badge">0</span>
											<span class="total_price">vnd</span>
										</a>
									</li>
                  <li>login</li>
								</ul>
        </div>
        <!--/.nav-collapse -->
      
      </div>
    </div>

      <!-- Hiện sách trong giỏ hàng -->
      <div id="popover_content_wrapper"  style="display: none;width:600px;">
            <span id="cart_details"></span>
              <div align="right">
                <a href="#" class="btn btn-primary" id="check_out_cart">
                <span class="glyphicon glyphicon-shopping-cart"></span> Thanh Toán
                </a>
                <a href="#" class="btn btn-default" id="clear_cart">
                <span class="glyphicon glyphicon-trash"></span> Xóa
                </a>
              </div>
      </div>

          <div id="display_item">


          </div>
          
          </div>
          <!--  -->