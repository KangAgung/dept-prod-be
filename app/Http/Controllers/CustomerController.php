<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;

class CustomerController extends Controller
{
    public function index()
    {
        try {
            $data = Customer::all();

            return response()
                ->json(['status' => 'success', 'data' => $data]);

        } catch (Exception $exception) {
            return response()
                ->json(['status' => 'error','message' => $exception->getMessage()],500);
        }
    }
}
