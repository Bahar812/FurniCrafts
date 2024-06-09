@include("components.head")

<body class="bg-light">

    <!-- Main Section-->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white"><h2 class="mb-0">Edit User</h2></div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ Route('EditUser') }}">
                            @csrf
                            <input type="hidden" name="user_id" id="" value="{{ $user->uuid }}">
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="" disabled>Select Role</option>
                                        <option value="Owner" {{ $user->role == 'Owner' ? 'selected' : '' }}>Owner</option>
                                        <option value="Manager" {{ $user->role == 'Manager' ? 'selected' : '' }}>Manager</option>
                                        <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>
