@extends('admin.default')

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item  w-100">
            <div class="row gap-20 bd bgc-white">
                <!-- #Toatl Visits ==================== -->
                <div class='col-12 p-30'>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>{{ $user->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-20">
                    <h3 class="c-grey-900">{{ __('basic.basic_info_title') }}</h3>
                    <div class="mT-30">
                        <form>
                            <div class="form-group">
                                <span>{{ __('basic.label.name') }}</span>
                                <h6 class="c-grey-900">{{ $user->name }}</h6>
                            </div>
                            <div class="form-group">
                                <span>{{ __('basic.label.phone') }}</span>
                                <h6 class="c-grey-900">{{ $user->mobile_phone }}</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <span>{{ __('basic.label.cnp') }}</span>
                                    <h6 class="c-grey-900">{{ $user->cnp }}</h6>
                                </div>
                                <div class="form-group col-6" style="font-size: 32px">
                                    @if($user->gender === 1)
                                        <i class="fas fa-mars"></i>
                                    @else
                                        <i class="fas fa-venus"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <span>{{ __('basic.label.email_address') }}</span>
                                <h6 class="c-grey-900">{{ $user->email }}</h6>
                            </div>
                            <div class="form-group">
                                <div class="w-100 mT-15">
                                    <h5 class="mB-5">{{ $user->capital_parts }}</h5>
                                    <small class="fw-600 c-grey-700">{{ __('basic.label.capital_parts') }}</small>
                                    @php
                                    $socialPercent = (int)($user->capital_parts * 100/ 21)
                                    @endphp
                                    <span class="pull-right c-grey-600 fsz-sm">{{ sprintf('%d%%', $socialPercent) }} ({{ $user->capital_parts }} / 21)</span>
                                    <div class="progress mT-10">
                                        <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{ $socialPercent }}%;"> <span class="sr-only">40% Complete</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-20">
                    <h3 class="c-grey-900">{{ __('basic.edit_form_title') }}</h3>
                    <div class="mT-30">
                        <form action="{{ route('admin.dash') }}/users/{{ $user->id }}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('basic.label.name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $user->name }}"
                                       aria-describedby="emailHelp" placeholder="{{ __('basic.placeholder.name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone1">{{ __('basic.label.phone') }}</label>
                                <input type="text" class="form-control" id="exampleInputPhone1" name="mobile_phone" value="{{ $user->mobile_phone }}"
                                       placeholder="0761824993">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCNP1">{{ __('basic.label.cnp') }}</label>
                                <input type="text" class="form-control" id="exampleInputCNP1" name="cnp" value="{{ $user->cnp }}"
                                       placeholder="1910110223365">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('basic.label.email_address') }}</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $user->email }}"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">
                                    {{ __('basic.label.email_sublabel') }}
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ __('basic.label.password') }}</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                       placeholder="{{ __('basic.label.password') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('basic.label.save_account') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
