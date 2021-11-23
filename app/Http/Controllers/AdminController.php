<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Variant;
use App\Ebay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function product(){
        return view('admin.Page.Product');
    }
   
    public function listProduct(Request $request){
        if ($request->ajax()) {
            $data = Product::with('ebay')->latest()->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                           $btn = '<a data-ebays_id="'.$row->ebays_id.'"  data-id="'.$row->id.'"  data-itemID="'.$row->itemID.'" data-title="'.$row->title.'" data-quantity="'.$row->quantity.'"  data-sku="'.$row->sku.'" data-ratePrice="'.$row->ratePrice.'" data-price="'.$row->price.'" data-originPrice="'.$row->originPrice.'" data-toggle="modal" onclick="updateModalProduct(this)" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-edit"></i></a>';
   
                           $btn = $btn.' <a   class="btn btn-danger"  data-ebays_id="'.$row->ebays_id.'"   data-itemID="'.$row->itemID.'" data-id="'.$row->id.'" style="padding: 6px 14px;" onclick="RemoveProduct(this)" data-toggle="modal">
                           <i class="fa fa-trash-o"></i></a>';
                           return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('admin.Page.ProductList');
    }
 
    
    public function editProduct(Request $request,$id){
        $product = Product::find($id);
        $variants = Variant::where('product_id',$id)->get();
        return view('admin.Page.EditProduct',compact('product','variants'));
    }

    public function removeVariants($id){
        $variants = Variant::find($id);
        $variants->delete();
        return back();
    }
    public function variants(Request $request, $id){
        $variants = Variant::where('product_id',$id)->get();
        return response()->json([
            'success' => true,
            'message' => $variants,
            'sku' => $request['sku'],
        ]);
    }
    
   
}
