<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{ request()->is('smartshule/school') ? 'active' : '' }}">
                <a href="{{ route('school.dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-item has-sub">
                <a href="#" class="menu-link">
                        <span class="menu-icon">
                        <i class="fa fa-envelope"></i>
                        <span class="menu-icon-label">6</span>
                        </span>
                    <span class="menu-text">Messaging</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Send Email/SMS</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">SMS log</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Notice Board</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">ACADEMICS</div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/student/*') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link ">
                    <div class="menu-icon">
                        <i class="fa fa-wallet"></i>
                    </div>
                    <div class="menu-text d-flex align-items-center">Students Information</div>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/student/details') ? 'active' : '' }}">
                        <a href="{{ route('school.student.details') }}" class="menu-link">
                            <div class="menu-text">Student Details</div>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/student/admission') ? 'active' : '' }}">
                        <a href="{{ route('school.student.admission') }}" class="menu-link">
                            <div class="menu-text">Student Admission</div>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/student/category') ? 'active' : '' }}">
                        <a href="{{ route('school.student.category') }}" class="menu-link">
                            <div class="menu-text">Student Categories</div>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/student/analysis') ? 'active' : '' }}">
                        <a href="{{ route('school.population.analysis') }}" class="menu-link">
                            <div class="menu-text">Population Analysis</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <div class="menu-text">Promote Students</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/fee/*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-money-bill-1"></i></span>
                    <span class="menu-text">Fees Collection </span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/fee/type') ? 'active' : '' }}">
                        <a href="{{ route('school.fee.type') }}" class="menu-link">
                            <span class="menu-text">Fees Type</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('school.student.details') }}" class="menu-link">
                            <span class="menu-text">Collect Fees</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/fee/statement') ? 'active' : '' }}">
                        <a href="{{ route('school.fee.statement') }}" class="menu-link">
                            <span class="menu-text">Fees Payment </span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/fee/statement') ? 'active' : '' }}">
                        <a href="{{ route('school.fee.statement') }}" class="menu-link">
                            <span class="menu-text">Fees Statement </span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/fee/balance_report') ? 'active' : '' }}">
                        <a href="{{ route('school.fee.balance_report') }}" class="menu-link">
                            <span class="menu-text">Balance Fee Report</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/fee/accountants') ? 'active' : '' }}">
                        <a href="{{ route('school.accountant.list') }}" class="menu-link">
                            <span class="menu-text">Accountants</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/expenses/*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-credit-card"></i></span>
                    <span class="menu-text">Expenses </span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/expenses/head') ? 'active' : '' }}">
                        <a href="{{ route('school.expense.head') }}" class="menu-link ">
                            <span class="menu-text">Expense Head</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/expenses/list') ? 'active' : '' }}">
                        <a href="{{ route('school.expense.list') }}" class="menu-link">
                            <span class="menu-text">Add Expense</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/academics/*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-school"></i></span>
                    <span class="menu-text">Academics </span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/academics/timetable') ? 'active' : '' }}">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Class Timetable</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/assignSubjects') ? 'active' : '' }}">
                        <a href="{{ route('school.academics.assignSubjects') }}" class="menu-link">
                            <span class="menu-text">Assign Subjects</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/subjects') ? 'active' : '' }}">
                        <a href="{{ route('school.academics.subjects') }}" class="menu-link">
                            <span class="menu-text">Subjects </span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/teachers') ? 'active' : '' }}">
                        <a href="{{ route('school.academics.teachers') }}" class="menu-link">
                            <span class="menu-text">Teacher </span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/classes') ? 'active' : '' }}">
                        <a href="{{ route('school.class') }}" class="menu-link">
                            <span class="menu-text">Class</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/streams') ? 'active' : '' }}">
                        <a href="{{ route('school.stream') }}" class="menu-link">
                            <span class="menu-text">Stream</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/others') ? 'active' : '' }}">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Other Workers</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/staffCategories') ? 'active' : '' }}">
                        <a href="{{ route('school.staff.category') }}" class="menu-link">
                            <span class="menu-text">Staff Categories</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/bomCategories') ? 'active' : '' }}">
                        <a href="{{ route('school.academics.bomCategories') }}" class="menu-link">
                            <span class="menu-text">BOM Categories</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/academics/bomMembers') ? 'active' : '' }}">
                        <a href="{{ route('school.academics.bomMembers') }}" class="menu-link">
                            <span class="menu-text">BOM Members</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-file-alt"></i></span>
                    <span class="menu-text">Examinations</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Exam List</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Schedule Exam</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Exam Schedule</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Add Marks</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Marks Grade</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Stream Analysis</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Gender Analysis</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Class Analysis</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/library/*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-book"></i></span>
                    <span class="menu-text">Library </span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/library/bookList') ? 'active' : '' }}">
                        <a href="{{ route('school.library.bookList') }}" class="menu-link">
                            <span class="menu-text">Book List</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/library/issueReturn') ? 'active' : '' }}">
                        <a href="{{ route('school.library.issueReturn') }}" class="menu-link">
                            <span class="menu-text">Issue Return </span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('smartshule/school/library/librarians') ? 'active' : '' }}" >
                        <a href="{{ route('school.library.librarians') }}" class="menu-link">
                            <span class="menu-text">Librarians </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-list"></i></span>
                    <span class="menu-text">Inventory </span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Item Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Add Item</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Update Item Stock</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-download"></i></span>
                    <span class="menu-text">Download Center</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="t#" class="menu-link">
                            <span class="menu-text">Upload Content</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Assignment</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Study Material</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-bus"></i></span>
                    <span class="menu-text">Transport</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Routes</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Vehicles</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Assign Vehicle</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->is('smartshule/school/report/*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-chart-bar"></i></span>
                    <span class="menu-text">Reports</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->is('smartshule/school/report/students') ? 'active' : '' }}">
                        <a href="{{ route('school.student.report') }}" class="menu-link">
                            <span class="menu-text">Student Report</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Fee Statements</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Transaction Report</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Attendance Report</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-text">Class Analysis</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">Users</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-user-circle"></i></span>
                    <span class="menu-text">User Logs</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="calendar.html" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-calendar"></i></span>
                    <span class="menu-text">Calendar</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="{{ route('school.settings') }}" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-cog"></i></span>
                    <span class="menu-text">Settings</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="helper.html" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-question-circle"></i></span>
                    <span class="menu-text">Helper</span>
                </a>
            </div>
            <div class="p-3 px-4 mt-auto hide-on-minified">
                <a href="documentation/index.html" class="btn btn-secondary d-block w-100 fw-600 rounded-pill">
                    <i class="fa fa-code-branch me-1 ms-n1 opacity-5"></i> Documentation
                </a>
            </div>
        </div>

    </div>


    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>

</div>
