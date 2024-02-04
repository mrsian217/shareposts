@extends('layouts.app')

@section('content')
    <div class="sm:flex sm:flex-row sm:gap-10">
        <div class="sm:w-1/2 mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
                @if (isset($profire))
                    <div class="ml-24 mt-6">
                        <p class="text-sm mb-2">profile:</p>
                        <div class="border border-gray-300 p-4 w-60 h-32">
                            <p class="text-sm">{{ $profire->content }}</p>
                            <a class="btn btn-secondary mt-4" href="{{ route('profires.edit', ['profire' => $profire->id]) }}">update</a>
                        <div>
                    </div>
                    
                    @else
                        <form action="{{ route('profires.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
                            @csrf
                            <div class="form-control my-4 ml-24 flex-grow">
                                <label for="content" class="label">
                                     <span class="label-text">profire:</span>
                                </label>
                                <input type="text" name="content" class="input input-bordered w-64 h-36">
                            </div>
                            <button type="submit" class="btn btn-primary ml-72 mt-2 w-16">post</button>
                        </form>
                         @if (isset($newProfire)) <!-- 追加: 新しく作成されたプロフィールがあれば -->
        　　　　　　　　　　  　　　　　　<div class="ml-24 mt-6">
                          　　　　<p class="text-sm mb-2">profile:</p>
            　　　　　　　　　　　　　　　　<div class="border border-gray-300 p-4 w-60 h-32">
               　　　　　　　　　　　　　　　　　　 <p class="text-sm">{{ $newProfire->content }}</p>
                                   <a class="btn btn-secondary mt-4" href="{{ route('profires.edit', ['profire' => $newProfire->id]) }}">update</a>
                                </div>
                            </div>
                        @endif
                    @endif
        </div>
        <div class="sm:w-1/2 mt-4">
        {{-- 投稿一覧 --}}
            @include('shareposts.shareposts')
        </div>
    </div>
@endsection