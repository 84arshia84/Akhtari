<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | جدول داده</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('.styleSheets.dataStyle')
    @include('.styleSheets.styleSheets')
    <?php
    $users = [
        '123' => [
            'checkNum' => 456,
            'last_name' => 'Ghaforian',
            'phone_number' => '09382580898',
            'total_check' => 4548852,
            'file' => null,
        ]
    ] ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('.navbar.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        @include('.Sidebar.Sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('.header.data.checksData_header')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="Data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>شماره سفارش</th>
                                    <th>id مشتری</th>
                                    <th>id فروشنده</th>
                                    <th>مبلغ فاکتور</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($checks as $check)
                                    <tr>
                                        <td>{{ $check->order_number }}</td>
                                        <td>{{ $check->customer_id}}</td>
                                        <td>{{ $check->seller_id }}</td>
                                        <td>{{ $check->total_pay }}</td>
                                        <td>
                                            <form {{--class="" action="#" method="POST"--}}>
                                                @csrf
                                                {{--@method('PUT')--}}
                                                <input type="hidden" name="id" value="{{--{{ $user->id }}--}}">
                                                <button type="submit">
                                                    <i class="fa-regular fa-pen-to-square fa-flip-horizontal"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form {{--class="" action="#" method="POST"--}}>
                                                @csrf
                                                {{--@method('DELETE')--}}
                                                <input type="hidden" name="id" value="{{--{{ $user->id }}--}}">
                                                <button type="submit">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>شماره سفارش</th>
                                    <th>id مشتری</th>
                                    <th>id فروشنده</th>
                                    <th>مبلغ فاکتور</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('.footer.main_footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- page script -->

<script>
    $(function () {
        $('#Data').DataTable({
            "language":
                {
                    "paginate":
                        {
                            "next": "بعدی",
                            "previous": "قبلی"
                        },
                    "search": "جست و جو : ",
                },

            "info": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "autoWidth": true
        });
    });
</script>

</body>
</html>
