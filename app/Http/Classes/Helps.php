<?php

namespace App\Http\Classes;

use Hamcrest\Arrays\IsArray;

class Helps
{
  public function array2xml($root_element_name,$array){
    if(is_array($array) || is_object($array)){
      $child = "";
      foreach($array as $key => $row) {
        if(is_array($row)){
          foreach($row as $rowKey => $rowValue) {
            if(is_numeric($rowKey)) $rowKey = $key;
            $child .= $this->array2xml($rowKey,$rowValue);
          }
        }else{
          $child .= $this->array2xml($key,$row);
        }
      }
    }else{
      $child = $array;
    }
    if($root_element_name == 'value') $result = $child;
    else $result = "<".$root_element_name.">".$child."</".$root_element_name.">";
    return $result;
  }
}
