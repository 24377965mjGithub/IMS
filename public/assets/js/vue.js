let vueComponent = new Vue({
    el: '#cartProducts',
    /* html */
    template:  `
        <div>
            <div class="m-3">
                <label for="">Select Customer</label>
                <select class="form-control" v-model="customerData.selectCustomer">
                    <option v-for="(customer, index) in customerData.customerAndType" :value="customer.customerAndTypeId" :key="index">
                        {{ customer.customerAndTypeName }}
                        ({{ customer.customerAndTypeCustomerType }})
                        <b v-if="customer.customerAndTypeIsDiscounted">Discounted by: {{ customer.customerAndTypeDiscountPercentage }}%</b>
                    </option>
                </select>
            </div>
            <p class="alert alert-success m-3" v-if="isSaleRecorded"><strong>Product out has been recorded!</strong></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Bar Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Selling Price</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody class="cart-items" id="vueCartComponent">
                    <tr v-for="(item, index) in allProducts" v-bind:key="item.id">

                        <td><img v-bind:src="'assets/images/uploads/'+ item.image" alt=""></td>
                        <td>{{ item.barCode }}</td>
                        <td>{{ item.name }}</td>
                        <td>₱ {{ item.sellingPrice }}</td>
                        <td>₱ {{ item.cost }}</td>
                        <td>{{ item.unit }}</td>
                        <td>
                            <input type="number" class="form-control quantity" v-model="quantity[index]" v-on:keyup="getTotalPrice" placeholder="Quantity..." />
                        </td>
                        <td><b>P  {{ ((isNaN(item.sellingPrice * quantity[index])) ? 0 : (item.sellingPrice * quantity[index]).toLocaleString())  }}</b></td>
                        <td><button class="btn btn-danger" @click="deleteItemFromCart(item.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
            <h1 style="font-weight: bold" class="m-2"><span class="text-muted">Total Payment:</span> ₱ {{ total }}</h1>
            <h4 class="m-2">Discount: <span class="text-success">{{ discounts.discount }}</span></h4>
            <h4 class="m-2">Save: <span class="text-success">{{ discounts.save }}</span></h4>
            <h4 class="m-2">Discounted Price: <span class="text-success">{{ discounts.discountedPrice }}</span></h4>

            <p class="alert alert-warning m-3" v-if="errors.noProduct"><strong>No product selected.</strong> Please select a product before proceeding to checkout.</p>
            <p class="alert alert-warning m-3" v-if="errors.noCustomer"><strong>No customer selected.</strong> Please select a customer before proceeding to checkout.</p>

            <button class="btn btn-success m-2" @click="checkout" v-if="!buttonStates.isCheckedOut">Proceed to checkout</button>
            <button class="btn btn-success m-2" v-if="buttonStates.isCheckedOut">
                Please Wait
                <div class="spinner-border" role="status" style="height: 20px; width: 20px">
                </div>
            </button>
        </div>
    `,
    // html
    data: {
            localStorageCart: JSON.parse(localStorage.getItem('inventory_management_system_cart')),
            // product selected by the staff
            allProducts: [],
            // quantity from v-model quantity[index]
            quantity: [],
            // array of prices
            sellingPriceArray: [],
            // total price computer
            totalPrice: [],
            // total price output
            total: 0,
            // product id and quantity
            productIdAndQuantity: [],
            // customers data
            customerData: {
                // select customer dropdown
                selectCustomer: null,
                // customers array
                customers: [],
                // customers types arrat
                customerTypes: [],
                // loopable customer and types
                customerAndType: []
            },
            buttonStates: {
                isCheckedOut: false
            },
            errors: {
                noCustomer: false,
                noProduct: false
            },
            isSaleRecorded: false,
            // discount
            discounts: {
                discount: 0,
                save: 0,
                discountedPrice: 0
            }
    },
    methods: {
        getCustomers() {
            axios.get('/api/customers').then(res => {
                this.customerData.customers = res.data.customers;
                this.customerData.customerTypes = res.data.customerTypes;
                res.data.customers.forEach(customer => {
                    res.data.customerTypes.forEach(customerType => {
                        if (customer.customersType === customerType.id) {
                            // loopable
                            this.customerData.customerAndType.push({
                                customerAndTypeId: customer.id,
                                customerAndTypeName: customer.customersName,
                                customerAndTypeCustomerType: customerType.customersType,
                                customerAndTypeIsDiscounted: customerType.isDiscounted,
                                customerAndTypeDiscountPercentage: customerType.discountPercentage
                            })
                        }
                    });
                });

                console.log(this.customerData.customerAndType);
            })
        },
        getProducts() {
            axios.get('/api/cart').then(res => {
                // console.log(res.data)
                res.data.forEach(element1 => {
                    // console.log(element1.id)
                    this.localStorageCart.forEach(element2 => {
                        // console.log(parseInt(element2))
                        if (element1.id == parseInt(element2)) {
                            let productObj = {
                                id: element1.id,
                                image: element1.productImage,
                                name: element1.productName,
                                barCode: element1.productBarCode,
                                sellingPrice: element1.productPrice,
                                cost: element1.productCost,
                                unit: element1.productUnit,
                                categoryId: element1.productCategoryId,
                                supplierId: element1.suppliersId,
                            };
                            this.allProducts.push(productObj)
                            this.sellingPriceArray.push(productObj.sellingPrice);
                        }
                    });
                });
            })

            console.log(this.allProducts);
        },

        getTotalPrice() {
            this.totalPrice = []
            console.log("Per Quantity: " + this.quantity);

            console.log("Price Per Quantity: " + this.sellingPriceArray);
            for(let i = 0; i < this.quantity.length; i++){
                if (this.quantity[i] === undefined) {
                    this.totalPrice.push(0 * this.sellingPriceArray[i]);
                } else {
                    this.totalPrice.push(this.quantity[i] * this.sellingPriceArray[i]);
                }
            }

            console.log("Total Price: " + this.totalPrice) // [5,8,9,8,5]


            setInterval(() => {
                let totalInIntFormat = this.sumArray(this.totalPrice);
                this.total = this.sumArray(this.totalPrice).toLocaleString();

                this.customerData.customerAndType.forEach(element => {
                    if(element.customerAndTypeId == this.customerData.selectCustomer){
                        if (element.customerAndTypeDiscountPercentage != 0) {

                            let save = totalInIntFormat * parseFloat("." + element.customerAndTypeDiscountPercentage)

                            // discount
                            this.discounts.discount = element.customerAndTypeDiscountPercentage + "%";
                            this.discounts.save = "₱ " + (save).toLocaleString();
                            this.discounts.discountedPrice = "₱ " + (totalInIntFormat - save).toLocaleString();

                            this.total = this.sumArray(this.totalPrice).toLocaleString();
                        } else {
                            this.discounts.discount = "0%";
                            this.discounts.save = "₱ 0.00";
                            this.discounts.discountedPrice = "₱ " + this.total;
                        }
                    }
                });
            }, 500);

        },

        deleteItemFromCart(id) {
            let index = this.localStorageCart.findIndex(i => i == id);
            if (index != -1) {
                this.localStorageCart.splice(index, 1);
                localStorage.setItem('inventory_management_system_cart', JSON.stringify(this.localStorageCart));
                this.quantity = []
                this.sellingPriceArray = []
                this.allProducts = [];
                this.total = 0
                this.getProducts();
            }
        },
        sumArray(array) {
            const ourArray = array
            let sum = 0;

            for (let i = 0; i < ourArray.length; i += 1) {
              sum += ourArray[i];
            }

            return sum;
          },
          checkout() {
            console.log(this.localStorageCart);
            console.log(this.customerData.selectCustomer);

            if (this.customerData.selectCustomer == null) {
                this.buttonStates.isCheckedOut = false;
                this.errors.noCustomer = true;
            } else if (this.localStorageCart.length == 0){
                this.errors.noProduct = true;
            } else  {
                this.errors.noCustomer = false;
                this.buttonStates.isCheckedOut = true;


                for(let i = 0; i < this.quantity.length; i++){
                    if (this.quantity[i] === undefined) {
                        this.productIdAndQuantity.push({
                            productId: this.localStorageCart[i],
                            quantity: 0
                        })
                    } else {
                        this.productIdAndQuantity.push({
                            productId: this.localStorageCart[i],
                            quantity: parseInt(this.quantity[i])
                        })
                    }
                }

                axios.post('/api/checkout', {
                    products: this.productIdAndQuantity,
                    customer: this.customerData.selectCustomer
                }).then(res => {
                    $('.cartCount').html(0);
                    this.buttonStates.isCheckedOut = false;
                    this.isSaleRecorded = true;
                    this.allProducts = [];
                    this.total = 0;
                    this.discounts.discount = "0%";
                    this.discounts.save = "₱ 0.00";
                    this.discounts.discountedPrice = "₱ 0.00";
                    this.localStorageCart = [];
                    localStorage.setItem('inventory_management_system_cart', JSON.stringify(this.localStorageCart));
                    console.log(res);
                }).catch(err => {
                    console.log(err);
                })
            }

          }
    },

    mounted(){
        axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie').then((res) =>{
            console.log(res);
        })
        this.getCustomers();
        this.getProducts();
        console.log("Hello");
    }
  })
