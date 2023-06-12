{{-- @extends('layouts.app') --}}
<style>
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
                <h3>200</h3>
            </div>
            <div class="card">
                <h3>Dossiers</h3>
                <h3>200</h3>
            </div>
            <div class="card">
                <h3>Assignations</h3>
                <h3>200</h3>
            </div>
            <div class="card">
                <h3>Prescriptions</h3>
                <h3>200</h3>
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
                        <th class="th-sm">Telephone
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Role
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                           <td>1</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                        </tr>



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
                        <tr>
                           <td>1</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                           <td>asdasdsad</td>
                        </tr>


                </tbody>

            </table>
        </div>
   </div>
@endsection
