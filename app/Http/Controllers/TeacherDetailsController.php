<?php

namespace App\Http\Controllers;

use App\TeacherDetails;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class TeacherDetailsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'description' => ['required', 'string', 'max:1000'],
            'file' => ['string'],
            'date_hired' => ['required', 'string', 'date'],
            'phone_number' => ['required', 'string', 'digits:10'],
            'photo' => ['string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param $user_id
     * @return \App\User
     */
    protected function create(array $data, $user_id)
    {
        $data['phone_number'] = '+40'.$data['phone_number'];
        $details = User::find($user_id)->teacherDetails()->create($data);

        return $details;
    }

    public function addDetails(Request $request, $teacher_id) {

        $data = $request->all();

        if ($this->validator($data)->fails()) {
            return $this->sendError('Validation Error.', $this->validator($data)->errors());
        }

        $details = $this->create($data, $teacher_id);

        $success = ['description' => $details['description'], 'date_hired' => $details['date_hired']];

        return $this->sendResponse($success, 'User details created successfully.');
    }

    public function index() {
        return TeacherDetails::all();
    }

    public function show(User $id) {
        return $id->teacherDetails()->get();
    }
}
