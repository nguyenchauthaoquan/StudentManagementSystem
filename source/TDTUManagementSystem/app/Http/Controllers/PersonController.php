<?php

namespace App\Http\Controllers;

use App\Models\Background;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Policy;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function home() {
        return view('dashboard');
    }

    public function students() {
        return view('students.list', ['students' => Student::all()]);
    }

    public function addStudent(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Student,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'group' => ['required'],
            'birthday' => ['required', 'date'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
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
            'incomes' => ['nullable'],
            'career' => ['nullable'],
            'description' => ['nullable'],
            'date_of_union' => ['nullable', 'date'],
            'date_of_communist' => ['nullable', 'date'],
            'date_of_student_union' => ['nullable', 'date'],
            'date_of_dormitory' => ['nullable', 'date'],
            'room_of_dormitory' => ['nullable'],
            'military' => ['nullable'],
            'volunteer' => ['nullable']
        ], [
            'id.required' => 'Mã số sinh viên không được bỏ trống',
            'firstname.required' => 'Họ tên không được bỏ trống',
            'lastname.required' => 'Họ tên không được bỏ trống',
            'group.required' => 'Lớp học không được bỏ trống',
            'birthday.required' => 'Ngày tháng năm sinh không được bỏ trống',
            'birthday.date' => 'Ngày tháng năm sinh không hợp lệ',
            'place_of_birth.required' => 'Nơi sinh không được bỏ trống',
            'origin.required' => 'Nguyên quán không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'address.required' => 'Địa chỉ của sinh viên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không hợp lệ',
            'id_number.required' => 'Số CMND không được bỏ trống',
            'place_of_id_number.required' => 'Nơi cấp CMND không được bỏ trống',
            'nationality.required' => 'Quốc tịch không được bỏ trống',
            'major.required' => ' Nghành của sinh viên không được bỏ trống',
            'date_of_union.date' => 'Thời gian vào đoàn không hợp lệ',
            'date_of_communist.date' => 'Thời gian vào đảng không hợp lệ',
            'date_of_student_union.date' => 'Thơi gian vào hội sinh viên không hợp lệ',
            'date_of_dormitory.date' => 'Thời gian ở ký túc xá không hợp lệ',
        ]);

        $group = Group::where('name', $request['group'])->first();
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
            'incomes' => $request['incomes'],
            'career' => $request['career'],
            'description' => $request['description'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_student_union'],
            'date_of_dormitory' => $request['date_of_dormitory'],
            'room_of_dormitory' => $request['room_of_dormitory'],
            'military' => $request['military'],
            'volunteer' => $request['volunteer']
        ]);
        $student->group()->associate($group)->save();

        return redirect('/admin/students')->with('success', 'A new student is imported');
    }

    public function createStudent() {
        return view('students.create');
    }

    public function updateStudent(Request $request, $id) {
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
            'incomes' => $request['incomes'],
            'career' => $request['career'],
            'description' => $request['description'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_student_union'],
            'date_of_dormitory' => $request['date_of_dormitory'],
            'room_of_dormitory' => $request['room_of_dormitory'],
            'military' => $request['military'],
            'volunteer' => $request['volunteer']
        ]);

        $group = Group::where('name', $request['group'])->first();

        $student->group()->associate($group);
        $student->save();

        return redirect('/admin/students')->with('success', 'Update Successful');
    }

    public function editStudent($id) {
        return view('students.update', ['id' => $id, 'student' => Student::find($id)]);
    }

    public function viewStudent($id) {
        $student = Student::with(['backgrounds', 'policies', 'group'])->find($id);

        return view('students.profile', ['student' => $student, 'id' => $id]);
    }

    public function teachers() {
        return view('teachers.list', [
            'teachers' =>Teacher::all()
        ]);
    }

    public function viewTeacher($id) {
        return view('teachers.profile', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function createTeacher() {
        return view('teachers.create');
    }

    public function editTeacher($id) {
        return view('teachers.update', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function addTeacher(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Teacher,id'],
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
            'incomes' => ['nullable'],
            'career' => ['nullable'],
            'description' => ['nullable'],
            'date_of_union' => ['nullable'],
            'date_of_communist' => ['nullable'],
            'date_of_student_union' => ['nullable'],
            'military' => ['nullable'],
            'volunteer' => ['nullable']
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
            'incomes' => $request['incomes'],
            'career' => $request['career'],
            'description' => $request['description'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_communist'],
            'military' => $request['military'],
            'volunteer' => $request['volunteer']
        ]);

        $faculty = Faculty::where('name', $request['faculty'])->first();
        $teacher->faculty()->associate($faculty);
        $teacher->save();

        return redirect('/admin/teachers');
    }

    public function updateTeacher(Request $request, $id) {

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
            'incomes' => $request['incomes'],
            'career' => $request['career'],
            'description' => $request['description'],
            'date_of_union' => $request['date_of_union'],
            'date_of_communist' => $request['date_of_communist'],
            'date_of_student_union' => $request['date_of_communist'],
            'military' => $request['military'],
            'volunteer' => $request['volunteer']
        ]);
        $faculty = Faculty::where('name',$request['faculty'])->first();
        $teacher->faculty()->associate($faculty);
        $teacher->save();

        return redirect('/admin/teachers');
    }
    public function createTeacherBackground($id) {
        return view('teachers.backgrounds.create', [
            'teacher' => Teacher::find($id)
        ]);
    }
    public function addTeacherBackground(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required'],
            'relationship' => ['required'],
            'birthday' => ['nullable', 'date'],
            'phone' => ['required'],
            'job' => ['nullable'],
            'email' => ['nullable', 'email'],
            'resident' => ['nullable'],
            'workplace' => ['nullable']
        ]);
        $teacher = Teacher::find($id);
        $teacher->backgrounds()->save(
            new Background([
                'name' => $request['name'],
                'relationship' => $request['relationship'],
                'birthday' => $request['birthday'],
                'phone' => $request['phone'],
                'job' => $request['job'],
                'email' => $request['email'],
                'resident' => $request['resident'],
                'workplace' => $request['workplace']
            ])
        );

        return redirect('/admin/teachers/profile/id='.$teacher->id);
    }

    public function editTeacherBackground($id) {
        return view('teachers.backgrounds.update', [
            'background' => Background::find($id)
        ]);
    }

    public function updateTeacherBackground(Request $request, $id) {
        $background = Background::find($id);
        $background->update([
            'name' => $request['name'],
            'relationship' => $request['relationship'],
            'birthday' => $request['birthday'],
            'phone' => $request['phone'],
            'job' => $request['job'],
            'email' => $request['email'],
            'resident' => $request['resident'],
            'workplace' => $request['workplace'],
        ]);

        return redirect('/admin/teachers/profile/id='.$background->id_teacher);
    }

    public function createStudentBackground($id) {
        return view('students.backgrounds.create', [
            'student' => Student::find($id)
        ]);
    }

    public function addStudentBackGround(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required'],
            'relationship' => ['required'],
            'birthday' => ['nullable', 'date'],
            'phone' => ['required'],
            'job' => ['nullable'],
            'email' => ['nullable', 'email'],
            'resident' => ['nullable'],
            'workplace' => ['nullable']
        ]);
        $student = Student::find($id);
        $student->backgrounds()->save(
            new Background([
                'name' => $request['name'],
                'relationship' => $request['relationship'],
                'birthday' => $request['birthday'],
                'phone' => $request['phone'],
                'job' => $request['job'],
                'email' => $request['email'],
                'resident' => $request['resident'],
                'workplace' => $request['workplace']
            ])
        );

        return redirect('/admin/students/profile/id='.$student->id);
    }

    public function editStudentBackground($id) {
        return view('students.backgrounds.update', [
            'background' => Background::find($id)
        ]);
    }

    public function updateStudentBackground(Request $request, $id) {
        $background = Background::find($id);
        $background->update([
            'name' => $request['name'],
            'relationship' => $request['relationship'],
            'birthday' => $request['birthday'],
            'phone' => $request['phone'],
            'job' => $request['job'],
            'email' => $request['email'],
            'resident' => $request['resident'],
            'workplace' => $request['workplace'],
        ]);

        return redirect('/admin/students/profile/id='.$background->id_student);
    }

    public function createStudentPolicy($id) {
        return view('students.policy.create', [
           'student' => Student::find($id)
        ]);
    }

    public function addStudentPolicy(Request $request, $id) {
        $this->validate($request, [
            'area' => ['nullable'],
        ]);
        $student = Student::find($id);

        $student->policies()->save(new Policy([
            'area' => $request['area'],
        ]));

        return redirect('/admin/students/profile/id='.$student->id);
    }

    public function editStudentPolicy($id) {
        return view('students.policy.update', [
            'policy' => Policy::find($id)
        ]);
    }

    public function updateStudentPolicy(Request $request, $id) {
        $policy = Policy::find($id);

        $policy->update([
            'area' => $request['area'],
        ]);

        return redirect('/admin/students/profile/id='.$policy->id_student);
    }

    public function createTeacherPolicy($id) {
        return view('teachers.policy.create', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function addTeacherPolicy(Request $request, $id) {
        $this->validate($request, [
            'area' => ['nullable'],
        ]);
        $teacher = Teacher::find($id);

        $teacher->policies()->save(new Policy([
            'area' => $request['area'],
        ]));

        return redirect('/admin/teachers/profile/id='.$teacher->id);
    }

    public function editTeacherPolicy($id) {
        return view('teachers.policy.update', [
            'policy' => Policy::find($id)
        ]);
    }

    public function updateTeacherPolicy(Request $request, $id) {
        $policy = Policy::find($id);

        $policy->update([
            'area' => $request['area'],
        ]);

        return redirect('/admin/teachers/profile/id='.$policy->id_teacher);
    }
}
