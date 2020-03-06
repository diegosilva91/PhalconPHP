<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['episodes', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Create episodes</h1>
</div>

<?= $this->getContent() ?>

<form action="<?= $this->url->get('episodes/create') ?>" class="form-horizontal" method="post">
    <div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['name', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldName']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldAirDate" class="col-sm-2 control-label">Air Of Date</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['air_date', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldAirDate']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEpisode" class="col-sm-2 control-label">Episode</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['episode', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEpisode']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdCharacters" class="col-sm-2 control-label">Id Of Characters</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['id_characters', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdCharacters']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUrl" class="col-sm-2 control-label">Url</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['url', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUrl']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldCreated" class="col-sm-2 control-label">Created</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['created', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCreated']) ?>
    </div>
</div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
</form>
