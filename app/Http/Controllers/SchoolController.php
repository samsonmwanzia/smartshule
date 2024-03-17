<?php

namespace App\Http\Controllers;

use App\Models\BomCategory;
use App\Models\BOMmember;
use App\Models\Book;
use App\Models\ClassSection;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Expense;
use App\Models\ExpenseHead;
use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Form;
use App\Models\IssueReturn;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\MarkingType;
use App\Models\MarksGrade;
use App\Models\Notification;
use App\Models\School;
use App\Models\StaffCategory;
use App\Models\Statement;
use App\Models\Student;
use App\Models\StudentCategory;
use App\Models\SubCounty;
use App\Models\Subject;
use App\Models\TeacherSubject;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Image;


class SchoolController extends Controller
{
    public function __construct()
    {
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
        return view('school.index', [
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
            'class_section_id' => 'required|not_in:0',
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
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
            'sub_county' => 'required|not_in:0',
            'location' => 'required|not_in:0',
            'sub_location' => 'required|not_in:0',
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

        $enteredValue = $request->name;

        if ($filterClass) {
            $students = Student::query()
                ->where('class_id', $filterClass)
                ->where('class_section_id', $filterSection)
                ->with('form')
                ->with('stream')
                ->get();
        } else {

            $students = Student::query()
                ->where('admission_no', 'like', "%$enteredValue%")
                ->orWhere('upi_number', 'like', "%$enteredValue%")
                ->orWhere('firstname', 'like', "%$enteredValue%")
                ->orWhere('lastname', 'like', "%$enteredValue%")
                ->orWhere('gender', 'like', "%$enteredValue%")
                ->orWhere('dob', 'like', "%$enteredValue%")
                ->orWhere('religion', 'like', "%$enteredValue%")
                ->orWhere('disability', 'like', "%$enteredValue%")
                ->orWhere('ethnicity', 'like', "%$enteredValue%")
                ->orWhere('father_name', 'like', "%$enteredValue%")
                ->orWhere('father_phone', 'like', "%$enteredValue%")
                ->orWhere('mother_name', 'like', "%$enteredValue%")
                ->orWhere('mother_phone', 'like', "%$enteredValue%")
                ->orWhere('father_occupation', 'like', "%$enteredValue%")
                ->orWhere('mother_occupation', 'like', "%$enteredValue%")
                ->orWhere('guardian_name', 'like', "%$enteredValue%")
                ->orWhere('guardian_relation', 'like', "%$enteredValue%")
                ->orWhere('guardian_phone', 'like', "%$enteredValue%")
                ->orWhere('guardian_occupation', 'like', "%$enteredValue%")
                ->orWhere('guardian_address', 'like', "%$enteredValue%")
                ->orWhere('county', 'like', "%$enteredValue%")
                ->orWhere('sub_county', 'like', "%$enteredValue%")
                ->orWhere('location', 'like', "%$enteredValue%")
                ->orWhere('sub_location', 'like', "%$enteredValue%")
                ->orWhere('chief_name', 'like', "%$enteredValue%")
                ->orWhere('chief_phone', 'like', "%$enteredValue%")
                ->with('form')
                ->with('stream')
                ->get();
        }

        $feesType = $this->schoolFeeTypes($school->id);

        return view('school.students.details', [
            'school' => $school,
            'classes' => $classes,
            'students' => $students,
            'filterClass' => $filterClass,
            'filterSection' => $filterSection,
            'feesType' => $feesType,
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

        $feeTypes = FeeType::query()->where('school_id', $school->id)->where('is_active', true)->get();

        $fees = Fee::query()
            ->where('student_id', $id)
            ->get();

        return view('school.students.show', [
            'school' => $school,
            'student' => $student,
            'feeTypes' => $feeTypes,
            'fees' => $fees,
        ]);
    }


    public function getClass()
    {
        $school = $this->loggedIn();
        $classes = Form::query()->where('school_id', $school->id)->get();
        return view('school.academics.class', [
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
        return view('school.students.categories', [
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
        $classes = $this->getClasses();
        $streams = [];

        foreach ($classes as $class) {
            $classStreams = ClassSection::where('class_id', $class->id)->get();
            $streams[$class->id] = $classStreams;
        }
        return view('school.academics.stream', [
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


    public function populationAnalysis()
    {
        $school = $this->loggedIn();
        $ageGroups = array(6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
        $studentCounts = [];
        $totalStudentCount = 0;

        foreach ($ageGroups as $age) {
            $studentCount = $this->getStudentCountByAge($age);
            $studentCounts[$age] = $studentCount;
            $totalStudentCount += $studentCount;
        }

        $classes = $this->getClasses();

        return view('school.students.population', [
            'school' => $school,
            'studentCounts' => $studentCounts,
            'totalStudentCount' => $totalStudentCount,
            'classes' => $classes,
        ]);
    }


    function getStudentCountByGender($gender): string
    {
        return  Student::query()->where('gender', $gender)->count();
    }
    function getStudentCountByClass($class): int
    {
        return  Student::query()->where('class_id', $class)->count();
    }

    public function getStudentCountByAge($age): int
    {
        $currentDate = Carbon::now();
        $minBirthDate = $currentDate->subYears($age)->format('Y');

        $query = Student::query();

        if ($age >=19) {
            return $query->where('dob', '<=', $minBirthDate)->count();
        }

        return $query->where('dob', 'like', '%'.$minBirthDate. '%')->count();
    }

    public function getFeeType()
    {
        $school = $this->loggedIn();
        $types = $this->schoolFeeTypes($school->id);
        return view('school.fees.fees_type', [
            'school' => $school,
            'types' => $types,
        ]);
    }

    function schoolFeeTypes($school_id)
    {
        $feesType = FeeType::query()->where('school_id', $school_id)->get();
        if ($feesType){
            return $feesType;
        }
        return null;
    }

    public function postFeeType(Request $request)
    {
        $school = $this->loggedIn();
        $this->validate($request, [
            'fee_type' => 'required',
            'total_amount' => 'required',
        ]);


        FeeType::query()->create([
            'school_id' => $school->id,
            'fee_type' => $request->fee_type,
            'total_amount' => $request->total_amount,
        ]);

        alert()->success('success', 'Fee type successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function settings()
    {
        $school = $this->loggedIn();
        return view('school.school_setting.settings', [
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

    public function getStaffCategory()
    {
        $school = $this->loggedIn();
        $categories = StaffCategory::query()->where('school_id', $school->id)->get();
        return view('school.academics.staff_categories', [
            'school' => $school,
            'categories' => $categories,
        ]);
    }

    public function postStaffCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        StaffCategory::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'category successfully added')->persistent('Okay');
        return redirect()->back();
    }

    function staffCategory(int $school_id, string $name)
    {
        $category = StaffCategory::query()
            ->where('school_id', $school_id)
            ->where('name', "=", $name)
            ->first();
        if ($category) {
            return $category;
        }
        return null;
    }


    public function getAccountants()
    {
        $school = $this->loggedIn();
        $name = "Accountant";
        $category = $this->staffCategory($school->id, $name);

        $accountants = User::query()
            ->where('school_id', $school->id)
            ->where('staff_category_id', $category->id)
            ->get();

        return view('school.fees.accountants', [
            'school' => $school,
            'category' => $category,
            'accountants' => $accountants,
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function postAccountant(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'gender' => ['required'],
        ]);

        User::query()->create([
            'school_id' => $request->school_id,
            'staff_category_id' => $request->staff_category_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => (new PageController())->alignPhoneNumber($request->phone),
            'gender' => $request->gender,
            'password' => Hash::make($request->phone),

        ]);

        alert()->success('success', 'Accountant successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function studentReport()
    {
        $school = $this->loggedIn();
        $students = Student::query()
            ->where('school_id', $school->id)
            ->with('form')
            ->with('stream')
            ->with('residence')
            ->with('subcounty')
            ->with('category')
            ->get();

        return view('school.reports.student_report', [
            'school' => $school,
            'students' => $students,
        ]);
    }

    public function postStudentFee(Request $request)
    {
        $school = $this->loggedIn();
        $this->validate($request, [
            'fee_type' => 'required:not_in:0',
            'referenceCode' => ['required', 'string', 'max:255', 'unique:statements'],
            'amount_paid' => 'required',
            'description' => ['required'],
        ]);

        //update amount
        $this->updateFees($school->id, decrypt($request->student_id), $request->fee_type, $request->amount_paid);
        //call statements
        $this->createStatement($school->id, decrypt($request->student_id), env('STATEMENT_FEE_PAYMENT'), $request->referenceCode, $request->amount_paid,$request->description);
        //call notification
        $this->createNotification($school->id, decrypt($request->student_id), env('FEE_MESSAGE'),$request->description);

        alert()->success('success', 'Fees successfully recorded')->persistent('Okay');
        return redirect()->back();
    }

    public function updateFees(int $school_id, int $student_id, int $fee_type, float $amount_paid)
    {
        $fee = Fee::query()
            ->where('school_id', $school_id)
            ->where('student_id', $student_id)
            ->first();

        if ($fee) {
            $updateData = ($fee_type == 1) ? ['tuition_amount' => $fee->tuition_amount + $amount_paid]
                : ['fee_amount' => $fee->fee_amount + $amount_paid];

            $fee->update($updateData);
        } else {
            $createData = [
                'school_id' => $school_id,
                'student_id' => $student_id,
                ($fee_type == 1 ? 'tuition_amount' : 'fee_amount') => $amount_paid,
            ];

            Fee::query()->create($createData);
        }
    }



    public function createStatement(int $school_id, int $student_id, int $action, string $referenceCode ,float $amount, string $description)
    {

        Statement::query()->create([
            'school_id' => $school_id,
            'student_id' => $student_id,
            'action' => $action,
            'referenceCode' => $referenceCode,
            'amount' => round($amount, 2),
            'description' => $description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function createNotification(int $school_id, int $student_id, string $subject, string $message)
    {
        Notification::query()->create([
            'school_id' => $school_id,
            'student_id' => $student_id,
            'subject' => $subject,
            'message' => $message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function compareFeeAmount(int $school_id, int $student_id)
    {
        $studentFee = Fee::query()
            ->where('school_id', $school_id)
            ->where('student_id', $student_id)
            ->where('is_active', true)
            ->first();

        $setFee = FeeType::query()
            ->where('school_id', $school_id)
            ->where('is_active', true)
            ->first();

        if ($setFee->id == $studentFee->fee_type_id && $setFee->total_amount == $studentFee->amount_paid){
            Fee::query()->update([
                'is_cleared' => true,
            ]);
        }
    }

    public function getFeeStatement()
    {
        $school = $this->loggedIn();
        $statements = Statement::query()->where('school_id', $school->id)->orderBy('created_at', 'DESC')->get();
        return view('school.fees.fees_statement', [
            'date' => Carbon::now(),
            'statements' => $statements,
        ]);
    }

    public function getUnreadNotifications(int $school_id)
    {
        $notifications = Notification::query()->where('school_id', $school_id)->where('read', false)->get();
        if ($notifications) {
            return $notifications;
        }
        return null;
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function getNotifications()
    {
        $school = $this->loggedIn();
        $notifications = Notification::query()->where('school_id', $school->id)->orderBy('created_at', 'DESC')->get();
        return view('school.notifications.view', [
            'date' => Carbon::now(),
            'notifications' => $notifications,
        ]);
    }



    /**
     * marks all as read
     * Gets only the auth user notifs
     * @return string
     */
    public function readAll()
    {
        $school = $this->loggedIn();
        $notifications = Notification::where('school_id', $school->id)->orderBy('created_at', 'desc')->get();
        foreach ($notifications as $notification) {
            $notification->read = 1;
            $notification->update();
        }
        alert()->success('success', 'All messages have been marked as read.')->persistent('Okay');
        return redirect()->back();

    }

    public function getStudentSpecificClass(int $class_section)
    {
        return ClassSection::query()->where('id', $class_section)->first();
    }

    public function balanceFeeReport()
    {
        $school = $this->loggedIn();
        $feeTypes = FeeType::query()->where('school_id', $school->id)->where('is_active', true)->get();
        $fees = Fee::query()
            ->where('school_id', $school->id)
            ->with('student')
            ->get();


        return view('school.fees.balance_fees', [
            'date' => Carbon::now(),
            'school' => $school,
            'feeTypes' => $feeTypes,
            'fees' => $fees,

        ]);
    }

    public function getExpenseHead()
    {
        $school = $this->loggedIn();
        $expenseHeads = $this->returnExpenseHeads($school->id);
        return view('school.expenses.expense_head', [
            'school' => $school,
            'expenseHeads' => $expenseHeads,
        ]);
    }

    public function postExpenseHead(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        ExpenseHead::query()->create([
            'school_id' => $request->school_id,
            'expense_head' => $request->name,

        ]);

        alert()->success('success', 'Expense head successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getExpenseList()
    {
        $school = $this->loggedIn();
        $expenseHeads = $this->returnExpenseHeads($school->id);
        $expenses = Expense::query()
            ->where('school_id', $school->id)
            ->with('expense_head')
            ->get();
        return view('school.expenses.add_expense', [
            'school' => $school,
            'expenseHeads' => $expenseHeads,
            'expenses' => $expenses,
        ]);
    }

    public function returnExpenseHeads($school_id)
    {
        $expenseHeads = ExpenseHead::query()->where('school_id', $school_id)->get();
        if ($expenseHeads){
            return $expenseHeads;
        }
        return null;
    }

    public function postExpenseList(Request $request)
    {
        $this->validate($request, [
            'expense_head' => 'required|not_in:0',
            'name' => ['required', 'string', 'max:255'],
        ]);

        Expense::query()->create([
            'school_id' => decrypt($request->school_id),
            'expense_head_id' => $request->expense_head,
            'expense_name' => $request->name,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        alert()->success('success', 'Expense successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getTeachers()
    {
        $school = $this->loggedIn();
        $name = "Teacher";
        $category = $this->staffCategory($school->id, $name);

        $teachers = $this->returnTeachers($school->id);

        return view('school.academics.teacher', [
            'school' => $school,
            'category' => $category,
            'teachers' => $teachers,
        ]);
    }

    public function returnTeachers(int $school_id)
    {
        $name = "Teacher";
        $category = $this->staffCategory($school_id, $name);

        $teachers = User::query()
            ->where('school_id', $school_id)
            ->where('staff_category_id', $category->id)
            ->get();

        return $teachers;
    }

    /**
     * @throws ValidationException
     */
    public function postTeacher(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'gender' => ['required'],
        ]);

        User::query()->create([
            'school_id' => decrypt($request->school_id),
            'staff_category_id' => decrypt($request->staff_category_id),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => (new PageController())->alignPhoneNumber($request->phone),
            'gender' => $request->gender,
            'password' => Hash::make($request->phone),

        ]);

        alert()->success('success', 'Teacher successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getSubjects()
    {
        $school = $this->loggedIn();
        $subjects = $this->returnSubjects();

        return view('school.academics.subjects', [
            'school' => $school,
            'subjects' => $subjects,

        ]);
    }

    public function returnSubjects()
    {
        return Subject::query()->get();

    }


    public function getAssignSubjects(Request $request)
    {
        $school = $this->loggedIn();
        $classes = $this->getClasses();

        $filterClass = isset($request->class_id) ? $request->class_id : 0;
        $filterSection = isset($request->class_section_id) ? $request->class_section_id : 0;

        $subjects = $this->returnSubjects();

        $teachers = $this->returnTeachers($school->id);



        return view('school.academics.assign_subjects', [
            'school' => $school,
            'classes' => $classes,
            'subjects' => $subjects,
            'filterClass' => $filterClass,
            'filterSection' => $filterSection,
            'teachers' => $teachers,

        ]);
    }

    public function selectedTeacher(int $school_id, int $class_id, int $class_section, int $subject_id, int $teacher_id)
    {
        $selectedTeacher = TeacherSubject::query()
            ->where('school_id', $school_id)
            ->where('class_id', $class_id)
            ->where('class_section_id', $class_section)
            ->where('subject_id', $subject_id)
            ->where('teacher_id', $teacher_id)
            ->first();

        if ($selectedTeacher){
            return $selectedTeacher->teacher_id;
        }
        return null;
    }

    public function postAssignSubjects(Request $request)
    {
        $school = $this->loggedIn();

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'teacher')) {
                $code = substr($key, strlen('teacher'));
                $subject = Subject::where('code', $code)->first();

                // Check if teacher_id is not empty
                $teacherId = $request->input("teacher{$code}");
                if (!empty($teacherId) && $subject) {
                    TeacherSubject::query()->insert([
                        'school_id' => $school->id,
                        'class_id' => decrypt($request->class_id),
                        'class_section_id' => decrypt($request->class_section_id),
                        'teacher_id' => $teacherId,
                        'subject_id' => $subject->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        alert()->success('success', 'Subjects successfully assigned')->persistent('Okay');
        return redirect()->back();
    }

    public function getBomCategories()
    {
        $school = $this->loggedIn();
        $categories = BomCategory::query()->where('school_id', $school->id)->get();

        return view('school.academics.bom_categories', [
            'school' => $school,
            'categories' => $categories,

        ]);
    }

    public function postBomCategories(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        BomCategory::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Bom category successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getBomMembers()
    {
        $school = $this->loggedIn();
        $categories = BomCategory::query()->where('school_id', $school->id)->get();

        $members = [];

        foreach ($categories as $category) {
            $categoryMembers = BOMmember::where('category_id', $category->id)->get();
            $members[$category->id] = $categoryMembers;
        }


        return view('school.academics.bom_members', [
            'school' => $school,
            'categories' => $categories,
            'members' => $members,

        ]);
    }

    public function postBomMembers(Request $request)
    {

        $this->validate($request, [
            'category_id' => 'required|not_in:0',
            'full_name' => 'required',
            'gender' => 'required|not_in:0',
            'age' => 'required',
            'academic_qualification' => 'required',
            'current_employment' => 'required',
        ]);

        BOMmember::query()->create([
            'school_id' => decrypt($request->school_id),
            'category_id' => $request->category_id,
            'name' => $request->full_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'academic_qualification' => $request->academic_qualification,
            'current_employment' => $request->current_employment,
        ]);

        alert()->success('success', 'Bom member successfully added')->persistent('Okay');
        return redirect()->back();

    }

    public function getLibrarians()
    {
        $school = $this->loggedIn();
        $name = "Librarian";
        $category = $this->staffCategory($school->id, $name);

        $librarians = $this->returnLibrarians($school->id);

        return view('school.library.librarians', [
            'school' => $school,
            'category' => $category,
            'librarians' => $librarians,
        ]);
    }

    public function postLibrarian(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'gender' => ['required'],
        ]);

        User::query()->create([
            'school_id' => decrypt($request->school_id),
            'staff_category_id' => decrypt($request->staff_category_id),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => (new PageController())->alignPhoneNumber($request->phone),
            'gender' => $request->gender,
            'password' => Hash::make($request->phone),

        ]);

        alert()->success('success', 'Librarian successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function returnLibrarians(int $school_id)
    {
        $name = "Librarian";
        $category = $this->staffCategory($school_id, $name);

        $librarians = User::query()
            ->where('school_id', $school_id)
            ->where('staff_category_id', $category->id)
            ->get();

        return $librarians;
    }

    public function getBookList()
    {
        $school = $this->loggedIn();
        $subjects = $this->returnSubjects();
        $librarians = $this->returnLibrarians($school->id);
        $books = $this->returnBooks($school->id);

        return view('school.library.book_list', [
            'school' => $school,
            'subjects' => $subjects,
            'librarians' => $librarians,
            'books' => $books,
        ]);
    }

    public function postBook(Request $request)
    {
        $this->validate($request, [
            'subject_id' => 'required|not_in:0',
            'book_title' => ['required', 'string', 'max:255'],
            'book_number' => ['required', 'string', 'max:255'],
            'quantity' => 'required',
            'publisher' => ['required', 'string', 'max:255'],
            'price' => 'required',
        ]);

        Book::query()->create([
            'school_id' => decrypt($request->school_id),
            'subject_id' =>$request->subject_id,
            'book_title' => $request->book_title,
            'book_number' => $request->book_number,
            'quantity' => $request->quantity,
            'publisher' => $request->publisher,
            'price' => $request->price,

        ]);

        alert()->success('success', 'Book successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function returnBooks(int $school_id)
    {
        $books = Book::query()->where('school_id', $school_id)->with('subject')->get();
        if ($books) {
            return $books;
        }
        return null;

    }

    public function getIssueReturn()
    {
        $school = $this->loggedIn();
        $subjects = $this->returnSubjects();
        $librarians = $this->returnLibrarians($school->id);
        $books = $this->returnBooks($school->id);
        $staffs = $this->returnStaff($school->id);
        $students = $this->returnStudents($school->id);
        $issueReturns = IssueReturn::query()->where('school_id', $school->id)->get();

        return view('school.library.issue_return', [
            'school' => $school,
            'subjects' => $subjects,
            'librarians' => $librarians,
            'books' => $books,
            'staffs' => $staffs,
            'students' => $students,
            'issueReturns' => $issueReturns,
        ]);
    }

    public function returnStaff(int $school_id)
    {
        $staffs = User::query()->where('school_id', $school_id)->get();
        if ($staffs)
        {
            return $staffs;
        }
        return null;
    }

    public function returnStudents(int $school_id)
    {
        $students = Student::query()
            ->where('school_id', $school_id)
            ->with('form')
            ->with('stream')
            ->get();

        if ($students)
        {
            return $students;
        }
        return null;
    }

    public function postIssueReturn(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|not_in:0',
            'is_staff' => 'required',
            'student_id' => '',
            'staff_id' => '',
            'issue_date' =>  'required',
            'return_date' => 'required',
        ]);

        IssueReturn::query()->create([
            'school_id' => decrypt($request->school_id),
            'issued_by' => decrypt($request->school_id),
            'book_id' => $request->book_id,
            'is_staff' => $request->is_staff,
            'issued_to' => $request->staff_id ? $request->staff_id : $request->student_id,
            'issued_date' => $request->issue_date,
            'return_date' => $request->return_date,

        ]);
        alert()->success('success', 'Book issued successfully')->persistent('Okay');
        return redirect()->back();
    }

    public function returnIssuedBook(int $id)
    {
        $school = $this->loggedIn();
        $issue = IssueReturn::query()->where('school_id', $school->id)->where('id', $id)->first();
        $issue->is_returned = 1;
        $issue->update();
        alert()->success('success', 'Book has been marked as returned.')->persistent('Okay');
        return redirect()->back();

    }

    public function getItemCategories()
    {
        $school = $this->loggedIn();
        $categories = $this->returnItemCategories($school->id);

        return view('school.inventory.item_category', [
            'school' => $school,
            'categories' => $categories,

        ]);

    }

    public function postItemCategories(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        ItemCategory::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Item category successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function returnItemCategories(int $school_id)
    {
        $itemCategories = ItemCategory::query()->where('school_id', $school_id)->get();
        if ($itemCategories) {
            return $itemCategories;
        }
        return null;

    }



    public function getItemList()
    {
        $school = $this->loggedIn();
        $categories = $this->returnItemCategories($school->id);
        $items = Item::query()->where('school_id', $school->id)->with('category')->get();

        return view('school.inventory.add_item', [
            'school' => $school,
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function postItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required|not_in:0',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        Item::query()->create([
            'school_id' => decrypt($request->school_id),
            'item_category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,

        ]);

        alert()->success('success', 'Item successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getVehicleRoute()
    {
        $school = $this->loggedIn();
        $routes = $this->returnVehicleRoutes($school->id);

        return view('school.transport.vehicle_routes', [
            'school' => $school,
            'routes' => $routes,
        ]);
    }


    public function returnVehicleRoutes(int $school_id)
    {
        $routes = VehicleRoute::query()->where('school_id', $school_id)->get();
        if ($routes) {
            return $routes;
        }
        return null;

    }

    public function postVehicleRoute(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        VehicleRoute::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Vehicle Route successfully added')->persistent('Okay');
        return redirect()->back();
    }


    public function getVehicles()
    {
        $school = $this->loggedIn();
        $vehicles = $this->returnVehicles($school->id);

        return view('school.transport.vehicles', [
            'school' => $school,
            'vehicles' => $vehicles,
        ]);
    }


    public function returnVehicles(int $school_id)
    {
        $vehicles = Vehicle::query()->where('school_id', $school_id)->get();
        if ($vehicles) {
            return $vehicles;
        }
        return null;

    }

    public function postVehicle(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Vehicle::query()->create([
            'school_id' => $request->school_id,
            'name' => $request->name,

        ]);

        alert()->success('success', 'Vehicle successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getExaminationList()
    {
        $school = $this->loggedIn();
        $exams = $this->returnExaminationList($school->id);

        return view('school.examination.exam_list', [
            'school' => $school,
            'exams' => $exams,
        ]);
    }

    public function returnExaminationList(int $school_id)
    {
        $exams = Exam::query()->where('school_id', $school_id)->get();
        if ($exams) {
            return $exams;
        }
        return null;

    }


    public function postExamination(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Exam::query()->create([
            'school_id' => decrypt($request->school_id),
            'name' => $request->name,
            'note' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);

        alert()->success('success', 'Exam successfully added')->persistent('Okay');
        return redirect()->back();
    }

    public function getMarksGrade()
    {
        $school = $this->loggedIn();
        $grades = $this->returnMarksGrade($school->id);
        $types = $this->returnMarkingType($school->id);

        return view('school.examination.marks_grade', [
            'school' => $school,
            'grades' => $grades,
            'types' => $types,
        ]);
    }

    public function postMarkingType(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        MarkingType::query()->create([
            'school_id' => decrypt($request->school_id),
            'name' => $request->name,

        ]);

        alert()->success('success', 'Exam marking Type successfully added')->persistent('Okay');
        return redirect()->back();
    }


    public function postMarksGrade(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'percentage_from' => 'required',
            'percentage_to' => 'required',
            'points' => 'required',
            'marking_type' => 'required|not_in:0',
        ]);

        MarksGrade::query()->create([
            'school_id' => decrypt($request->school_id),
            'name' => $request->name,
            'percentage_from' => $request->percentage_from,
            'percentage_to' => $request->percentage_to,
            'points' => $request->points,
            'marking_type' => $request->marking_type,

        ]);

        alert()->success('success', 'Exam Grade successfully added')->persistent('Okay');
        return redirect()->back();
    }


    public function returnMarksGrade(int $school_id)
    {
        $grades = MarksGrade::query()->where('school_id', $school_id)->get();
        if ($grades) {
            return $grades;
        }
        return null;

    }

    public function returnMarkingType(int $school_id)
    {
        $types = MarkingType::query()->where('school_id', $school_id)->get();
        if ($types) {
            return $types;
        }
        return null;

    }


    public function getRecordMarks(Request $request)
    {
        $school = $this->loggedIn();
        $classes = $this->getClasses();
        $exams = $this->returnExaminationList($school->id);

        $filterExam = isset($request->exam_id) ? $request->exam_id : 0;
        $filterClass = isset($request->class_id) ? $request->class_id : 0;
        $filterSection = isset($request->class_section_id) ? $request->class_section_id : 0;
        $filterSubject = isset($request->subject_id) ? $request->subject_id : 0;

        $students = [];
        $column = 0;
        if ($filterClass && $filterSection && $filterSubject) {
            $studentsResult = Student::query()
                ->where('class_id', $filterClass)
                ->where('class_section_id', $filterSection)
                ->with('form')
                ->with('stream')
                ->get();

            $students = $studentsResult;

            $subject = $this->returnSubjectColumn($filterSubject);
            $column = $subject->code.'_score';

        }

        $subjects = $this->returnSubjects();



        return view('school.examination.add_marks', [
            'school' => $school,
            'exams' => $exams,
            'classes' => $classes,
            'students' => $students,
            'filterExam' => $filterExam,
            'filterClass' => $filterClass,
            'filterSection' => $filterSection,
            'subjects' => $subjects,
            'filterSubject' => $filterSubject,
            'column' => $column,

        ]);
    }

    public function getSubjectFromId(int $id)
    {
        $subject = Subject::query()->where('id', $id)->first();
        if ($subject) {
            return $subject;
        }
        return null;
    }

    public function postRecordMarks(Request $request)
    {
        $school = $this->loggedIn();

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'student')) {
                $student_id = substr($key, strlen('student'));
                $student_score = $request['score'.$student_id];
                $subject = $this->returnSubjectColumn(decrypt($request->subject));
                $class_id = decrypt($request->class_id);
                $exam_id = decrypt($request->exam_id);

                $existingResult = ExamResult::where('exam_id', $exam_id)
                    ->where('student_id', $student_id)
                    ->first();


                if ($existingResult) {
                    $existingResult->{$subject->code.'_score'} = $student_score;
                    $existingResult->updated_at = Carbon::now();
                    $existingResult->save();
                } else {
                    // Insert new result
                    ExamResult::query()->insert([
                        'school_id' => $school->id,
                        'exam_id' => $exam_id,
                        'class_id' => $class_id,
                        "{$subject->code}_score" => $student_score,
                        'student_id' => $student_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        alert()->success('success', 'Marks recorded successfully')->persistent('Okay');
        return redirect()->back();
    }

    public function studentScore(int $exam_id, int $student_id, int $subject_id)
    {
        $subject = Subject::query()->where('id', $subject_id)->first();

        $studentScore = ExamResult::query()
            ->where('exam_id', $exam_id)
            ->where('student_id', $student_id)
            ->first();

        if ($studentScore){
            return $studentScore;
        }
        return null;
    }

    public function returnSubjectColumn(int $subject_id)
    {
        $subject = Subject::query()->where('id', $subject_id)->first();

        if ($subject) {
            return $subject;
        }

        return null;
    }

    public function getClassAnalysis(Request $request)
    {
        $school = $this->loggedIn();
        $exams = $this->returnExaminationList($school->id);
        $classes = $this->getClasses();

        $grades = $this->returnMarksGrade($school->id);
        $types = $this->returnMarkingType($school->id);

        $filterExam = isset($request->exam_id) ? $request->exam_id : 0;
        $filterClass = isset($request->class_id) ? $request->class_id : 0;

        $subjects = $this->returnClassSubjects($school->id, $filterClass) ;

        $results = $this->returnClassResults($school->id, $filterExam, $filterClass);

        return view('school.examination.class_analysis', [
            'school' => $school,
            'exams' => $exams,
            'classes' => $classes,
            'filterExam' => $filterExam,
            'filterClass' => $filterClass,
            'grades' => $grades,
            'types' => $types,
            'subjects' => $subjects,
            'results' => $results,
        ]);
    }

    public function returnClassSubjects(int $school_id, int $class_id)
    {
        $classSubjects =  TeacherSubject::query()
            ->where('school_id', $school_id)
            ->where('class_id', $class_id)
            ->get();

        if ($classSubjects) {
            return $classSubjects;
        }
        return null;

    }

    public function returnClassResults(int $school_id, int $exam_id, int $class_id)
    {
        $results = ExamResult::query()
            ->where('school_id', $school_id)
            ->where('exam_id', $exam_id)
            ->where('class_id', $class_id)
            ->with('student')
            ->get();
        if ($results) {
            return $results;
        }

        return null;
    }


}
