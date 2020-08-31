            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= company()->author; ?> <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
            
            <!-- Bootbox JS -->
            <script src="<?= base_url('assets/'); ?>js/bootbox.all.min.js"></script>
            
            <!-- Page level plugins -->
            <script src="<?= base_url('assets/'); ?>js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
            <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
            
            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });

                $(document).on("click", ".show-confirm", function(e) {
                    var key = $(this).data('key');
                    var url = $(this).data('url');
                    bootbox.confirm({
                        title: "Konfirmasi!",
                        message: "Anda yakin ingin menghapus data tersebut?",
                        buttons: {
                            cancel: {
                                label: '<i class="fa fa-times"></i> Cancel'
                            },
                            confirm: {
                                label: '<i class="fa fa-check"></i> Hapus'
                            }
                        },
                        callback: function (result) {
                            //console.log(result)
                            if(result == true){
                                document.location.href = url + "/" + key;    
                            }
                            else
                            {
                                console.log(result);
                            }
                        }
                    });
                });

                $(document).on("click", ".print-confirm", function(e) {
                    var key = $(this).data('key');
                    var url = $(this).data('url');
                    bootbox.confirm({
                        title: "Konfirmasi!",
                        message: "Data akan dipindahkan ke ARSIP setelah proses print!",
                        buttons: {
                            cancel: {
                                label: '<i class="fa fa-times"></i> Cancel'
                            },
                            confirm: {
                                label: '<i class="fa fa-check"></i> Print'
                            }
                        },
                        callback: function (result) {
                            //console.log(result)
                            if(result == true){
                                document.location.href = url + "/" + key;    
                            }
                            else
                            {
                                console.log(result);
                            }
                        }
                    });
                });

                $(document).on("click", ".calculate-simulation", function(e) {
                    bootbox.alert({
                        title: "Hasil Perhitungan Simulasi",
                        message: "Perihitungan Simulasi akan tertera disini",
                        size: 'large'
                    });
                });

                $("#awal, #akhir").keyup(function(){
                    var stan_awal = parseInt($('#awal').val());
                    var stan_akhir = parseInt($('#akhir').val());

                    var total = stan_akhir - stan_awal;
                    $("#pakai").val(total);
                });
                    
            </script>



            </body>

            </html> 