@extends('_layout_admin_agl')
@section('content')
<!-- <!doctype html>
<html lang="en" >
  <head>
    <title>Quan ly san pham</title>
    Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     Bootstrap CSS -->
    
    <!-- </head> -->
<style>
    .modal-content{
        width:50% !important;
        margin:auto;
    }
    .form-info{
        width:100%;
    }
</style>
  <div ng-controller="donhangcontroller">
    <div style="display:flex; margin:10px;justify-content:space-between;">
            <div style="color:red;">
                <h2>ĐƠN HÀNG</h2>
            </div>
            <div style="margin:0px;">
                <button class="btn btn-secondary" ng-click="showmodal(0)">Thêm</button>
            </div>
        </div>
    <div>  
        <table class="table table-border">
            <thead>
                <tr>
                <th>TT</th>
                        <th>MaDH</th>
                        <th>NgayDatHang</th>
                        <th>ThanhTien</th>
                        <th>DiaChiGiaoHang</th>
                        <th>SDT</th>
                        <th>HoTen</th>
                        <th>GhiChu</th>
                        <th>MaKH</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>In Hóa Đơn</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="sp in donhang|filter:textSearch|itemsPerPage:10">
                    <td>@{{($index+1)+(pagination.current -1)*10}}</td>
                    <td>@{{sp.MaDH}}</td>
                    <td>@{{sp.NgayDatHang}}</td>
                    <td>@{{sp.ThanhTien}}</td>
                    <td>@{{sp.DiaChiGiaoHang}}</td>
                    <td>@{{sp.SDT}}</td>
                    <td>@{{sp.HoTen}}</td>
                    <td>@{{sp.GhiChu}}</td>
                    <td>@{{sp.MaKH}}</td>
                    <td><button class="btn btn-info" ng-click="showmodal(sp.MaDH)">&nbsp;Edit</button></td>
                    <td><button class="btn btn-danger" ng-click="deleteClick(sp.MaDH)">&nbsp;Delete</button></td>
                    <td><button class="btn btn-dark" ng-click="InHD(sp.MaDH)" data-toggle="modal" data-target="#exampleModalLong">&nbsp;In</button></td>
                </tr>
            </tbody>
        </table>
        <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" on-page-change="pageChanged(newPageNumber)" >
        </dir-pagination-controls>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">In Hóa Đơn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
            <div class="container-fluid">
                    <div class="form-info">
                        <p>Mã Đơn Hàng: @{{ct.MaDH}}</p>
                    </div>
            </div>
            <div class="container-fluid">
                <div class="form-info">
                    <p>Tên Khách Hàng: @{{ct.HoTen}}</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-info">
                    <p>Ngày Đặt Hàng: @{{ct.NgayDatHang}}</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-info">
                   <p> Địa Chỉ Giao Hàng: @{{ct.DiaChiGiaoHang}}</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-info">
                    <p>Tổng Tiền: @{{ct.ThanhTien}}</p>
                </div>
            </div>
            <div class="container-fluid">
                
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Thành Tiền</th>
                        <th>Trạng Thái</th>
                        <!-- <th>Chi Tiết</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in donhang">
                        <td>@{{d.MaDH}}</td>
                        <td>@{{d.NgayDatHang}}</td>
                        <td>@{{d.ThanhTien}} VNĐ</td>
                        <td>Đang Vận Chuyển</td>
                    </tr>
                </tbody>
            </table>   
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_pdf">Xuất File PDF</button>
      </div>
    </div>
  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="closeModal()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">MaDH:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="donhang.MaDH">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">NgayDatHang:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="donhang.NgayDatHang">
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#modelId').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);

            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>

    

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/JS/angular.min.js"></script>
    <script src="/JS/donhang.js">
    </script>
    <script src="/JS/dirPagination.js"></script>
    <script src="/JS/dir.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> 
    <script>  
    (function () {  
        var  
         form = $('.form'),  
         cache_width = form.width(),  
         a4 = [595.28, 841.89]; // for a4 size paper width and height  
  
        $('#create_pdf').on('click', function () {  
            $('body').scrollTop(0);  
            createPDF();
            setTimeout(function(){ 
                window.location.reload();
             }, 1000);
            
        });  
        //create pdf  
        function createPDF() {  
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/png"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img, 'JPEG', 20, 20);  
                doc.save('binhan.pdf');  
                form.width(cache_width);  
            });  
        }  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.3333) - 80).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  
  
    }());  
</script>  
<script>  
    /* 
 * jQuery helper plugin for examples and tests 
 */  
    (function ($) {  
        $.fn.html2canvas = function (options) {  
            var date = new Date(),  
            $message = null,  
            timeoutTimer = false,  
            timer = date.getTime();  
            html2canvas.logging = options && options.logging;  
            html2canvas.Preload(this[0], $.extend({  
                complete: function (images) {  
                    var queue = html2canvas.Parse(this[0], images, options),  
                    $canvas = $(html2canvas.Renderer(queue, options)),  
                    finishTime = new Date();  
  
                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                    $canvas.siblings().toggle();  
  
                    $(window).click(function () {  
                        if (!$canvas.is(':visible')) {  
                            $canvas.toggle().siblings().toggle();  
                            throwMessage("Canvas Render visible");  
                        } else {  
                            $canvas.siblings().toggle();  
                            $canvas.toggle();  
                            throwMessage("Canvas Render hidden");  
                        }  
                    });  
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                }  
            }, options));  
  
            function throwMessage(msg, duration) {  
                window.clearTimeout(timeoutTimer);  
                timeoutTimer = window.setTimeout(function () {  
                    $message.fadeOut(function () {  
                        $message.remove();  
                    });  
                }, duration || 2000);  
                if ($message)  
                    $message.remove();  
                $message = $('<div ></div>').html(msg).css({  
                    margin: 0,  
                    padding: 10,  
                    background: "#000",  
                    opacity: 0.7,  
                    position: "fixed",  
                    top: 10,  
                    right: 10,  
                    fontFamily: 'Tahoma',  
                    color: '#fff',  
                    fontSize: 12,  
                    borderRadius: 12,  
                    width: 'auto',  
                    height: 'auto',  
                    textAlign: 'center',  
                    textDecoration: 'none'  
                }).hide().fadeIn().appendTo('body');  
            }  
        };  
    })(jQuery);  
  
</script>  
    
</div>
<!-- </html> -->
@stop