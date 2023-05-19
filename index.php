<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>To-do App</title>
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <div id="app">
    <h1>To-do App</h1>
    <div class="form-container">
      <input type="text" v-model="newTodo.title" placeholder="Aggiungi una nuova attività">
      <input type="datetime-local" v-model="newTodo.datetime">
      <button @click="addTodo">Aggiungi</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>Ora</th>
          <th>Attività</th>
          <th>Completa</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(todo, index) in todos" :key="index">
          <td>{{ todo.datetime }}</td>
          <td>{{ todo.title }}</td>
          <td>
            <input type="checkbox" v-model="todo.completed" @change="saveTodos">
          </td>
          <td>
            <button @click="deleteTodo(index)">Elimina</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>