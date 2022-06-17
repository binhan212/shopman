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
  <div ng-controller="dmlcontroller">
  <div style="display:flex; margin:10px;justify-content:space-between;">
        <div style="color:red;">
            <h2>DANH MỤC LỚN</h2>
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
                        <th>MaDM</th>
                        <th>TenDM</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="sp in dml|filter:textSearch|itemsPerPage:10">
                    <td>@{{($index+1)+(pagination.current -1)*10}}</td>
                    <td>@{{sp.MaDM}}</td>
                    <td>@{{sp.TenDM}}</td>
                    <td><button class="btn btn-info" ng-click="showmodal(sp.MaDM)">&nbsp;Edit</button></td>
                    <td><button class="btn btn-danger" ng-click="deleteClick(sp.MaDM)">&nbsp;Delete</button></td>
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
                            <label for="name">MaDM:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="dml.MaDM">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">TenDM:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="dml.TenDM">
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
    <script src="/JS/dml.js">

    </script>
    <script src="/JS/dirPagination.js"></script>
    <script src="/JS/dir.js"></script>
</div>
<!-- </html> -->
@stop