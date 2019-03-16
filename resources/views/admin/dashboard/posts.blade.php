@extends('admin.default')

@section('content')
    <div class="row gap-20 pos-r posts-view-group">
        <div class="masonry-sizer col-md-6"></div>
        <div class="w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                <div class='col-12'>
                    <div class="p-30">
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h1>Ultimele propuneri</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-12 col-md-8 offset-md-2 mT-15">
            <div class="row gap-20">
                <button type="button" class="btn cur-p btn-success">Creeaza</button>
            </div>
        </div>
        @foreach($posts as $i => $post)
            <div class="bd bgc-white col-12 col-md-8 offset-md-2 mT-15">
                <div class="row gap-20">
                    <div class='col-12'>
                        <div class="p-30">
                            <div class="row">
                                <div class="col-12 bdB mB-15 post-title-toggle" data-toggle="collapse" data-target="#desc-{{ $i }}">
                                    <h4>{{ $post->title }}</h4>
                                </div>
                                <div id="desc-{{ $i }}" class="col-12 collapse">{{ $post->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 offset-md-2">
                <div class="gap-30 peers">
                    @php
                    $percent = (int)($post->number_approvals * 100 / 150)
                    @endphp
                    <div class="peer {{ $i % 2 === 0 ? 'approve' : 'approved' }}" style="font-size: 30px"><i class="fas fa-check-circle"></i></div>
                    <div class="peer" style="margin-top: -15px; width: 200px">
                        <div class="layer w-100 mT-15">
                            <small class="fw-600 c-grey-700">Rata aprobare</small>
                            <span class="pull-right c-grey-600 fsz-sm">{{$percent}}%</span>
                            <div class="progress mT-10">
                                <div class="progress-bar-animated progress-bar {{ $percent > 50 ? '' : 'bgc-red-400'}}" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="150" style="width:{{$percent}}%">
                                    <span class="sr-only">{{ $percent }}% Complete</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
