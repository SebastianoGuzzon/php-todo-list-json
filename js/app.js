new Vue({
  el: '#app',
  data: {
      todos: [],
      newTodo: ''
  },
  methods: {
      fetchTodos: function() {
          axios.get('api.php').then(response => {
              this.todos = response.data;
          })
      },
      addTodo: function() {
          axios.post('api.php', { todo: this.newTodo }).then(response => {
              this.todos.push(this.newTodo);
              this.newTodo = '';
          })
      }
  },
  mounted: function() {
      this.fetchTodos();
  }
});