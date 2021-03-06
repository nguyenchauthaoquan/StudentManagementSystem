<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Background;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use App\Models\Policy;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    //
    public function home() {
        $students = Student::whereNotIn('status', ['Thôi Học'])->get();
        $teachers = Teacher::whereNotIn('status', ['Thôi Việc'])->get();
        $faculties = Faculty::whereNotIn('status', ['Đang Đóng'])->get();
        $groups = Group::whereNotIn('status', ['Đang Đóng'])->get();

        return view('dashboard_home', [
            'students' => $students,
            'teachers' => $teachers,
            'faculties' => $faculties,
            'groups' => $groups,
            'announcements' => Announcement::all()
        ]);
    }

    public function students() {
        return view('students.list', [
            'groups' => Group::all()
        ]);
    }

    public function addStudent(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Student,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'major' => ['required'],
            'program' => ['required'],
            'group' => ['required'],
            'faculty' => ['required'],
            'birthday' => ['required', 'date'],
            'gender' => ['in:"Nam", "Nữ"'],
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
            'id.unique' => 'Mã số sinh viên đã tồn tại',
            'firstname.required' => 'Họ tên không được bỏ trống',
            'lastname.required' => 'Họ tên không được bỏ trống',
            'major.required' => 'Nghành đào tạo không được bỏ trống',
            'program.required' => 'Chương trình đào tạo không được bỏ trống',
            'group.required' => 'Lớp không được bỏ trống',
            'faculty.required' => 'Khoa không được bỏ trống',
            'birthday.required' => 'Ngày tháng năm sinh không được bỏ trống',
            'birthday.date' => 'Ngày tháng năm sinh không hợp lệ',
            'gender.in' => 'Vui lòng chọn giới tính',
            'place_of_birth.required' => 'Nơi sinh không được bỏ trống',
            'origin.required' => 'Nguyên quán không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'address.required' => 'Địa chỉ của sinh viên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không hợp lệ',
            'id_number.required' => 'Số CMND không được bỏ trống',
            'place_of_id_number.required' => 'Nơi cấp CMND không được bỏ trống',
            'nationality.required' => 'Quốc tịch không được bỏ trống',
            'date_of_union.date' => 'Thời gian vào đoàn không hợp lệ',
            'date_of_communist.date' => 'Thời gian vào đảng không hợp lệ',
            'date_of_student_union.date' => 'Thơi gian vào hội sinh viên không hợp lệ',
            'date_of_dormitory.date' => 'Thời gian ở ký túc xá không hợp lệ',
        ]);
        $program_name = explode("- Hệ", $request['program']);
        $program = TrainingProgram::where('name', trim($program_name[0]))
                                    ->where('system', trim($program_name[1]))
                                    ->first();
        $faculty = Faculty::find($request['faculty']);

        $group = Group::where('id_training', $program->id)
                        ->where('id_faculty', $faculty->id)
                        ->where('name', $request['group'])
                        ->first();

        $major = Major::where('id_training', $program->id)
                        ->where('id_faculty', $faculty->id)
                        ->where('name', $request['major'])
                        ->first();

        $group->students()->attach($major->id, [
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
            'volunteer' => $request['volunteer'],
            'status' => $request['status']
        ]);

        $role = Role::firstOrCreate(
            ['name' => 'Student'],
            ['name' => 'Student']
        );
        $user = User::firstOrCreate(
            ['account' => $request['id']],
            [
                'id_student' => $request['id'],
                'account' => $request['id'],
                'email' => $request['id']."@tdtu.edu.vn",
                'password' => Hash::make($request['id']),
                'status' => 'Cho Phép'
            ]
        );
        $user->roles()->attach($role->id);

        $name = $request['firstname'].' '.$request['middlename'].' '.$request['lastname'];
        return redirect('/admin/students')->with('success', 'Sinh viên '.$name.' được thêm vào hệ thống');
    }

    public function createStudent() {
        return view('students.create', [
            'groups' => Group::all(),
            'majors' => Major::all(),
            'programs' => TrainingProgram::all(),
            'faculties' => Faculty::all()
        ]);
    }

    public function updateStudent(Request $request, $id) {
        $student = Student::find($id);
        $program = TrainingProgram::find($request['program']);
        $faculty = Faculty::find($request['faculty']);

        $group = Group::where('id_training', $program->id)
            ->where('id_faculty', $faculty->id)
            ->where('name', $request['group'])
            ->first();

        $major = Major::where('id_training', $program->id)
            ->where('id_faculty', $faculty->id)
            ->where('name', $request['major'])
            ->first();

        $student->update([
            'id_group' => $group->id,
            'id_major' => $major->id,
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
            'volunteer' => $request['volunteer'],
            'status' => $request['status']
        ]);
        switch ($request['status']) {
            case 'Đi Học': {
                User::where('account', $id)->update([
                    'status' => 'Cho Phép'
                ]);
                break;
            }
            case 'Tốt Nghiệp':
            case 'Thôi Học': {
                User::where('account', $id)->update([
                    'status' => 'Không Cho Phép'
                ]);
                break;
            }
        }
        $name = $request['firstname'].' '.$request['middlename'].' '.$request['lastname'];

        return redirect('/admin/students')->with('success', 'Thông tin của sinh viên '.$name.' đã được cập nhật');
    }

    public function editStudent($id) {
        $student = Student::find($id);
        $faculties = Faculty::all();
        $programs = TrainingProgram::all();
        $majors = Major::all();
        $groups = Group::all();
        $student_group = Group::find($student->id_group);
        $student_major = Major::find($student->id_major);
        $student_faculty = Faculty::find($student_major->id_faculty);
        $student_program = TrainingProgram::where('id',$student_group->id_training)->where('id', $student_major->id_training)->first();

        return view('students.update', [
            'id' => $id,
            'student' => $student,
            'groups' => $groups,
            'student_group' => $student_group,
            'student_major' => $student_major,
            'student_faculty' => $student_faculty,
            'student_program' => $student_program,
            'majors' => $majors,
            'programs' => $programs,
            'faculties' => $faculties
        ]);
    }

    public function viewStudent($id) {
        $student = Student::find($id);
        $major = Major::find($student->id_major);
        $group = Group::find($student->id_group);

        return view('students.profile', [
            'id' => $id,
            'student' => $student,
            'major' => $major,
            'group' => $group,
            'faculty' => Faculty::whereIn('id', [$major->id_faculty, $group->id_faculty])->get(),
        ]);
    }

    public function deleteStudent($id) {
        $student = Student::find($id);

        $student->update([
            'status' => 'Thôi Học'
        ]);
        $user = User::where('account', $id)->update([
            'status' => 'Không Cho Phép'
        ]);

        return redirect('/admin/students');
    }

    public function teachers() {
        return view('teachers.list', [
            'teachers' => Teacher::all()
        ]);
    }

    public function viewTeacher($id) {
        return view('teachers.profile', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function createTeacher() {
        return view('teachers.create', [
            'faculties' => Faculty::all()
        ]);
    }

    public function editTeacher($id) {
        return view('teachers.update', [
            'teacher' => Teacher::find($id),
            'faculties' => Faculty::all()
        ]);
    }

    public function addTeacher(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Teacher,id'],
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'birthday' => ['required'],
            'place_of_birth' => ['required'],
            'origin' => ['required'],
            'gender' => ['in: "Nam", "Nữ"'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
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
        ], [
            'id.required' => 'Mã số giảng viên không được bỏ trống',
            'firstname.required' => 'Họ tên không được bỏ trống',
            'lastname.required' => 'Họ tên không được bỏ trống',
            'birthday.required' => 'Ngày tháng năm sinh không được bỏ trống',
            'birthday.date' => 'Ngày tháng năm sinh không hợp lệ',
            'place_of_birth.required' => 'Nơi sinh không được bỏ trống',
            'origin.required' => 'Nguyên quán không được bỏ trống',
            'gender.in' => 'Giới tính không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'address.required' => 'Địa chỉ của giảng viên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không hợp lệ',
            'id_number.required' => 'Số CMND không được bỏ trống',
            'place_of_id_number.required' => 'Nơi cấp CMND không được bỏ trống',
            'nationality.required' => 'Quốc tịch không được bỏ trống',
            'date_of_union.date' => 'Thời gian vào đoàn không hợp lệ',
            'date_of_communist.date' => 'Thời gian vào đảng không hợp lệ',
            'date_of_student_union.date' => 'Thơi gian vào hội sinh viên không hợp lệ',
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
            'volunteer' => $request['volunteer'],
            'status' => $request['status']
        ]);

        $faculty = Faculty::find($request['faculty']);
        $faculty->teachers()->save($teacher);

        $role = Role::firstOrCreate(
            ['name' => 'Teacher'],
            ['name' => 'Teacher']
        );
        $user = User::firstOrCreate(
            ['account' => $request['id']],
            [
                'id_teacher' => $request['id'],
                'account' => $request['id'],
                'email' => $request['id']."@tdtu.edu.vn",
                'password' => Hash::make($request['id'])
            ]
        );
        $user->roles()->attach($role->id);

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
            'volunteer' => $request['volunteer'],
            'status' => $request['status']
        ]);
        switch ($request['status']) {
            case 'Đang Công Tác': {
                User::where('account', $id)->update([
                    'status' => 'Cho Phép'
                ]);
                break;
            }
            case 'Thôi Việc': {
                User::where('account', $id)->update([
                    'status' => 'Không Cho Phép'
                ]);
                break;
            }
        }

        $faculty = Faculty::find($request['faculty']);
        $teacher->faculty()->associate($faculty);
        $teacher->save();

        return redirect('/admin/teachers');
    }
    public function deleteTeacher($id) {
        Teacher::find($id)->update([
            'status' => 'Thôi Việc'
        ]);
        User::where('account', $id)->update([
            'status' => 'Không Cho Phép'
        ]);

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
