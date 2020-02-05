@extends('layouts.admin')
@section('content')
@can('destination_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.destinations.create") }}">
                {{ trans('global.add') }} {{ trans('global.destination.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.destination.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.destination.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.destination.fields.description') }}
                        </th>
                        <th>
                            {{ trans('global.destination.fields.image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($destinations as $key => $destination)
                        <tr data-entry-id="{{ $destination->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $destination->title ?? '' }}
                            </td>
                            <td>
<<<<<<< HEAD
                                {{ $destination->description ?? '' }}
=======
                                {!! $destination->description !!}
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
                            </td>
                            <td>
                                {{ $destination->thumbnails ?? '' }}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.destinations.show', $destination->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.destinations.edit', $destination->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('product_delete')
                                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
$(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
<<<<<<< HEAD
    url: "{{ route('admin.products.massDestroy') }}",
=======
    url: "{{ route('admin.destinations.massDestroy') }}",
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<<<<<<< HEAD
@can('product_delete')
=======
@can('destination_delete')
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection