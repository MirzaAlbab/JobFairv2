@extends('layout.admin')

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
        
          
           
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                </div>
              </div>
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#current-cf">Active Career Fair</button>
                </li>
  
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#all-time-cf" id="alltime">All Time Career Fair</button>
                </li>
  
                
  
              </ul>
              <div class="tab-content pt-2">
  
                <div class="tab-pane fade show active current-cf" id="current-cf">
                   <!-- Current Reports -->
                  <div class="row">

                 
                   <div class="col-md-12">
                    <div class="card">

                      <div class="card-body">
                        <h5 class="card-title">Career Fair Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="currentCF"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#currentCF"), {
                         series: [{
                        data: [{{ $countpartner }}, {{ $countjob }},{{ $counterevent }} ,{{ $countuser }} ] 
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
                          categories: ['Company', 'Job', 'Webinar', 'Participant', ],
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
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            
            <!-- User Education Chart -->
            <div class="col-md-6">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">User Education Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="currentUserEduChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch('{{ route('getcurrentuseredu')  }}')
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#currentUserEduChart"), {
                        series: data.edu,
                        chart: {
                          width: 380,
                          type: 'pie',
                        },
                        labels: data.education,
                        responsive: [{
                          breakpoint: 480,
                          options: {
                            chart: {
                              width: 200
                            },
                            legend: {
                              position: 'bottom'
                            }
                          }
                        }]                       

                      }).render();

                        });
                     
                    });
                    
                   
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End User Education -->

            <!-- Job Qualification Chart -->
            <div class="col-md-6">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Job Qualification <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="currentJobEduChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch('{{ route('getcurrentjobedu')  }}')
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#currentJobEduChart"), {
                        series: data.edu,
                        chart: {
                          width: 380,
                          type: 'pie',
                        },
                        labels: data.education,
                        responsive: [{
                          breakpoint: 480,
                          options: {
                            chart: {
                              width: 200
                            },
                            legend: {
                              position: 'bottom'
                            }
                          }
                        }]                       

                      }).render();

                        });
                     
                    });
                    
                   
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Job Qualification -->
  
          </div>
  
                </div>
  
                <div class="tab-pane fade all-time-cf pt-3" id="all-time-cf">
                  <div class="row">

                 
                  <!-- Full Reports -->
             <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">All Time Career Fair <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch('{{ route('alltimereport')  }}')
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Company',
                          data: data.company,
                        }, {
                          name: 'Job',
                          data: data.job,
                        }, {
                          name: 'Jobseeker',
                          data: [15, 11, 20, 8, 12]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: true,
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'text',
                          categories: data.careerfair,
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                        });
                    
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div>
            <!-- End Reports -->
             <!-- User Education Chart -->
             <div class="col-6">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">All User Education Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="eduChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch('{{ route('useredureport') }}')
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#eduChart"), {
                        series: data.edu,
                        chart: {
                          width: 380,
                          type: 'pie',
                        },
                        labels: data.education,
                        responsive: [{
                          breakpoint: 480,
                          options: {
                            chart: {
                              width: 200
                            },
                            legend: {
                              position: 'bottom'
                            }
                          }
                        }]                       

                      }).render();

                        });
                     
                    });
                    
                   
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End User Education -->

            <!-- Job Qualification Chart -->
            <div class="col-6">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">All Job Qualification <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="JobeduChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      fetch('{{ route('jobedureport') }} ' )
                        .then((response) => response.json())
                        .then((data) => {
                          new ApexCharts(document.querySelector("#JobeduChart"), {
                        series: data.edu,
                        chart: {
                          width: 380,
                          type: 'pie',
                        },
                        
                        labels: data.education,
                        responsive: [{
                          breakpoint: 480,
                          options: {
                            chart: {
                              width: 200
                            },
                            legend: {
                              position: 'bottom'
                            }
                          }
                        }]                       

                      }).render();

                        });
                     
                    });
                    
                   
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Job Qualification -->
          </div>
  
                </div>

              

               


            
            
           

      </div>
    </section>
  </main>

  
@endsection