<!-- Button trigger modal -->

  
  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <div wire:ignore.self class="modal fade" id="editBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Details</h1>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>Loading...
        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent='updateBrands()'>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="md-3">
                        <label for="">Name</label>
                        <input type="text" wire:model.defer='name' class="form-control border border-dark">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="md-6">
                        <label for="">Card No</label>
                        <input type="text" wire:model.defer='slug' class="form-control border border-dark">
                        
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="md-3">
                    <label for="">CVC</label>
                    <input type="number" name="cvc" id="" class="form-control border border-dark">
                </div>
            </div>
            <div class="col-md-6">
                <div class="md-3">
                <label for="">Exp Month</label>
                <input type="number" name="exp-month" id="" class="form-control border border-dark">
            </div>
        </div>
        <div class="col-md-12">
            <div class="md-3">
            <label for="">Exp Year</label>
            <input type="number" name="exp-year" id="" class="form-control border border-dark">
        </div>
    </div>
    <div class="col-md-12">
        <div class="modal-footer">
            <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Pay</button>
          </div>
    </div>
    </div>
    </form>
  </div>
      </div>
    </div>
  </div> --}}




  {{-- <div wire:ignore.self class="modal fade" id="PayOnlineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Details</h1>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>Loading...
        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent='StripePayment()'>
        <div class="modal-body">
         <div class="row">
            <div class="col-md-6">
                <div class="md-3">
                    <label for="">Name</label>
                    <input type="text" wire:model.defer='fullname' class="form-control border border-dark">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="md-6">
                    <label for="">Card No</label>
                    <input type="text" wire:model.defer='card_no' class="form-control border border-dark">
                    
                  </div>
            </div>
            <div class="col-md-6">
                <div class="md-3">
                <label for="">CVC</label>
                <input type="password" wire:model.defer='cvc' class="form-control border border-dark">
            </div>
        </div>
        <div class="col-md-6">
            <div class="md-3">
            <label for="">Exp Month</label>
            <input type="date" wire:model.defer="exp_month"  class="form-control border border-dark">
        </div>
    </div>
    <div class="col-md-12">
        <div class="md-3">
        <label for="">Exp Year</label>
        <input type="date" wire:model.defer="exp_year"  class="form-control border border-dark">
    </div>
</div>
        </div>
    </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          <button type="submit" class="btn btn-primary">Pay </button>
        </div>
    </form>
  </div>
      </div>
    </div>
  </div> --}}






<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">Rs: {{$totalProductAmount}}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" wire:model.defer="fullname" class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <span class="text-danger">*</span>
                                    <input type="number" wire:model.defer="phone" class="form-control" placeholder="Enter Phone Number" />
                                    @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <span class="text-danger">*</span>
                                    <input type="email" wire:model.defer="email" class="form-control" placeholder="Enter Email Address" />
                                    @error('fullname') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <span class="text-danger">*</span>
                                    <input type="number" wire:model.defer="pincode" class="form-control" placeholder="Enter Pin-code" />
                                    @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <span class="text-danger">*</span>
                                    <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                    @error('address') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                            <button wire:loading.attr="disabled" class="nav-link  fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order (Cash on Delivery)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Placeing Order
                                                    </span>

                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                {{-- <hr/>
                                                <a href="{{url('/stripe-payment')}}" wire:loading.attr="disabled" type="button" class="btn btn-warning" >Pay Now (Online Payment) 
                                                </a> --}}
                                                <form action="{{route('stripe.payment')}}" method="POST">
                                                  @csrf
                                                  <script
                                                    src="https://checkout.stripe.com/checkout.js"
                                                    class="stripe-button"
                                                    data-key="pk_test_51MbfijI8Zzyeo1Zf6uJ3pzAm8lYvif6NS2VdYz1AY3nyqtPMxua5lZrdhLjSsjXuDuwI4QK7ybaBDA3qqv7JnlcZ00Fcm7c83w"
                                                    data-name="Custom t-shirt"
                                                    data-description="Your custom designed t-shirt"
                                                    data-amount="{{"$totalProductAmount"}}"
                                                    data-currency="usd"
                                                    data-id={{auth()->user()->id}}>
                                                  </script>
                                                </form>
                                                
                                                {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#editBrandsModal" class="btn btn-primary btn-sm">Edit</a> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
           </div>
            @else
            <div class="card card-body shadow text-center p-md-5">
                <h4>No Items in Cart to Checkout</h4>
                <a href="{{url('/collections')}}" class="btn btn-warning">Shop Now</a>
            </div>
            @endif
        </div>
    </div>

</div>
@push('script')
    <script>
        window.addEventListener('close-modal',event =>{
          
            $('#PayOnlineModal').modal('hide')
          
        });
    </script>
@endpush