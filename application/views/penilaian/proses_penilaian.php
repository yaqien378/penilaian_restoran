
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Proses Penilaian
				</div>
			</div>
			<div class="portlet-body">
				<br>

				<div class="row">
					<div class="col-md-12">		
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th style='width:40%;text-align:center;' >
										<b>Karyawan</b>
									</th>
									<th style='width:30%;text-align:center;'>
										 <b>Jabatan</b>
									</th>
									<th style='width:30%;text-align:center;'>
										 <b>Outlet</b>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$id_karyawan = ''; 
									foreach ($karyawan as $karyawan):
									$id_karyawan = $karyawan->ID_KARYAWAN;
								?>
								<tr class='odd gradeX'>
									<td style='text-align:center;'>
										<?= ucfirst(strtolower($karyawan->NAMA_KARYAWAN)) ?>
									</td>
									<td style='text-align:center;'>
										<?= ucfirst(strtolower($karyawan->NAMA_JABATAN)) ?>
									</td>
									<td style='text-align:center;'>
										<?= ucfirst(strtolower($karyawan->NAMA_OUTLET)) ?>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>

				<form class="form-horizontal" role='form' method="post" action="<?php echo base_url(); ?>penilaian/penilaian_act/simpan"  >
				<input type="hidden" name="id_penilaian" id="id_penilaian" value="<?= $id ?>" readonly="true">
				<input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $id_karyawan ?>" readonly="true">
				<input type="hidden" name="periode" id="periode" value="<?= $periode ?>" readonly="true">
				<?php
					$no = 1;
				?>
				<?php foreach ($kriteria as $kriteria):?>
				<!-- kriteria -->
				<div class="row">
					<div class="col-md-6">		
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th style='width:5%;text-align:center;' >
										<b>No.</b>
									</th>
									<th style='width:70%;text-align:center;'>
										 <b>Kriteria</b>
									</th>
									<th style='width:25%;text-align:center;'>
										 <b>Bobot</b>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class='odd gradeX'>
									<td style='text-align:center;'>
										<?= $no++; ?>
									</td>
									<td style='text-align:center;'>
										<?= ucfirst(strtolower($kriteria->NAMA_KRITERIA))  ?>
									</td>
									<td style='text-align:center;'>
										<?= $kriteria->BOBOT; ?>%
										<input type="hidden" name="id_kriteria[<?= $kriteria->ID_KRITERIA ?>]" id="id_kriteria[<?= $kriteria->ID_KRITERIA ?>]" readonly="true" value="<?= $kriteria->ID_KRITERIA ?>">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end kriteria -->

				<!-- range penilaian -->
				<div class="row">
					<div class="col-md-12">		
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th style='width:25%;text-align:center;' >
										<h2>Nilai</h2>
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>100</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
												<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_100" value="100" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_100')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>95</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
												<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_95" value="95" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_95')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>90</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
												<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_90" value="90" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_90')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>85</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												<input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_85" value="85" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_85')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>80</b><br>
										 <!-- <div class="form-group"> -->
											<div class='radio-list'>
										 	<label class='radio-inline'>
											 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_80" value="80" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_80')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>75</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_75" value="75" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_75')">
											</div>
										<!-- </div> -->

									</th>
									<th style='width:5%;text-align:center;'>
										 <b>70</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_70" value="70" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_70')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>65</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_65" value="65" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_65')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>60</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_60" value="60" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_60')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>55</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_55" value="55" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_55')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>50</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_50" value="50" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_50')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>45</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_45" value="45" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_45')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>40</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_40" value="40" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_40')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>35</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_35" value="35" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_35')">
											</div>
										<!-- </div> -->
									</th>
									<th style='width:5%;text-align:center;'>
										 <b>30</b><br>
										<!-- <div class="form-group"> -->
											<div class='radio-list'>
											 	<label class='radio-inline'>
												 <input type="radio" name="nilai[<?= $kriteria->ID_KRITERIA ?>]" id="nilai_30" value="30" Onchange="nilai_kriteria('<?= $kriteria->ID_KRITERIA ?>','nilai_30')">
											</div>
										<!-- </div> -->
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style='text-align:center;' rowspan="2">
										<h1 style="font-size:60px;" id="view_nilai_<?= $kriteria->ID_KRITERIA ?>">0</h1>
									</td>
									<?php 
										$range = $this->m_range_kriteria->get_by_kriteria($kriteria->ID_KRITERIA);
										foreach ($range as $range):?>
									<td style='text-align:center;' colspan="3">
										<?= ucfirst(strtolower($range->DESKRIPSI_KRITERIA)) ?>
									</td>
									<?php endforeach; ?>
								</tr>
								<tr>
									
									<td style='text-align:center;' colspan="15">
										<b>Dasar Penilaian</b>
										<textarea class="col-md-12 col-xs-12"  name="dasar_penilaian[<?= $kriteria->ID_KRITERIA ?>]" id="dasar_penilaian<?= $kriteria->ID_KRITERIA ?>" cols="30" rows="3"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end range penilaian -->
				<?php endforeach; ?>

				<div class="row">
					<div class="col-md-12">
						<div class="pull-right">
							<a href="<?php echo base_url(); ?>penilaian/penilaian_view " class="btn btn-default">Kembali</a>
							<button type="submit" class="btn blue">Proses Penilaian</button>
						</div>
					</div>
				</div>


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

	function nilai_kriteria(id,name_id)
	{	
		var nilai = $("#"+name_id).val();
		$('#view_nilai_'+id).text(nilai);
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