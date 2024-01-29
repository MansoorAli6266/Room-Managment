<x-app-layout>

    <body class="bg-dark">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mx-auto">
                    @auth
                    <!-- Show buttons for authenticated users -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">Add New Data</button>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#viewHistoryModal">View History</button>




                    @else
                    <!-- Show login/registration buttons for guests -->
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
                    @endauth
                </div>
            </div>
        </div>


        <!-- Add New Data Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataModalLabel">Add New Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('add.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="selectUser">Select User</label>
                                <select class="form-control" id="selectUser" name="user_id">
                                    <option value="">Select User</option>


                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="inputPhoneNumber">How much</label>
                                <input type="number" name="cost" class="form-control" placeholder="How Much">
                            </div>
                            <div class="form-group">

                                <textarea name="description" id="" cols="54" rows="5">Description</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View History Modal -->
        <!-- Main view -->
        <div class="modal fade" id="viewHistoryModal" tabindex="-1" role="dialog" aria-labelledby="viewHistoryModalLabel">
    <div class="modal-dialog modal-lg"> <!-- Adjust the size as needed -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewHistoryModalLabel">View History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- resources/views/modals/view_history_modal.blade.php -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm"> <!-- Adjust styling as needed -->
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



        <!-- Bootstrap JS and Popper.js (if needed) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</x-app-layout>