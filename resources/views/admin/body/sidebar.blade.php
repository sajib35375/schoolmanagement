
@php

    $route = \Illuminate\Support\Facades\Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a class="" href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('admin/images/logo-dark.png') }}" alt="">
                        <h3><b>ERP</b>System</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route=='dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin') --}}
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>User Manage</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='user.view' ? 'active' : '' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>User View</a></li>
                    <li class="{{ $route=='user.add' ? 'active' : '' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add New User</a></li>
                </ul>
            </li>
            {{-- @endif --}}
            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='profile.view' ? 'active' : '' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Profile View</a></li>
                    <li class="{{ $route=='password.view' ? 'active' : '' }}"><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Setup</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='student.class' ? 'active' : '' }}"><a href="{{ route('student.class') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li class="{{ $route=='student.year' ? 'active' : '' }}"><a href="{{ route('student.year') }}"><i class="ti-more"></i>Student Year</a></li>
                    <li class="{{ $route=='student.group' ? 'active' : '' }}"><a href="{{ route('student.group') }}"><i class="ti-more"></i>Student Group</a></li>
                    <li class="{{ $route=='student.shift' ? 'active' : '' }}"><a href="{{ route('student.shift') }}"><i class="ti-more"></i>Student Shift</a></li>
                    <li class="{{ $route=='fee.category' ? 'active' : '' }}"><a href="{{ route('fee.category') }}"><i class="ti-more"></i>Student Fee Category</a></li>
                    <li class="{{ $route=='fee.amount' ? 'active' : '' }}"><a href="{{ route('fee.amount') }}"><i class="ti-more"></i>Student Fee Amount</a></li>
                    <li class="{{ $route=='exam.type' ? 'active' : '' }}"><a href="{{ route('exam.type') }}"><i class="ti-more"></i>Exam Type</a></li>
                    <li class="{{ $route=='subject.view' ? 'active' : '' }}"><a href="{{ route('subject.view') }}"><i class="ti-more"></i>Subject View</a></li>
                    <li class="{{ $route=='assign_subject' ? 'active' : '' }}"><a href="{{ route('assign_subject') }}"><i class="ti-more"></i>Assign Subject</a></li>
                    <li class="{{ $route=='designation' ? 'active' : '' }}"><a href="{{ route('designation') }}"><i class="ti-more"></i>Designation</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='student.reg' ? 'active' : '' }}"><a href="{{ route('student.reg') }}"><i class="ti-more"></i>Student Registration</a></li>
                    <li class="{{ $route=='roll.generator' ? 'active' : '' }}"><a href="{{ route('roll.generator') }}"><i class="ti-more"></i>Roll Generator</a></li>
                    <li class="{{ $route=='student.fee' ? 'active' : '' }}"><a href="{{ route('student.fee') }}"><i class="ti-more"></i>Student Registration Fee</a></li>
                    <li class="{{ $route=='monthly.fee' ? 'active' : '' }}"><a href="{{ route('monthly.fee') }}"><i class="ti-more"></i>Student Monthly Fee</a></li>
                    <li class="{{ $route=='exam.type.fee' ? 'active' : '' }}"><a href="{{ route('exam.type.fee') }}"><i class="ti-more"></i>Student Exam Fee</a></li>
                    <li class="{{ $route=='other.fee.add' ? 'active' : '' }}"><a href="{{ route('other.fee.all') }}"><i class="ti-more"></i>Student Other Fee</a></li>
                    <li class="{{ $route=='other.fee.view' ? 'active' : '' }}"><a href="{{ route('other.fee.view') }}"><i class="ti-more"></i>Student Other Fee Search</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Employee Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='employee.reg' ? 'active' : '' }}"><a href="{{ route('employee.reg') }}"><i class="ti-more"></i>Employee Registration</a></li>
                    <li class="{{ $route=='employee.salary' ? 'active' : '' }}"><a href="{{ route('employee.salary') }}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li class="{{ $route=='employee.leave' ? 'active' : '' }}"><a href="{{ route('employee.leave') }}"><i class="ti-more"></i>Employee Leave</a></li>
                    <li class="{{ $route=='employee.attendance' ? 'active' : '' }}"><a href="{{ route('employee.attendance') }}"><i class="ti-more"></i>Employee Attendance</a></li>
                    <li class="{{ $route=='monthly.salary' ? 'active' : '' }}"><a href="{{ route('monthly.salary') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Marks Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='marks.add' ? 'active' : '' }}"><a href="{{ route('marks.add') }}"><i class="ti-more"></i>Student Marks Entry</a></li>
                    <li class="{{ $route=='all.marks.show' ? 'active' : '' }}"><a href="{{ route('all.marks.show') }}"><i class="ti-more"></i>Student Marks Show</a></li>
                    <li class="{{ $route=='edit.mark.view' ? 'active' : '' }}"><a href="{{ route('edit.mark.view') }}"><i class="ti-more"></i>Student Marks Edit</a></li>
                    <li class="{{ $route=='student.grade.view' ? 'active' : '' }}"><a href="{{ route('student.grade.view') }}"><i class="ti-more"></i>Student Marks Grade</a></li>

                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>All Fee Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='student.fee.view' ? 'active' : '' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Student Fee</a></li>
                    <li class="{{ $route=='submit.other.fee' ? 'active' : '' }}"><a href="{{ route('submit.other.fee') }}"><i class="ti-more"></i>Student Other Fee</a></li>
                    <li class="{{ $route=='employee.salary.view' ? 'active' : '' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li class="{{ $route=='other.cost.view' ? 'active' : '' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li>


                </ul>
            </li>








            <li class="header nav-small-cap">All Reports</li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Reports Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route=='profit.view' ? 'active' : '' }}"><a href="{{ route('profit.view') }}"><i class="ti-more"></i>Monthly/Yearly Profit</a></li>
                    <li class="{{ $route=='marksheet.view' ? 'active' : '' }}"><a href="{{ route('marksheet.view') }}"><i class="ti-more"></i>Marksheet View</a></li>
                    <li class="{{ $route=='attendance.report.view' ? 'active' : '' }}"><a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Reports View</a></li>
                    <li class="{{ $route=='student.result.view' ? 'active' : '' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result View</a></li>



                </ul>
            </li>






        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
