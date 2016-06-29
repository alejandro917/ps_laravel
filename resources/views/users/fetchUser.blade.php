@extends('layout')

@section('content')

    <div id="UserController">

        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.name">Name field is required.</li>
                <li v-show="!validation.email">Input a valid email address</li>
            </ul>
        </div>

        <form action="#" @submit.prevent="AddNewUser" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input v-model="newUser.name" type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit">Add New User</button>
            </div>
        </form>


        <table class="table">
            <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
            </thead>

            <tbody>
                <tr v-for="user in users">
                    <td>@{{ user.id }}</td>
                    <td>@{{ user.name }}</td>
                    <td>@{{ user.email }}</td>
                    <td>@{{ user.created_at }}</td>
                    <td>@{{ user.updated_at }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>


    </div>

@endsection

@push('scripts')
    <script src="js/script.js"></script>
@endpush