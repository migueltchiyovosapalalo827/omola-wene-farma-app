<template>
  <section class="content">
    <div class="container-fluid">
      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar numero de série.</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <div class="modal-body">
              {{form.id}}
              <b-form-group
                label="SKU"
                label-for="sku"
                label-cols-sm="3"
                label-align-sm="right"
              >
                <b-form-select
                  v-model="form.sku"
                  :options="pro"
                  value-field="sku"
                  text-field="sku"
                  required
                ></b-form-select>
              </b-form-group>

              <b-form-group
                label="Numero de serie."
                label-for="name"
                label-cols-sm="3"
                label-align-sm="right"
              >
                <b-form-input
                  id="name"
                  v-model="form.serialnumber"
                  name="name"
                ></b-form-input>
              </b-form-group>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancelar
              </button>
              <button
                type="submit"
                class="btn btn-success"
                @click="submitUpdate()"
              >
                Actualizar
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
         <h1 class="display-4">Lista de numero  de série</h1>
          <b-row>
            <b-col>
              <b-form-input
                placeholder="Pesquisar SKU"
                type="text"
                v-model="search"
              ></b-form-input>
            </b-col>
            <b-col>
              <b-form-input
                placeholder="Pesquisar por numero de serie"
                v-model="searchSerial"
              ></b-form-input>
            </b-col>
            <b-col cols="2">
              <b-btn variant="outline-secondary" v-b-modal.filts @click="test()"
                ><b-icon icon="plus"></b-icon> Adicionar Novo Nº</b-btn
              >
            </b-col>
          </b-row>
      </div>

      <b-modal
        id="filts"
        title="Adicionar novo número de série."
        header-bg-variant="secondary"
        size="lg"
        hide-footer
      >
        <b-container>
          <b-row>
            <b-col cols="5">
              <label class="text-muted">Unidade de manutenção de estoque(SKU)</label>
              <b-form-select
                v-model="selected"
                :options="pro"
                value-field="data"
                text-field="sku"
                required
              ></b-form-select>
            </b-col>
            <b-col>
              <label class="text-muted">Número de série</label>
              <b-form-input
                v-model="serialnum"
                placeholder="Digite o numero de Série."
                required
              ></b-form-input>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col cols="8">
              <b-row>
                <b-col style="text-align: center">
                  <br />
                  <h3 style="letter-spacing: 2px">{{ selected.stock }}</h3>
                  <h3 v-if="selected.stock == null" style="letter-spacing: 2px">
                    0
                  </h3>
                  <small>Total Items</small>
                </b-col>
                <b-col cols="1" style="text-align: center">
                  <br />
                  <h3>=</h3>
                </b-col>
                <b-col style="text-align: center">
                  <br />
                  <h3
                    v-if="selected.stock == null"
                    style="letter-spacing: 2px; color: red"
                  >
                    0
                  </h3>
                  <h3 v-else style="letter-spacing: 2px; color: red">
                    {{ selected.stock - z }}
                  </h3>
                  <small>Items Without Serial No.</small>
                </b-col>
                <b-col cols="1" style="text-align: center">
                  <br />
                  <h3>+</h3>
                </b-col>
                <b-col style="text-align: center">
                  <br />
                  <h3 style="letter-spacing: 2px; color: green">{{ z }}</h3>
                  <small>Items With Serial No.</small>
                </b-col>
              </b-row>
            </b-col>
            <b-col>
              <br />
              <br />
              <b-btn @click="createSerialnum()" style="width: 100%; height: 50%"
                >Save</b-btn
              >


            </b-col>
          </b-row>
        </b-container>
      </b-modal>

      <b-alert
        v-model="showyellow"
        class="m-0 rounded-0"
        style="z-index: 2000"
        variant="danger"
        v-if="x - filteredRows.length > 0"
      >
        <h5>{{ x - filteredRows.length }}</h5>
        Items without Serial No.
      </b-alert>
      <br />
      <br />

      <h4 class="text-muted">{{ filteredRows.length }} Items</h4>

      <table class="table">
        <thead>

          <!-- <th>Id</th> -->
          <th>ID do Producto</th>
          <th>Categoria</th>
          <th>Nº</th>

          <th>Criado por</th>
          <th>Criado em</th>


          <th>Opções</th>
        </thead>
        <tbody>
          <tr v-for="(i, index) in filteredRows.slice().reverse()" :key="index">
          <!-- <td>{{i.id}}</td> -->
            <td v-html="highlightMatches(i.ssku)" class="text-muted"></td>
            <td>{{i.name}}</td>
            <td v-html="highlightMatches2(i.serialnumber)"></td>
            <td class="center">{{i.ser_createdBy}}</td>
            <td class="center">{{new Date(i.petsa).toLocaleDateString()}}</td>


            <td v-if="i.orderno == null || ''">
              <span @click="editModal(i)" class="optionBtn">
                <b-icon icon="pencil-square"></b-icon>
              </span>
              |
              <span @click="deleteSerial(i.id)" class="optionBtn">
                <b-icon icon="trash"></b-icon>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>
