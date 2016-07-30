<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


   

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" >
            <li class="header">MENU DE CONTROL</li>
            <!-- Optionally, you can add icons to the links -->
              {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
               @if($name_rol=='docente') 
                  <!--DOCENTE GESTOR-->

            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Materia</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/curso/create') }}">Crear Materia</a></li>
                    <li><a href="{{ url('admin/curso_dicta') }}">Mis Materias</a></li>
                </ul>
            </li>
               @elseif($name_rol=='estudiante')  
                <!--ESTUDIANTE GESTOR-->
         

            <li class="treeview ">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Materias</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                 <li><a href="{{ url('admin/curso/index_todo/todo')}}">Mis Materias</a></li>
                 <li><a href="{{ url('/todosloscursos/conBoton/carrera') }}">Inscribirse a una Materia</a></li>
                 <li><a href="{{ url('admin/curso/desinscribirse/borrarmostrar')}}">Desinscribirse de una Materia</a></li>
                 <li><a href="{{ url('/todosloscursos/sinBoton/carrera') }}">Todas las Materias</a></li>
                
                    
                </ul>
            </li>

               @else
                   <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/users') }}">Estudiantes</a></li>
                    <li><a href="{{ url('admin/docente') }}">Docentes</a></li>
                    <li><a href="{{ url('admin/administrador') }}">Administrador</a></li>
                </ul>
                   </li>



                <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Carreras</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/carrera/create') }}">Crear Carreras</a></li>
                    <li><a href="{{ url('admin/carreras') }}">Ver Carreras</a></li>
                    <li><a href="{{ url('admin/carreras/deshabilitados') }}">Carreras Deshabilitados</a></li>
                </ul>
                </li>


                    <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Materias Docente</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/curso/create') }}">Crear Materia</a></li>
                    <li><a href="{{ url('admin/curso_dicta') }}">Mis Materias</a></li>
                </ul>
                    </li>

                  <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Gestor Materias Estudiante</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{ url('admin/curso/index_todo/todo')}}">Mis Materias</a></li>
                    <li><a href="{{ url('/todosloscursos/conBoton/carrera') }}">Inscribirse a una Materia</a></li>
                    <li><a href="{{ url('admin/curso/desinscribirse/borrarmostrar')}}">Desinscribirse de una Materia</a></li>
                    <li><a href="{{ url('/todosloscursos/sinBoton/carrera') }}">Todas las Materias</a></li>
                    
                </ul>
                 </li>

                  <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Copia de Seguridad(Backup)</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('copia_seguridad/generar_backup/backups') }}">Generar(Backup)</a></li>

                      <li><a href="{{ url('/copia_seguridad/backups') }}">Restaurar(Backup)</a></li>
                    
                </ul>
                 </li>


                  <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Bitacoras</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/bitacora_curso') }}">Bitacora Curso</a></li>

                      <li><a href="{{ url('/bitacora_examen') }}">Bitacora Examen</a></li>

                      <li><a href="{{ url('/bitacora_tarea') }}">Bitacora Tarea</a></li>
                    
                </ul>
                 </li>
               @endif 
            
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
