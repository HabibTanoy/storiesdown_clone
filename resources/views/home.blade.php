@extends('master')
@section('title','Home')
@section('content')
    <style>
        [data-tab-content] {
            display: none;
        }

        .active[data-tab-content] {
            display: block;
        }

        body {
            padding: 0;
            margin: 0;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            margin: 0;
            padding: 0;
            /*border-bottom: 2px solid #bbb;*/
        }

        .tab {
            cursor: pointer;
            /*padding: 10px;*/
        }

        .tab.active {
            border-bottom: 2px solid black;
            color: black;
        }


        /*.tab:hover {*/
        /*    background-color: #AAA;*/
        /*}*/

        .tab-content {
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
      <div class="container">
          <div class="row">
                <div class="col-12 text-center" style="{{!isset($profile) ? 'height:80vh': ''}}">
                      <div class="text-center head_line">
                        <h3 class="font-weight-bold mb-3 mt-5">Instagram Story Viewer & Downloader</h3>
                        <p class="pb-5">Best Instagram story viewer! You can watch Instagram stories anonymously and quickly without the need to log in or having account.</p>
                      </div>
                    <div class="search-field text-center">
                        <form id="search" method="POST">
                            <input type="text" name="user_name" placeholder="Enter instagram username" value autocomplete="off">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
          </div>
        </div>

            <!--end of search bar-->
            @if(isset($profile))
                <div class="user_info">
              <div class="container pb-5">
                <div class="row user_header">
                  <div class="avatar">
                    <a href="">
                      <img src="{{$profile['profile_picture']}}" alt="">
                    </a>
                  </div>
                  <div class="flex jcsb aic">
                    <div class="nickname">
                      <h1>{{$profile['full_name']}}
{{--                        <span>(Anonymous profile view)</span>--}}
                      </h1>
                    </div>
                  </div>
                  <div class="row for_score">
                    <div class="profile_info">
                        <div>
                            <span>{{$profile['number_of_published_post']}}</span>
                            <span>posts</span>
                        </div>
                        <div>
                            <span>{{$profile['number_of_followers']}}</span>
                            <span>Followers</span>
                        </div>
                        <div>
                            <span>{{$profile['number_of_follows']}}</span>
                            <span>Following</span>
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
            @endif
    </section>
    @if(isset($profile))
        <section>
          <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabs">
                        <li data-tab-target="#stories" class="tab tab-title stories w-50 active">Stories</li>
                        <li data-tab-target="#photos" class="tab tab-title posts w-50">Photos</li>
                    </ul>

                    <div class="tab-content">
                        <div id="stories" data-tab-content class="active">
                            <section class="mt-5 text-center">
                                <div class="row" id="stories-container">
                                    No stories in 24 hours
                                </div>
                            </section>
                        </div>
                        <div id="photos" data-tab-content>
                            <!--image card start-->
                            <section class="mt-5 text-center">
                                <div class="container gallery">
                                    <div class="row" id="photos-container">
                                        @foreach($profile['medias'] as $media)
                                            <div class="col-md-3 mb-4">
                                                <a href="{{$media['image']}}"><img src="{{$media['image']}}" style="height: 300px;width:300px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section>
    @endif
      <div class="container">
        <div class="row py-5 text-center">
          <div class="col-12 col-md-4 mb-4">
            <img src="{{asset('/image/no_account.png')}}" alt="">
            <div class="feature-name mt-3 mb-2">No Need Instagram Account</div>
            <p class="view_text">View without login or install anything. Just enter Instagram username you want to stalk.</p>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <img src="{{asset('/image/anonymous.png')}}" alt="">
            <div class="feature-name mt-3 mb-2">Anonymoust</div>
            <p class="view_text">Nobody will know you are watching their stories.</p>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <img src="{{asset('/image/download.png')}}" alt="">
            <div class="feature-name mt-3 mb-2">Download and Share</div>
            <p class="view_text">Save Instagram videos and photos in high resolution to your devices.</p>
          </div>
        </div>
      </div>
    </section>
    <!--start slider-->
    <div class="container">
      <div class="row demo for_atag">
        <div class="col-md-12">
          <a href="blog-guide.html">
            <div class="inner-img text-center">
              <img src="{{asset('/image/instra.jpg')}}" />
              <p class="for_p mt-2">Beginner’s guide to Instagram</p>
              <div class="short-desc">
                <p>If you are new to the Instagram world, you are in luck because we are going to cover all the basics in this article.</p>
              </div>
          </div>
          </a>
        </div>
        <div class="col-md-12">
          <a href="">
            <div class="inner-img text-center">
              <img class="" src="{{asset('/image/instra_two.jpg')}}" />
              <p class="for_p mt-2">Best Instagram Marketing Tips & Tricks to Boost Your Brand</p>
              <div class="short-desc">
                <p>It can prove to be a great marketing platform if you know the right way to showcase your business.</p>
              </div>
          </div>
          </a>
        </div>
        <div class="col-md-12">
          <a href="">
            <div class="inner-img text-center">
              <img class="" src="{{asset('/image/instra_three.jpg')}}" />
              <p class="for_p mt-2">Can you recover Instagram deleted messages?</p>
              <div class="short-desc">
                <p>If you deleted your messages by mistake, you can follow any of these ways according to your convenience to recover them.</p>
              </div>
          </div>
          </a>
        </div>
        <div class="col-md-12">
          <a href="blog-guide.html">
            <div class="inner-img text-center">
              <img src="{{asset('/image/instra.jpg')}}" />
              <p class="for_p mt-2">Beginner’s guide to Instagram</p>
              <div class="short-desc">
                <p>If you are new to the Instagram world, you are in luck because we are going to cover all the basics in this article.</p>
              </div>
          </div>
          </a>
        </div>
        <div class="col-md-12">
          <a href="">
            <div class="inner-img text-center">
              <img class="" src="{{asset('/image/instra_two.jpg')}}" />
              <p class="for_p mt-2">Best Instagram Marketing Tips & Tricks to Boost Your Brand</p>
              <div class="short-desc">
                <p>It can prove to be a great marketing platform if you know the right way to showcase your business.</p>
              </div>
          </div>
          </a>
        </div>
        <div class="col-md-12">
          <a href="">
            <div class="inner-img text-center">
              <img class="" src="{{asset('/image/instra_three.jpg')}}" />
              <p class="for_p mt-2">Can you recover Instagram deleted messages?</p>
              <div class="short-desc">
                <p>If you deleted your messages by mistake, you can follow any of these ways according to your convenience to recover them.</p>
              </div>
          </div>
          </a>
        </div>
      </div>
    </div>
    <div class="my-5 text-center visit_btn">
      <a href="blog.html" class="text-uppercase visit_blog_link">visit your blog</a>
    </div>
    <script>
        const tabs = document.querySelectorAll('[data-tab-target]')
        const tabContents = document.querySelectorAll('[data-tab-content]')

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active')
                })
                tabs.forEach(tab => {
                    tab.classList.remove('active')
                })
                tab.classList.add('active')
                target.classList.add('active')
            })
        })
    </script>

        <script>
            $('#search').on('submit',(event)=>{
                event.preventDefault();
               var user_name = $("input[name=user_name]").val();
               if (user_name) {
                   window.location.href = "user/"+user_name
               }else{
                   alert('Give a valid username')
               }
            });
        </script>
    <script>
        @if(isset($profile))
            $.ajax({
                url:"{{ route('get.stories',$profile['user_name']) }}",
                method: 'GET',
                dataType: 'json',
                success: function(response){
                    console.log(response.stories)
                    $('#stories-container').html(response.stories)
                }
            });
        @endif
    </script>
@endsection
