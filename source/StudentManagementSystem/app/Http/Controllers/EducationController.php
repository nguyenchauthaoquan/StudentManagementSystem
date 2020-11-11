<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EducationController extends Controller
{

    public function groups() {
        $groups = Group::all();

        return response()->json($groups->jsonSerialize(), Response::HTTP_OK);
    }

    public function addGroup(Request $request) {
        $this->validate($request, [
            'id' => ['required'],
            'name' => ['required'],
            'system' => ['required'],
            'date_admission' => ['required', 'date'],
            'date_graduation' => ['required', 'date']
        ]);

        $group = new Group([
            'id' => $request['id'],
            'date_admission' => $request['date_admission'],
            'date_graduation' => $request['date_graduation']
        ]);

        return response()->json($group->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function updateGroup(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required'],
            'date_admission' => ['required', 'date'],
            'date_graduation' => ['required', 'date']
        ]);

        $group = Group::find($id);
        $group->update([
            'id' => $request['id'],
            'date_admission' => $request['date_admission'],
            'date_graduation' => $request['date_graduation']
        ]);

        return response()->json($group->jsonSerialize(), Response::HTTP_OK);
    }
}
