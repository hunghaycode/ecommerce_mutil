@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Shipping Role</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Shipping Role</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.shipping-role.update',$shipping->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $shipping->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Type</label>
                                            <select id="inputState" class="form-control shipping-type select2"
                                                name="type">
                                                <option {{ $shipping->type == 'flat_cost' ? 'selected' : '' }}
                                                    value="flat_cost">Flat Cost</option>
                                                <option {{ $shipping->type == 'min_cost' ? 'selected' : '' }} value="min_cost">
                                                    Minimum Order Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div
                                            class="form-group min_cost {{ $shipping->type == 'min_cost' ? '' : 'd-none' }}">
                                            <label>Minimum Amount</label>
                                            <input type="text" class="form-control" name="min_cost"
                                                value="{{ $shipping->min_cost }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="cost" value="{{ $shipping->cost }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $shipping->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $shipping->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submmit" class="btn btn-primary">Create</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.shipping-type', function() {
                let value = $(this).val();
                if (value != 'min_cost') {
                    $('.min_cost').addClass('d-none');
                } else {
                    $('.min_cost').removeClass('d-none');

                }

            })
        })
    </script>
@endpush
