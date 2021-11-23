@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" id="productList">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content" id="productList">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box">
            <div class="box-header" >
              <h3 class="box-title">List Product</h3>
            </div>
              <button  class="btn btn-block btn-primary" style="max-width: 100px; float: right;margin-right:10px " onclick="GetLinkProduct(this)" id="getLinkProduct" data-toggle="modal" >Get Link</button>
             <div style="clear: both"></div>
            <div class="product-list-alert" style="margin-top: 10px"></div>
            <!-- /.box-header -->
            <div class="box-body ">
              <div class="table-responsive">
                  <table
                    id="showProduct "
                    class="table table-bordered data-table table-striped""
                    style="width:100%"
                  >
                    <thead>
                      <tr>
                        <th>
                          ID
                          <input type="checkbox" id="checkALl" name="checkALl">
                        </th>
                        <th>Image <br> 
                          <i class="fa fa-fw fa-image"></i></th>
                        <th>
                          <select name="category_filter" id="category_filter" style="padding: 5px">
                            <option value="">Ebay Name</option>
                          @foreach($ebay as $row)
                          <option value="{{ $row->id }}">{{ $row->ebayname }}</option>
                          @endforeach
                          </select>
                        </th>
                        <th>Item</th>
                        <th>Source</th>
                        <th>Source ID</th>
                        <th>Ebay ID</th>
                        <th>Quantity</th>
                        <th>Source Price</th>
                        <th>Target Price</th>
                        <th>$ Profit</th>
                        <th>Publish
                        </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                @include('admin.Page.Modal.ModalRemove')
                @include('admin.Page.Modal.ModalUpdate')
                @include('admin.Page.Modal.ModalUpdateAll')
                {{-- @include('admin.Page.Modal.ModalLink') --}}
            </div>
            
          </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection