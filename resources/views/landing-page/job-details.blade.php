@extends('layout.front')
@section('title', 'Job Details')

@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li><a href="{{ route('user-partners') }}">Partners</a></li>
        <li><a href="{{ route('user-partners') }}">{{ $partner->company }}</a></li>
        <li>Job Details</li>
      </ol>
      <h2>Job Details</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Partner Single Section ======= -->
  <section id="partner" class="partner">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <h2 class="entry-title">
              <a href="#">{{ $job->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-building"></i>{{ $job->Jobsin->company }}</time></li>
                <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i>{{ $job->city }}</time></li>
                <li class="d-flex align-items-center"><i class="bi bi-tag"></i>{{ $job->category }}</time></li>
                <li class="d-flex align-items-center"><i class="bi bi-mortarboard"></i>{{ $job->education }}</time></li>
                
              </ul>
            </div>

            <div class="entry-content">
              {!! $job->description !!}

            </div>
            <div class="read-more text-end">
                     
              <form action="{{ route('applyjob') }}" method="post">
                        @csrf
                        <input hidden value={{ $job->id }} name="job_id"/>
                        <input hidden value={{ $partner->id }} name="partner_id"/>
                        
                        <button class="btn btn-small btn-primary" type="submit">     
                          <span>Lamar</span>
                        </button>
                      </form>
              
            </div>


          </article><!-- End blog entry -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">


            <h3 class="sidebar-title">Recent Partners</h3>
            <div class="sidebar-item recent-posts">
              @foreach($sidebar as $sidepartner)
              <div class="post-item clearfix">
                <img src="{{ asset('laravel/storage/app/'.$sidepartner->img) }}" alt="">
                <h4><a href="{{ route('user-singlepartner', $sidepartner->id) }}">{{ $sidepartner->company }}</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>
              @endforeach

            </div>
            <!-- End sidebar company-->

          </div>
          <!-- End sidebar -->

        </div>
        <!-- End company sidebar -->

      </div>

    </div>
  </section>
  <!-- End Partner Single Section -->

</main><!-- End #main -->
    
@endsection