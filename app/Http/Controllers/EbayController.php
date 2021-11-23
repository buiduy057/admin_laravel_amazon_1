<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Ebay;
use App\Product;
use App\Variant;
use App\Category;
use App\Dashboard;
use Illuminate\Support\Facades\Auth;
use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;
use \DTS\eBaySDK\Trading\Services;
use App\Http\Classes\Helps;
use SebastianBergmann\Environment\Console;

class EbayController extends Controller
{
    
    private $type = 'sandbox';
    private $config = [
        'sandbox' => [
            'credentials' => [
                'devId' => '30b3ac88-f7ef-40e3-82f1-a47f187be899',
                'appId' => 'Atok-09066558-SBX-9419de517-0913e9b0',
                'certId' => 'SBX-419de517d352-df3b-4013-8554-f917',
            ],
            'authToken' => '',
            'oauthUserToken' => '',
            'ruName' => 'Atok-Atok-09066558-S-jsqroa'
        ],
        'production' => [
            'credentials' => [
                'devId' => '',
                'appId' => '',
                'certId' => '',
            ],
            'authToken' => '',
            'oauthUserToken' => '',
            'ruName' => ''
        ]
    ];

    

    public function createEbay(Request $request){
      
        $ebay_id = $request->ebay_id;
        $category_text = htmlentities($request->category);
        $title = $request->title;
        $quantity = $request->quantity;
        $slug = $request->slug;
        $vender = $request->vender;
        $vender_id = $request->vender_id;
        $tags = $request->tags;
        $images =$request->images;
        $price = $request->price;
        $vender_url = $request->vender_url;
        $content = $request->content;
        $contentN =  str_replace(';','&#59;',$content) ;
        $option1_name =  $request->option1_name;
        $option2_name =  $request->option2_name;
        $option3_name =  $request->option3_name;
        $option1_picture = $request->option1_picture;
        $variants = (array)$request->variants;
        
        $delivery_date_min = $request->delivery_date_min;
        $delivery_date_max = $request->delivery_date_max;
        $default_payment_id = $request->default_payment_id;
        $default_return_id = $request->default_return_id;
        $default_shipping_id = $request->default_shipping_id;
        $default_payment = $request->default_payment;
        $default_return = $request->default_return;
        $default_shipping = $request->default_shipping;
        $originPrice = $request->originPrice;
        $percent  = $request->percent;
        $imagect = $request->imagect;
        $img_arr = explode(",",$images);

        $this->setConfig($ebay_id);
        $ebay = Ebay::where('id',$ebay_id)->first();
        $selling_paypal = $ebay->selling_paypal;
        
        $item = new Types\ItemType();
        
        $item->Title = substr($title,0,80);
        
        // $item->Description = $content;
        $item->Description = htmlentities($contentN) ;
        $item->PrimaryCategory = new Types\CategoryType();
        $item->PrimaryCategory->CategoryID =  $this->getCategory($title);
        
        $item->SKU = $vender_id;
        $item->PictureDetails = new Types\PictureDetailsType();
        $item->PictureDetails->GalleryType = Enums\GalleryTypeCodeType::C_GALLERY;
        $item->PictureDetails->PictureURL =  $img_arr;
        
        if(!empty($variants)) {
            $item->Variations = new Types\VariationsType();
            $variationSpecificsSet = new Types\NameValueListArrayType();

            if(!empty($option1_name)){
                $arr01 = [];
                for( $i = 0 ; $i <= count( $variants)-1 ; $i++ ) {
                    array_push($arr01, $variants[$i][1]);
                }
                $array_1 = array_unique($arr01);
                $nameValue = new Types\NameValueListType();
                $nameValue->Name = $option1_name;
                $nameValue->Value = $array_1;
                $variationSpecificsSet->NameValueList[] = $nameValue;
            }
            if(!empty($option2_name)){
                $arr02 = [];
                for( $i = 0 ; $i <= count($variants)-1 ; $i++ ) {
                array_push( $arr02,$variants[$i][2]);
                }
                $array_2 = array_unique($arr02);
                $nameValue = new Types\NameValueListType();
                $nameValue->Name = $option2_name;
                $nameValue->Value = $array_2;
                $variationSpecificsSet->NameValueList[] = $nameValue;
            }

            if(!empty($option3_name)){
                $arr03 = [];
                for( $i = 0 ; $i <= count($variants)-1 ; $i++ ) {
                array_push( $arr03,$variants[$i][3]);
                }
                $array_3 = array_unique($arr03);
                $nameValue = new Types\NameValueListType();
                $nameValue->Name = $option3_name;
                $nameValue->Value = $array_3;
                $variationSpecificsSet->NameValueList[] = $nameValue;
            }
            $item->Variations->VariationSpecificsSet = $variationSpecificsSet;
        }else{
            $item->StartPrice = new Types\AmountType(['value' => doubleval($price)]); 
            $item->Quantity = (int) $quantity;
        }
       
        
        if(!empty($variants)) {
            
            for( $i = 0 ; $i <= count($variants)-1 ; $i++ ) {
                $variation = new Types\VariationType();
                $variation->SKU = $variants[$i][0];
                $variation->Quantity = (int) $variants[$i][4];
                $variation->StartPrice = new Types\AmountType(['value' => doubleval($variants[$i][5])]);
                $variationSpecifics = new Types\NameValueListArrayType();
                if(!empty($option1_name)){
                    $nameValue = new Types\NameValueListType();
                    $nameValue->Name = $option1_name;
                    $nameValue->Value =  [$variants[$i][1]];
                    $variationSpecifics->NameValueList[] = $nameValue;
                }
                if(!empty($option2_name)){
                    $nameValue = new Types\NameValueListType();
                    $nameValue->Name = $option2_name;
                    $nameValue->Value = [$variants[$i][2]];
                    $variationSpecifics->NameValueList[] = $nameValue;
                }
                if(!empty($option3_name)){
                    $nameValue = new Types\NameValueListType();
                    $nameValue->Name = $option3_name;
                    $nameValue->Value =  [$variants[$i][3]];
                    $variationSpecifics->NameValueList[] = $nameValue;
                }
                $variation->VariationSpecifics[] = $variationSpecifics;
                $item->Variations->Variation[] = $variation;
            }
            if(!empty($option1_name)){
                $pictures = new Types\PicturesType();
                $pictures->VariationSpecificName = $option1_name;
                $array_picture = [];
                for( $i = 0 ; $i <= count($variants)-1 ; $i++ ) {
                    if(!in_array($variants[$i][1], $array_picture)){
                        array_push($array_picture,$variants[$i][1]);
                        $pictureSet = new Types\VariationSpecificPictureSetType();
                        $pictureSet->VariationSpecificValue = $variants[$i][1];
                        $pictureSet->PictureURL[] = $variants[$i][7];
                        $pictures->VariationSpecificPictureSet[] = $pictureSet;
                    }
                }
                $item->Variations->Pictures[] = $pictures;
            }
           
        }
        
        $item->SellerProfiles = new Types\SellerProfilesType();
       
        $payment  =  new Types\SellerPaymentProfileType();
        $payment->PaymentProfileID = (int)$default_payment_id;
        $payment->PaymentProfileName = $default_payment;
        $item->SellerProfiles->SellerPaymentProfile = $payment;

        $return  =  new Types\SellerReturnProfileType();
        $return->ReturnProfileID = (int) $default_return_id ;
        $return->ReturnProfileName = $default_return;
        $item->SellerProfiles->SellerReturnProfile = $return;
        
        $shipping  =  new Types\SellerShippingProfileType();
        $shipping->ShippingProfileID = (int) $default_shipping_id;
        $shipping->ShippingProfileName = $default_shipping;
        $item->SellerProfiles->SellerShippingProfile = $shipping;

        $item->ItemSpecifics = new Types\NameValueListArrayType();
        $arrayType= [["Brand",$category_text],["Type",$category_text],["Department","Apparels"],["Size Style","Regular"],["Material","100% Cotton"],["Length","Unabrided"]];
        for( $i = 0 ; $i <= count($arrayType)-1 ; $i++ ) {
            $specific = new Types\NameValueListType();
            $specific->Name = $arrayType[$i][0];
            $specific->Value[] = $arrayType[$i][1];
            $item->ItemSpecifics->NameValueList[] = $specific;
        }
        $item->ListingType = Enums\ListingTypeCodeType::C_FIXED_PRICE_ITEM;
        
        $item->ListingDuration = Enums\ListingDurationCodeType::C_GTC;
        $item->Location = 'USA';
        $item->Country = 'US';
	    $item->Currency = 'USD';
        $item->ConditionID = 1000;
        
        $item->PaymentMethods[] = 'PayPal';
        $item->PayPalEmailAddress =  $selling_paypal;
        $item->DispatchTimeMax = 1;
        $item->ShipToLocations[] = 'None';
        $item->ReturnPolicy = new Types\ReturnPolicyType();
        $item->ReturnPolicy->ReturnsAcceptedOption = 'ReturnsNotAccepted';
        
        
        $response = $this->XmlData("Item",$item,'AddFixedPriceItemRequest','AddFixedPriceItem',true);
        return $response;
        
    }
    public function addEbay(Request $rq){
        $this->setConfig($rq['ebay_id']);
        $product = Product::create([
            'title' => $rq['title'],
            'slug' => $rq['slug'],
            'category' => $rq['category'],
            'tags' => $rq['tags'],
            'vender' => $rq['vender'],
            'sku' =>  $rq['vender_id'],
            'ebays_id'=> $rq['ebay_id'],
            'quantity' => $rq['quantity'],
            'itemID' => $rq['itemID'],
            'vender_id' =>  $rq['vender_id'],
            'ebay_id' =>  $this->getCategory($rq['title']),
            'vender_url' => $rq['vender_url'],
            'images' => $rq['images'],
            'imagesDetails' => $rq['imagect'],
            'price' =>$rq['price'],
            'originPrice' => $rq['originPrice'],
            'ratePrice' => $rq['percent'],
            'option1_name' => $rq['option1_name'],
            'option2_name' => $rq['option2_name'],
            'option3_name' => $rq['option3_name'],
            
            ]); 
            if(!empty($rq['variants'])) {
                for( $i = 0 ; $i <= count($rq['variants'])-1 ; $i++ ) {
                    Variant::create([
                    'product_id' => $product->id,
                    'sku' => $rq['variants'][$i][0],
                    'option1' => $rq['variants'][$i][1],
                    'option2' => $rq['variants'][$i][2],
                    'option3' => $rq['variants'][$i][3],
                    'quantity' => $rq['variants'][$i][4],
                    'price' => $rq['variants'][$i][5],
                    'originPrice' => $rq['variants'][$i][6],
                    'image_url' => $rq['variants'][$i][7],
                    ]);
                    
                }
            }
            return response()->json([
                'success' => true,
                'message' => "Success !!",
            ]);
    }
    public function updateEbay (Request $rq,$id){
        $this->setConfig($rq['ebays_id']);
        $variants = $rq->variants;
        if(!empty($variants)) {
            $i= 0;
            do {
                $item = $this->ItemEbay($rq['itemID'],$variants[$i][4],$variants[$i][1],$variants[$i][2]);
                $response = $this->XmlData("InventoryStatus",$item,'ReviseInventoryStatusRequest','ReviseInventoryStatus',true);
                return $response;
                $i++;
            } while ($i < count($variants));
        }else{
          $item = $this->ItemEbay($rq['itemID'],$rq['quantity'],$rq->sku,$rq->price);
          $response = $this->XmlData("InventoryStatus",$item,'ReviseInventoryStatusRequest','ReviseInventoryStatus',true);
          return $response;
        }
    }

