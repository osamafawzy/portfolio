<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Home </span>
                </a>
            </li>



            <li class="">
                <a href="{{url('/admin/slider')}}">
                    <i class="fa fa-plane"></i> <span>Slider </span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/admin/service')}}">
                    <i class="fa fa-plane"></i> <span>Service </span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/admin/testimonial')}}">
                    <i class="fa fa-plane"></i> <span>Testimonial </span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/admin/faq')}}">
                    <i class="fa fa-plane"></i> <span>FAQ </span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/admin/portfolio-category')}}">
                    <i class="fa fa-plane"></i> <span>Portfolio Category</span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/admin/portfolio')}}">
                    <i class="fa fa-plane"></i> <span>Portfolio</span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/admin/partner')}}">
                    <i class="fa fa-plane"></i> <span>Partner</span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/admin/team')}}">
                    <i class="fa fa-plane"></i> <span>Team</span>
                </a>
            </li>


            <li class="">
                <a href="{{url('/admin/setting')}}">
                    <i class="fa fa-plane"></i> <span>Site Setting </span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>