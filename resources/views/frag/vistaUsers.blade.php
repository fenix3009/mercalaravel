
<div class="container" ng-controller="Control" ng-init="obtenerUsers()">

    <table class=" table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-Mail</th>
                <th>Rol</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="user in users">
                <th scope="row"><% user . id %></th>
                <td><% user . name %></td>
                <td><% user . lastname %></td>
                <td><% user . email %></td>
                <td>
                    <select ng-model="user.rol" ng-options="v for v in roles" ng-change="cambbiarRol(user.id, user.rol)">
                    </select>
                </td>
                <td>
                    <button class=" btn btn-danger" ng-click="borrarUser(user.id)"> 
                        <img   width="30" src="{{asset('images/delete.png')}}" alt=""/>
                    </button>
                </td>
            </tr>
        </tbody>

    </table>



</div>