    public function ItemEbay($itemID,$quantity,$sku,$price){
        $item = new Types\InventoryStatusType();
        $item->ItemID = $itemID;
        $item->Quantity = (int) $quantity;
        $item->SKU = $sku;
        $item->StartPrice = new Types\AmountType(['value' => doubleval($price)]);
        return $item;
    }

    public function requestUpdateEbay(Request $rq,$id ){
          
          $product = Product::updateOrCreate([
              'id' => $id,
          ],
          [
              'title' => $rq['title'],
              'ratePrice' => $rq['ratePrice'],
              'price' => $rq['price'],
              'quantity' => $rq['quantity'],
          ]);
          if(!empty($rq['variants'])) {
            for ($i=0; $i<count($rq['variants']); $i++) {
                DB::table('variants')
                    ->where('id', $rq['variants'][$i][0])
                    ->update([
                        'sku' => $rq['variants'][$i][1],
                        'price' => $rq['variants'][$i][2],
                        'quantity' => $rq['variants'][$i][4],
                ]);
            } 
          }
          return response()->json([
            'success' => true,
            'message' => "Remove  success !!",
        ]);
      
    }
    
    public function destroyEbayRequest(Request $rq, $id)
    {
        $product = Product::find($id);
        $variant = Variant::where('product_id',$id)->get();
            foreach ($variant as $dt) 
            {
                $dt->delete();
            }
        $product->destroy($id);
        return response()->json([
            'success' => true,
            'message' => "Remove success !!",
        ]);
    }
    public function destroyEbay(Request $rq, $id)
    {   
        $this->setConfig($rq['ebays_id']);
        // $request->EndingReason = Enums\EndReasonCodeType::C_NOT_AVAILABLE;
        $response = $this->XmlData("ItemID",$rq['itemID'],'EndItemRequest','EndItem',true);
        return $response;
    }

  
    public function getCategory($category){
        $result = $this->XmlData("Query",$category,"GetSuggestedCategoriesRequest", "GetSuggestedCategories");
        if(is_array($result->SuggestedCategoryArray->SuggestedCategory)){
            for ($i = 0; $i <= $result->SuggestedCategoryArray->SuggestedCategory; $i++) {
                return $result->SuggestedCategoryArray->SuggestedCategory[0]->Category->CategoryID;
            }   
        }else{
            return $result->SuggestedCategoryArray->SuggestedCategory->Category->CategoryID;
        }
    }

