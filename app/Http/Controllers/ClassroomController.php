<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'capacity' => ['required', 'int'],
        ]);
    }

    public function index()
    {
        $classrooms = Classroom::all();

        return $classrooms;
    }

    protected function create(Request $request)
    {
        $data = $request->all();

        Classroom::create($data);

        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Classroom::where('id', $id)->update($data);

        return $data;
    }

    public function find($id)
    {
        $classroom = Classroom::where('id', $id)->get();

        return $classroom;
    }

    public function getBookings()
    {
        return $this->belongsToMany('App\Booking', 'classroom_id');
    }
}
