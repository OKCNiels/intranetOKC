@extends('admin.admin')
@section('titulo')Dashboard @endsection
@section('content')
     <!-- PAGE-HEADER -->
     <div class="page-header">
        <h1 class="page-title">Empty</h1>
        <div>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Dashboard externo</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-12">
            {{(Auth::check() ? 'si' : 'no')  }}
            {{(!empty(Auth::user()) ? 'si' : 'no')  }}
        </div>
    </div>

@endsection
