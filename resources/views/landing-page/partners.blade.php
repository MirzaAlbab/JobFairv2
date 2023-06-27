@extends('layout.front')
@section('title', 'Partners')
@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li>Jobs</li>
      </ol>
      <h2>Jobs</h2>

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
        
                <input type="text" name="query" placeholder="Search...">
                
                <select class="form-select" name="category" >
                    <option value="">Education</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
                
                <input type="submit" value="Search">
              
              </form>
              
            </div>
          </div>
        </div>
      </div>
   
      <div class="row mt-5">
        @foreach ($partners as $partner)
        <div class="col-md-4">
          <article class="entry">
            <div class=" text-center">
              <img src="{{ asset('storage/'.$partner->img) }}" alt="" class=" entry-img img-fluid">
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
              <div class="read-more">
                <a href="{{ route('user-singlepartner', $partner->id) }}">Read More</a>
              </div>
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

    </div>
  </section>
  <!-- End Company Section -->

</main>
<!-- End #main -->
{{-- import jquery from cdn --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
  // catch value on search button
  $(document).ready(function() {
    const fetch_data = (page, status, seach_term) => {
        if(status === undefined){
            status = "";
        }
        if(seach_term === undefined){
            seach_term = "";
        }
        $.ajax({ 
            url:"http://career_fair.test/partner"+"&status="+status+"&seach_term="+seach_term,
            
            success:function(data){
              console.log(data);
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    $('body').on('keyup', '#serach', function(){
        var status = $('#status').val();
        var seach_term = $('#serach').val();
        var page = $('#hidden_page').val();
        console.log(status);
        console.log(seach_term);
        
        fetch_data(page, status, seach_term);
    });

    $('body').on('change', '#status', function(){
        var status = $('#status').val();
        var seach_term = $('#serach').val();
        var page = $('#hidden_page').val();
        console.log(status);
        console.log(seach_term);
        fetch_data(page, status, seach_term);
    });

    $('body').on('click', '.pager a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var serach = $('#serach').val();
        var seach_term = $('#status').val();
        fetch_data(page,status, seach_term);
    });

      
      
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
    // });
  });
</script>
@endsection