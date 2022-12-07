<?php

namespace App\Http\Controllers;

use App\Http\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingService;

    public function __construct()
    {
        $this->settingService = new SettingService();
    }

    public function updateSetting(Request $req)
    {
        return $this->settingService->updateSetting($req);
    }
}
