<?php $this->assign('title', 'Catégories'); ?>

<!--_________________________________________________________________ajouter une catégorie-->
<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->css('colorpicker.css') ?>
<?= $this->Html->css('jquery.minicolors.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<?= $this->Html->script('bootstrap-colorpicker.js') ?>
<?= $this->Html->script('jquery.minicolors.min.js') ?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($category, ['type' => 'file']) ?>
                <?php
            echo $this->Form->input('type',['label' => 'Nom de la catégorie']);
                echo $this->Form->input('code',['label' => 'Code (abrégé)']);
                echo $this->Form->input('color',['label' => 'Couleur','class'=>'demo']);
                ?>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 30px; height: 30px;">
                        <img src="<?= $this->Url->image('no-avatar.png') ?>" alt=""/></div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                         style="max-width: 30px; max-height: 30px;"></div>

                                                                                <span class="btn default btn-xs btn-file">
                                                                                    <span class="fileinput-new btn btn-xs btn-primary"> Icône </span>
                                                                                    <span class="fileinput-exists btn btn-xs btn-warning"> Modifier </span>
                                                                                    <input type="file" name="icon_url"> </span>

                    <a href="javascript:;" class="btn btn-xs btn-danger fileinput-exists" data-dismiss="fileinput">
                        Annuler </a>
                    <div>
                    </div>
                </div>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!--_________________________________________________________________liste des catégories-->
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Liste des catégories</h3>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Type de jeu</th>
                            <th>Code</th>
                            <th>Icône</th>
                            <th>Couleur</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $cat) : ?>
                        <tr>
                            <td><?= $cat->type ?></td>
                            <td><?= $cat->code ?></td>
                            <td>  <?= $this->Html->image("menu/".$cat->icon_url , ['class' => 'imgmenuadmin'])?></td>
                            <td><span style="background-color: <?= $cat->color ?>; padding: 5px; border-radius: 3px;color: white"><?= $cat->color ?></span></td>

                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>


<script>
    var ComponentsColorPickers = function () {
        var t = function () {
            jQuery().colorpicker && ($(".colorpicker-default").colorpicker({format: "hex"}), $(".colorpicker-rgba").colorpicker())
        }, o = function () {
            $(".demo").each(function () {
                $(this).minicolors({
                    control: $(this).attr("data-control") || "hue",
                    defaultValue: $(this).attr("data-defaultValue") || "",
                    inline: "true" === $(this).attr("data-inline"),
                    letterCase: $(this).attr("data-letterCase") || "lowercase",
                    opacity: $(this).attr("data-opacity"),
                    position: $(this).attr("data-position") || "bottom left",
                    change: function (t, o) {
                        t && (o && (t += ", " + o), "object" == typeof console && console.log(t))
                    },
                    theme: "bootstrap"
                })
            })
        };
        return {
            init: function () {
                o(), t()
            }
        }
    }();
    jQuery(document).ready(function () {
        ComponentsColorPickers.init()
    });

</script>