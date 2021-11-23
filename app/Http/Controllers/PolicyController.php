<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DTS\eBaySDK\Constants;
use App\Policy;
use \DTS\eBaySDK\BusinessPoliciesManagement\Services;
use \DTS\eBaySDK\BusinessPoliciesManagement\Types;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
   
    public function policy(Request $rq,$id){
        $authToken = $rq->authToken;
        $this->config[$this->type]['authToken'] = $authToken;
        $service = new Services\BusinessPoliciesManagementService([
            'credentials' =>  $this->config[$this->type]['credentials'],
            'authToken'   =>   $this->config[$this->type]['authToken'],
            'globalId'    => Constants\GlobalIds::US
        ]);
        $request = new Types\GetSellerProfilesRequest();
        $response = $service->getSellerProfiles($request);
        if ($response->ack !== 'Success') {
            if (isset($response->errorMessage)) {
                foreach ($response->errorMessage->error as $error) {
                    printf("Error: %s\n", $error->message);
                }
            }
        } else {
            if (isset($response->paymentProfileList) && isset($response->returnPolicyProfileList) && isset($response->shippingPolicyProfile)) {
                
                foreach ( $response->paymentProfileList->PaymentProfile as $profile)
                {   
                    Policy::updateOrCreate([
                        'ebay_id' => $id,
                        'name' => $profile->profileName,
                    ],
                    [   
                        'profile_id' => $profile->profileId,
                        'type' => $profile->profileType,
                        
                        'description' => $profile->profileDesc,
                    ]);
                }
                foreach ($response->returnPolicyProfileList->ReturnPolicyProfile as $profile) {
                    Policy::updateOrCreate([
                        'ebay_id' => $id,
                        'name' => $profile->profileName,
                    ],
                    [
                        'profile_id' => $profile->profileId,
                        'type' => $profile->profileType,
                        'description' => $profile->profileDesc,
                    ]);
                }
                foreach ($response->shippingPolicyProfile->ShippingPolicyProfile as $profile) {
                    Policy::updateOrCreate([
                        'ebay_id' => $id,
                        'name' => $profile->profileName,
                    ],
                    [
                        'profile_id' => $profile->profileId,
                        'type' => $profile->profileType,
                        'description' => $profile->profileDesc,
                    ]);
                }
                $payment = Policy::where('type','PAYMENT')->where('name','!=',$rq['default_payment'])->where('ebay_id',$id)->get();
                $return_policy = Policy::where('type','RETURN_POLICY')->where('name','!=',$rq['default_return'])->where('ebay_id',$id)->get();
                $shipping = Policy::where('type','SHIPPING')->where('name','!=',$rq['default_shipping'])->where('ebay_id',$id)->get();
                return response()->json([
                    'success' => true,
                    'payment' => $payment,
                    'return' => $return_policy,
                    'shipping' => $shipping,
                ]);
               
            }
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

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
