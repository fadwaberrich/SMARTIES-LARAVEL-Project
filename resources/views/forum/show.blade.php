@extends('front.layout')

@section('content')

  <main id="main">

  

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <article class="blog-details">

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{$forum->title}}</h2>

              <div class="meta-top">
          <ul class="d-flex align-items-center list-unstyled">
            <li class="d-flex align-items-center "><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
            <li class="d-flex align-items-center mr-1"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2022-01-01">{{ $forum->created_at }}</time></a></li>
          </ul>
        </div>

              <div class="content">
                <p>
                 {{$forum->description}}
                </p>

        
            
            </article><!-- End blog post -->

        
            <div class="comments">

              <h4 class="comments-count">{{$commentsCount}} Comments</h4>

              @foreach($comments as $comment)

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Georgia Reader</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at}}</time> 

                    <form action="{{ route('commentforum.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
        @method('DELETE')
        <button type="submit" style="border: none; background: none; color: red;">
        <i class="bi bi-archive-fill" style="font-size: 20px;"></i>
    </button>
                    </form>
                    <p>
                     {{$comment->comment}}
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->
              @endforeach


              <div class="reply-form">
    <h4>Leave a Reply</h4>
    <form method="POST" action="{{ route('commentforum.store') }}">
        @csrf
        <div class="row">
            <div class="col form-group">
                <textarea name="comment" id="comment" class="form-control" placeholder="Your Comment*"></textarea>
                @error('comment')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $forum->id }}">
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
</div>


            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">

      

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">
                @foreach($forums as $forum)

                  <div class="post-item mt-3">
                    <div>
                      <h4><a href="{{ route('forum.show', $forum->id) }}">{{$forum->title}}</a></h4>
                      <time datetime="2020-01-01">{{$forum->created_at}}</time>
                    </div>
                  </div><!-- End recent post item-->
@endforeach
           
                </div>

              </div><!-- End sidebar recent posts-->


            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Nova</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links d-flex  mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Nova</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  @endsection




