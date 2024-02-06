<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js " crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

       <div>
        <canvas id="myChart"></canvas>
        
        {{-- <img src="{{img}}" id="base64" width="50px" height="100px" > --}}
      </div>
      
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->usuarios }}</td>
            <td>{{ $user->incidencias }}</td>
        </tr>
        @endforeach
    </table>

    
      
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

        
      
      
       
      </script>
      <script>

        var c = document.getElementById("myChart");

        document.write('<img style="width:300px;" src="'+c.toDataURL("image/png")+'"/>');

        var ctx = c.getContext("2d");
        ctx.beginPath();
        ctx.rect(0, 0, 50, 50);
        ctx.fillStyle = 'red'; 
        ctx.fill();



      </script>
  
</body>
</html>