    public function XmlData($key, $data,$request_name_request,$request_name,$addon = false){
        if(is_array($data) || is_object($data)){
            $help = new Helps;
            $request = $help->array2xml($key,json_decode($data));
        }else{
            $request = "<".$key.">".$data."</".$key.">";
        }
        $xml =
        "<?xml version='1.0' encoding='utf-8'?>".   
        '<'.$request_name_request.' xmlns="urn:ebay:apis:eBLBaseComponents">'.
            "<RequesterCredentials>" .
                "<eBayAuthToken>".$this->config[$this->type]['authToken']."</eBayAuthToken>".
            "</RequesterCredentials>" .
            $request.
        "</".$request_name_request.">";
        $client = new Client([
			'base_uri' => asset('')
		]);
        if($addon){
            $devId = $this->config[$this->type]['credentials']['devId'];
            $appId = $this->config[$this->type]['credentials']['appId'];
            $certId = $this->config[$this->type]['credentials']['certId'];
            $dataxml =[$xml,$devId,$appId,$certId,$request_name ];
            return $dataxml;
        }else{
            $response = $client->request("POST", 'https://api.ebay.com/ws/api.dll', [
                'body' => $xml,
                'headers' => [
                    'Content-Type' => 'text/xml',
                    'X-EBAY-API-DEV-NAME' => $this->config[$this->type]['credentials']['devId'],
                    'X-EBAY-API-APP-NAME' => $this->config[$this->type]['credentials']['appId'],
                    'X-EBAY-API-CERT-NAME' => $this->config[$this->type]['credentials']['certId'],
                    'X-EBAY-API-CALL-NAME' => $request_name,
                    'X-EBAY-API-SITEID' => '0',
                    'X-EBAY-API-COMPATIBILITY-LEVEL' => '391',
                    'X-EBAY-SOA-MESSAGE-ENCODING' => 'UTF-8',
                ],
            ]);
    
            $fileContents = str_replace(array("\n", "\r", "\t"), '', (string) $response->getBody());
            $fileContents = trim(str_replace('"', "'", $fileContents));
            $simpleXml = simplexml_load_string($fileContents);
            $result = json_encode($simpleXml);
            $result = json_decode($result);
            return $result;
        }
    }

