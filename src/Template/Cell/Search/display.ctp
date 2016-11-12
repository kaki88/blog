<div class="col-md-3  ">
    <div class="col-md-12  alltable">



        FILTRER PAR

        <div class="voffset3"></div>
        <?php
               $action = $this->request->params['action'];
        ?>
        <?php echo $this->Form->create('Post',array('id' => 'form-search' , 'class' => 'form-horizontal' , 'type' => 'post','url' => array('controller' => 'Contests', 'action' => $action))); ?>

        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                <?= $this->Form->input('category', ['empty' => '---- Type de jeu ----','options' => $type , 'label' => false , 'templates' => [
                'inputContainer' => '{{content}}'
                ]]);  ?>
            </div>
        </div> <br> <br>


        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                <?= $this->Form->input('name', ['label' => false , 'placeholder'=>'recherche', 'templates' => [
                'inputContainer' => '{{content}}'
                ]]);  ?>
            </div>
        </div> <br> <br>


        <div class="voffset7"></div>
        <?=   $this->Form->submit('Rechercher', ['class' => 'btn btn-success center-block']) ;
        $this->Form->end() ;
        ?>

    </div>
</div>