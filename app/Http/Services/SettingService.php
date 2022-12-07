<?php

namespace App\Http\Services;

use App\Http\Repositories\SettingRepository;
use App\Http\Repositories\ReferenceRepository;

class SettingService
{
    private $settingRepository;
    private $referenceRepository;

    public function __construct()
    {
        $this->settingRepository = new SettingRepository();
        $this->referenceRepository = new ReferenceRepository();
    }

    public function updateSetting($req)
    {
        $validation = false;

        if($req->value == null)
            $validation = true;
        if($this->referenceRepository->find($req->value) == null)
            $validation = true;

        if($validation == false){
            $setting = $this->settingRepository->firstSetting();
            $setting->value = $req->value;
            $this->settingRepository->updateSetting($setting);

            $response = array(
                'status' => 200,
                'data' => $this->settingRepository->firstSetting(),
            );
        }else{
            $response = array(
                'status' => 500,
                'data' => 'Value Null',
            );
        }

        return response()->json($response);
    }
}