<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('Parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($My_Parents as $my_parent)
            <tr>
             <td>{{ $i }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->name_father_ar }}</td>
                <td>{{ $my_parent->national_id_father }}</td>
                <td>{{ $my_parent->passport_id_father }}</td>
                <td>{{ $my_parent->phone_father }}</td>
                <td>{{ $my_parent->job_father_ar }}</td>
                <td>
                     <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Parent_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $my_parent->id}}"
                            title="{{ trans('Parent_trans.Delete') }}"><i
                                class="fa fa-trash"></i></button>

                    {{-- <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Parent_trans.Delete') }}"><i class="fa fa-trash"></i></button> --}}
                </td>
            </tr>


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{$my_parent->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Parent_trans.delete_parent') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post">
                                                {{ method_field('HEAD') }}
                                                @csrf
                                                {{ trans('Parent_trans.Warning_Grade') }}

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Parent_trans.Close') }}</button>

                                                    <button wire:click="delete({{ $my_parent->id }})"  type="submit"
                                                        class="btn btn-danger">{{ trans('Parent_trans.Delete') }}</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


        @endforeach
    </table>
</div>
