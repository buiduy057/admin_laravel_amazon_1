<div id="updateModal" class="modal fade">
  <input type="hidden" id="product_id" value="">
  <input type="hidden" id="ebays_id" value="">
  <input type="hidden" id="itemID" value="">
  <input type="hidden" class="form-control" id="sku"   name="sku" value="" >
  <div class="modal-dialog modal-confirm" >
    <div class="modal-content" style="text-align: left">
      <form  id="formEdit" >
        <div class="modal-header flex-column">
          <div class="icon-box" style="border:3px solid #367fa9">
            <i class="fa fa-fw fa-download" style="color: #367fa9" ></i>
          </div>				
          <h4 class="modal-title w-100" style="margin: 10px 0 -10px;">Update Item</h4>	
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="box box-primary direct-chat direct-chat-primary" style="margin-top: 10px">
          <div class="box-header with-border">
                <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="display: block;">
            <div class="row" style="margin-top: 10px ;padding: 0 15px;">
              <!-- left column -->
              <input type="hidden" class="form-control" id="title"   name="title" value="" >
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle1"> Show Price :</label>
                  
                  <input type="checkbox" id="checkboxprice" checked  style="margin-left:5px" > 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle1"> Show Quantity :</label>
                  <input type="checkbox" id="checkboxquantity" checked  style="margin-left:5px"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Price:</label>
                  <input type="number" class="form-control" id="price" disabled   name="price" value="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>OriginPrice:</label>
                  <input type="number" class="form-control" id="originPrice" disabled   name="originPrice" value="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Rate Price:</label>
                  <input type="number" class="form-control" id="ratePrice"   name="ratePrice" value="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Quantity:</label>
                  <input type="number" class="form-control" min="0" max="5" id="quantity"   name="ratePrice" value="" >
                </div>
              </div>
              </div>
             
              <h3 style="text-align: left ; margin-bottom:20px; display:none"  >
                Variants:
              </h3>
              <div class="box-body" style="padding:0px">
                <table id="example2" class="table table-bordered table-hover" style="overflow: auto;display:none">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Images</th>
                    </tr>
                  
                  </thead>
                  <tbody  id="Update_variants" >
                    
                  </tbody>
                </table>
              </div>
            </div>
            
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="update-submit" style=" background: #367fa9;">Update</button>
          <div id="edit-wanning" style="margin-top: 10px"></div>
          <div id="updateEbay" style= "margin-top:20px"></div>
        </div>
      </form>
      </div>
    </div>
</div>


