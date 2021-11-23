<?php

namespace App\Http\Classes;
use Illuminate\Http\Request;
use App\Http\Classes;

class TestEbay
{
  public function testAddProduct($title){
      if($title === 'iDiskk MFi Certified by Apple 128GB Photo Stick for iPhone USB Flash Drive for iPhone1212 mini12 pro1111 proXRXXSSE8for iPadMacBook and PC photo Storage for iOS 14 and Touch ID Encryption
      ') $response = $this->response(true);
      else $response = $this->response(false,'error duy');
      return response()->json($response);
  }

  public function testUpdateProduct($title){
    if($title == 'iDiskk (MFi Certified by Apple) 128GB Photo Stick for iPhone USB Flash Drive for iPhone12/12 mini/12 pro/11/11 pro/XR/X/XS/SE/8,for iPad,MacBook and PC photo Storage for iOS 14 and Touch ID Encryption
    ') $response = $this->response(true);
      else $response = $this->response(false,'error duy');
    return $response;
  }

  public function response($success = true, $message = 'Error'){
    if($success){
      $response = (Object) array([
        'Ack' => 'Success',
     ]);
    }else{
      $response = (Object) array([
        'Ack' =>  'Failure',
        'Errors' => (Object) array(['LongMessage' => $message]),
     ]);
    }
    return $response;
  }
}
