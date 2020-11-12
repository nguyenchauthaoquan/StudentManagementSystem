<?php

namespace App\Http\Controllers;

use App\Models\Background;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{
    //
    public function students() {
        return view('students.list', ['students' => Student::all()]);
    }

    public function addStudent(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Model\Student,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'group' => ['required'],
            'birthday' => ['required', 'date'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'religion' => ['nullable'],
            'kin' => ['nullable'],
            'id_number' => ['required'],
            'place_of_id_number' => ['required'],
            'nationality' => ['required'],
            'major' => ['required'],
            'talents' => ['nullable'],
            'date_of_union' => ['nullable', 'date'],
            'date_of_communist' => ['nullable', 'date'],
            'date_of_student_union' => ['nullable', 'date'],
            'date_of_dormitory' => ['nullable', 'date'],
            'room_of_dormitory' => ['nullable']
        ]);
        $student = new Student([
            'id' => $request['id'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'birthday' => $request['birthday'],
            'place_of_birth' => $request['place_of_birth'],
            'origin' => $request['origin'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'religion' => $request['religion'],
            'kin' => $request['kin'],
            'id_number' => $request['id_number'],
            'place_of_id_number' => $request['place_of_id_number'],
            'nationality' => $request['nationality'],
            'major' => $request['major'],
            'talents' => $request['talents'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_student_union'],
            'date_of_dormitory' => $request['date_of_dormitory'],
            'room_of_dormitory' => $request['room_of_dormitory']
        ]);
        $group = Group::find($request['group']);

        if ($group) {
            $student->group()->associate($group);
            $student->save();
        }

        return redirect('/admin/students')->with('success', 'A new student is imported');
    }

    public function createStudent() {
        return view('students.form');
    }

    public function updateStudent(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Model\Student,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'group' => ['required'],
            'birthday' => ['required'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['nullable', 'email'],
            'religion' => ['nullable'],
            'kin' => ['nullable'],
            'id_number' => ['required'],
            'place_of_id_number' => ['required'],
            'nationality' => ['required'],
            'major' => ['required'],
            'talents' => ['nullable'],
            'date_of_union' => ['nullable', 'date'],
            'date_of_communist' => ['nullable', 'date'],
            'date_of_student_union' => ['nullable', 'date'],
            'date_of_dormitory' => ['nullable', 'date'],
            'room_of_dormitory' => ['nullable']
        ]);
        $student = Student::find($id);
        $student->update([
            'id' => $request['id'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'birthday' => $request['birthday'],
            'place_of_birth' => $request['place_of_birth'],
            'origin' => $request['origin'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'religion' => $request['religion'],
            'kin' => $request['kin'],
            'id_number' => $request['id_number'],
            'place_of_id_number' => $request['place_of_id_number'],
            'nationality' => $request['nationality'],
            'major' => $request['major'],
            'talents' => $request['talents'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_student_union'],
            'date_of_dormitory' => $request['date_of_dormitory'],
            'room_of_dormitory' => $request['room_of_dormitory']
        ]);
        $group = Group::find($request['group']);
        if ($group) {
            $student->group()->associate($group);
            $student->save();
        }

        return redirect('/admin/students/profile')->with('success', 'Update Successful');
    }

    public function editStudent($id) {
        return view('students.form', ['id' => $id]);
    }

    public function viewStudent($id) {
        $student = Student::with(['backgrounds', 'policies', 'group'])->find($id);

        return view('students.profile', ['student' => $student]);
    }

    public function teachers() {
        return response()->json(Teacher::with('faculty', 'backgrounds', 'policies')->get()->jsonSerialize(), Response::HTTP_OK);
    }

    public function addTeacher(Request $request) {
        $this->validate($request, [
            'id' => ['required', ' unique:App\Models\Teacher,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'faculty' => ['required'],
            'birthday' => ['required'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['nullable', 'email'],
            'academic_rank' => ['nullable'],
            'degree' => ['nullable'],
            'religion' => ['nullable'],
            'kin' => ['nullable'],
            'id_number' => ['required'],
            'place_of_id_number' => ['required'],
            'nationality' => ['required'],
            'talents' => ['nullable'],
            'date_of_union' => ['nullable', 'date'],
            'date_of_communist' => ['nullable', 'date'],
            'date_of_student_union' => ['nullable', 'date'],
        ]);
        $teacher = new Teacher([
            'id' => $request['id'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'faculty' => $request['faculty'],
            'birthday' => $request['birthday'],
            'place_of_birth' => $request['place_of_birth'],
            'origin' => $request['origin'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'academic_rank' => $request['academic_rank'],
            'degree' => $request['degree'],
            'religion' => $request['religion'],
            'kin' => $request['kin'],
            'id_number' => $request['id_number'],
            'place_of_id_number' => $request['place_of_id_number'],
            'nationality' => $request['nationality'],
            'talents' => $request['talents'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_communist'],
        ]);

        $faculty = Faculty::find($request['faculty']);

        if ($faculty) {
            $teacher->faculty()->associate($faculty);
            $teacher->save();
        }

        return response()->json($teacher->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function updateTeacher(Request $request, $id) {
        $this->validate($request, [
            'id' => ['required', ' unique:App\Models\Teacher,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'faculty' => ['required'],
            'birthday' => ['required'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['nullable', 'email'],
            'academic_rank' => ['nullable'],
            'degree' => ['nullable'],
            'religion' => ['nullable'],
            'kin' => ['nullable'],
            'id_number' => ['required'],
            'place_of_id_number' => ['required'],
            'nationality' => ['required'],
            'talents' => ['nullable'],
            'date_of_union' => ['nullable', 'date'],
            'date_of_communist' => ['nullable', 'date'],
            'date_of_student_union' => ['nullable', 'date'],
        ]);

        $teacher = Teacher::find($id);
        $teacher->update([
            'id' => $request['id'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'faculty' => $request['faculty'],
            'birthday' => $request['birthday'],
            'place_of_birth' => $request['place_of_birth'],
            'origin' => $request['origin'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'academic_rank' => $request['academic_rank'],
            'degree' => $request['degree'],
            'religion' => $request['religion'],
            'kin' => $request['kin'],
            'id_number' => $request['id_number'],
            'place_of_id_number' => $request['place_of_id_number'],
            'nationality' => $request['nationality'],
            'talents' => $request['talents'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_communist'],
        ]);
        $faculty = Faculty::where('name',$request['faculty'])->get();

        if ($faculty) {
            $teacher->faculty()->associate($faculty);
            $teacher->save();
        }
        return response()->json($teacher->jsonSerialize(), Response::HTTP_OK);
    }

    public function viewTeacher($id) {
        $teacher = Teacher::with(['backgrounds', 'policies', 'group'])->find($id);

        return response()->json($teacher->jsonSerialize(), Response::HTTP_OK);
    }

    public function addBackground(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required'],
            'relationship' => ['required'],
            'birthday' => ['nullable', 'date'],
            'phone' => ['required'],
            'job' => ['nullable'],
            'email' => ['nullable', 'email'],
            'resident' => ['nullable'],
            'workplace' => ['nullable'],
            'incomes_source' => ['nullable'],
            'career' => ['nullable'],
            'description' => ['nullable']
        ]);
        $student = Student::find($id);
        $teacher = Teacher::find($id);

        if ($student) {
            $student->backgrounds()->save(
                new Background([
                    'name' => $request['name'],
                    'relationship' => $request['relationship'],
                    'birthday' => $request['birthday'],
                    'phone' => $request['phone'],
                    'job' => $request['job'],
                    'email' => $request['email'],
                    'resident' => $request['resident'],
                    'workplace' => $request['workplace'],
                    'incomes_source' => $request['incomes_source'],
                    'career' => $request['career'],
                    'description' => $request['description']
                ])
            );

            return response()->json(Student::with('backgrounds')->get()->jsonSerialize(), Response::HTTP_CREATED);
        }
        if ($teacher) {
            $teacher->backgrounds()->save(
                new Background([
                    'name' => $request['name'],
                    'relationship' => $request['relationship'],
                    'birthday' => $request['birthday'],
                    'phone' => $request['phone'],
                    'job' => $request['job'],
                    'email' => $request['email'],
                    'resident' => $request['resident'],
                    'workplace' => $request['workplace'],
                    'incomes_source' => $request['incomes_source'],
                    'career' => $request['career'],
                    'description' => $request['description']
                ])
            );

            return response()->json(Teacher::with('backgrounds')->get()->jsonSerialize(), Response::HTTP_CREATED);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function updateBackground(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required'],
            'relationship' => ['required'],
            'birthday' => ['nullable', 'date'],
            'phone' => ['required'],
            'job' => ['nullable'],
            'email' => ['nullable', 'email'],
            'resident' => ['nullable'],
            'workplace' => ['nullable'],
            'incomes_source' => ['nullable'],
            'career' => ['nullable'],
            'description' => ['nullable']
        ]);
        $student = Student::find($id);
        $teacher = Teacher::find($id);

        if ($student) {
            $student->backgrounds()->save(new Background([
                'name' => $request['name'],
                'relationship' => $request['relationship'],
                'birthday' => $request['birthday'],
                'phone' => $request['phone'],
                'job' => $request['job'],
                'email' => $request['email'],
                'resident' => $request['resident'],
                'workplace' => $request['workplace'],
                'incomes_source' => $request['incomes_source'],
                'career' => $request['career'],
                'description' => $request['description']
            ]));

            return response()->json(Student::with('backgrounds')->get()->jsonSerialize(), Response::HTTP_OK);
        }

        if ($teacher) {
            $teacher->backgrounds()->saveMany([
                new Background([
                    'name' => $request['name'],
                    'relationship' => $request['relationship'],
                    'birthday' => $request['birthday'],
                    'phone' => $request['phone'],
                    'job' => $request['job'],
                    'email' => $request['email'],
                    'resident' => $request['resident'],
                    'workplace' => $request['workplace'],
                    'incomes_source' => $request['incomes_source'],
                    'career' => $request['career'],
                    'description' => $request['description']
                ])
            ]);

            return response()->json(Teacher::with('backgrounds')->get()->jsonSerialize(), Response::HTTP_OK);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
