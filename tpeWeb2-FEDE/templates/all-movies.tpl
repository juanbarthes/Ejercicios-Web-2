{include file="header.tpl"} {include file="navbar.tpl"}

<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h3>Movies</h3>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Year</th>
              <th scope="col">Rating</th>

              {if $isAdmin}
              <th scope="col">Options</th>
              {/if}
            </tr>
          </thead>
          <tbody>
            {foreach from=$movies item=movie}
            <tr>
              <th scope="row">
                <a href="{$link}movie/{$movie['id_movie']}">{$movie["name"]}</a>
              </th>
              <td class="d-inline-block text-truncate" style="max-width: 600px">
                {$movie["description"]}
              </td>
              <td>{$movie["year"]}</td>
              <td>{$movie["rating"]} / 100</td>
              {if $isAdmin}
              <td>
                <a href="{$link}delete-movie/{$movie['id_movie']}">Delete</a> |
                <a href="{$link}edit-movie/{$movie['id_movie']}">Edit</a>
              </td>
              {/if}
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{include file="footer.tpl"}
