@extends('admin.layout.master')

@section('content')

   <div class="row">
       <div class="col-sm-12">
          <div class="card">

            <div class="card-header">
                <h2 class="card.title">
                    کد های تخفیف  
                </h2>
            </div>

            <div class="card-body">
               
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>کد</th>
                            <th>تاریخ آغاز </th>
                            <th>تاریخ پایان</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($offers as $offer)
                        <tr>
                          <td>{{ $offer->id }}</td>
                          <td>{{ $offer->code }}</td>
                         {{-- format('y-m-d')  چون از نوع تاریخ هست --}}
                          <td>{{ $offer->starts_at->format('Y-m-d') }}</td>
                          <td>{{ $offer->expires_at->format('Y-m-d') }}</td>
                          <td>
                            <a href="{{ route('offers.edit',$offer) }}" class="btn btn-sm btn-primary">ویرایش</a>
                          </td>
                          <td>
                            <form action="{{ route('offers.destroy',$offer) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                            </form>
                          </td>
                        </tr>
                        
                    @endforeach
                    </tbody>


                     
                    <tfoot>
                    <tr>
                        <th>#</th>
                        
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
    
       </div>
   </div>

@endsection

@section('scripts')

   <!-- DataTables -->
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

@endsection