</template>
<script>
export default {
  data() {
    return {
      currentUser:'',
      selected: {},
      products: {
        data: [],
        message: "",
      },
      pro: [],

      form: {
        id: "",
        sku: "",
        serialnumber: "",
        authoredBy:"",
        ser_createdBy:'',
        ser_updatedBy:'',
        ser_updatedAt:''

      },

      serialnum: "",
      serials: [],
      search: "",
      searchSerial: "",

      showyellow: false,
    };
  },
  methods: {
    test() {
      console.log(this.currentUser);
    },

    editModal(data) {

      $("#addNew").modal("show");
      (this.form.id = data.id), (this.form.sku = data.ssku);
      this.form.serialnumber = data.serialnumber;
    },
    submitUpdate() {
      axios
        .put("api/serialno/" + this.form.id, {
          ssku: this.form.sku,
          serialnumber: this.form.serialnumber,
          authoredBy: this.currentUser,
          ser_updatedAt: new Date(),
          ser_updatedBy: this.currentUser
        })
        .then((res) => {
          console.log(res);
        });
      $("#addNew").modal("hide");
      this.loadserials();
        this.form.id = '';
        this.form.sku = '';
        this.form.serialnumber = '';
      Toast.fire({
        icon: "success",
        title: "actualizado com sucesso!",
      });
    },
    deleteSerial(id) {
      Swal.fire({
        title: "Tens certeza?",
        text: "Você não poderá reverter isso!",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sim, Exclua!",
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          axios
            .delete("api/serialno/" + id)
            .then(() => {
              Swal.fire("Deleted!", "o nosso arquivo foi excluído.", "success");
              this.loadserials();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },

    loadProducts() {
      axios.get("api/product").then(({ data }) => (this.products = data.data));
    },
    loadprod2() {
      axios.get("api/product").then(({ data }) => {
        let x = data.data.data;
        let prod = [];
        for (let i = 0; i < x.length; i++) {
          // storing every objects original content to it's new declared object property(data)
          x[i] = {
            sku: x[i].id,
            name: x[i].name,
            data: {
              sku: x[i].id,
              stock: x[i].stocks,
            },
          };
          delete x[i].stocks;
          delete x[i].id;
          prod.push(x[i]);
        }
        this.pro = prod;
      });
    },

    loadserials() {
      axios.get("api/serialno").then(({ data }) => (this.serials = data));
    },
    createSerialnum() {
      var sers = [];
      var serials = this.serials;

      for (let i = 0; i < serials.length; i++) {
        sers.push(serials[i].serialnumber);
      }
      if (this.selected.sku == null || this.serialnum == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Ambos os campos não devem estar vazios",
        });
      } else if (this.selected.stock == this.z) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Não é possível adicionar este número de série para SKU " + this.selected.sku,
          footer: "Este SKU possui apenas uma quantidade de" + this.selected.stock,
        });
      } else if (sers.includes(this.serialnum)) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Este número de série já está em uso",
          footer:
            '',
        });
      } else {
        // let today = new Date();
        // let dd = String(today.getDate()).padStart(2, "0");
        // let mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
        // let yyyy = today.getFullYear();

        // let hour = today.getHours();
        // let minute = today.getMinutes();
        // let seconds = today.getSeconds();

        // let time = hour + ":" + minute + ":" + seconds;

        // today = mm + "/" + dd + "/" + yyyy  + time;
        let form = {
            sku: this.selected.sku,
            serialno: this.serialnum,
            petsa: new Date(),
            authoredBy: this.currentUser,
            ser_createdBy: this.currentUser,
            ser_updatedAt: new Date()
          };

          console.log('form');
          console.log(form);

        axios
          .post("api/serialno", form)
          .then((data) => {
            this.loadserials();
            this.selected = {};
            this.serialnum = "";

            console.log('data');
            console.log(data);

            if (data.status == 201) {
              $("#addNew").modal("hide");

              Toast.fire({
                icon: "success",
                title: "Nº de série. Adicionado com sucesso!",
              });
            } else {
              Toast.fire({
                icon: "error",
                title: "Ocorreu algum erro! Por favor, tente novamente",
              });
            }
          })
          .catch(() => {
            Toast.fire({
              icon: "error",
              title: "Ocorreu algum erro! Por favor, tente novamente",
            });
          });
      }
    },

    highlightMatches(text) {
      const matchExists = text.toString().includes(this.search);
      if (!matchExists) return text;

      const re = new RegExp(this.search, "ig");
      return text
        .toString()
        .replace(re, (matchedText) => `<strong>${matchedText}</strong>`);
    },
    highlightMatches2(text) {
      const matchExists = text.toString().includes(this.searchSerial);
      if (!matchExists) return text;

      const re = new RegExp(this.searchSerial, "ig");
      return text
        .toString()
        .replace(re, (matchedText) => `<strong>${matchedText}</strong>`);
    },
  },
  created() {
    this.loadProducts();
    this.loadprod2();
    this.loadserials();
    axios.get("api/profile")
            .then(({ data }) => (this.currentUser = data.data.name));
  },
  computed: {
    WarrantyExpDate() {
      return (orderDate, warranty) => {
        let araw = new Date(orderDate);

        if (orderDate === null) {
          return 0;
        } else {
          let bago = araw.setDate(araw.getDate() + warranty);
          let naman = new Date(bago).toLocaleDateString("en-US", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric",
          });
          let ngayon = new Date();
          let naman2 = new Date(naman);

          var difference = naman2.getTime() - ngayon.getTime();
          var natirangAraw = Math.ceil(difference / (1000 * 3600 * 24));
          return natirangAraw;
        }
      };
    },
    addDays() {
      let days = 30;
      let today = new Date();
      return today.setDate(today.getDate() + days);
    },
    prodId() {
      var c = [];
      let b = this.products.data;
      for (let i = 0; i < b.length; i++) {
        c.push({
          sku: b[i].id,
          stock: b[i].stocks,
        });
      }
      return c;
    },

    filteredRows() {
      const vm = this;
      return vm.serials.filter((ser) => {
        const sku = ser.ssku.toString().toLowerCase();
        const serialnum = ser.serialnumber.toLowerCase();

        const search = this.search.toLowerCase();
        const searchSerial = this.searchSerial.toLowerCase();

        return sku.includes(search) && serialnum.includes(searchSerial);
      });
    },

    x() {
      var b = this.pro;
      let stox = null;
      for (let i = 0; i < b.length; i++) {
        if (b[i].data.sku == this.search) {
          stox = b[i].data.stock;
        }
      }
      if (this.search == "") {
        this.showyellow = false;
        return false;
      } else if (
        (this.filteredRows.length < stox, (this.form.sku = this.search))
      ) {
        this.showyellow = true;
        return stox;
      }
    },

    z() {
      let skuList = [];
      var sers = this.serials;

      for (let i = 0; i < sers.length; i++) {
        skuList.push(sers[i].ssku);
      }
      return skuList.filter((v) => v === this.selected.sku).length;
    },
  },
};
</script>
<style scoped>
.content {
  font-family: Arial, Helvetica, sans-serif;
}

tr:hover {
  background-color: #eee;
  cursor: pointer;
}
#tdWarranty {
  text-align: center;
}
.center {
  text-align: center;
}
.table {
  font-family:Arial, Helvetica, sans-serif;
  font-size: 13px;
}
</style>
