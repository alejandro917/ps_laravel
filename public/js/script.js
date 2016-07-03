
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

var vm_facturas = new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    data: {
        dFactura: {
            id: '',
            factura_id: '',
            fecha_factura: '',
            vencimiento_factura: '',
            estado_factura: '',
            id_cliente: '',
            nota_factura: '',
            subtotal_factura: '',
            total_factura: '',
            iva_factura: '',
            porc_iva_factura: ''
        },
        productos: [{
            id: '',
            factura_id: '',
            nombre_producto: '',
            cantidad_producto: 1,
            precio_producto: 0
        }],
        edit: false,
        list: true,
        form: {},
        errors: {},
        nueva: {},
        deleted: false,
    },
    el: '#FacturaController',
    methods: {
        back: function () {
            this.list = true
            this.edit = false
        },
        fetchFacturas: function () {
            this.$http.get('api/facturas').then(function (data) {
                this.$set('facturas', data.json())

                no_facturas = data.json().length-1;
                ultima_factura = data.json()[no_facturas].factura_id;
                this.nueva = parseFloat(ultima_factura) + 1;

            })
        },
        addLine:function () {
            this.productos.push({nombre_producto: '', cantidad_producto: 1, precio_producto: 0});
        },
        remove: function(producto) {
            this.dFactura.productos.$remove(producto);
        },
        ShowFactura: function (id) {
            this.list = false
            this.edit = true
            this.$http.get('api/facturas/' + id).then(function (data1) {
                this.$set('dFactura', data1.json())
            })
            this.$http.get('api/facturas/productos/' + id).then(function (data2) {
                this.$set('productos', data2.json())
            })
        },
        blankFactura: function () {
            this.list = false
            this.edit = true
            this.dFactura = [{
                fecha_factura: '',
                vencimiento_factura: '',
                estado_factura: '',
                id_cliente: '',
                nota_factura: '',
                subtotal_factura: '',
                total_factura: '',
                iva_factura: '',
                porc_iva_factura: ''
            }]
            this.productos = [{
                id: '',
                nombre_producto: '',
                cantidad_producto: 1,
                precio_producto: 0
            }]
            this.dFactura.factura_id = this.nueva;
        },
        removeProducto: function (id, idf) {
            var ConfirmBox = confirm("Desea eliminar el producto?")

            if (ConfirmBox) this.$http.delete('api/facturas/productos/' + id).then(function() {
                this.$http.get('api/facturas/productos/' + idf).then(function (data3) {
                    this.$set('productos', data3.json())
                })
            })

        },
        traerClientes: function () {
            this.$http.get('api/clientes').then(function (body) {
            this.$set('clientes', body.json())
        })
        },
        addNewFactura: function () {
            var dFactura_obj = this.dFactura
            this.$http.post('api/facturas', dFactura_obj, {emulateJSON:true}).then((response) => {
                this.dFactura = [{
                fecha_factura: '',
                vencimiento_factura: '',
                estado_factura: '',
                id_cliente: '',
                nota_factura: '',
                subtotal_factura: '',
                total_factura: '',
                iva_factura: '',
                porc_iva_factura: ''
            }]
            for (i = 0; i < this.productos.length; i++) {
                var productos_obj = this.productos[i]
                productos_obj['factura_id'] = response.json().id
                this.$http.post('api/facturas/productos', productos_obj, {emulateJSON:true}).then((response) => {
                    this.productos = [{
                    id: '',
                    nombre_producto: '',
                    cantidad_producto: 1,
                    precio_producto: 0
                }]
                }, (response) => {
                    alert(0)
                });
            }

            this.fetchFacturas()

        }, (response) => {
                //error
                alert(0)
            });

        },
        EditFactura: function (id) {

            console.log(this.productos)
            if (this.productos.length > 0) {
                for (i = 0; i < this.productos.length; i++) {
                    var productos_obj = this.productos[i]
                    productos_obj['factura_id'] = id
                    if (productos_obj['id']) {
                        this.$http.patch('api/facturas/productos/' + productos_obj.id, productos_obj, {emulateJSON:true}).then((response) => {
                        }, (response) => {
                        });
                    } else {
                        this.$http.post('api/facturas/productos', productos_obj, {emulateJSON:true}).then((response) => {
                    })
                    }
                }

            }

            var dFactura_obj = this.dFactura
            this.$http.patch('api/facturas/' + id, dFactura_obj, {emulateJSON:true}).then((response) => {
                this.fetchFacturas()

            }, (response) => {
                //error
            });

        },
        DercargarFactura: function () {
            var doc = new jsPDF();
            doc.text(20, 20, 'Hello world!');            
        }
    },
    computed: {
        subTotal: function(){
            return this.productos.reduce(function (carry, producto) {
                return carry + (parseFloat(producto.cantidad_producto) * parseFloat(producto.precio_producto));
            }, 0);
        },
        productosTotal: function () {
            return this.subTotal;
        }
    },
    ready: function() {
      //      alert(1);
            this.fetchFacturas()
        }
});