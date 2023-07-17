{{-- @extends('layouts.app') --}}
<style>
    @media (max-width: 550px){
         .top_cards{
            
        }
        .card{
            width:100% !important;
            margin-top: 10px !important;

        }
    }
    .dashboard_container{
        margin:0px 20px;
    }
    .top_cards{
        display:flex;
        width:100%;
        justify-content:space-between;
        flex-wrap:wrap;
    }
    .card{
        width:250px;
        height:600px;
        padding:40px 5px;
    }
    .card h3{
        font-size:20px;
        text-align:center;
    }
    .bar{
        height:20px;
        border-radius:3px;
        width:100%;
        margin-bottom:15px;
        background-color:white;
    }
    table{
        background-color:white;

    }
</style>
@extends('layouts.app')

@section('content')
   <div class="dashboard_container">
       <div class="top_cards">
            <div class="card">
                <h3>Patients</h3>
                <h3>{{ $patient_total }}</h3>
            </div>
            <div class="card">
                <h3>Service</h3>
                <h3>{{ $services->count() }}</h3>
            </div>
            <div class="card">
                <h3>Assignations</h3>
                <h3>{{ $assignation_total }}</h3>
            </div>
            <div class="card">
                <h3>Prescriptions</h3>
                <h3>{{ $prescription_total }}</h3>
            </div>
       </div>
       <div class="bar">
            <p></p>
       </div>
       <h4>Personnels</h4>
       <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">#
                        </th>
                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Prénom
                        </th>

                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Role
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user )
                    <tr>
                        <td>{{ ++$loop->index  }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->role_name }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="bar">
            <p></p>
       </div>
        <h4>Services</h4>
       <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">#
                        </th>
                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Statut
                        </th>
                        <th class="th-sm">Description
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                       <td></td>
                    </tr>

                    @endforeach



                </tbody>

            </table>
        </div>
   </div>
@endsection
