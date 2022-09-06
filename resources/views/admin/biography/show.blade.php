@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.role.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.role.fields.title') }}
                    </th>
                    <td>
                        {{ $article->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Categories
                    </th>
                    <td>
                        @foreach($article->categories as $id => $categories)
                            <span class="label label-info label-many">{{ $categories->category_name }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection