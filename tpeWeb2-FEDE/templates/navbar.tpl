<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="{$link}">
    <img class="logo" src="{$link}img/movie-logo.png" alt="movie-logo" />
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarText"
    aria-controls="navbarText"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="{$link}"
          >Home <span class="sr-only">(current)</span></a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{$link}all-movies/">All Movies</a>
      </li>
    </ul>

    {if $login}
    <span class="navbar-text text-white"><b>Welcome <span id="data-email" data-email ="{$email}">{$email}</span></b></span>
    <a class="btn btn-primary ml-2" href="{$link}logout" role="button"
      >Logout</a
    >
    {else}
    <div>
      <a class="btn btn-primary" href="{$link}login" role="button">Login</a>
      <a class="btn btn-primary" href="{$link}register" role="button"
        >Register</a
      >
    </div>
    {/if}
  </div>
</nav>
