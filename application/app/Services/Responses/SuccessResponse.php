<?php

namespace App\Services\Responses;

use App\Traits\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class SuccessResponse
{
    use Response;
    private $message;
    private $data;
    private $paginate;

    public function __construct($data = null, $paginate = null)
    {
        $this->data = $data;
        $this->paginate = $paginate;
    }

    private function responseSuccess()
    {
        return $this->respond(true, $this->message, $this->data, $this->paginate);
    }

    public function created($message = 'created')
    {
        $this->message = $message;
        return $this->setStatusCode(201)->responseSuccess();
    }

    public function deleted($message = 'deleted')
    {
        $this->message = $message;
        return $this->setStatusCode(200)->responseSuccess();
    }

    public function updated($message = 'updated')
    {
        $this->message = $message;
        return $this->responseSuccess();
    }

    /**
     * When a new user is registered
     */
    public function registered()
    {
        $this->message = 'registered';
        return $this->setStatusCode(201)->responseSuccess();
    }

    /**
     * When a new user is logged in
     */
    public function loggedIn()
    {
        $this->message = 'logged_in';
        return $this->setStatusCode(201)->responseSuccess();
    }


    public function loggedOut()
    {
        $this->message = 'logged_out';
        return $this->setStatusCode(200)->responseSuccess();
    }

    public function custom($message)
    {
        $this->message = $message;
        return $this->responseSuccess();
    }

    public function data($message = 'success')
    {
        $this->message = $message;
        return $this->responseSuccess();
    }
    public function CartEmpty($message = 'empty_cart')
    {
        $this->message = $message;
        return $this->responseSuccess();
    }

    public function pagination(LengthAwarePaginator $items, $except = [], $message = 'success')
    {
        $filters = !empty(http_build_query(request()->except($except))) ? "&" . http_build_query(request()->except($except)) : '';

        $pagination = [
            'total' => $items->total(),
            'per_page' => $items->perPage(),
            'next_page_url' => $items->nextPageUrl() ? $items->nextPageUrl() : null,
            'prev_page_url' => $items->previousPageUrl() ? $items->previousPageUrl() : null,
            'current_page' => $items->currentPage(),
            'last_page' => $items->lastPage(),
            'from' => $items->firstItem(),
            'to' => $items->lastItem(),
        ];
        $this->message = $message;
        $this->paginate = $pagination;

        return $this->responseSuccess();
    }


}
