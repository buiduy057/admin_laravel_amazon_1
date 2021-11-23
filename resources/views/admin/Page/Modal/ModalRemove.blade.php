<div id="myModal" class="modal fade">
  <input type="hidden" id="model_id" value="">
  <div class="modal-dialog modal-confirm" style="width:70%"id="product">
    <div class="modal-content" style="text-align: left">
      <div class="modal-header flex-column">
        <h4 class="modal-title w-100">Get Link</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10" >
          </div>
          <div class="col-md-2" >
            <div class="form-group">
              <label>Select Token</label>
              <select class="form-control select-product">
                <option value="-1" data-ebayname ="Add">Add token</option>
                <option disabled>-----------------</option>
                @foreach($ebay as $key => $eb)
                  <option data-ebayname ="{{$eb->ebayname}}" data-default_return_id="{{$eb->default_return_id}}" data-default_payment_id="{{$eb->default_payment_id}}" value="{{$eb->id}}" data-default_shipping_id="{{$eb->default_shipping_id}}"  data-id="{{$eb->id}}" data-percent="{{$eb->default_break}}" data-authToken ="{{$eb->authToken}}"  data-oauthUserToken ="{{$eb->oauthUserToken}}" data-default_payment ="{{$eb->default_payment}}" data-default_shipping ="{{$eb->default_shipping}}" data-default_return ="{{$eb->default_return}}">{{$eb->ebayname}}</option>
                @endforeach
              </select>
            </div>
            </div>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="col-md-10">
                    <div class="form-group">
                      <input type="text" class="form-control" id="Link" disabled name ="link" placeholder="Enter Link">
                      <input type="hidden" id="percent" name="percent" value="">
                      <input type="hidden" id="usereb_id"  value="">  
                    </div>
                  </div>
                  <div class="col-md-2"> 
                    <div class="form-group">
                      <button type="submit" id="btnGetLink" disabled class="btn btn-primary" style="background: #367fa9">Get link</button>
                      
                    </div>
                  </div>
                
                </div>
                <div class="col-md-12" >
                  <input type="hidden" id="authTokenProduct" name="authToken" value="">
                  <input type="hidden" id="oauthUserTokenProduct" name="oauthUserToken" value="">
                  <input type="hidden" id="ebay_id" name="ebay_id" value="">
                  <input type="hidden" id="default_return_id" name="default_return_id" value="">
                  <input type="hidden" id="default_payment_id" name="default_payment_id" value="">
                  <input type="hidden" id="default_shipping_id" name="default_shipping_id" value="">
                  <input type="hidden" id="default_payment" name="default_payment" value="">
                  <input type="hidden" id="default_shipping" name="default_shipping" value="">
                  <input type="hidden" id="default_return" name="default_return" value="">
               </div>
              <!-- /.box-header -->
              <!-- form start -->
              <div class="col-md-12" id="alert_wanning" style="margin-top:15px "> 
                
              </div>
              <div class="col-md-12" id="loadgif" style="margin-top:15px "> 
                 <img src="images/load.gif" alt="load-gif" >
              </div>
             
              <form  id="form" style="display: none" >
                <div class="box-body">
                  <div class="col-md-12"> 
                      <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                      </div>
                      <div class="form-group">
                        <label>Slug:</label>
                        <input type="text" class="form-control" id="Slug" name="slug"  placeholder="Enter Slug">
                      </div>
                      <div class="form-group">
                        <label>Tags:</label>
                        <input type="text" class="form-control" id="Tags" name="tags" placeholder="Enter Tags">
                      </div>
                      <div class="form-group">
                        <label>Quantity:</label>
                        <input type="number" class="form-control" id="Quantity" value="1" max="5" name="quantity" placeholder="Enter quantity">
                      </div>
                      <div class="form-group">
                        <label>Images:</label>
                        <input type="text" class="form-control" id="Imagesct" name="images" placeholder="Enter Images">
                        <input type="hidden" class="form-control" id="Images" name="images" placeholder="Enter Images">
                      </div>
                      <div class="form-group">
                        <label>Price:</label>
                        <input type="text" class="form-control"  id="Price" name="price" placeholder="Enter Price">
                        <input type="hidden" class="form-control" id="originPriceLink" name="originPrice" placeholder="Enter Images">
                      </div>
                      <div class="form-group">
                        <label>Vender:</label>
                        <input type="text" class="form-control" required id="Vender" name="vender" placeholder="Enter Vender">
                      </div>
                      <div class="form-group">
                        <label>Vender_id:</label>
                        <input type="text" class="form-control" required id="Vender_id" name="vender_id" placeholder="Enter Vender_id">
                      </div>
                      <div class="form-group">
                        <label>Vender_url:</label>
                        <input type="text" class="form-control" id="Vender_url" name="vender_url" placeholder="Enter Vender_url">
                      </div>
                    
                  </div>
                  
                  <div class="col-md-12"> 
                      <div class="form-group">
                        <label>Option1_name:</label>
                        <input type="text" class="form-control" name= "option1_name" id="option1_name" placeholder="Enter Option1_name">
                      </div>
                      <div class="form-group">
                        <label>Option2_name:</label>
                        <input type="text" class="form-control" name="option2_name" id="option2_name" placeholder="Enter Option2_name">
                      </div>
                      <div class="form-group">
                        <label>Option3_name:</label>
                        <input type="text" class="form-control" name="option3_name" id="option3_name" placeholder="Enter Option3_name">
                      </div>
                      <div class="form-group">
                        <label>Category:</label>
                        <input type="text" class="form-control" required name="Category" id="Category" placeholder="Enter Category">
                      </div>
                      <div class="form-group">
                        <label>Option1_picture:</label>
                        <input type="text" class="form-control" name="option1_picture" id="option1_picture" placeholder="Enter Option1_picture">
                      </div>
                      <div class="form-group">
                        <label>Delivery_date_min	:</label>
                        <input type="text" class="form-control" name="delivery_date_min" id="Delivery_date_min" placeholder="Enter Delivery_date_min">
                      </div>
                      <div class="form-group">
                        <label>Delivery_date_max:</label>
                        <input type="text" class="form-control" name="delivery_date_max" id="Delivery_date_max" placeholder="Enter Delivery_date_max">
                      </div>
                      
                  </div>
                  <div class="col-md-12">
                    <label>Description:</label>
                    <div class="form-group">
                        <textarea id="content"  name="content" rows="20">
                        </textarea>
                        @include('admin.Page.DescriptionProduct')
                        <div id="content-empty" ></div>
                        <button id="content-click"></button>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h3>
                      Variants Images:
                    </h1>
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-hover" style="overflow: auto;">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Option1</th>
                            <th>Option2</th>
                            <th>Option3</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody  id="Tb_variants">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div id="warning" ></div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-button" id="submit-ebay"  style=" background: #367fa9;">Submit</button>
                  <div id="loadEbay" style= "margin-top:20px"></div>
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
    </div>
  </div>
</div>     