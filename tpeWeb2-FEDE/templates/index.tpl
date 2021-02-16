{include file="header.tpl"} {include file="navbar.tpl"}

<div class="container mt-3">
  <h3>List of Genres</h3>

  <div class="row">
    {if $isAdmin}
    <div class="col-sm-10 mt-2">
      {else}
      <div class="col-sm-12 mt-2">
        {/if}
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              {if $isAdmin}
              <th scope="col">Options</th>
              {/if}
            </tr>
          </thead>
          <tbody>
            {foreach from=$genres item=genre}
            <tr>
              <th scope="row">
                <a href='{$link}movies/{$genre["id_genre"]}'
                  >{$genre["name"]}</a
                >
              </th>
              {if $isAdmin}
              <td class="d-inline-block text-truncate" style="max-width: 600px">
                {$genre["description"]}
              </td>
              {else}
              <td
                class="d-inline-block text-truncate"
                style="max-width: 1000px"
              >
                {$genre["description"]}
              </td>
              {/if} {if $isAdmin}
              <td>
                <a href='{$link}delete-genre/{$genre["id_genre"]}'>Delete</a> |
                <a href='{$link}edit-genre/{$genre["id_genre"]}'>Edit</a>
              </td>
              {/if}
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      {if $isAdmin}
      <div class="col-sm-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Admin panel</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="{$link}add-genre">Add Genre</a></td>
            </tr>
            <tr>
              <td><a href="{$link}add-movie">Add Movie</a></td>
            </tr>
            <tr>
              <td><a href="{$link}users/">Users</a></td>
            </tr>
          </tbody>
        </table>
      </div>
      {/if}
    </div>
  </div>
</div>

{include file="footer.tpl"}
