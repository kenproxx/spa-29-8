<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, $exception)
    {
        if ($this->isHttpException($exception)) {
            $numLog = 'xxx';
            $message = "Lỗi không xác định";

            if ($exception->getStatusCode() == 404) {
                $numLog = 404;
                $img = 'errorimg.svg';
                $message = "Không tìm thấy trang";
            }
            if ($exception->getStatusCode() == 403) {
                $numLog = 403;
                $img = 'website-under-construction.gif';
                $message = "Bạn không có quyền truy cập";
            }
            if ($exception->getStatusCode() == 500) {
                $numLog = 500;
                $img = 'maintenance.svg';
                $message = "Lỗi server";
            }
            return response()->view('backend.widgets.error', compact('numLog', 'message', 'img'), $numLog);
        }

        return parent::render($request, $exception);
    }

}
