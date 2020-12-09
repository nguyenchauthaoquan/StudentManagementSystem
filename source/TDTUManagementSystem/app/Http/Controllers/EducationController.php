<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function training_programs() {
        return view('education.training_programs.list',[
            'programs' => TrainingProgram::all()
        ]);
    }
    public function createTrainingProgram() {
        return view('education.training_programs.create');
    }
    public function editTrainingProgram($id) {
        return view('education.training_programs.update', [
            'program' => TrainingProgram::find($id),
        ]);
    }
    public function addTrainingProgram(Request $request) {
        $this->validate($request,[
            'name' => ['required'],
            'system' => ['required']
        ],[
            'name.required' => 'Tên chương trình đào tạo không được bỏ trống'
        ]);

        TrainingProgram::create([
            'name' => $request['name'],
            'system' => $request['system'],
            'status' => $request['status']
        ]);

        return redirect('admin/programs');
    }

    public function updateTrainingProgram(Request $request, $id) {
        $this->validate($request,[
            'name' => ['required'],
            'system' => ['required']
        ],[
            'name.required' => 'Tên chương trình đào tạo không được bỏ trống',
            'system.required' => 'Hệ đào tạo không được bỏ trống'
        ]);

        $training_program = TrainingProgram::find($id);
        $training_program->update([
            'name' => $request['name'],
            'system' => $request['system'],
            'status' => $request['status']
        ]);

        return redirect('admin/programs');
    }

    public function deleteTrainingProgram($id) {
        TrainingProgram::find($id)->update([
            'status' => 'Đóng lại'
        ]);

        return redirect('/admin/programs');
    }

    public function faculties() {
        return view('education.faculties.list', [
            'faculties' => Faculty::all()
        ]);
    }

    public function createFaculty() {
        return view('education.faculties.create');
    }

    public function viewFaculty($id) {
        $faculty = Faculty::find($id);

        return view('education.faculties.detail', [
            'id' => $id,
            'faculty' => $faculty,
            'groups' => Group::where('id_faculty', $faculty->id)->get()
        ]);
    }

    public function editFaculty($id) {
        $faculty = Faculty::find($id);
        return view('education.faculties.update', ['id' => $id, 'faculty' => $faculty]);
    }

    public function addFaculty(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Faculty,id'],
            'name' => ['required', 'unique:App\Models\Faculty,name']
        ], [
            'id.required' => 'Mã Khoa hay mã phòng ban không được bỏ trống',
            'id.unique' => 'Mã Khoa hay mã phòng ban đã tồn tại',
            'name.required' => 'Tên Khoa hay tên phòng ban không được bỏ trống',
            'name.unique' => 'Tên Khoa hay tên phòng ban không được bỏ trống',
        ]);

        Faculty::create([
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        return redirect('/admin/faculties')
            ->with('success', 'A new Faculty has been added successful');
    }

    public function updateFaculty(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Faculty,id'],
            'name' => ['required', 'unique:App\Models\Faculty,name']
        ], [
            'id.required' => 'Mã Khoa hay mã phòng ban không được bỏ trống',
            'id.unique' => 'Mã Khoa hay mã phòng ban đã tồn tại',
            'name.required' => 'Tên Khoa hay tên phòng ban không được bỏ trống',
            'name.unique' => 'Tên Khoa hay tên phòng ban không được bỏ trống',
        ]);

        $faculty = Faculty::find($id);

        $faculty->update([
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        return redirect('/admin/faculties')
            ->with('success', 'Faculty has been updated successful');
    }
    public function createMajor($id) {
        return view('education.faculties.majors.create', [
            'faculty' => Faculty::find($id),
            'programs' => TrainingProgram::all()
        ]);
    }
    public function editMajor($id) {
        $major = Major::find($id);
        return view('education.faculties.majors.update', [
            'major' => $major,
            'faculty_major' => Faculty::find($major->id_faculty),
            'program_major' => TrainingProgram::find($major->id_training),
            'faculties' => Faculty::all(),
            'programs' => TrainingProgram::all()
        ]);
    }
    public function addMajor(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required'],
            'name' => ['required']
        ], [
            'id.required' => 'Mã nghành không được bỏ trống',
            'name.required' => 'Tên nghành không được bỏ trống'
        ]);

        $training_program = TrainingProgram::where('name', $request['program_name'])
            ->where('system', $request['program_system'])
            ->first();
        $faculty = Faculty::find($id);
        $faculty->majors()->attach($training_program->id, [
            'id' => $request['id'],
            'name' => $request['name']
        ]);
        return redirect('/admin/faculties/view/id='.$faculty->id);

    }

    public function updateMajor(Request $request, $id) {
        $major = Major::find($id);
        $faculty = Faculty::find($major->id_faculty);
        $training_program = TrainingProgram::where('name', $request['program_name'])
            ->where('system', $request['program_system'])
            ->first();
        $major->update([
            'id_faculty' => $faculty->id,
            'id_training' => $training_program->id,
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        return redirect('/admin/faculties/view/id='.$faculty->id);
    }

    public function groups() {
        return view('education.groups.list', [
            'faculties' => Faculty::all()
        ]);
    }

    public function viewGroup($id) {
        $group = Group::find($id);
        $faculty = Faculty::find($group->id_faculty);
        $program = TrainingProgram::find($group->id_training);
        return view('education.groups.detail', [
            'group' => $group,
            'faculty' => $faculty,
            'program' => $program,
        ]);
    }

    public function createGroup() {
        return view('education.groups.create', [
            'programs' => TrainingProgram::all(),
            'faculties' => Faculty::all()
        ]);
    }

    public function editGroup($id) {
        $group = Group::find($id);
        return view('education.groups.update', [
            'group' => $group,
            'programs' => TrainingProgram::all(),
            'program_group' => TrainingProgram::find($group->id_training),
            'faculties' => Faculty::all()->unique('name'),
            'faculty_group' => Faculty::find($group->id_faculty)
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
        ], [
            'name.required' => 'Tên lớp không được bỏ trống',
            'faculty.required' => 'Tên khoa không được bỏ trống',
            'program_name.required' => 'Tên chương trình đào tạo không được bỏ trống',
            'program_system.required' => 'Hệ đào tạo không được bỏ trống',
            'date_admission.required' => 'Thời gian tuyển sinh không được bỏ trống',
            'date_admission.date' => 'Thời gian tuyển sinh không hợp lệ',
            'date_graduation.required' => 'Thời gian tốt nghiệp không được bỏ trống',
            'date_graduation.date' => 'Thời gian tốt nghiệp không hợp lệ',
        ]);
        $training_program = TrainingProgram::where('name', $request['program_name'])
                                            ->where('system', $request['program_system'])
                                            ->first();
        $faculty = Faculty::find($request['faculty']);

        $faculty->groups()->attach($training_program->id, [
           'name' => $request['name'],
           'date_admission'=> $request['date_admission'],
           'date_graduation' => $request['date_graduation']
       ]);

        return redirect('/admin/groups')->with('success', 'A new group is created');
    }

    public function updateGroup(Request $request, $id) {
        $group = Group::find($id);

        $training_program = TrainingProgram::where('name', $request['program_name'])
            ->where('system', $request['program_system'])
            ->first();

        $faculty = Faculty::find($request['faculty']);
        $group->update([
            'id_training' => $training_program->id,
            'id_faculty' => $faculty->id,
            'name' => $request['name'],
            'date_admission' => $request['date_admission'],
            'date_graduation' => $request['date_graduation']
        ]);

        return redirect('/admin/groups')->with('success', 'Update successful');
    }
}
