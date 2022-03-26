<div class="container-fluid">
    <div class="d-flex">
        <a href="/checkout" class="btn btn-primary ml-auto mb-2">Riwayat Transaksi</a>
    </div>
    <div class="row">
        <div class="col-5 pr-2">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="my-auto">List Produk</h5>
                        <a class="btn btn-primary ml-auto" href="/products">Master Produk</a>
                    </div>
                    <hr>
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jumlah Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                <td class="text-right">{{ number_format($product->price) }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <input class="form-control" type="number" min="0" max="{{ $product->quantity + (isset($tempCart[$product->id]) && $tempCart[$product->id] ? $tempCart[$product->id] : 0) }}" wire:model="tempCart.{{ $product->id }}" wire:change="saveCart({{ $product }})">
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-7 pl-1">
            <div class="card">
                <div class="card-body">
                    <h5>Keranjang</h5>
                    <hr>
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $car)
                                <tr>
                                    <td>{{ $car->product->name }}</td>
                                    <td>{{ $car->quantity }}</td>
                                    <td class="text-right">{{ number_format($car->price) }}</td>
                                    <td class="text-right">{{ number_format($car->quantity * $car->price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="h4 text-right" colspan="3">Total Pesanan :</th>
                                <th class="h4 text-right">{{ number_format($total) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <form wire:submit.prevent="checkout">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 m-auto">Nama Pembeli</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="customerName">
                                        @error('customerName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 m-auto">Pembayaran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="payment">
                                        @error('payment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-right">
                            Kembalian : {{ $payment >= $total ? number_format($change) : 'Pembayaran Kurang' }}
                        </h4>
                        <hr>
                        <div class="d-flex">
                            <button class="btn btn-success ml-auto" type="submit">Cetak Transaksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>