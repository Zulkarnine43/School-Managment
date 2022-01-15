<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{asset('public/assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    <!-- Sidebar -->    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->image))?url('public/assets/backend/upload/users/'.Auth::user()->image):url('assets/backend/upload/default.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profiles.view') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
      @endphp
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ ($route=='home')?'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if(Auth::user()->usertype=='admin')
          {{-- <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>              
            </ul>
          </li>           --}}
          @endif
          @if(Auth::user()->usertype=='admin')
          <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route=='profiles.password.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/setups')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setup Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('setups.student.class.view') }}" class="nav-link {{ ($route=='setups.student.class.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class Info</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('setups.student.year.view') }}" class="nav-link {{ ($route=='setups.student.year.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Year/Sessions</p>
                </a>
              </li>  --}}
              {{-- <li class="nav-item">
                <a href="{{ route('setups.student.group.view') }}" class="nav-link {{ ($route=='setups.student.group.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groups</p>
                </a>
              </li>  --}}
              <li class="nav-item">
                <a href="{{ route('setups.student.shift.view') }}" class="nav-link {{ ($route=='setups.student.shift.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shifts</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('setups.fee.category.view') }}" class="nav-link {{ ($route=='setups.fee.category.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Categories</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('setups.fee.amount.view') }}" class="nav-link {{ ($route=='setups.fee.amount.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Amounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('setups.exam.type.view') }}" class="nav-link {{ ($route=='setups.exam.type.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Types</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('setups.subject.view') }}" class="nav-link {{ ($route=='setups.subject.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('setups.assign.subject.view') }}" class="nav-link {{ ($route=='setups.assign.subject.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subjects</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('setups.employee.designation.view') }}" class="nav-link {{ ($route=='setups.employee.designation.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designations</p>
                </a>
              </li>              
            </ul>
          </li> 
          
          <li class="nav-item has-treeview {{ ($prefix=='/students')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('students.registration.view') }}" class="nav-link {{ ($route=='students.registration.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('students.roll.view') }}" class="nav-link {{ ($route=='students.roll.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roll Generate</p>
                </a>
              </li> 
              {{-- <li class="nav-item">
                <a href="{{ route('students.registration.fee.view') }}" class="nav-link {{ ($route=='students.registration.fee.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('students.monthly.fee.view') }}" class="nav-link {{ ($route=='students.monthly.fee.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('students.exam.fee.view') }}" class="nav-link {{ ($route=='students.exam.fee.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Fee</p>
                </a>
              </li>                --}}
            </ul>
          </li>

          <li class="nav-item has-treeview {{ ($prefix=='/employees')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Teacher Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employees.registration.view') }}" class="nav-link {{ ($route=='employees.registration.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Registration</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('employees.salary.view') }}" class="nav-link {{ ($route=='employees.salary.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Salary</p>
                </a>
              </li>  --}}
              {{-- <li class="nav-item">
                <a href="{{ route('employees.leave.view') }}" class="nav-link {{ ($route=='employees.leave.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Leave</p>
                </a>
              </li>   --}}
              {{-- <li class="nav-item">
                <a href="{{ route('employees.attendance.view') }}" class="nav-link {{ ($route=='employees.attendance.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendace</p>
                </a>
              </li>    --}}
              {{-- <li class="nav-item">
                <a href="{{ route('employees.monthly.salary.view') }}" class="nav-link {{ ($route=='employees.monthly.salary.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Monthly Salary</p>
                </a>
              </li>        --}}
            </ul>
          </li>

          <li class="nav-item has-treeview {{ ($prefix=='/marks')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Marks Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('marks.add') }}" class="nav-link {{ ($route=='marks.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Entry</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('marks.edit') }}" class="nav-link {{ ($route=='marks.edit')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('marks.grade.view') }}" class="nav-link {{ ($route=='marks.grade.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade Point</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ ($prefix=='/accounts')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accounts Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('accounts.fee.view') }}" class="nav-link {{ ($route=='accounts.fee.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Fee</p>
                </a>
              </li> 
              {{-- <li class="nav-item">
                <a href="{{ route('accounts.salary.view') }}" class="nav-link {{ ($route=='accounts.salary.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('accounts.cost.view') }}" class="nav-link {{ ($route=='accounts.cost.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others Cost</p>
                </a>
              </li> 
            </ul>
          </li>

          <li class="nav-item has-treeview {{ ($prefix=='/reports')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reports Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{ route('reports.profit.view') }}" class="nav-link {{ ($route=='reports.profit.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Profit</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('reports.marksheet.view') }}" class="nav-link {{ ($route=='reports.marksheet.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marksheet</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('reports.attendance.view') }}" class="nav-link {{ ($route=='reports.attendance.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance Report</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('reports.result.view') }}" class="nav-link {{ ($route=='reports.result.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Result</p>
                </a>
              </li>
              
              {{-- <li class="nav-item">
                <a href="{{ route('reports.id-card.view') }}" class="nav-link {{ ($route=='reports.id-card.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students ID Card</p>
                </a>
              </li> --}}
            </ul>
          </li>
          @endif
          @if(Auth::user()->usertype=='student')
          <li class="nav-item has-treeview {{ ($prefix=='/info')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('studentinfo.view') }}" class="nav-link {{ ($route=='studentinfo.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Info View</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/student')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Mark
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.mark.view') }}" class="nav-link {{ ($route=='student.mark.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Mark View</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/payment')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Student Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('studentpayment.view') }}" class="nav-link {{ ($route=='studentpayment.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Payment View</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('studentinfo.add') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Assignment</p>
                </a>
              </li>              
            </ul>
          </li> 
          @endif

          @if(Auth::user()->usertype=='employee')
          <li class="nav-item has-treeview {{ ($prefix=='/teacherinfo')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Teacher Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('teacherinfo.view') }}" class="nav-link {{ ($route=='teacherinfo.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Info View</p>
                </a>
              </li>              
            </ul>
          </li>
        
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>