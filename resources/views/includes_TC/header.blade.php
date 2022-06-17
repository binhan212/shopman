<style>
    .navbar-nav .nav-item .dropdown-item:hover{
        color: red;
    }
    .input-group-text:hover{
        cursor: pointer;
    }
    .client{
        border:none;
        border-radius: 50%;
        width:30px;
        height:30px;
        margin:0 0;
        padding: 0 0;
    }
    .client img{
        /* overflow:hidden; */
        width: 100%;
        height:100%;
        border-radius: 50%;

    }

    .name_client{
        padding: 0 5px;
        color:white;
    }
    .fa-solid.fa-magnifying-glass:hover{
        cursor: pointer;
    }
</style>

<div class="py-1 bg-primary">
            <div class="container">
                <div
                    class="row no-gutters d-flex align-items-start align-items-center px-md-0"
                >
                    <div class="col-lg-12 d-block">
                        <div class="row d-flex">
                            <div
                                class="col-md pr-4 d-flex topper align-items-center"
                            >
                                <div
                                    class="icon mr-2 d-flex justify-content-center align-items-center"
                                >
                                    <span class="icon-phone2"></span>
                                </div>
                                <span class="text">+ 0983001432</span>
                            </div>
                            <div
                                class="col-md pr-4 d-flex topper align-items-center"
                            >
                                <div
                                    class="icon mr-2 d-flex justify-content-center align-items-center"
                                >
                                    <span class="icon-paper-plane"></span>
                                </div>
                                <span class="text">binhanvio@gmail.com</span>
                            </div>
                            <div
                                class="text-lg-right" id="cli"
                            >
                                <!-- <span class="text"
                                    >Đổi trả sản phẩm trong vòng 3-5 ngày</span
                                > -->
                                <a href="/trangchu/info">
                                    <button class="client"><img src="/upload/sanpham/3.jpg" alt=""></button>
                                    <span class="name_client">@{{name_client}}</span>
                                </a>
                                
                                <!-- <button >Đăng Xuất</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav
            class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
            id="ftco-navbar"
        >
            <div class="container">
                <a class="navbar-brand" href="/">SHOP MAN</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#ftco-nav"
                    aria-controls="ftco-nav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="oi oi-menu"></span> Menu
                </button>
                
                <div>
                    <form>
                        <div style="border: 1px solid #ccc;border-radius: 25px; display:flex; justify-content:space-between;width:320px;margin: 3px 3px;">
                            <input type="text" name="search" id="search" style="outline: none; margin: 6px 18px;border:none;" ng-model="searchText"/>
                            <!-- <input type="submit" name="ok" value="search"/> -->
                            <i class="fa-solid fa-magnifying-glass" style="width: 36px;line-height: 41px;" ng-click="search(searchText)"></i>
                        </div>
                    </form>
                </div>


                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item active">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="dropdown04"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                
                                >Áo</a
                            >
                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdown04"
                            >
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(1)"
                                    >Áo Khoác</a>
                                
                                
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(2)"

                                    >Áo Vest và Blazer</a
                                >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    ng-click="danhmuc(3)"

                                    >Áo Hoodie, Áo Len & Áo Nỉ</a
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                //id="dropdown04"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"

                                >Quần</a
                            >
                            <div
                                class="dropdown-menu"
                                //aria-labelledby="dropdown04"
                            >
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(4)"

                                    >Quần Jeans</a
                                >
                                
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(5)"

                                    >Quần Dài/Quần Âu</a
                                >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    ng-click="danhmuc(6)"
                                    >Quần Short</a
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                //id="dropdown04"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Đồ</a
                            >
                            <div
                                class="dropdown-menu"
                                //aria-labelledby="dropdown04"
                            >
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(7)"

                                    >Đồ Lót</a
                                >
                                
                                <a class="dropdown-item" href="#"
                                ng-click="danhmuc(8)"

                                    >Đồ Ngủ</a
                                >
                            </div>
                        </li>
                        <li class="nav-item cta cta-colored">
                            <a href="/trangchu/cart" class="nav-link"
                                ><span class="icon-shopping_cart">@{{sl}}</span></a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

</div>
