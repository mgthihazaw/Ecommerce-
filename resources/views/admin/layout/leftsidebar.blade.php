<aside class="menu-sidebar2">
    <div class="logo bg-white">
        <a href="#">
          <img src="/admin/images/logo/image1.png" alt="">
        </a>
        <hr>
    </div>
    
    <div class="menu-sidebar2__content js-scrollbar1">
        {{-- <div class="account2"> --}}
            {{-- <div class="image img-cir img-120">
                <img src="/admin/images/icon/avatar-big-01.jpg" alt="John Doe" />
            </div> --}}
            {{-- <h4 class="name">john doe</h4>
            <a href="#">CEO</a>
        </div> --}}
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                    
                   
                <li>
                    <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt text-success"></i>Dashboard
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-trophy text-info"></i>Categories
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                        <a href="{{ route('category.index') }}">
                                <i class="fas fa-table"></i>Category Table</a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="far fa-plus-square"></i>Create Category</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="{{route('setting')}}">
                            <i class="fas fa-cog "></i>Settings
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt text-danger"></i>logout
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>