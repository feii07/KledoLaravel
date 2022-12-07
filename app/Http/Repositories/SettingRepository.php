<?php

namespace App\Http\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function updateSetting($model)
    {
        return $model->save();
    }

    public function firstSetting()
    {
        return Setting::first();
    }
}