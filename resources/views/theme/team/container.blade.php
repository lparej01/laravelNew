<!-- Container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js " crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <div class="container-fluid py-4">
      
      <div class="row mt-6">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="d-flex flex-column h-00">                  
                      <div class="chart"   style="height:600px">
                        <h3>Departamentos e Incidencias</h3>
                        <canvas id="myChart" ></canvas>
                        
                      </div>
                                      
                    </div>
                  </div>
                
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100""> 
              <h3>Grafico Circular </h3>            
               <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">              
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                 
                  <div class="chart" style="width: 500px">
                 
                  <canvas id="grafica"></canvas>
                </div>
              </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">     
      </div>
    
    </div>
 <script> 
      
      
      const ctx = document.getElementById('myChart');
      const labels = {!! getGraficoNombre()!!};
      
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          borderWidth: 0,
       borderRadius: 4,
       borderSkipped: false,
       backgroundColor: "rgba(255, 255, 255, .8)",
          datasets: [{
            label: 'Soporte de Servicios',
            data: {!! getGrafico() !!},
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

     
 </script>
 <script src="{{asset("assets/team/js/plugins/chartjs.min.js") }}"></script>
 <script>
   /* var ctx_1 = document.getElementById("chart-bars").getContext("2d");

   new Chart(ctx_1, {
     type: "bar",
     data: {
       labels: {!! getGraficoNombre() !!}, 
       datasets: [{
         label: "Inicidencias",
         tension: 0.4,
         borderWidth: 0,
         borderRadius: 4,
         borderSkipped: false,
         backgroundColor: "rgba(255, 255, 255, .8)",
         data: {!! getGrafico() !!},
         maxBarThickness: 2
       }, ],
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
         legend: {
           display: true,
         }
       },
       interaction: {
         intersect: false,
         mode: 'index',
       },
       scales: {
         y: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5],
             color: 'rgba(255, 255, 255, .2)'
           },
           ticks: {
             suggestedMin: 0,
             suggestedMax: 500,
             beginAtZero: true,
             padding: 10,
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 2
             },
             color: "#fff"
           },
         },
         x: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5],
             color: 'rgba(255, 255, 255, .2)'
           },
           ticks: {
             display: true,
             color: '#f8f9fa',
             padding: 10,
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 3
             },
           }
         },
       },
     },
   }); */
 

  /*  var ctx2 = document.getElementById("chart-line").getContext("2d");

   new Chart(ctx2, {
     type: "line",
     data: {
       labels: {!! getGraficoNombre() !!},
       datasets: [{
         label: "Incidencias",
         tension: 0,
         borderWidth: 0,
         pointRadius: 5,
         pointBackgroundColor: "rgba(255, 255, 255, .8)",
         pointBorderColor: "transparent",
         borderColor: "rgba(255, 255, 255, .8)",
         borderColor: "rgba(255, 255, 255, .8)",
         borderWidth: 4,
         backgroundColor: "transparent",
         fill: true,
         data: {!! getGrafico() !!},
         maxBarThickness: 6

       }],
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
         legend: {
           display: false,
         }
       },
       interaction: {
         intersect: false,
         mode: 'index',
       },
       scales: {
         y: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5],
             color: 'rgba(255, 255, 255, .2)'
           },
           ticks: {
             display: true,
             color: '#f8f9fa',
             padding: 10,
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
         x: {
           grid: {
             drawBorder: false,
             display: false,
             drawOnChartArea: false,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             color: '#f8f9fa',
             padding: 10,
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
       },
     },
   });

   var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

   new Chart(ctx3, {
     type: "line",
     data: {
       labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
       datasets: [{
         label: "Mobile apps",
         tension: 0,
         borderWidth: 0,
         pointRadius: 5,
         pointBackgroundColor: "rgba(255, 255, 255, .8)",
         pointBorderColor: "transparent",
         borderColor: "rgba(255, 255, 255, .8)",
         borderWidth: 4,
         backgroundColor: "transparent",
         fill: true,
         data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
         maxBarThickness: 6

       }],
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
         legend: {
           display: false,
         }
       },
       interaction: {
         intersect: false,
         mode: 'index',
       },
       scales: {
         y: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5],
             color: 'rgba(255, 255, 255, .2)'
           },
           ticks: {
             display: true,
             padding: 10,
             color: '#f8f9fa',
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
         x: {
           grid: {
             drawBorder: false,
             display: false,
             drawOnChartArea: false,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             color: '#f8f9fa',
             padding: 10,
             font: {
               size: 14,
               weight: 300,
               family: "Roboto",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
       },
     },
   });  */

const labels1 = {!! getGraficoNombre() !!};
const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)'];

const graph = document.querySelector("#grafica");

const data = {
    labels: labels1,
    datasets: [{
        data:  {!! getGrafico() !!},
        backgroundColor: colors
    }]
};

const config = {
    type: 'pie',
    data: data,
};

  new Chart(graph, config);
 </script>

	<!--container-->