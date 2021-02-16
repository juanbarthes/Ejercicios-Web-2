"use strict"

let app = new Vue({
    el: '#vue-task',
    data: {
        tasks: []  
    }
});

document.addEventListener('DOMContentLoaded', () => {
    getTasks();

    document.querySelector('#form-task').addEventListener('submit', e => {
        // evita el envio del form default
        e.preventDefault();

        addTask();
    });

});

function getTasks() {
    fetch('api/tareas')
        .then(response => response.json())
        .then(tareas => app.tasks = tareas)
        .catch(error => console.log(error));
}

function addTask() {

    const task = {
        title: document.querySelector('input[name="input_title"]').value,
        description: document.querySelector('input[name="input_description"]').value,
        completed: document.querySelector('input[name="input_completed"]').checked,
        priority: document.querySelector('input[name="input_priority"]').value
    }

    fetch('api/tareas', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(task)
    })
        .then(response => response.json())
        .then(task => app.tasks.push(task))
        .catch(error => console.log(error));

}
