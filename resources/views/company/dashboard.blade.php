@extends('layout.company')

@section('title')
  <title>Dashboard | DPKKA - Universitas Airlangga</title>
@endsection

@section('dashboard', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        
         
            <!-- Welcoming -->
            <div class="col-12">
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                </div>
              </div>
            </div><!-- End Welcoming -->
           

            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Company Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="currentPartner"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#currentPartner"), {
                        series: [{
                        data: [{{ $countlamaran }}, {{ $countjob }} ] 
                        }],
                        
                        chart: {
                          height: 350,
                         
                          type: 'bar',
                          toolbar: {
                            show: false
                          },
                        },
                        
                        plotOptions: {
                          bar: {
                            borderRadius: 4,
                            horizontal: false,
                            endingShape: 'rounded',
                            distributed: true,
                            columnWidth: '40%',
                            
                            
                          }
                        },
                        stroke:{
                          show: true,
                          width: 1,
                          colors: ['transparent']
                        },
                        
                        dataLabels: {
                          enabled: false
                        },
                        xaxis: {
                          categories: ['Lamaran', 'Job', ],
                        },
                        yaxis: {
                          title: {
                            text: 'Total'
                          }
                        },
                        fill: {
                          opacity: 1
                        },
                        tooltip: {
                          y: {
                            formatter: function(val) {
                              return val
                            },
                            title: {
                              formatter: function (seriesName) {
                                return ''
                              }
                            }
                          }
                        }
                        

                      
                      
                      }).render();
                        });
                    
                  
                  </script>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Page Views <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="viewsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch({{ route('company.views') }} )
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#viewsChart"), {
                            series: [{
                              name: "Page Views",
                              data: data.views,
                            },
                            {
                              name: "Unique Views",
                              data: data.unique,
                            },
                            
                          ],
                            chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                              enabled: false
                            },
                          },
                          dataLabels: {
                            enabled: false
                          },
                          stroke: {
                            width: [4, 4],
                            curve: 'smooth',
                            dashArray: [0, 0]
                          },
                         
                         
                         
                          xaxis: {
                            categories: data.time,
                          },
                          
                      }).render();
                        });
                    
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div>

            


      </div>
    </section>
  </main>

@endsection