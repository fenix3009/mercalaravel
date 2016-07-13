
<div class="container" ng-controller="Control" ng-init="obtenerProductos()">
    <div class="row">
        <div class="col-sm-6 col-md-4" ng-repeat="producto in productos">
            <div class="thumbnail">
                <img class="thumbImag" ng-src="<% producto.imagen%>" alt="<% producto.nombre %>">
                <div class="caption">
                    <h4>
                        <strong><% producto.nombre %>
                        </strong>
                    </h4>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque turpis odio, congue vitae aliquam ac, tempor non mi. Duis condimentum sem et cursus lacinia. Donec imperdiet elit non nulla vehicula finibus. Sed malesuada odio eget odio ultrices dapibus. Fusce sed mauris vehicula, malesuada lectus et, pharetra metus. 
                    </p>
                    <p>       
                        <span class="label" style="background-color:<% cate.color %>" ng-repeat="cate in producto.categorias"><% cate.nombre %>
                        </span>
                    </p>
                    <p>
                        <button ng-click="comprarProducto(producto.id)" class="btn btn-primary" role="button">Comprar en <% producto.costo %> &nbsp;
                            <span class="glyphicon glyphicon-euro"></span>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>