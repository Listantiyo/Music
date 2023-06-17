            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
                            <form action="<?= BASEPATH; ?>/token/logout" method="post">
                                <button class="btn btn-primary" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= BASEPATH; ?>admin-res/vendor/jquery/jquery.min.js"></script>

            <script src="<?= BASEPATH; ?>admin-res/vendor/bootstrap/js/bootstrap.min.js"></script>


            <!-- Core plugin JavaScript-->
            <script src="<?= BASEPATH; ?>admin-res/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= BASEPATH; ?>admin-res/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?= BASEPATH; ?>admin-res/vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= BASEPATH; ?>admin-res/js/demo/chart-area-demo.js"></script>
            <script src="<?= BASEPATH; ?>admin-res/js/demo/chart-pie-demo.js"></script>

            <script src="<?= BASEPATH; ?>admin-res/js/custom.js"></script>

            <!-- priview file name -->
            <script type="text/javascript">
                $('.custom-file input').change(function(e) {
                    if (e.target.files.length) {
                        $(this).next('.custom-file-label').html(e.target.files[0].name);
                    }
                });

                function preview($this) {
                    const path = URL.createObjectURL(event.target.files[0]);
                    $($this).parent().prev('.preview').attr('src', path);
                }

                function openModal(title) {
                    $('.modal-title').html(title)
                }
            </script>

            </body>

            </html>