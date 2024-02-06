@extends('theme.team.app')

@section('template_title')
  Soporte Tecnico Pdf
@endsection

@section('content')

@section('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js " crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  

@endsection

   <div>
    <canvas id="myChart" ></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
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

   /*  var c = document.getElementById("myChart");

    var ctx1 = c.getContext("3d");
    ctx1.beginPath();
    ctx1.rect(0, 0, 50, 50);
    ctx1.fillStyle = 'red'; 
    ctx1.fill();
    document.write('<img style="width:700px; height:500"  st src="'+c.toDataURL("image/png")+'"/>');
 */
  </script>
   

@endsection