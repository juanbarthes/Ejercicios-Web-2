{include file="header.tpl"} {include file="navbar.tpl"}

<div class="container mt-4 col-lg-3 col-md-3 col-xs-12">
  <div class="text-center">
    <h2>{$subtitle}</h2>
  </div>

  <div class="mt-3">
    <form method="post" action="{$link}{$action}">
      {if $subtitle eq "Reset Password"}
      <input type="hidden" name="email" value="{$user['email']}" />
      <div class="form-group">
        <input
          type="email"
          class="form-control"
          id="user"
          aria-describedby="user"
          placeholder="Name@example.com"
          value="{$user['email']}"
          disabled
        />
      </div>
      {else}
      <div class="form-group">
        <input
          type="email"
          class="form-control"
          id="user"
          aria-describedby="user"
          placeholder="Name@example.com"
          name="email"
          value="{$user['email']}"
          required
        />
      </div>
      {/if}

      <div class="form-group">
        <input
          type="password"
          class="form-control"
          id="password"
          placeholder="Password"
          name="password"
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

  {if $subtitle eq 'Login'}
  <div class="text-center mt-3">
    <a href="{$link}recover-password">Recover password</a>
  </div>
  {/if}
</div>

{include file="footer.tpl"}
