@extends('Back.layout')
@section('content')
<h1 style="padding-top: 30px;">Forum</h1>
    <div class="row g-4" style="width: 1000px;">
 


        <div class="container" data-aos="fade-up">
            <div class="row gy-5 posts-list">
                @foreach($forum as $publication)
                    <div class="col-lg-6">
                        <article class="d-flex flex-column">
                            <div class="post-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">
                                <a href="{{ route('backforum.show', $publication->id) }}">{{ $publication->title }} {{$publication->id}}</a>

                            </h2>

                            <div class="meta-top">
                                <ul class="d-flex align-items-center list-unstyled">
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $publication->sender->name }}</a></li>
                                    <li class="d-flex align-items-center mr-1"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2022-01-01">{{ $publication->created_at }}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>

                                        <form action="{{ route('backforum.destroy', $publication->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: none; color: red;">
                                                <i class="bi bi-archive-fill" style="font-size: 20px;"></i>
                                            </button>
                                        </form>
                                  
                                </ul>
                            </div>

                            <div class="content">
                                <p>{{ $publication->description }}</p>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                @endforeach
            </div><!-- End blog posts list -->
        </div>
    @endsection
