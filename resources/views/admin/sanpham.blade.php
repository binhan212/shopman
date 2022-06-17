@extends('_layout_admin_agl')
@section('content')

<style>
input[type=text] {
  border: 1px solid #ccc;
  /* border-bottom: 2px solid sandybrown; */
  width:auto !important;
}

.color_list {
    display: flex;
    /* flex-wrap: wrap; */
}
.item{
    flex-grow: 1;
    margin: 0 10px;
}
</style>
  <div ng-controller="sanphamcontroller">
    <div style="display:flex; margin:10px;justify-content:space-between;">
        <div style="color:red;">
            <h2>SẢN PHẨM</h2>
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
                        <th>MaSP</th>
                        <th>TenSP</th>
                        <th>MoTa</th>
                        <th>GiamGia</th>
                        <th>MaDMC</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="sp in sanphams|filter:textSearch|itemsPerPage:10|orderBy:'MaSP':false">
                    <td>@{{($index+1)+(pagination.current -1)*10}}</td>
                    <td>@{{sp.MaSP}}</td>
                    <td>@{{sp.TenSP}}</td>
                    <td>@{{sp.MoTa}}</td>
                    <td>@{{sp.GiamGia}}</td>
                    <td>@{{sp.MaDMC}}</td>
                    <td><button class="btn btn-info" ng-click="showmodal(sp.MaSP)">&nbsp;Edit</button></td>
                    <td><button class="btn btn-danger" ng-click="deleteClick(sp.MaSP)">&nbsp;Delete</button></td>
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
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document" style="top:-40px;">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="closeModal()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="form-group" style="width:100%">
                            <label for="name">TenSP:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="sanpham.TenSP" style="width: 100% !important;">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group" style="width:100%">
                            <label for="name">MoTa:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="sanpham.MoTa" style="width: 100% !important;">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group" style="width:100%">
                            <label for="name">GiamGia:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="sanpham.GiamGia" style="width: 100% !important;">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group" style="width:100%">
                            <label for="name">MaDMC:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="sanpham.MaDMC" style="width: 100% !important;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">MauSac:</label>
                        </div>
                    </div>
                    <div class="container-fluid color_list">
                        <div class='item' ng-click="getSize(0,sanpham.MaSP)" >
                            <div class="form-group">
                                <label for="fullname" class="form-label">TenMS:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[0].TenMS">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="fullname" class="form-label">AnhMS:</label>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="sanpham.mausacs[0].AnhMS"> --}}
                                <input type='file' id="ng-model-instant" ngf-select="imageUpload($file,0)"/>
                                {{-- <input type="text" class="form-control" ng-model="sanpham.mausacs[0].AnhMS"> --}}
                                <img ngf-src="files[0]" alt="" style="width: 50px; height:50px;">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="form-label">Gia:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[0].Gia">
                                <span class="form-message"></span>
                            </div>
                        </div>

                        <div class='item' ng-click="getSize(1,sanpham.MaSP)">

                            <div class="form-group">
                                <label for="fullname" class="form-label">TenMS:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[1].TenMS">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="fullname" class="form-label">AnhMS:</label>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="sanpham.mausacs[1].AnhMS"> --}}
                                <input type='file' id="ng-model-instant" ngf-select="imageUpload($file,1)"/>
                                {{-- <input type="text" class="form-control" ng-model="sanpham.mausacs[1].AnhMS"> --}}
                                <img ngf-src="files[1]" alt="" style="width: 50px; height:50px;">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="form-label">Gia:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[1].Gia">
                                <span class="form-message"></span>
                            </div>
                        </div>

                        <div class='item' ng-click="getSize(2,sanpham.MaSP)">
                            <div class="form-group">
                                <label for="fullname" class="form-label">TenMS:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[2].TenMS">
                                <span class="form-message"></span>
                            </div>

                            <form class="form-group" enctype="multipart/form-data" method="POST">
                                <label for="fullname" class="form-label">AnhMS:</label>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="sanpham.mausacs[2].AnhMS"> --}}
                                <input type='file' id="ng-model-instant" ngf-select="imageUpload($file,2)"/>
                                {{-- <input type="text" class="form-control" ng-model="sanpham.mausacs[2].AnhMS"> --}}
                                <img ngf-src="files[2]" alt="" style="width: 50px; height:50px;">
                                <span class="form-message"></span>
                            </form>
                            <div class="form-group">
                                <label for="fullname" class="form-label">Gia:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[2].Gia">
                                <span class="form-message"></span>
                            </div>
                        </div>

                        <div class='item' ng-click="getSize(3,sanpham.MaSP)">

                            <div class="form-group">
                                <label for="fullname" class="form-label">TenMS:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[3].TenMS">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="fullname" class="form-label">AnhMS:</label>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="sanpham.mausacs[3].AnhMS"> --}}
                                <input type='file' id="ng-model-instant" ngf-select="imageUpload($file,3)"/>
                                {{-- <input type="text" class="form-control" ng-model="sanpham.mausacs[3].AnhMS"> --}}
                                <img ngf-src="files[3]" alt="" style="width: 50px; height:50px;">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="form-label">Gia:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[3].Gia">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class='item' ng-click="getSize(4,sanpham.MaSP)">

                            <div class="form-group">
                                <label for="fullname" class="form-label">TenMS:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[4].TenMS">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="fullname" class="form-label">AnhMS:</label>
                                {{-- <input type="text" class="form-control" type = "file" id="" ng-model="sanpham.mausacs[4].AnhMS"> --}}
                                <input type='file' id="ng-model-instant" ngf-select="imageUpload($file,4)"/>
                                {{-- <input type="text" class="form-control" ng-model="sanpham.mausacs[4].AnhMS"> --}}
                                <img ngf-src="files[4]" alt="" style="width: 50px; height:50px;">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="form-label">Gia:</label>
                                <input id="fullname" name="fullname" type="text" placeholder="" class="form-control" ng-model="sanpham.mausacs[4].Gia">
                                <span class="form-message"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div id="addSize">
                        <div ng-repeat="ms in sanpham.mausacs" ng-if="$index == showsizeofcolor" >
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="name">Size:</label>
                                    <button class='btn' id="btnAdd" style="width:50px;color:black;background-color:#ccc;" ng-click='addFormSize($index)'>+</button>
                                </div>
                            </div>
                            <div class="container-fluid" style="width:100%;height:auto;display:flex;flex-wrap: wrap;">
                            <div ng-repeat="size in ms.sizes" class="itemSize" style="width:100%; display:flex;">
                                <div class="form-group" style="flex-grow:1;padding:0px 10px;">
                                        <label for="name">TenSize:</label>
                                        <div>
                                            <input  ng-model="size.TenSize" type="text" class="form-control size_item">
                                        </div>
                                </div>
                                <div class="form-group" style="flex-grow:1;padding:0px 10px;">
                                        <label for="name">SoLuongTonKho:</label>
                                        <div>
                                            <input ng-model="size.SoLuongTonKho" type="text" class="form-control size_item">
                                        </div>
                                </div>
                                <div class="form-group" style="flex-grow:1;padding:0px 10px;">
                                        <label for="name">Xoa:</label>
                                        <div>
                                            <button class='btn' style="width:50px;color:black;background-color:#ccc;" ng-click='deleteSize(ms, $index)'>-</button>
                                        </div>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    
                    <div  id="editSize">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="name">Size:</label>
                            </div>
                        </div>

                        <div class="container-fluid" ng-repeat="size in sizeMtl">
                        

                            <div class="form-group" style="flex-grow:1; padding:0px 10px;">
                                    <label for="name">MaSize:</label>
                                    <div>
                                        <input type="text" class="form-control size_item" ng-model="size.MaSize">
                                    </div>
                            </div>
                            <div class="form-group" style="flex-grow:1;padding:0px 10px;">
                                    <label for="name">TenSize:</label>
                                    <div>
                                        <input type="text" class="form-control size_item" ng-model="size.TenSize">
                                    </div>
                            </div>
                            <div class="form-group" style="flex-grow:1;padding:0px 10px;">
                                <label for="name">SoLuongTonKho:</label>
                                <div>
                                    <input type="text" class="form-control size_item" ng-model="size.SoLuongTonKho">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData(sanpham)">Save</button>
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
    <script src="/JS/ng-file-upload.min.js"></script>
    <!-- <script src="/JS/app.js"></script> -->
    <script src="/JS/sanpham.js"></script>
    <script src="/JS/dirPagination.js"></script>
    <script src="/JS/dir.js"></script>
</div>
<!-- </html> -->
@stop