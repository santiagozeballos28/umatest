\@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de las Listas de categorías de  las carreras
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 19%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="#"></i>Categorías</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de categorías de  las carreras
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">
                 
                 <!--TABLA DE BOTONES-->
                 <div class="box-body pad table-responsive">


         
              {{-- */

              $vector_categoria=array();
              $vector_ids=array();
                 $name_categoria=DB::table('categorias')->where('estado',0)->get();
                     for($i=0; $i < count($name_categoria); $i++){
                        $vector_categoria[$i]=$name_categoria[$i]->nombre;
                        $vector_ids[$i]=$name_categoria[$i]->id;
                     }

              $cantidad_curso=array();

              for($j=0; $j < count($vector_ids); $j++){
              
              $curso = DB::table('cursos')->where('id_categoria', $vector_ids[$j])->get();
              $cantidad_curso[$j]=count($curso);

              }
             /* --}}
              <h1>CATEGORIAS</h1>
              <table class="table table-bordered text-center">
                <tr>
                  <th>Categoria</th>
                  <th>Cantidad de Materias</th>
                </tr>
           
            {{-- */$contador=0; /* --}}
                 @foreach($vector_categoria as $item)
                  <tr>
                  <td>
                   <a href="{{ url('admin/curso/'.$vector_ids[$contador].'/vista_inscribirse/'.$boton.'/materias')}}">{{$item}}</a>
                  </td>
                      <td>
                       <p>{{$cantidad_curso[$contador]}}</p>
                      </td>
                       </tr>
                  
                  {{-- */$contador++; /* --}}
                @endforeach
                  
                
              </table>
             
            </div>



               </div>
            </div>
        </div>
    </div>
</div>
@endsection