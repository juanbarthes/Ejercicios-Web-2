{include file="header.tpl"} {include file="navbar.tpl"}

<div class="container mt-4 col-lg-3 col-md-3 col-xs-12">
  <div class="text-center">
    <h2>{$subtitle}</h2>
  </div>

  <form class="mt-3" method="post" action="{$link}send-message">
    <div class="form-group">
      <input
        type="email"
        class="form-control"
        id="user"
        aria-describedby="user"
        placeholder="Name@example.com"
        name="email"
        required
      />
    </div>

    <div class="text-center">
      <p class="text-danger">{$message}</p>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

{include file="footer.tpl"}
