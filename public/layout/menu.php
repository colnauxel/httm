<div class="navbar navbar-default nav-lg navbar-fixed-top"  role="navigation">
      <div class="container">
        <div class="navbar-header menu">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bán Sách</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="http://localhost/bansach_php/public/index.php">Trang Chủ</a></li>
            <li><a href="#about">About</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
            
              </ul>
            </li> -->
            <li>
            <form class="form-inline" method="GET" action="result.php">
              <div class="form-group">
              
                <input type="text" class="form-control" name="p" placeholder="Nhập thông tin">
              </div>
            <button type="submit" name="search" class="btn btn-primary mb-2">Tìm kiếm</button>
            </form>
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
                  <?php if(empty($_SESSION['nameCustomer'])==true):?>
                    <li><a href="http://localhost/bansach_php/public/register.php">Đăng kí</a></li>
                    <li><a href="http://localhost/bansach_php/public/login.php">Đăng nhập</a></li>
                  <?php endif;?>
                  <?php if(empty($_SESSION['nameCustomer'])==false):?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="http://localhost/bansach_php/public/upload/<?php echo $_SESSION['avatarCustomer'];?>" alt="" width="30px" height="30px"> <?php echo $_SESSION['nameCustomer'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                     
                    <li><a href="http://localhost/bansach_php/public/acount.php">Thông tin tài khoản</a></li>
                      <li><a href="http://localhost/bansach_php/public/logout.php">Đăng xuất</a></li>
                  
                  </ul>
                </li>
              <?php endif?>
								</ul>
        </div>
        
          <!-- Hiện sách trong giỏ hàng -->
          <div id="popover_content_wrapper"  style="display: none;width:600px;">
            <span id="cart_details"></span>
              <div align="right">
                <a href="payment.php" class="btn btn-primary" id="check_out_cart">
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
      </div>
    </div>

  