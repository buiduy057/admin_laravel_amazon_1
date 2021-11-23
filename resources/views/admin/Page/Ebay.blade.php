@extends('admin.layouts.index')
  @section('content')
<div class="content-wrapper" id="ebay">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ebay
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ebay</li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="col-md-10" >
  </div>
  <div class="col-md-2" >
    <div class="form-group">
      <label>Select Ebay</label>
      <select class="form-control select-ebay" id="select-ebay">
        <option value="-1" data-ebayname ="New">add new</option>
        <option disabled>---------------------------</option>
        @foreach($ebay as $key => $eb)
          <option data-ebayname ="{{$eb->ebayname}}" value="{{$eb->id}}" data-id="{{$eb->id}}"  data-selling_paypal ="{{$eb->selling_paypal}}"  data-authToken ="{{$eb->authToken}}" data-ruName ="{{$eb->ruName}}" data-devId ="{{$eb->devId}}" data-appId ="{{$eb->appId}}" data-certId ="{{$eb->certId}}"  data-oauthUserToken ="{{$eb->oauthUserToken}}"  data-default_break ="{{$eb->default_break}}"  data-default_payment ="{{$eb->default_payment}}"  data-default_shipping ="{{$eb->default_shipping}}"  data-default_return ="{{$eb->default_return}}"  data-default_return_id ="{{$eb->default_return_id}}"  data-default_payment_id ="{{$eb->default_payment_id}}"  data-default_shipping_id ="{{$eb->default_shipping_id}}"  >{{$eb->ebayname}}</option>
        @endforeach
      </select>
    </div>
    </div>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12" style="margin-top: 15px">
        <!-- Custom Tabs -->
        <input type="hidden" id="ebay_id" name="ebay_id" value="">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
            <li><a href="#tab_11" data-toggle="tab">Lister</a></li>
            <li><a href="#tab_2" data-toggle="tab">Dashboard</a></li>
            <li><a href="#tab_3" data-toggle="tab">Templates</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <h1>
                Account Details
              </h1>
           
              <div class="row">
                <div class="">
                <form action="" id="general" style="margin-top: 20px">
                  <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                  <div class="col-md-12" >
                    <div class="alert alert-success alert-dismissible" style="display: none">
                      <h4><i class="icon fa fa-check"></i> Success!</h4>
                         More success !!
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ebayname">Ebay Name:</label>
                      <input type="text" class="form-control" name="ebayname" autocomplete="off"  id="ebayname" placeholder="Enter Ebay Name" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="selling_paypal">Selling Paypal Account:</label>
                      <input type="email" class="form-control" name="selling_paypal" autocomplete="off" id="selling_paypal" placeholder="Enter Selling Paypal " >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >RuName:</label>
                      <input type="text" class="form-control" name="ruName" autocomplete="off"  id="ruName" placeholder="Enter RuName" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >DevId:</label>
                      <input type="text" class="form-control" name="devId" autocomplete="off"  id="devId" placeholder="Enter DevId" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >AppId:</label>
                      <input type="text" class="form-control" name="appId" autocomplete="off"  id="appId" placeholder="Enter AppId" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >CertId:</label>
                      <input type="text" class="form-control" name="certId" autocomplete="off"  id="certId" placeholder="Enter CertId" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >AuthToken:</label>
                      <textarea class="form-control" rows="5" required name="authToken" id="authToken" placeholder="Enter authToken" autocomplete="off" style="resize: none"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >OauthUserToken:</label>
                      <textarea class="form-control" autocomplete="off" rows="5" required name="oauthUserToken" id="oauthUserToken" placeholder="Enter OauthUserToken" style="resize: none"></textarea>
                    </div>
                  </div>
             
                  <div class="col-md-12 " style="text-align: center;margin-top:20px;margin-bottom: 20px;"> 
                    <button type="submit" class="btn btn-primary btn-button submit-ebay ">Add</button>
                    <div id="loadEbay" style= "margin-top:20px"></div>
                  </div>
                 
                </form>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="tab_11">
              <h1>
                Rapid Lister Settings
              </h1>
              <div class="col-md-10" >
              </div>
              <div class="col-md-2" >
                <button type="submit" class="btn btn-primary " id="get-policy" disabled>Get Policy</button>
              </div>
            
              <div class="row">
                <div class="">
                <form action="" id="lister" style="margin-top: 20px">
                   <div id="lister_payment__id">
                   </div>
                   <div id="lister_return_id">
                  </div>
                  <div id="lister_shipping_id">
                  </div>
                  <div class="col-md-12" >
                    <br>
                    <div class="alert alert-success alert-dismissible" style="display: none">
                         More success !!
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Default Break-Even %</label>
                      <input type="number" class="form-control"  name="default_break" autocomplete="off"  id="default_break" placeholder="Enter Default Break-Even" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Default Payment Policy:</label>
                      <select class="form-control"   name="default_payment" autocomplete="off" id="default_payment">
                        <option value="">--- Select ----</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Default Shipping Policy:</label>
                      <select class="form-control"   name="default_shipping" id="default_shipping">
                        <option value="">--- Select ----</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Default Return Policy:</label>
                      <select class="form-control"  name="default_return" id="default_return">
                          <option value="">--- Select ----</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 " style="text-align: center;margin-top:20px;margin-bottom: 20px;"> 
                    <button type="submit" class="btn btn-primary btn-button" id="submit-policy" disabled>Add</button>
                    <div id="loadEbay" style= "margin-top:20px"></div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <h1>
                Dashboard Alerts
              </h1>
              <div class="row">
                <div class="">
                <form  id="dashboard" style="margin-top: 20px" >
                  
                  <div class="col-md-12" >
                    <div class="alert alert-success alert-dismissible" style="display: none">
                      <h4><i class="icon fa fa-check"></i> Success!</h4>
                         More success !!
                    </div>
                  </div>
                  
                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on items out of stock more than</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="stock" id="stock" value="3">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >days</label>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on items last sold more than</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="sold" id="sold"  value="30">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >days ago</label>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on items with no sales more than</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="sales" id="sales"  value="30">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >views</label>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on listings with less than</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="listings" id="listings"  value="10">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >days live</label>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on views for listings already</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="views" id="views"  value="7">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >days ago</label>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label >Alert on missing tracking numbers for sold items older than</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="numbers" id="numbers"  value="3">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >days</label>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: center ;margin-top:20px;margin-bottom: 20px;"> <button type="submit" class="btn btn-primary btn-button " id="btn-dashboard"  disabled>Add</button></div>
                  <div id="loadEbay" style= "margin-top:20px"></div>
                </form>
              </div>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
              <h1>
                Business Policies Templates
              </h1>
              <div class="row">
                <div class="">
                <form action="" id="template" >
                  <div class="col-md-12">
                    <button type="button" class="btn bg-navy margin">Amazon.com</button>
                    <button type="button" class="btn bg-navy margin">Aliexpress.com</button>
                  </div>
                  <div class="col-md-12" >
                    <div class="alert alert-success" style="display: none">
                       More success !!
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="user_id_2" value="{{$users->id}}" name="user_id">
                  </div>
                  <div class="col-md-12">
                    <h3>
                      Shipping Policy Template:
                    </h3>
                    <textarea id="shipping_policy"  style="resize: none;" class="form-control" name="shipping policy" rows="10">
                      <p><strong>Items located in our US warehouse</strong> will be Shipped FREE to all addresses other than APO/PO boxes in the lower 48 states via USPS or UPS (depending on location and package weight) Unless stated otherwise, all orders will ship within 24 hours of your payment being processed.<br></p>
                      <p><strong>Items located in our China warehouse</strong>  will be shipped out by Air Mail to your PayPal Address within 1-3 business days after receiving your cleared payment (estimated delivery time 10-25 business days, this all depends on how busy the postal system is & by varying countries inbound customs delays). <br>
                        We offer free shipping worldwide (some countries are excluded).<br></p>
                      <p><strong>Please note that delivery time for some countries might take longer than 30 business days.</strong> </p>
                      <p>Tracking number will be provided once available from our shipping partner. Please contact us if you don't receive your item by 30 business days, we will check the status and try our best to resolve any problems for you.
                      </p>
                      <p><strong>Please note that import duties, taxes and charges are not included in the item price or shipping charges. These charges are the buyer's responsibility.
                      </strong> <br>Check with your country's customs office to determine what these additional costs will be prior to bidding/buying, Thank you.
                      </p>
                    </textarea>
                  </div>
                  <div class="col-md-12">
                    <h3>
                      Payment Policy Template:
                    </h3>
                    <textarea id="payment_policy" style="resize: none;" class="form-control"  name="payment policy" rows="10">
                      <p>We accept payments through PayPal, contact us to check the availability of other payment methods
                      </p>
                    </textarea>
                  </div>
                  <div class="col-md-12">
                    <h3>
                      Return Policy Template:
                    </h3>
                    <textarea id="return_policy" style="resize: none;" class="form-control"  name="return policy" rows="10">
                      <p>Return shipping is the buyer's responsibility unless the return is a result of our mistake. We will pay for shipping replacement back to you if an exchange is requested
                       </p>
                    </textarea>
                  </div>
                  <div class="col-md-12" style="text-align: center;margin-top:20px;margin-bottom: 20px;"> <button type="submit" class="btn btn-primary btn-button"  disabled id="btn-template">Add</button>
                    <div id="loadEbay" style= "margin-top:20px"></div>
                  </div>
                </form>
              </div>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
    </div>
  </section>
  </div>
@endsection
{{-- @include('admin.Page.script') --}}