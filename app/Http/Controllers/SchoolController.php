<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\Form;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentCategory;
use App\Models\SubCounty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Image;



class SchoolController extends Controller
{
    public function __construct() {
        $this->middleware('auth:school');
    }

    function loggedIn()
    {
        $user = auth()->user();
        return School::query()->where('email', $user->email)->first();
    }

    public function index()
    {
        $school = $this->loggedIn();
        return view('school.index',[
            'school' => $school,
        ]);
    }

    public function getClassSections(Request $request)
    {
        $sections = ClassSection::query()->where('class_id', $request->form_id)->where('is_active', 1)->get();

        if ($sections) {
            return $sections;
        } else {
            return null;
        }

    }

    public function getSubCounties(Request $request)
    {
        $sub_counties = SubCounty::query()
            ->where('county_id', $request->county_id)
            ->distinct()
            ->pluck('constituency_name');

        if ($sub_counties->count() > 0) {
            return $sub_counties;
        } else {
            return null;
        }


    }

    public function getWards(Request $request)
    {
        $wards = SubCounty::query()
            ->where('constituency_name', $request->sub_county)
            ->distinct()
            ->pluck('ward');

        if ($wards->count() > 0) {
            return $wards;
        } else {
            return null;
        }


    }

    function getClasses()
    {
        $school = $this->loggedIn();
         return Form::query()->where('school_id', $school->id)->get();
    }

    public function studentAdmission()
    {
        $school = $this->loggedIn();
        $forms = $this->getClasses();
        $counties = (new PageController())->counties();
        $categories = StudentCategory::query()->get();
        return view('school.students.admission', [
            'school' => $school,
            'forms' => $forms,
            'counties' => $counties,
            'categories' => $categories,
        ]);
    }

    public function postStudentAdmission(Request $request)
    {
        $school = $this->loggedIn();
        $this->validate($request, [
            'admission_no' => ['required', 'numeric'],
            'upi_number' => '',
            'class_id' => 'required|not_in:0',
            'class_section_id'=> 'required|not_in:0',
            'firstname'  => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'gender' => 'required|not_in:0',
            'dob' => 'required|date',
            'category_id' => 'required|not_in:0',
            'religion' => 'required',
            'disability' => 'required',
            'birth_cert' => 'required',
            'ethnicity' => 'required',
            'admission_date' => 'required|date',
            'photo' => 'mimes:jpeg,jpg,png,gif',
            'father_name' => '',
            'father_phone' => '',
            'mother_name' => '',
            'mother_phone' => '',
            'father_occupation' => '',
            'mother_occupation' => '',
            'guardian_name' => '',
            'guardian_relation' => '',
            'guardian_phone' => '',
            'guardian_occupation' => '',
            'guardian_address' => '',
            'county' => 'required|not_in:0',
            'sub_county'  => 'required|not_in:0',
            'location'  => 'required|not_in:0',
            'sub_location'  => 'required|not_in:0',
            'chief_name' => '',
            'chief_phone' => '',
            'near_school' => '',
            'brief_history' => '',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('storage/'), $imageName);

        Student::query()->create([
            'school_id' => $school->id,
            'admission_no' => $request->admission_no,
            'upi_number' => $request->upi_number,
            'class_id' => $request->class_id,
            'class_section_id' => $request->class_section_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'category_id' => $request->category_id,
            'religion' => $request->religion,
            'disability' => $request->disability,
            'birth_cert' => $request->birth_cert,
            'ethnicity' => $request->ethnicity,
            'admission_date' => $request->admission_date,
            'photo' => $imageName,
            'father_name' => $request->father_name,
            'father_phone' => $request->father_phone,
            'mother_name' => $request->mother_name,
            'mother_phone' => $request->mother_phone,
            'father_occupation' => $request->father_occupation,
            'mother_occupation' => $request->mother_occupation,
            'guardian_name' => $request->guardian_name,
            'guardian_relation' => $request->guardian_relation,
            'guardian_phone' => $request->guardian_phone,
            'guardian_occupation' => $request->guardian_occupation,
            'guardian_address' => $request->guardian_address,
            'county' => $request->county,
            'sub_county' => $request->sub_county,
            'location' => $request->location,
            'sub_location' => $request->sub_location,
            'chief_name' => $request->chief_name,
            'chief_phone' => $request->chief_phone,
            'near_school' => $request->near_school,
            'brief_history' => $request->brief_history,
        ]);
        alert()->success('success', 'Student successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function studentDetails(Request $request)
    {
        $school = $this->loggedIn();
        $classes = $this->getClasses();

        $filterClass = isset($request->class_id) ? $request->class_id : 0;
        $filterSection = isset($request->class_section_id) ? $request->class_section_id : 0;

        $students = Student::query()
            ->where('class_id', $filterClass)
            ->where('class_section_id', $filterSection)
            ->with('form')
            ->with('stream')
            ->get();
        return view('school.students.details',[
            'school' => $school,
            'classes' => $classes,
            'students' => $students,
            'filterClass' => $filterClass,
            'filterSection' => $filterSection,
        ]);
    }

    public function viewStudent($id)
    {
        $school = $this->loggedIn();
        $student = Student::query()
            ->where('id', $id)
            ->with('form')
            ->with('stream')
            ->with('residence')
            ->with('subcounty')
            ->with('category')
            ->first();


        return view('school.students.show',[
            'school' => $school,
            'student' => $student,
        ]);
    }


    public function getClass()
    {
        $school = $this->loggedIn();
        $classes = Form::query()->where('school_id', $school->id)->get();
        return view('school.academics.class',[
            'school' => $school,
            'classes' => $classes,
        ]);
    }

    public function postClass(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Form::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Class successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getStudentCategory()
    {
        $school = $this->loggedIn();
        $categories = StudentCategory::query()->get();
        return view('school.students.categories',[
            'school' => $school,
            'categories' => $categories,
        ]);
    }

    public function postStudentCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        StudentCategory::query()->create([
            'name' => $request->name,

        ]);

        alert()->success('success', 'Class successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getClassStream()
    {
        $school = $this->loggedIn();
        $classes = Form::query()->where('school_id', $school->id)->get();
        $streams = [];

        foreach ($classes as $class) {
            $classStreams = ClassSection::where('class_id', $class->id)->get();
            $streams[$class->id] = $classStreams;
        }
        return view('school.academics.stream',[
            'school' => $school,
            'classes' => $classes,
            'streams' => $streams,
        ]);
    }

    public function postClassStream(Request $request)
    {
        $this->validate($request, [
            'form_id' => 'required|numeric',
            'name' => 'required',
        ]);

        ClassSection::query()->create([
            'class_id' => $request->form_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Class section successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function settings()
    {
        $school = $this->loggedIn();
        return view('school.school_setting.settings',[
            'school' => $school,
        ]);
    }

    public function postSettings(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required|unique:schools',
            'email' => 'required|unique:schools',
            'phone' => 'required|unique:schools',
        ]);

        School::query()->create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        alert()->success('success', 'Payment method successfully added')->persistent('Okay');
        return redirect()->back();
    }
}
