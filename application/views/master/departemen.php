	<script>
	jQuery(document).ready(function() {    
	 	var table = $('#sample_3');

        // begin: third table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });
	});
</script>

	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Data Departemen
				</div>
				<div class="actions">
					<a class="btn btn-default btn-sm" data-toggle="modal" href="#modal">
					<i class="fa fa-plus"></i> Tambah Data </a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_3">
				<thead>
				<tr>
					<th style="width:5%">
						No.
					</th>
					<th style="width:20%">
						 ID Departemen
					</th>
					<th style="width:40%">
						 Nama Departemen
					</th>
					<th style="width:25%">
						 Action
					</th>
				</tr>
				</thead>
				<tbody>
				<tr class="odd gradeX">
					<td>
						1
					</td>
					<td>
						 001
					</td>
					<td>
						accounting
					</td>
					<td>
						<div class="btn-group btn-group-sm btn-group-solid ">
							<button type="button" class="btn blue"><i class="fa fa-pencil"></i> Edit</button>
							<button type="button" class="btn red"><i class="fa fa-trash"></i> Hapus</button>
						</div>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						2
					</td>
					<td>
						 002
					</td>
					<td>
						accounting
					</td>
					<td>
						<div class="btn-group btn-group-sm btn-group-solid ">
							<button type="button" class="btn blue"><i class="fa fa-pencil"></i> Edit</button>
							<button type="button" class="btn red"><i class="fa fa-trash"></i> Hapus</button>
						</div>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Tambah Departemen</h4>
				</div>
			 <form class="form-horizontal" role="form" method="post" action="#">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Departemen</label>
						<div class="col-md-5">
							<input type="text" class="form-control" placeholder="ID">
							<!-- <span class="help-block">
							A block of help text. </span> -->
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Departemen</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Departemen">
							<!-- <span class="help-block">
							A block of help text. </span> -->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn blue">Simpan</button>
				</div>
			 </form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->