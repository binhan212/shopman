<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets_info/css/base.css">
    <link rel="stylesheet" href="/assets_info/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel = "stylesheet" 
         href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
         integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
         crossorigin = "anonymous">
</head>
<style>
    input{
        width: 100%;
        height:30px;
    }
    .get-in-touch {
    max-width: 800px;
    margin: 50px auto;
    position: relative;

    }
    .get-in-touch .title {
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 3.2em;
    line-height: 48px;
    padding-bottom: 48px;
        color: #5543ca;
        background: #5543ca;
        background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
    }

    .contact-form .form-field {
    position: relative;
    margin: 32px 0;
    padding: 5px 0px;
    }
    .contact-form .input-text {
    display: block;
    width: 100%;
    height: 36px;
    border-width: 0 0 2px 0;
    border-color: #5543ca;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
    }
    .contact-form .input-text:focus {
    outline: none;
    }
    .contact-form .input-text:focus + .label,
    .contact-form .input-text.not-empty + .label {
    -webkit-transform: translateY(-24px);
            transform: translateY(-24px);
    }
    .contact-form .label {
    left: 20px;
    bottom: 11px;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
    color: #5543ca;
    cursor: text;
    transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
    transition: transform .2s ease-in-out, 
    -webkit-transform .2s ease-in-out;
    }
    .contact-form .submit-btn {
    display: inline-block;
    background-color: #000;
    background-image: linear-gradient(125deg,#a72879,#064497);
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 16px;
    padding: 8px 16px;
    border: none;
    width:200px;
    cursor: pointer;
    height:37px;
    }
    .table thead th {
        font-size: 16px;
    }
    .table tbody td {
        font-size: 14px;
    }

    .icon_detail{
        color:#1ba926;
    }
    .icon_detail:hover{
        color:#80d587;
        cursor: pointer;
    }
    .dh_ct{
        width: 100%;
        padding:10px 20px;
    }
</style>
<body ng-controller="infocontroller">
    <!-- Block Element Modifier -->
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                        <a href="/">Về cửa hàng</a>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <!-- <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">Đăng Ký</li>
                        <li class="header__navbar-item header__navbar-item--strong">Đăng Nhập</li> -->
                        <li class="header__navbar-item header__navbar-user">
                            <img src="/assets_info/img/anh_dn.png" alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name">@{{kh.TenKH}}</span>
                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                    <a href="#" ng-click="logout()">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="app_container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">
                                Danh Mục</h3>
                            <ul class="category-list">
                                <li class="category-item1">
                                    <a href="" class="category-item__link" ng-click="changeList(1)">Tài khoản của tôi</a>
                                </li>
                                <li class="category-item2">
                                    <a href="" class="category-item__link" ng-click="changeList(2)">Đơn mua</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="grid__column-10">
                            
                        <div class="home-product">
                            <div class="grid__row myInformation">
                                    <div class="grid__column-12" style="background-color:white;height:auto;width:100%">
                                        <div>
                                            
                                        <section class="get-in-touch">
                                            <h1 class="title">Infomation</h1>
                                            <form class="contact-form row">
                                                <div class="form-field col-lg-6">
                                                    <label class="label">Tên</label>
                                                    <input id="name" class="input-text" type="text" required ng-model="kh.TenKH">
                                                </div>
                                                <div class="form-field col-lg-6 ">
                                                    <label class="label" >Email</label>

                                                    <input id="email" class="input-text" type="email" required ng-model="kh.Email">
                                                </div>
                                                <div class="form-field col-lg-6 ">
                                                    <label class="label">Địa Chỉ</label>

                                                    <input id="company" class="input-text" type="text" required ng-model="kh.DiaChi">
                                                </div>
                                                <div class="form-field col-lg-6 ">
                                                    <label class="label">SĐT</label>

                                                    <input id="phone" class="input-text" type="text" required ng-model="kh.SDT">
                                                </div>
                                                <div class="form-field col-lg-12">
                                                    <input class="submit-btn" type="submit" value="Thay Đổi" ng-click="edit(kh)">
                                                </div>
                                            </form>
                                        </section>

                                        </div>
                                    </div>
                            </div>

                            <div class="grid__row buyDonHang">
                                    <div class="grid__column-12" style="background-color:white;height:auto;width:100%">
                                        <div>
                                            
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã Đơn Hàng</th>
                                                    <th>Ngày Đặt Hàng</th>
                                                    <th>Thành Tiền</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Chi Tiết</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="d in donhang">
                                                    <td>@{{d.MaDH}}</td>
                                                    <td>@{{d.NgayDatHang}}</td>
                                                    <td>@{{d.ThanhTien}} VNĐ</td>
                                                    <td>Đang Vận Chuyển</td>
                                                    <td><i class="fa-solid fa-calendar-day icon_detail" ng-click="detailDonhang(d.MaDH)" data-toggle = "modal" data-target = "#exampleModal"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "modal fade" id = "exampleModal" tabindex = "-1" 
            role = "dialog" aria-labelledby =" exampleModalLabel" aria-hidden = "true">
            <div class = "modal-dialog" role = "document" style="font-size:18px">
               <div class = "modal-content">
                  <div class = "modal-header">
                     <h4 class = "modal-title" id = "exampleModalLabel">Chi Tiết Đơn Hàng</h4>
                     <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                     </button>
                  </div>
                  
                  <div class = "modal-body">
                     <div class="dh_ct">
                         MaDH:<p>@{{ct.MaDH}}</p>
                     </div>
                     <div  class="dh_ct">
                        Ngày Đặt Hàng:<p>@{{ct.NgayDatHang}}</p>
                     </div>
                     <div  class="dh_ct">
                         Thành Tiền:<p>@{{ct.ThanhTien}} VNĐ</p>
                     </div>
                     <div  class="dh_ct">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>MaCTDH</th>
                                    <th>MaSize</th>
                                    <th>SoLuong</th>
                                    <th>Gia</th>
                                    <th>TenSP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="c in ct.ctdhs">
                                    <td>@{{c.MaCTDH}}</td>
                                    <td>@{{c.MaSize}}</td>
                                    <td>@{{c.SoLuong}}</td>
                                    <td>@{{c.Gia}}</td>
                                    <td>@{{c.TenSP}}</td>
                                </tr>
                            </tbody>
                        </table>
                        

                     </div>

                  </div>
                  
                  <div class = "modal-footer">
                     <button type = "button" class = "btn btn-danger" data-dismiss = "modal">Đóng</button>
                     <button type = "button" class = "btn btn-success" ng-click="inDoc(ct)">In</button>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>


        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-3-4">
                        <h3 class="footer__heading">
                            Chăm sóc khác hàng
                        </h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Trung tâm trợ giúp
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Shop-Mail
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Hướng dẫn mua hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-3-4">
                        <h3 class="footer__heading">
                            Giới thiệu
                        </h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Tuyển dụng
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Điều khoản
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-3-4">
                        <h3 class="footer__heading">
                            Danh mục
                        </h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Áo Nam
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Quần Nam
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Thời Trang Nam
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-3-4">
                        <h3 class="footer__heading">
                            Theo dõi
                        </h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-facebook"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-instagram"></i>
                                    Instaram
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                   <i class="footer-item__icon fab fa-linkedin"></i>
                                    Linkedin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                
            </div>
    </div>

    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" 
         integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
         crossorigin = "anonymous">
      </script>
      
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
         integrity = "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
         crossorigin = "anonymous">
      </script>
      
      <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
         integrity = "sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
         crossorigin = "anonymous">
      </script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $('[data-toggle="tooltip"]').tooltip()

        // Initialize popover component
        $('[data-toggle="popover"]').popover()

    </script>

    <script src="/js/angular.min.js"></script>
    <script src="/js/appTC.js"></script>
    <script src="/js/information.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>