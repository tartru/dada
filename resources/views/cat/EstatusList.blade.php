@extends('layouts.app')

@push('styles')
    <!-- Datatable Styles -->
    <link href="{{ asset('dx/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatable Style -->

    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->
@endpush


@section('content')

<div class="widget-content br-8">
    <!-- Variables -->
    @php 
    $permisos=[];
    $atras= (array_slice($breadcrumb, -2, 1));
    //var_dump($atras);
    @endphp               
    @can('spme.admin.catalogos.update')
        @php $permisos['update']='admin.estatus.update';@endphp   
    @endcan
    @can('spme.admin.catalogos.delete')
        @php $permisos['delete']='admin.estatus.delete'; @endphp 
    @endcan
    @can('spme.admin.catalogos.create')
        @php $permisos['create']='admin.estatus.create'; @endphp 
    @endcan
    @if(isset($update)||isset($nuevo))
        @include('layouts.FormEdit', [
            'table_data' => $row,
            // type = tipo de campo| tamaño | requerido | valor default
            'headers' => [
                'id'        => ['txt'=>'ID','type'=>'int-4-no-auto'],
                'valor'     => ['txt'=>'Valor','type'=>'int-4-si-0'],
                'nombre'      => ['txt'=>'Nombre','type'=>'varchar-250-no-no'],
                'descripcion'  => ['txt'=>'Descripción','type'=>'varchar-250-si-null'],
                'active'    => ['txt'=>'Activo','type'=>'int-4-si-1'],
                'deleted'   => ['txt'=>'Eliminado','type'=>'int-4-si-0'],
                'created_at' => ['txt'=>'Creado el','type'=>'timestamp-2-no-null'],
                'updated_at' => ['txt'=>'Actualizado el','type'=>'timestamp-2-no-now'],
                'activated_at' => ['txt'=>'Activado el','type'=>'timestamp-2-no-null'],
                'deleted_at' => ['txt'=>'Eliminado el','type'=>'timestamp-2-no-null'],
            ],
            'permissions' => $permisos,
            'title'=>'{{($update) ? $update : $nuevo}}',
            'atras'  => end($atras),
        ])
    @else 
        @include('layouts.tableA', [
            'table_data' => $rows, 
            'table_config' => [
                'headers' => [
                    'valor'       => 'Valor',
                    'nombre'      => 'Estatus',
                    'descripcion' => 'Descripción',
                    'active'      => 'Activo',
                ],
                'with_pos' => true,
                'actions'  => [
                    'pagination' => [
                        'options' => [10,20,50],
                        'rows'    => 10,
                    ],
                'export_data' => true,
                ],
            ],
            'permissions' => $permisos,
    ])
    @endif
        <!-- FIN Variables -->
</div>

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/datatables.js') }}"></script>
    
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
@endpush