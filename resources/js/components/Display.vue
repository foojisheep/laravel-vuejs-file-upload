<template>
  <div class="container mt-5">
      <div class="row">
          <div class="col-8 form-section">
              <h4 class="mb-3">List of  Products</h4>
              <table class="table">
                  <caption>
                      List of Products
                  </caption>
                  <thead>
                      <tr>
                          <th scope="col">Product #</th>
                          <th scope="col">Types</th>
                          <th scope="col">Brand</th>
                          <th scope="col">Model</th>
                          <th scope="col">Capacity</th>
                          <th scope="col">Quantity</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="product in products" :key="product.id">
                          <td>{{ product.id }}</td>
                          <td>{{ product.type }}</td>
                          <td>{{ product.brand }}</td>
                          <td>{{ product.model }}</td>
                          <td>{{ product.capacity }}</td>
                          <td>{{ product.quantity }}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      <paginate
        :page-count="20"
        :page-range="3"
        :margin-pages="2"
        :click-handler="clickCallback"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'pagination'"
        :page-class="'page-item'"
      >
      </paginate>
  </div>
</template>

<script>
  import Paginate from 'vuejs-paginate-next';
  export default {
    components: {
      paginate: Paginate,
    },
    data() {
        return {
          products: {},
        }
    },
    methods: {
        getProduct(){
            axios.get('/list')
              .then((response)=>{
                this.products = response.data.products
              })
        }
    },
    created() {
        this.getProduct()
    }
  }
</script>