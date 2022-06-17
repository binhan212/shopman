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
    
     <style>
         table thead tr{
            cursor: pointer;
         }
         .arrow-up{
             width: 0;
             height:0;
             border-left: 5px solid transparent;
             border-right: 5px solid transparent;
             border-bottom: 8px solid wheat;
             display: inline-block;
         }
         .arrow-down{
             width: 0;
             height:0;
             border-left: 5px solid transparent;
             border-right: 5px solid transparent;
             border-top: 8px solid wheat;
             display: inline-block;
         }
     </style>
    <!-- </head> -->
  <div ng-controller="mausaccontroller">
    <div style="display:flex; margin:10px;justify-content:space-between;">
        <div style="color:red;">
            <h2>MÀU SẮC</h2>
        </div>
        <div style="margin:0px;">
            <button class="btn btn-secondary" ng-click="showmodal(0)">Thêm</button>
        </div>
    </div>
    <input type="button" id="create_pdf" value="Generate PDF">  

    <!-- <input type='text' ng-model="limitRow"> -->
    <div>
        <table class="table table-border form">
            <thead>
                <tr>
                <th>TT</th>
                <th ng-click="sortData(MaMS)">MaMS</th>
                <th ng-click="sortData(TenMS)">TenMS</th>
                <th>AnhMS</th>
                <th ng-click="sortData(MaSP)">MaSP</th>
                <th ng-click="sortData(Gia)">Gia</th>
                <th>Sửa</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="sp in mausac|filter:textSearch|itemsPerPage:10|orderBy:sortColumn:reverse">
                <!-- |limitTo:limitRow -->
                    <td>@{{($index+1)+(pagination.current -1)*10}}</td>
                    <td>@{{sp.MaMS}}</td>
                    <td>@{{sp.TenMS}}</td>
                    <td><img src="/upload/sanpham/@{{sp.AnhMS}}" style='width:100px;height:100px;' alt=""></td>
                    <td>@{{sp.MaSP}}</td>
                    <td>@{{sp.Gia|number:0}}</td>
                    <td><button class="btn btn-info" ng-click="showmodal(sp.MaMS)">&nbsp;Edit</button></td>
                    <td><button class="btn btn-danger" ng-click="deleteClick(sp.MaMS)">&nbsp;Delete</button></td>
                </tr>
            </tbody>
        </table>


        <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" on-page-change="pageChanged(newPageNumber)" >
        </dir-pagination-controls>
    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" enctype="multipart/form-data">
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
                            <label for="name">MaMS:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="mausac.MaMS">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">TenMS:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="mausac.TenMS">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">AnhMS:</label>
                            <div>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="mausac.AnhMS"> --}}
                                <input type='file' id="ng-model-instant" onchange="angular.element(this).scope().imageUpload(event)" multiple />
                                {{-- <input type="text" class="form-control" ng-model="mausac.AnhMS"> --}}
                                <div ng-repeat="step in stepsModel">
                                    <img class="thumb" ng-src="@{{step}}" width="100" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Gia:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="mausac.Gia">
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
    <script src="/JS/ng-file-upload-shim.js"></script>
    <script src="/JS/ng-file-upload.min.js"></script>
    <script src="/JS/mausac.js"></script>

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
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
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