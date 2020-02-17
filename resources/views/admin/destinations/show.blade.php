@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
<<<<<<< HEAD
        {{ trans('global.show') }} {{ trans('global.product.title') }}
=======
        {{ trans('global.show') }} {{ trans('global.destination.title') }}
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
<<<<<<< HEAD
                        {{ trans('global.product.fields.name') }}
                    </th>
                    <td>
                        {{ $product->name }}
=======
                        {{ trans('global.destination.fields.title') }}
                    </th>
                    <td>
                        {{ $destination->title }}
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
                    </td>
                </tr>
                <tr>
                    <th>
<<<<<<< HEAD
                        {{ trans('global.product.fields.description') }}
                    </th>
                    <td>
                        {!! $product->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.price') }}
                    </th>
                    <td>
                        ${{ $product->price }}
                    </td>
                </tr>
=======
                        {{ trans('global.destination.fields.description') }}
                    </th>
                    <td>
                        {!! $destination->description !!}
                    </td>
                </tr>
                
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
            </tbody>
        </table>
    </div>
</div>

@endsection