<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'booker_id' => ['required', 'int'],
            'classroom_id' => ['required', 'int'],
            'start' => ['required', 'string'],
            'end' => ['required', 'string'],
            'name' => ['required', 'string'],
            'color' => ['required', 'string'],
        ]);
    }

    public function index()
    {
        $bookings = Booking::all();

        return $bookings;
    }

    protected function create(Request $request)
    {
        $data = $request->all();
        $userLegitimationId = User::where('id', $data['booker_id'])->get('legitimation_id')->first()->attributesToArray();

        if (mb_substr($userLegitimationId['legitimation_id'], 0, 1) != 'P') {
            return "You don't have enough permissions for this action.";
        }

        Booking::create($data);

        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Booking::where('id', $id)->update($data);

        return $data;
    }

    public function find($id)
    {
        $booking = Booking::where('id', $id)->get();

        return $booking;
    }

    public function getClassroom()
    {
        return $this->hasOne('App\Classroom', 'classroom_id');
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'booker_id');
    }
}
