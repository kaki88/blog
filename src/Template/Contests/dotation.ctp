

                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Dotation</th>
                                <th>Valeur</th>
                                <th>Membre</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user->date->i18nFormat('dd MMM yyyy'); ?></td>
                                <td><?= $user->date->i18nFormat('HH:mm'); ?></td>
                                <td><?= $user->description?></td>
                                <td><?= $user->price ?> €</td>
                                <td><?= $user->user->login ?></td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>



</div>

