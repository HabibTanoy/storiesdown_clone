<div class="sb2-1" style="background-color: white">
    <!--== USER INFO ==-->
    <div class="sb2-12">
        <ul>
            <li><img src="{{asset('admin/images/placeholder.jpg')}}" alt="">
            </li>
            <li>
                <h5>{{\Illuminate\Support\Facades\Auth::user()->user_name}} <span> Santa Ana, CA</span></h5>
            </li>
            <li></li>
        </ul>
    </div>
    <!--== LEFT MENU ==-->
    <div class="sb2-13">
        <ul class="collapsible" data-collapsible="accordion">
            <li><a href="{{route('admin.dashboard')}}" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
            </li>
            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar-o" aria-hidden="true"> </i>Blog</a>
                <div class="collapsible-body ">
                    <ul>
                        <li><a href="{{route('show.admin.blogs')}}">All Posts</a>
                        </li>
                        <li><a href="{{route('show.admin.create.blog')}}">Add New Post</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
