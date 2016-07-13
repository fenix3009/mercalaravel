<div class="container" ng-controller="Control" ng-init="obtenerCategorias()">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="porductoLabel">Nombre del producto</label>
                <input class="form-control" id="porductoLabel" ng-model="producto.nombre" placeholder="Nombre" type="text">
            </div>
            <div class="form-group">
                <label for="costroLabel">Costo del producto</label>
                <input class="form-control" id="costroLabel" ng-model="producto.costo" placeholder="Costo" type="text">
            </div>


            <div class="fileUpload btn btn-primary">
                <span> </span>Imagen <% producto.imagen.filename %>
                <input class="upload" ng-model="producto.imagen" base-sixty-four-input type="file">
            </div>
            <ul class="list-group checked-list-box">
                <li class="list-group-item" ng-repeat="categoria in categorias">
                    <label>
                        <input data-checklist-value="categoria.id" data-checklist-model="select.categorias" type="checkbox">&nbsp&nbsp&nbsp <% categoria.nombre %>
                    </label>
                </li>
            </ul>
            <div class="form-group">                       
                <button class="btn btn-primary" ng-click="agregarProducto()" type="button">Agregar producto  </button>
            </div>
        </div>
        <div class="col-md-6" ng-show="producto.imagen.base64">
            <h3>Vista previa</h3>
            <img ng-src="<% 'data:' + producto.imagen.filetype + ';base64,' + producto.imagen.base64 %>" width="auto" height="300">
        </div>
    </div>
</div>