<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
     <div class="list-group">
     @if (auth()->check())

  <a href="#" class="list-group-item list-group-item">
Historial de Subastas
  </a>
  <a href="#" class="list-group-item list-group-item">
  Productos
  </a>
  @else
  <a href="#" class="list-group-item list-group-item ">
Bienvenidos
  </a>
  <a href="#" class="list-group-item list-group-item">
Instrucciones
  </a>
  <a href="#" class="list-group-item list-group-item">
  Créditos
  </a>
  @endif
</div>
  <!--<ul class="nav nav-pills nav-stacked">
 <li>
 <a href="#">
 Dashboard
 </a>
 </li>
 <li><a href="#">Información básica</a></li>
 <li><a href="#">Historial de Subastas</a></li>
 <li><a href="#">Productos</a></li>
 </ul>--> 
    </div>
</div>

