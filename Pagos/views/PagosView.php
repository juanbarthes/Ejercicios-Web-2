<?php
    class PagosView
    {
        private $title;
        function __construct()
        {
            $this->$title = "Lista de Pagos";
        }
        function showHome($pagos)
        {
            $list = '<ul class="list-group">';
            foreach($pagos as $pago){
                $list .=  '<li class="list-group-item">'. $pago->deudor. ", ". $pago->cuota. ", ". $pago->monto. ", ". $pago->fecha. "</li>";
            }
            $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">        
                <title>$title</title>    
            </head>
            <body>
                <h1>$title</h1>'.
                $list.
                '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            </body>
            </html>';
            return $title;
        }

        function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }
    }
    