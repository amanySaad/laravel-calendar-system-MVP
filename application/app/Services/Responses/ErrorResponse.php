<?php

namespace App\Services\Responses;


use App\Traits\Responses\Response;

class ErrorResponse
{
    use Response;
    private $message;
    private $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    protected function responseError()
    {
        return $this->respond(false, $this->message, $this->data);
    }

    public function NotFound($message = 'not_found')
    {
        $this->message = $message;
        return $this->setStatusCode(404)->responseError();
    }
    public function modelNotFound($message = 'not_found')
    {
        $this->message = $message;
        return $this->setStatusCode(404)->responseError();
    }

    public function unauthenticated($message = 'unauthenticated')
    {
        $this->message = $message;
        return $this->setStatusCode(401)->responseError();
    }


    public function unauthorized($message = 'unauthorized')
    {
        $this->message = $message;
        return $this->setStatusCode(401)->responseError();
    }
    public function noAuth($message = 'no_auth')
    {
        $this->message = $message;
        return $this->setStatusCode(422)->responseError();
    }

    public function BadRequest($message = 'bad_request')
    {
        $this->message = $message;
        return $this->setStatusCode(400)->responseError();
    }

    public function server($message = 'server_error')
    {
        $this->message = $message;
        return $this->setStatusCode(500)->responseError();
    }

    public function validation($message, $fromApiFolder = true)
    {
        $this->message_from_api_folder = $fromApiFolder;
        $this->message = $message;
        return $this->setStatusCode(422)->responseError();
    }

    public function UnsupportedMedia($message = 'unsupported_media')
    {
        $this->message = $message;
        return $this->setStatusCode(415)->responseError();
    }

    public function forbidden($message = 'forbidden')
    {
        $this->message = $message;
        return $this->setStatusCode(403)->responseError();
    }

}
