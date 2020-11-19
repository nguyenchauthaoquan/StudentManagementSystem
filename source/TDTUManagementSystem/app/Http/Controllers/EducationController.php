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
        return view('education.groups.list', [
            'groups' => $groups
        ]);
    }

    public function viewGroup($id) {
        $group = Group::find($id);
        return view('education.groups.detail', [
            'group' => $group,
            'faculty' => Faculty::find($group->id_faculty),
            'training' => TrainingProgram::find($group->id_training)
        ]);
    }

    public function createGroup() {
        return view('education.groups.create');
    }

    public function editGroup($id) {
        $group = Group::find($id);
        return view('education.groups.update', [
            'group' => $group
        ]);
    }

    public function addGroup(Request $request) {
        $this->validate($request, [
            'name' => ['required'],
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

       $training_program->groups()->attach($faculty, [
           'name' => $request['name'],
           'date_admission'=> $request['date_admission'],
           'date_graduation' => $request['date_graduation']
       ]);

        return redirect('/admin/groups')->with('success', 'A new group is created');
    }

    public function updateGroup(Request $request, $id) {
        $group = Group::find($id);
        $group->update([
            'name' => $request['name'],
            'date_admission' => $request['date_admission'],
            'date_graduation' => $request['date_graduation']
        ]);

        return redirect('/admin/groups')->with('success', 'Update successful');
    }
}
