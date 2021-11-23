<?php

namespace App\Http\Classes;
use Illuminate\Http\Request;
use App\Http\Classes;
use \DTS\eBaySDK\Trading\Services;


class KeyEbay
{
  private $type = 'production';
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
              'devId' => '30b3ac88-f7ef-40e3-82f1-a47f187be899',
              'appId' => 'Atok-09066558-PRD-e7f4c67ed-338042d8',
              'certId' => 'PRD-7f4c67ed720f-0392-4164-97ce-7623',
          ],
          'authToken' => '',
          'oauthUserToken' => '',
          'ruName' => 'Atok-Atok-09066558-P-whuqwkw'
      ]
  ];
  public function KeyAuth($authToken,$siteId){
    $this->config[$this->type]['authToken'] = $authToken;
    $service = new Services\TradingService([
        'authToken' => $this->config[$this->type]['authToken'],
        'credentials' => $this->config[$this->type]['credentials'],
        'production'     => ($this->type === 'production' ? true : false),
        'apiVersion'=> '899',
        'siteId'      => $siteId
    ]);
    return $service;
  }
}
