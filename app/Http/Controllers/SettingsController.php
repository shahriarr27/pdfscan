<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

  public function get_setting() {
      return view('backend.setting.index');
  }

  public function product_settings() {
      return view('backend.setting.product');
  }
  public function store(Request $request)
  {
    // dd($request->all());
    foreach ($request->type as $key => $type) {
      $setting = Setting::where('key', $type)->first();
      if (isset($setting)) {
        if ($request->hasFile($type)) {
          $file = $request->file($type);
          $ext = $file->getClientOriginalExtension();
          if (\file_exists(\public_path() . '/app_assets/img/' . $setting->value)) {
            @\unlink(\public_path() . '/app_assets/img/' . $setting->value);
          }
          $name = \uniqid() . '.' . $ext;
          $file->move(\public_path('app_assets'), $name);
          $setting->value = $name;
          $setting->is_image = 1;
        } else {
          $setting->value = $request->$type;
        }
        if ($request->$type) {
          $setting->save();
        }
      } else {
        $setting = new Setting();
        $setting->key = $type;
        if ($request->hasFile($type)) {
          $file = $request->file($type);
          $ext = $file->getClientOriginalExtension();
          $name = \uniqid() . '.' . $ext;
          $file->move(\public_path('app_assets'), $name);
          $setting->value = $name;
          $setting->is_image = 1;
        } else {
          $setting->value = $request->$type;
        }
        if ($request->$type) {
          $setting->save();
        }
      }
    }

    return \redirect()->back()->withSuccess("Settings Updated Successfully");
  }

  public function envSettingStore(Request $request)
  {
    foreach ($request->type as $type) {
      $this->setEnv($type, $request->$type);
      $setting = Setting::where('key', $type)->first();
      if (isset($setting)) {
        $setting->value = $request->$type;
        $setting->save();
      } else {
        $setting = new Setting();
        $setting->key = $type;
        $setting->value = $request->$type;
        $setting->save();
      }
    }

    return \redirect()->back()->withSuccess("Settings Updated Successfully");
  }

  private function overWriteEnvFile($key, $value)
  {
    $path = app()->environmentFilePath();

    $escaped = preg_quote('=' . env($key), '/');

    file_put_contents($path, preg_replace(
      "/^{$key}{$escaped}/m",
      "{$key}={$value}",
      file_get_contents($path)
    ));
  }
  private function setEnv($key, $value)
  {
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
        ));
    }
  }
}
