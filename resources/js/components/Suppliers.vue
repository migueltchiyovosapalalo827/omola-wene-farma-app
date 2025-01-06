<template>
    <section class="content">

        <div class="container">
          <br>
          <h1 class="display-4">Fornecedores</h1>
          <div class="row">
            <div class="col-12">


            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" v-show="!editmode">Adicionar novo fornecedores</h5>
                      <h5 class="modal-title" v-show="editmode">Editar detalhes do fornecedores</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <form @submit.prevent="editmode ? updateSupplier() : createSupplier()">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Nome</label>
                              <input v-model="form.name" type="text" name="name"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                              <has-error :form="form" field="name"></has-error>
                          </div>
                          <div class="form-group">
                              <label>Telefone.</label>
                              <input v-model="form.phone" type="number" name="phone"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                              <has-error :form="form" field="phone"></has-error>
                          </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input v-model="form.email" type="email" name="email"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                              <has-error :form="form" field="email"></has-error>
                            </div>
                          <div class="form-group">
                              <label>Endereço</label>
                              <input v-model="form.address" type="text" name="address"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                              <has-error :form="form" field="address"></has-error>
                          </div>
                            <div class="form-group">
                              <label>Cidade</label>
                              <input v-model="form.city" type="text" name="city"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                              <has-error :form="form" field="city"></has-error>
                            </div>
                            <div class="form-group">
                              <label>Código postal</label>
                              <input v-model="form.postalCode" type="text" name="postalCode"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('postalCode') }">
                              <has-error :form="form" field="postalCode"></has-error>
                            </div>
                            <div class="form-group">
                              <label>País</label>
                              <input v-model="form.country" type="text" name="country"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                              <has-error :form="form" field="country"></has-error>
                            </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
                          <button v-show="!editmode" type="submit" class="btn btn-primary">Criar</button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>


      <br>


        <b-row>
          <b-col>
            <b-input type="text" v-model="search" placeholder="procurar"></b-input>
          </b-col>
          <b-col cols="2">
            <b-btn id="addbutton" variant="outline-secondary" @click="newModal">
                <b-icon icon="plus"></b-icon> Novo fornecedores
            </b-btn>
          </b-col>
        </b-row>

        <b-row>
          <b-col></b-col>
          <b-col cols="2" style="display:flex">
                 <download-excel :data="filteredRows2" class="exports">
                      <b-btn variant="outline-success" size="sm" class="exports">
                        <!-- <b-icon icon="file-earmark-excel"></b-icon> -->
                        EXCEL
                      </b-btn>
                </download-excel>
                 <download-excel
                    :data="filteredRows2"
                    type="csv"
                    name="filename.xlsx"
                    class="exports"
                  >
                    <b-btn size="sm" variant="outline-info" class="exports">
                      <!-- <b-icon icon="file-excel"></b-icon> -->
                      CSV
                    </b-btn>
                  </download-excel>
          </b-col>
        </b-row>

        <br>

      <table class="table">
        <thead>
          <th>ID</th>
          <th>Nome</th>
          <th>Telefone.</th>
          <th>Endereço</th>
          <th>Cidade</th>
          <th>País</th>
          <th>Código postal</th>
          <th>Opções</th>

        </thead>
        <tbody>
          <tr v-for="sam in filteredRows2" :key="sam.id">
            <td v-html="highlightMatches(sam.id)"></td>
            <td v-html="highlightMatches(sam.name)"></td>
            <td>{{sam.phone}}</td>
            <td v-html="highlightMatches(sam.address)"></td>
            <td v-html="highlightMatches(sam.city)"></td>
            <td v-html="highlightMatches(sam.country)"></td>
            <td>{{sam.postalCode}}</td>
            <td>
               <span @click="editModal(sam)" class="optionBtn">
                   <b-icon icon="pencil-square"></b-icon>
               </span>
                |
               <span @click="deleteSupplier(sam.id)" class="optionBtn">
                   <b-icon icon="trash"></b-icon>
               </span>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

      <!-- <div class="card-footer">
                    <pagination :data="suppliers" @pagination-change-page="getResults"></pagination>
            </div> -->

    </section>
  </template>

  <script>
      import VueTagsInput from '@johmun/vue-tags-input';
      export default {
        components: {
            VueTagsInput,
          },
          data () {
              return {
                  editmode: false,
                  products : {},
                   suppliers: {
                    data:[],
                    message:''
                   }
                  ,
                 form: new Form({
                      id:'',
                      name: '',
                      email: '',
                      phone: '',
                      address: '',
                      city: '',
                      country: '',
                      postalCode: '',

                  }),
                  categories: [],
                  tag:  '',
                  autocompleteItems: [],
                  search:'',


              }
          },

          methods: {

             loadProducts(){

              // if(this.$gate.isAdmin()){
              //  axios.get("api/suppliersProducts").then(({ data }) => (this.products.data = data.data.data));
              // }
            },

            getResults(page = 1) {

                this.$Progress.start();

                axios.get('api/suppliers?page=' + page).then(({ data }) => (this.suppliers = data.data));

                this.$Progress.finish();
            },
            loadsuppliers(){

              // if(this.$gate.isAdmin()){
                axios.get("api/suppliers").then(({ data }) => (this.suppliers.data = data));
              // }

            },

             loadsuppliers2(){

              // if(this.$gate.isAdmin()){
                // axios.get("api/dashboard3").then(({ data }) => (this.suppliers = data));
              // }

              axios.get("api/suppliers").then(({ data }) => {
                let cus = []

                for (let i = 0; i < data.length; i++){ // storing every objects original content to it's new declared object property(data)
                  data[i].data = {
                    name:data[i].name,
                    id:data[i].id,
                    address:data[i].address,
                    phone:data[i].phone,
                    email:data[i].email,
                    city:data[i].city,
                    country:data[i].country,
                    postalCode:data[i].postalCode,


                    };

                  //delete data[i].contactNo;
                  delete data[i].address;
                  delete data[i].id;

                  cus.push(data[i]);
                }

                this.Supplierx = cus;

              });
            },

            editModal(suppliers){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(suppliers);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createSupplier(){

                this.$Progress.start();
                 console.log(this.form);

                this.form.post('api/suppliers')
                .then((data)=>{
                  if(data){
                    $('#addNew').modal('hide');
                    console.log(data);

                    Toast.fire({
                          icon: 'success',
                          title: 'fornecedores salvo com sucesso!'
                      });

                    this.$Progress.finish();
                    this.loadsuppliers();


                  } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocorreu algum erro! Por favor, tente novamente....'
                    });

                    this.$Progress.failed();
                  }
                })
                .catch(()=>{

                    Toast.fire({
                        icon: 'error',
                        title: 'Ocorreu algum erro! Por favor, tente novamente....'
                    });
                })
            },
            updateSupplier(){
                const vm = this;
                this.$Progress.start();
                this.form.put('api/suppliers/' + vm.form.id)
                .then((response) => {
                    // success

                    $('#addNew').modal('hide');
                    Toast.fire({
                      icon: 'success',
                      title: response.data.message
                    });
                    this.$Progress.finish();
                        //  Fire.$emit('AfterCreate');

                    this.loadsuppliers();
                })
                .catch(() => {
                    this.$Progress.fail();
                });

            },
            deleteSupplier(id){
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Você não poderá reverter isso!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        // Send request to the server
                          if (result.value) {
                                this.form.delete('api/suppliers/'+id).then(()=>{
                                        Swal.fire(
                                       'Excluído!',
                                        'Seu arquivo foi excluído.',
                                        'sucesso'
                                        );
                                    // Fire.$emit('AfterCreate');
                                    this.loadsuppliers();
                                }).catch((data)=> {
                                    Swal.fire("Failed!", data.message, "warning");
                                });
                          }
                    })
            },

            highlightMatches(text) {
              const matchExists = text.toString().includes(this.search);
              if (!matchExists) return text;

              const re = new RegExp(this.search, 'ig');
              return text.toString().replace(re, matchedText => `<strong>${matchedText}</strong>`);
            },

          },

          created() {

              this.$Progress.start();
              this.loadsuppliers();
              this.$Progress.finish();
          },
          filters: {
              truncate: function (text, length, suffix) {
                  return text.substring(0, length) + suffix;
              },

          },
          computed: {

             filteredRows2() {
               const vm = this;
              return vm.suppliers.data.filter(suppliers => {
                const id = suppliers.id.toString().toLowerCase();
                const name = suppliers.name.toLowerCase();
                const contactNo = suppliers.phone.toString().toLowerCase();
                const address = suppliers.address.toLowerCase();

                 const search = this.search.toLowerCase();

                    return id.includes(search) || name.includes(search) || contactNo.includes(search) || address.includes(search);

              });
            },

          }

      }
  </script>
  <style scoped>
  .content {
    font-family: Arial, Helvetica, sans-serif;
  }

  #addbutton{
    width:100%;
    /* margin-right:7px; */
  }
  .optionBtn:hover{
    cursor: pointer;
  }
  tr:hover{
    background-color: #eee;
    cursor: pointer;
  }
  .exports{
    width:100%;
  }
  </style>
