	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Penilaian
				</div>
			</div>
			<div class="portlet-body">
				<?php 
					if(isset($_SESSION['jenis']) && isset($_SESSION['pesan'])){
						echo "
							<div class='alert ".$_SESSION['jenis']." alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
								".$_SESSION['pesan']."
							</div>
						";
					}
				?>
				<form action="<?php echo base_url(); ?>penilaian/penilaian_act/simpan" method="post" class="form-horizontal">
				<br>
				<div class="row">
					<div class="col-md-6">
						<label for="periode" class="control-label col-md-2">Periode </label>
						<div class="col-md-7">
							<select name="periode" id="periode" class="form-control" onchange="set()">
								<option value="">-- Pilih Periode --</option>
								<?php 
									foreach ($periode as $periode) {
										echo "<option value='".$periode->ID_PERIODE2."'>".ucfirst(strtolower($periode->NAMA_PERIODE))."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periode" class="control-label col-md-4">Tempat Kerja </label>
						<div class="col-md-7">
							<select name="outlet" id="outlet" class="form-control" onchange="cek()">
								<option value="">-- Pilih Tempat Kerja --</option>
								<?php 
									foreach ($outlet as $outlet) {
										echo "<option value='".$outlet->ID_OUTLET."'>".ucfirst(strtolower($outlet->NAMA_OUTLET))."</option>";
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="data-kehadiran">
				
				<br>
				<table class='table table-striped table-bordered table-hover' id='sample_3'>
					<thead>
						<tr>
							<th style='width:5%;text-align:center;' >
								No.
							</th>
							<th style='width:25%;text-align:center;'>
								 Nama Karyawan
							</th>
							<th style='width:15%;text-align:center;'>
								 Proses Penilaian
							</th>
							<th style='width:15%;text-align:center;'>
								 Nilai
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class='odd gradeX'>
							<td style='text-align:center;'>
								1
							</td>
							<td>
								nama
							</td>
							<td style='text-align:center;'>
								<div class='btn-group btn-group-sm btn-group-solid '>
									<a href="<?php echo base_url(); ?>penilaian/proses_penilaian" class='btn green' id="beri">Beri Nilai</a>
								</div>
							</td>
							<td style='text-align:center;'>
								100
							</td>
						</tr>
					</tbody>
				</table>

				</div><!-- end #data-kehadiran -->
				<br>
				</form>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div id="modal-form">
			
			</div>
			<!-- /.modal-form -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<script>

	function set()
	{
		$("#outlet").val('');
	}

	function edit(id)
	{	
		$("#terlambat_"+id).removeAttr('readonly');
		$("#absen_"+id).removeAttr('readonly');
		$("#sakit_"+id).removeAttr('readonly');
		$("#edit_"+id).attr('disabled','true');

	}

	function cek(){
		var periode = $("#periode").val();
		var outlet = $("#outlet").val();

		if (periode != '')
		{
			if (outlet != '')
			{
				// alert("ini ok");

				$.ajax({
					url:'<?php echo base_url(); ?>master/kehadiran_act/cek',
					type:'post',
					data : {'outlet': outlet,'periode':periode},
					success:function(r){
						// alert("ok");
						$("#data-kehadiran").html(r);

					},
					error:function(r){
						alert(r);

					}

				});
			}else{
				$("#outlet").focus();
				$("#data-kehadiran").html('');
			}
		}else{
			$("#outlet").val('');
			$("#periode").val('');
			$("#periode").focus();
		}
	}
	</script>