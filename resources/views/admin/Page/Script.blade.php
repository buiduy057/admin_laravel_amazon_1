<script>
  $('#zone').timezones();
  function ChangePrice(e){
     const price = $(e).val();
     const originPrice = $('#originPrice').val();
     const ratePrice = Math.floor(((Number(price) - Number(originPrice))*100)/ Number(originPrice));
     $('#ratePrice').val(ratePrice);
     let i = 1;
     const variant = $('#Update_variants tr').each(function (_, item) {
      const priceTD = $(item).find(`#variant_origin_${i}`).val();
      const priceVariant = parseFloat(Number(priceTD) + Number(priceTD*ratePrice)/100).toFixed(2);
      $(`#variant_price_${i}`).val(priceVariant);
      i++;
    });
  }
  function ChangeQuantity(e){
    const quantity = $(e).val();
    let i = 1;
     const variant = $('#Update_variants tr').each(function (_, item) {
      $(`#quantity_${i}`).val(quantity);
      i++;
    });
  }
  function RatePrice(e){
    const ratePrice = $(e).val();
    const originPrice = $('#originPrice').val();
    const price = parseFloat(Number(originPrice) + Number(originPrice*ratePrice) / 100).toFixed(2);
    let i = 1;
    const variant = $('#Update_variants tr').each(function (_, item) {
      const priceTD = $(item).find(`#variant_price_${i}`).val();
      const priceVariant = parseFloat(Number(originPrice) + Number(originPrice*ratePrice)/100).toFixed(2);
      $(`#variant_price_${i}`).val(priceVariant);
      i++;
    });
    $('#price').val(price);
  }
  function ChangePriceAllVar(ratePrice,variants){
    let i = 1;
    const variant = $(`#${variants} tr`).each(function (_, item) {
    const priceTD = $(item).find(`#variant_origin_${i}`).val();
    const priceVariant = parseFloat(Number(priceTD) + Number(priceTD*ratePrice)/100).toFixed(2);
    $(`#variant_price_${i}`).val(priceVariant);
    i++;
    });
  }
  function ChangePriceAllVarRemove(priceVar,priceoriginVar,variants){
    const origin = $(`#${priceoriginVar}`).val();
    $(`#${priceVar}`).val(origin);
    ChangePriceAllVar(ratePrice=0,variants);
  }
  function getLinkModalProduct(ele){
    $('#getLinkModal').modal('show');
  }
  $(`#ratePriceAll`).on('input', function() { 
    const ratePriceAll = $(this).val(); 
    $('#contentUpdate').each(function (_, item) {
        const Item = $(item).children();
        $(Item).each(function (_, itemD) {
            const ItemD = $(itemD).attr('id');
            const originPrice = $(`#originPrice_${ItemD}`).val(); 
            const price = parseFloat(Number(originPrice) + Number(originPrice*ratePriceAll) / 100).toFixed(2);
            $(`#price_${ItemD}`).val(price);
            const id_varr= `Update_variants_all_${ItemD}`;
            let i =1;
            $(`#${id_varr} tr`).each(function (_, itemVar) {
              const priceTD = $(itemVar).find(`#variant_origin_${ItemD}_${i}`).val();
              const priceVariant = parseFloat(Number(priceTD) + Number(priceTD*ratePriceAll)/100).toFixed(2);
              $(`#variant_price_${ItemD}_${i}`).val(priceVariant);
              i++;
            });
        });
    });
  });
  $(`#quantityAll`).on('input', function() { 
    const quantityAll = $(this).val();
    $('#contentUpdate').each(function (_, item) {
        const Item = $(item).children();
        $(Item).each(function (_, itemD) {
            const ItemD = $(itemD).attr('id');
            $(`#quantity_${ItemD}`).val(quantityAll);
            const id_varr= `Update_variants_all_${ItemD}`;
            let i =1;
            $(`#${id_varr} tr`).each(function (_, itemVar) {
              $(`#quantity_${ItemD}_${i}`).val(quantityAll);
              i++;
            });
        });
    });
  });
  $(`#checkboxquantityAll`).click(function (event) {
      if (this.checked) {
        document.getElementById(`quantityAll`).disabled = false;
        const quantityAll = $('#quantityAll').val();
        $('#contentUpdate').each(function (_, item) {
            const Item = $(item).children();
            $(Item).each(function (_, itemD) {
                const ItemD = $(itemD).attr('id');
                $(`#quantity_${ItemD}`).val(quantityAll);
                const id_varr= `Update_variants_all_${ItemD}`;
                let i =1;
                $(`#${id_varr} tr`).each(function (_, itemVar) {
                  $(`#quantity_${ItemD}_${i}`).val(quantityAll);
                  i++;
                });
            });
        });
      } else {
        document.getElementById(`quantityAll`).disabled = true;
         const quantityAll = 1;
        $('#contentUpdate').each(function (_, item) {
            const Item = $(item).children();
            $(Item).each(function (_, itemD) {
                const ItemD = $(itemD).attr('id');
                $(`#quantity_${ItemD}`).val(quantityAll);
                const id_varr= `Update_variants_all_${ItemD}`;
                let i =1;
                $(`#${id_varr} tr`).each(function (_, itemVar) {
                  $(`#quantity_${ItemD}_${i}`).val(quantityAll);
                  i++;
                });
            });
        });
      }
    });
  $(`#checkboxpriceAll`).click(function (event) {
      if (this.checked) {
        document.getElementById(`ratePriceAll`).disabled  = false;
        const ratePriceAll = $('#ratePriceAll').val();
        $('#contentUpdate').each(function (_, item) {
          const Item = $(item).children();
          $(Item).each(function (_, itemD) {
              const ItemD = $(itemD).attr('id');
              const originPrice = $(`#originPrice_${ItemD}`).val(); 
              const price = parseFloat(Number(originPrice) + Number(originPrice*ratePriceAll) / 100).toFixed(2);
              $(`#price_${ItemD}`).val(price);
              const id_varr= `Update_variants_all_${ItemD}`;
              let i =1;
              $(`#${id_varr} tr`).each(function (_, itemVar) {
                const priceTD = $(itemVar).find(`#variant_origin_${ItemD}_${i}`).val();
                const priceVariant = parseFloat(Number(priceTD) + Number(priceTD*ratePriceAll)/100).toFixed(2);
                $(`#variant_price_${ItemD}_${i}`).val(priceVariant);
                i++;
              });
          });
        });
      } else {
        const ratePriceAll = 0;
        document.getElementById(`ratePriceAll`).disabled  = true;
        $('#contentUpdate').each(function (_, item) {
          const Item = $(item).children();
          $(Item).each(function (_, itemD) {
              const ItemD = $(itemD).attr('id');
              const originPrice = $(`#originPrice_${ItemD}`).val(); 
              const price = parseFloat(Number(originPrice) + Number(originPrice*ratePriceAll) / 100).toFixed(2);
              $(`#price_${ItemD}`).val(price);
              const id_varr= `Update_variants_all_${ItemD}`;
              let i =1;
              $(`#${id_varr} tr`).each(function (_, itemVar) {
                const priceTD = $(itemVar).find(`#variant_origin_${ItemD}_${i}`).val();
                const priceVariant = parseFloat(Number(priceTD) + Number(priceTD*ratePriceAll)/100).toFixed(2);
                $(`#variant_price_${ItemD}_${i}`).val(priceVariant);
                i++;
              });
          });
        });
      }
    });
  function RemoveProduct(ele){
    if(document.querySelectorAll('.case:checked').length >1){
        $('[name=case]:checked').each(function () {
          let id = $(this).attr('data-id');
          let itemID = $(this).attr('data-itemid');
          let ebays_id = $(this).attr('data-ebays_id');
          let ruName = $(this).attr('data-runame');
          let appId = $(this).attr('data-appid');
          let devId = $(this).attr('data-devid');
          let certId = $(this).attr('data-certid');
          $.ajax({
          url: "removeProduct/"+id,
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            id : id,
            itemID : itemID,
            ebays_id:ebays_id,
          },
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            console.log(data);
            var event = new CustomEvent("RemoveItem", { detail: { content: data } });
            window.dispatchEvent(event);
            window.addEventListener(
              "databaseRemoveItem",
              async function (evt) {
                const {  update } = evt.detail;
                if(update.Ack.text === "Failure" || update.Ack.text === "Warning"){

                  $(window).scrollTop(0);
                        $('.product-list-alert').append(`
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            ${update.Errors.LongMessage.text}
                        </div>
                        `);
                 
                }else {
                  $.ajax({
                    url: "destroyEbayRequest/"+id,
                    type: 'POST',
                    data: {
                      _token: "{{ csrf_token() }}",
                      id : id,
                      itemID : itemID,
                    },
                    error: function() {
                      alert("lỗi");
                    },
                    success: function(data) {
                        table.draw();
                        $(window).scrollTop(0);
                        $('.product-list-alert').append(`
                              <div class="alert alert-success alert-dismissible alert-product-list" >
                                  <h4><i class="icon fa fa-check"></i> Success </h4>
                                  ID  ${itemID} <br>
                                  Deleted successfully
                                </div>
                        `);
                        setTimeout(function(){
                            $(".product-list-alert .alert").remove();
                        }, 4000);
                      }
                    });
                }
              },
              false
            );
            }
           }); 
        });
    }else {
      let id = $(ele).attr('data-id');
      let ebays_id = $(ele).attr('data-ebays_id');
      let itemID = $(ele).attr('data-itemID');
      let ruName = $(ele).attr('data-runame');
      let devId = $(ele).attr('data-devid');
      let appId = $(ele).attr('data-appid');
      let certId = $(ele).attr('data-certid');
      $.ajax({
          url: "removeProduct/"+id,
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            id : id,
            itemID : itemID,
            ebays_id:ebays_id,
          },
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            var event = new CustomEvent("RemoveItem", { detail: { content: data } });
            window.dispatchEvent(event);
            window.addEventListener(
              "databaseRemoveItem",
              async function (evt) {
                const {  update } = evt.detail;
                if(update.Ack.text === "Failure" || update.Ack.text === "Warning"){
                  $(window).scrollTop(0);
                        $('.product-list-alert').append(`
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            ${update.Errors.LongMessage.text}
                        </div>
                        `);
                }else {
                
                    
                        $.ajax({
                        url: "destroyEbayRequest/"+id,
                        type: 'POST',
                        data: {
                          _token: "{{ csrf_token() }}",
                          id : id,
                          itemID : itemID,
                        },
                        error: function() {
                          alert("lỗi");
                        },
                        success: function(data) {
                            table.draw();
                            $(window).scrollTop(0);
                            $('.product-list-alert').append(`
                                  <div class="alert alert-success alert-dismissible alert-product-list" >
                                      <h4><i class="icon fa fa-check"></i> Success </h4>
                                      ID  ${itemID} <br>
                                      Deleted successfully
                                    </div>
                            `);
                            setTimeout(function(){
                                $(".product-list-alert .alert").remove();
                            }, 4000);
                          }
                        });
                  
                }
              },
              false
            );
            }
           }); 
    }
  }
  function updateModalProduct(ele){
    if(document.querySelectorAll('.case:checked').length >1){
        $('[name=case]:checked').each(function () {
            let title = $(this).attr('data-title');
            let id = $(this).attr('data-id');
            let titleSlice = $(this).attr('data-title').slice(0,35);
            let sku = $(this).attr('data-sku');
            let itemID = $(this).attr('data-itemid');
            let ebays_id = $(this).attr('data-ebays_id');
            let price = $(this).attr('data-price');
            let originprice = $(this).attr('data-originprice');
            let rateprice = $(this).attr('data-rateprice');
            let quantity = $(this).attr('data-quantity');
            $('#updateModalAll').modal('show');
            $.ajax({
            url: "variants/"+id,
            type: 'GET',
            data :{
              sku:sku,
            },
            error: function() {
              alert("lỗi");
            },
            success: function(data) {
              if(data.success){
                let i =0;
                $('#contentUpdate').append(`
                  <div class="box box-primary direct-chat direct-chat-primary" id="${data.sku}" style="display: none;">
                  <input type="hidden" id="ebays_id_${data.sku}" name="ebays_id" value="${ebays_id}">
                  <input type="hidden" id="itemID_${data.sku}" name="itemID" value="${itemID}">
                  <input type="hidden" id="id_${data.sku}" value="${id}">
                  <!-- /.box-header -->
                  <div class="box-body" >
                    <div class="row" style="margin-top:10px ;padding: 0 15px">
                      <input type="hidden" class="form-control"  name="price" value="${title}" > 
                      <input type="hidden" class="form-control" id="title_${data.sku}"  value="${title}" > 
                      <input type="hidden" class="form-control" id="originPrice_${data.sku}"  disabled   name="originPrice" value="${originprice}" >
                      <input type="hidden" class="form-control" id="price_${data.sku}"  name="price" value="${price}" >
                      <input type="hidden" class="form-control"  id="quantity_${data.sku}"  value="${quantity}" >
                  </div>
                  <div class="box-body" style="padding:0px" style="">
                    <table class="table table-bordered table-hover" style="overflow: auto; display:none">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Images</th>
                        </tr>
                      </thead>
                      <tbody  id="Update_variants_all_${sku}" >
                        
                      </tbody>
                    </table>
                  </div>
                    </div>
                  </div>
                </div>
                `);
               
                for (const element of data.message) {
                  i++;
                  $(`#Update_variants_all_${data.sku}`).append(`
                    <tr >
                        <td style="display: none">
                                  <input type="hidden"  name="variants_id" value="${element.id}">
                                </td>
                          <td>
                          <input type="text" class="form-control"  value="${element.sku}" placeholder="Enter Sku" disabled style="border: none; background:none">
                        </td>
                        <td><input type="text" class="form-control" id="variant_price_${data.sku}_${i}"  value="${element.price}">
                          <input type="hidden" class="form-control" id="variant_origin_${data.sku}_${i}"  value="${element.originPrice}">
                        </td>
                        <td><input type="text" class="form-control" id="quantity_${data.sku}_${i}"  value="${element.quantity}"></td>
                        <td><img src="${element.image_url}" width="30px"></td>
                    </tr>
                `);
                }
              const originPrice = `originPrice_${data.sku}`;
              const variants = `Update_variants_all_${data.sku}`;
              // $(`#ratePrice_${data.sku}`).on('input', function() { 
              //     const rateprice = $(this).val(); 
              //     const price = `price_${data.sku}`;
              //     RatePriceAll(rateprice,price,originPrice,variants);
              // });
              // $(`#price_${data.sku}`).on('input', function() { 
              //   const price = $(this).val(); 
              //   const rateprice = `ratePrice_${data.sku}`;
              //   ChangePriceAll(rateprice,price,originPrice,variants);
              // });
              const variants_tr = `#Update_variants_all_${data.sku} tr`;
              const priceVar = `price_${data.sku}`;
              const priceoriginVar = `originPrice_${data.sku}`;
              const ratepriceVar = `ratePrice_${data.sku}`;
              const quantityVar = `quantity_${data.sku}`;
              // ChangeVariants(variants_tr,priceVar,ratepriceVar,priceoriginVar,variants);
              const checkboxprice = `checkboxprice_${data.sku}`;
              const checkboxquantity = `checkboxquantity_${data.sku}`;
              // $(`#${checkboxprice}`).click(function (event) {
              //   if (this.checked) {
              //     document.getElementById(`${ratepriceVar}`).disabled  = false;
              //     const ratepriceCheck = $(`#${ratepriceVar}`).val();
              //     RatePriceAll(ratepriceCheck,priceVar,priceoriginVar,variants);
              //   } else {
              //     document.getElementById(`${ratepriceVar}`).disabled  = true;
              //     ChangePriceAllVarRemove(priceVar,priceoriginVar,variants);
              //   }
              // });
              // $(`#${checkboxquantity}`).click(function (event) {
              //   if (this.checked) {
              //     document.getElementById(`${quantityVar}`).disabled = false;
              //   } else {
              //     document.getElementById(`${quantityVar}`).disabled = true;
              //   }
              // });
            }
          }
        }); 
      });
    }else{
        $('#updateModal').modal('show');
        let id = $(ele).attr('data-id');
        let title = $(ele).attr('data-title');
        let ebays_id = $(ele).attr('data-ebays_id');
        let itemID = $(ele).attr('data-itemID');
        let price = $(ele).attr('data-price');
        let sku = $(ele).attr('data-sku');
        let originPrice = $(ele).attr('data-originPrice');
        let quantity = $(ele).attr('data-quantity');
        let ratePrice = $(ele).attr('data-ratePrice');
        $('#product_id').val(id);
        $('#ebays_id').val(ebays_id);
        $('#itemID').val(itemID);
        $('#title').val(title);
        const titleN = title.slice(0,35);
        $('#updateModal .box-title').text(titleN);
        $('#price').val(price);
        $('#sku').val(sku);
        $('#quantity').val(quantity);
        $('#originPrice').val(originPrice);
        $('#ratePrice').val(ratePrice);
        $.ajax({
          url: "variants/"+id,
          type: 'GET',
          data: {
            title : title,
            sku :sku,
            originPrice:originPrice,
            ratePrice: ratePrice,
          },
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            if(data.success){
              let i =0;
              for (const element of data.message) {
                i++;
                $('#Update_variants').append(`
                  <tr>
                      <td style="display: none">
                                <input type="hidden"  name="variants_id" value="${element.id}">
                              </td>
                        <td>
                        <input type="text" class="form-control"  value="${element.sku}" placeholder="Enter Sku" disabled style="border: none; background:none">
                      </td>
                      <td><input type="text" class="form-control" id="variant_price_${i}"  value="${element.price}">
                        <input type="hidden" class="form-control" id="variant_origin_${i}"  value="${element.originPrice}">
                      </td>
                      <td><input type="text" class="form-control" id="quantity_${i}"  value="${element.quantity}"></td>
                      <td><img src="${element.image_url}" width="30px"></td>
                  </tr>
              `);
              }
              $('#ratePrice').on('input', function() { 
                  RatePrice(this);
              });
              $('#price').on('input', function() { 
                  ChangePrice(this);
              });
              $('#quantity').on('input', function() { 
                 ChangeQuantity(this);
              });
              const Price = $('#price').val();
              const originPrice = $('#originPrice').val();
              const ratePrice = $('#ratePrice').val();
              const variants_tr = $('#Update_variants tr');
              const variants = 'Update_variants';
              ChangeVarrItem(Price,originPrice,ratePrice,variants_tr,variants);
              const checkboxprice = `checkboxprice`;
              const checkboxquantity = `checkboxquantity`;
              const priceVar = 'price';
              const priceoriginVar = 'originPrice';
              const quantityVar = 'quantity';
              $(`#${checkboxprice}`).click(function (event) {
                if (this.checked) {
                  document.getElementById('ratePrice').disabled  = false;
                  RatePriceAll(ratePrice,priceVar,priceoriginVar,variants);
                } else {
                  document.getElementById('ratePrice').disabled  = true;
                  ChangePriceAllVarRemove(priceVar,priceoriginVar,variants);
                }
              });
              $(`#${checkboxquantity}`).click(function (event) {
                if (this.checked) {
                  document.getElementById(`${quantityVar}`).disabled = false;
                } else {
                  document.getElementById(`${quantityVar}`).disabled = true;
                }
              });
            }
          }
        }); 
    }
   
  }
  
  function ChangeVarrItem(Price,originPrice,ratePrice,variants_tr,variants){
    let k = 0;  
    $(variants_tr).each(function (_, item) {
        k++;
        const origin = $(`#variant_origin_${k}`).val();
        $(`#variant_price_${k}`).change(function(){
          const priceVarr = $(this).val();
          const ratePrice = Math.floor(((Number(priceVarr) - Number(origin))*100)/ Number(origin));
          const rateprice = $(`#ratePrice`).val(ratePrice);
          const priceN = parseFloat(Number(originPrice) + Number(originPrice*ratePrice) / 100).toFixed(2);
          const price = $(`#price`).val(priceN);
          ChangePriceAllVar(ratePrice,variants);
        });
    });
  }
  function ChangeVariants(variants_tr,priceVar,ratepriceVar,priceoriginVar,variants){
    let k = 0;  
    $(variants_tr).each(function (_, item) {
        k++;
        const origin = $(`#variant_origin_${k}`).val();
        const priceorigin = $(`#${priceoriginVar}`).val();
        $(`#variant_price_${k}`).change(function(){
          const priceVarr = $(this).val();
          const ratePrice = Math.floor(((Number(priceVarr) - Number(origin))*100)/ Number(origin));
          $(`#${ratepriceVar}`).val(ratePrice);
          const rateprice = $(`#${ratepriceVar}`).val(ratePrice);
          const priceN = parseFloat(Number(priceorigin) + Number(priceorigin*ratePrice) / 100).toFixed(2);
          const price = $(`#${priceVar}`).val(priceN);
          ChangePriceAllVar(ratePrice,variants);
        });
    });
  }
  $('#updateModal .close').on('click', function () {
    $('#Update_variants tr').remove();
  });
  $('#updateModal .cancel').on('click', function () {
    $('#Update_variants tr').remove();
  });
  $('#updateModalAll .close').on('click', function () {
    $('#contentUpdate .direct-chat').remove();
    $('#quantityAll').val(1);
    $('#ratePriceAll').val(0);
  });
  $('#updateModalAll .cancel').on('click', function () {
    $('#contentUpdate .direct-chat').remove();
    $('#quantityAll').val(1);
    $('#ratePriceAll').val(0);
  });
  $('#checkALl').change(function() {
     $(".case").prop("checked", this.checked);       
  });
  $('form#formEditAll').submit(function(e) {
     e.preventDefault();
     document.getElementById('update-submit-all').disabled = true;
      $('#contentUpdate').each(function (_, item) {
        const Item = $(item).children();
        $(Item).each(function (_, itemD) {
          const ItemD = $(itemD).attr('id');
          const id = $(`#id_${ItemD}`).val(); 
          const idItem = $(`#itemID_${ItemD}`).val(); 
          const ebays_id = $(`#ebays_id_${ItemD}`).val(); 
          const itemID = $(`#itemID_${ItemD}`).val(); 
          const title = $(`#title_${ItemD}`).val(); 
          const price = $(`#price_${ItemD}`).val(); 
          const originPrice = $(`#originPrice_${ItemD}`).val(); 
          let ratePriceAll;
          if($(`#ratePriceAll`).is(':disabled')){
            ratePriceAll = '0';
          }else {
            ratePriceAll = $(`#ratePriceAll`).val(); 
          }
          let quantityAll;
          if($(`#quantityAll`).is(':disabled')){
            quantityAll = 1;
          }else{
            quantityAll = $(`#quantityAll`).val(); 
          }
          let data_varr =[];
          const id_varr= `Update_variants_all_${ItemD}`;
          $(`#${id_varr} tr`).each(function (_, itemVar) {
            const varr =[];
            const Item = $(itemVar).children().find('input');
            $(Item).each(function (_, tr) {
              const Itemtr = $(tr).val();
              if(Itemtr.indexOf('$') !==-1){
                const ItemtrN = Itemtr.replace('$','');
                varr.push(ItemtrN);
              }else {
                varr.push(Itemtr);
              }
            });
            data_varr.push(varr);
          });
          $('#updateEbay').append(
            `
              <img src="images/load.gif" style= "width:50px" >
            `
          );
          setTimeout(function(){
            $("#updateEbay img").remove();
          }, 3000);
          $.ajax({
              url: "editProduct/" + id,
              type: 'POST',
              data: {
                _token: "{{ csrf_token() }}",
                itemID :idItem,
                ebays_id: ebays_id,
                sku :ItemD,
                title:title,
                price :price,
                originPrice :originPrice,
                ratePrice: ratePriceAll,
                quantity:quantityAll,
                variants : data_varr,
              },
              dataType: 'JSON',
              error: function() {
                alert("lỗi");
              },
              success: function(data) {
                var event = new CustomEvent("UpdateItem", { detail: { content: data } });
                window.dispatchEvent(event);
                window.addEventListener(
                  "databaseUpdateItem",
                async function (evt) {
                  const {  content } = evt.detail;
                    if(content.Ack.text === "Failure" || content.Ack.text === "Warning"){
                      $("#checkALl").prop('checked', false);
                      document.getElementById('update-submit-all').disabled = false;
                      for (const element of content.Errors) {
                          $('#edit-wanning').append(`
                          <div class="alert alert-danger alert-dismissible">
                          <button type="button" style="position:static;top:0px;right:0px" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4 style="margin:10px"><i class="icon fa fa-warning"></i> Alert!</h4>
                              ID: ${itemID}  <br> ${element.LongMessage.text}
                          </div>
                      `);
                      }
                      return false;
                    }else{
                      $.ajax({
                        url: "requestUpdateEbay/"+ product_id,
                        type: 'POST',
                        data: {
                          _token: "{{ csrf_token() }}",
                          sku :sku,
                          title:title,
                          price : price,
                          quantity:quantity,
                          ratePrice:ratePrice,
                          variants : data_varr,
                        },
                        dataType: 'JSON',
                        error: function() {
                          alert("lỗi");
                        },
                        success: function(data) {
                          document.getElementById('update-submit-all').disabled =false;
                          $('#Update_variants tr').remove();
                          $('#updateModal').modal('hide');
                          $("#checkALl").prop('checked', false);
                          table.draw();
                          $('.product-list-alert').append(`
                          <div class="alert alert-success alert-dismissible alert-product-list" >
                          <h4><i class="icon fa fa-check"></i> Success </h4>
                            ID: ${itemID} <br> Update successfully !!
                          </div>
                          `);
                          setTimeout(function(){
                          $(".product-list-alert .alert").remove();
                          }, 4000);
                        }
                        });
                    }
                  },
                    false
                  );
                  
              }
          }); 
        });
      
      });
     
  });
  $('form#formEdit').submit(function(e) {
     e.preventDefault();
     document.getElementById('update-submit').disabled = true;
      const data_varr = [];
      const product_id = $('#product_id').val();
      const title =  $('#title').val();
      const price = $('#price').val();
      const ebays_id =$('#ebays_id').val(); 
      const originPrice = $('#originPrice').val();
      const sku = $('#sku').val();
      const itemID = $('#itemID').val();
      let ratePrice;
      if($(`#ratePrice`).is(':disabled')){
          ratePrice = '0';
      }else {
          ratePrice = $(`#ratePrice`).val(); 
      }
      let quantity;
      if($(`#quantity`).is(':disabled')){
            quantity = 1;
      }else{
          quantity = $(`#quantity`).val(); 
      }
      $('#Update_variants tr').each(function (_, item) {
       const varr =[]
        const Item = $(item).children().find('input');
        $(Item).each(function (_, tr) {
          const Itemtr = $(tr).val();
          if(Itemtr.indexOf('$') !==-1){
            const ItemtrN = Itemtr.replace('$','');
            varr.push(ItemtrN);
          }else {
            varr.push(Itemtr);
          }
        });
        data_varr.push(varr);
      });
      $('#updateEbay').append(
            `
              <img src="images/load.gif" style= "width:50px" >
            `
          );
      setTimeout(function(){
        $("#updateEbay img").remove();
      }, 3000);
      $.ajax({
          url: "editProduct/" + product_id,
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            variants : data_varr,
            title : title,
            sku :sku,
            price : price,
            itemID:itemID,
            quantity:quantity,
            originPrice :originPrice,
            ratePrice:ratePrice,
            ebays_id:ebays_id,
          },
          dataType: 'JSON',
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            var event = new CustomEvent("UpdateItem", { detail: { content: data } });
            window.dispatchEvent(event);
            window.addEventListener(
              "databaseUpdateItem",
            async function (evt) {
              const {  content } = evt.detail;
                if(content.Ack.text === "Failure" || content.Ack.text === "Warning"){
                  $("#checkALl").prop('checked', false);
                  document.getElementById('update-submit').disabled = false;
                  for (const element of content.Errors) {
                      $('#edit-wanning').append(`
                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" style="position:static;top:0px;right:0px" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4 style="margin:10px"><i class="icon fa fa-warning"></i> Alert!</h4>
                          ID: ${itemID}  <br> ${element.LongMessage.text}
                      </div>
                  `);
                  }
                  
                }else{
                  
                  $.ajax({
                    url: "requestUpdateEbay/"+ product_id,
                    type: 'POST',
                    data: {
                      _token: "{{ csrf_token() }}",
                      sku :sku,
                      title:title,
                      price : price,
                      quantity:quantity,
                      ratePrice:ratePrice,
                      variants : data_varr,
                    },
                    dataType: 'JSON',
                    error: function() {
                      alert("lỗi");
                    },
                    success: function(data) {
                      document.getElementById('update-submit').disabled = false;
                      $('#Update_variants tr').remove();
                      $('#updateModal').modal('hide');
                      $("#checkALl").prop('checked', false);
                      table.draw();
                      $('.product-list-alert').append(`
                      <div class="alert alert-success alert-dismissible alert-product-list" >
                      <h4><i class="icon fa fa-check"></i> Success </h4>
                         ID: ${itemID} <br> Update successfully !!
                      </div>
                      `);
                      setTimeout(function(){
                      $(".product-list-alert .alert").remove();
                      }, 4000);
                    }
                    });
                }
              },
                false
              );
          }
      }); 
      
    
  });
  $('#category_filter').on('change', function () {
     const item = $(this).val();
     table.column(2).search(item).draw();
  } );
  var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('listProduct') }}",
        order: [[1, 'asc']],
        columnDefs: [
          { orderable: false, targets: [0]},
          { orderable: false, targets: [2]}
          ],  
        columns: [
            {data: 'title', name: 'title',
               render: function( data, type, full, meta ) {
                        return `<input type="checkbox" data-id="${full.id}" data-title="${data}" data-itemID="${full.itemID}"  data-price="${full.price}" data-ebays_id="${full.ebays_id}" data-ruName="${full.ebay.ruName}" data-appId="${full.ebay.appId}" data-devId="${full.ebay.devId}" data-certId="${full.ebay.certId}" data-sku="${full.sku}"  data-quantity="${full.quantity}"  data-originPrice="${full.originPrice}"  data-ratePrice="${full.ratePrice}" class="case" name="case">`;
                 }
            },
            { data: 'imagesDetails', name: 'imagesDetails',
                 render: function( data, type, full, meta ) {
                        return "<img src=\" " + data + "\"  height=\"50\"/>";
                 }
             },
            { data: 'ebays_id', name: 'ebays_id',
                render: function( data, type, full, meta ) {
                        return full.ebay.ebayname;
                 }
             },
            { data: 'title', name: 'title',
               render: function( data, type, full, meta ) {
                        return data.slice(0,10);
                 }
             },
            { data: 'vender', name: 'vender' },
            { data: 'vender_id', name: 'vender_id' },
            { data: 'itemID', name: 'itemID',
             render: function ( data, type, row, meta ) {
                return '<a href="https://www.ebay.com/itm/'+data+'" target="_blank">'+ data +'</a>';
             } 
            },
            { data: 'quantity', name: 'quantity' },
            { data: 'price', name: 'price' },
            { data: 'originPrice', name: 'originPrice' },
            { data: 'ratePrice', name: 'ratePrice',
                 render: function( data, type, full, meta ) {
                        return  data + " %";
                 }
          },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    function GetLinkProduct(item){
      $('#myModal').modal('show');
    }
    function Delete(item){
      const id = $('#model_id').val();
      $.ajax({
      url: "removeProduct/"+ id,
      type: 'GET',
      error: function() {
        alert("Error");
      },
      success: function(data) {
        table.draw();
          $('.product-list-alert').append(`
            <div class="alert alert-success alert-dismissible alert-product-list" >
                <h4><i class="icon fa fa-check"></i> Success </h4>
                 ${data.message}
              </div>
          `);
          $('#myModal').modal('hide');
          setTimeout(function(){
              $(".product-list-alert .alert").remove();
          }, 4000);
          
      }
     }); 
    }
  $('form#general').submit(function (event) {
    event.preventDefault();
    const ebayname =  $('#ebayname').val();
    const user_id =  $('#user_id').val();
    const selling_paypal =  $('#selling_paypal').val();
    const ruName =  $('#ruName').val();
    const appId =  $('#appId').val();
    const certId =  $('#certId').val();
    const devId =  $('#devId').val();
    const authToken =  $('#authToken').val();
    const oauthUserToken =  $('#oauthUserToken').val();
    $('#loadEbay').append(
      `
        <img src="images/load.gif" style= "width:50px" >
      `
    );
    setTimeout(function(){
      $("#loadEbay img").remove();
    }, 3000);
    $.ajax({
      url: "{{url('general')}}",
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        ebayname :ebayname,
        user_id : user_id,
        selling_paypal :selling_paypal,
        ruName :ruName,
        appId :appId,
        certId :certId,
        devId :devId,
        authToken:authToken,
        oauthUserToken: oauthUserToken,
      },
      error: function() {
        alert("lỗi");
      },
      success: function(data) {
        localStorage.removeItem('id-ebay');
        $(window).scrollTop(0);
        $("#general .alert").slideDown();
        setTimeout(function(){
              $("#general .alert").remove();
          }, 4000);
      }
     }); 
  });
 
  $('.select-product').change(function() {
    let ebayname = $('option:selected', this).attr('data-ebayname');
    let authtoken = $('option:selected', this).attr('data-authtoken');
    let oauthusertoken = $('option:selected', this).attr('data-oauthusertoken');
    let percent = $('option:selected', this).attr('data-percent');
    let ebay_id = $('option:selected', this).attr('data-id');
    let default_return_id = $('option:selected', this).attr('data-default_return_id');
    let default_payment_id = $('option:selected', this).attr('data-default_payment_id');
    let default_shipping_id = $('option:selected', this).attr('data-default_shipping_id');
    let default_payment = $('option:selected', this).attr('data-default_payment');
    let default_shipping = $('option:selected', this).attr('data-default_shipping');
    let default_return = $('option:selected', this).attr('data-default_return');
    if(ebayname === "Add"){
      location.reload();
    }else{
      $('#percent').val(percent);
      $('#usereb_id').val(ebay_id);
      $('#ebay_id').val(ebay_id);
      $('#btnGetLink').removeAttr("disabled");
      document.getElementById('Link').disabled = false;
      document.getElementById("authTokenProduct").value = authtoken;
      document.getElementById("oauthUserTokenProduct").value = oauthusertoken;
      document.getElementById("default_return_id").value = default_return_id;
      document.getElementById("default_payment_id").value = default_payment_id;
      document.getElementById("default_shipping_id").value = default_shipping_id;
      document.getElementById("default_shipping").value = default_shipping;
      document.getElementById("default_payment").value = default_payment;
      document.getElementById("default_return").value = default_return;
      $.ajax({
      url: "policyDescription/"+ ebay_id,
      type: 'GET',
      error: function() {
        alert("error");
      },
      success: function(data) {
        $('#payment_policy').append(`
          ${data.message.payment_policy} 
        `);
        $('#shipping_policy').append(`
       
        ${data.message.shipping_policy}
        `);
        $('#return_policy').append(`
       
        ${data.message.return_policy}
        `);
      }
      }); 
    }
  });
  if ($('#product').length) {
    CKEDITOR.replace("content",{
      allowedContent: true,
      contentsCss: 'https://www.w3schools.com/w3css/4/w3.css'
    });
    $("#content-click").click(function(e) {
      e.preventDefault();
      CKEDITOR.instances['content'].setData($('#content-description').html());
    });
  }

  if ($('#ebay').length) {
    CKEDITOR.replace("shipping_policy");
    CKEDITOR.replace("payment_policy");
    CKEDITOR.replace("return_policy");
    if ((localStorage.getItem("id-ebay") !== null)  && ($("#ebayname").val() === '')) {
      const id = localStorage.getItem("id-ebay");
      $(".select-ebay").val(id);
      changeSelectEbay($(".select-ebay"));
    }
    $( ".select-ebay" ).change(function() {
      changeSelectEbay(this);
    });

    function changeSelectEbay(e){
      let ebayname = $('option:selected', e).attr('data-ebayname');
      let id = $('option:selected', e).attr('data-id');
      let selling_paypal = $('option:selected', e).attr('data-selling_paypal');
      let authtoken = $('option:selected', e).attr('data-authtoken');
      let ruName = $('option:selected', e).attr('data-ruName');
      let devId = $('option:selected', e).attr('data-devId');
      let appId = $('option:selected', e).attr('data-appId');
      let certId = $('option:selected', e).attr('data-certId');
      let oauthusertoken = $('option:selected', e).attr('data-oauthusertoken');
      let default_break = $('option:selected', e).attr('data-default_break');
      let default_payment = $('option:selected', e).attr('data-default_payment');
      let default_shipping = $('option:selected', e).attr('data-default_shipping');
      let default_return = $('option:selected', e).attr('data-default_return');
      let default_return_id = $('option:selected', e).attr('data-default_return_id');
      let default_payment_id = $('option:selected', e).attr('data-default_payment_id');
      let default_shipping_id = $('option:selected', e).attr('data-default_shipping_id');
      if(ebayname === "New"){
        location.reload();
      }else{
        localStorage.removeItem('id-ebay');
        localStorage.setItem("id-ebay", id);
        $('#ebay_id').val(id);
        $('#ebayname').val(ebayname);
        $('#selling_paypal').val(selling_paypal);
        $('#authToken').val(authtoken);
        $('#ruName').val(ruName);
        $('#devId').val(devId);
        $('#appId').val(appId);
        $('#certId').val(certId);
        $('#oauthUserToken').val(oauthusertoken);
        $('#default_payment option').remove();
        $('#default_return option').remove();
        $('#default_shipping option').remove();
        $('#default_break').val(default_break);
        $('#default_payment').append(`
            <option data-id="${default_payment_id}">${default_payment}</option>
        `);
        $('#default_return').append(`
          <option data-id="${default_payment_id}">${default_return}</option>
        `);
        $('#default_shipping').append(`
            <option data-id="${default_payment_id}">${default_shipping}</option>
        `);
          $.ajax({
          url: "policy/" + id,
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            authToken : authtoken,
            default_payment :default_payment,
            default_return:default_return,
            default_shipping:default_shipping,
          },
          error: function() {
            alert("error");
          },
          success: function(data) {

              console.log(data);
              for (const element of data.payment) {
                $('#default_payment').append(`
                    <option data-id="${element.profile_id}">${element.name}</option>
                `);
                }
              
                for (const element of data.return) {
                  $('#default_return').append(`
                      <option data-id="${element.profile_id}">${element.name}</option>
                  `);
                }
              
                for (const element of data.shipping) {
                  $('#default_shipping').append(`
                      <option data-id="${element.profile_id}">${element.name}</option>
                  `);
                }
              }
          }); 
        document.getElementById('submit-policy').disabled = false;
        $("#submit-policy").html('Update');
        document.getElementById('get-policy').disabled = false;
        document.getElementById('btn-dashboard').disabled = false;
        $("#btn-dashboard").html('Update');
        document.getElementById('btn-template').disabled = false;
        $("#btn-template").html('Update');
      }
    }
  
  $("#get-policy").click(function(event){
    event.preventDefault();
      const authToken =  $('#authToken').val();
      const id =   $('#ebay_id').val();
      $('#default_payment option').remove();
      $('#default_return option').remove();
      $('#default_shipping option').remove();
      $.ajax({
      url: "policy/" + id,
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        authToken : authToken,
      },
      error: function() {
        alert("error");
      },
      success: function(data) {
       
        for (const element of data.payment) {
          $('#default_payment').append(`
               <option data-id="${element.profile_id}">${element.name}</option>
           `);
        }
       
        for (const element of data.return) {
          $('#default_return').append(`
               <option data-id="${element.profile_id}">${element.name}</option>
           `);
        }
        
        for (const element of data.shipping) {
          $('#default_shipping').append(`
               <option data-id="${element.profile_id}">${element.name}</option>
           `);
        }
      }
       
      }); 
      });

      $('form#lister').submit(function (event) {
        event.preventDefault();
        const default_break =  $('#default_break').val();
        const ebay_id =  $('#ebay_id').val();
        const default_payment =  $('#default_payment').val();
        const default_shipping =  $('#default_shipping').val();
        const default_return =  $('#default_return').val();
        let default_payment_id = $('#default_payment option:selected', this).attr('data-id');
        let default_shipping_id = $('#default_shipping option:selected', this).attr('data-id');
        let default_return_id = $('#default_return option:selected', this).attr('data-id');
      
        $.ajax({
          url: "{{url('lister')}}",
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            ebay_id : ebay_id,
            default_break :default_break,
            default_payment:default_payment,
            default_shipping: default_shipping,
            default_return: default_return,
            default_payment_id:default_payment_id,
            default_shipping_id :default_shipping_id,
            default_return_id :default_return_id,
          },
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            localStorage.removeItem('id-ebay');
            $("#lister .alert").slideDown();
          }
        }); 
      });
    }
  $('form#dashboard').submit(function (event) {
    event.preventDefault();
    const stock = $('#stock').val();
    const sold = $('#sold').val();
    const ebay_id = $('#ebay_id').val();
    const sales = $('#sales').val();
    const listings = $('#listings').val();
    const views = $('#views').val();
    const numbers = $('#numbers').val();
    $('#loadEbay').append(
      `
        <img src="images/load.gif" style= "width:50px" >
      `
    );
    setTimeout(function(){
      $("#loadEbay img").remove();
    }, 3000);
    $.ajax({
      url: "{{url('dashboard')}}",
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        stock : stock,
        sold : sold,
        sales :sales,
        ebay_id :ebay_id,
        listings:listings,
        views:views,
        numbers:numbers,
      },
      error: function() {
        alert("lỗi");
      },
      success: function(data) {
        $(window).scrollTop(0);
        localStorage.removeItem('id-ebay');
        $("#dashboard .alert").slideDown();
        setTimeout(function(){
            $("#dashboard .alert").slideUp();
        }, 4000);
        
      }
      }); 
  });

  $('form#template').submit(function (event) {
    event.preventDefault();
    const ebay_id = $('#ebay_id').val();
    const shipping_policy =  CKEDITOR.instances['shipping_policy'].getData();
    const payment_policy =  CKEDITOR.instances['payment_policy'].getData();
    const return_policy =  CKEDITOR.instances['return_policy'].getData();
    $('#loadEbay').append(
      `
        <img src="images/load.gif" style= "width:50px" >
      `
    );
    setTimeout(function(){
      $("#loadEbay img").remove();
    }, 3000);
    $.ajax({
      url: "{{url('template')}}",
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        ebay_id:ebay_id,
        shipping_policy : shipping_policy,
        payment_policy : payment_policy,
        return_policy :return_policy,
      },
      error: function() {
        alert("lỗi");
      },
      success: function(data) {
        $(window).scrollTop(0);
        localStorage.removeItem('id-ebay');
        $("#template .alert").slideDown();
        setTimeout(function(){
            $("#template .alert").slideUp();
        }, 4000);
      }
     }); 
  });
  function Remove(item){
    const idItem =  $(item).parent().parent().attr('id');
    $(`#${idItem}`).remove();
  }
  function makeid(length) {
    var result = "";
    var characters =
      "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  $('.js-example-basic-multiple').select2();
  $.widget.bridge('uibutton', $.ui.button);
  
  $("div.alert-product-list").delay(3000).slideUp();
  var data = {};
  function RemoveError(){
    window.localStorage.removeItem('error');
  }
  window.localStorage.removeItem('database');

  let errorArr= [];
  $('form#form').submit(function(e) {
     e.preventDefault();
      document.getElementById('submit-ebay').disabled = true;
      const data_varr = [];
      const title =  $('#Title').val();
      const slug = $('#Slug').val();
      const category = $('#Category').val();
      const tags = $('#Tags').val();
      const price = $('#Price').val();
      const vender = $('#Vender').val();
      const ebay_id = $('#ebay_id').val();
      const vender_id = $('#Vender_id').val();
      const vender_url = $('#Vender_url').val();
      const content =  CKEDITOR.instances['content'].getData();
      const option1_name = $('#option1_name').val();
      const option2_name = $('#option2_name').val();
      const option3_name = $('#option3_name').val();
      const option1_picture = $('#option1_picture').val();
      const delivery_date_min = $('#Delivery_date_min').val();
      const delivery_date_max = $('#Delivery_date_max').val();
      const authToken =  $('#authTokenProduct').val();
      const oauthUserToken = $('#oauthUserTokenProduct').val();
      const default_return_id = $('#default_return_id').val();
      const default_payment_id = $('#default_payment_id').val();
      const default_shipping_id = $('#default_shipping_id').val();
      const default_payment = $('#default_payment').val();
      const default_shipping = $('#default_shipping').val();
      const default_return = $('#default_return').val();
      const quantity = $('#Quantity').val();
      const imagect = $('#Imagesct').val();
      const image = $('#Images').val();
      const originPrice = $('#originPriceLink').val();
      const percent = $('#percent').val();
      const name = vender + ' ' + makeid(5); 
      $('#loadEbay').append(
        `
          <img src="images/load.gif" style= "width:50px" >
        `
      );
      setTimeout(function(){
        $("#loadEbay img").remove();
      }, 3000);
      $('#Tb_variants tr').each(function (_, item) {
       const varr =[]
        const Item = $(item).children().find('input');
        $(Item).each(function (_, tr) {
          const Itemtr = $(tr).val();
          if(Itemtr.indexOf('$') !==-1){
            const ItemtrN = Itemtr.replace('$','');
            varr.push(ItemtrN);
          }else {
            varr.push(Itemtr);
          }
        });
        data_varr.push(varr);
      });
      document.dispatchEvent(new CustomEvent('dsm', {detail: data}));
      $.ajax({
          url: "{{url('createEbay')}}",
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            variants : data_varr,
            title : title,
            authToken :authToken,
            oauthUserToken:oauthUserToken,
            slug :slug,
            category:category,
            tags:tags,
            price : price,
            images : image,
            vender:vender,
            ebay_id:ebay_id,
            quantity:quantity,
            content:content,
            vender_id:vender_id,
            vender_url:vender_url,
            option1_name:option1_name,
            option2_name:option2_name,
            option3_name:option3_name,
            option1_picture:option1_picture,
            delivery_date_min:delivery_date_min,
            delivery_date_max:delivery_date_max,
            default_return_id:default_return_id,
            default_payment_id:default_payment_id,
            default_shipping_id:default_shipping_id,
            default_return: default_return,
            default_payment:default_payment,
            default_shipping:default_shipping,
            percent:percent,
            originPrice:originPrice,
            imagect:imagect,
          },
          dataType: 'JSON',
          error: function() {
            alert("lỗi");
          },
          success: function(data) {
            console.log(data);
            var event = new CustomEvent("MyCustomEvent", { detail: { content: data } });
            window.dispatchEvent(event);
            window.addEventListener(
              "database",
            async function (evt) {
              const {  content } = evt.detail;
              console.log(content);
               if(!content.ItemID){
                 $('#Link').val('');
                  $("#form").slideUp();
                  $('#myModal').modal('hide');
                  $(window).scrollTop(0);
                  if(Array.isArray(content.Errors)){
                    for (const element of content.Errors) {
                      $('.product-list-alert').append(`
                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                      Error Title: ${title} Request to run again !! <br>
                        ${element.LongMessage.text}
                      </div>
                      `);
                    }
                  }else{
                    $('.product-list-alert').append(`
                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                      Error Title: ${title} Request to run again !! <br>
                        ${content.Errors.LongMessage.text}
                      </div>
                      `);
                  }
                  
                  document.getElementById('submit-ebay').disabled = false;
                
              }else {
                const itemID = content.ItemID.text;
                $.ajax({
                    url: "{{url('addEbay')}}",
                    type: 'POST',
                    data: {
                      _token: "{{ csrf_token() }}",
                      variants : data_varr,
                      title : title,
                      slug :slug,
                      category:category,
                      tags:tags,
                      price : price,
                      images : image,
                      vender:vender,
                      ebay_id:ebay_id,
                      itemID :itemID,
                      quantity:quantity,
                      content:content,
                      vender_id:vender_id,
                      vender_url:vender_url,
                      option1_name:option1_name,
                      option2_name:option2_name,
                      option3_name:option3_name,
                      originPrice:originPrice,
                      imagect:imagect,
                      percent:percent,
                    },
                    dataType: 'JSON',
                    error: function() {
                      alert("lỗi");
                    },
                    success: function(data) {
                      $('#Link').val('');
                      $("#form").slideUp();
                      $('#myModal').modal('hide');
                      table.draw();
                      $(window).scrollTop(0);
                      $('.product-list-alert').append(`
                            <div class="alert alert-success alert-dismissible alert-product-list" >
                                <h4><i class="icon fa fa-check"></i> Success </h4>
                                ID: ${itemID} <br>  Created successfully !!
                              </div>
                      `);
                      setTimeout(function(){
                        $(".product-list-alert .alert").remove();
                       // location.reload();
                      }, 4000);
                      document.getElementById('submit-ebay').disabled = false;
                    }
                    });
                 
              }
            },
              false
            );
          }
      }); 
      
    
  });
  if ($('#productList').length) {
    $("div.alert-product-list").delay(3000).slideUp();
  }
  if ($('#product').length) {
    if ((localStorage.getItem("link") !== null)  && (document.getElementById('Link').disabled = true)) {
      const link = localStorage.getItem('link');
      const getlink = link.slice(0,link.indexOf(','));
      const id = link.slice(link.indexOf(',')+1,link.length);
      $(".select-product").val(id).change();
      $('#Link').val(getlink);
    }
  }
  
</script>