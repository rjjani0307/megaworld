    <style>
                .autocomplete {
                  position: relative;
                  display: inline-block;
                }
                .autocomplete-items {
                  position: absolute;
                  border-bottom: none;
                  border-top: none;
                  z-index: 99;
                  top: 100%;
                  left: 0;
                  right: 0;
                }
                 #search_result{ 
                  overflow-y : scroll;
                  max-height : 440px;
                }
                 #search_results{ 
                  overflow-y : scroll;
                  max-height : 655px;
                }
                .autocomplete-items div {
                  padding: 10px;
                  cursor: pointer;
                  background-color: #f7f7f7; 
                  border-bottom: 1px solid #d4d4d4;
                }
                    .autocomplete-items div:hover {
                  background-color: #e9e9e9; 
                }
                    .autocomplete-active {
                  background-color: DodgerBlue !important; 
                  color: #ffffff; 
                }
                .alert-danger {
                 color: #ff0017; }
                 
                 /* image css */ 
             .flag-img {
            width: auto;
            height: 60px;
            border-radius: 50px;
            margin: 0 8px;
                }
                .header-main-area .header-main .header-element.search-wrap {
                    width: 40.33%;
                }
                #srchbtn{
                        color: #fff;
    font-size: 16px;
    position: absolute;
    top: 0;
    right: 0px;
    width: 40px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #000;
    border: none;
    border-radius: 50%;
    line-height: 0;
                }

    @media only screen and (min-width: 600px) {
    #live_searchs {
        display:none;
      }
       .srchs {
        display:none !important;
      }
    }

          </style>
 <header class="header-area">
            <div class="header-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header-main">
                                <!-- logo start -->
                                <div class="header-element logo">
                                    <a href="index.php">
                                        <img src="image/mcw_name.jpeg" alt="logo-image" width="80" class="img-fluid">
                                    </a>
                                </div>
                                <!-- logo end -->
                                
                                <!-- search start -->
                                <div class="header-element search-wrap">
                                    <form method="GET" action="search.php" autocomplete="off">
                                     <input type="search" name="live_search" id="live_search" placeholder="Search Products Here.." required>
                                <button class="search-btn" id="srchbtn" style="height: 40px;"><i class="fa fa-search"></i></button>
                                
                                  <div  id="search_result" class="autocomplete-items caption" style="display: none;"></div>
                                    </form> 
                                </div>
                                <!-- search end -->
                                <!-- header-icon start -->
                                <div class="header-element right-block-box">
                                    <ul class="shop-element">
                                        <li class="side-wrap nav-toggler">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                            <span class="line"></span>
                                            </button>
                                        </li>
                                        <li class="side-wrap user-wrap">
                                            <div class="acc-desk">
                                                    <?php if (isset($_SESSION['mcw_useremail'])) {  ?>
                                                <div class="user-icon">
                                                    <a href="profile.php" class="user-icon-desk">
                                                        <span><i class="icon-user"></i></span>
                                                    </a>
                                                </div>
                                                <div class="user-info">
                                                     <span class="acc-title">
                                                      <?php  echo $_SESSION['mcw_username']; ?></span>
                                                        <div class="account-login">
                                                         <a href="profile.php">User Profile</a>
                                                        </div>  
                                                </div>
                                            <?php  }else{  ?>
                                             <div class="user-icon">
                                                    <a href="profile.php" class="user-icon-desk">
                                                        <span><i class="icon-user"></i></span>
                                                    </a>
                                                </div>
                                                <div class="user-info">
                                                  <span class="acc-title">Account</span>
                                                     <div class="account-login">
                                                        <a href="register.php">Register</a>
                                                        <a href="login.php">Log in</a>
                                                     </div>                                                     
                                                </div>
                                            <?php } ?>
                                          </div> 
                                            <div class="acc-mob">
                                                <a href="profile.php" class="user-icon">
                                                    <span><i class="icon-user"></i></span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="side-wrap wishlist-wrap">
                                         <?php if (isset($_SESSION['mcw_useremail'])) {  ?>
                                            <a href="logout.php" class="header-wishlist">
                                                <span class="wishlist-icon"><i class="icon-logout"></i></span>
                                            </a>
                                            <?php } ?>
                                        </li>
                                        <li class="side-wrap wishlist-wrap">
                                            <a href="wishlist.php" class="header-wishlist">
                                                <span class="wishlist-icon"><i class="icon-heart"></i></span>
                                                <?php
                        									if(isset($_SESSION["add_wishlist"])){
                        									   $total_quantitys = 0;
                        									     foreach ($_SESSION["add_wishlist"] as $item){
                        									          $total_quantitys += $item["quantity"];
                        											}	?>

								                        	<span class="wishlist-counter"><?php echo $total_quantitys; ?></span>
                            									  <?php
                            									} else {
                            									?>
                        									<span class="wishlist-counter">0</span>
                        									<?php 	}  ?>
                                            </a>
                                        </li>
                                        <li class="side-wrap cart-wrap">
                                            <div class="shopping-widget">
                                                <div class="shopping-cart">
                                                    <a href="cart.php" class="cart-count">
                                                        <span class="cart-icon-wrap">
                                                           <span class="cart-icon"><i class="icon-handbag"></i></span>
                                                          <?php
                        									if(isset($_SESSION["cart_item"])){
                        									   $total_quantitys = 0;
                        									     foreach ($_SESSION["cart_item"] as $item){
                        									          $total_quantitys += $item["quantity"];
                        											}	?>

								                        	<span class="bigcounter"><?php echo $total_quantitys; ?></span>
                            									  <?php
                            									} else {
                            									?>
                        									<span class="bigcounter">0</span>
                        									<?php 	}  ?>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- header-icon end -->
                            </div><div class="header-element search-wrap">
                                    <form method="GET" action="search.php" autocomplete="off">
                                     <input type="search" name="live_search" id="live_searchs"  style="margin-bottom: 10px;margin-left: 40px;" placeholder="Search Products Here.." required>
                                <button class="search-btn srchs" id="srchbtn" style="height: 40px;top: 90px; right: 53px;"><i class="fa fa-search"></i></button>
                                
                                  <div  id="search_results" class="autocomplete-items caption" style="display: none;top: auto;"></div>
                                    </form> 
                                </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="main-menu-area">
                                    <div class="main-navigation navbar-expand-xl">
                                        <div class="box-header menu-close">
                                            <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                        </div>
                                        <!-- menu start -->
                                        <div class="navbar-collapse" id="navbarContent">
                                            <div class="megamenu-content">
                                                <div class="mainwrap">
                                                    <ul class="main-menu">
                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Electronics" class="link-title">
                                                                <span class="sp-link-title">Electronics</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-home" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Electronics</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-home">
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Home Appliances" class="submenu-link">  Home Appliances</a>
                                                              </li>
                                                                 <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Kitchen Accessories" class="submenu-link">  Kitchen Accessories</a>
                                                              </li>
                                                                 <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Personal Care" class="submenu-link">  Personal Care</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Desktop" class="link-title">
                                                                <span class="sp-link-title">Desktop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>    
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Desktop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Desktop&catm=Internal Hard Drive" class="g-l-link"><span>Internal Hard Drive</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Internal Hard Drive</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                          <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Desktop" class="sub-style"><span>   Desktop </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Pull Out" class="sub-style"><span> Pull Out </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Solid State Drive (SSD)" class="sub-style"><span> Solid State Drive (SSD) </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Surveillance" class="sub-style"><span> Surveillance </span></a>  
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=Barebone Desktop" class="submenu-link">  Barebone Desktop</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=CD | DVD | DVD Writer" class="submenu-link">  CD | DVD | DVD Writer</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=CPU | CPU Fan" class="submenu-link">  CPU | CPU Fan</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=I/O CARD" class="submenu-link">  I/O CARD</a>
                                                              </li>
                                                               <li class="submenu-li">
                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD" class="g-l-link">
                                                           <span>SSD | External HDD</span> 
                                                        <i class="fa fa-angle-right"></i></a>
                                                        <a href="#account-menu1" data-bs-toggle="collapse" class="sub-link"><span>SSD | External HDD</span> 
                                                                     <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1" id="account-menu1">
                                                            <li>
                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External Hard Disk" class="sub-style"><span> External Hard Disk </span></a>
                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External SSD" class="sub-style"><span> External SSD </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=SSD | HDD Casing" class="submenu-link">  SSD | HDD Casing</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=UPS | UPS Batteries" class="submenu-link">  UPS | UPS Batteries</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Motherboard" class="submenu-link">  Motherboard</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Ram" class="submenu-link">  Ram</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Graphic Card" class="submenu-link">  Graphic Card</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Cabinet | Cabinet Fan" class="submenu-link">  Cabinet | Cabinet Fan</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Power Supply" class="submenu-link">  Power Supply</a>
                                                                  </li>
                                                            </ul>
                                                        </li>
                                                       
                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Laptop" class="link-title">
                                                                <span class="sp-link-title">Laptop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Laptop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Laptop&catm=Laptop Spare" class="g-l-link"><span>Laptop Spare</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Laptop Spare</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                          <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DVD Writer" class="sub-style"><span>   Laptop DVD Writer </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop On | Off Switch" class="sub-style"><span> Laptop On | Off Switch </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Speaker" class="sub-style"><span> Laptop Speaker </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Keyboard" class="sub-style"><span> Laptop Keyboard </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=DC Adapter Cable" class="sub-style"><span> DC Adapter Cable </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop CPU Fan" class="sub-style"><span> Laptop CPU Fan </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Display Cable" class="sub-style"><span> Laptop Display Cable </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Hinges" class="sub-style"><span> Laptop Hinges </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Base" class="sub-style"><span> Laptop Base </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DC jack" class="sub-style"><span> Laptop DC jack </span></a>  
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Laptop&catm=Internal SSD | HDD" class="g-l-link"><span>Internal SSD | HDD</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Internal SSD | HDD</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                            <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal SSD" class="sub-style"><span> Internal SSD </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal HDD" class="sub-style"><span> Internal HDD </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Laptop&catm=External SSD | HDD" class="g-l-link"><span>External SSD | HDD</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>External SSD | HDD</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                            <a href="category.php?cat=Laptop&catm=External SSD | HDD&cats=External SSD" class="sub-style"><span> External SSD </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=External SSD | HDD&cats=External HDD" class="sub-style"><span> External HDD </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=SSD | HDD Casing" class="submenu-link"> SSD | HDD CASING & COPIER</a>
                                                              </li>
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop RAM" class="submenu-link">  Laptop RAM</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Battery" class="submenu-link">  Laptop Battery</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Adapter" class="submenu-link">  Laptop Adapter</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Screen" class="submenu-link">  Laptop Screen</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Cooling Pad" class="submenu-link">  Laptop Cooling Pad</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Accessories" class="submenu-link">  Laptop Accessories</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Display" class="link-title">
                                                                <span class="sp-link-title">Display</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Display</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                              <li class="submenu-li">
                                                                   <a href="category.php?cat=Display&catm=LED | Monitor" class="submenu-link">  LED | Monitor</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Television" class="submenu-link">  Television</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Projector | Projector Screen" class="submenu-link">  Projector | Projector Screen</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Presenter | Printer" class="submenu-link">  Presenter | Printer</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Wall Mount KIT | Projector Stand" class="submenu-link">  Wall Mount KIT | Projector Stand</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Power Cable | HDM Cable | Vga Cable" class="submenu-link">  Power Cable | HDM Cable | Vga Cable</a>
                                                                      </li>
                                                                       <li class="submenu-li">
                                                             <a href="category.php?cat=Display&catm=Connector | Converter" class="submenu-link">  Connector | Converter</a>
                                                                      </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Peripherals" class="link-title">
                                                                <span class="sp-link-title">Peripherals</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Peripherals</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                 <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad" class="g-l-link"><span>Keyboard | Mouse | Gamepad</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Keyboard | Mouse | Gamepad</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                           <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Mouse| Mouse Pad" class="sub-style"><span>  Mouse| Mouse Pad </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Keyboard | Combo" class="sub-style"><span> Keyboard | Combo </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Gamepad" class="sub-style"><span> Gamepad </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Cable | Connector" class="g-l-link"><span>    Cable | Connector</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>   Cable | Connector</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                          <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Cable" class="sub-style"><span>   Cable </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Spike" class="sub-style"><span> Spike </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=USB Hub" class="sub-style"><span> USB Hub </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Connector" class="sub-style"><span> Connector </span></a>  
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Other Products" class="g-l-link"><span>Other Products</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Other Products</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                           <a href="category.php?cat=Peripherals&catm=Other Products&cats=Calculator" class="sub-style"><span>  Calculator </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Cmos battery" class="sub-style"><span> Cmos battery </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Fitness band" class="sub-style"><span> Fitness band </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Covid 19 medical equipments" class="sub-style"><span> Covid 19 medical equipments </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Speaker" class="submenu-link">  Speaker</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Web Cam" class="submenu-link">  Web Cam</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=CD | DVD | DVD Writer" class="submenu-link">  CD | DVD | DVD Writer</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Headphone | Earphone | Mike" class="submenu-link">  Headphone | Earphone | Mike</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Pendrive | Memory Card | Card Reader" class="submenu-link">  Pendrive | Memory Card | Card Reader</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Mobile Charger | Car charger | Power Bank" class="submenu-link">  Mobile Charger | Car charger | Power Bank</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Scanner | Printer" class="link-title">
                                                                <span class="sp-link-title">Scanner | Printer</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Scanner | Printer</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                              <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Printer | Scanner" class="submenu-link">  Printer | Scanner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Barcode Scanner" class="submenu-link">  Barcode Scanner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Lamination Machine" class="submenu-link">  Lamination Machine</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Toner" class="submenu-link">  Toner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Ink cartridge" class="submenu-link">  Ink cartridge</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Ink Bottle" class="submenu-link">  Ink Bottle</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Toner Powder" class="submenu-link">  Toner Powder</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Cartridge spareparts" class="submenu-link">  Cartridge spareparts</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Photo Paper" class="submenu-link">  Photo Paper</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Vax RIbbion" class="submenu-link">  Vax RIbbion</a>
                                                              </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Networking" class="link-title">
                                                                <span class="sp-link-title">Networking</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Networking</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Networking&catm=Cable and Connector" class="g-l-link"><span>Cable and Connector</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Cable and Connector</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Adapter" class="sub-style"><span> Adapter </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Lan Cable" class="sub-style"><span> Lan Cable </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Spike" class="sub-style"><span> Spike </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Connector" class="sub-style"><span> Connector </span></a>    
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Router | Range Extender" class="submenu-link">  Router | Range Extender</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Switch" class="submenu-link">  Switch</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=POV switch" class="submenu-link">  POV switch</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=USB WIFI | Bluetooth Adapter" class="submenu-link">  USB WIFI | Bluetooth Adapter</a>
                                                              </li>
                                                              <li class="submenu-li">
                                                                    <a href="category.php?cat=Networking&catm=Fiber Accessories" class="g-l-link"><span>Fiber Accessories</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Fiber Accessories</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu">
                                                                        <li>
                                                                          <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Router" class="sub-style"><span>   Fiber Router </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Coupler" class="sub-style"><span> Fiber Coupler </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber BIDI" class="sub-style"><span> Fiber BIDI </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Patch Cord" class="sub-style"><span> Fiber Patch Cord </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                              <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Network Accessories" class="submenu-link">  Network Accessories</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Rack | Accessories" class="submenu-link">  Rack & Accessories </a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Tools" class="submenu-link">  Tools</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Security" class="link-title">
                                                                <span class="sp-link-title">Security</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Security</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=HD Camera| DVR" class="submenu-link">  HD Camera| DVR</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=IP Camera| DVR" class="submenu-link">  IP Camera| DVR</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Wifi Camera" class="submenu-link">  Wifi Camera</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Biometric" class="submenu-link">  Biometric</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Cable" class="submenu-link">  Cable</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=POE Switch | Adapter" class="submenu-link">  POE Switch | Adapter</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Power Supply | Injector" class="submenu-link">  Power Supply | Injector</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Rack | Accessories" class="submenu-link">  Rack & Accessories </a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Surveillance Accessories" class="submenu-link">  Surveillance Accessories</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Surveillance Harddisk" class="submenu-link">  Surveillance Harddisk</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=LED | Monitor" class="submenu-link">  LED | Monitor</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Software" class="link-title">
                                                                <span class="sp-link-title">Software</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Software</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                               <li class="submenu-li">
                                                                 <a href="category.php?cat=Software&catm=Accounting Software" class="submenu-link">  Accounting Software</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Software&catm=Antivirus" class="submenu-link">  Antivirus</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Software&catm=Windows | Office" class="submenu-link">  Windows | Office</a>
                                                                  </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- menu end -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </header>

          <!-- mobile menu start -->
         <div class="header-bottom-area mobile">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main-menu-area">
                            <div class="main-navigation navbar-expand-xl">
                                <div class="box-header menu-close">
                                    <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                </div>
                                <!-- menu start -->
                                <div class="navbar-collapse" id="navbarContent01">
                                    <div class="megamenu-content">
                                        <div class="mainwrap">
                                            <ul class="main-menu">
                                               <li class="menu-link parent">
                                                            <a href="index1.html" class="link-title">
                                                                <span class="sp-link-title">Electronics</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-home" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Electronics</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-home">
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Home Appliances" class="submenu-link">  Home Appliances</a>
                                                              </li>
                                                                 <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Kitchen Accessories" class="submenu-link">  Kitchen Accessories</a>
                                                              </li>
                                                                 <li class="submenu-li">
                                                                  <a href="category.php?cat=Electronics&catm=Personal Care" class="submenu-link">  Personal Care</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Desktop" class="link-title">
                                                                <span class="sp-link-title">Desktop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>    
                                                            <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Desktop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Desktop&catm=Internal Hard Drive" class="g-l-link"><span>Internal Hard Drive</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu19" data-bs-toggle="collapse" class="sub-link"><span>Internal Hard Drive</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu19">
                                                                        <li>
                                                                          <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Desktop" class="sub-style"><span>   Desktop </span></a>
                                                                          <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Desktop" class="blog-sub-style"><span>   Desktop </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Pull Out" class="sub-style"><span> Pull Out </span></a><a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Pull Out" class="blog-sub-style"><span> Pull Out </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Solid State Drive (SSD)" class="sub-style"><span> Solid State Drive (SSD) </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Solid State Drive (SSD)" class="sub-style"><span> Solid State Drive (SSD) </span></a>
                                                                            <a href="category.php?cat=Desktop&catm=Internal Hard Drive&cats=Surveillance" class="blog-sub-style"><span> Surveillance </span></a>  
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=Barebone Desktop" class="submenu-link">  Barebone Desktop</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=CD | DVD | DVD Writer" class="submenu-link">  CD | DVD | DVD Writer</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=CPU | CPU Fan" class="submenu-link">  CPU | CPU Fan</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Desktop&catm=I/O CARD" class="submenu-link">  I/O CARD</a>
                                                              </li>
                                                               <li class="submenu-li">
                                                                    <a href="category.php?cat=Desktop&catm=SSD | External HDD" class="g-l-link"><span>SSD | External HDD</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu18" data-bs-toggle="collapse" class="sub-link"><span>SSD | External HDD</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu18">
                                                                        <li>
                                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External Hard Disk" class="sub-style"><span> External Hard Disk </span></a>
                                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External Hard Disk" class="blog-sub-style"><span> External Hard Disk </span></a>
                                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External SSD" class="sub-style"><span> External SSD </span></a> 
                                                                        <a href="category.php?cat=Desktop&catm=SSD | External HDD&cats=External SSD" class="blog-sub-style"><span> External SSD </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=SSD | HDD Casing" class="submenu-link">  SSD | HDD Casing</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=UPS | UPS Batteries" class="submenu-link">  UPS | UPS Batteries</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Motherboard" class="submenu-link">  Motherboard</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Ram" class="submenu-link">  Ram</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Graphic Card" class="submenu-link">  Graphic Card</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Cabinet | Cabinet Fan" class="submenu-link">  Cabinet | Cabinet Fan</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Desktop&catm=Power Supply" class="submenu-link">  Power Supply</a>
                                                                  </li>
                                                            </ul>
                                                        </li>
                                                       
                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Laptop" class="link-title">
                                                                <span class="sp-link-title">Laptop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu72" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Laptop</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu72">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Laptop&catm=Laptop Spare" class="g-l-link"><span>Laptop Spare</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu18" data-bs-toggle="collapse" class="sub-link"><span>Laptop Spare</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu18">
                                                                        <li>
                                                                         <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DVD Writer" class="sub-style"><span>   Laptop DVD Writer </span></a>
                                                                          <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DVD Writer" class="blog-sub-style"><span>   Laptop DVD Writer </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop On | Off Switch" class="sub-style"><span> Laptop On | Off Switch </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop On | Off Switch" class="blog-sub-style"><span> Laptop On | Off Switch </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Speaker" class="sub-style"><span> Laptop Speaker </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Speaker" class="blog-sub-style"><span> Laptop Speaker </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Keyboard" class="sub-style"><span> Laptop Keyboard </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Keyboard" class="blog-sub-style"><span> Laptop Keyboard </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=DC Adapter Cable" class="sub-style"><span> DC Adapter Cable </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=DC Adapter Cable" class="blog-sub-style"><span> DC Adapter Cable </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop CPU Fan" class="sub-style"><span> Laptop CPU Fan </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop CPU Fan" class="blog-sub-style"><span> Laptop CPU Fan </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Display Cable" class="sub-style"><span> Laptop Display Cable </span></a>
                                                                             <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Display Cable" class="blog-sub-style"><span> Laptop Display Cable </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Hinges" class="sub-style"><span> Laptop Hinges </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Hinges" class="blog-sub-style"><span> Laptop Hinges </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Base" class="sub-style"><span> Laptop Base </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop Base" class="blog-sub-style"><span> Laptop Base </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DC jack" class="sub-style"><span> Laptop DC jack </span></a>  
                                                                            <a href="category.php?cat=Laptop&catm=Laptop Spare&cats=Laptop DC jack" class="blog-sub-style"><span> Laptop DC jack </span></a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Laptop&catm=Internal SSD | HDD" class="g-l-link"><span>Internal SSD&HDD</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu17" data-bs-toggle="collapse" class="sub-link"><span>Internal SSD&HDD</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu17">
                                                                        <li>
                                                                            <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal SSD" class="sub-style"><span> Internal SSD </span></a>
                                                                             <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal SSD" class="blog-sub-style"><span> Internal SSD </span></a>
                                                                            <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal HDD" class="sub-style"><span> Internal HDD </span></a> 
                                                                            <a href="category.php?cat=Laptop&catm=Internal SSD | HDD&cats=Internal HDD" class="blog-sub-style"><span> Internal HDD </span></a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop RAM" class="submenu-link">  Laptop RAM</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Battery" class="submenu-link">  Laptop Battery</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Adapter" class="submenu-link">  Laptop Adapter</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Screen" class="submenu-link">  Laptop Screen</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Cooling Pad" class="submenu-link">  Laptop Cooling Pad</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Laptop&catm=Laptop Accessories" class="submenu-link">  Laptop Accessories</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Display" class="link-title">
                                                                <span class="sp-link-title">Display</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu7" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Display</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu7">
                                                                
                                                              <li class="submenu-li">
                                                                   <a href="category.php?cat=Display&catm=LED | Monitor" class="submenu-link">  LED | Monitor</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Television" class="submenu-link">  Television</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Projector | Projector Screen" class="submenu-link">  Projector | Projector Screen</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Presenter | Printer" class="submenu-link">  Presenter | Printer</a>
                                                                      </li>
                                                                      <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Wall Mount KIT | Projector Stand" class="submenu-link">  Wall Mount KIT | Projector Stand</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                                          <a href="category.php?cat=Display&catm=Power Cable | HDM Cable | Vga Cable" class="submenu-link">  Power Cable | HDM Cable | Vga Cable</a>
                                                                      </li>
                                                                <li class="submenu-li">
                                                             <a href="category.php?cat=Display&catm=Connector | Converter" class="submenu-link">  Connector | Converter</a>
                                                                      </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Peripherals" class="link-title">
                                                                <span class="sp-link-title">Peripherals</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu5" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Peripherals</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu5">
                                                                 <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad" class="g-l-link"><span>Keyboard | Mouse | Gamepad</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu16" data-bs-toggle="collapse" class="sub-link"><span>Keyboard | Mouse | Gamepad</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu16">
                                                                        <li>
                                                                           <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Mouse| Mouse Pad" class="sub-style"><span>  Mouse| Mouse Pad </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Mouse| Mouse Pad" class="blog-sub-style"><span>  Mouse| Mouse Pad </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Keyboard | Combo" class="sub-style"><span> Keyboard | Combo </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Keyboard | Combo" class="blog-sub-style"><span> Keyboard | Combo </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Gamepad" class="sub-style"><span> Gamepad </span></a> 
                                                                            <a href="category.php?cat=Peripherals&catm=Keyboard | Mouse | Gamepad&cats=Gamepad" class="blog-sub-style"><span> Gamepad </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Cable | Connector" class="g-l-link"><span>    Cable | Connector</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu15" data-bs-toggle="collapse" class="sub-link"><span>   Cable | Connector</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu15">
                                                                        <li>
                                                                          <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Cable" class="sub-style"><span>   Cable </span></a>
                                                                          <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Cable" class="blog-sub-style"><span>   Cable </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Spike" class="sub-style"><span> Spike </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Spike" class="blog-sub-style"><span> Spike </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=USB Hub" class="sub-style"><span> USB Hub </span></a>
                                                                             <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=USB Hub" class="blog-sub-style"><span> USB Hub </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Connector" class="sub-style"><span> Connector </span></a>  
                                                                            <a href="category.php?cat=Peripherals&catm=Cable | Connector&cats=Connector" class="blog-sub-style"><span> Connector </span></a>  
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Peripherals&catm=Other Products" class="g-l-link"><span>Other Products</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu14" data-bs-toggle="collapse" class="sub-link"><span>Other Products</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu14">
                                                                        <li>
                                                                           <a href="category.php?cat=Peripherals&catm=Other Products&cats=Calculator" class="sub-style"><span>  Calculator </span></a>
                                                                           <a href="category.php?cat=Peripherals&catm=Other Products&cats=Calculator" class="blog-sub-style"><span>  Calculator </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Cmos battery" class="sub-style"><span> Cmos battery </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Cmos battery" class="blog-sub-style"><span> Cmos battery </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Fitness band" class="sub-style"><span> Fitness band </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Fitness band" class="blog-sub-style"><span> Fitness band </span></a>
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Covid 19 medical equipments" class="sub-style"><span> Covid 19 medical equipments </span></a> 
                                                                            <a href="category.php?cat=Peripherals&catm=Other Products&cats=Covid 19 medical equipments" class="blog-sub-style"><span> Covid 19 medical equipments </span></a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Speaker" class="submenu-link">  Speaker</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Web Cam" class="submenu-link">  Web Cam</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=CD | DVD | DVD Writer" class="submenu-link">  CD | DVD | DVD Writer</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Headphone | Earphone | Mike" class="submenu-link">  Headphone | Earphone | Mike</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Pendrive | Memory Card | Card Reader" class="submenu-link">  Pendrive | Memory Card | Card Reader</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Peripherals&catm=Mobile Charger | Car charger | Power Bank" class="submenu-link">  Mobile Charger | Car charger | Power Bank</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                         <li class="menu-link parent">
                                                            <a href="category.php?cat=Scanner | Printer" class="link-title">
                                                                <span class="sp-link-title">Scanner | Printer</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu4" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Scanner | Printer</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu4">
                                                                
                                                              <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Printer | Scanner" class="submenu-link">  Printer | Scanner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Barcode Scanner" class="submenu-link">  Barcode Scanner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Lamination Machine" class="submenu-link">  Lamination Machine</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Toner" class="submenu-link">  Toner</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Ink cartridge" class="submenu-link">  Ink cartridge</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Ink Bottle" class="submenu-link">  Ink Bottle</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Toner Powder" class="submenu-link" class="submenu-link">  Toner Powder</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Cartridge spareparts" class="submenu-link">  Cartridge spareparts</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Photo Paper" class="submenu-link">  Photo Paper</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Scanner | Printer&catm=Vax RIbbion" class="submenu-link">  Vax RIbbion</a>
                                                              </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Networking" class="link-title">
                                                                <span class="sp-link-title">Networking</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu3" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Networking</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu3">
                                                                
                                                                <li class="submenu-li">
                                                                    <a href="category.php?cat=Networking&catm=Cable and Connector" class="g-l-link"><span>Cable and Connector</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu13" data-bs-toggle="collapse" class="sub-link"><span>Cable and Connector</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu13">
                                                                        <li>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Adapter" class="sub-style"><span> Adapter </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Adapter" class="blog-sub-style"><span> Adapter </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Lan Cable" class="sub-style"><span> Lan Cable </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Lan Cable" class="blog-sub-style"><span> Lan Cable </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Spike" class="sub-style"><span> Spike </span></a>
                                                                         <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Spike" class="blog-sub-style"><span> Spike </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Connector" class="sub-style"><span> Connector </span></a>   
                                                                        <a href="category.php?cat=Networking&catm=Cable and Connector&cats=Connector" class="blog-sub-style"><span> Connector </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Router | Range Extender" class="submenu-link">  Router | Range Extender</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Switch" class="submenu-link">  Switch</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=POV switch" class="submenu-link">  POV switch</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=USB WIFI | Bluetooth Adapter" class="submenu-link">  USB WIFI | Bluetooth Adapter</a>
                                                              </li>
                                                              <li class="submenu-li">
                                                                    <a href="javascript:void(0)" class="g-l-link"><span>Fiber Accessories</span> <i class="fa fa-angle-right"></i></a>
                                                                    <a href="#account-menu12" data-bs-toggle="collapse" class="sub-link"><span>Fiber Accessories</span> <i class="fa fa-angle-down"></i></a>
                                                                    <ul class="collapse blog-style-1" id="account-menu12">
                                                                        <li>
                                                                          <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Router" class="sub-style"><span>   Fiber Router </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Coupler" class="sub-style"><span> Fiber Coupler </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber BIDI" class="sub-style"><span> Fiber BIDI </span></a>
                                                                        <a href="category.php?cat=Networking&catm=Fiber Accessories&cats=Fiber Patch Cord" class="sub-style"><span> Fiber Patch Cord </span></a> 
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                              <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Network Accessories" class="submenu-link">  Network Accessories</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Rack | Accessories" class="submenu-link">  Rack & Accessories </a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Networking&catm=Tools" class="submenu-link">  Tools</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Security" class="link-title">
                                                                <span class="sp-link-title">Security</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu2" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Security</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu2">
                                                                
                                                               <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=HD Camera| DVR" class="submenu-link">  HD Camera| DVR</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=IP Camera| DVR" class="submenu-link">  IP Camera| DVR</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Wifi Camera" class="submenu-link">  Wifi Camera</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Biometric" class="submenu-link">  Biometric</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Cable" class="submenu-link">  Cable</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=POE Switch | Adapter" class="submenu-link">  POE Switch | Adapter</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Power Supply | Injector" class="submenu-link">  Power Supply | Injector</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Rack | Accessories" class="submenu-link">  Rack & Accessories </a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Surveillance Accessories" class="submenu-link">  Surveillance Accessories</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=Surveillance Harddisk" class="submenu-link">  Surveillance Harddisk</a>
                                                              </li>
                                                            <li class="submenu-li">
                                                                  <a href="category.php?cat=Security&catm=LED | Monitor" class="submenu-link">  LED | Monitor</a>
                                                              </li>
                                                            </ul>
                                                        </li>

                                                        <li class="menu-link parent">
                                                            <a href="category.php?cat=Software" class="link-title">
                                                                <span class="sp-link-title">Software</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <a href="#collapse-page-menu1" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                                <span class="sp-link-title">Software</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu1">
                                                                
                                                               <li class="submenu-li">
                                                                 <a href="category.php?cat=Software&catm=Accounting Software" class="submenu-link">  Accounting Software</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Software&catm=Antivirus" class="submenu-link">  Antivirus</a>
                                                                  </li>
                                                                <li class="submenu-li">
                                                                      <a href="category.php?cat=Software&catm=Windows | Office" class="submenu-link">  Windows | Office</a>
                                                                  </li>
                                                            </ul>
                                                        </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- menu end -->
                                <div class="img-hotline">
                                    <div class="image-line">
                                        <a href="javascript:void(0)"><img src="image/icon_contact.png" class="img-fluid" alt="image-icon"></a>
                                    </div>
                                    <div class="image-content">
                                        <span class="hot-l">Hotline:</span>
                                        <span>0123 456 789</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'product-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                 }
                else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
        
        $(document).mouseup(function(e){
    var container = $("#search_result");
    var container2 = $("#live_search");
    
    if (!container.is(e.target) && !container2.is(e.target) && container2.has(e.target).length === 0 && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
        $(document).ready(function () {
            $("#live_searchs").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'product-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_results').html(data);
                            $('#search_results').css('display', 'block');
                            $("#live_searchs").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                 }
                else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
                $(document).mouseup(function(e){
    var container = $("#search_results");
    var container2 = $("#live_searchs");
    
    if (!container.is(e.target) && !container2.is(e.target) && container2.has(e.target).length === 0 && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
        </script>
    </script>
