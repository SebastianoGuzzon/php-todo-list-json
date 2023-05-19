const app = new Vue({
  el: '#app',
  data: {
    todos: [],
    newTodo: {
      title: '',
      datetime: ''
    }
  },
  mounted() {
    this.loadTodos();
  },
  methods: {
    loadTodos() {
      axios
        .get('todos.json')
        .then(response => {
          this.todos = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    saveTodos() {
      axios
        .post('todos.php', this.todos)
        .then(response => {
          console.log(response.data);
        })
        .catch(error => {
          console.error(error);
        });
    },
    addTodo() {
      if (this.newTodo.title !== '' && this.newTodo.datetime !== '') {
        this.todos.push({
          datetime: this.newTodo.datetime,
          title: this.newTodo.title,
          completed: false
        });
        this.newTodo.title = '';
        this.newTodo.datetime = '';
        this.todos();
      }
    },
    deleteTodo(index) {
      this.todos.splice(index, 1);
      this.saveTodos();
    }
  }
});
