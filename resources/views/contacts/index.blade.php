@extends('base') <!--it is an instance of base  -->

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Contacts</h1>
        <div>
            <a style="margin: 19px;" href="{{ url('create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="col-sm-12">
        @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        </div>

    <!-- table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Job Title</td>
                <td>City</td>
                <td>Country</td>
                <td colspan=2>Actions</td>
            </tr>
        </thead>
        @php
        $i = 0;
        @endphp
        <tbody>
            
            @foreach($contacts as $contact)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->job_title}}</td>
                <td>{{$contact->city}}</td>
                <td>{{$contact->country}}</td> 
                <td><a href="{{url('edit', ['id' => $contact->id])}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action ="{{route('del',['id' => $contact->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

