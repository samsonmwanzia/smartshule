<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\Expense;
use App\Models\ExpenseHead;
use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Form;
use App\Models\Notification;
use App\Models\School;
use App\Models\StaffCategory;
use App\Models\Statement;
use App\Models\Student;
use App\Models\StudentCategory;
use App\Models\SubCounty;
use App\Models\User;
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



}
