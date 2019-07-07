<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    DATA KOMPONEN IMPORT
<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_addmaster"><span class="fa fa-plus"></span> Add New Item</a></div> -->
  </h1>
</section>
    <!-- Main content -->
<section class="content">
	<!-- ==================================================== LOKAL ==================================================== -->
	<div class="container">	
		<div class="box">  
			<div class="box-body">
				
	            <table id="kp_import" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
	              <thead class="text-primary">
	                <tr>
	                	<th class="th-sm" hidden> ID </th>
	                	<th class="th-sm" > No </th>
	                	<th class="th-sm" > Item </th>
	                	<th class="th-sm" > Satuan </th>
	                	<th class="th-sm" > Supplier </th>
	                	<th class="th-sm" > Min. Pack </th>
	                	<th class="th-sm" > Safety Stock (pcs) </th>
	                	<th class="th-sm" > Safety Stock (days) </th>
	                	<th class="th-sm" > Avg Usage/day </th>
	                	<th class="th-sm" > STO Daily </th>
	                	<th class="th-sm" > Usage Daily </th>
	                	<th class="th-sm" > Incoming Daily </th>
	                	<th class="th-sm" > Balance</th>
	                	<th class="th-sm" > Status</th>
	                </tr>
	              </thead>
	              <tbody id="show_kp_import">

	              </tbody>
	            </table>

			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	
	
	</div>

<!-- START FORM UPDATE MASTER -->
	<form id="formupdatemasterlokal">
		<div class="modal fade" id="Modal_update_master_lokal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Item</h4>
						<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Item</label>
										<input type="text" id="nama_brg_up_mlokal" name="nama_brg_up_mlokal" class="form-control" placeholder="Masukkan Item" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Satuan Lokal</label>
										<input type="text" id="satuan_up_mlokal" name="satuan_up_mlokal" class="form-control" placeholder="Masukkan Satuan Lokal" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Minimum Pack</label>
										<input type="number" id="min_pack_up_mlokal" name="min_pack_up_mlokal" class="form-control" placeholder="Masukkan Min. Lokal" style="width: 100%" required>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" id="id_brg_up_mlokal" name="id_brg_up_mlokal" value="">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</form>

	<form id="formupdatemasterimport">
		<div class="modal fade" id="Modal_update_master_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Item</h4>
						<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Item</label>
										<input type="text" id="nama_brg_up_mimport" name="nama_brg_up_mimport" class="form-control" placeholder="Masukkan Item" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Satuan Lokal</label>
										<input type="text" id="satuan_up_mimport" name="satuan_up_mimport" class="form-control" placeholder="Masukkan Satuan Lokal" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Minimum Pack</label>
										<input type="number" id="min_pack_up_mimport" name="min_pack_up_mimport" class="form-control" placeholder="Masukkan Min. Lokal" style="width: 100%" required>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" id="id_brg_up_mimport" name="id_brg_up_mimport" value="">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</form>
<!-- END FORM UPDATE MASTER -->

<!-- START FORM DELETE MASTER -->
	<form id="formdeletemasterlokal">
		<div class="modal fade" id="Modal_delete_master_lokal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Component</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			              
						<div class="form-group col-lg-12">
							<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font> ini?</label>
							<br><br>
							<center><H4 id="msglokal"></H4></center>
							<input type="hidden" name="iddellokal" id="iddellokal" class="form-control">

						</div>

						<br />
						<center>
							<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Cancel</button>
							<button type="submit" id="btn_delete" class="btn btn-danger col-md-3">Hapus</button>	
						</center>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
	</form>

	<form id="formdeletemasterimport">
		<div class="modal fade" id="Modal_delete_master_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Component</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			              
						<div class="form-group col-lg-12">
							<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font> ini?</label>
							<br><br>
							<center><H4 id="msgimport"></H4></center>
							<input type="hidden" name="iddelimport" id="iddelimport" class="form-control">

						</div>

						<br />
						<center>
							<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Cancel</button>
							<button type="submit" id="btn_delete" class="btn btn-danger col-md-3">Hapus</button>	
						</center>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
	</form>
<!-- END FORM DELETE MASTER -->

</section>
    <!-- /.content