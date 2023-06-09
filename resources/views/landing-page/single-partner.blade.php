@extends('layout.front')
@section('title', 'SinglePartner')

@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li><a href="{{ route('user-partners') }}">Jobs</a></li>
        <li>{{ $partner->company }}</li>
      </ol>
      <h2>{{ $partner->company }}</h2>

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
              <img src="{{ asset('storage/'.$partner->img) }}" alt="" class="entry-img  img-fluid">
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
           
            
              <h4 class="entry-title">
                Informasi Lowongan
              </h4>
           
              @foreach ($jobs as $job)
              <div class="col-md-6">
                <article class="entry">
                  
                  <h5>
                    {{ $job->title }}
                  </h5>
      
                  <div class="entry-meta">
                    <ul>     
                      <li class="d-flex align-items-center"><i class="bi bi-mortarboard"></i>{{ $job->education }}</time></li>
                      <li class="d-flex align-items-center"><i class="bi bi-tag"></i>{{ $job->category }}</time></li>
                    </ul>
                  </div>
      
                  <div class="entry-content">
                    
                    <div class="read-more">
                     
                      <a class="btn btn-primary" href="{{ route('jobdetails', ['partner'=>$partner->id,'id'=>$job->id]) }}">Detail</a>
                      
                    </div>
                  </div>
      
                </article>
                
                <!-- End company entry -->
                
                
              </div><!-- End company entries list -->
    
              
              @endforeach
              
           
              <div class="partner-pagination">
                <ul class="d-flex justify-content-center">
                 
                   {{ $jobs->withQueryString()->links()  }}
                </ul>
              </div>
          </div>


        </div><!-- End blog entries list -->
        

        <div class="col-lg-4">

          <div class="sidebar">


            <h3 class="sidebar-title">Recent Partners</h3>
            <div class="sidebar-item recent-posts">
              @foreach($sidebar as $sidepartner)
              <div class="post-item clearfix">
                <img src="{{ asset('storage/'.$sidepartner->img) }}" alt="">
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