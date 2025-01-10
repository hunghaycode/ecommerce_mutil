<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.paypal-setting.update',1) }}" method="POST">
                @csrf
                @method('PUT')
           
                <div class="form-group">
                    <label for="">Paypal status</label>
                    <select id="inputState" class="form-control" name="status"
                        value="">
                        <option {{$paypalSetting->status == 1 ? 'selected':''}} value="1">Enable</option>
                        <option {{$paypalSetting->status == 0 ? 'selected':''}} value="0">Disable</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Account Mode</label>
                    <select id="inputState" class="form-control" name="mode"
                        value="">
                        <option {{$paypalSetting->mode == 0 ? 'selected':''}} value="0">Sanbox</option>
                        <option {{$paypalSetting->mode == 1 ? 'selected':''}} value="1">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Country Name</label>
                    <select id="inputState" class="form-control select2" name="country_name"
                        value="">
                        <option value="">Select</option>
                        @foreach (config('settings.country_list') as $country)
                            <option {{$country == $paypalSetting->country_name ? 'selected': ""}} value="{{ $country }}">{{ $country }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="">Currency</label>
                    <select id="inputState" class="form-control select2" name="currency_name"
                        value="{{ old('time_zone') }}">
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $key => $currency)
                            <option {{$currency == $paypalSetting->currency_name ? 'selected': ""}} value="{{ $currency }}">{{ $key }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Currency rate ( Per )</label>
                    <input type="text" class="form-control" name="currency_rate" value="{{$paypalSetting->currency_rate}}">
                </div>

                <div class="form-group">
                    <label for="">Client Id</label>
                    <input type="text" class="form-control" name="client_id" value="{{$paypalSetting->client_id}}"
                        id="">
                </div>
                <div class="form-group">
                    <label for="">Secret key</label>
                    <input type="text" class="form-control" name="secret_key" value="{{$paypalSetting->secret_key}}"
                        id="">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
