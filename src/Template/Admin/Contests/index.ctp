<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th width="40%"><span><?= $this->Paginator->sort('name', ['label' => 'Nom de l\'opération']) ?></span></th>
                                <th width="20%"><span><?= $this->Paginator->sort('category_id', ['label' => 'Type']) ?></span></th>
                                <th width="15%"><span><?= $this->Paginator->sort('active', ['label' => 'Etat']) ?></span></th>
                                <th width="25%"><span><?= $this->Paginator->sort('created', ['label' => 'Action']) ?></span></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($contests as $contest): ?>

                            <tr >
                                <td><?= $contest->name ?></td>
                                <td><?= $contest->category->type ?></td>
                                <?php if ($contest->active == 1) : ?>
                                <td id="<?= $contest->id ?>" class="publier">
                                <button type="button" class="publier action btn btn-sm btn-success bt-w">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Publier
                                </button>
                                <?php endif ?>
                                <?php if ($contest->active == 0) : ?>
                                <td id="<?= $contest->id ?>" class="retirer">
                                    <button type="button" class="retirer action btn btn-sm btn-danger bt-w">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i> Cacher
                                    </button>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="<?= $this->Url->build([ 'controller' => 'Contests',
                             'action' => 'gameview',$contest->id, strtolower(str_replace(' ', '-', removeAccents($contest->name))), 'prefix'=>false]); ?>" target="_blank">
                                        <button type="button" class="btn btn-sm btn-info">
                                            <i class="fa fa-external-link" aria-hidden="true"></i> Fiche
                                        </button>
                                    </a>
                                    <a href="<?= $this->Url->build([ 'controller' => 'Contests',
                             'action' => 'edit',$contest->id, strtolower(str_replace(' ', '-', removeAccents($contest->name))), 'prefix'=>false]); ?>" target="_blank">
                                        <button type="button" class="btn btn-sm btn-warning hidden-xs">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edition
                                        </button>
                                    </a>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i>'),
                                    ['controller' => 'Contests', 'action' => 'delete', $contest->id],
                                    ['confirm' => __('Souhaitez-vous vraiment supprimer le jeu : {0}?', $contest->name),
                                    'escape' => false, 'class' => 'btn btn-sm btn-danger hidden-xs']) ?>
                                </td>




                            </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="pagination pagination-large pull-right">
        <?php
                echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
                'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
                'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
    </ul>

</div>
        <?php
                function removeAccents($words) {
                $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
                $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
                return str_replace($a, $b, $words);
                }
                ?>

<script>

    $(document).on('click', '.action', function () {
        var id = $(this).closest('td').attr('id');
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Contests","action" => "activate", "prefix" => "admin"]); ?>',
            data: 'id=' + id,
            success: function() {
                if ($('#'+id+'').hasClass('retirer')){
                    $('#'+id+'').html('<button type="button" class="action btn btn-sm btn-success bt-w"><i class="fa fa-eye" aria-hidden="true"></i> Publier</button>')
                    .removeClass('retirer').addClass('publier');
                }
                else {
                    $('#'+id+'').html('<button type="button" class="action btn btn-sm btn-danger bt-w"><i class="fa fa-eye-slash" aria-hidden="true"></i> Cacher</button>')
                    .removeClass('publier').addClass('retirer');
                }
            }
        });
    });


</script>
