<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    DATA KOMPONEN IMPORT
<!-- <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_addmaster"><span class="fa fa-plus"></span> Add New Item</a></div> -->
  </h1>
</section>
    <!-- Main content -->
<section class="content">
	<!-- ==================================================== IMPORT ==================================================== -->
	<div class="container">	
		<div class="box">  
			<div class="box-body">
				
	            <table id="kp_import" class="display nowrap table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
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
	                	<th class="th-sm" > Last Input</th>
	                	<th class="th-sm" > Action</th>
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
	<form id="formupdatekpimport">
		<div class="modal fade" id="Modal_update_kp_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Item Komponen Import</h4>
						<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Nama Barang</label>
										<input type="text" id="nama_brg_up_kpimport" name="nama_brg_up_kpimport" class="form-control" placeholder="Masukkan Item" style="width: 100%" required readonly="">
									</div>
									<div class="col-4">
										<label>Satuan</label>
										<input type="text" id="satuan_up_kpimport" name="satuan_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly="">
									</div>
									<div class="col-4">
										<label>Supplier</label>
										<input type="text" id="supplier_up_kpimport" name="supplier_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" readonly>
									</div>
									<div class="col-4">
										<label>Min. Pack</label>
										<input type="text" id="min_pack_up_kpimport" name="min_pack_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly> 
									</div>
									<div class="col-4">
										<label>Safety Stock(pcs)</label>
										<input type="text" id="safetypcs_up_kpimport" name="safetypcs_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly>
									</div>
									<div class="col-4">
										<label>Safety Stock(day)</label>
										<input type="text" id="safetyday_up_kpimport" name="safetyday_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly>
									</div>
									<div class="col-4">
										<label>Average Usage/day</label>
										<input type="number" id="avg_usage_up_kpimport" name="avg_usage_up_kpimport" class="form-control" placeholder="Masukkan Min. import" style="width: 100%" required>
									</div>
								</div>
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>STO Daily </label>
										<input type="number" id="sto_daily_up_kpimport" name="sto_daily_up_kpimport" class="form-control" placeholder="Masukkan Min. import" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Usage Daily</label>
										<input type="number" id="usage_daily_up_kpimport" name="usage_daily_up_kpimport" class="form-control" placeholder="Masukkan Min. import" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Incoming Daily</label>
										<input type="number" id="incoming_up_kpimport" name="incoming_up_kpimport" class="form-control" placeholder="Masukkan Min. import" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Balance</label>
										<input type="text" id="balance_up_kpimport" name="balance_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly>
									</div>
									<div class="col-4">
										<label>Status</label>
										<input type="text" id="status_up_kpimport" name="status_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly>
									</div>
									<div class="col-4">
										<label>Last Update</label>
										<input type="text" id="date_up_kpimport" name="date_up_kpimport" class="form-control" placeholder="Masukkan Satuan import" style="width: 100%" required readonly>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" id="id_up_kpimport" name="id_up_kpimport" value="">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</form>
<!-- END FORM UPDATE MASTER -->

<!-- START FORM DELETE kp-->

	<form id="formdeletekpimport">
		<div class="modal fade" id="Modal_delete_kp_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Komponen Import</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
					</div>
					<div class="modal-body">			              
						<div class="form-group col-lg-12">
							<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font> ini?</label>
							<br><br>
							<center><H4 id="msgkpimport"></H4></center>
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
<!-- END FORM DELETE Kp -->

</section>
    <!-- /.content