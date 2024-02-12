<div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>

            @if(Request::is('admin*'))
            <li class="submenu-open">
              <h6 class="submenu-hdr">Main</h6>
              <ul>
                <li>
                  <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i>
                    <span>Home</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="submenu-open">
              <h6 class="submenu-hdr">Learning</h6>
              <ul>
                <li>
                  <a href="{{ route('admin.course.index') }}">
                    <i data-feather="book"></i>
                    <span>Courses</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.unit.index') }}">
                    <i data-feather="plus-square"></i>
                    <span>Units</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.category.index') }}">
                    <i data-feather="codepen"></i>
                    <span>Category</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.topic.index') }}">
                    <i data-feather="tag"></i>
                    <span>Topics</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.lesson.index') }}">
                    <i data-feather="speaker"></i>
                    <span>Lessons</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.exercise') }}">
                    <i data-feather="align-justify"></i>
                    <span>Exercise</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.unit-exercise.index') }}">
                    <i data-feather="minimize-2"></i>
                    <span>Unit Exercises</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="submenu-open">
              <h6 class="submenu-hdr">Miscellaneous</h6>
              <ul>
                <li>
                  <a href="{{ route('admin.notes') }}">
                    <i data-feather="pen-tool"></i>
                    <span>Student Notes</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.question.index') }}">
                    <i data-feather="help-circle"></i>
                    <span>Questions</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.faq.index') }}">
                    <i data-feather="zoom-in"></i>
                    <span>FAQs</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.subscriber') }}">
                    <i data-feather="user"></i>
                    <span>Subscribers</span>
                  </a>
                </li>
                <li>
                    <a href="{{ route('admin.review.index') }}">
                      <i data-feather="message-square"></i>
                      <span>Reviews</span>
                    </a>
                  </li>
                <li class="submenu">
                  <a href="javascript:void(0);">
                    <i data-feather="users"></i>
                    <span>User</span>
                    <span class="menu-arrow"></span>
                  </a>
                  <ul>
                    <li>
                      <a href="{{ route('admin.users.index') }}">All User</a>
                    </li>
                    <li>
                      <a href="{{ route('admin.users.index') }}">Teachers</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}">Student</a>
                      </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="submenu-open">
                <h6 class="submenu-hdr">Settings</h6>
                <ul>
                    <li class="submenu">
                    <a href="javascript:void(0);">
                        <i data-feather="settings"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.user-profile') }}">My Profile</a></li>
                        {{-- <li><a href="{{ route('student.user-profile') }}">Review</a></li> --}}
                    </ul>
                    </li>
                    <li>

                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</a>
                                <!-- Logout form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>
            @endif


            @if(Request::is('teacher*'))
            <li class="submenu-open">
              <h6 class="submenu-hdr">Purchases</h6>
              <ul>
                <li>
                  <a href="purchaselist.html">
                    <i data-feather="shopping-bag"></i>
                    <span>Purchases</span>
                  </a>
                </li>
                <li>
                  <a href="importpurchase.html">
                    <i data-feather="minimize-2"></i>
                    <span>Import Purchases</span>
                  </a>
                </li>
                <li>
                  <a href="purchaseorderreport.html">
                    <i data-feather="file-minus"></i>
                    <span>Purchase Order</span>
                  </a>
                </li>
                <li>
                  <a href="purchasereturnlist.html">
                    <i data-feather="refresh-cw"></i>
                    <span>Purchase Return</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="submenu-open">
              <h6 class="submenu-hdr">Finance & Accounts</h6>
              <ul>
                <li class="submenu">
                  <a href="javascript:void(0);">
                    <i data-feather="file-text"></i>
                    <span>Expense</span>
                    <span class="menu-arrow"></span>
                  </a>
                  <ul>
                    <li>
                      <a href="expenselist.html">Expenses</a>
                    </li>
                    <li>
                      <a href="expensecategory.html">Expense Category</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            @endif


            @if(Request::is('student*'))
            <li class="submenu-open">
                <h6 class="submenu-hdr">Main</h6>
                <ul>
                  <li>
                    <a href="{{ route('student.dashboard') }}">
                      <i data-feather="home"></i>
                      <span>Home</span>
                    </a>
                  </li>
                </ul>
              </li>

            <li class="submenu-open">
              <h6 class="submenu-hdr">Learning</h6>
              <ul>
                <li>
                    <a href="{{ route('student.student-course') }}">
                      <i data-feather="award"></i>
                      <span>My Courses</span>
                    </a>
                  </li>
                <li>
                  <a href="{{ route('student.question.index') }}">
                    <i data-feather="help-circle"></i>
                    <span>Questions</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('student.note.index') }}">
                    <i data-feather="book"></i>
                    <span>My Notes</span>
                  </a>
                </li>
                <li>
                    <a href="{{ route('student.course') }}">
                      <i data-feather="grid"></i>
                      <span>Other Courses</span>
                    </a>
                  </li>
              </ul>
            </li>
            <li class="submenu-open">
                <h6 class="submenu-hdr">Payments</h6>
                <ul>
                  <li>
                    <a href="{{ route('student.payments') }}">
                      <i data-feather="dollar-sign"></i>
                      <span>Payments</span>
                    </a>
                  </li>
                </ul>
              </li>
            <li class="submenu-open">
                <h6 class="submenu-hdr">Settings</h6>
                <ul>
                    <li class="submenu">
                    <a href="javascript:void(0);">
                        <i data-feather="settings"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student.user-profile') }}">My Profile</a></li>
                        <li><a href="{{ route('student.user-profile') }}">Review</a></li>
                    </ul>
                    </li>
                    <li>

                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</a>
                                <!-- Logout form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>

            @endif



          </ul>
        </div>
      </div>
    </div>
