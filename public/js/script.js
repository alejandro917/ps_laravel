
var vm_user = new Vue({
    el: '#UserController',

    data:{
        newUser: {
            name: '',
            email: '',
            address: ''
        }
    },

    methods: {
        fetchUser: function(){
            this.$http.get('api/users').then(function(body){
                this.$set('users', body.json())
            })

        },
        AddNewUser: function () {
            // User Input
            var user = this.newUser

            // Clear form input
            this.newUser = { name:'', email:'', address:'' }

            // Send Post Request
            this.$http.post('/api/users/', user)
        }

    },

    computed: {
        validation: function () {
            return {
                name: !!this.newUser.name.trim(),
                email: !!this.newUser.email.trim(),
            }
        },
        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key){
                return validation[key]
            })
        }
    },
    ready: function() {
        this.fetchUser()
    }
});

var vm_clientes = new Vue({
    http:{
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el: '#ClienteController',
    data:{
        newCliente: {
            id: '',
            nombre_cliente: '',
            email_cliente: '',
            id_cliente: '',
            direccion_cliente: '',
            telefono_cliente: ''
        },
        success: false,
        edit: false
    },

    methods: {
        fetchCliente: function () {
            this.$http.get('api/clientes').then(function (body) {
                this.$set('clientes', body.json())
            })

        },
        EditCliente: function (id) {
            var cliente = this.newCliente
            this.newCliente = {id: '', nombre_cliente: '', email_cliente: '', id_cliente: '', direccion_cliente: '', telefono_cliente: ''}
            this.$http.patch('api/clientes/' + id, cliente, {emulateJSON:true}).then((response) => {
                console.log(cliente);
            this.fetchCliente()
            this.edit = false
            //success
        }, (response) => {
                //error
            });
        },
        RemoveCliente: function (id) {
            var ConfirmBox = confirm("Desea eliminar el cliente?")

            if (ConfirmBox) this.$http.delete('api/clientes/' + id).then(function() {
                this.fetchCliente()
                })

        },
        ShowCliente: function (id) {
            this.edit = true
          this.$http.get('api/clientes/' + id).then(function (data) {
              this.newCliente.id = data.json().id
              this.newCliente.nombre_cliente = data.json().nombre_cliente
              this.newCliente.email_cliente = data.json().email_cliente
              this.newCliente.id_cliente = data.json().id_cliente
              this.newCliente.direccion_cliente = data.json().direccion_cliente
              this.newCliente.telefono_cliente = data.json().telefono_cliente
          })
        },
        AddNewCliente: function () {
            var cliente = this.newCliente;
            this.$http.post('api/clientes', cliente, {emulateJSON:true} ).then((response) => {
                self = this
                this.success = true
                setTimeout(function () {
                    self.success = false
                }, 5000)
                this.fetchCliente()
                //success
            }, (response) => {
                //error
                alert(0)
            });


        }
    },
    computed: {
        validation: function () {
            return {
                nombre_cliente: !!this.newCliente.nombre_cliente.trim(),
                email_cliente: !!this.newCliente.email_cliente.trim(),
                id_cliente: !!this.newCliente.id_cliente.trim(),
                direccion_cliente: !!this.newCliente.direccion_cliente.trim(),
                telefono_cliente: !!this.newCliente.telefono_cliente.trim(),
            }
        },
        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key){
                return validation[key]
            })
        }
    },
    ready: function() {
        this.fetchCliente()
    }
});