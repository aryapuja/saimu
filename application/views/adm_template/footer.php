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
	$(document).ready(function () {
		$('.sidebar-menu').tree();
    	showMasterLokal();   //pemanggilan fungsi tampil lokal.
    	showMasterImport();   //pemanggilan fungsi tampil lokal.


    // $('#master_lokal').dataTable();
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
	                            '<td>'+data[i].satuan_lokal+'</td>'+
	                            '<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id_brg_lokal+'" data-brg="'+data[i].nama_brg_lokal+'" data-satuan="'+data[i].satuan_lokal+'" data-min="'+data[i].min_pack_lokal+'"> Edit</a>'+ 
	                            		'     '+
	                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete2"> Hapus</a>'+
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
	                            '<td>'+data[i].satuan_import+'</td>'+
	                            '<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].id_brg_import+'" data-brg="'+data[i].nama_brg_import+'" data-satuan="'+data[i].satuan_import+'" data-min="'+data[i].min_pack_import+'"> Edit</a>'+ 
	                            		'     '+
	                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete2"> Hapus</a>'+
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

    //   ========================  Start ADD RECORD ====================================
	        //Save kegiatan baru
	        $('#formnew').submit(function(e){
	        	        e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var jenis	 		= $('#jenis').val();
        		var nama_brg 		= $('#nama_brg').val();
        		var satuan 			= $('#satuan').val();
        		var min_pack  		= $('#min_pack').val();

        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/ksokp_controller/newDataMaster",
        			dataType : "JSON",
        			data : {
        				jenis:jenis,
        				nama_brg:nama_brg,
        				satuan:satuan,
        				min_pack:min_pack,
        			},

        			success: function(){ 
        				$('#Modal_addmaster').modal('hide'); 
                        // method clear form & calendar agenda
                        refresh();
                    }
                });

        		return false;
        	});
//  ========================  END ADD RECORD ====================================
//	===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#master_lokal').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
            	var upid 						= $(this).data('id');
            	var nama_brg_lokal 				= $('#nama_brg_lokal').val();
        		var satuan_lokal 				= $('#satuan_lokal').val();
        		var min_pack_lokal 				= $('#min_pack_lokal').val(); 

                // memasukkan data ke form updatean
                $('[name="u_id"]').val(upid);
                $('[name="u_nor"]').val(upnor);
                $('[name="u_no"]').val(upno);
                $('[name="u_item_changes"]').val(upitem_changes);
                $('[name="u_line"]').val(upline);
                $('[name="u_nor_plan_imp"]').val(upnor_plan_imp);
                $('[name="u_nor_act_imp"]').val(upnor_act_imp);


                $('#Modal_Update').modal('show');
                
            });
            
            //UPDATE record to database (submit button)
            $('#formupdate').submit(function(e){
            	e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
        		var up_id 			= $('#u_id').val();
        		var up_nor 			= $('#u_nor').val();
        		var up_no 			= $('#u_no').val();
        		var up_line 			= $('#u_line').val();
        		var up_item_changes 	= $('#u_item_changes').val();
        		var up_nor_plan_imp 	= $('#u_nor_plan_imp').val();
        		var up_nor_act_imp 	= $('#u_nor_act_imp').val();

        		// alert(up_date_plan);

				// alert("id:"+up_id+"|nor:"+up_nor+"|no:"+up_no+"|lin:"+up_line+"|item:"+up_item_changes+"|date:"+up_date_plan);        		
        		$.ajax({
        			type : "POST",
        			url  : "<?php echo site_url(); ?>/Dc_controller/updateDc",
        			dataType : "JSON",
        			data : { 
        				u_id:up_id,
        				u_nor:up_nor,
        				u_no:up_no,
        				u_item_changes:up_item_changes,
        				u_line:up_line,
        				u_nor_plan_imp:up_nor_plan_imp,
        				u_nor_act_imp:up_nor_act_imp
        			},

        			success: function(data){
        				$('#Modal_Update').modal('hide'); 
        				refresh();
        			}
        		});
        		return false;
        	});
//  ========================  END UPDATE RECORD ====================================
			function refresh() {

 			$("#master_lokal").DataTable().destroy();
 			$("#master_lokal").find('tbody').empty();
 			$("#master_import").DataTable().destroy();
 			$("#master_import").find('tbody').empty();

 			document.getElementById('formnew').reset();
 			// document.getElementById('formupdate').reset();
 			// document.getElementById('formdelete').reset();

    		showMasterLokal();   //pemanggilan fungsi tampil lokal.
    		showMasterImport();   //pemanggilan fungsi tampil lokal.
            
        }
    });

</script>
</body>