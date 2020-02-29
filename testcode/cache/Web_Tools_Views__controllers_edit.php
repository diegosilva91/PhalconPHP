<?= $this->flashSession->output() ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $controller_name ?> - [<?= $controller_path ?>]
                </h3>
            </div>
            <div class="card-body">
                <form role="form" name="edit-controller" method="post" action="<?= $this->url->get($webtools_uri . '/controllers/update') ?>">
                    <div class="form-group">
                        <?= $this->tag->textArea(['code', 'cols' => 50, 'rows' => 25, 'class' => 'form-control']) ?>
                        <?= $this->tag->hiddenField(['path']) ?>
                    </div>

                    <hr/>
                    <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-success pull-right']) ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->assets->outputJs('codemirror') ?>
