<nav class="navbar navbar-expand-md bg-dark">
    <a href="/" class="navbar-brand">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item avtive">
                <a href="/todos" class="nav-link">Lists<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item avtive">
                <a href="/news-todo" class="nav-link">Create<span class="sr-only">(current)</span></a>
            </li>
            
        </ul>
    </div>
    
        <!-- <ul class="menu-user">
            <li class="menu-user-info" style="color:white">
                Admin
                <ul>
                    <li><a href="#">Sửa thông tin</a></li>
                    <li><a href="#">Đăng xuất</a></li>
                </ul>
            </li>
        </ul> -->
    @if(Auth::user() == null)
        <a href="/login" class="navbar-brand" id="login"><i class="fas fa-user"></i><span>Đăng nhập</span></a>
    @else
            <!-- <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">{{Auth::user()->name}}</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Sửa thông tin</a>
                    <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('logout')}}">Đăng xuất</a>
                </div>
            </div> -->
            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">{{Auth::user()->name}}</button>
                <div class="dropdown-menu">
                    <a href="/user/{{Auth::user()->id}}/edit" class="dropdown-item">Sửa thông tin</a>
                    <a href="/user/{{Auth::user()->id}}/change-password" class="dropdown-item">Đổi mật khẩu</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{url('logout')}}" class="dropdown-item">Đăng xuất</a>
                </div>
            </div>
    @endif
</nav> <!-- menu -->


