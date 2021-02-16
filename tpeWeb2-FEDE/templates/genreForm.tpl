{include file="header.tpl"}

{include file="navbar.tpl"}

<div class="container mt-3">

    <h2>{$subtitle}<h3>

            <form method="post" action={$link}{$action}>

                <input type="hidden" name="id_genre" value={$id}>

                <div class="form-group">
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name"
                        name="name" value="{$genre['name']}" required>
                </div>

                <textarea class="form-control" id="description" placeholder="Description" name="description"
                    required>{$genre['description']}</textarea>

                <p class='text-danger'>{$message}</p>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>

{include file="footer.tpl"}