@extends('layout.front')
@section('title', 'Partners')
@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li>Partners</li>
      </ol>
      <h2>Partners</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Company Section ======= -->
  <section id="partner" class="partner">
    <div class="container" data-aos="fade-up">

      <div class="search-btn">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <h4>Search</h4>
              
            </div>
            <div class="col-lg-6">
              <form action="{{ route('search') }}" method="get" class="mb-5">
        
                <input type="text" name="query" value="{{ request('query') }}">
                
                <select class="form-select" name="category" >
                    <option value="">Education</option>
                    <option value="SMA/SMK" {{ request('category') == "SMA/SMK" ? 'selected': '' }}>SMA/SMK</option>
                    <option value="D3" {{ request('category') == "D3" ? 'selected': '' }}>D3</option>
                    <option value="D4" {{ request('category') == "D4" ? 'selected': '' }}>D4</option>
                    <option value="S1" {{ request('category') == "S1" ? 'selected': '' }}>S1</option>
                </select>
                
                <input type="submit" value="Search">
              
              </form>
              
            </div>
          </div>
        </div>
      </div>
      
      
       @if (count($partners) > 0)

      <div class="row mt-5">
        @foreach ($partners as $partner)
        <div class="col-md-4">
          <article class="entry">
            <div class=" text-center">
              <img src="{{ asset('laravel/storage/app/'.$partner->img) }}" alt="" class=" entry-img img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="{{ route('user-singlepartner', $partner->id) }}">{{ $partner->company }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
               
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $partner->updated_at->diffForHumans() }}</time></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {!! $partner->description !!}
              </p>
              {{-- send current query into read more  --}}


              @if (request()->has('category')||request()->has('query'))
              <div class="read-more">
                <a href="{{ route('user-singlepartner', ['id' => $partner->id, 'query' => request('query'), 'category' => request('category')]) }}">Read More</a>
              @else
              
              
              <div class="read-more">
                <a href="{{ route('user-singlepartner', $partner->id) }}">Read More</a>
              </div>
              @endif
              
              
            </div>

          </article>
          
          <!-- End company entry -->
          
          
        </div><!-- End company entries list -->
        @endforeach
        
        <div class="partner-pagination">
          <ul class="d-flex justify-content-center">
           
            {{ $partners->links() }}
          </ul>
        </div>
      </div>
      @else
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <h5>Pencarian tidak ditemukan...</h5>
        </div>
      </div>
      @endif

    </div>
  </section>
  <!-- End Company Section -->

</main>
<!-- End #main -->

<script>
  // catch value on search button
  $(document).ready(function() {
    $('#search').click(function() {
      let search = $('#search').val();
      let edu = $('#edu').val();
     
      
      // var _token = $('input[name="_token"]').val();
      // $.ajax({
      //   url: "{{ route('user-partners') }}",
      //   method: "GET",
      //   data: {
      //     search: search,
      //     filter: filter,
      //     _token: _token
      //   },
      //   success: function(data) {
      //     $('#company').html(data);
      //   }
      // });
    });
  });
</script>
@endsection