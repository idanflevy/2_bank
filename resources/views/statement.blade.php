@extends('layouts.masterlocal')

@section('content')


<section class="content" style="margin:0px 20px;">



    <div class="card" style="border-radius:none;">
        <div class="card-header">
            <h3 class="card-title">Account Statement</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>



                        <th scope="col">DATE & TIME</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">DETAILS</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($statement as $k => $s)
                    <tr>

                        <td>{{ date('Y-m-d', strtotime($s['datetime'])) }}</td>
                        <td>{{ $s['amount'] }}</td>
                        <td>{{ $s['type'] }}</td>
                        <td>{{ $s['details'] }}</td>
                        <td>{{ $s['description'] }}</td>
                        <td>{{ $s['balence'] }}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>

            </table>


        </div>

    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    {{ $statement->links() }}


</section>

@endsection