<?php
    $admin = $koneksi->query("SELECT * FROM admin");
    $total_admin = $admin->num_rows;
    $cek_hoax = $koneksi->query("SELECT * FROM cek_hoax");
    $total_cek = $cek_hoax->num_rows;
    $lapor_hoax = $koneksi->query("SELECT * FROM lapor_hoax");
    $total_lapor = $lapor_hoax->num_rows;
    $dataset = $koneksi->query("SELECT * FROM dataset");
    $total_dataset = $dataset->num_rows;
    $training = $koneksi->query("SELECT * FROM training");
    $total_training = $training->num_rows;
    $testing = $koneksi->query("SELECT * FROM testing");
    $total_testing = $testing->num_rows;
    $pengujian = $koneksi->query("SELECT * FROM pengujian");
    $total_pengujian = $pengujian->num_rows;

?>
<!-- Content Row -->
          <div class="row">

            <!-- Total Data Admin -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_admin;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Admin</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Cek Hoax -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_cek;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Cek Hoax!</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Lapor Hoax! -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_lapor;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Lapor Hoax!</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Dataset -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_dataset;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Dataset</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Training -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_training;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Training</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Testing -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_testing;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Testing</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Data Pengujian -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-12 mr-3 font-weight-bold text-gray-800"><?php echo $total_pengujian;?></div>
                        </div>
                      </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pengujian</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
          <!-- Content Row -->