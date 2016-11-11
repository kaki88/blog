<div class="row">
<div class="col-md-12">
    <?= $this->Form->create($post) ?>
    <fieldset>

        <?php

            echo $this->Form->input('message',['type'=>'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button('Valider',['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
</div>