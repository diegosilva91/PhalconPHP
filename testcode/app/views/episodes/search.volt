<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("episodes/index", "Go Back") }}</li>
            <li class="next">{{ link_to("episodes/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Name</th>
            <th>Air Of Date</th>
            <th>Episode</th>
            <th>Id Of Characters</th>
            <th>Url</th>
            <th>Created</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for episode in page.items %}
            <tr>
                <td>{{ episode.getId() }}</td>
            <td>{{ episode.getName() }}</td>
            <td>{{ episode.getAirDate() }}</td>
            <td>{{ episode.getEpisode() }}</td>
            <td>{{ episode.getIdCharacters() }}</td>
            <td>{{ episode.getUrl() }}</td>
            <td>{{ episode.getCreated() }}</td>

                <td>{{ link_to("episodes/edit/"~episode.getId(), "Edit") }}</td>
                <td>{{ link_to("episodes/delete/"~episode.getId(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("episodes/search", "First", false, "class": "page-link") }}</li>
                <li>{{ link_to("episodes/search?page="~page.before, "Previous", false, "class": "page-link") }}</li>
                <li>{{ link_to("episodes/search?page="~page.next, "Next", false, "class": "page-link") }}</li>
                <li>{{ link_to("episodes/search?page="~page.last, "Last", false, "class": "page-link") }}</li>
            </ul>
        </nav>
    </div>
</div>
