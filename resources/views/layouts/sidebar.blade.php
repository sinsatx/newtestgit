

 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> Admin Dashboard
        
    <!-- <sup>1 </sup> -->

</div>
</a>

@if(Auth::user()->nivel == 'admin')

<!-- Divider -->
<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="/admin/">
        <i class="fas fa-fw fa-chart-area"></i>
            <span>Data</span>
        </a>
</li>



        <li class="nav-item">
            <a class="nav-link" href="/admin/usuarios">
                <i class="fas fa-fw fa-chart-area"></i>
                    <span>Users</span>
                </a>
        </li>


<li class="nav-item">
    <a class="nav-link" href="/admin/productos">
        <i class="fas fa-fw fa-chart-area"></i>
            <span>Posts</span>
        </a>
</li>



<li class="nav-item">
    <a class="nav-link" href="/admin/comments">
        <i class="fas fa-fw fa-chart-area"></i>
            <span>Comments (Without Login)</span>
        </a>
</li>


<li class="nav-item">
    <a class="nav-link" href="/admin/commentlogins">
        <i class="fas fa-fw fa-chart-area"></i>
            <span>Comments / Login </span>
        </a>
</li>

@endif

</ul>