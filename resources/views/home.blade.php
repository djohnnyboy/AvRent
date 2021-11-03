@extends('layouts.admin')
@section('content')
<div class="container border shadow-lg bg-light">
<form class="form-inline float-right mt-4 mr-2" action="" method="{{ url()->current() }}">
	@csrf
      <input class="form-control" type="search" placeholder="Season ex. 2022" aria-label="Search" style="min-width:120px;max-width:150px;" name="ano">
      <button class="btn btn-success " type="submit" style="min-width:50px;width:65px;">Search</button>
</form>
<h1 class="text-muted mt-3 ml-2">Estatística</h1>

<hr style="background-color: grey;width:150px;height:1px;float:left;" class="ml-2">
	<div class="row ml-2 mr-2 mb-5" style="margin-top:50px;">
		<div class="col-md-6 border shadow-lg">
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
			<canvas id="myChartLine" width="400" height="200"></canvas>
					
			<script type="text/javascript">
			var quotesMes = new Array(<?php echo implode(',', $quotesMes ); ?>);
			var ctx = document.getElementById('myChartLine').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov','Dez'],
					datasets: [{
						label: 'Quotes',
						data: quotesMes,
						backgroundColor: [
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
							'rgba(246,137,51,1)',
						],					
						borderColor: [
							'rgba(0,93,130,1)',
						],
						borderWidth: 1.5,
						hoverBackgroundColor: 'rgba(0,93,130,1)',
                        hoverBorderColor: 'rgba(246,137,51,1)',
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					},
					responsive: true,
					maintainAspectRatio: false,
				}
			});
			</script>
		</div>
		<div class="col-md-6 border shadow-lg">
			<canvas id="myChartBar" width="400" height="200"></canvas>
			<script type="text/javascript">
			var reservasMes = new Array(<?php echo implode(',', $reservasMes ); ?>);
			var reservasPrecoTotal = <?php echo $reservasPrecoTotal; ?>;
			var ctx = document.getElementById('myChartBar').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov','Dez'],
					datasets: [{
						label: 'Bookings € ' + reservasPrecoTotal,
						data: reservasMes,						
						backgroundColor: [
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
							'rgba(0,93,130,1)',
						],					
						borderColor: [
							'rgba(246,137,51,1)',
						],
						borderWidth: 1.5,
						hoverBackgroundColor: 'rgba(246,137,51,1)',
						hoverBorderColor: 'rgba(0,93,130,1)',
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					},
					responsive: true,
					maintainAspectRatio: false,
				}
			});
			</script>
		</div> <!-- end col-->
	</div> <!-- end row-->
	<div class="row ml-1 mr-1">
		<div class="col-lg-12 col-md-12 col-sm-12 top border shadow-lg" style="position: relative; height:100vh; width:200vw;max-height:400px;max-width:840px;min-width:220px;margin:0 auto;">
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
			<canvas id="mixedChart"  style="textBox"></canvas>
			<script type="text/javascript">
				var quotes = new Array(<?php echo implode(',', $quotesMes ); ?>);
				var reservas = new Array(<?php echo implode(',', $reservasMes ); ?>);
				var ctx = document.getElementById('mixedChart').getContext('2d');
				var mixedChartAdmin = new Chart(ctx, {
				type: 'bar',
				data: {
					datasets: [{
						label: 'Quotes',
						data: quotes,
						borderColor: [
							'rgba(246,137,51,1)',
						],
						borderWidth: 1.5,
						type: 'line',
					}, {
						label: 'Bookings',
						data: reservas,
						borderColor: [
							'rgba(0,93,130,1)',
						],
						borderWidth: 1.5,
						type: 'line'
					}],
					labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov','Dez']
				},
				
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					},
					responsive: true,
					maintainAspectRatio: false,
				}
			});
			</script>

		</div>	
	</div>
</div> <!-- end container -->
@endsection
