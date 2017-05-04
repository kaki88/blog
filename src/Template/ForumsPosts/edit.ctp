
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table sscategory">
            <thead class="category">
            <tr>
                <th colspan="2" scope="col"> Editer un Sujet </th>
            </tr>
            </thead>
            <tbody>
            <?= $this->Form->create($post) ?>
            <fieldset>

                <tr>
                    <td> Votre message </td>
                    <td>

                        <div class="form-body">
                            <textarea id="summernote" class="form-control" name="message" rows="6"><?= $post->message ?></textarea>

                        </div>

                        <div class="voffset3 text-center">
                            <?= $this->Form->button('Valider',['class' => 'btn btn-success']) ?>
                            <?= $this->Form->end() ?>
                        </div>

                    </td>
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