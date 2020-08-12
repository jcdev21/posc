<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<script src="<?= base_url().'assets/vuejs/vue.min.js'; ?>" ></script>
<script src="https://unpkg.com/vue-select@latest"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
<style>
    #basketList {
        max-height: 200px;
        overflow: auto;
    }
    .delList{
        color: red;
        cursor: pointer;
    }
</style>
<!-- Custom styles for this page -->
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div id="myapp">
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
        <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAddCategory">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Category
        </button> -->
    </div>

    <?php echo $this->session->flashdata('message');?>
    
    <div class="row">
        <div class="col-sm-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Buat Berita Baru</h6> -->
                </div>
                <div id="cardBody" class="card-body">
                    <div class="col-sm-12">
                        <!-- <div class="form-group">
                            <label for="select-product">Product</label>
                            <select id="select-product" name="product" placeholder="Choise product..." >
                                <option value="">Choise product</option>
                                <?php foreach ($products as  $product) { ?>
                                    <option value="<?= $product->id; ?>"><?= $product->name; ?></option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="">Product</label>
                            <v-select :options="options" v-model="product" placeholder="Choise product..."></v-select>
                        </div>
                        <div class="form-group">
                            <label for="qtyId">Qty</label>
                            <input v-model="qty" type="number" name="qty" id="qtyId" class="form-control">
                        </div>
                        <div style="text-align: center;">
                            <button @click='addTransaction();' id="btnSave" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="datas.length > 0" id="basket" class="col-sm-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="float-right">
                        <button @click='saveTransaction();' class="btn btn-success" >Finish</button>
                    </div>
                </div>
                <div class="card-body" id="basketList">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data, index) in datas" >
                                    <td>{{ index+1 }}.</td>
                                    <td>{{ data.name }}</td>
                                    <td>{{ data.qty }}</td>
                                    <td>{{ currencyIdr((data.qty*data.price)) }}</td>
                                    <td>
                                        <button @click='deleteTransaction(index);' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <table>
                        <tr>
                            <td>Total</td>
                            <td class="pl-4">{{ total && currencyIdr(total) }}</td>
                        </tr>
                        <tr>
                            <td>Dibayar</td>
                            <td class="pl-4"><input v-model="dibayar" type="text" id="dibayar" class="form-control" placeholder="Rp 0"></td>
                        </tr>
                        <tr>
                            <td>Kembalian</td>
                            <td class="pl-4" v-if="dibayar !== null">{{ currencyIdr(dibayar - total) }}</td>
                            <td class="pl-4" v-else>Rp 0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->

<script>
    const productsPHP = '<?php echo json_encode($products); ?>';
    const products = JSON.parse(productsPHP);

    Vue.component('v-select', VueSelect.VueSelect);

    var app = new Vue({
        el: '#myapp',
        data: {
            product: "",
            qty: 1,
            datas: [],
            total: 0,
            dibayar: null,
            options: products.map(prod => {
                return prod.name;
            }),
        },
        methods: {
            addTransaction: function () {
                const filterProduct = products.filter(prod => {
                    if (prod.name === this.product) {
                        this.total += (prod.price * this.qty);

                        return prod;
                    }
                });
                filterProduct[0]['qty'] = this.qty;

                this.datas.push(filterProduct[0]);
                
                this.product= '';
                this.qty= 1;
            },
            deleteTransaction: function (pID) {
                const filter = this.datas.filter((prod, i) => {
                    if (i === pID) {
                        this.total -= (prod.price * prod.qty);
                    }

                    return i != pID;
                });

                this.datas = filter;
            },
            saveTransaction: async function () {

                if (this.datas.length > 0) {
                    const formData = new FormData();
                    formData.append('total', this.total);
                    formData.append('data_transaction', JSON.stringify(this.datas));

                    const res = await fetch(`${base_url}transaction/create`, {
                        method: 'POST',
                        body: formData,
                    });

                    const result = await res.json();
                    console.log(result);
                    this.datas = [];
                    this.total = 0;
                }
            },
        }
    });

    const currencyIdr = (numb) => {
        let num = 'Rp ' + numb.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        return num;
    }
</script>

<!-- Page level custom scripts -->
<?php $this->load->view('template/footer'); ?>