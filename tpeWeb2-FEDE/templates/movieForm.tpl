{include file="header.tpl"}

{include file="navbar.tpl"}

<div class="container mt-3">

    <h2>{$subtitle}</h2>

    <form method="post" action={$link}{$action} enctype="multipart/form-data">

        <input type="hidden" name="id_movie" value={$id}>

        <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value='{$movie["name"]}'
                required>
        </div>

        <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="description"
            maxlength="600" required>{$movie["description"]}</textarea>

        <div class="mt-2 form-group">
            <select class="custom-select" id="genre" name="id_genre">
                {foreach from=$genres item=genre}
                <option value={$genre["id_genre"]}>{$genre['name']}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="movieYear" placeholder="Year" name="year" min="1960" max="2019"
                value='{$movie["year"]}' required>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="rating" placeholder="Rating" name="rating" min="1" max="100"
                value='{$movie["rating"]}' required>
        </div>

        <div class="form-group">
            <input type="file" name="imagesToUpload[]" id="imagesToUpload" multiple>
            <br><span class="text-danger">Enter at least one image. <br>Only .jpg images are accepted.</span>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{include file="footer.tpl"}