    public function returnError($response){
        $result = [];
        if(is_array($response->Errors)){
            foreach ($response->Errors as $error) {
                $row = (Object) array(
                    'success' => false,
                    'message' => $error->LongMessage
                );
                array_push($result,$row);
            }
        }else{
            $row = (Object) array(
                'success' => false,
                'message' => $response->Errors->LongMessage,
            );
            array_push($result,$row);
        }
        return $result;
    }

    public function setConfig($ebay_id){
        $ebay = Ebay::where('id',$ebay_id)->first();
        $this->config[$this->type]['credentials']['devId'] = $ebay->devId;
        $this->config[$this->type]['credentials']['appId'] = $ebay->appId;
        $this->config[$this->type]['credentials']['certId'] = $ebay->certId;
        $this->config[$this->type]['ruName'] = $ebay->ruName;
        $this->config[$this->type]['authToken'] = $ebay->authToken;
        $this->config[$this->type]['oauthUserToken'] = $ebay->oauthUserToken;
    }

    
    
    public function dashboard(Request $request){
        Ebay::updateOrCreate([
            'id'   => $request->ebay_id,
        ],[

            'stock'     => $request->stock,
            'sold'     => $request->sold,
            'sales' => $request->sales,
            'listings'     => $request->listings,
            'views'     => $request->views,
            'numbers'     => $request->numbers,
        ]);
        return response()->json([
            'success' => true,
            'message' => "Success !!"
        ]);
    }
    public function template(Request $request){
        Ebay::updateOrCreate([
            'id'   => $request->ebay_id,
        ],[
            'shipping_policy'     => $request->shipping_policy,
            'payment_policy'     => $request->payment_policy,
            'return_policy' => $request->return_policy,
        ]);
        return response()->json([
            'success' => true,
            'message' => "Success !!"
        ]);
    }
    public function policyDescription($id){
        $ebay = Ebay::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => $ebay
        ]);
    }
    public function update(Request $request)
    {   
        $ebay = Ebay::updateOrCreate([
            'ebayname'   => $request->ebayname,
        ],[

            'user_id'     => $request->user_id,
            'authToken'     => $request->authToken,
            'ruName'     => $request->ruName,
            'devId'     => $request->devId,
            'appId'     => $request->appId,
            'certId'     => $request->certId,
            'oauthUserToken'     => $request->oauthUserToken,
            'selling_paypal'     => $request->selling_paypal,
           
        ]);
        return response()->json([
            'success' => true,
            'message' => "Success !!"
        ]);
    }
   
    public function lister(Request $request)
    {   
        
        $ebay = Ebay::updateOrCreate([
            'id'   => $request->ebay_id,
        ],[

            'default_break'     => $request->default_break,
            'default_payment'     => $request->default_payment,
            'default_shipping' => $request->default_shipping,
            'default_return'     => $request->default_return,
            'default_payment_id' => $request->default_payment_id,
            'default_shipping_id' => $request->default_shipping_id,
            'default_return_id' => $request->default_return_id,

           
        ]);
        return response()->json([
            'success' => true,
            'message' => "Success !!"
        ]);
    }
    public function home(){
        $users = Auth::user();
        return view('admin.Page.Ebay',compact('users'));
    }
    public function login(){
        return view('admin.Page.LoginEbay');
    }

    
}
