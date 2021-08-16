@extends('master')
@section('title','Home')
@section('content')
<div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="text-center head_line">
                    <h3 class="font-weight-bold mb-3">Instagram Story Viewer & Downloader</h3>
                    <p class="pb-5">Best Instagram story viewer! You can watch Instagram stories anonymously and quickly without the need to log in or having account.</p>
                </div>
                <div class="search-field mb-5 text-center">
                  <input type="text" placeholder="Enter instagram username" value autocomplete="off">
                  <button>Search</button>
                </div>
              </div>
            </div>
            </div>
            <!--end of search bar-->
            <div class="container pb-5 for_row">
              <div class="row user_profile">
                <div class="avatar">
                    <a href="">
                        <img src="{{asset('/image/demo.jpeg')}}" alt="">
                    </a>
                </div>
                <!-- <div class="row"> -->
                    <div class="mt-5 flex border">
                        <div class="nickname mb-5">
                            <h1>habib_tonoy
                                <span>(Anonymous profile view)</span>
                            </h1>
                        </div>
                    </div>
                <!-- </div> -->
                
            </div>
            <div class="for_score border">
                            <div class="flex profile_info">
                                <div>
                                    <span>49</span>
                                    <span>posts</span>
                                </div>
                                <div>
                                    <span>45</span>
                                    <span>Followers</span>
                                </div>
                                <div>
                                    <span>6</span>
                                    <span>Following</span>
                                </div>
                            </div>
                        </div>
              </div>

        </div>
    </section>
    <section>
      <div class="container py-5">
        <div class="row">
          <div class="col-6 pr-0">
            <div class="tab-title stories mb-3">Stories</div>
          </div>
          <div class="col-6 pr-0">
            <div class="tab-title posts mb-3 ">Posts</div>
          </div>
        </div>
      </div>
    </section>
    <section>
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
    <div class="mt-3 mb-5 text-center visit_btn">
      <a href="blog.html" class="text-uppercase visit_blog_link">visit your blog</a>
    </div>
@endsection