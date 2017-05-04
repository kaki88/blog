<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table sscategory">
            <thead class="category">
            <tr>
                <th colspan="2" scope="col"> <span class="h4"> Poster un nouveau Sujet</span> </th>
            </tr>
            </thead>
            <tbody>
    <?= $this->Form->create($thread, ['enctype' =>'multipart/form-data']) ?>
    <fieldset>
        <tr>
            <td width="20%"> Titre du sujet </td>
            <td width="80%">   <?= $this->Form->input('subject' , ['label' => false , 'class' => 'form-control']); ?> </td>
        </tr>
        <tr>
            <td> Votre message </td>
            <td>

                    <div class="form-body">

                        <textarea name="text" id="summernote" class="form-control" rows="6"></textarea>
                    </div>



            </td>
        </tr>
        <tr>
            <td width="20%"> Options </td>
            <td width="80%">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="input-group input-large">
                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                        <span class="fileinput-filename"> </span>
                    </div>
                    <span class="input-group-addon btn default btn-file">
                                                                                    <span class="fileinput-new"> Joindre un fichier </span>
                                                                                    <span class="fileinput-exists"> Modifier </span>
                                                                                    <input type="file" name="upload"> </span>
                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Retirer </a>
                </div>
            </div>
            <div class="voffset3 text-center">
                <?= $this->Form->button('Valider',['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </tr>

    </fieldset>

        </table>
</div>
</div>



        <?= $this->Html->css('../assets/global/plugins/bootstrap-summernote/summernote.css') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-summernote/summernote.min.js') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-summernote/lang/summernote-fr-FR.js') ?>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 150,
        lang:"fr-FR"
    });
});
</script>