
<div class="col-md-3">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a  href="#"><span class="glyphicon glyphicon-list">
                            </span>Catégories</a>
                </h4>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-comment">
                            </span>Forums</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-plus text-primary"></span>
                                <!--<?= $this->Html->link(__('Créer'), ['controller' => 'Forums','action' => 'addforum']) ?>-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <!--<?= $this->Html->link(__('Editer / Supprimer'), ['controller' => 'Forums','action' => 'listforum']) ?>-->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .glyphicon { margin-right:10px; }
    .panel-body { padding:0; }
    .panel-body table tr td { padding-left: 15px }
    .panel-body .table {margin-bottom: 0; }
</style>