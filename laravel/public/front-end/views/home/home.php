<style>
    body{
        background: #F3F3F3;
        /*background: url('/images/Pizza.jpg') no-repeat;*/
        /*background-size: 100%;*/
    }
</style>

<div ng-controller="HomeController" class="theme-home">
    <div class="center-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-md-6">
                    Lista de pedidos
                </div>
                <span class="col-md-6 text-right">
                    {{currentDate | date:'fullDate'}}
                </span>
                    <input type="text" ng-model="filter" class="form-control">
                <div class="clear"></div>
            </div>
            <ul class="list-group">
                <li dir-paginate="recent in requestRecent | orderBy: '-id' | filter:filter | itemsPerPage: limit" current-page="currentPage" class="list-group-item">
                    <span class="badge" tooltip="Quantidade" tooltip-placement="top" tooltip-trigger="mouseenter">{{ recent.quantity }}</span>
                    <h4 class="list-group-item-heading">{{recent.client.name}}</h4>
                    <p class="list-group-item-text">
                        {{recent.description}} - {{recent.price | currency:"R$"}}
                        <span class="pull-right label label-{{situationText[recent.situation].class}}"
                              tooltip="{{situationText[recent.situation].name}}" tooltip-placement="top" tooltip-trigger="mouseenter">
                            {{situationText[recent.situation].name}}
                        </span>
                        <a ng-href="./#!/request/{{recent.id}}" target="_blank">veja mais...</a>
                    </p>
                </li>
            </ul>
            <div ng-include="'footer.blade.php' | myUrl"></div>
        </div>
    </div>
</div>