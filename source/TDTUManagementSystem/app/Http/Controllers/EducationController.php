<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function faculties() {
        return view('education.faculties.list', ['faculties' => Faculty::all()]);
    }

    public function createFaculty() {
        return view('education.faculties.create');
    }

    public function viewFaculty($id) {
        $faculty = Faculty::find($id);
        $group = Group::where('id_faculty', $faculty->id)->with('students')->get();

        return view('education.faculties.detail', [
            'id' => $id,
            'faculty' => $faculty,
            'groups' => $group
        ]);
    }

    public function editFaculty($id) {
        $faculty = Faculty::find($id);
        return view('education.faculties.update', ['id' => $id, 'faculty' => $faculty]);
    }

    public function addFaculty(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'max:2'],
            'name' => ['required']
        ]);

        $faculty = Faculty::create([
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        return redirect('/admin/faculties')
            ->with('success', 'A new Faculty has been added successful');
    }

    public function updateFaculty(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required', 'max:2'],
            'name' => ['required']
        ]);

        $faculty = Faculty::find($id);

        $faculty->update([
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        return redirect('/admin/faculties')
            ->with('success', 'Faculty has been updated successful');
    }

    public function groups() {
        $groups = Group::all();
        return view('education.groups.list', ['groups' => $groups]);
    }

    public function viewGroup($id) {
        $group = Group::find($id);
        return view('education.groups.detail', [
            'group' => $group
        ]);
    }

    public function createGroup() {
        return view('education.groups.create');
    }

    public function editGroup($id) {
        return view('education.groups.update', ['group' => Group::find($id)]);
    }

    public function addGroup(Request $request) {
        $this->validate($request, [
            'id' => ['required'],
            'faculty' => ['required'],
            'program_name' => ['required'],
            'program_system' => ['required'],
            'date_admission' => ['required', 'date'],
            'date_graduation' => ['required', 'date']
        ]);
        $training_program = TrainingProgram::firstOrCreate(
            ['name' => $request['program_name']],
            ['name' => $request['program_name'], 'system' => $request['program_system']]
        );
        $faculty = Faculty::where('name', $request['faculty'])->get();

       $training_program->faculties()->attach($faculty, [
           'id_group' => $request['id'],
           'date_admission'=> $request['date_admission'],
           'date_graduation' => $request['date_graduation']
       ]);

        return redirect('/admin/groups')->with('success', 'A new group is created');
    }

    public function updateGroup(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required'],
            'faculty' => ['require'],
            'program_name' => ['required'],
            'program_system' => ['required'],
            'date_admission' => ['required', 'date'],
            'date_graduation' => ['required', 'date']
        ]);

        $group = Group::find($id);
        $group->update([
            'id' => $request['id'],
            'faculty' => $request['faculty'],
            'program_name' => $request['program_name'],
            'program_system' =>$request ['program_system'],
            'date_admission' => $request['date_admission'],
            'date_graduation' => $request['date_graduation']
        ]);
        $training_program = TrainingProgram::firstOrCreate(
            [
                'name' => $request['program_name']
            ],
            [
                'name' => $request['program_name'],
                'program_system' => $request['program_system']
            ]
        );
        $group->training_program()->associate($training_program)->save();
        $group->faculty()->associate(Faculty::where('name', $request['faculty']))->save();

        return redirect('/admin/groups')->with('success', 'Update successful');
    }
}
