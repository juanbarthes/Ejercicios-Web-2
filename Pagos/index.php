<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto mt-3">
        <h1>Informar Pago</h1>
        <form>
        <div class="form-group">
            <label for="deudor">Nombre del deudor</label>
            <input type="text" class="form-control" id="deudor" name="deudor" required>
        </div>
        <div class="form-group">
            <label for="cuotaNro">Numero de cuota</label>
            <input type="number" class="form-control" id="cuotaNro" name="cuotaNro" required>
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" class="form-control" id="monto" name="monto" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha de pago</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>