<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Gửi thông báo thành công.
     *
     * @param  string  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendSuccessMessage($message)
    {
        Session::flash('success', $message);
        return redirect()->back();
    }

    /**
     * Gửi thông báo lỗi.
     *
     * @param  string  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendErrorMessage($message)
    {
        Session::flash('error', $message);
        return redirect()->back();
    }
}
