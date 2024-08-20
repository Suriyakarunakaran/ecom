<style type="text/css">
  .sidebar {
    background-color: #074C39 !important;
  }

  .sidebar .nav .nav-item .nav-link .icon-bg .menu-icon {
    color: #F56E01 !important;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-title {
    color: #F56E01 !important;
  }
  .sidebar .nav .nav-item.active > .nav-link:before {
    background: #F56E01 !important;
  }
  .navbar .navbar-brand-wrapper {
    background-color: #074C39 !important;
  }

</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="icon-bg"><i class="mdi mdi-view-dashboard-outline menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="brands.php">
                <span class="icon-bg"><i class="mdi mdi-alpha-e-box menu-icon"></i></span>
                <span class="menu-title">Brand</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="category.php">
                <span class="icon-bg"><i class="mdi mdi-shape-outline menu-icon"></i></span>
                <span class="menu-title">Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sub_cat.php">
                <span class="icon-bg"><i class="mdi mdi-shape-plus-outline menu-icon"></i></span>
                <span class="menu-title">Sub Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ad.php">
                <span class="icon-bg"><i class="mdi mdi-advertisements menu-icon"></i></span>
                <span class="menu-title">Advertisement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="offers.php">
                <span class="icon-bg"><i class="mdi mdi-tag menu-icon"></i></span>
                <span class="menu-title">Offers</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product_image.php">
                <span class="icon-bg"><i class="mdi mdi-image-album menu-icon"></i></span>
                <span class="menu-title">Product Image</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">
                <span class="icon-bg"><i class= "mdi mdi-package-variant-closed menu-icon"></i></span>
                <span class="menu-title">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">
                <span class="icon-bg"><i class="mdi mdi-truck-delivery menu-icon"></i></span>
                <span class="menu-title">Orders</span>
              </a>
            </li>
           <!--  <li class="nav-item nav-category">UI Features</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">          
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>          
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>          
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Material</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Forms</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/forms/basic_elements.html">Form Elements</a></li>          
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Data Representation</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic Table</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item nav-category">Sample Pages</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>          
                  
                </ul>
              </div>
            </li>
            <li class="nav-item documentation-link">
              <a class="nav-link" href="docs/documentation.html">
                <span class="icon-bg">
                  <i class="mdi mdi-file-document menu-icon"></i>
                </span>
                <span class="menu-title">Documentation</span>
              </a>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img src="assets/images/faces/face28.png" alt="image">
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">Henry Klein</p>
                      </div>
                    </div>
                  </div>
                  <div class="badge badge-danger">3</div>
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-weather-sunny menu-icon"></i>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                  <span class="menu-title">Take Tour</span></a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li> -->
          </ul>
        </nav>