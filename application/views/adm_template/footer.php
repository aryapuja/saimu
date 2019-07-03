<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
<!-- DataTable -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$('.sidebar-menu').tree();
    	showMasterLokal();   //pemanggilan fungsi tampil lokal.
    	showMasterImport();   //pemanggilan fungsi tampil lokal.


    //fungsi tampil barang
    function showMasterLokal(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getDataLokal',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                	var ii = i+1;
                    html += '<tr>'+
	                            '<td hidden>'+data[i].id_brg_lokal+'</td>'+
	                            '<td>'+ii+'</td>'+
	                            '<td>'+data[i].nama_brg_lokal+'</td>'+
	                            '<td>'+data[i].min_pack_lokal+'</td>'+
	                            '<td>'+data[i].satuan_lokal+'</td>'+
	                            '<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id_brg_lokal+'" data-brg="'+data[i].nama_brg_lokal+'" data-satuan="'+data[i].satuan_lokal+'" data-min="'+data[i].min_pack_lokal+'"> <span class="fa fa-edit"></span> </a>'+ 
	                            		'     '+
	                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_deletelokal" data-id="'+data[i].id_brg_lokal+'" data-brg="'+data[i].nama_brg_lokal+'"> <span class="fa fa-remove"></span> </a>'+
			                    '</td>'+
                            '</tr>';
                }
                $('master_lokal').DataTable().destroy();
                $('master_lokal').find('tbody').empty();
                $('#show_master_lokal').html(html);
                $('#master_lokal').DataTable({
			      destroy		: true,
			      'paging'      : true,
			      'lengthChange': true,
			      'searching'   : true,
			      'ordering'    : true,
			      'info'        : true,
			      'autoWidth'   : true
			    });
            }

        });
    }

    function showMasterImport(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getDataImport',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                	var ii = i+1;
                    html += '<tr>'+
	                            '<td hidden>'+data[i].id_brg_import+'</td>'+
	                            '<td>'+ii+'</td>'+
	                            '<td>'+data[i].nama_brg_import+'</td>'+
	                            '<td>'+data[i].min_pack_import+'</td>'+
	                            '<td>'+data[i].satuan_import+'</td>'+
	                            '<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id_brg_import+'" data-brg="'+data[i].nama_brg_import+'" data-satuan="'+data[i].satuan_import+'" data-min="'+data[i].min_pack_import+'"> <span class="fa fa-edit"></span> </a>'+ 
	                            		'     '+
	                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_deleteimport" data-id="'+data[i].id_brg_import+'" data-brg="'+data[i].nama_brg_import+'"> <span class="fa fa-remove"></span> </a>'+
			                    '</td>'+
                            '</tr>';
                }
                $('master_import').DataTable().destroy();
                $('master_import').find('tbody').empty();
                $('#show_master_import').html(html);
                $('#master_import').DataTable({
			      destroy		: true,
			      'paging'      : true,
			      'lengthChange': true,
			      'searching'   : true,
			      'ordering'    : true,
			      'info'        : true,
			      'autoWidth'   : true
			    });
            }

        });
    }

/* ========================  Start ADD RECORD ==================================== */
	        //Save kegiatan baru
	        $('#formnewmaster').submit(function(e){
	       		e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var jenis		= $('#jenis').val();
        		var nama_brg	= $('#nama_brg').val();
        		var satuan		= $('#satuan').val();
        		var min_pack	= $('#min_pack').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/ksokp_controller/newDataMaster",
        			dataType : "JSON",
        			data : {
        				jenis:jenis,
        				nama_brg:nama_brg,
        				satuan:satuan,
        				min_pack:min_pack
        			},

        			success: function(){ 
        				$('#Modal_addmaster').modal('hide'); 
                        // method clear form & calendar agenda
                        refresh();
                    }
                });

        		return false;
        	});
/*  ========================  END ADD RECORD ==================================== */
//  ===================  START Delete Record ===================================
            //get data for delete record show prompt modal
            $('#master_lokal').on('click','.item_deletelokal',function(){
            	var id = $(this).data('id');
            	var brg = $(this).data('brg'); 

            	$('#Modal_delete').modal('show');
            	document.getElementById("msglokal").innerHTML='Komponen Lokal: "'+brg+'"';

            	$('[name="iddel"]').val(id);
            });

            //delete record to database
            $('#formdelete').submit(function(e){
            	e.preventDefault(); 
            	var id = $('#iddel').val();
            	var tabel = "master_lokal";

            	$.ajax({
            		type : "POST",
            		url  : "<?php echo site_url(); ?>/ksokp_controller/deleteMaster",
            		dataType : "JSON",
            		data : {id:id,tabel:tabel},
            		success: function(){
            			$('[name="iddel"]').val("");
            			$('#Modal_delete').modal('hide'); 
            			refresh();
            		}
            	});
            	return false;
            });

            $('#master_import').on('click','.item_deleteimport',function(){
            	var id = $(this).data('id');
            	var brg = $(this).data('brg'); 

            	$('#Modal_delete').modal('show');
            	document.getElementById("msglokal").innerHTML='Komponen Lokal: "'+brg+'"';

            	$('[name="iddel"]').val(id);
            });

            //delete record to database
            $('#formdelete').submit(function(e){
            	e.preventDefault(); 
            	var id = $('#iddel').val();
            	var tabel = "master_import";

            	$.ajax({
            		type : "POST",
            		url  : "<?php echo site_url(); ?>/ksokp_controller/deleteMaster",
            		dataType : "JSON",
            		data : {id:id,tabel:tabel},
            		success: function(){
            			$('[name="iddel"]').val("");
            			$('#Modal_delete').modal('hide'); 
            			refresh();
            		}
            	});
            	return false;
            });
//   ==================  END DELETE RECORD ====================================

	function refresh() {

		$("#master_lokal").DataTable().destroy();
		$("#master_lokal").find('tbody').empty();
		$("#master_import").DataTable().destroy();
		$("#master_import").find('tbody').empty();

		document.getElementById('formnewmaster').reset();
		// document.getElementById('formupdate').reset();
		// document.getElementById('formdelete').reset();

		showMasterLokal();   //pemanggilan fungsi tampil lokal.
		showMasterImport();   //pemanggilan fungsi tampil lokal.
        
    }

	});

</script>
</body>