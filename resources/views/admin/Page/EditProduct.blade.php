@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" id="productEdit">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Product
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      
      <!-- left column -->
      <div class="col-md-12">
        
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="edit-success"></div>
          <form  id="formEdit" >
            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
            <input type="hidden" id="itemID" name="itemID" value="{{$product->itemID}}">
            <input type="hidden" id="ebays_id" name="ebays_id" value="{{$product->ebays_id}}">
            <div class="box-body">
              <div class="col-md-12"> 
                  <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" id="Title" disabled name="title" value="{{$product->title}}" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label>Slug:</label>
                    <input type="text" class="form-control" id="Slug" disabled name="slug" value="{{$product->slug}}" placeholder="Enter Slug">
                  </div>
                  <div class="form-group">
                    <label>Tags:</label>
                    <input type="text" class="form-control" id="Tags" disabled name="tags" value="{{$product->tags}}"  placeholder="Enter Tags">
                  </div>
                  <div class="form-group">
                    <label>Images:</label>
                    <input type="text" class="form-control" id="Images" disabled name="images" value="{{$product->images}}"  placeholder="Enter Images">
                  </div>
                  
                  <div class="form-group">
                    <label>OriginPrice:</label>
                    <input type="text" class="form-control" id="originPrice" disabled  name="originPrice" value="{{$product->originPrice}}"  placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label>Price:</label>
                    <input type="text" class="form-control" id="Price"  name="price" value="{{$product->price}}"  placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label>RatePrice:</label>
                    <input type="number" class="form-control" id="ratePrice"  name="ratePrice" value="{{$product->ratePrice}}"  placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label>Vender:</label>
                    <input type="text" class="form-control" id="Vender" disabled name="vender" value="{{$product->vender}}"  placeholder="Enter Vender">
                  </div>
                  <div class="form-group">
                    <label>Vender_id:</label>
                    <input type="text" class="form-control" id="Vender_id" disabled name="vender_id" value="{{$product->vender_id}}"  placeholder="Enter Vender_id">
                  </div>
                  <div class="form-group">
                    <label>Vender_url:</label>
                    <input type="text" class="form-control" id="Vender_url" disabled name="vender_url" value="{{$product->vender_url}}"  placeholder="Enter Vender_url">
                  </div>
                
              </div>
              
              <div class="col-md-12"> 
                  <div class="form-group">
                    <label>Option1_name:</label>
                    <input type="text" class="form-control" disabled value="{{$product->option1_name}}"  name= "option1_name" id="option1_name" placeholder="Enter Option1_name">
                  </div>
                  <div class="form-group">
                    <label>Option2_name:</label>
                    <input type="text" class="form-control" disabled value="{{$product->option2_name}}"  name="option2_name" id="option2_name" placeholder="Enter Option2_name">
                  </div>
                  <div class="form-group">
                    <label>Option3_name:</label>
                    <input type="text" class="form-control" disabled value="{{$product->option3_name}}"  name="option3_name" id="option3_name" placeholder="Enter Option3_name">
                  </div>
                  <div class="form-group">
                    <label>Category:</label>
                    <input type="text" class="form-control" disabled value="{{$product->category}}"  name="category" id="Category" placeholder="Enter Category">
                  </div>
                  <div class="form-group">
                    <label>Option1_picture:</label>
                    <input type="text" class="form-control" disabled value="{{$product->option1_picture}}"  name="option1_picture" id="option1_picture" placeholder="Enter Option1_picture">
                  </div>
                  <div class="form-group">
                    <label>Delivery_date_min	:</label>
                    <input type="text" class="form-control" disabled value="{{$product->delivery_date_min}}"  name="delivery_date_min" id="Delivery_date_min" placeholder="Enter Delivery_date_min">
                  </div>
                  <div class="form-group">
                    <label>Delivery_date_max:</label>
                    <input type="text" class="form-control" disabled value="{{$product->delivery_date_max}}"  name="delivery_date_max" id="Delivery_date_max" placeholder="Enter Delivery_date_max">
                  </div>
                  
              </div>
              <div class="col-md-12">
                <label>Description:</label>
                <div class="form-group">
                    <textarea id="contentEdit" disabled  name="content" rows="10">
                      {{$product->content}}
                    </textarea>
                    <button id="content-click"></button>
                </div>
              </div>
              <div class="col-md-12">
                <h3>
                  Variants Images:
                </h3>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover" style="overflow: auto;">
                    <thead>
                      
                      <tr>
                        <th>ID</th>
                        <th>Option1</th>
                        <th>Option2</th>
                        <th>Option3</th>
                        <th>Price</th>
                        <th>Images</th>
                        <th>Action</th>
                      </tr>
                     
                    </thead>
                    <tbody  id="Tb_variants" >
                      @php
                          $i =1;
                      @endphp
                      @foreach($variants as $vt)
                      <tr>
                        <td style="display: none">
                           <input type="hidden" id="variants_id" name="variants_id" value="{{$vt->id}}">
                        </td>
                        <td>
                          <input type="text" class="form-control"  value="{{$vt->sku}}" placeholder="Enter Sku" disabled style="border: none; background:none">
                        </td>
                        <td><input type="text" class="form-control"  value="{{$vt['option1']}}" placeholder="Enter option1"></td>
                        <td><input type="text" class="form-control"  value="{{$vt['option2']}}" placeholder="Enter option2"></td>
                        <td><input type="text" class="form-control"  value="{{$vt['option3']}}" placeholder="Enter option3"></td>
                        <td><input type="text" class="form-control" id="variant_price_{{$i}}"  value="{{$vt['price']}}" placeholder="Enter price"></td>
                        <td><input type="text" class="form-control"  value="{{$vt['image_url']}}" placeholder="Enter image_url"></td>
                        <td><a class="btn btn-app" href="{{route('removeVariants',$vt->id) }}">
                          <i class="fa fa-trash-o"></i> Remove
                        </a></td>
                      </tr>
                      @php
                          $i++;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div id="edit-wanning"></div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-button">Edit</button>
            </div>
            
          </form>
          <div class="col-md-12" style="margin-top: 15px;"> 
              <div class="alert alert-success alert-dismissible" id="alert">
                  <h4><i class="icon fa fa-check"></i> Success </h4>
                  Saved successfully !!
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection