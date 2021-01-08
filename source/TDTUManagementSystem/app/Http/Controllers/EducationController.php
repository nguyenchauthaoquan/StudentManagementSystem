<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TrainingProgram;

use Illuminate\Http\Request;

class EducationController extends Controller
{

    public function viewAnnouncement($id) {
        $announcement = Announcement::find($id);
        return view('announcement.view', [
            'id' => $id,
            'announcement' => $announcement
        ]);
    }

    public function createAccouncement() {
        return view ('announcement.create');
    }

    public function editAnnouncement($id) {
        $announcement = Announcement::find($id);
        return view('announcement.update', [
           'id' => $id,
           'announcement' => $announcement
        ]);
    }

    public function addAnnouncement(Request $request) {
        $this->validate($request, [
            'title' => ['required'],
            'description' => ['required'],
            'to' => ['required']
        ],[
            'title.required' => 'Tựa Đề Thông Báo Không Được Bỏ Trống',
            'description' => 'Thông Báo Không Được Bỏ Trống',
            'to' => 'Người Gửi Không Hợp Lệ'
        ]);

        Announcement::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'to' => $request['to']
        ]);

        return redirect('/admin/dashboard');
    }
    public function updateAnnouncement(Request $request, $id) {
        $announcement = Announcement::find($id);
        $announcement->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'to' => $request['to']
        ]);

        return redirect('/admin/dashboard');
    }

    public function training_programs() {
        return view('education.training_programs.list',[
            'programs' => TrainingProgram::where('status', 'Đang Mở')->paginate(5),
            'deletedPrograms' => TrainingProgram::where('status', 'Đang Đóng')->paginate(5)
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
            'system' => ['in:"Đại học","Cao đẳng", "Trung cấp"']
        ],[
            'name.required' => 'Tên chương trình đào tạo không được bỏ trống',
            'system.in' => 'Xin vui lòng chọn hệ đào tạo',
        ]);

        TrainingProgram::create([
            'name' => $request['name'],
            'system' => $request['system'],
            'status' => $request['status']
        ]);

        return redirect('admin/programs');
    }

    public function updateTrainingProgram(Request $request, $id) {
        $training_program = TrainingProgram::find($id);
        $training_program->update([
            'name' => $request['name'],
            'system' => $request['system'],
            'status' => $request['status']
        ]);

        switch ($training_program->status) {
            case "Đang Mở": {
                Group::where('id_training', $training_program->id)
                    ->where('status', 'Đang Đóng')
                    ->update([
                    'status' => 'Đang Mở'
                ]);

                Major::where('id_training', $training_program->id)
                    ->where('status', 'Đang Đóng')
                    ->update([
                    'status' => 'Đang Mở'
                ]);

                $groups = Group::where('id_training', $training_program->id)->where('status', 'Đang Mở')->get();
                $majors = Major::where('id_training', $training_program->id)->where('status', 'Đang Mở')->get();

                $training_program->subjects()->where('status', 'Đang Đóng')->update([
                    'status' => 'Đang Mở'
                ]);

                foreach ($groups as $group) {
                    foreach ($majors as $major) {
                        Student::where('id_group', $group->id)
                            ->where('id_major', $major->id)
                            ->where('status', 'Thôi Học')
                            ->update([
                                'status' => 'Đi Học'
                            ]);
                    }
                }

                break;
            }
            case "Đang Đóng": {
                $this->deleteTrainingProgram($id);
                break;
            }
        }

        return redirect('admin/programs');
    }

    public function deleteTrainingProgram($id) {
        $program = TrainingProgram::find($id);
        $program->update([
            'status' => 'Đang Đóng'
        ]);

        Group::where('id_training', $program->id)
            ->where('status', 'Đang Mở')
            ->update([
            'status' => 'Đang Đóng'
        ]);

        Major::where('id_training', $program->id)
            ->where('status', 'Đang Mở')
            ->update([
            'status' => 'Đang Đóng'
        ]);

        $groups = Group::where('id_training', $program->id)->where('status', 'Đang Đóng')->get();
        $majors = Major::where('id_training', $program->id)->where('status', 'Đang Đóng')->get();
        $program->subjects()->where('status', 'Đang Mở')->update([
            'status' => 'Đang Đóng'
        ]);

        foreach ($groups as $group) {
            foreach ($majors as $major) {
                Student::where('id_group', $group->id)
                    ->where('id_major', $major->id)
                    ->where('status', 'Đi Học')
                    ->update([
                    'status' => 'Thôi Học'
                ]);
            }
        }

        return redirect()->back();
    }

    public function faculties() {
        return view('education.faculties.list', [
            'faculties' => Faculty::where('status', 'Đang Mở')->paginate(5),
            'deletedFaculties' => Faculty::where('status', 'Đang Đóng')->paginate(5),
        ]);
    }

    public function createFaculty() {
        return view('education.faculties.create');
    }

    public function viewFaculty($id) {
        $faculty = Faculty::find($id);

        return view('education.faculties.detail', [
            'id' => $id,
            'faculty' => $faculty
        ]);
    }

    public function editFaculty($id) {
        $faculty = Faculty::find($id);
        return view('education.faculties.update', [
            'id' => $id, 'faculty' => $faculty
        ]);
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
            'name' => $request['name'],
            'status' => $request['status']
        ]);

        return redirect('/admin/faculties')
            ->with('success', 'A new Faculty has been added successful');
    }

    public function updateFaculty(Request $request, $id) {
        $faculty = Faculty::find($id);

        $faculty->update([
            'id' => $request['id'],
            'name' => $request['name'],
            'status' => $request['status']
        ]);

        switch ($faculty->status) {
            case "Đang Mở": {
                $faculty->teachers()->update([
                    'status' => 'Đang Công Tác'
                ]);

                $faculty->subjects()->update([
                    'status' => 'Đang Mở'
                ]);

                Major::where('id_faculty', $faculty->id)->where('status', 'Đang Đóng')->update([
                    'status' => 'Đang Mở'
                ]);
                Group::where('id_faculty', $faculty->id)->update([
                    'status' => 'Đang Mở'
                ]);

                $majors = Major::where('id_faculty', $faculty->id)->get();
                $groups = Group::where('id_faculty', $faculty->id)->get();

                foreach ($groups as $group) {
                    foreach ($majors as $major) {
                        Student::where('id_group', $group->id)
                            ->where('id_major', $major->id)
                            ->where('status', 'Thôi Học')
                            ->update([
                                'status' => 'Đi Học'
                            ]);
                    }
                }

                break;
            }
            case "Đang Đóng": {
                $this->deleteFaculty($id);
                break;
            }
        }

        return redirect('/admin/faculties')
            ->with('success', 'Faculty has been updated successful');
    }

    public function deleteFaculty($id) {
        $faculty = Faculty::find($id);
        $faculty->update([
            'status' => 'Đang Đóng'
        ]);

        $faculty->teachers()->update([
            'status' => 'Thôi Việc'
        ]);

        $faculty->subjects()->update([
            'status' => 'Đang Đóng'
        ]);

        Major::where('id_faculty', $faculty->id)->update([
            'status' => 'Đang Đóng'
        ]);

        Group::where('id_faculty', $faculty->id)->update([
            'status' => 'Đang Đóng'
        ]);

        $majors = Major::where('id_faculty', $faculty->id)->get();
        $groups = Group::where('id_faculty', $faculty->id)->get();

        foreach ($groups as $group) {
            foreach ($majors as $major) {
                Student::where('id_group', $group->id)
                    ->where('id_major', $major->id)
                    ->where('status', 'Đi Học')
                    ->update([
                        'status' => 'Thôi Học'
                    ]);
            }
        }

        return redirect()->back();
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
            'id' => ['required', 'unique:App\Models\Major,id'],
            'name' => ['required']
        ], [
            'id.required' => 'Mã nghành không được bỏ trống',
            'id.unique' => 'Mã Nghành đã tồn tại',
            'name.required' => 'Tên nghành không được bỏ trống'
        ]);
        $program_name = explode("- Hệ", $request['program']);
        $training_program = TrainingProgram::where('name', trim($program_name[0]))
            ->where('system', trim($program_name[1]))
            ->first();
        $faculty = Faculty::find($id);
        $faculty->majors()->attach($training_program->id, [
            'id' => $request['id'],
            'name' => $request['name'],
            'status' => $request['status']
        ]);
        return redirect('/admin/faculties/view/id='.$faculty->id);

    }

    public function updateMajor(Request $request, $id) {
        $major = Major::find($id);
        $faculty = Faculty::find($major->id_faculty);
        $program_name = explode("- Hệ", $request['program']);
        $training_program = TrainingProgram::where('name', trim($program_name[0]))
            ->where('system', trim($program_name[1]))
            ->first();
        $major->update([
            'id_training' => $training_program->id,
            'id' => $request['id'],
            'name' => $request['name'],
            'status' => $request['status']
        ]);

        switch ($major->status) {
            case "Đang Mở": {
                Group::where('id_training', $major->id_training)->update([
                    'status' => 'Đang Mở'
                ]);
                $groups = Group::where('id_training', $major->id_training)->get();

                foreach ($groups as $group) {
                    Student::where('id_group', $group->id)
                        ->where('id_major', $major->id)
                        ->where('status', 'Thôi Học')
                        ->update([
                        'status' => 'Đi Học'
                        ]);
                }

                break;
            }
            case "Đang Đóng": {
                $this->deleteMajor($id);
                break;
            }
        }

        return redirect('/admin/faculties/view/id='.$faculty->id);
    }

    public function deleteMajor($id) {
        $major = Major::find($id);
        $major->update([
            'status' => 'Đang Đóng'
        ]);
        Group::where('id_training', $major->id_training)->update([
           'status' => 'Đang Đóng'
        ]);

        $groups = Group::where('id_training', $major->id_training)->get();

        foreach ($groups as $group) {
            Student::where('id_group', $group->id)
                ->where('id_major', $major->id)
                ->where('status', 'Đi Học')
                ->update([
                    'status' => 'Thôi Học'
                ]);
        }

        return redirect()->back();
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
           'date_graduation' => $request['date_graduation'],
           'status' => $request['status']
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
            'date_graduation' => $request['date_graduation'],
            'status' => $request['status']
        ]);

        switch ($group->status) {
            case "Đang Mở": {
                Student::where('id_group', $group->id)->where('status', 'Thôi Học')->update([
                    'status' => 'Đi Học'
                ]);
                break;
            }
            case "Tốt Nghiệp": {
                Student::where('id_group', $group->id)->where('status', 'Đi Học')->update([
                    'status' => 'Tốt Nghiệp'
                ]);
                break;
            }
            case "Đang Đóng": {
                Student::where('id_group', $group->id)->where('status', 'Đi Học')->update([
                    'status' => 'Thôi Học'
                ]);
                User::where('account', Student::where('id_group', $group->id)->where('status', 'Thôi Học')->first()->id
                )->update([
                    'status' => 'Không Cho Phép'
                ]);
                break;
            }
        }

        return redirect('/admin/groups')->with('success', 'Update successful');
    }

    public function deleteGroup($id) {
        $group = Group::find($id);
        $group->update([
            'status' => 'Đang Đóng'
        ]);
        Student::where('id_group', $group->id)
            ->where('status', 'Đi Học')
            ->update([
                'status' => 'Thôi Học'
            ]);

        return redirect()->back();
    }

    public function subjects() {
        return view('education.subjects.list', [
            'subjects' => Subject::all()
        ]);
    }

    public function viewSubject($id) {
        $subject = Subject::find($id);

        return view('education.subjects.detail', [
            'subject' => $subject,

        ]);
    }

    public function createSubject() {
        $faculties = Faculty::all();
        $programs = TrainingProgram::all();

        return view('education.subjects.create', [
            'faculties' => $faculties,
            'programs' => $programs
        ]);
    }

    public function editSubject($id) {
        $subject = Subject::find($id);

        return view('education.subjects.update', [
            'id' => $id,
            'subject' => $subject,
            'faculties' => Faculty::all(),
            'programs' => TrainingProgram::all()
        ]);
    }

    public function addSubject(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'unique:App\Models\Subject,id'],
            'name' => ['required'],
            'credits' => ['required']
        ], [
            'id.required' => 'Mã môn học không được bỏ trống',
            'id.unique' => 'Mã môn học đã tồn tại',
            'name.required' => 'Tên môn học không được bỏ trống',
            'name.unique' => 'Tên môn học đã tồn tại',
            'credits.required' => 'Số tín chỉ của môn học không được bỏ trống'
        ]);

        $faculty = Faculty::find($request['faculty']);
        $subject = $faculty->subjects()->create([
            'id' => $request['id'],
            'name' => $request['name'],
            'credits' => $request['credits'],
            'status' => $request['status'],
        ]);
        $programs = TrainingProgram::whereIn('name', $request['program_name'])
            ->whereIn('system', $request['system'])
            ->get();

        foreach ($programs as $program) {
            $program->subjects()->attach($subject->id);
        }


        return redirect('/admin/subjects');
    }

    public function updateSubject(Request $request, $id) {
        $subject = Subject::find($id);
        $faculty = Faculty::find($request['faculty']);
        $programs = TrainingProgram::whereIn('name', $request->input('program_name'))
                                    ->whereIn('system', $request->input('system'))
                                    ->get();
        $subject->update([
            'id' => $request['id'],
            'name' => $request['name'],
            'credits' => $request['credits'],
            'status' => $request['status'],
        ]);
        $subject->faculty()->associate($faculty);
        $subject->programs()->sync($programs);

        return redirect('/admin/subjects/view/id='.$id);
    }

    public function deleteSubject($id) {
        $subject = Subject::find($id);
        $subject->update([
            'status' => 'Đang Đóng'
        ]);

        return redirect('/admin/subjects');
    }
}
