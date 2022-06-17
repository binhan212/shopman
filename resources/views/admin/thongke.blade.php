@extends('_layout_admin_agl')
@section('content')
<style>
    .card-footer {
        background-color: aliceblue;
    }
    .ti-reload{
        color:blue;
    }
    .stats:hover{
        cursor: pointer;
    }
    .card-title{
        color: deeppink;
    }
</style>
<link rel="stylesheet" href="/thongke/themify-icons/themify-icons.css">
<div ng-controller="thongkecontroller">
    <div style="display:flex; margin:10px;justify-content: space-around;">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="ti-user" style="color:chartreuse;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">
                            khách hàng
                      </p>
                      <p class="card-title">@{{sl}} khách<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats" ng-click="load()">
                  <i class="ti-reload"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="ti-truck" style="color:red;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Bán</p>
                      <p class="card-title">@{{sl_don}} Đơn<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats" ng-click="load()">
                    <i class="ti-reload"></i>
                    Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="ti-briefcase" style="color:darkblue;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Doanh Thu</p>
                      <p class="card-title">@{{tongtien|number:0}} VNĐ<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats" ng-click="load()">
                    <i class="ti-reload" ></i>
                    Update Now
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="ti-bolt" style="color:darkorange;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Tổng Hợp Hóa Đơn</p>
                      <p class="card-title"><a href="https://drive.google.com/drive/folders/1mPSnX_apMM_p1pExjnz_UIAAZqnEEvvz?usp=sharing">Link</a><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                    <!-- <i class="ti-reload"></i> -->
                    Liên Kết
                </div>
              </div>
            </div>
</div>
    </div>

    

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/JS/angular.min.js"></script>
    <script src="/JS/thongke.js">

    </script>
</div>
<!-- </html> -->
@stop