	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Data Outlet
				</div>
				<div class="actions">
					<a class="btn btn-default btn-sm" onClick="tambah()" data-toggle="modal" href="#modal" >
					<i class="fa fa-plus"></i> Tambah Data </a>
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
				<table class="table table-striped table-bordered table-hover" id="sample_3">
				<thead>
				<tr>
					<th style="width:10%;text-align:center;" >
						No.
					</th>
					<th style="width:75%;text-align:center;">
						 Nama Outlet
					</th>
					<th style="width:15%;text-align:center;">
						 Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$no = 1;
				foreach ($outlet as $outlet) : ?>
				<tr class="odd gradeX" id="r<?php echo $outlet->ID_OUTLET; ?>">
					<td style="text-align:center;">
						<?php echo $no++; ?>
					</td>
					<td>
						<?php echo ucfirst(strtolower($outlet->NAMA_OUTLET)); ?>
					</td>
					<td style="text-align:center;"> 
						<div class="btn-group btn-group-sm btn-group-solid ">
							<a data-toggle="modal" href="#modal" class="btn blue" onclick="edit('<?php echo ucfirst(strtolower($outlet->ID_OUTLET)); ?>')"><i class="fa fa-pencil"></i></a>
							<button type="button" class="btn red" onclick="hapus('<?php echo $outlet->ID_OUTLET; ?>')"><i class="fa fa-trash"></i></button>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
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
	function edit(id)
	{	
		$.ajax({
			url:'<?php echo base_url(); ?>master/outlet_act/edit',
			type:'post',
			data: {'id':id},
			success:function(r){
				$("#modal-form").html(r);
			}
		});
	}
	function hapus(id)
	{
		 var konfirmasi = confirm('Apakah anda ingin menghapus data ini ?');
		 if (konfirmasi)
		 {
		 	$.ajax({
		 		url: '<?php echo base_url(); ?>master/outlet_act/hapus',
		 		type : 'post',
		 		data : {'id':id},
		 		success : function (){
		 			$('#r'+id).hide();
		 		}
		 	});
		 }
	}
	function tambah(){
		$.ajax({
			url:'<?php echo base_url(); ?>master/outlet_act/tambah',
			type:'post',
			success:function(r){
				$("#modal-form").html(r);
			}
		});
	}
	</script>