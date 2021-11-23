<div id="updateModalAll" class="modal fade">
  <form  id="formEditAll" >
  <input type="hidden" id="product_id" value="">
 
  <input type="hidden" class="form-control" id="sku"   name="sku" value="" >
  <div class="modal-dialog modal-confirm" >
    <div class="modal-content">
        <div class="modal-header flex-column">
          <div class="icon-box" style="border:3px solid #367fa9">
            <i class="fa fa-fw fa-download" style="color: #367fa9" ></i>
          </div>						
          <h4 class="modal-title w-100" style="margin: 10px 0 -10px;">Update All Item Ebay</h4>	
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
       
        <div class="modal-body" style="text-align: left;margin-top: 30px;">
          <div class="box box-primary direct-chat direct-chat-primary" >
            <div class="box-body" style="display: block; padding: 10px;">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="vehicle1"> Show Price :</label> 
                      <input type="checkbox" id="checkboxpriceAll" checked  style="margin-left:5px" > 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" >
                      <label for="vehicle1"> Show Quantity :</label> 
                      <input type="checkbox" id="checkboxquantityAll" checked  style="margin-left:5px"> 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate Price:</label>
                      <input type="number" class="form-control" max="5" id="ratePriceAll" value="0"   name="ratePrice" value="" >
                    </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Quantity:</label>
                      <input type="number" class="form-control"  id="quantityAll"  value="1" >
                    </div>
                  </div>
               </div>
          </div>
        </div>
        </div>
        <div class="modal-body" style="text-align: left">
          <div class="row"  id="contentUpdate" >
            <!-- left column -->

            
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="update-submit-all" style=" background: #367fa9;" >Update</button>
            <div id="edit-wanning-all" style="margin-top: 10px"></div>
            <div id="updateEbay" style= "margin-top:20px"></div>
          </div>
      </div>
    </div>
  </form>
</div>