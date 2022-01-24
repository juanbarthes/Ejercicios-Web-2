{literal}
<div id="vue-task">

    <ul id="task-list" class="list-group">
        <li 
            v-for="task in tasks"
            :data-id-task="task.id" 
            v-bind:class="{'list-group-item-success': task.completed == 1}"
            class="list-group-item"> 
            
            {{ task.title }} - {{ task.description}}
         </li>
    </ul>

</div>
{/literal}