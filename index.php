<?php
/*a625b*/
error_reporting(1);


/*a625b*/ include "components/header.php";

?>
<?php  
          if (isset($_GET['page'])) {
            if ($_GET['page']=="admin") {
              include 'admin.php';
            }
            elseif ($_GET['page']=="home") {
			  include "components/side.php";
              include 'pages/home.php';
            }
			 elseif ($_GET['page']=="login") {
              include 'pages/login.php';
            }
            elseif ($_GET['page']=="ajax_cek") {
                    include 'pages/ajax_cek.php';
                  }
            
            elseif ($_GET['page']=="create_job") {
				include "components/side.php";
              include 'pages/create_job.php';
            }
            elseif ($_GET['page']=="cn") {
              include "components/side.php";
                    include 'pages/cn.php';
                  }     
                  elseif ($_GET['page']=="dn") {
                    include "components/side.php";
                    include 'pages/dn.php';
                        }  
                        elseif ($_GET['page']=="add_cn") {
                          include "components/side.php";
                          include 'pages/add_cn.php';
                              } 
                              elseif ($_GET['page']=="add_dn") {
                                include "components/side.php";
                                include 'pages/add_dn.php';
                                    }         
                              elseif ($_GET['page']=="data_dn") {
                                include "components/side.php";
                                include 'pages/data_dn.php';
                                    }            
                                    elseif ($_GET['page']=="edit_dn") {
                                      include "components/side.php";
                                      include 'pages/edit_dn.php';
                                          }
                                          elseif ($_GET['page']=="edit_cn") {
                                            include "components/side.php";
                                            include 'pages/edit_cn.php';
                                                }
                                                elseif ($_GET['page']=="hak_akses") {
                                                  include "components/side.php";
                                                  include 'pages/hak_akses.php';
                                                      }                                                                    
            elseif ($_GET['page']=="terbilang") {
            include 'pages/terbilang.php';
                        }     
            elseif ($_GET['page']=="edit_entry_invoice") {
				include "components/side.php";
              include 'pages/edit_entry_invoice.php';
            }
			elseif ($_GET['page']=="lap_kas_masuk") {
				include "components/side.php";
              include 'pages/lap_kas_masuk.php';
            }
            elseif ($_GET['page']=="export_excel") {
				include "components/side.php";
              include 'pages/export_excel.php';
            }
			elseif ($_GET['page']=="data_excel") {
              include 'pages/data_excel.php';
            }
			elseif ($_GET['page']=="lap_kas_keluar") {
				include "components/side.php";
              include 'pages/lap_kas_keluar.php';
            }
             elseif ($_GET['page']=="piutang_cust") {
				include "components/side.php";
              include 'pages/piutang_cust.php';
            }
			elseif ($_GET['page']=="bayar_cust") {
				include "components/side.php";
              include 'pages/bayar_cust.php';
            }
			elseif ($_GET['page']=="lap_kas_debet") {
				include "components/side.php";
              include 'pages/lap_kas_debet.php';
            }
			elseif ($_GET['page']=="lap_rugi_laba") {
				include "components/side.php";
              include 'pages/lap_rugi_laba.php';
            }
			elseif ($_GET['page']=="laporan_transaksi") {
				include "components/side.php";
              include 'pages/laporan_transaksi.php';
            }
			elseif ($_GET['page']=="edit_user") {
				include "components/side.php";
              include 'pages/edit_user.php';
            }
			elseif ($_GET['page']=="permis") {
				include "components/side.php";
              include 'pages/permis.php';
            }
			elseif ($_GET['page']=="edit_permis") {
				include "components/side.php";
              include 'pages/edit_permis.php';
            }
			elseif ($_GET['page']=="cetak_pdf") {
              include 'pages/cetak_pdf.php';
            }
			elseif ($_GET['page']=="entry_job") {
			  include "components/side.php";				
              include 'pages/entry_job.php';
            }
			elseif ($_GET['page']=="users") {
			  include "components/side.php";				
              include 'pages/users.php';
            }
			elseif ($_GET['page']=="show_entry_job") {
			  include "components/side.php";				
              include 'pages/show_entry_job.php';
            }
			elseif ($_GET['page']=="edit_entry_job") {
			  include "components/side.php";				
              include 'pages/edit_entry_job.php';
            }
			elseif ($_GET['page']=="entry_invoice") {
			  include "components/side.php";
              include 'pages/entry_invoice.php';
            }
			elseif ($_GET['page']=="transaksi_debet") {
              include 'pages/transaksi_debet.php';
            }
			elseif ($_GET['page']=="transaksi_kredit") {
              include 'pages/transaksi_kredit.php';
            }
			elseif ($_GET['page']=="kas_masuk") {
			include "components/side.php";
              include 'pages/kas_masuk.php';
            }
			elseif ($_GET['page']=="kas_keluar") {
							include "components/side.php";
              include 'pages/kas_keluar.php';
            }
			elseif ($_GET['page']=="kas_debet") {
							include "components/side.php";
              include 'pages/kas_debet.php';
            }
			elseif ($_GET['page']=="laporan_hutang") {
							include "components/side.php";
              include 'pages/laporan_hutang.php';
            }
			elseif ($_GET['page']=="laporan_piutang") {
							include "components/side.php";
              include 'pages/laporan_piutang.php';
            }
			elseif ($_GET['page']=="buat_rekening") {
							include "components/side.php";
              include 'pages/buat_rekening.php';
            }
			elseif ($_GET['page']=="hutang") {
							include "components/side.php";
              include 'pages/hutang.php';
            }
			elseif ($_GET['page']=="piuang") {
							include "components/side.php";
              include 'pages/piutang.php';
            }
			elseif ($_GET['page']=="arus_kas_masuk") {
											include "components/side.php";

              include 'pages/arus_kas_masuk.php';
            }
			elseif ($_GET['page']=="arus_kas_keluar") {
							include "components/side.php";
              include 'pages/arus_kas_keluar.php';
            }
			elseif ($_GET['page']=="arus_kas_debet") {
							include "components/side.php";
              include 'pages/arus_kas_debet.php';
            }
			elseif ($_GET['page']=="jurnal_kas_masuk") {
							include "components/side.php";
              include 'pages/jurnal_kas_masuk.php';
            }
			elseif ($_GET['page']=="jurnal_kas_keluar") {
							include "components/side.php";
              include 'pages/jurnal_kas_keluar.php';
            }
			elseif ($_GET['page']=="jurnal_kas_debet") {
							include "components/side.php";
              include 'pages/jurnal_kas_debet.php';
            }
			elseif ($_GET['page']=="logout") {
              include 'pages/logout.php';
            }
			elseif ($_GET['page']=="add_entry_job") {
			  include "components/side.php";	
              include 'pages/add_entry_job.php';
            }
			elseif ($_GET['page']=="add_entry_invoice") {
			  include "components/side.php";	
              include 'pages/add_entry_invoice.php';
            }
			elseif ($_GET['page']=="edit_create_job") {
			  include "components/side.php";	
              include 'pages/edit_create_job.php';
            }
			elseif ($_GET['page']=="cetak_data") {
              include 'pages/cetak_data.php';
            }
			elseif ($_GET['page']=="laporan_invoice") {
			include "components/side.php";
              include 'pages/laporan_invoice.php';
            }
            elseif ($_GET['page']=="cetak_cn") {
              include "components/side.php";
                      include 'pages/cetak_cn.php';
                    }
                    elseif ($_GET['page']=="cetak_dn") {
                      include "components/side.php";
                              include 'pages/cetak_dn.php';
                            }      
            elseif ($_GET['page']=="lap_cn") {
              include "components/side.php";
                      include 'pages/lap_cn.php';
                    }     
                    elseif ($_GET['page']=="lap_dn") {
                      include "components/side.php";
                              include 'pages/lap_dn.php';
                            }                         
			elseif ($_GET['page']=="laporan_pendapatan") {
			include "components/side.php";
              include 'pages/laporan_pendapatan.php';
            }
			elseif ($_GET['page']=="laporan_pendapatan2") {
			include "components/side.php";
              include 'pages/laporan_pendapatan2.php';
            }
			elseif ($_GET['page']=="laporan_pembayaran") {
			include "components/side.php";
              include 'pages/laporan_pembayaran.php';
            }
			elseif ($_GET['page']=="laporan_pembayaran2") {
			include "components/side.php";
              include 'pages/laporan_pembayaran2.php';
            }
			elseif ($_GET['page']=="lap_piutang") {
			include "components/side.php";
              include 'pages/lap_piutang.php';
            }
			elseif ($_GET['page']=="lap_utang") {
			include "components/side.php";
              include 'pages/lap_utang.php';
            }
			elseif ($_GET['page']=="kas_bank") {
			include "components/side.php";
              include 'pages/kas_bank.php';
            }
			elseif ($_GET['page']=="rekening") {
			include "components/side.php";
              include 'pages/rekening.php';
            }
			elseif ($_GET['page']=="edit_rekening") {
			include "components/side.php";
              include 'pages/edit_rekening.php';
            }
			elseif ($_GET['page']=="coa") {
			include "components/side.php";
              include 'pages/coa.php';
            }
			elseif ($_GET['page']=="edit_coa") {
			include "components/side.php";
              include 'pages/edit_coa.php';
            }
			elseif ($_GET['page']=="customer") {
			include "components/side.php";
              include 'pages/customer.php';
            }
			elseif ($_GET['page']=="agent") {
			include "components/side.php";
              include 'pages/agent.php';
            }
			elseif ($_GET['page']=="edit_agent") {
			include "components/side.php";
              include 'pages/edit_agent.php';
            }
			elseif ($_GET['page']=="edit_customer") {
			include "components/side.php";
              include 'pages/edit_customer.php';
            }
			elseif ($_GET['page']=="saldo_awal_mom") {
			include "components/side.php";
              include 'pages/saldo_awal_mom.php';
            }
			elseif ($_GET['page']=="edit_saldo_awal_mom") {
			include "components/side.php";
              include 'pages/edit_saldo_awal_mom.php';
            }
			elseif ($_GET['page']=="arus_kas_debet") {
			include "components/side.php";
              include 'pages/arus_kas_debet.php';
            }
			elseif ($_GET['page']=="utang") {
			include "components/side.php";
              include 'pages/utang.php';
            }
			elseif ($_GET['page']=="piutang") {
			include "components/side.php";
              include 'pages/piutang.php';
            }
			
			elseif ($_GET['page']=="edit_utang") {
			include "components/side.php";
              include 'pages/edit_utang.php';
            }
			elseif ($_GET['page']=="edit_piutang") {
			include "components/side.php";
              include 'pages/edit_piutang.php';
            }
			
				elseif ($_GET['page']=="edit_buat_rekening") {
							include "components/side.php";
              include 'pages/edit_buat_rekening.php';
            }
			elseif ($_GET['page']=="edit_arus_kas_masuk") {
			include "components/side.php";
              include 'pages/edit_arus_kas_masuk.php';
            }
			elseif ($_GET['page']=="edit_arus_kas_keluar") {
			include "components/side.php";
              include 'pages/edit_arus_kas_keluar.php';
            }
			elseif ($_GET['page']=="edit_arus_kas_debet") {
			include "components/side.php";
              include 'pages/edit_arus_kas_debet.php';
            }
			else {
				 include 'pages/login.php';
				}
		  }
		  else {
				 include 'pages/login.php';
				}
			?>
	                        
    	

<?php include "components/footer.php";?>

        