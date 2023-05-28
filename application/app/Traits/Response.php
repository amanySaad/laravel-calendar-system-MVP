<?php

namespace App\Traits;

use App\Services\Responses\ErrorResponse;
use App\Services\Responses\SuccessResponse;

trait Response
{

    protected $status_code = 200;
    protected $message_from_api_folder = true;
    protected function getStatusCode()
    {
        return $this->status_code;
    }

    protected function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
        return $this;
    }

    protected function respond($isSuccess, $msg, $data = null, $paginate = null, $header = [])
    {
        $errors = isset($msg['errors']) ? $msg['errors'] : null;
        $msg = isset($msg['errors']) ? $msg['message'] : $msg;
        $return = $this->getResponse($isSuccess, $msg, $errors, $data, $paginate);

        return \Response::json($return, $this->getStatusCode(), $header);
    }

    private function getResponse($isSuccess, $msg, $errors, $data, $paginate)
    {
        $response = [
            'code' =>  $this->getStatusCode(),
            'success' => $isSuccess,
            'message' => $this->message_from_api_folder ? __('api.' . $msg) : $msg,
        ];

        //Add errors to response
        if ($errors) {
            $response['errors'] = $errors;
        }

        //Add data to repsonse
        if (!empty($data)) {
            $response['data'] = $data;
        }


        if ($paginate) {
            $response['pagination'] = $paginate;
        }

        return $response;
    }

    public function success($data = null, $paginate = null)
    {
        return new SuccessResponse($data, $paginate);
    }

    public function error($data = null)
    {
        return new ErrorResponse($data);
    }
}
