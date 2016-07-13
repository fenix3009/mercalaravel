<div class="container" ng-controller="Control">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Nombre de la categoria</label>
                <input class="form-control" id="nombre" ng-model="categoria.nombre" placeholder="Nombre" type="text">
            </div>
            <div class="form-group">
                <button class="btn btn-primary " style=" background:<% categoria . color %>;" colorpicker type="button" colorpicker-position="top" ng-model="categoria.color">Color de la categoria</button>
            </div>
            <div class="form-group">                       
                <button  class="btn btn-primary" ng-click="agregarCategoria()" type="button">Agregar categoria</button>
            </div>
        </div>


    </div>
</div>