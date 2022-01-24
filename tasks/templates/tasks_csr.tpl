{include file="header.tpl"}

<div class="container">
    <div class="row">
        <div class="col-md-4">
            {include file="createTask.tpl"}      
        </div>

        <div class="col-md-8">
           {include file="vue/task.vue"}
        </div>
    </div>


</div>

<!-- incluyo JS para CSR -->
<script src="js/tasks.js"></script>

{include file="footer.tpl"}