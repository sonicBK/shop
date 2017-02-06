<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/bootstrap3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-admin.css">
    <script type="text/javascript" src="plugin/ckeditor/ckeditor.js"></script>
</head>
<body>
  <div id="top">
      <div class="container">
          <div class="row">
              <div class="pull-left">
                  <h3 class="logo">admin</h3>
              </div>
              <div class="pull-right">
                  <div class="dropdown user">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="glyphicon glyphicon-user"></i>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#">Thông tin</a></li>
                      <li><a href="#">Đổi mật khẩu</a></li> 
                      <li role="separator" class="divider"></li>
                      <li><a href="?u=userController/logout">Thoát</a></li>
                    </ul>
                  </div>
              </div>  
          </div>
      </div>
  </div>
  <div class="content">
      <div class="nav menu">
        <ul class="list-unstyled list-menu">
                    <li>
                        <form action>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i>Danh mục</a>
                        <ul class="list-unstyled nav nav-second-level collapse">
                          <li><a href="?u=categoryController/add">Thêm</a></li>
                          <li><a href="?u=categoryController/show">Danh sách</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-object-align-left"></i>Sản phẩm
                        </a>
                         <ul class="list-unstyled nav nav-second-level collapse">
                            <li><a href="?u=productController/add">Thêm</a></li>
                            <li><a href="?u=productController/show">Danh sách</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i>User</a>
                        <ul class="list-unstyled nav nav-second-level collapse">
                            <li><a href="?u=userController/add">Thêm</a></li>
                            <li><a href="?u=userController/show">Danh sách</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="?u=orderController/show"><i class="glyphicon glyphicon-shopping-cart"></i>Đơn hàng</a>
                    </li>
        </ul>
      </div>
