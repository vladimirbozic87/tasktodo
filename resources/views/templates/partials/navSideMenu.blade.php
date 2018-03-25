<div class="nav-side-menu">
    <div class="brand">{{ Auth::user()->getRole() }}</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                  <li>Project Service</li>
                  <li>User Service</li>
                  <li>Task Service</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li><a href="{{ route('company.project') }}">Project</a></li>
                  <li><a href="{{ route('users.index') }}">User</a></li>
                  <li><a href="{{ route('task.index') }}">Task</a></li>
                </ul>


                 <li>
                  <a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                 </li>

                 <li>
                  <a href="{{ route('users.all') }}">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>

                <li>
                 <a href="{{ route('task.taskline', ['username' => Auth::user()->username]) }}">
                 <i class="fa fa-tasks fa-lg"></i> Tasks
                 </a>
               </li>
            </ul>
     </div>
</div>
