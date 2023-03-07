@extends('layout/app')

@section('titulo')

    {{'Página Inicial'}}

@stop

@section('conteudo')

    <!-- insert Modal -->
    <center><div class="modal fade" tabindex="-1" id="completeModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="completename">Name</label>
                <input type="text" class="form-control" id="completename" placeholder="Enter your name">
              </div>
              <div class="form-group">
                  <label for="completemail">Email</label>
                  <input type="text" class="form-control" id="completemail" placeholder="Enter your email">
              </div>
              <div class="form-group">
                  <label for="completemobile">Mobile</label>
                  <input type="text" class="form-control" id="completemobile" placeholder="Enter your number">
              </div>
              <div class="form-group">
                  <label for="completeplace">Place</label>
                  <input type="text" class="form-control" id="completeplace" placeholder="Enter your place">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" id="btnSave_insert" onclick="adduser()">Submit</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div></center>

      <!-- update Modal -->
      <div class="modal fade" tabindex="-1" id="updateModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="updatename">Name</label>
                <input type="text" class="form-control" id="updatename" placeholder="Enter your name">
              </div>
              <div class="form-group">
                  <label for="updatemail">Email</label>
                  <input type="text" class="form-control" id="updatemail" placeholder="Enter your email">
              </div>
              <div class="form-group">
                  <label for="updatemobile">Mobile</label>
                  <input type="text" class="form-control" id="updatemobile" placeholder="Enter your number">
              </div>
              <div class="form-group">
                  <label for="updateplace">Place</label>
                  <input type="text" class="form-control" id="updateplace" placeholder="Enter your place">
              </div>
            </div>
            <div class="modal-footer">
              <button id="btnShow_update" type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <input type="hidden" id="hiddendata">
            </div>
          </div>
        </div>
      </div>

      <div class="container my-3">
        <h3 class="text-center">PHP CRUD oparations using Bootstrap Modal</h3>
        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#completeModal">Add New users</button>
        <div id="displayDataTable">
        </div>
      </div>

@endsection
