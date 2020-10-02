<div class="row" ng-app="app" ng-controller="KriteriaController">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Kriteria</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
            <i class="fa fa-plus"></i> Add
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th width="5%">No</th>
              <th>Kriteria</th>
              <th width="15%"  class="text-center"><i class="fa fa-gear"></i></th>
            </tr>
            <tr ng-repeat="item in datas.kriteria">
              <td>{{$index+1}}</td>
              <td>{{item.kriteria}}</td>
              <td class="text-center">
                <a href="" class="btn btn-info btn-xs" ng-click="edit(item)"><span
                    class="fa fa-pencil"></span> Edit</a>
                <a href=""
                  class="btn btn-danger btn-xs" ng-click="hapus(item)"><span class="fa fa-trash"></span> Delete</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{titledialog}}</h4>
              </div>
              <div class="modal-body">
                <form ng-submit="simpan()">
                  <div class="form-group">
                    <label for="">Kriteria</label>
                    <input type="text" class="form-control" ng-model="model.kriteria" placeholder="Kriteris">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>
