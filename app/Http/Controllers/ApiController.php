<?php

namespace App\Http\Controllers;
use App\Product;
use App\Variant;
use App\Ebay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Classes\KeyEbay;
use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;
use \DTS\eBaySDK\Trading\Services;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq,$id)
    {
        return response()->json([
            'success' => true,
            'message' => "Error",
            'itemID'=>$rq['itemID'],
        ]);
        $ebay = Ebay::where('id',$rq['ebays_id'])->first();
        $keyEbay = new KeyEbay;
        $siteId = Constants\SiteIds::US;
        $service = $keyEbay->KeyAuth($ebay->authToken,$siteId);
        $request = new Types\ReviseInventoryStatusRequestType();
        $item = new Types\InventoryStatusType();
        $item->ItemID = $rq['itemID'];
        $item->SKU = $rq['sku'];
        $item->StartPrice = new Types\AmountType(['value' => doubleval($rq['price'])]);
        $item->Quantity = (int) $rq['quantity'];
        $request->InventoryStatus[] = $item;
        return $item;
        $request->ErrorLanguage = 'en_US';
        $request->WarningLevel = 'High';
        // $response = $service->ReviseInventoryStatus($request);        
        $result = [];
        // if ($response->Ack !== 'Failure') {
        //     $product = Product::updateOrCreate([
        //         'id' => $id,
        //     ],
        //     [
        //         'originPrice' => $rq['originPrice'],
        //         'price' => $rq['price'],
        //     ]);
        //     return response()->json([
        //         'success' => true,
        //         'message' => "Update success !!",
        //     ]);
        // }else{
        //     foreach ($response->Errors as $error) {
        //         $row = (Object) array(
        //             'success' => false,
        //             'message' => $error->LongMessage,
        //             
        //         );
        //         array_push($result,$row);
        //     }
        //     return response()->json([
        //         'success' => false,
        //         'message' => $result,
        //         'itemID'=>$rq['itemID'],
        //     ]);
        // }
        // $product = Product::findOrFail($id);
        // $product->update($request->all());
        // return response()->json($product);
    }
    public function updateVariant(Request $rq,$id){
        return response()->json([
            'success' => false,
            'message' => "Error",
            'itemID'=>$rq['itemID'],
        ]);
        $variant = Variant::where('sku',$id)->first(); 
        $ebay = Ebay::where('id',$rq['ebays_id'])->first();
        $keyEbay = new KeyEbay;
        $siteId = Constants\SiteIds::US;
        $service = $keyEbay->KeyAuth($ebay->authToken,$siteId);
        $request = new Types\ReviseInventoryStatusRequestType();
        $item = new Types\InventoryStatusType();
        $item->ItemID =  $rq['itemID'];
        $item->SKU = $rq['sku'];
        $item->StartPrice = new Types\AmountType(['value' => doubleval( $rq['price'])]);
        $item->Quantity = (int) $variant['quantity'];
        $request->InventoryStatus[] = $item;
        return $item;
        $request->ErrorLanguage = 'en_US';
        $request->WarningLevel = 'High';
        // $response = $service->ReviseInventoryStatus($request);
        // if ($response->Ack !== 'Failure') {
                // $variant = Variant::updateOrCreate([
                //     'sku'   => $id,
                // ],[
                //     'originPrice'     => $rq['originPrice'],
                //     'price'     => $rq['price'],
                // ]);
                // return response()->json([
                //     'success' => true,
                //     'message' => "Update success !!",
                // ]);
        // }else{
            // foreach ($response->Errors as $error) {
            //     $row = (Object) array(
            //         'success' => false,
            //         'message' => $error->LongMessage,
            //         
            //     );
            //     array_push($result,$row);
            // }
            // return response()->json([
            //     'success' => false,
            //     'message' => $result,
            //     'itemID'=>$rq['itemID'],
            // ]);

        // }
        
    
        // return response()->json($variant);
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
