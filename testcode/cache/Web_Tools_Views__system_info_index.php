<?= $this->flashSession->output() ?>

<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-body table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-center">Versions</th>
                        </tr>
                        <?php foreach ($this->info->getVersions() as $label => $value) { ?>
                            <tr>
                                <th><?= $label ?></th>
                                <td><?= $value ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="2" class="text-center">URIs</th>
                        </tr>
                        <?php foreach ($this->info->getUris() as $label => $value) { ?>
                            <tr>
                                <th><?= $label ?></th>
                                <td><?= $value ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="2" class="text-center">Paths</th>
                        </tr>
                        <?php foreach ($this->info->getDirectories() as $label => $value) { ?>
                            <tr>
                                <th><?= $label ?></th>
                                <td><?= $value ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="2" class="text-center">Environment</th>
                        </tr>
                        <?php foreach ($this->info->getEnvironment() as $label => $value) { ?>
                            <tr>
                                <th><?= $label ?></th>
                                <td><?= $value ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
