	<script src="<?php echo base_url() ?>assets/global/js/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/exporting.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/data.js.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/drilldown.js.js"></script>
	<script>
	$(document).ready(function(){
		$('#container').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'KINERJA KARYAWAN'
	        },
	        subtitle: {
	            text: 'Periode <?php echo $bulan_periode.' '.$tahun_periode ?>'
	        },
	        xAxis: {
	            type: 'category'
	        },
	        yAxis: {
	            title: {
	                text: 'Total Nilai'
	            }

	        },
	        legend: {
	            enabled: false
	        },
	        plotOptions: {
	            series: {
	                borderWidth: 0,
	                dataLabels: {
	                    enabled: true,
	                    format: '{point.y:.1f}'
	                }
	            }
	        },

	        tooltip: {
	            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of Total Nilai<br/>'
	        },

	        series: [{
	            name: 'Karyawan',
	            colorByPoint: true,
	            data: [
		            <?php echo $data_peg; ?>
	            ]
	        }],	        
	    });

	    $('#pegawai').highcharts({
	        chart: {
	            type: 'line'
	        },
	        title: {
	            text: 'KINERJA ANDA'
	        },
	        subtitle: {
	            text: 'Periode <?php echo $tahun_periode; ?>'
	        },
	        xAxis: {
	            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	        },
	        yAxis: {
	            title: {
	                text: 'Total Nilai'
	            }
	        },
	        plotOptions: {
	            line: {
	                dataLabels: {
	                    enabled: true
	                },
	                enableMouseTracking: false
	            }
	        },
	        series: [{
	            name: 'Kinerja',
	            data: [<?php echo $riwayat_anda; ?>]
	        },]
	    });
	});
	</script>
		<?php if ($_SESSION['level']!='1'): ?>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-asterisk"></i>History Nilai
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div id="pegawai" class="col-md-12"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif ?>
		<?php if ($_SESSION['level']!='5'): ?>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-asterisk"></i>History Penilaian Karyawan
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div id="container" class="col-md-12"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif ?>
