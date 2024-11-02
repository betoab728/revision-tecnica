  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">
                      <a style="cursor: pointer;"  class="nav-link active" onclick="CargarContenido('vistas/dashboard.php','content-wrapper')">
                          <i class="nav-icon fas fa-th"></i>
                          <p>Tablero principal</p>
                      </a>
                  </li>

                  <!--menú flota-->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fa-solid fa-truck-moving"></i>
                          <p>
                              Flota
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lista documentación</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lista tipo flota</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lista flota</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lista tipo mantenimiento</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <!--fin menú flota-->

                  <!--menú mantenimiento-->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fa-solid fa-truck-moving"></i>
                          <p>
                              Mantenimiento
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                          <a style="cursor: pointer;"  class="nav-link" onclick="CargarContenido('estado.php','content-wrapper')">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Estado</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Servicio</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sedes</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Proveedores</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <!--fin menú flota-->

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Simple Link
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <script>
     $(".nav-link").on('click',function(){
        $(".nav-link").removeClass('active');
        $(this).addClass('active');
     })
  </script>