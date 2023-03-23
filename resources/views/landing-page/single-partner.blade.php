@extends('layout.front')
@section('title', 'SinglePartner')

@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li><a href="{{ route('user-partners') }}">Partners</a></li>
        <li>Single Partner</li>
      </ol>
      <h2>Single Partner</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Partner Single Section ======= -->
  <section id="partner" class="partner">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="text-center">
              <img src="{{ asset('laravel/storage/app/'.$partner->img) }}" alt="" class="entry-img  img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="#">{{ $partner->company }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $partner->updated_at }}</time></li>
                
              </ul>
            </div>

            <div class="entry-content">
              {!! $partner->description !!}

            </div>
           
             
           

          </article><!-- End blog entry -->

          <div class="row">
           
              @foreach ($jobs as $job)
              <div class="col-md-4">
                <article class="entry">
                  
      
                  <h2 class="entry-title">
                    {{ $job->title }}
                  </h2>
      
                  <div class="entry-meta">
                    <ul>     
                      <li class="d-flex align-items-center">{{ $job->category }}</li>
                      <li class="d-flex align-items-center">{{ $job->education }}</li>
                    </ul>
                  </div>
      
                  <div class="entry-content">
                    <p>
                      {!! $job->description !!}
                    </p>
                    <div class="read-more">
                      <form action="{{ route('applyjob') }}" method="post">
                        @csrf
                        <input hidden value={{ $job->id }} name="job_id"/>
                        <input hidden value={{ $partner->id }} name="partner_id"/>
                        
                        <button class="btn btn-small btn-primary" type="submit">     
                          <span>Lamar</span>
                        </button>
                      </form>
                    </div>
                  </div>
      
                </article>
                
                <!-- End company entry -->
                
                
              </div><!-- End company entries list -->
    
              
              @endforeach
           
          </div>

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