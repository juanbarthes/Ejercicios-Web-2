{include file="header.tpl"}
    <h1>{$titulo}</h1>
    <hr>
    <form action="validate" method="POST">
        <div class="form-group">
          <label for="name">Your name</label>
          <input type="text" class="form-control" id="name" name="name" value={$nombre}>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value={$email}>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password1">Password</label>
          <input type="password" class="form-control" id="password1" name="password1">
        </div>
        <div class="form-group">
            <label for="password2">Password Repeat</label>
            <input type="password" class="form-control" id="password2" name="password2">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p>{$error}</p>
{include file="footer.tpl"}