    <!-- navbar  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg nav-tabs ">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav nav-tabs ml-auto">
                <li class="nav-item active">
                    <a href="{{route('dashboard')}}"   class="nav-link  {{request()->is('dashboard')? 'active' : ''}}" >التقارير الشهرية</a>
                </li>
                </li>
                <li class="nav-item">
                  <a href="{{route('addacademy')}}"   class="nav-link  {{request()->is('addacademy')? 'active' : ''}}" >الأكاديمية</a>
              </li>
                <li class="nav-item">
                    <a href="{{route('adddirectorate')}}"   class="nav-link  {{request()->is('adddirectorate')? 'active' : ''}}" >المديرية الإقلمية</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('adddistrict')}}"   class="nav-link  {{request()->is('adddistrict')? 'active' : ''}}" >القطاع المدرسي</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('addSchool')}}"   class="nav-link  {{request()->is('addSchool')? 'active' : ''}}" > المؤسسات</a>
                </li>  
                
                <li class="nav-item">
                    <a href="{{route('profile_edit')}}"   class="nav-link  {{request()->is('profile_edit')? 'active' : ''}}" > معلوماتي</a>
                </li>
              </ul>
            <ul  class="nav">
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('الخروج') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
              </ul>
            </div>
          </div>
        </nav>