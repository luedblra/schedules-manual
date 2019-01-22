<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">






                <a href="#" class="d-block">
                    {{\Auth::user()->name}}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
                <!-- <li class="nav-item has-treeview menu-open">
<a href="#" class="nav-link active">
<i class="nav-icon fa fa-dashboard"></i>
<p>
Starter Pages
<i class="right fa fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link active">
<i class="fa fa-circle-o nav-icon"></i>
<p>Active Page</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Inactive Page</p>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-th"></i>
<p>
Simple Link
<span class="right badge badge-danger">New</span>
</p>
</a>
</li>-->
                <li class="nav-item">
                    <a href="{{route('UploadFile.index')}}" class="nav-link" title="Habors">
                        <i class="nav-icon fa fa-globe-americas"></i>
                        <p>
                            Harbors
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-upload"></i>
                        <p>
                            Importation
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('importation.index')}}" class="nav-link" title="Importation">
                                <i class="nav-icon fa fa-cloud-upload-alt"></i>
                                <p>
                                    Importation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('AcountS.index')}}" class="nav-link" title="Acounts Schedules">
                                <i class="nav-icon fa fa-clipboard-list"></i>
                                <p>
                                    Acounts Schedules
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('schedule.index')}}" class="nav-link" title="Acounts Schedules">
                        <i class="nav-icon fa fa-file-import"></i>
                        <p>
                            Schedules
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('passwordGT.index')}}" class="nav-link" title="Password Grant Token">
                        <i class="nav-icon fa fa-unlock-alt"></i>
                        <p>
                            Password Grant Token
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('index.credential.api')}}" class="nav-link" title="Credentials Api">
                        <i class="nav-icon fa fa-key"></i>
                        <p>
                            Credentials Api
                        </p>
                    </a>
                </li>
                <!--
<li class="nav-item">
<a href="{{route('importation.create')}}" class="nav-link" title="Habors">
<i class="nav-icon fa fa-vial"></i>
<p>
Test - - Importation
</p>
</a>
</li> -->
                <li class="nav-item">
                    <a href="{{route('force.api.consume')}}" class="nav-link" title="Test Api Consume">
                        <i class="nav-icon fa fa-bolt"></i>
                        <p>
                            Force API Consume
                        </p>
                    </a>
                </li> 

                <li class="nav-item">
                    <a href="{{route('test.api')}}" class="nav-link" title="Test Api Consume">
                        <i class="nav-icon fa fa-vial"></i>
                        <p>
                            Test API Consume
                        </p>
                    </a>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>