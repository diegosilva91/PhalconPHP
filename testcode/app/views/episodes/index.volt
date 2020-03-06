<div class="page-header">
    <h1>Search episodes</h1>
    <p>{{ link_to("episodes/new", "Create episodes") }}</p>
</div>

{{ content() }}

<form action="{{ url('episodes/search') }}" class="form-horizontal" method="get">
    <div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAirDate" class="col-sm-2 control-label">Air Of Date</label>
    <div class="col-sm-10">
        {{ text_field("air_date", "size" : 30, "class" : "form-control", "id" : "fieldAirDate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEpisode" class="col-sm-2 control-label">Episode</label>
    <div class="col-sm-10">
        {{ text_field("episode", "size" : 30, "class" : "form-control", "id" : "fieldEpisode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdCharacters" class="col-sm-2 control-label">Id Of Characters</label>
    <div class="col-sm-10">
        {{ text_field("id_characters", "type" : "numeric", "class" : "form-control", "id" : "fieldIdCharacters") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUrl" class="col-sm-2 control-label">Url</label>
    <div class="col-sm-10">
        {{ text_field("url", "size" : 30, "class" : "form-control", "id" : "fieldUrl") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreated" class="col-sm-2 control-label">Created</label>
    <div class="col-sm-10">
        {{ text_field("created", "size" : 30, "class" : "form-control", "id" : "fieldCreated") }}
    </div>
</div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Search', 'class': 'btn btn-default') }}
        </div>
    </div>
</form>
