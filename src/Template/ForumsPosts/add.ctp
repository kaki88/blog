<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>


<div class="col-md-12">
<div class="table-responsive">
    <table class="table sscategory">
        <thead class="category">
        <tr>
            <th colspan="2" scope="col"><span class="h4"> Poster une nouvelle réponse </span></th>
        </tr>
        </thead>
        <tbody>
        <?= $this->Form->create($post, ['enctype' =>'multipart/form-data', 'class' => 'form-post']) ?>
            <tr class="hidden">
                <td width="20%" > Titre du sujet </td>
                <td width="80%">   <?= $this->Form->input('title' , ['label' => false , 'class' => 'form-control dash-title' ,'value'=>$forumid->subject]); ?> </td>
            </tr>
            <tr>
                <td width="20%"> Votre message </td>
                <td width="80%">
                    <div class="form-body">
                        <textarea class="form-control" id="summernote" name="message" rows="6">
                            <?php if ($pastquote) : ?>

                            <p>&nbsp;</p>
<blockquote>
    <?php if ($pastquote->message) : ?>
 <?= $pastquote->message ?>
    <?php endif ?>
    <?php if ($pastquote->text) : ?>
    <?= $pastquote->text ?>
    <?php endif ?>
</blockquote>


                            <?php endif ?>

                        </textarea>
                    </div>
                </td>
            </tr>
        <tr>
        <td width="20%" class="dash-hide"> Options </td>
        <td width="80%" class="dash-hide">
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
        </tr>
        <tr>
            <td colspan="2" class=" text-center">
                <?= $this->Form->button('POSTER LA REPONSE',['class'=>'btn btn-success dash-posted']) ?>
                <?= $this->Form->end() ?>
            </td>
        </tr>
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