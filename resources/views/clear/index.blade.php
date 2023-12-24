@extends('layouts.clearDelete')

@section('content')
    <div class="container my-5 py-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <h2 class="fw-bold">走行済みの林道</h2>
                    <span class="ms-5 fs-3 fw-bold pb-2">{{ $clearCount }}件</span>
                </div>
            </div>
            <a href="{{ route('clear.create') }}" class="link-underline link-underline-opacity-0 bg-primary py-2 px-5 rounded-pill text-light fs-6 text-center link_btn">走行済みの林道を追加する</a>
        </div>
        @if (session('flash_message'))
            <p class="my-5 text-primary fs-4">{{ session('flash_message') }}</p>
        @endif
        <div class="my-5">
            <div class="row">
                @foreach ($clears as $clear)
                    <form action="{{ route('clear.destroy', $clear->id) }}" method="post" class="col-2 my-5 delete_form">
                        @csrf
                        @method('DELETE')
                        <div class="clear_rindou">
                            <div class="position-relative d-flex justify-content-center">
                                <?php
                                    $rindouImg = DB::table('rindous')->select('rindou_img')->where('id', $clear->rindou_id)->get();
                                    $rindouName = DB::table('rindous')->select('name')->where('id', $clear->rindou_id)->get();
                                    $rindouPrefecture = DB::table('rindous')->select('prefecture')->where('id', $clear->rindou_id)->get();
                                ?>
                                @if (!empty($rindouImg[0]->rindou_img))
                                    <img src="{{ asset('storage/img/'. $rindouImg[0]->rindou_img) }}" alt="林道の画像" class="stamp_rally clear_rindou_img">
                                @else
                                    <img src="{{ asset('storage/img/no_image.png') }}" alt="No_imageの画像" class="stamp_rally clear_rindou_img">
                                @endif
                                <img src="{{ asset('storage/img/clear_stamp.png') }}" alt="clearスタンプの画像" class="position-absolute bottom-0 end-0 clear_stamp clear_rindou_img">
                            </div>
                            <div class="mt-3 text-center">
                                <span class="d-block fw-bold"><?php echo $rindouName[0]->name; ?></span>
                                <span class="d-block"><?php echo $rindouPrefecture[0]->prefecture; ?></span>
                                <span class="d-block">{{ $clear->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $clears->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
